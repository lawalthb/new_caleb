

/**
 * Add a data array to the table, creating DOM node etc. This is the parallel to 
 * _fnGatherData, but for adding rows from a Javascript source, rather than a
 * DOM source.
 *  @param {object} oSettings dataTables settings object
 *  @param {array} aData data array to be added
 *  @returns {int} >=0 if successful (index of new aoData entry), -1 if failed
 *  @memberof DataTable#oApi
 */
function _fnAddData ( oSettings, aDataSupplied )
{
	var oCol;
	
	/* Take an independent copy of the data source so we can bash it about as we wish */
	var aDataIn = ($.isArray(aDataSupplied)) ?
		aDataSupplied.slice() :
		$.extend( true, {}, aDataSupplied );
	
	/* Create the object for storing information about this new row */
	var iRow = oSettings.aoData.length;
	var oData = $.extend( true, {}, DataTable.models.oRow, {
		"_aData": aDataIn
	} );
	oSettings.aoData.push( oData );

	/* Create the cells */
	var nTd, sThisType;
	for ( var i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
	{
		oCol = oSettings.aoColumns[i];

		/* Use rendered data for filtering/sorting */
		if ( typeof oCol.fnRender === 'function' && oCol.bUseRendered && oCol.mDataProp !== null )
		{
			_fnSetCellData( oSettings, iRow, i, oCol.fnRender( {
				"iDataRow": iRow,
				"iDataColumn": i,
				"aData": oData._aData,
				"oSettings": oSettings
			} ) );
		}
		
		/* See if we should auto-detect the column type */
		if ( oCol._bAutoType && oCol.sType != 'string' )
		{
			/* Attempt to auto detect the type - same as _fnGatherData() */
			var sVarType = _fnGetCellData( oSettings, iRow, i, 'type' );
			if ( sVarType !== null && sVarType !== '' )
			{
				sThisType = _fnDetectType( sVarType );
				if ( oCol.sType === null )
				{
					oCol.sType = sThisType;
				}
				else if ( oCol.sType != sThisType && oCol.sType != "html" )
				{
					/* String is always the 'fallback' option */
					oCol.sType = 'string';
				}
			}
		}
	}
	
	/* Add to the display array */
	oSettings.aiDisplayMaster.push( iRow );

	/* Create the DOM imformation */
	if ( !oSettings.oFeatures.bDeferRender )
	{
		_fnCreateTr( oSettings, iRow );
	}

	return iRow;
}


/**
 * Read in the data from the target table from the DOM
 *  @param {object} oSettings dataTables settings object
 *  @memberof DataTable#oApi
 */
function _fnGatherData( oSettings )
{
	var iLoop, i, iLen, j, jLen, jInner,
	 	nTds, nTrs, nTd, aLocalData, iThisIndex,
		iRow, iRows, iColumn, iColumns, sNodeName,
		oCol, oData;
	
	/*
	 * Process by row first
	 * Add the data object for the whole table - storing the tr node. Note - no point in getting
	 * DOM based data if we are going to go and replace it with Ajax source data.
	 */
	if ( oSettings.bDeferLoading || oSettings.sAjaxSource === null )
	{
		nTrs = oSettings.nTBody.childNodes;
		for ( i=0, iLen=nTrs.length ; i<iLen ; i++ )
		{
			if ( nTrs[i].nodeName.toUpperCase() == "TR" )
			{
				iThisIndex = oSettings.aoData.length;
				oSettings.aoData.push( $.extend( true, {}, DataTable.models.oRow, {
					"nTr": nTrs[i]
				} ) );
				
				oSettings.aiDisplayMaster.push( iThisIndex );
				nTds = nTrs[i].childNodes;
				jInner = 0;
				
				for ( j=0, jLen=nTds.length ; j<jLen ; j++ )
				{
					sNodeName = nTds[j].nodeName.toUpperCase();
					if ( sNodeName == "TD" || sNodeName == "TH" )
					{
						_fnSetCellData( oSettings, iThisIndex, jInner, $.trim(nTds[j].innerHTML) );
						jInner++;
					}
				}
			}
		}
	}
	
	/* Gather in the TD elements of the Table - note that this is basically the same as
	 * fnGetTdNodes, but that function takes account of hidden columns, which we haven't yet
	 * setup!
	 */
	nTrs = _fnGetTrNodes( oSettings );
	nTds = [];
	for ( i=0, iLen=nTrs.length ; i<iLen ; i++ )
	{
		for ( j=0, jLen=nTrs[i].childNodes.length ; j<jLen ; j++ )
		{
			nTd = nTrs[i].childNodes[j];
			sNodeName = nTd.nodeName.toUpperCase();
			if ( sNodeName == "TD" || sNodeName == "TH" )
			{
				nTds.push( nTd );
			}
		}
	}
	
	/* Sanity check */
	if ( nTds.length != nTrs.length * oSettings.aoColumns.length )
	{
		_fnLog( oSettings, 1, "Unexpected number of TD elements. Expected "+
			(nTrs.length * oSettings.aoColumns.length)+" and got "+nTds.length+". DataTables does "+
			"not support rowspan / colspan in the table body." );
	}
	
	/* Now process by column */
	for ( iColumn=0, iColumns=oSettings.aoColumns.length ; iColumn<iColumns ; iColumn++ )
	{
		oCol = oSettings.aoColumns[iColumn];

		/* Get the title of the column - unless there is a user set one */
		if ( oCol.sTitle === null )
		{
			oCol.sTitle = oCol.nTh.innerHTML;
		}
		
		var
			bAutoType = oCol._bAutoType,
			bRender = typeof oCol.fnRender === 'function',
			bClass = oCol.sClass !== null,
			bVisible = oCol.bVisible,
			nCell, sThisType, sRendered, sValType;
		
		/* A single loop to rule them all (and be more efficient) */
		if ( bAutoType || bRender || bClass || !bVisible )
		{
			for ( iRow=0, iRows=oSettings.aoData.length ; iRow<iRows ; iRow++ )
			{
				oData = oSettings.aoData[iRow];
				nCell = nTds[ (iRow*iColumns) + iColumn ];
				
				/* Type detection */
				if ( bAutoType && oCol.sType != 'string' )
				{
					sValType = _fnGetCellData( oSettings, iRow, iColumn, 'type' );
					if ( sValType !== '' )
					{
						sThisType = _fnDetectType( sValType );
						if ( oCol.sType === null )
						{
							oCol.sType = sThisType;
						}
						else if ( oCol.sType != sThisType && 
						          oCol.sType != "html" )
						{
							/* String is always the 'fallback' option */
							oCol.sType = 'string';
						}
					}
				}
				
				/* Rendering */
				if ( bRender )
				{
					sRendered = oCol.fnRender( {
							"iDataRow": iRow,
							"iDataColumn": iColumn,
							"aData": oData._aData,
							"oSettings": oSettings
						} );
					nCell.innerHTML = sRendered;
					if ( oCol.bUseRendered )
					{
						/* Use the rendered data for filtering/sorting */
						_fnSetCellData( oSettings, iRow, iColumn, sRendered );
					}
				}
				
				/* Classes */
				if ( bClass )
				{
					nCell.className += ' '+oCol.sClass;
				}
				
				/* Column visability */
				if ( !bVisible )
				{
					oData._anHidden[iColumn] = nCell;
					nCell.parentNode.removeChild( nCell );
				}
				else
				{
					oData._anHidden[iColumn] = null;
				}

				if ( oCol.fnCreatedCell )
				{
					oCol.fnCreatedCell.call( oSettings.oInstance,
						nCell, _fnGetCellData( oSettings, iRow, iColumn, 'display' ), oData._aData, iRow
					);
				}
			}
		}
	}
}


/**
 * Take a TR element and convert it to an index in aoData
 *  @param {object} s dataTables settings object
 *  @param {node} n the TR element to find
 *  @returns {int} index if found, null if not
 *  @memberof DataTable#oApi
 */
function _fnNodeToDataIndex( s, n )
{
	var i, iLen;
	
	/* Optimisation - see if the nodes which are currently visible match, since that is
	 * the most likely node to be asked for (a selector or event for example)
	 */
	for ( i=s._iDisplayStart, iLen=s._iDisplayEnd ; i<iLen ; i++ )
	{
		if ( s.aoData[ s.aiDisplay[i] ].nTr == n )
		{
			return s.aiDisplay[i];
		}
	}
	
	/* Otherwise we are in for a slog through the whole data cache */
	for ( i=0, iLen=s.aoData.length ; i<iLen ; i++ )
	{
		if ( s.aoData[i].nTr == n )
		{
			return i;
		}
	}
	return null;
}


/**
 * Get an array of data for a given row from the internal data cache
 *  @param {object} oSettings dataTables settings object
 *  @param {int} iRow aoData row id
 *  @param {string} sSpecific data get type ('type' 'filter' 'sort')
 *  @returns {array} Data array
 *  @memberof DataTable#oApi
 */
function _fnGetRowData( oSettings, iRow, sSpecific )
{
	var out = [];
	for ( var i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
	{
		out.push( _fnGetCellData( oSettings, iRow, i, sSpecific ) );
	}
	return out;
}


/**
 * Get the data for a given cell from the internal cache, taking into account data mapping
 *  @param {object} oSettings dataTables settings object
 *  @param {int} iRow aoData row id
 *  @param {int} iCol Column index
 *  @param {string} sSpecific data get type ('display', 'type' 'filter' 'sort')
 *  @returns {*} Cell data
 *  @memberof DataTable#oApi
 */
function _fnGetCellData( oSettings, iRow, iCol, sSpecific )
{
	var sData;
	var oCol = oSettings.aoColumns[iCol];
	var oData = oSettings.aoData[iRow]._aData;

	if ( (sData=oCol.fnGetData( oData, sSpecific )) === undefined )
	{
		if ( oSettings.iDrawError != oSettings.iDraw && oCol.sDefaultContent === null )
		{
			_fnLog( oSettings, 0, "Requested unknown parameter '"+oCol.mDataProp+
				"' from the data source for row "+iRow );
			oSettings.iDrawError = oSettings.iDraw;
		}
		return oCol.sDefaultContent;
	}

	/* When the data source is null, we can use default column data */
	if ( sData === null && oCol.sDefaultContent !== null )
	{
		sData = oCol.sDefaultContent;
	}
	else if ( typeof sData === 'function' )
	{
		/* If the data source is a function, then we run it and use the return */
		return sData();
	}

	if ( sSpecific == 'display' && sData === null )
	{
		return '';
	}
	return sData;
}


/**
 * Set the value for a specific cell, into the internal data cache
 *  @param {object} oSettings dataTables settings object
 *  @param {int} iRow aoData row id
 *  @param {int} iCol Column index
 *  @param {*} val Value to set
 *  @memberof DataTable#oApi
 */
function _fnSetCellData( oSettings, iRow, iCol, val )
{
	var oCol = oSettings.aoColumns[iCol];
	var oData = oSettings.aoData[iRow]._aData;

	oCol.fnSetData( oData, val );
}


/**
 * Return a function that can be used to get data from a source object, taking
 * into account the ability to use nested objects as a source
 *  @param {string|int|function} mSource The data source for the object
 *  @returns {function} Data get function
 *  @memberof DataTable#oApi
 */
function _fnGetObjectDataFn( mSource )
{
	if ( mSource === null )
	{
		/* Give an empty string for rendering / sorting etc */
		return function (data, type) {
			return null;
		};
	}
	else if ( typeof mSource === 'function' )
	{
	    return function (data, type) {
	        return mSource( data, type );
	    };
	}
	else if ( typeof mSource === 'string' && mSource.indexOf('.') != -1 )
	{
		/* If there is a . in the source string then the data source is in a nested object
		 * we provide two 'quick' functions for the look up to speed up the most common
		 * operation, and a generalised one for when it is needed
		 */
		var a = mSource.split('.');
		if ( a.length == 2 )
		{
			return function (data, type) {
				return data[ a[0] ][ a[1] ];
			};
		}
		else if ( a.length == 3 )
		{
			return function (data, type) {
				return data[ a[0] ][ a[1] ][ a[2] ];
			};
		}
		else
		{
			return function (data, type) {
				for ( var i=0, iLen=a.length ; i<iLen ; i++ )
				{
					data = data[ a[i] ];
				}
				return data;
			};
		}
	}
	else
	{
		/* Array or flat object mapping */
		return function (data, type) {
			return data[mSource];	
		};
	}
}


/**
 * Return a function that can be used to set data from a source object, taking
 * into account the ability to use nested objects as a source
 *  @param {string|int|function} mSource The data source for the object
 *  @returns {function} Data set function
 *  @memberof DataTable#oApi
 */
function _fnSetObjectDataFn( mSource )
{
	if ( mSource === null )
	{
		/* Nothing to do when the data source is null */
		return function (data, val) {};
	}
	else if ( typeof mSource === 'function' )
	{
	    return function (data, val) {
	        return mSource( data, val );
	    };
	}
	else if ( typeof mSource === 'string' && mSource.indexOf('.') != -1 )
	{
		/* Like the get, we need to get data from a nested object. Again two fast lookup
		 * functions are provided, and a generalised one.
		 */
		var a = mSource.split('.');
		if ( a.length == 2 )
		{
			return function (data, val) {
				data[ a[0] ][ a[1] ] = val;
			};
		}
		else if ( a.length == 3 )
		{
			return function (data, val) {
				data[ a[0] ][ a[1] ][ a[2] ] = val;
			};
		}
		else
		{
			return function (data, val) {
				for ( var i=0, iLen=a.length-1 ; i<iLen ; i++ )
				{
					data = data[ a[i] ];
				}
				data[ a[a.length-1] ] = val;
			};
		}
	}
	else
	{
		/* Array or flat object mapping */
		return function (data, val) {
			data[mSource] = val;	
		};
	}
}


/**
 * Return an array with the full table data
 *  @param {object} oSettings dataTables settings object
 *  @returns array {array} aData Master data array
 *  @memberof DataTable#oApi
 */
function _fnGetDataMaster ( oSettings )
{
	var aData = [];
	var iLen = oSettings.aoData.length;
	for ( var i=0 ; i<iLen; i++ )
	{
		aData.push( oSettings.aoData[i]._aData );
	}
	return aData;
}


/**
 * Nuke the table
 *  @param {object} oSettings dataTables settings object
 *  @memberof DataTable#oApi
 */
function _fnClearTable( oSettings )
{
	oSettings.aoData.splice( 0, oSettings.aoData.length );
	oSettings.aiDisplayMaster.splice( 0, oSettings.aiDisplayMaster.length );
	oSettings.aiDisplay.splice( 0, oSettings.aiDisplay.length );
	_fnCalculateEnd( oSettings );
}


 /**
 * Take an array of integers (index array) and remove a target integer (value - not 
 * the key!)
 *  @param {array} a Index array to target
 *  @param {int} iTarget value to find
 *  @memberof DataTable#oApi
 */
function _fnDeleteIndex( a, iTarget )
{
	var iTargetIndex = -1;
	
	for ( var i=0, iLen=a.length ; i<iLen ; i++ )
	{
		if ( a[i] == iTarget )
		{
			iTargetIndex = i;
		}
		else if ( a[i] > iTarget )
		{
			a[i]--;
		}
	}
	
	if ( iTargetIndex != -1 )
	{
		a.splice( iTargetIndex, 1 );
	}
}

