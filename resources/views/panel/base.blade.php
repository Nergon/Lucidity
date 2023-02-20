<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Nergon">
    <title>@yield('title') – Lucidity</title>
    <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/swal/dark.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/tagify/tagify.css') }}" rel="stylesheet">
</head>

<body>
<!-- User profile modal -->
<!-- Customizer modal -->

<!-- Notifications modal -->
<!-- Customizer modal -->
<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none" href="{{ route('index') }}">Lucidity</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('entries/create') }}">Create Entry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('labels') }}">Labels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stats') }}">Statistics</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i> {{ auth()->user()->username }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-power-off text-danger"></i> Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<!-- Omnisearch -->

<!-- Main content -->
<!-- Board -->
<main class="container">
    @yield('content')

</main>
<!-- Core JS  -->
<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/swal/swal.js') }}"></script>
<script src="{{ asset('assets/tagify/tagify.min.js') }}"></script>
@yield('script')
</body>

</html>
