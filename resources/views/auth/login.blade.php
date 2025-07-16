<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Repository</title>

    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color:rgb(169, 169, 169);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 15px;
            background-color: #ffffffee;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header h3 {
            font-weight: 600;
            color: #002366;
        }

        .logo-img {
            width: 90px;
            margin-bottom: 8px;
        }

        .form-control {
            background-color: #f8f9fa;
            color: #000;
            border-radius: 8px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0056b3;
        }

        .form-check-label {
            color: #333;
        }

        .btn-primary {
            background-color: #002366;
            border: none;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #00194d;
        }

        .alert {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4"> {{-- Lebih ramping --}}
                            <div class="card shadow border-0 mt-5">
                                <div class="card-header text-center bg-transparent border-0">
                                    <img src="{{ asset('assets/assets/img/logo.png') }}" alt="Logo" class="logo-img">
                                    <h3 class="my-2">Login</h3>
                                </div>
                                <div class="card-body">
                                    @if(session()->has('pesan'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('pesan') }}
                                        </div>
                                    @endif

                                    <form method="post" action="{{ route('auth.verify') }}">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" required />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="remember" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <input type="submit" value="Login" class="btn btn-primary w-100">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
