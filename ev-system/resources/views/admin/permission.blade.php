@extends('layouts.app')
@section('title')
Permissions
@endsection
@section('content')
    
    <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                    <li class="active">Permissions</li>
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
                                <h4 class="modal-title">Add Role</h4>
                            </div>
                            {!! Form::open(array('url'=>'add-role','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label  class="col-lg-3 control-label">Role Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  name="name">
                                        </div>
                                    </div>
                                    @foreach( $columns as $name => $title)
                                        <div class="form-group">
                                            <label  class="col-lg-3 control-label">{{ ucfirst(str_replace('_', ' ', $title)) }}</label>
                                            <div class="col-lg-9">
                                                <input type="checkbox" name="{{$title}}"/>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-warning" type="submit" name='submit'>Add Role</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <a class="btn btn-success"  data-toggle="modal" href="#myModal2" style="margin:15px">
                    Add Role
                </a>
                <form role="form" method="POST" action="{{ url('/update-permission') }}" id="permission-form">
                        {{ csrf_field() }}
                    <div>
                        <table id="" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Permissions</th>
                                    @foreach( $roles as $key => $role ) 
                                        <th>{{ ucfirst($role->name) }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $columns as $name => $title)
                                    <tr>
                                        <td>{{ ucfirst(str_replace('_', ' ', $title)) }}</td>
                                        @foreach( $roles as $key => $role )
                                            <td>
                                                <input type="checkbox" <?php if($role->$title == 1){ echo 'checked="checked"';} ?> name="{{$title}}[]" value="{{$role->$title}}"/>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-success" style="margin:15px">
                        Update Permissions
                    </button>
                </form>
            </section>
        </div>
    </div>
               

@endsection