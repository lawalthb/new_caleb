@extends('layouts.app')

@section('title')
{{ trans('routine_lang.update_routine') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('routine_lang.update_routine') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             {{ trans('routine_lang.update_routine') }}
                          </header>
                          <div class="panel-body">
                          {!! Form::open(array('url'=>'routine/update/'.$rout->id,'id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    
<div class="col-lg-9">
                      <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('routine_lang.routine_classes') }}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                              data-message-required="this is required"
                                                onchange="return get_class_subjects(this.value)">
                            <option value="" >Choose..</option>
                            @foreach( $classes as $class )
                            <option value="{{ $class->id }}">{{ $class->title }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('routine_lang.routine_subject') }}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="subject_id" class="form-control" id="subject_selector_holder">
                            <option value="">Select class first</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('routine_lang.routine_day') }}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="day_id" class="form-control" required>
                            <option value="">Choose..</option>
                            @foreach( $days as $day )
                            <option value="{{ $day->id }}">{{ $day->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('routine_lang.routine_start_time') }}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="starts" class="form-control" required>
                            <option value="">Choose..</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5" selected="selected">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                          <select id="heard" name="mer1" class="form-control" required>
                            <option value="am">am</option>
                            <option value="pm">pm</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">{{ trans('routine_lang.routine_end_time') }}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="ends" class="form-control" required>
                            <option value="">Choose..</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                          <select id="heard" name="mer2" class="form-control" required>
                            <option value="am">am</option>
                            <option value="pm">pm</option>
                          </select>
                        </div>
                      </div>
                      
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          {!! Form::submit(trans('routine_lang.update_routine'), array('class'=>'btn btn-success', 'name'=>'publish')) !!}
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
            url: '<?php echo e(url('dashboard')); ?>/get_class_subjects/' + class_id ,
            success: function(response)
            {
                jQuery('#subject_selector_holder').html(response);
            }
        });
   
    } 
</script>

@endsection




