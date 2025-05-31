@extends('layout.app')

<style>
    .btn-primary {
        background-color: var(--first-color) !important;
        border-color: var(--first-color) !important;
    }
    .btn-primary:focus {
        box-shadow: none !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__clear {
        cursor: pointer;
        float: right;
        font-weight: bold;
        height: 26px;
        margin-right: 20px;
        padding-right: 0px;
        margin-top: 10px;
        display: none;
    }
</style>

@section('content')
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h1 class="heading">All Complaints</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3 text-end">
            <button class="btn btn-primary" id="toggleFilter">
                <i class="fa fa-filter"></i> Filter Complaints
            </button>
        </div>

        <div class="card mb-4 p-3 shadow-sm" id="filterCard" style="display: none;">
            <form method="GET" action="{{ route('admin.show_complain') }}">
                <div class="row">
                    <div class="col-md-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ request('name') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{ request('email') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">All</option>
                            <option value="Academic" {{ request('category') == 'Academic' ? 'selected' : '' }}>Academic</option>
                            <option value="Facilities" {{ request('category') == 'Facilities' ? 'selected' : '' }}>Facilities</option>
                            <option value="Administration" {{ request('category') == 'Administration' ? 'selected' : '' }}>Administration</option>
                            <option value="Others" {{ request('category') == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="urgency">Urgency</label>
                        <select name="urgency" id="urgency" class="form-control">
                            <option value="">All</option>
                            <option value="High" {{ request('urgency') == 'High' ? 'selected' : '' }}>High</option>
                            <option value="Critical" {{ request('urgency') == 'Critical' ? 'selected' : '' }}>Critical</option>
                            <option value="Medium" {{ request('urgency') == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="Low" {{ request('urgency') == 'Low' ? 'selected' : '' }}>Low</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">All</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Resolved" {{ request('status') == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="Closed" {{ request('status') == 'Closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="assigned_to">Assigned To</label>
                        <select name="assigned_to" id="assigned_to" class="form-control select2">
                            <option value="">All</option>
                            @foreach($resolvers as $resolver)
                                <option value="{{ $resolver->id }}" {{ request('assigned_to') == $resolver->id ? 'selected' : '' }}>
                                    {{ $resolver->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-2 mt-4 d-flex align-items-end">
                        <a href="{{ route('admin.show_complain') }}" class="btn btn-danger w-100 me-2">Clear</a>
                        <button type="submit" class="btn btn-success w-100">Apply</button>
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
                                <th>Complain By</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($complaints as $index => $complaint)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $complaint->title }}</td>
                                    <td>{{ $complaint->category }}</td>
                                    <td><span class="badge badge-{{ strtolower($complaint->urgency) }}">{{ $complaint->urgency }}</span></td>
                                    <td>{{ Str::limit($complaint->description, 50) }}</td>
                                    <td>{{ $complaint->created_at->format('d M, Y') }}</td>
                                    <td>{{ $complaint->complainant->name ?? 'N/A' }}</td>
                                    <td>{{ $complaint->complainant->email ?? 'N/A' }}</td>
                                    <td>{{ $complaint->complainant->phone ?? 'N/A' }}</td>
                                    <td>
                                        <select class="form-control assign-resolver select2" data-id="{{ $complaint->id }}">
                                            <option value="">Unassigned</option>
                                            @foreach($resolvers as $resolver)
                                                <option value="{{ $resolver->id }}" {{ $complaint->assign_to == $resolver->id ? 'selected' : '' }}>
                                                    {{ $resolver->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    

                                    <td>{{ $complaint->status }}</td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">No complaints found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $("#toggleFilter").click(function() {
                $("#filterCard").slideToggle();
            });

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
                            url: "{{ route('complaints.destroy', '') }}/" + complaintId,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {
        $(".assign-resolver").change(function() {
            let complaintId = $(this).data("id");
            let assignedTo = $(this).val();
    
            $.ajax({
                url: "{{ route('complaints.assign') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    complaint_id: complaintId,
                    assigned_to: assignedTo
                },
                beforeSend: function() {
                    Swal.fire({
                        title: "Please wait...",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        willOpen: function() {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    Swal.fire("Success!", response.success, "success");
                },
                error: function() {
                    Swal.fire("Error!", "Failed to update resolver.", "error");
                }
            });
        });

       

    });
    </script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Resolver",
            allowClear: true,
            width: '100%'
        });
    });
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Resolver",
            allowClear: true,
            width: '100%'
        });
    });

</script>    