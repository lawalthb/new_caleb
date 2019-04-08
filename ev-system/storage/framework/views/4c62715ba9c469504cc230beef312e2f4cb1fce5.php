<?php $__env->startSection('title'); ?>
<?php echo e(trans('report_lang.report_mark')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
            <li class="active">View Exam Report</li>
        </ul>
        <!-- breadcrumbs end -->
    </div>
</div>
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
              View Exam Report
            </header>
            <div class="panel-body">
                <?php if(Session::get('message')): ?>
                <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo e(Session::get('message')); ?>

                </div>
                <?php endif; ?>
                <?php echo Form::open(array('url'=>'student/exam-result/'. Auth::user()->id,'id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)); ?>

                <div class="col-lg-9">
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Select Term
                        </label>
                        <div class="col-lg-9">
                        <select name="term_id" class="form-control"   required>
                            <option value="">Choose..</option>
                            <?php $__currentLoopData = App\Term::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($term->id); ?>"><?php echo e($term->name); ?> - <?php echo e($term->academic_session ? $term->academic_session->name : '-'); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label"></label>
                        <div class="col-lg-9">
                            <?php echo Form::submit('Submit', array('class'=>'btn btn-primary')); ?>

                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </section>

    </div>
</div>
               

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>