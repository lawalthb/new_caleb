@extends('layouts.app')
@section('title')
    Spread Sheets
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Spread Sheets</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
            </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              View Spread Sheets
                          </header>
                            <div class="panel-body">
                                @if(Session::has('message'))   
                                    <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                {!! Form::open(array('url'=>'class/spread-sheets','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">Term
                                        </label>
                                        <div class="col-lg-9">
                                        <select name="term_id" class="form-control"   required>
                                            <option value="">Choose..</option>
                                            @foreach(App\Term::all() as $term)
                                                <option value="{{ $term->id }}">{{ $term->name }} - {{ $term->academic_session ? $term->academic_session->name : '-' }} </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">{{ trans('topbar_menu_lang.menu_classes') }}
                                        </label>
                                        <div class="col-lg-9">
                                        <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                              data-message-required="this is required"
                                                onchange="return get_class_subjects(this.value)" required>
                                            <option value="">Choose..</option>
                                            @foreach( $classes as $class )
                                            <option value="{{ $class->id }}">{{ $class->title }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">{{ trans('topbar_menu_lang.menu_subject') }}
                                        </label>
                                        <div class="col-lg-9">
                                        <select name="subject_id" class="form-control"  id="section_selector_holder" required>
                                            <option>{{ trans('mark_lang.mark_select_subject') }}</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label"></label>
                                        <div class="col-lg-9">
                                            {!! Form::submit('View Spread Sheet', array('class'=>'btn btn-primary')) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                      </section>
                  </div>
              </div>
               

<script type="text/javascript">

function get_class_subjects(class_id) {

    $.ajax({
          url: '<?php echo e(url('')); ?>/get_class_subjects/' + class_id ,
          success: function(response)
          {
              jQuery('#section_selector_holder').html(response);
          }
      });
 
  } 
</script>
@endsection