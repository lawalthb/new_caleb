@extends('layouts.app')

@section('title')
{{ $post->title }}
@endsection
@section('content')
<style type="text/css">.white-box h3{font-family: roboto, corbel, trebuchet ms}</style>
<!--main content start-->
            <?php $authe = Auth::user();?>


            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li><a href="{{ url('posts/all-post') }}"><i class="fa fa-edit"></i> Blogs</a></li>
                          <li class="active">{{ $post->title }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                <div class="col-lg-12"> <div class="white-box"><img class="img-responsive" alt="user" src="{{ asset('ev-assets/uploads/post-images/'.$post->image) }}"></div>
                  <div class="white-box">
                    <div class="text-muted"><span class="m-r-10"><i class="fa  fa-calendar-o"></i> {{ $post->created_at->format('d, M Y \a\t h:i a') }}</span><a href="{{  url('posts/edit/'.$post->slug.'?_token='.csrf_token()) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a class="active"  data-toggle="modal" href="#myModaldel{{ $post->id }}">
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </a></div>
                    <h3 class="m-t-20 m-b-20">{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                  <h3 class="">Comments</h3>
                  <div class="chat-box">
                    <ul class="chat-list slimscroll" style="overflow: hidden;" tabindex="5005">
                      @if($comments)
                      @foreach($comments as $comment)
                     <div class="box-comment">
                      <?php
                        $sender = App\User::find($comment->from_user);
                        ?>
                      <li>
                        <div class="chat-image"> 
                        <?php $author = App\User::find($comment->from_user); ?>
                        <img alt="male" src="{{ asset('ev-assets/uploads/avatars/'.$author->image) }}"></div>
                        <div class="chat-body">
                          <div class="chat-text">
                            <h4>@if(isset($sender))
                        {{ $sender->name }}
                        @endif</h4>
                            <p>{{ $comment->body }} <?php
                      if ($authe->role == $comment->from_user_role) { ?>
                        -  <a class="active"  data-toggle="modal" href="#myModaldel{{ $comment->id }}">Delete</a></p>
                       <?php  } ?>
                       <!-- Delete Modal -->
                        <div class="modal fade" id="myModaldel{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        
                                    </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                        <a href="{{ url('posts/comments/delete/'.$comment->id) }}">
                                        <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></p>
                            <b>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</b> </div>
                        </div>
                      </li>
                      @endforeach
                      @endif
                    </ul>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="input-group">
                          {!! Form::open(array('url'=>'comment/store','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                
                          <input type="text" class="form-control" placeholder="Say something" name="body">
                          <span class="input-group-btn">
                            <input type="hidden" name="from_user" value="{{ $authe->id }}">
                            <input type="hidden" name="from_user_role" value="{{ $authe->role }}">
                            <input type="hidden" name="on_post" value="{{ $post->id }}">
                          <button class="btn btn-success" type="submit">Comment</button>
                          </span> 
                         </form> 
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>

               
@endsection