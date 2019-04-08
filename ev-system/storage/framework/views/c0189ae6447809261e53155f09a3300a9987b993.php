<?php if( !$subjects->count() ): ?>
<option value="">There is no subject for this class.</option>
<?php else: ?> 
<?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                          <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->title); ?></option>
                          
                        
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>