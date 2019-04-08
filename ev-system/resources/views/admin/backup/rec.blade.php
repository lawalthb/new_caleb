@extends('layouts.app')

@section('title')
{{ trans('routine_lang.add_routine') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">System Backup</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              System Backup
                          </header>
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  Generate Backup
                              </a>
                          <table class="table table-striped table-advance table-hover">
                            @if ( 3 == 2 )
                                <div style="padding:20px">There are no books available...</div>
                            @else 
                            
                                <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Author Name</th>
                                  <th>Book Name</th>
                                  <th>{{ trans('hostel_lang.hostel_note') }}</th>
                                  <th>Price</th>
                                  <th>{{ trans('subject_lang.subject_class_name') }}</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php
                                for ($i=0; $i < count($mine); $i++) { 
                                  $level = explode(",", $mine[$i]);
                                   ?>
                                 <tr>   
                                  <?php  
                                  for ($j=0; $j < count($level); $j++) {
                                  $sublevel = explode("=", $level[$j]);
                                    for ($k=1; $k < count($sublevel); $k+=2) { 
                                    ?>

                              
                                  <td data-title="">{{ $sublevel[$k] }}</td>
                                  
                                  <?php }} ?>
                                  <td data-title="">
                                      <a class="active" data-toggle="modal" href="#myModal2">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Restore</button>
                                       </a>
                                  </td>
                              </tr>
                               
                                <?php  
                                }
                                ?>
                              @endif


                              </tbody>
                          </table><?php 
                          print_r($val)."<br><br>";
                              print_r($men);?>
                      </section>
                  </div>
              </div>
               

@endsection


