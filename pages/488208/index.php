<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ISS | Programmes</title>
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

  <style type="text/css">

  </style>
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
        <li class="nav-item" id="users">
          <a class="nav-link" href="../306248/">
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
        <li class="nav-item active" id="sett_programmes">
          <a class="nav-link" href="./">
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

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" id="logged_name"> Programmes</h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block" id="system_date"><?php echo date('l d M Y') ?></h4>
            </li>
            <li class="nav-item dropdown me-2">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-email-open mx-0"></i>
                <span class="count bg-danger">1</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <div id="system_notification">
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-information mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Application Error</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Just now
                      </p>
                    </div>
                  </a>                  
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
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role= "presentation">
              <button class="nav-link active" id="pill-prog-tab" data-toggle="pill" data-target="#pills-prog" aria-controls="pills-prog" aria-selected="true" type="button" role="tab">Programmes</button>
            </li>

            <li class="nav-item" role= "presentation">
              <button class="nav-link" id="pill-dept-tab" data-toggle="pill" data-target="#pills-dept" aria-controls="pills-dept" aria-selected="true" type="button" role="tab">Departments</button>
            </li>

            <li class="nav-item" role= "presentation">
              <button class="nav-link" id="pill-faculty-tab" data-toggle="pill" data-target="#pills-faculty" aria-controls="pills-faculty" aria-selected="true" type="button" role="tab">Faculty</button>
            </li>

          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-prog" role="tabpanel" arua-labelledby="pill-prog-tab">
              <div class="card">
                <div class="card-header">
                  <span style="float: right;"><button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target = "#addProgramme_modal"><i class="mdi mdi-playlist-plus"></i> Add Programme</button></span>
                  <div class="card-title">Programmes List</div>
                </div>
                <div class="card-body">
                  <div class="responsive">
                    <table class="table table-hover table-striped" id="programme_tbl">
                      <thead>
                        <th>##</th>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Duration</th>
                        <th>Date Created</th>
                        <th></th>
                      </thead>
                      <tbody id="programme_body">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>

            <div class="tab-pane fade" id="pills-dept" role="tabpanel" arua-labelledby="pill-dept-tab">
              <div class="card">
                <div class="card-header">
                  <span style="float: right;"><button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target = "#addDepartment_modal"><i class="mdi mdi-playlist-plus"></i> Add Department</button></span>
                  <div class="card-title">Department List</div>
                </div>
                <div class="card-body">
                  <div class="responsive">
                    <table class="table table-hover table-striped" id="dept_tbl">
                      <thead>
                        <th>##</th>
                        <th>Department</th>
                        <th>Head of Department</th>
                        <th>Faculty</th>
                        <th>Date Created</th>
                        <th></th>
                      </thead>
                      <tbody id="dept_body">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-faculty" role="tabpanel" arua-labelledby="pill-faculty-tab">
              <div class="card">
                <div class="card-header">
                  <span style="float: right;"><button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target = "#addFaculty_modal"><i class="mdi mdi-playlist-plus"></i> Add Faculty</button></span>
                  <div class="card-title">Faculty List</div>
                </div>
                <div class="card-body">
                  <div class="responsive">
                    <table class="table table-hover table-striped" id="faculty_tbl">
                      <thead>
                        <th>##</th>
                        <th>Faculty</th>
                        <th>Dean</th>
                        <th>Date Created</th>
                        <th></th>
                      </thead>
                      <tbody id="faculty_body">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- Add Programme Modal -->
  <div class="modal fade" id="addProgramme_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Programme</h4>
          <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addProgramme_form" class="forms-sample">
           <div class="form-group">
            <label for="prog_title">Title</label>
            <input type="text" class="form-control form-control-sm" name="prog_title" id="prog_title">
          </div>

          <div class="form-group">
            <label for="prog_duration">Duration</label>
            <input type="number" class="form-control" name="prog_duration" id="prog_duration">

          </div>

          <div class="form-group">
            <label for="prog_department">Department</label>
            <select class="form-control" name="prog_department" id="prog_department">

            </select>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="addProgramme ()"><i class="mdi mdi-content-save"></i> Save </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

  <!-- Edit Programme Modal -->
  <div class="modal fade" id="editProgramme_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Programme</h4>
          <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editProgramme_form" class="forms-sample">
           <div class="form-group">
            <label for="prog_title">Title</label>
            <input type="text" class="form-control form-control-sm" name="edit_prog_title" id="edit_prog_title">
          </div>

          <div class="form-group">
            <label for="prog_duration">Duration</label>
            <input type="number" class="form-control" name="edit_prog_duration" id="edit_prog_duration">

          </div>

          <div class="form-group">
            <label for="prog_department">Department</label>
            <select class="form-control" name="edit_prog_department" id="edit_prog_department">

            </select>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" id="editProgBtn"><i class="mdi mdi-content-save"></i> Save </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- End of Edit Programme -->

  <!-- Add Department Modal -->
  <div class="modal fade" id="addDepartment_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Department</h4>
          <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addDepartment_form" class="forms-sample">
           <div class="form-group">
            <label for="prog_title">Department</label>
            <input type="text" class="form-control form-control-sm" name="dept_name" id="dept_name">
          </div>

          <div class="form-group">
            <label for="prog_duration">Faculty</label>
            <select class="form-control" name="dept_faculty" id="dept_faculty">

            </select>
          </div>

          <div class="form-group">
            <label for="prog_department">Head Of Department</label>
            <input type="text" class="form-control" name="dept_hod" id="dept_hod">
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="addDeparment ()"><i class="mdi mdi-content-save"></i> Save </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

  <!-- Edit Department Modal -->
  <div class="modal fade" id="editDepartment_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Department</h4>
          <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editDepartment_form" class="forms-sample">
           <div class="form-group">
            <label for="prog_title">Department</label>
            <input type="text" class="form-control form-control-sm" name="edit_dept_name" id="edit_dept_name">
          </div>

          <div class="form-group">
            <label for="prog_duration">Faculty</label>
            <select class="form-control" name="edit_dept_faculty" id="edit_dept_faculty">

            </select>
          </div>

          <div class="form-group">
            <label for="prog_department">Head Of Department</label>
            <input type="text" class="form-control" name="edit_dept_hod" id="edit_dept_hod">
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" id="editDeptBtn"><i class="mdi mdi-content-save"></i> Save </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- End of Edit Department -->

  <!-- Add Faculty Modal -->
  <div class="modal fade" id="addFaculty_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Faculty</h4>
          <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addFaculty_form" class="forms-sample">
           <div class="form-group">
            <label for="prog_title">Faculty</label>
            <input type="text" class="form-control form-control-sm" name="faculty_name" id="faculty_name">
          </div>

          <div class="form-group">
            <label for="prog_department">Dean of Faculty</label>
            <input type="text" class="form-control" name="faculty_dean" id="faculty_dean">
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" onclick="addFaculty()"><i class="mdi mdi-content-save"></i> Save </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

  <!-- Edit Faculty Modal -->
  <div class="modal fade" id="editFaculty_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Faculty</h4>
          <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editFaculty_form" class="forms-sample">
           <div class="form-group">
            <label for="prog_title">Faculty</label>
            <input type="text" class="form-control form-control-sm" name="edit_faculty_name" id="edit_faculty_name">
          </div>

          <div class="form-group">
            <label for="prog_department">Dean of Faculty</label>
            <input type="text" class="form-control" name="edit_faculty_dean" id="edit_faculty_dean">
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" id="editFacBtn"><i class="mdi mdi-content-save"></i> Save </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- Edit Faculty -->

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