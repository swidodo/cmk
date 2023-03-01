<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>System CMK</title>
        <link href="/css/styles.css" rel="stylesheet" />
        <link href="/css/select2.min.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="/assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
        <script src="/js/jquery-3.6.3.min.js"></script>
    </head>
    <body class="nav-fixed">
        @include('layout.navbar')
        <div id="layoutSidenav">
           @include('layout.sidebar')
            <div style="background-color:#f2f2f2 !important;" id="layoutSidenav_content">
                @yield('main-content')
                @include('layout.footer')
            </div>
        </div>
        <script src="/js/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="/js/select2.min.js"></script>
    </body>
</html>
