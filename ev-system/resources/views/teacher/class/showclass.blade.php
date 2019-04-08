@extends('layouts.app')

@section('title')
{{ trans('topbar_menu_lang.menu_student') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('topbar_menu_lang.menu_student') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('topbar_menu_lang.menu_student') }}
                          </header>
                          @if ( !$students->count() )
                          <div style="padding: 10px">There is no student available in this class...</div>
                          @else 
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('student_lang.student_photo') }}</th>
                                  <th>{{ trans('student_lang.student_name') }}</th>
                                  <th>{{ trans('student_lang.student_email') }}</th>
                                  <th>{{ trans('student_lang.student_sex') }}</th>
                                  <th>{{ trans('student_lang.student_address') }}</th>
                                  <th>{{ trans('student_lang.student_phone') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                                

                                @foreach($students as $post)
                              <tr>
                                  <td data-title=""><a href="#">{{ $post->id }}</a></td>
                                  <td data-title=""> <img src="{{ asset('ev-assets/uploads/avatars/'.$post->image) }}" alt="..." class="img-circle profile_img" width="50px" height="50px"> </td>
                                  <td data-title=""><a href="#">{{ $post->name }}</a></td>
                                  <td data-title="">{{ $post->email }}</td>
                                  <td data-title="">{{ $post->gender }}</td>
                                  <td data-title="">{{ $post->address }}</td>
                                  <td data-title="">{{ $post->phone }}</td>
                              </tr>
                               @endforeach
                              </tbody>
                          </table>
                         @endif
                      </section>
                  </div>
              </div>
               

@endsection

