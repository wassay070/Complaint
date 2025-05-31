

<?php $__env->startSection('style'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="text-center">
            <h1 class="heading">Add Complaint</h1>
        </div>
       
        <form action="<?php echo e(route('complaints.store')); ?>" class="custom-form mt-2" method="post">
            <?php echo csrf_field(); ?>

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
                            placeholder="Enter a short summary of the issue" name="title" value="<?php echo e(old('title')); ?>">
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
                            <option value="">Select Category</option>
                            <option value="Academic" <?php echo e(old('category') == 'Academic' ? 'selected' : ''); ?>>Academic</option>
                            <option value="Facilities" <?php echo e(old('category') == 'Facilities' ? 'selected' : ''); ?>>Facilities</option>
                            <option value="Administration" <?php echo e(old('category') == 'Administration' ? 'selected' : ''); ?>>Administration</option>
                            <option value="Others" <?php echo e(old('category') == 'Others' ? 'selected' : ''); ?>>Others</option>
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
                            <option value="">Select Urgency Level</option>
                            <option value="Low" <?php echo e(old('urgency') == 'Low' ? 'selected' : ''); ?>>Low</option>
                            <option value="Medium" <?php echo e(old('urgency') == 'Medium' ? 'selected' : ''); ?>>Medium</option>
                            <option value="High" <?php echo e(old('urgency') == 'High' ? 'selected' : ''); ?>>High</option>
                            <option value="Critical" <?php echo e(old('urgency') == 'Critical' ? 'selected' : ''); ?>>Critical</option>
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
                            placeholder="Provide a detailed explanation" name="description" rows="4"><?php echo e(old('description')); ?></textarea>
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
                <button type="submit" class="btn main-color">Add Complaint</button>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
            $('#urgency').select2({
                width: '100%', // Set the width to 100% or adjust as needed
                containerCssClass: 'select2-custom-container', // Add a custom container class
            });

            $('#category').select2({
                width: '100%', // Set the width to 100% or adjust as needed
                containerCssClass: 'select2-custom-container', // Add a custom container class
            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\complain\resources\views/user/add_complain.blade.php ENDPATH**/ ?>