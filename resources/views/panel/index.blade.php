<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Nergon">
    <title>Dream Journal</title>
    <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/swal/dark.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/tagify/tagify.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<!-- User profile modal -->
<!-- Customizer modal -->
<div id="app">
    <router-view></router-view>
</div>
<!-- Notifications modal -->
<!-- Customizer modal -->
<!-- Header -->
<!-- Core JS  -->
<script src="js/app.js"></script>
<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/swal/swal.js') }}"></script>
<script src="{{ asset('assets/tagify/tagify.min.js') }}"></script>

</body>

</html>
