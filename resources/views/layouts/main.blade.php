<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.partials._meta')
@include('layouts.partials._title')
@include('layouts.partials._style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
@include('layouts.partials._navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('layouts.partials._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
@include('layouts.partials._content-header')
    <!-- /.content-header -->

    <!-- Main content -->
@include('layouts.partials._content-main')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.partials._footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.partials._script')
</body>
</html>
