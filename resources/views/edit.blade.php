@extends('layout.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="heading">Edit Profile</h1>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="text" name="id" value="{{ $resolver->id }}" hidden>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $resolver->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $resolver->email }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $resolver->phone }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" value="{{ $resolver->plain_password }}">
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                <i class="bx bx-show"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('resolvers.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    }
</script>

@endsection
