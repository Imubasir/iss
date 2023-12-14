<?php
require("../../php/connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ISS | Reports</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/buttons.dataTables.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/logo.png" />
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
          <a class="nav-link" href="./">
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

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" id="logged_name"> Reports</h4>
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
              <div class="card-title">Select Report</div>
            </div>
            <div class="card-body">
              <div style="width: 50%;margin-left: 25%;">
                <form id="search_form">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="sel_cat" id="sel_cat">
                      <option selected disabled>Select Option</option>
                      <option value="1">Enrollment</option>
                      <option value="2">Requests</option>
                    </select>
                  </div>
                  <div id="enroll_option" style="display: none;">
                    <div class="form-group">
                      <label>Programme</label>
                      <select name="course_programme" id="course_programme" class="form-control">
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Entryyear</label>
                      <select class="form-control" name="entryyear">
                      <option disabled selected>Select Year</option>
                      <?php
                        $select = "SELECT DISTINCT entryyear FROM iss_enrollment";
                        $rs = mysqli_query($link, $select);
                        if($rs) {
                          while ($row = mysqli_fetch_assoc($rs)) {
                            ?>
                            <option><?php echo $row['entryyear'] ?></option>
                          <?php
                          }
                          
                        }
                      ?>
                    </select>
                    </div>

                    <div class="form-group">
                      <label>Study Status</label>
                      <select name="studystatus" id="studystatus" class="form-control">
                        <option selected disabled>Select Study Status</option>
                        <option value="ON-GOING">On-Going</option>
                        <option value="SUSPENDED">Suspended</option>
                        <option value="DEFERRED">Deferred</option>
                        <option value="WITHDRAWN">Withdrawn</option>
                        <option value="GRADUATED">Graduated</option>
                      </select>
                    </div>
                  </div>
                  <!-- End of Enroll Div -->

                  <!-- Results Div -->
                  <div id="request_option" style="display: none;">
                    <div class="form-group">
                      <label>From</label>
                      <input type="date" name="datefrom" id="datefrom" class="form-control">
                    </div>    

                    <div class="form-group">
                      <label>To</label>
                      <input type="date" name="dateto" id="dateto" class="form-control">
                    </div>                  
                  </div>
                </form>
                <button class="btn btn-block btn-primary" onclick="generate()">Generate</button>
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><span id="group_name"></span> - <span id="sys_year"></span></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><span id="sys_motto"></span></span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->

        <!-- Search Modal -->
        <div class="modal fade" id="result_modal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Report</h4>
                <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped" id="result_tbl">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>Index No</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Nationality</th>
                        <th>Hometown</th>
                        <th>Home Region</th>
                        <th>Postal Address</th>
                        <th>Entry Level</th>
                        <th>Entry Year</th>
                        <th>Guardian Name</th>
                        <th>Guardian Address</th>
                        <th>Guardian Contact</th>
                        <th>Admission Category</th>
                        <th>Programme</th>
                        <th>Study Status</th>
                      </tr>
                    </thead>

                    <tbody id="result_body">
                      
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- End of Search Modal -->

        <!-- Request Modal -->
        <div class="modal fade" id="request_modal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Report</h4>
                <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped" id="request_tbl">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Transaction ID</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Programme</th>
                        <th>Service</th>
                        <th>Date Submitted</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Verification Code</th>
                      </tr>
                    </thead>

                    <tbody id="request_body">
                      
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- End of Request Modal -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

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
  <script src="../../js/dashboard.js"></script>

  <script src="../../js/dataTables.buttons.min.js"></script>
  <script src="../../js/jszip.min.js"></script>
  <script src="../../js/pdfmake.min.js"></script>
  <script src="../../js/vfs_fonts.js"></script>
  <script src="../../js/buttons.html5.min.js"></script>
  <script src="../../js/buttons.print.min.js"></script>
  <script src="../../js/buttons.colVis.min.js"></script>
  
  <script src="../../js/custom.js"></script>
  <script src="function.js"></script>
</body>

</html>