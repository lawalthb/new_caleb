<?php $__env->startSection('title'); ?>
    <?php echo e(trans('classes_lang.panel_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i> <?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li class="active"><?php echo e(trans('classes_lang.panel_title')); ?></li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
            </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo e(trans('classes_lang.panel_title')); ?>

                          </header>
                          <?php if(Session::has('message')): ?>   
                            <div class="white-box">
                              <?php if(Session::get('message') == trans('topbar_menu_lang.success')): ?>
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo e(Session::get('message')); ?>

                              </div>
                              <?php else: ?>
                              <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo e(Session::get('message')); ?>

                              </div>
                              <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php if(Session::has('data')): ?>   
                            <div class="container">
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo e(Session::get('data')); ?>

                              </div>
                            </div>
                            <?php endif; ?>
                           <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title"><?php echo e(trans('classes_lang.add_class')); ?></h4>
                                          </div>
                                          <?php echo Form::open(array('url'=>'class/create_class','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"><?php echo e(trans('classes_lang.classes_name')); ?></label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="title">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label"><?php echo e(trans('classes_lang.teacher_name')); ?>

                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="teacher_id" class="form-control" data-validate="required" id="class_id" required>
                                                    <option value="">Choose..</option>
                                                    <?php $__currentLoopData = $teacherlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teachers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($teachers->id); ?>"><?php echo e($teachers->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'><?php echo e(trans('classes_lang.add_class')); ?></button>
                                          </div>
                                          <?php echo Form::close(); ?>

                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  <?php echo e(trans('classes_lang.add_class')); ?>

                              </a>
                          
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('classes_lang.classes_name')); ?></th>
                                    <th><?php echo e(trans('classes_lang.teacher_name')); ?></th>
                                    <th><?php echo e(trans('student_lang.panel_title')); ?></th>
                                    <th><?php echo e(trans('student_lang.action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if( !$classes->count() ): ?>
                                    <div style="padding: 10px">There is no class available</div>
                                    <?php else: ?> 

                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-title="#"><?php echo e($key+1); ?></td>
                                    <td data-title="<?php echo e(trans('classes_lang.classes_name')); ?>"><?php echo e($class->title); ?></td>
                                    <td data-title="<?php echo e(trans('classes_lang.teacher_name')); ?>" class="hidden-phone"><?php echo e(App\User::find($class->teacher_id) ? App\User::find($class->teacher_id)->name : null); ?></td>
                                    <td data-title="<?php echo e(trans('student_lang.panel_title')); ?>"><?php echo e($class->student($class->id)->count()); ?></td>
                                    <td data-title="<?php echo e(trans('student_lang.action')); ?>">
                                        <a class="active" data-toggle="modal" href="#myModal2<?php echo e($class->id); ?>">
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <!-- Modal -->
                                    <div class="modal fade" id="myModal2<?php echo e($class->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title"><?php echo e(trans('classes_lang.update_class')); ?></h4>
                                                </div>
                                                <?php echo Form::open(array('url'=>'class/update_class','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                                                <div class="modal-body">

                                                
                                                    <div class="form-group">
                                                        <label  class="col-lg-2 control-label"><?php echo e(trans('classes_lang.classes_name')); ?></label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" id="f-name" value="<?php echo e($class->title); ?>" name="title">
                                                            <input type="hidden" class="form-control" id="f-name" value="<?php echo e($class->id); ?>" name="id">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-lg-2 control-label"><?php echo e(trans('classes_lang.teacher_name')); ?>

                                                        </label>
                                                        <div class="col-lg-9">
                                                        <select name="teacher_id" class="form-control" data-validate="required" id="class_id" 
                                                                            data-message-required="this is required"
                                                                                onchange="return get_class_sections(this.value)">
                                                            <option value="">Choose..</option>
                                                            <?php $__currentLoopData = $teacherlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teachers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($teachers->id); ?>" <?php if($teachers->id == $class->teacher_id){echo 'selected';}?>><?php echo e($teachers->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                        </div>
                                                    </div>
                                                            </div>
                                                <div class="modal-footer">
                                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                    <button class="btn btn-warning" type="submit" name='submit'><?php echo e(trans('classes_lang.update_class')); ?></button>
                                                
                                                </div>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal -->
                                <a class="active"  data-toggle="modal" href="#myModaldel<?php echo e($class->id); ?>">
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                        </a>
                                        <!-- Delete Modal -->
                                <div class="modal fade" id="myModaldel<?php echo e($class->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                
                                            </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                            <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                <a href="<?php echo e(url('class/delete/'.$class->id)); ?>">
                                                <button class="btn btn-danger"><?php echo e(trans('student_lang.delete')); ?></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal -->
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                      </section>
                  </div>
              </div>
               

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>