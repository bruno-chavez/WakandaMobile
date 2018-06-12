<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Wakanda Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Wakanda Mobile - Platform for telecommunications companies to manage users and numbers">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://inf239bd25.labcomp.cl/css/bootstrap.min.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="http://inf239bd25.labcomp.cl/css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="http://inf239bd25.labcomp.cl/css/style.css" rel="stylesheet">

    <link href="http://inf239bd25.labcomp.cl/css/form.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

@include('layouts.navbar')

@yield('content')

<footer class="my-5 text-center">
    <p class="mb-2"><small>COPYRIGHT © 2017. ALL RIGHTS RESERVED. MOBAPP TEMPLATE BY COLORLIB</small></p>
    <p class="mb-2"><small>Modificado por Bruno Chavez</small></p>
</footer>

<!-- jQuery and Bootstrap -->
<script src="http://inf239bd25.labcomp.cl/js/jquery-3.2.1.min.js"></script>
<script src="http://inf239bd25.labcomp.cl/js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="http://inf239bd25.labcomp.cl/js/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="http://inf239bd25.labcomp.cl/js/script.js"></script>

</body>
</html>