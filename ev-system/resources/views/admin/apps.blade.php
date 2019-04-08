@extends('layouts.app')
@section('title')
    Apps
@endsection
@section('content')
    
    <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                    <li class="active">Apps</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <!-- Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Create App</h4>
                            </div>
                            {!! Form::open(array('url'=>'add-app','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label  class="col-lg-3 control-label">App Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-warning" type="submit" name='submit'>Create App</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <a class="btn btn-success"  data-toggle="modal" href="#myModal2" style="margin:15px">
                    Create App
                </a>
                    <div id="hide-table">
                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Token</th>
                                    <th>Secret</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $apps as $key => $app )
                                    <tr>
                                        <td data-title="#">{{ $key+1 }}</td>
                                        <td data-title="Name">{{ $app->name }}</td>
                                        <td data-title="Token">{{ $app->app_token }}</td>
                                        <td data-title="Secret">{{ $app->app_secret }}</td>
                                        <td data-title="Actions">
                                        <a class="active" data-toggle="modal" href="#myModalEach{{ $app->id }}">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModalEach{{ $app->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Update App</h4>
                                                    </div>
                                                    <form action={{url('update-app')}} method="post">
                                                        <input name="_token" type="hidden" value={{csrf_token()}}>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label  class="col-lg-3 control-label">App Name</label>
                                                                <div class="col-lg-9">
                                                                    <input type="hidden" name="id" value="{{ $app->id }}">
                                                                    <input type="text" class="form-control"  name="name" value="{{ $app->name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                            <button class="btn btn-warning" type="submit" name='submit'>Update App</button>
                                                        </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal -->
                                            <a class="active"  data-toggle="modal" href="#myModaldel{{ $app->id }}">
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </a>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="myModaldel{{ $app->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            
                                                        </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                        <div class="modal-footer">
                                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                            <a class="btn btn-danger" href="{{ url('app/delete/'.$app->id) }}">Delete App</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </section>
        </div>
    </div>
               

@endsection