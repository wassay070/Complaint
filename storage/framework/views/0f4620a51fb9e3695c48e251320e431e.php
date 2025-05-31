
<style>
    .btn-primary {
        background-color: var(--first-color) !important;
        border-color: var(--first-color) !important;
    }
</style>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="heading">Complaint Handlers</h1>
        </div>

       
        <div class="d-flex justify-content-end mb-3">
            <button id="toggleFilterBtn" class="btn btn-primary me-2">
                <i class="bx bx-filter"></i> Filter
            </button>
            <a href="<?php echo e(route('resolvers.create')); ?>" class="btn btn-primary">Add Complaint Handler</a>
        </div>
        
        <div class="card p-3 mb-3" id="filterCard" style="display: none;">
            <form id="filterForm">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <input type="text" id="filterName" class="form-control" placeholder="Filter by Name">
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" id="filterEmail" class="form-control" placeholder="Filter by Email">
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" id="filterPhone" class="form-control" placeholder="Filter by Phone">
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" id="filterComplaints" class="form-control" placeholder="Min Assigned Complaints">
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary" onclick="resetFilters()">Reset</button>
                </div>
            </form>
        </div>


        <div class="table-responsive">
            <table class="table table-hover" id="resolverTable">
                <thead class="main-color">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Assigned Complaints</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $resolvers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $resolver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr id="resolver-<?php echo e($resolver->id); ?>">
                            <td><?php echo e($index + 1); ?></td>
                            <td class="resolver-name"><?php echo e($resolver->name); ?></td>
                            <td class="resolver-email"><?php echo e($resolver->email); ?></td>
                            <td>
                                <?php if($resolver->created_at == $resolver->updated_at): ?>
                                    <span class="password-text" style="visibility:hidden;"><?php echo e($resolver->plain_password); ?></span>
                                    <i class="bx bx-show password-toggle" onclick="togglePassword(this)"></i>
                                <?php else: ?>
                                    <span class="password-text">Password Changed</span>
                                <?php endif; ?>
                            </td>
                            <td class="resolver-phone"><?php echo e($resolver->phone); ?></td>
                            <td class="resolver-complaints"><?php echo e($resolver->assigned_complaints_count); ?></td>
                            <td>
                                <a href="<?php echo e(route('resolvers.edit', $resolver->id)); ?>" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="deleteResolver(<?php echo e($resolver->id); ?>)">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center">No complaint handlers found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deleteResolver(id) {
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
                fetch(`<?php echo e(url('/resolvers')); ?>/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        document.getElementById(`resolver-${id}`).remove();
                        Swal.fire(
                            "Deleted!",
                            "Complaint handler has been deleted.",
                            "success"
                        );
                    } else {
                        Swal.fire(
                            "Error!",
                            "Failed to delete complaint handler.",
                            "error"
                        );
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire("Error!", "Something went wrong.", "error");
                });
            }
        });
    }

    // ✅ Filtering Function
    document.getElementById("filterForm").addEventListener("input", function () {
        let nameFilter = document.getElementById("filterName").value.toLowerCase();
        let emailFilter = document.getElementById("filterEmail").value.toLowerCase();
        let phoneFilter = document.getElementById("filterPhone").value.toLowerCase();
        let complaintsFilter = parseInt(document.getElementById("filterComplaints").value) || 0;

        document.querySelectorAll("#resolverTable tbody tr").forEach(row => {
            let name = row.querySelector(".resolver-name").textContent.toLowerCase();
            let email = row.querySelector(".resolver-email").textContent.toLowerCase();
            let phone = row.querySelector(".resolver-phone").textContent.toLowerCase();
            let complaints = parseInt(row.querySelector(".resolver-complaints").textContent) || 0;

            let matches = 
                name.includes(nameFilter) &&
                email.includes(emailFilter) &&
                phone.includes(phoneFilter) &&
                (complaints >= complaintsFilter);

            row.style.display = matches ? "" : "none";
        });
    });

    // ✅ Reset Filters
    function resetFilters() {
        document.getElementById("filterForm").reset();
        document.querySelectorAll("#resolverTable tbody tr").forEach(row => {
            row.style.display = "";
        });
    }
</script>
<script>
    document.getElementById('toggleFilterBtn').addEventListener('click', function () {
        let filterCard = document.getElementById('filterCard');
        filterCard.style.display = (filterCard.style.display === 'none' || filterCard.style.display === '') ? 'block' : 'none';
    });

    function resetFilters() {
        document.getElementById("filterForm").reset();
    }
</script>

<script>
    function togglePassword(icon) {
        let passwordSpan = icon.previousElementSibling;
        if (passwordSpan.style.visibility === "hidden") {
            passwordSpan.style.visibility = "visible";
            icon.classList.remove("bx-show");
            icon.classList.add("bx-hide");
        } else {
            passwordSpan.style.visibility = "hidden";
            icon.classList.remove("bx-hide");
            icon.classList.add("bx-show");
        }
    }
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\complain\resources\views/admin/resolvers.blade.php ENDPATH**/ ?>