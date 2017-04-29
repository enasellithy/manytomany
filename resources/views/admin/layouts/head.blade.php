<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap Core CSS -->
{!! Html::style('public/back-end/css/bootstrap.min.css') !!}

    <!-- Bootstrap Core CSS RTL-->
{!! Html::style('public/back-end/css/bootstrap-rtl.min.css') !!}


    <!-- Custom CSS -->
{!! Html::style('public/back-end/css/sb-admin.css') !!}
{!! Html::style('public/back-end/css/sb-admin-rtl.css') !!}


    <!-- Morris Charts CSS -->
{!! Html::style('public/back-end/css/plugins/morris.css') !!}

    <!-- Custom Fonts -->
{!! Html::style('public/back-end/font-awesome/css/font-awesome.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
@yield('css')

</head>

<body>
