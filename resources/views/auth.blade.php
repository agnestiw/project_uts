<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="assets_h/img/newspaper.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets_h/img/newspaper.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets_h/img/newspaper.png">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="assets_h/img/favicons/favicon.ico">
    <link rel="manifest" href="assets_h/img/favicons/manifest.json"> --}}
    <meta name="msapplication-TileImage" content="assets_h/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
    <title>My News</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="/register" method="post" id="formRegister">
                @csrf
                <h1>Register</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" id="name" required>
                <input type="email" name="email" placeholder="Email" id="email" required>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <select class="selectbox" name="jenis_user" id="jenis_user" required>
                    <option value="1">Admin</option>
                    <option value="2">Staff</option>
                    <option value="3">Pengguna</option>

                </select>
                <button type="submit" id="regisButton">Register</button>
                <a href="/">HOME</a>
            </form>
        </div>
        <!-- login -->
        <div class="form-container sign-in">
            <form action="/login" method="POST" class="pt-3">
                @csrf
                @if (session('error'))
                    <h5 style="color: red; text-align: center">{{ session('error') }}</h5>
                @endif
                <h1>Log In</h1>
                @if (session('error'))
                    <p style="color: red"></p>
                @endif
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1"
                    placeholder="Email">
                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1"
                    placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button type="submit">Log In</button>
                <a href="/">HOME</a>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#regisButton').click(function(e) {
                e.preventDefault();

                // Prepare the data
                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    jenis_user: $('#jenis_user').val(),
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: '{{ route('register') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Success",
                                text: "Registrasi Berhasil",
                                icon: "success",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "Login"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "/auth-page";
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            text: 'Registration failed. Please try again.',
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });

            });
        });
    </script> --}}
</body>

</html>
