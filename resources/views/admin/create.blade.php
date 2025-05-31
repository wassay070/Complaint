@extends('layout.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="heading">Add Complaint Handler</h1>
        </div>

        <div class="card p-4">
            <form action="{{ route('resolvers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                            <i class="bx bx-show" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Add Handler</button>
            </form>
        </div>
    </div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.replace("bx-show", "bx-hide");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.replace("bx-hide", "bx-show");
        }
    }
</script>

@endsection
