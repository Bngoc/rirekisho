<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!---  jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!---  bootstrap-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="{{ URL::asset('js/include.js') }}"></script>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- local css-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/content.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/index.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/my-forms.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/header.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css') }}"/>
</head>
<body>

<header>
    @include('includes.header')

</header>
<br>
<br>
<div class="container">
    <div id="main" class="row">
        @yield('content')

    </div>

</div>
<footer class="row simple">
    @include('includes.footer')
</footer>

<script src="{{ URL::asset('/js/bqnfunction.js') }}"></script>
</body>
</html>