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

</head>

<body>
    <div class="px-4 py-5 my-5 text-center">

        <!-- Background image -->
        <img class="d-block mx-auto mb-4" src="/images/img02.jpg" style="border-radius: 50%" width="200" height="200">
        <h1 class="display-5 fw-bold text-body-emphasis">AuthorSphere</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Welcome to AuthorSphere, the cutting-edge publication and author management system designed to streamline
                the process of managing academic publications and authors. Our platform offers a comprehensive solution for scholars,
                researchers, and journal editors alike, providing a seamless experience from submission to publication.
            </p>
            <p class="lead mb-4">Our system prioritizes transparency, efficiency, and collaboration, empowering academic communities
                to focus on advancing knowledge and innovation. Join us in revolutionizing the way scholarly publications are managed and
                published with AuthorSphere.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent
transition hover:text-black/70 focus:outline-none
focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80
dark:focus-visible:ring-white">
                    Dashboard
                </a>
                @else
                <button type="button" onclick="location.href='{{ route('login') }}'" class="btn btn-primary btn-lg px-4 gap-3">Login</button>



                @if (Route::has('register'))

                <button type="button" onclick="location.href='{{ route('register') }}'" class="btn btn-success btn-lg px-4">Register</button>

                @endif

                @if (Route::has('publication-register'))

                <button type="button" onclick="location.href='{{ route('publication-register') }}'" class="btn btn-info btn-lg px-4">Publication Register</button>

                @endif


                @endauth
                @endif
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>