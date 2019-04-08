@extends('layouts.app')

@section('title')
{{ trans('student_lang.add_student') }}
@endsection

@section('content')
      
            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> <?php echo trans('dashboard_lang.panel_title');?></a></li>
                        <li><a href="{{ url('students/create_student') }}">{{ trans('topbar_menu_lang.menu_student') }}</a></li>
                        <li class="active">{{ trans('student_lang.add_student') }}</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                  
              <section class="panel">
                  <header class="panel-heading">
                     {{ trans('student_lang.add_student') }}
                  </header>
                  @if(Session::has('message'))   
                    <div class="white-box">
                              @if(Session::get('message') == trans('topbar_menu_lang.success'))
                      <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('message') }}
                      </div>
                      @else
                      <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('message') }}
                      </div>
                      @endif
                    </div>
                    @endif
                  <div class="panel-body">
                    {!! Form::open(array('url'=>'students/create_student','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    
                    <div class="col-lg-9">
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.student_name') }} <span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <input type="text" id="first-name" value="{{ old('name') }}" required="required" placeholder="" name="name" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      <div class="form-group">
                        
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.student_email') }}<span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                          <input type="text" id="last-name" name="email" value="{{ old('email') }}" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.student_password') }}</label>
                          <div class="col-lg-9">
                            <input id="middle-name" class="form-control col-md-7 col-xs-12" value="{{ old('password') }}" type="password" name="password">
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.student_sex') }}</label>
                          <div class="col-lg-9">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="male"> &nbsp; {{ trans('student_lang.student_sex_male') }} &nbsp;
                              </label>
                              <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="female"> {{ trans('student_lang.student_sex_female') }}
                              </label>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.student_dob') }} <span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <input id="birthday" name="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date">
                          </div>
                      </div>
                          <input type="hidden" id="last-name" name="reg_no" value="{{ $next_id }}" required="required" class="form-control col-md-7 col-xs-12">
                       
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.student_select_class') }}<span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                                data-message-required="this is required"
                                                  onchange="return get_class_sections(this.value)">
                              <option value="">{{ trans('student_lang.student_select_class') }}</option>
                              @foreach( $classes as $class )
                              <option value="{{ $class->id }}">{{ $class->title }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.student_section') }}<span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <select name="section_id" class="form-control" id="section_selector_holder">
                              <option value="">{{ trans('student_lang.student_select_section') }}</option>                           
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('topbar_menu_lang.menu_hostel') }}<span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <select id="heard" name="dormitory_id" class="form-control" required>
                              <option value="">Choose..</option>
                              @foreach( $dormitories as $dormitory )
                              <option value="{{ $dormitory->id }}">{{ $dormitory->name }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.parent_guargian_name') }}/{{ trans('topbar_menu_lang.menu_parent') }}<span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <select id="heard" name="parent_id" class="form-control" required>
                              <option value="">Choose..</option>
                              @foreach( $parents as $parent )
                              <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label  class="col-lg-2 control-label">{{ trans('others.school') }}</label>
                          <div class="col-lg-9">
                            <select class="form-control" name="school">
                              @foreach(App\School::where("status", 1)->orderBy("created_at", "asc")->paginate() as $dt)
                                  <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-lg-2 control-label">{{ trans('student_lang.student_photo') }}<span class="required">*</span>
                        </label>
                          <div class="col-lg-9">
                            <input type="file" name="file" class="form-control">
                          </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div  class="col-lg-2"></div>
                          <div class="col-lg-9">
                            {!! Form::submit(trans("student_lang.add_student"), array('class'=>'btn btn-primary', 'name'=>'publish')) !!}
                          </div>
                      </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                      </section>
                  </div> 
                  </div> 

      


<script type="text/javascript">

  function get_class_sections(class_id) {

      $.ajax({
            url: '<?php echo e(url('')); ?>/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });
   
    } 
</script>
 

@endsection
