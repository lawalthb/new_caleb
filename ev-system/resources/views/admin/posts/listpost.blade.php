@extends('layouts.app')

@section('title')
Posts
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li><a href="{{ url('posts/all-post') }}"><i class="fa fa-edit"></i> Posts</a></li>
                          <li class="active">Posts List</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <!-- .row -->
      <div class="row">
        @foreach($posts as $post)
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="{{ asset('ev-assets/uploads/post-images/'.$post->image) }}">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10"><i class="fa  fa-calendar-o"></i> {{ $post->created_at->format('d, M Y \a\t h:i a') }}</span> <a href="{{  url('posts/edit/'.$post->slug.'?_token='.csrf_token()) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a class="active"  data-toggle="modal" href="#myModaldel{{ $post->id }}">
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      </a>
                                    <!-- Delete Modal -->
                        <div class="modal fade" id="myModaldel{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        
                                    </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                        <a href="{{ url('posts/delete/'.$post->id) }}">
                                        <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
            <h3 class="m-t-20 m-b-20">{{ $post->title }}</h3>
            <p>{!! str_limit($post->body, $limit = 300, $end = '.......') !!}</p>
            <a href="{{ url('posts/'.$post->slug) }}"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button></a>
          </div>
        </div>
        @endforeach
      </div>
      <!-- /.row -->
               
@endsection