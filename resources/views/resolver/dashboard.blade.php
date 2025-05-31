@extends('layout.app')
<style>
    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 6px 7px !important;
        font-size: 15px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
</style>
@section('content')
<div class="container">
    <div class="text-center mb-4">
        <h1 class="heading" style="color: #C39D4D;">Complaint Handler Dashboard</h1>
    </div>

    <div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>


    <!-- Complaint Statistics -->
    <div class="row mb-4">


        <div class="col-md-3">
            <div class="card mb-3" >
                <div class="card-header" >
                    <i class="fas fa-check"></i> Total Complaints
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $totalComplaints }}</h3>
                </div>
            </div>
        </div>



        <div class="col-md-3">
            <div class="card mb-3" >
                <div class="card-header" >
                    <i class="fas fa-spinner"></i> Pending Complaints
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $pendingComplaints }}</h3>
                </div>
            </div>
        </div>

       

        <div class="col-md-3">
            <div class="card mb-3" >
                <div class="card-header" >
                    <i class="fas fa-check"></i> Resolved Complaints
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $resolvedComplaints }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3" >
                <div class="card-header" >
                    <i class="fas fa-check"></i> Closed Complaints
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $closedComplaints }}</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-hover" id="resolverTable">
            <thead class="main-color">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Complaint By</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->id }}</td>
                    <td>{{ $complaint->title }}</td>
                    <td>{{ $complaint->description }}</td>
                    <td>{{ $complaint->category }}</td>
                    <td>{{ $complaint->complainant->name }}</td>
                    <td>{{ $complaint->complainant->email }}</td>
                    <td>
                        <form action="{{ route('resolver.updateStatus', $complaint->id) }}" method="POST">
                            @csrf
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="closed" {{ $complaint->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </form>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
