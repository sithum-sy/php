<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AuthorSphere</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        /* Background styles */
        body {
            background-image: url('{{ asset("images/background/1.jpg") }}');
            background-position: center;
            background-size: cover;
            /* filter: blur(8px); */
            height: 100vh;
            display: flexbox;
            justify-content: center;
            align-items: center;
        }

        /* Glassmorphism effect */
        .glassmorphism {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .card-height {
            height: 13rem;
        }

        .navbar-font-color {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg text-light bg-transparent navbar-font-color">
        <div class="container ">
            <a class="navbar-brand navbar-font-color" href="#">AuthorSphere</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('publication-register') }}">Publication Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="px-4 py-5 my-5 text-center">

        <!-- Background image
        <img class="d-block mx-auto mb-4" src="/images/img02.jpg" style="border-radius: 50%" width="200" height="200">
        <h1 class="display-5 fw-bold text-body-emphasis">AuthorSphere</h1> -->

        <!-- Introduction Section -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center glassmorphism">
                    <h1>Welcome to AuthorSphere</h1>
                    <p class="lead">Your ultimate solution for managing publications efficiently.</p>
                </div>
            </div>
        </div>
        <!-- Cards Section -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mb-4 glassmorphism card-height">
                        <div class="card-body">
                            <h5 class="card-title">About AuthorSphere</h5>
                            <p class="card-text">AuthorSphere is a comprehensive publication management system designed to streamline the process of managing publications, submissions, and reviews.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 glassmorphism card-height">
                        <div class="card-body">
                            <h5 class="card-title">Features</h5>
                            <ul class="list-unstyled">
                                <li>Efficient Publication Management</li>
                                <li>User-friendly Interface</li>
                                <li>Secure and Reliable</li>
                                <li>Customizable Workflow</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center"> -->

        <!-- Buttons Section -->
        <div class="container mt-5 text-center">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent
transition hover:text-black/70 focus:outline-none
focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80
dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg mb-3 glassmorphism">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-success btn-lg mb-3 glassmorphism">Register</a>
                    @endif

                    @if (Route::has('publication-register'))
                    <a href="{{ route('publication-register') }}" class="btn btn-info btn-lg mb-3 glassmorphism">Publication Register</a>
                    @endif


                    @endauth
                    @endif
                </div>
            </div>
        </div>


    </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>