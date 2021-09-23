<!DOCTYPE html>
<html lang="en">
@include('.admin.components.head')
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

{{--    <!-- Preloader -->--}}
{{--    <div class="preloader flex-column justify-content-center align-items-center">--}}
{{--        <img class="animation__wobble" src="/libs/client/img/logo/[removal.ai]_tmp-614ae5252355e.png" height="60" width="60">--}}
{{--    </div>--}}

    <!-- Navbar -->
    @include('.admin.components.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('.admin.components.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                @yield('main-content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('.admin.components.script')
</body>
</html>
