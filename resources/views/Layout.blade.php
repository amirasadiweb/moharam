<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap.css" />

    {{--alert--}}
    <link rel="stylesheet" href="/css/sweet_alert/sweet.css" />

  @yield('head')

</head>
<body>

<section class="container">

    @include('partials.flas')
    @yield('content')

</section>

<div class="col-md-3 alert-danger col-lg-offset-3">
    @yield('error')
</div>


<script src="/css/sweet_alert/sweet.js"></script>


</body>
</html>
