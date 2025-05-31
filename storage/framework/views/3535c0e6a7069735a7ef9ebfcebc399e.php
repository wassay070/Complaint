

<style>
    .btn-primary{
        background-color: var(--first-color) !important;
        border-color: var(--first-color) !important;
    }
    .btn-primary:focus{
        box-shadow: none !important;
    }
</style>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h1 class="heading">My Complaints</h1>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Filter Button -->
        <div class="mb-3 text-end">
            <button class="btn btn-primary" id="toggleFilter">
                <i class="fa fa-filter"></i> Filter Complaints
            </button>
        </div>

        <!-- Filter Card (Initially Hidden) -->
        <div class="card mb-4 p-3 shadow-sm" id="filterCard" style="display: none;">
            <form method="GET" action="<?php echo e(route('user.show_complain')); ?>">
                <div class="row">
                    <div class="col-md-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">All</option>
                            <option value="Academic">Academic</option>
                            <option value="Facilities">Facilities</option>
                            <option value="Administration">Administration</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="urgency">Urgency</label>
                        <select name="urgency" id="urgency" class="form-control">
                            <option value="">All</option>
                            <option value="High">High</option>
                            <option value="Critical">Critical</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">All</option>
                            <option value="Pending">Pending</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <a href="<?php echo e(route('user.show_complain')); ?>" class="btn btn-danger w-100 me-2">Clear Filter</a>
                        <button type="submit" class="btn btn-success w-100">Apply Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row my-4">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="main-color">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Urgency</th>
                                <th>Description</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($complaint->title); ?></td>
                                    <td><?php echo e($complaint->category); ?></td>
                                    <td><span class="badge badge-<?php echo e(strtolower($complaint->urgency)); ?>"><?php echo e($complaint->urgency); ?></span></td>
                                    <td><?php echo e($complaint->description); ?></td>
                                    <td><?php echo e($complaint->created_at->format('d M, Y')); ?></td>
                                    <td><?php echo e($complaint->status); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('complaints.edit', $complaint->id)); ?>" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm deleteComplaint" data-id="<?php echo e($complaint->id); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center">No complaints found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Toggle Filter Card
            $("#toggleFilter").click(function() {
                $("#filterCard").slideToggle();
            });

            // Delete Complaint Confirmation
            $(document).on('click', '.deleteComplaint', function () {
                let complaintId = $(this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?php echo e(route('complaints.destroy', '')); ?>/" + complaintId,
                            type: "DELETE",
                            data: {
                                _token: "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (response) {
                                Swal.fire("Deleted!", response.success, "success");
                                location.reload();
                            },
                            error: function () {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\complain\resources\views/user/show_complain.blade.php ENDPATH**/ ?>