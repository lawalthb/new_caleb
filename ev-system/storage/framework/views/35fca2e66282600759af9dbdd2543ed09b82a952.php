<?php $__env->startSection('title'); ?>
<?php echo e(trans('hostel_lang.panel_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active"><?php echo e(trans('hostel_lang.panel_title')); ?></li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
                              
            <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?php echo e(trans('hostel_lang.add_hostel')); ?></h4>
                        </div>
                        <?php echo Form::open(array('url'=>'dormitory/create_dormitory','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                        <div class="modal-body">

                        
                            <div class="form-group">
                                <label  class="col-lg-2 control-label"><?php echo e(trans('hostel_lang.hostel_name')); ?></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="f-name" value="" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Room Number</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="f-name" value="" name="room_no">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label"><?php echo e(trans('hostel_lang.hostel_note')); ?></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="f-name" value="" name="desc">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                </div>
                            </div>
                                    </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                            <button class="btn btn-warning" type="submit" name='submit'><?php echo e(trans('hostel_lang.add_hostel')); ?></button>
                        
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
            <!-- modal -->
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <?php echo e(trans('hostel_lang.panel_title')); ?>

                          </header>
                        <?php if(Auth::user()->permission('add_hostel')): ?>
                            <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                             <?php echo e(trans('hostel_lang.add_hostel')); ?>

                            </a>
                        <?php endif; ?>
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                              <tr>
                                  <th>#</th>
                                  <th><?php echo e(trans('hostel_lang.hostel_name')); ?></th>
                                  <th> Room Number</th>
                                  <th><?php echo e(trans('hostel_lang.hostel_note')); ?></th>
                                  <?php if(Auth::user()->permission('add_hostel')): ?>   
                                  <th><?php echo e(trans('student_lang.action')); ?></th>
                                  <?php endif; ?>
                              </tr>
                              </thead>
                              <tbody>
                               
                                <?php $__currentLoopData = $dormitories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                  <td data-title="#"><a href="#"><?php echo e($post->id); ?></a></td>
                                  <td data-title="<?php echo e(trans('hostel_lang.hostel_name')); ?>"><?php echo e($post->name); ?></td>
                                  <td data-title="Room Number"><?php echo e($post->room_number); ?></td>
                                  <td data-title="<?php echo e(trans('hostel_lang.hostel_note')); ?>"><?php echo e($post->description); ?></td>
                                  <?php if(Auth::user()->permission('add_hostel')): ?>                                  
                                  <td data-title="<?php echo e(trans('student_lang.action')); ?>">
                                      <a class="active" href="<?php echo e(url('editdormitory/'.$post->id)); ?>">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                       <a class="active"  data-toggle="modal" href="#myModaldel<?php echo e($post->id); ?>">
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      </a>
                                    
                                      <!-- Delete Modal -->
                                        <div class="modal fade" id="myModaldel<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        
                                                    </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                        <a href="<?php echo e(url('dormitory/delete/'.$post->id)); ?>">
                                                        <button class="btn btn-danger"><?php echo e(trans('student_lang.delete')); ?></button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal -->
                                  </td>
                                  <?php endif; ?>
                              </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>