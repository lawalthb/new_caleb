#!/bin/sh

cd ../media/src

# DEFAULTS
CLOSURE="/usr/local/closure_compiler/compiler.jar"
JSDOC="/usr/local/jsdoc/jsdoc"
CMD=$1

MAIN_FILE="../js/jquery.dataTables.js"
MIN_FILE="../js/jquery.dataTables.min.js"
VERSION=$(grep " * @version     " DataTables.js | awk -F" " '{ print $3 }')

echo ""
echo "  DataTables build ($VERSION)"
echo ""


IFS='%'

cp DataTables.js DataTables.js.build

echo "  Building main script"
grep "require(" DataTables.js.build > /dev/null
while [ $? -eq 0 ]; do
	REQUIRE=$(grep "require(" DataTables.js.build | head -n 1)

	SPACER=$(echo ${REQUIRE} | cut -d r -f 1)
	FILE=$(echo ${REQUIRE} | sed -e "s#^.*require('##g" -e "s#');##")
	DIR=$(echo ${FILE} | cut -d \. -f 1)

	sed "s#^#${SPACER}#" < ${DIR}/${FILE} > ${DIR}/${FILE}.build

	sed -e "/${REQUIRE}/r ${DIR}/${FILE}.build" -e "/${REQUIRE}/d" < DataTables.js.build > DataTables.js.out
	mv DataTables.js.out DataTables.js.build

	rm ${DIR}/${FILE}.build

	grep "require(" DataTables.js.build > /dev/null
done

mv DataTables.js.build $MAIN_FILE


if [ "$CMD" != "debug" ]; then
	if [ "$CMD" = "jshint" -o "$CMD" = "" ]; then
		echo "  JSHint"
		jshint $MAIN_FILE --config ../../scripts/jshint.config
		if [ $? -ne 0 ]; then
			echo "    Errors occured - exiting"
			exit 1
		else
			echo "    Pass" 
		fi
	fi

	if [ "$CMD" = "compress" -o "$CMD" = "" ]; then
		echo "  Minification"
		echo "/*
 * File:        jquery.dataTables.min.js
 * Version:     $VERSION
 * Author:      Allan Jardine (www.sprymedia.co.uk)
 * Info:        www.datatables.net
 * 
 * Copyright 2008-2011 Allan Jardine, all rights reserved.
 *
 * This source file is free software, under either the GPL v2 license or a
 * BSD style license, available at:
 *   http://datatables.net/license_gpl2
 *   http://datatables.net/license_bsd
 * 
 * This source file is distributed in the hope that it will be useful, but 
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY 
 * or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.
 */" > $MIN_FILE 

		java -jar $CLOSURE --js $MAIN_FILE >> $MIN_FILE
		echo "    Min JS file size: $(ls -l $MIN_FILE | awk -F" " '{ print $5 }')"
	fi

	if [ "$CMD" = "docs" -o "$CMD" = "" ]; then
		echo "  Documentation"
		$JSDOC -d ../../docs -t JSDoc-DataTables $MAIN_FILE
	fi
fi

echo "  Done\n"


