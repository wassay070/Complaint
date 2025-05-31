@extends('layout.app')

<style>
    .card{
        background-color: white !important;
    }
    .card-header{
        background-color: #dedede !important;
    }
</style>

@section('content')
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h1 class="heading" style="color: #C39D4D;">Admin Dashboard</h1>
        </div>

        <div class="row">
            <!-- Complaints Count Based on Time Period -->
            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-calendar-day"></i> Today's Complaints
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $complaintsToday }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-calendar-week"></i> This Week's Complaints
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $complaintsThisWeek }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-calendar-alt"></i> This Month's Complaints
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $complaintsThisMonth }}</h3>
                    </div>
                </div>
            </div>
    
            <!-- Complaints Count Based on Category -->
            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-book"></i> Academic Complaints
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $academicComplaints }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-tools"></i> Facilities Complaints
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $facilitiesComplaints }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-user-tie"></i> Administration Complaints
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $administrationComplaints }}</h3>
                    </div>
                </div>
            </div>
       
            <!-- Complaints Count Based on Urgency -->
            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-exclamation-circle"></i> Low Urgency
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $lowUrgencyComplaints }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-exclamation-triangle"></i> Medium Urgency
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $mediumUrgencyComplaints }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-bell"></i> High Urgency
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $highUrgencyComplaints }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3" >
                    <div class="card-header" >
                        <i class="fas fa-radiation"></i> Critical Urgency
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $criticalUrgencyComplaints }}</h3>
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
    </div>
@endsection
