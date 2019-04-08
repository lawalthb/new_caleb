@extends('layouts.app')

@section('title')
Study Material
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Study Material</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Study Material
                          </header>  
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Title</th>
                                  <th> Description</th>
                                  <th> Date</th>
                                  <th> Class</th>
                                  <th> Download</th>
                              </tr>
                              </thead>
                              <tbody>
                                

                                @foreach( $materials as $key => $mat )
                              <tr>
                                  <td data-title="#">{{ $key+1 }}</td>
                                  <td data-title="Title">{{ $mat->title }}</td>
                                  <td data-title="Description">{{ $mat->description }}</td>
                                  <td data-title="Date">{{ $mat->date }}</td>
                                  <td data-title="Class">{{ $mat->classes($mat->class_id)->title }}</td>
                                  <td data-title="Download"><a class="active" href="{{ url('ev-assets/uploads/study-materials/'.$mat->file_name) }}" target="_blank">
                                        <button class="btn btn-success btn-xs"><i class="fa fa-download "></i> Download</button>
                                      </a></td>
                              </tr>
                               @endforeach
                             
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

@endsection