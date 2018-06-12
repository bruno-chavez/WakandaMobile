<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Wakanda Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">

    <link href="/css/form.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

@include('layouts.navbar')

@yield('content')

<footer class="my-5 text-center">
    <p class="mb-2"><small>COPYRIGHT © 2017. ALL RIGHTS RESERVED. MOBAPP TEMPLATE BY COLORLIB</small></p>
    <p class="mb-2"><small>Modificado por Bruno Chavez</small></p>
</footer>

<!-- jQuery and Bootstrap -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="js/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="js/script.js"></script>

</body>
</html>