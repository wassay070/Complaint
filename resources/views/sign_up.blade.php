<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="icon" href="{{ asset('icon/logo.png') }}"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #deeefd;
        }

        .login-box {
            max-width: 600px;
            width: 100%;
            /* padding: 20px; */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           
            border-radius: 20px; 
        }


        .login-box img {
            max-width: 300px;
            height: 450px;
            margin-right: 20px;
            border-radius: 20px 0px 0px 20px
        }
        @media (max-width: 576px) {
            .login-box {
                flex-direction: column; /* Reverse the order for small screens */
            }
            .login-box img {
                max-width: 80%;
                height: 250px;
                margin-left: 40px;
                margin-top: 20px;
                margin-bottom: 10px;
                border-radius: 20px;
            }
            form{
                margin-right: 15px;
                margin-bottom: 10px; 
            }

        }
    </style>
</head>

<body>

    <div class="login-box" >
        <div class="row justify-content-center pt-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="d-flex">
            <div>
                <img src="{{ asset('assets/img/login.svg') }}" alt="Logo">
            </div>
    
    
            <form  action="{{ route('signup.register') }}" method="post" class="pt-2 pb-4 ps-2 pe-4">
                @csrf
    
    
                <h3 style="color: darkblue">Send Request</h3>
            
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" placeholder="Ali Usman" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autocomplete="off" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div style="margin-top: -10px;" class="mb-2">
                    <span class="">
                        <input type="checkbox" id="show-password"><label for="show-password" class="mx-2">Show Password</label>
                    </span>
                </div>
    
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" autocomplete="off" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
            
                <button type="submit" class="btn btn-primary btn-block">Send Request</button>
                <h6 class="text-secondary mt-3">Already have an account? <a href="/">Signin</a> </h6>

            </form>
        </div>
        
    </div>

    <!-- Link Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var passwordInput = document.getElementById('password');
            var showPasswordCheckbox = document.getElementById('show-password');
    
            showPasswordCheckbox.addEventListener('change', function () {
                if (showPasswordCheckbox.checked) {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
        });
    </script>
</body>

</html>
