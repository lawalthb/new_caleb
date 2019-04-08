<?php $__env->startSection('title'); ?>
<?php echo e(trans('student_lang.add_student')); ?> (<?php echo e(trans('mailandsms_lang.mailandsms_bulk')); ?>)
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i> <?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li><a href="#"><?php echo e(trans('topbar_menu_lang.menu_student')); ?></a></li>
                          <li class="active"><?php echo e(trans('student_lang.add_student')); ?> (<?php echo e(trans('mailandsms_lang.mailandsms_bulk')); ?>)</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>




            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo e(trans('student_lang.add_student')); ?> (<?php echo e(trans('mailandsms_lang.mailandsms_bulk')); ?>)

                          </header>
                          <header class="panel-heading">
                          <a class="btn btn-primary" href="<?php echo e(url('ev-assets\uploads\sample-import\students.csv')); ?>" style="margin:5px">
                                  Download Sample
                              </a>
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
                          <div class="panel-body">
                          <?php echo Form::open(array('url'=>'students/create_bulk_student','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                          <div class="col-lg-9">
                              <div class="form-group">
                                  <label  class="col-lg-2 control-label"><?php echo e(trans('topbar_menu_lang.menu_classes')); ?>

                                </label>
                                <div class="col-lg-9">
                                  <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                                      data-message-required="this is required"
                                                        onchange="return get_class_sections(this.value)" required>
                                    <option value="">Choose..</option>
                                    <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($classes->id); ?>"><?php echo e($classes->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label  class="col-lg-2 control-label"><?php echo e(trans('mailandsms_lang.mailandsms_bulk')); ?>

                                                        </label>
                                <div class="col-lg-9">
                                <input type="file" name="import_file" required="required" class="form-control" >
                                </div>
                              </div>
                              
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <?php echo Form::submit(trans('student_lang.add_student').' ('.trans('mailandsms_lang.mailandsms_bulk').')', array('class'=>'btn btn-primary')); ?>

                                </div>
                              </div>
                        <?php echo Form::close(); ?>

                      </div>
                      </section>
                  </div> 
                  </div> 
      

      




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>