@extends('layout.app')

@section('style')
    
@endsection

@section('content')
    <div class="container-fluid">

        <div class="text-center">
            <h1 class="heading">Add Complaint</h1>
        </div>
       
        <form action="{{ route('complaints.store') }}" class="custom-form mt-2" method="post">
            @csrf

            <div class="row mt-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label class="pb-1" for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            placeholder="Enter a short summary of the issue" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label class="pb-1" for="category">Category</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                            <option value="">Select Category</option>
                            <option value="Academic" {{ old('category') == 'Academic' ? 'selected' : '' }}>Academic</option>
                            <option value="Facilities" {{ old('category') == 'Facilities' ? 'selected' : '' }}>Facilities</option>
                            <option value="Administration" {{ old('category') == 'Administration' ? 'selected' : '' }}>Administration</option>
                            <option value="Others" {{ old('category') == 'Others' ? 'selected' : '' }}>Others</option>
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
                            <option value="">Select Urgency Level</option>
                            <option value="Low" {{ old('urgency') == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ old('urgency') == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ old('urgency') == 'High' ? 'selected' : '' }}>High</option>
                            <option value="Critical" {{ old('urgency') == 'Critical' ? 'selected' : '' }}>Critical</option>
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
                            placeholder="Provide a detailed explanation" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            
            <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn main-color">Add Complaint</button>
            </div>

        </form>
    </div>
@endsection


@section('script')
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
@endsection
