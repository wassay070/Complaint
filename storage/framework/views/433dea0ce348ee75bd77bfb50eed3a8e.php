

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="text-center">
        <h1 class="heading">Edit Complaint</h1>
    </div>

    <form class="custom-form mt-2" method="post" action="<?php echo e(route('complaints.update', $complaint->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row mt-3">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label class="pb-1" for="title">Title</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title"
                        name="title" value="<?php echo e(old('title', $complaint->title)); ?>">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label class="pb-1" for="category">Category</label>
                    <select class="form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="category" name="category">
                        <option value="Academic" <?php echo e($complaint->category == 'Academic' ? 'selected' : ''); ?>>Academic</option>
                        <option value="Facilities" <?php echo e($complaint->category == 'Facilities' ? 'selected' : ''); ?>>Facilities</option>
                        <option value="Administration" <?php echo e($complaint->category == 'Administration' ? 'selected' : ''); ?>>Administration</option>
                        <option value="Others" <?php echo e($complaint->category == 'Others' ? 'selected' : ''); ?>>Others</option>
                    </select>
                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label class="pb-1" for="urgency">Urgency Level</label>
                    <select class="form-control <?php $__errorArgs = ['urgency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="urgency" name="urgency">
                        <option value="Low" <?php echo e($complaint->urgency == 'Low' ? 'selected' : ''); ?>>Low</option>
                        <option value="Medium" <?php echo e($complaint->urgency == 'Medium' ? 'selected' : ''); ?>>Medium</option>
                        <option value="High" <?php echo e($complaint->urgency == 'High' ? 'selected' : ''); ?>>High</option>
                        <option value="Critical" <?php echo e($complaint->urgency == 'Critical' ? 'selected' : ''); ?>>Critical</option>
                    </select>
                    <?php $__errorArgs = ['urgency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <label class="pb-1" for="description">Description</label>
                    <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" 
                        name="description" rows="4"><?php echo e(old('description', $complaint->description)); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center mt-3">
            <button type="submit" class="btn main-color">Update Complaint</button>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\complain\resources\views/user/edit.blade.php ENDPATH**/ ?>