<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ISS | Update Data</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link href="../../plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
        <li class="nav-item active" id="update">
          <a class="nav-link" href="./">
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

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" id="logged_name"> Update Data</h4>
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
              <button class="nav-link active" id="pill-student-tab" data-toggle="pill" data-target="#pills-student" aria-controls="pills-student" aria-selected="true" type="button" role="tab">Student</button>
            </li>

            <li class="nav-item" role= "presentation">
              <button class="nav-link" id="pill-results-tab" data-toggle="pill" data-target="#pills-results" aria-controls="pills-results" aria-selected="true" type="button" role="tab">Results</button>
            </li>
          </ul>

          <div class="tab-content">

            <div class="tab-pane fade show active" id="pills-student" role="tabpanel" arua-labelledby="pill-student-tab">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Edit Student Record</div>
                </div>
                <div class="card-body">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search" name="searchText" id="searchText" style="border: none;border-bottom: 1px solid #6640b2;">
                    <div class="input-group-append">
                      <button class="btn btn-md btn-primary" onclick="searchStudent()">Search Student</button>
                    </div>
                  </div>
                </div>
                <br>
                <div class="card-header">
                  <div class="card-title">Search Results - <span id="search_status"></span></div>
                </div>
                <div class="card-body" id="resultView" style="display: none;">
                  <form id="editStudentForm">
                    <div class="form-group">
                      <label>Student ID</label>
                      <input type="text" name="student_id" id="student_id" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                      <label>Index No</label>
                      <input type="text" name="index_no" id="index_no" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name="firstname" id="firstname" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Middle Name</label>
                      <input type="text" name="middlename" id="middlename" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" name="lastname" id="lastname" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Gender</label><br>
                      <label><input type="radio" name="gender" id="male" value="MALE">&nbsp;&nbsp;Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><input type="radio" name="gender" id="female" value="FEMALE">&nbsp;&nbsp;Female</label>
                    </div>

                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="date" name="dateofbirth" id="dateofbirth" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Place of Birth</label>
                      <input type="text" name="placeofbirth" id="placeofbirth" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Nationality</label>
                      <select name="nationality" id="nationality" class="form-control">

                      </select>
                    </div>

                    <div class="form-group">
                      <label>Hometown</label>
                      <input type="text" name="hometown" id="hometown" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Home Region</label>
                      <select name="homeregion" id="homeregion" class="form-control">

                      </select>
                    </div>

                    <div class="form-group">
                      <label>Postal Address</label>
                      <textarea name="postaladdress" id="postaladdress" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Entry Level</label>
                      <select name="entrylevel" id="entrylevel" class="form-control">
                        <option selected disabled>Select Level</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="600">600</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Entry Year</label>
                      <input type="text" name="entryyear" id="entryyear" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Guardian Name</label>
                      <input type="text" name="guardianname" id="guardianname" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Guardian Address</label>
                      <input type="text" name="guardianaddress" id="guardianaddress" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Guardian Contact</label>
                      <input type="text" name="guardiancontact" id="guardiancontact" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Admission Category</label>
                      <input type="text" name="admissioncategory" id="admissioncategory" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Programme</label>
                      <select name="course_programme" id="course_programme" class="form-control">

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
                  </form>
                  <button class="btn btn-md btn-success" id="saveStudentBtn">Save</button>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-results" role="tabpanel" arua-labelledby="pill-results-tab">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Edit Results</div>
                </div>
                <div class="card-body">
                  <div style="width: 50%;margin-left: 25%;border:1px solid #e5e1e1;padding: 30px;">
                    <div class="form-group">
                      <label for="edit_type">Edit Type</label>
                      <select id="edit_type" class="form-control">
                        <option selected disabled value="">Select Edit Type</option>
                        <option value="single">Single Edit</option>
                        <option value="group">Delete</option>
                      </select>
                    </div>

                    <div id="single_div" style="display: none;">
                      <form id="searchResultForm">
                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Student ID..." aria-label="search" aria-describedby="search" id="search_id" name="search_id" style="border: none;border-bottom: 1px solid #6640b2;">
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Level</label>
                          <select name="search_level" class="form-control">
                            <option selected disabled>Select Level</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="600">600</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Term</label>
                          <select name="search_term" class="form-control">
                            <option selected disabled>Select Term</option>
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                          </select>
                        </div>
                      </form>
                      <div class="input-group-append">
                        <button onclick="fetchSingleStudent()" class="btn btn-md btn-primary">Search</button>
                      </div>
                    </div>

                    <div id="group_div" style="display: none;">
                      <form id="delGroupForm">
                        <div class="form-group">
                          <label for="prog_duration">Session</label>
                          <select class="form-control" id="search_session" name="search_session">

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="prog_department">Course/Subject</label>
                          <select class="form-control" id="search_course" name="search_course">

                          </select>
                        </div>
                      </form>
                      <button onclick="deleteGroup()" class="btn btn-md btn-primary">Delete</button>
                    </div>
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><span id="group_name"></span> - <span id="sys_year"></span></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><span id="sys_motto"></span></span>
              </div>
            </div>
          </div>
        </footer>

        <!-- Edit Result Modal-->
        <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Result</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="editResultForm">
                  <table class="table table-striped">
                    <thead>
                      <th>Code</th>
                      <th>Title</th>
                      <th>Mark</th>
                      <th>Grade</th>
                      <th></th>
                    </thead>

                    <tbody id="edit_body">

                    </tbody>
                  </table>

                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <button id="saveResultsBtn" class="btn btn-primary btn-sm">Save</button>

              </div>
            </div>
          </div>
        </div>
        <!-- End of Edit Result -->

        <!-- Group Result Modal-->
        <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Delete Results</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <table class="table table-striped">
                  <thead>
                    <th>Session</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Mark</th>
                    <th>Grade</th>
                  </thead>

                  <tbody id="del_body">

                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <button id="delResultsBtn" class="btn btn-primary btn-sm">Delete</button>

              </div>
            </div>
          </div>
        </div>
        <!-- End of Group Edit Result -->

        <!-- partial -->
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
  <script src="../../plugins/pnotify/dist/pnotify.js"></script>
  <script src="../../plugins/pnotify/dist/pnotify.tooltip.js"></script>
  <script src="../../plugins/pnotify/dist/pnotify.animate.js"></script>

  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../../js/dashboard.js"></script>
  
  <script src="../../js/custom.js"></script>
  <script src="function.js"></script>
</body>

</html>