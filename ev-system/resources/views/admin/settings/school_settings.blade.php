@extends('layouts.app')

@section('title')
{{ trans('others.school_settings') }}
@endsection

@section('content')
        <link href="{{ asset('ev-assets/backend/assets/bootstrap-colorpicker/css/colorpicker.css') }}" rel="stylesheet">             
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('other.school_settings') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>

            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading"> 
                              {{ trans('other.school_settings') }} 
                          </header>
                          <div class="panel-body">
                    {!! Form::open(array('url'=>'school_settings','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    <div class="col-lg-7">
                      <div class="form-group">
                        <label for="first-name">School Logo</label>
                        <div class="edit-profile-photo">
                            <img src="{{ asset('ev-assets/uploads/school-images/'.$school->photo) }}" alt="" id="img">
                            <div class="change-photo-btn">
                                <div class="photoUpload">
                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                    <input class="upload" name="file" id="uploadpro" type="file">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="first-name">School Signature/Stamp</label>
                        <div class="edit-profile-photo">
                            <img src="{{ asset('ev-assets/uploads/school-images/'.$school->stamp) }}" alt="" id="img2">
                            <div class="change-photo-btn">
                                <div class="photoUpload">
                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                    <input class="upload" name="stamp" id="uploadstamp" type="file">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="first-name">{{ trans('other.school_name') }}
                        </label>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" id="first-name" required="required" name="id" value="{{ $school->id }}" class="form-control col-md-7 col-xs-12">
                          <input type="text" id="first-name" value="{{ $school->name }}" required="required" placeholder="Enter title here" name="name" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="form-group">
                        <label>{{ trans('others.school_email') }}<span class="required">*</span>
                        </label>
                          <input type="text" id="last-name" name="email" value="{{ $school->email }}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="form-group">
                        <label>{{ trans('other.school_phone') }}</label>
                        
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" value="{{ $school->phone }}" type="text" name="phone">
                       
                      </div>
                      <div class="form-group">
                        <label>{{ trans('other.school_address') }}
                        </label>
                          <input value="{{ $school->address }}" name="address" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>   
                      <div class="form-group">
                        <input type="hidden" name="color" value="{{ $school->color }}" id="colorpika">
                        </div>               
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          {!! Form::submit(trans('setting_lang.update_setting'), array('class'=>'btn btn-primary', 'name'=>'publish')) !!}
                        </div>
                      </div>
                      <div class="col-md-5">
                        <label>Skin Colour
                        </label>
                        <div class="scheme-holders">
                          <img src="{{ asset('ev-assets/uploads/color_scheme/default.png') }}" alt="" class="active" id="default">
                          <img src="{{ asset('ev-assets/uploads/color_scheme/blue.png') }}" alt="" id="blue">
                          <img src="{{ asset('ev-assets/uploads/color_scheme/green.png') }}" alt="" id="green">
                          <img src="{{ asset('ev-assets/uploads/color_scheme/purple.png') }}" alt="" id="purple">
                          <img src="{{ asset('ev-assets/uploads/color_scheme/yellow.png') }}" alt="" id="yellow">
                          <img src="{{ asset('ev-assets/uploads/color_scheme/red.png') }}" alt="" id="red">
                          <img src="{{ asset('ev-assets/uploads/color_scheme/cosmic.png') }}" alt="" id="cosmic">
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                      </section>
                  </div> 
                  </div> 
                </div>
  
  <script type="text/javascript">

      $(function(){

      $(".scheme-holders img").removeClass("active");
      $(".scheme-holders #"+'{{ $school->color }}').addClass("active");

      $('#uploadpro').change(function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
         {
            var reader = new FileReader();

            reader.onload = function (e) {
               $('#img').attr('src', e.target.result);
            }
           reader.readAsDataURL(input.files[0]);
        }
        else
        {
          /*$('#img').attr('src', 'uploads/images/avatar/avatar.png');*/
        }
      });

      $('#uploadstamp').change(function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
         {
            var reader = new FileReader();

            reader.onload = function (e) {
               $('#img2').attr('src', e.target.result);
            }
           reader.readAsDataURL(input.files[0]);
        }
        else
        {
          /*$('#img').attr('src', 'uploads/images/avatar/avatar.png');*/
        }
      });

    });

  </script>

@endsection



