<?php $__env->startSection('title'); ?>
Edit Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--main content start-->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"></i><?php echo e(trans('dashboard_lang.panel_title')); ?></a></li>
                          <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-edit"></i> Posts</a></li>
                          <li class="active">Edit Posts</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
          <!-- page start-->

              <!--wysihtml5 start-->
              <div class="row">
                  <div class="col-md-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Edit Posts
                              <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                              </span>
                          </header>
                          
                          <div class="panel-body">
                              <form action="<?php echo e(url('posts/update')); ?>" class="form-horizontal tasi-form" method="POST">
                                  <div class="form-group col-md-9">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input required="required" value="<?php if(!old('title')): ?><?php echo e($post->title); ?><?php endif; ?><?php echo e(old('title')); ?>" name="title" placeholder="Enter title here" type="text" class="form-control" id="exampleInputEmail1">
                                  </div>
                                  <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                                  <div class="form-group col-md-9">
                                          <label class="exampleInputFile">Body</label><br>
                                          <textarea name='body' class="form-control" rows="10"><?php echo e($post->body); ?></textarea>
                                        
                                  </div>
                                    <div class="form-group col-md-9">
                                    	<?php if($post->active == '1'): ?>
										<button type="submit" name='publish' class="btn btn-primary">Update</button>
										<?php else: ?>
										<button type="submit" name='publish' class="btn btn-primary">Publish</button>
										<?php endif; ?>
										<button type="submit" name='save' class="btn btn-primary">Save Draft</button>
										<a href="<?php echo e(url('posts/delete/'.$post->id.'?_token='.csrf_token())); ?>" class="btn btn-danger">Delete</a>
                                    </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!--wysihtml5 end-->


  
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>