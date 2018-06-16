<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Wakanda Mobile</title>

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <!-- Main css -->
    <link href="http://inf239bd25.labcomp.cl/css/style.css" rel="stylesheet">
    <link href="http://inf239bd25.labcomp.cl/css/form.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

@include('layouts.navbar')

@include('layouts.header')

@yield('content')

@include('layouts.footer')

<!-- jQuery and Bootstrap -->
<script src="http://inf239bd25.labcomp.cl/js/jquery-3.2.1.min.js"></script>
<script src="http://inf239bd25.labcomp.cl/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="http://inf239bd25.labcomp.cl/js/script.js"></script>

</body>
</html>