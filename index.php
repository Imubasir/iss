<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="custom_css/custom.css">
  <link rel="stylesheet" href="plugins/pnotify/dist/pnotify.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body onload="<?php session_destroy(); ?>">
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background-image: linear-gradient(180deg, #223e9c, #6478badb)">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="display: inline-flex;">
                <img src="images/logo-mini.svg" alt="logo" style= "width: 20%;">
                <h3 style="text-align: center">Integrated Students Systems</h3>
              </div>

              <form class="pt-3" id="login_form">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="issUsername" id="issUsername" placeholder="Username" autocomplete = "off">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="issPassword" id="issPassword" placeholder="Password">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="login_process();">SIGN IN</a>
                </div>

                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">

                  </div>
                  <a href="#" data-toggle="modal" data-target="#forgot_modal" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->

    <!-- Search Modal -->
    <div class="modal fade" id="forgot_modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Password</h4>
            <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="reset_Form">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>

              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="con_password" id="con_password" class="form-control">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-primary" onclick="passwordReset ()"><i class="mdi mdi-account-search"></i> Update </button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- End of Search Modal -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="plugins/moment/moment.js" type="text/javascript"></script>
  <!-- endinject -->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>

  <script src="js/custom.js"></script>
  <script src="plugins/pnotify/dist/pnotify.js"></script>
  <script src="plugins/pnotify/dist/pnotify.tooltip.js"></script>
  <script src="plugins/pnotify/dist/pnotify.animate.js"></script>
  <!-- endinject -->
  <script type="text/javascript">
    $(document).ready(function() {
      document.getElementById("issPassword").addEventListener('keydown', function(e) {
        if(e.keyCode == 13) {
          login_process();
        }
      })
    })
  </script>
</body>

</html>
