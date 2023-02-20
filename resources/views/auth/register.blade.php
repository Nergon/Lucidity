<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a dream journal made by Nergon for lucid dreaming.">
    <meta name="author" content="Nergon">
    <title>Login - Dream Journal</title>
    <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/swal/dark.css') }}" rel="stylesheet">
</head>
<body class="text-center">
<main class="login">
    <form action="{{ route('register') }}" method="post">
        @csrf
        <h1 class="h2 mb-3 fw-normal">Dream Journal</h1>
        <h2 class="h4 mb-3 fw-normal">Create account</h2>
        <div class="mb-3">
            <label for="inputEmail" class="visually-hidden">Username</label>
            <input type="text" id="inputEmail" name="username" class="form-control @error('username') border-danger @enderror" placeholder="Username" required autofocus>
            @error('username')
                <p class="text-danger text-sm-start">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control @error('password') border-danger @enderror" placeholder="Password" required>
            @error('password')
            <p class="text-danger text-sm-start">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="visually-hidden">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        </div>
        <button class="btn btn-primary w-100" type="submit">Sign up</button>
    </form>
</main>
</body>
<script src="{{ asset('assets/swal/swal.js') }}"></script>

@if(session('error'))
    <script>
        Swal.fire({
            'icon': 'error',
            'text': '{{ session('error') }}'
        })
    </script>
@endif
</html>
