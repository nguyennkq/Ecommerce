<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}" />
        <link rel="stylesheet" href="{{asset('backend/assets/css/backend-plugin.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/css/backend.css?v=1.0')}}.0">
        <link rel="stylesheet" href="{{asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/vendor/remixicon/fonts/remixicon.css')}}">
    </head>
    <body class="  ">
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">

        @include('admin.body.sidebar')
        @include('admin.body.header')
        <div class="content-page">
            @yield('main')
        </div>
        </div>
        <!-- Wrapper End-->
        @include('admin.body.footer')
        <!-- Backend Bundle JavaScript -->
        <script src="{{asset('backend/assets/js/backend-bundle.min.js')}}"></script>

        <!-- Table Treeview JavaScript -->
        <script src="{{asset('backend/assets/js/table-treeview.js')}}"></script>

        <!-- Chart Custom JavaScript -->
        <script src="{{asset('backend/assets/js/customizer.js')}}"></script>

        <!-- Chart Custom JavaScript -->
        <script async src="{{asset('backend/assets/js/chart-custom.js')}}"></script>

        <!-- app JavaScript -->
        <script src="{{asset('backend/assets/js/app.js')}}"></script>
    </body>
</html>