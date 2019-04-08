@extends('layouts.app')

@section('title')
{{ trans('hostel_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                        <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('hostel_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
                             
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             {{ trans('hostel_lang.panel_title') }}
                          </header>
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                            
                                <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('hostel_lang.hostel_name') }}</th>
                                  <th> Room Number</th>
                                  <th>{{ trans('hostel_lang.hostel_note') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                               
                                @foreach( $dormitories as $me => $post )

                              <tr>
                                  <td data-title="#"><a href="#">{{ $me+1 }}</a></td>
                                  <td data-title="{{ trans('hostel_lang.hostel_name') }}">{{ $post->name }}</td>
                                  <td data-title="Room Number">{{ $post->room_number}}</td>
                                  <td data-title="{{ trans('hostel_lang.hostel_note') }}">{{ $post->description }}</td>
                              </tr>
                               @endforeach
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

@endsection


