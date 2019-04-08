@extends('layouts.app')

@section('title')
Add New Post
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-edit"></i> Posts</a></li>
                          <li class="active">Create Posts</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
          <!-- page start-->
              <div class="row">
                  <div class="col-md-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Create New Posts
                          </header>
                          
                          <div class="panel-body">
                            {!! Form::open(array('url'=>'posts/new-post','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                  <div class="form-group col-md-9">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input required="required" value="{{ old('title') }}" name="title" placeholder="Enter title here" type="text" class="form-control" id="exampleInputEmail1">
                                  </div>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <div class="form-group col-md-9">
                                    <label for="exampleInputFile">Thumbnail<span class="required">*</span>
                                    </label>
                                      <input type="file" name="file">
                                  </div>
                                  <div class="form-group col-md-9">
                                          <label class="exampleInputFile">Body</label><br>
                                          <textarea name='body' class="ckeditor form-control" rows="10">{{ old('body') }}</textarea>
                                        
                                  </div>
                                    <div class="form-group col-md-9">
                                      <button type="submit" name='publish' class="btn btn-primary">Publish</button>
                                      <button type="submit" name='save' class="btn btn-primary">Save Draft</button>
                                    </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!--wysihtml5 end-->

  
@endsection
