<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>GIS Palembang Admin</title>


    <link href="/css/all.css" rel="stylesheet">
    <link href="/css/toastr.css" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top" onload="InitMap()">

    @include('partials.nav')

    <div class="content-wrapper">
      <div class="container-fluid">
        @yield('content')
      </div>

    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; Your Website 2017</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>



  </body>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6R8lgRbPxJkGt9q78Mv2reY6w6k0l6AY&libraries=places">
    </script>
    @stack('script_maps')
    <script src="/vendor/popper/popper.min.js"></script>
     <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>


    <!-- Plugin JavaScript -->


    <!-- Custom scripts for this template -->

    <script src="/js/sb-admin.min.js"></script>

</html>
