<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('layouts.links')
    @yield('style')
</head>

<body class="hold-transition sidebar-mini ">
    <div class="wrapper">

        @include('layouts.navbar')

        @include('layouts.left_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper text-sm">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        @include('layouts.footer')

    </div>
    <!-- ./wrapper -->

    @include('layouts.script')
    @yield('script')
</body>

</html>
