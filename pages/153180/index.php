<?php
session_start();
require("../../php/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ISS | Enrollment</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="../../plugins/pnotify/dist/pnotify.css">

  <link rel="stylesheet" href="../../css/style.css">

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

        <li class="nav-item active keep-open">
          <a class="nav-link index" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth" id="student_menu">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Student</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item active" id="enrollment"> <a class="nav-link" href="./"> Enrollment </a></li>
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
              <li class="nav-item" id="signatory"> <a class="nav-link" href="../559056/"> Signatory </a></li>
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

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" id="logged_name"> Student Enrollment</h4>
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
          <div class="card">
            <div class="card-header">
              <span id="search_type"></span>
              <span style="float: right;"><button class="btn btn-md btn-info" data-toggle="modal" data-target="#search_modal">Custom Search</button></span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped" id="enrol_tbl">
                  <thead>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Index No</th>
                    <th>Name</th>
                    <th>Programme</th>
                    <th>Entry Year</th>
                    <th></th>
                  </thead>
                  <tbody id="enrol_body">

                  </tbody>
                </table>
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

        <!-- Profile Modal -->
        <div class="modal fade" id="profile_modal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Student Profile</h4>
                <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="print_div">
                <div class="row">
                  <div class="col-2">
                    <img src="../../images/faces/avatar.png" width="100px">
                  </div>

                  <div class="col-8" style="text-align: center;">
                    <h4>GUSHEGU NURSING TRAINING COLLEGE</h4>
                    <h6>WEBSITE: www.gntc.edu.gh</h6>
                    <h6>ADDRESS: Post office Box 322, Gushegu</h6>
                    <h6>TEL: 050242452253</h6>
                  </div>

                  <div class="col-2">
                    <img src="../../images/faces/avatar.png" width="100px">
                  </div>
                </div>

                <div style="text-align: center;">
                  <img src="../../images/other/divider2.png" width="500px">
                </div>
                <div style="text-align: center;"><h5>Student Profile</h5></div>
                <div id="profile_content">
                  <table class="table" id="profile_tbl">
                    <tr>
                      <td style="width: 10%"><label class="profile_label">Student ID</label></td>
                      <td><span class="profile_item" id="student_id"></span></td>

                      <td style="width: 10%"><label class="profile_label">Index No</label></td>
                      <td><span class="profile_item" id="index_no"></span></td>
                    </tr>

                    <tr>
                      <td><label class="profile_label">Name</label></td>
                      <td><span class="profile_item" id="student_name"></span></td>

                      <td><label class="profile_label">Gender</label></td>
                      <td><span class="profile_item" id="gender"></span></td>
                    </tr>

                    <tr>
                      <td style="width: 10%"><label class="profile_label">Date of Birth</label></td>
                      <td><span class="profile_item" id="dateofbirth"></span></td>

                      <td style="width: 10%"><label class="profile_label">Nationality</label></td>
                      <td><span class="profile_item" id="nationality"></span></td>
                    </tr>

                    <tr>
                      <td><label class="profile_label">Place of Birth</label></td>
                      <td><span class="profile_item" id="placeofbirth"></span></td>

                      <td><label class="profile_label">Hometown</label></td>
                      <td><span class="profile_item" id="hometown"></span></td>
                    </tr>

                    <tr>
                      <td style="width: 10%"><label class="profile_label">Home Region</label></td>
                      <td><span class="profile_item" id="homeregion"></span></td>

                      <td style="width: 10%"><label class="profile_label">Postal Address</label></td>
                      <td><span class="profile_item" id="postaladdress"></span></td>
                    </tr>

                    <tr>
                      <td><label class="profile_label">Entry Year</label></td>
                      <td><span class="profile_item" id="entryyear"></span></td>

                      <td><label class="profile_label">Entry Level</label></td>
                      <td><span class="profile_item" id="entrylevel"></span></td>
                    </tr>

                    <tr>
                      <td style="width: 15%"><label class="profile_label">Guardian Name</label></td>
                      <td><span class="profile_item" id="guardianname"></span></td>

                      <td style="width: 15%"><label class="profile_label">Guardian Address</label></td>
                      <td><span class="profile_item" id="guardianaddress"></span></td>
                    </tr>

                    <tr>
                      <td><label class="profile_label">Guardian Contact</label></td>
                      <td><span class="profile_item" id="guardiancontact"></span></td>

                      <td><label class="profile_label">Admission Category</label></td>
                      <td><span class="profile_item" id="admissioncategory"></span></td>
                    </tr>

                    <tr>
                      <td><label class="profile_label">Programme</label></td>
                      <td><span class="profile_item" id="std_programme"></span></td>

                      <td><label class="profile_label">Study Status</label></td>
                      <td><span class="profile_item" id="studystatus"></span></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-sm btn-primary" onclick="print('print_div')"><i class="mdi mdi-printer"></i> Print </button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <!-- End of Profile Modal-->

        <!-- Search Modal -->
        <div class="modal fade" id="search_modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Custom Search</h4>
                <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="search_form" class="forms-sample">
                  <div class="form-group">
                    <label for="prog_title">Programme</label>
                    <select name="course_programme" id="course_programme" class="form-control">
                      
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="prog_title">Study Status</label>
                    <select name="studystatus" id="studystatus" class="form-control">
                        <option selected disabled>Select Study Status</option>
                        <option value="ON-GOING">On-Going</option>
                        <option value="SUSPENDED">Suspended</option>
                        <option value="DEFERRED">Deferred</option>
                        <option value="WITHDRAWN">Withdrawn</option>
                        <option value="GRADUATED">Graduated</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="prog_title">Entry Year</label>
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
                </form>

              </div>
              <div class="modal-footer">
                <button class="btn btn-sm btn-primary" onclick="Search ()"><i class="mdi mdi-account-search"></i> Search </button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- End of Search Modal -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

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
  <script src="../../js/print.js" type="text/javascript"></script>

  <script src="../../plugins/pnotify/dist/pnotify.js"></script>
  <script src="../../plugins/pnotify/dist/pnotify.tooltip.js"></script>
  <script src="../../plugins/pnotify/dist/pnotify.animate.js"></script>
  <script src="../../js/dashboard.js"></script>

  <script src="../../js/custom.js"></script>
  <script src="function.js"></script>
</body>

</html>