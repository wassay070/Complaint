@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="text-center">
        <h1 class="heading">Edit Complaint</h1>
    </div>

    <form class="custom-form mt-2" method="post" action="{{ route('complaints.update', $complaint->id) }}">
        @csrf
        @method('PUT')

        <div class="row mt-3">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label class="pb-1" for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $complaint->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label class="pb-1" for="category">Category</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="Academic" {{ $complaint->category == 'Academic' ? 'selected' : '' }}>Academic</option>
                        <option value="Facilities" {{ $complaint->category == 'Facilities' ? 'selected' : '' }}>Facilities</option>
                        <option value="Administration" {{ $complaint->category == 'Administration' ? 'selected' : '' }}>Administration</option>
                        <option value="Others" {{ $complaint->category == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label class="pb-1" for="urgency">Urgency Level</label>
                    <select class="form-control @error('urgency') is-invalid @enderror" id="urgency" name="urgency">
                        <option value="Low" {{ $complaint->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                        <option value="Medium" {{ $complaint->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="High" {{ $complaint->urgency == 'High' ? 'selected' : '' }}>High</option>
                        <option value="Critical" {{ $complaint->urgency == 'Critical' ? 'selected' : '' }}>Critical</option>
                    </select>
                    @error('urgency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <label class="pb-1" for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" 
                        name="description" rows="4">{{ old('description', $complaint->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center mt-3">
            <button type="submit" class="btn main-color">Update Complaint</button>
        </div>

    </form>
</div>
@endsection
