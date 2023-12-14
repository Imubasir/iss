<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ISS | Users</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="../../plugins/pnotify/dist/pnotify.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link rel="stylesheet" href="../../custom_css/custom.css" />
</head>
<body>
  <div class="container-scroller d-flex">
    <!--  -->
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#home" aria-expanded="false" aria-controls="home" id="home_menu">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Home</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="home">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item" id="dashboard"> <a class="nav-link" href="../"> Dashboard </a></li>
              <li class="nav-item" id="profile"> <a class="nav-link" href="../967595/"> Profile </a></li>
              <li class="nav-item" id="notification"> <a class="nav-link" href="../939425/"> Notification </a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth" id="student_menu">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Student</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item" id="enrollment"> <a class="nav-link" href="../153180/"> Enrollment </a></li>
              <li class="nav-item" id="std_courses"> <a class="nav-link" href="../593359/"> Courses </a></li>
              <li class="nav-item" id="std_programmes"> <a class="nav-link" href="../793752/"> Programmes </a></li>
              <li class="nav-item" id="resultStatment"> <a class="nav-link" href="../214071/"> Result Statements </a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#result" aria-expanded="false" aria-controls="result" id="services_menu">
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            <span class="menu-title">Services</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="result">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item" id="transcripts"> <a class="nav-link" href="../351586/"> Transcripts </a></li>
              <li class="nav-item" id="signatory"> <a class="nav-link" href="../559056"> Signatory </a></li>
              <li class="nav-item" id="scheduler"> <a class="nav-link" href="../969145/"> Scheduler </a></li>
              <li class="nav-item" id="requests"> <a class="nav-link" href="../426771/"> Requests </a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item sidebar-category">
          <p>Institutional Settings</p>
          <span></span>
        </li>
        <li class="nav-item active" id="users">
          <a class="nav-link" href="./">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Users</span>
          </a>
        </li>
        <li class="nav-item" id="sett_notification">
          <a class="nav-link" href="../651616/">
            <i class="mdi mdi-bell-ring menu-icon"></i>
            <span class="menu-title">Notifications</span>
          </a>
        </li>
        <li class="nav-item" id="sett_programmes">
          <a class="nav-link" href="../488208/">
            <i class="mdi mdi-view-list menu-icon"></i>
            <span class="menu-title">Programmes</span>
          </a>
        </li>
        <li class="nav-item" id="sett_courses">
          <a class="nav-link" href="../258520/">
            <i class="mdi mdi-view-module menu-icon"></i>
            <span class="menu-title">Courses/Subjects</span>
          </a>
        </li>
        <li class="nav-item" id="uploads">
          <a class="nav-link" href="../823219/">
            <i class="mdi mdi-cloud-upload menu-icon"></i>
            <span class="menu-title">Data Uploads</span>
          </a>
        </li>
        <li class="nav-item" id="update">
          <a class="nav-link" href="../347077/">
            <i class="mdi mdi-tooltip-edit menu-icon"></i>
            <span class="menu-title">Update Data</span>
          </a>
        </li>
        <li class="nav-item" id="log">
          <a class="nav-link" href="../206983/">
            <i class="mdi mdi-history menu-icon"></i>
            <span class="menu-title">Log</span>
          </a>
        </li>

        <li class="nav-item sidebar-category">
          <p></p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../">
            <button class="btn bg-danger btn-sm menu-title">Log Out</button>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" id="logged_name"> Users</h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block" id="system_date"><?php echo date('l d M Y') ?></h4>
            </li>
            <li class="nav-item dropdown me-2">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">

              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <div id="system_notification">

                </div>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <span style="float: right;"><button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target = "#addUser_modal"><i class="mdi mdi-account-plus"></i> New User</button></span>
              <div class="card-title">Users</div>
            </div>
            <div class="card-body">
              <div class="responsive">
                <table class="table table-hover table-striped" id="users_tbl">
                  <thead>
                    <th>##</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Username</th>
                    <th>Date Created</th>
                    <th>Last Login</th>
                    <th></th>
                  </thead>
                  <tbody id="users_body">

                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><span id="group_name"></span> - <span id="sys_year"></span></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><span id="sys_motto"></span></span>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- User Modal -->
  <div class="modal fade" id="addUser_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addUser_form" class="forms-sample">
           <div class="form-group">
            <label for="staff_name">Name</label>
            <input type="text" class="form-control form-control-sm" name="staff_name" id="staff_name">
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control form-control-sm" name="username" id="username">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control form-control-sm" name="email" id="email">
          </div>

          <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" name="prog_department" id="prog_department">
              <option selected disabled>Select User Department</option>
            </select>
          </div>

          <div class="form-group">
            <label for="department">Role</label>
            <select class="form-control" name="role" id="role">
              <option selected disabled>Select User Role</option>
              <option value="user">User</option>
              <option value="admin">Administrator</option>
            </select>
          </div>

          <div class="form-group">
            <label for="department">Print Transcript</label>
            <select class="form-control" name="transcript" id="transcript">
              <option selected disabled>Select Option</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="userRegistration()"><i class="mdi mdi-content-save"></i> Save </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- End of User Modal -->

<!-- Edit User Modal -->
<div class="modal fade" id="editUser_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editUser_form" class="forms-sample">
         <div class="form-group">
          <label for="staff_name">Name</label>
          <input type="text" class="form-control form-control-sm" name="edit_staff_name" id="edit_staff_name">
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control form-control-sm" name="edit_username" id="edit_username" readonly>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control form-control-sm" name="edit_email" id="edit_email">
        </div>

        <div class="form-group">
          <label for="department">Department</label>
          <select class="form-control" name="edit_prog_department" id="edit_prog_department">
            <option selected disabled>Select User Department</option>
          </select>
        </div>

        <div class="form-group">
          <label for="department">Role</label>
          <select class="form-control" name="edit_role" id="edit_role">
            <option selected disabled>Select User Role</option>
            <option value="user">User</option>
            <option value="admin">Administrator</option>
          </select>
        </div>

        <div class="form-group">
          <label for="department">Print Transcript</label>
          <select class="form-control" name="edit_transcript" id="edit_transcript">
            <option selected disabled>Select Option</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="btn btn-sm btn-primary" id="editBtn"><i class="mdi mdi-content-save"></i> Save </button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<!-- End of Edit User Modal-->

<!-- Edit Access Modal -->
<div class="modal fade" id="editAccess_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit User Access</h4>
        <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-hover table-striped" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="check-mail" style="width: 20%"><label><input type="checkbox" id="checkAll" />&nbsp;&nbsp;Check All</label></th>
                <th>Page</th>
                <th>Category</th>
              </tr>
            </thead>
            <tbody id="accessbody">

            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" id="saveAccess"><i class="mdi mdi-content-save"></i> Save </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- End of Edit Access Modal-->

<!-- base:js -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../../vendors/js/vendor.bundle.base.js"></script> -->

<script src="../../plugins/moment/moment.js" type="text/javascript"></script>
<script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script src="../../vendors/chart.js/Chart.min.js"></script>
<script src="../../js/jquery.cookie.js" type="text/javascript"></script>
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/jquery.cookie.js" type="text/javascript"></script>

<script src="../../plugins/pnotify/dist/pnotify.js"></script>
<script src="../../plugins/pnotify/dist/pnotify.tooltip.js"></script>
<script src="../../plugins/pnotify/dist/pnotify.animate.js"></script>
<script src="../../js/dashboard.js"></script>

<script src="../../js/custom.js"></script>
<script src="function.js"></script>
</body>

</html>