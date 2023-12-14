<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ISS | Transcripts</title>
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
  <link rel="stylesheet" href="../../custom_css/res_statement.css" />
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
        <li class="nav-item active keep-open">
          <a class="nav-link index" data-toggle="collapse" href="#result" aria-expanded="false" aria-controls="result" id="services_menu">
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            <span class="menu-title">Services</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="result">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item active" id="transcripts"> <a class="nav-link" href="./"> Transcripts </a></li>
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

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" id="logged_name"> Transcript </h4>
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
          <div class="card mb-3 animated fadeInRight">
            <div class="card-header">
              <span style="float: right;">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#BackPageModal"> <i class="fa fa-print"></i> Print Back Page (Grading System)</button>
              </span>
            </div>
            <div class="card-body">
              <div class="responsive">

                <table class="table table-hover table-striped" id="trancript_table">
                  <thead>
                    <tr>
                      <th>Sn</th>
                      <th>Student ID</th>
                      <th>Name</th>
                      <th>Programme</th>
                      <th>Service Type</th>
                      <th>Copies</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="trancript_body" style="text-transform: uppercase;">

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

        <!-- Result Statement Modal -->
        <div class="modal fade" id="statement_modal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Result Statement</h4>
                <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="print_div">
                <div class="row">
                  <div class="col-7" style="text-align: center;color: #0d6efd;">
                    <h4>GUSHEGU NURSING TRAINING COLLEGE</h4>
                    <span style="text-align: center;">
                      <h6>WEBSITE: www.gntc.edu.gh</h6>
                      <h6>ADDRESS: Post office Box 322, Gushegu</h6>
                      <h6>TEL: 050242452253</h6>
                    </span>
                  </div>

                  <div class="col-5">
                    <table>
                      <tr>
                        <th style="width: 40%;">Student ID</th>
                        <td id="view_studentid"></td>
                      </tr>

                      <tr>
                        <th>Name</th>
                        <td id="view_name"></td>
                      </tr>

                      <tr>
                        <th>Gender</th>
                        <td id="view_gender"></td>
                      </tr>

                      <tr>
                        <th>Date of Birth</th>
                        <td id="view_dob"></td>
                      </tr>

                      <tr>
                        <th>Programme</th>
                        <td id="view_programme"></td>
                      </tr>

                      <tr>
                        <th>Class</th>
                        <td id="view_class"></td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div style="text-align: center;">
                  <img src="../../images/other/divider2.png" width="500px">
                </div>
                <div style="text-align: center;"><h5>* * * Academic Transcript * * *</h5></div>
                <div id="profile_content">
                  <table class="table results_tbl">
                    <tbody>
                      <tr>
                        <td id="results_body">

                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td style="padding: 20px">
                          <table style="border: none;width:  100%;">
                            <tr>
                              <td style="text-align: left;"><div><img src="../../images/logo.png" width="100px"></div></td>
                              <td style="text-align: center;font-family: 'new times roman';">
                                <div>
                                  <p style="font-size: 15px;">for Registrar:</p>
                                  <h6 id="trans_signatory"></h6>
                                  <br>
                                  ........................
                                </div>
                            </td>
                              <td style="text-align: right;font-style: italic;" id="verify_code">2323</td>
                            </tr>
                          </table>
                          
                        </td>
                      </tr>
                    </tfoot>
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

        <!-- End of Result Statment Modal-->

        <!-- Back Page (Grading System) -->
        <div class="modal fade" id="BackPageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Print Back</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body" id="print_bsc">
                <div id="back_container" style="color: black;text-align: justify;font-family: 'new times roman';">
                  <div style="text-align: center;width: 80%;margin-left: 10%;">
                    <h3>GUSHEGU NURSING TRAINING COLLEGE</h3>
                    <h4>OFFICE OF THE REGISTRAR</h4>
                    <h5>TRANSCRIPT KEY</h5>
                  </div>

                  <table style="width: 100%;border: 1px solid black;border-collapse: separate;border-spacing: 0;padding: 10px;">
                    <tr>
                      <td style="text-align: center;"><b>CGPA</b></td>
                    </tr>

                    <tr>
                      <td style="padding-left: 10px;">
                        <div style="text-align: center"><b>CLASS DESIGNATION</b></div>
                        <br>
                        <div style="text-align: center"><b>BACHELOR'S DEGREE</b></div>
                        <table class="">
                          <tr>
                            <td>4.50 &amp; Above</td>
                            <td>-</td>
                            <td>1<sup>st</sup> Class Honours</td>
                          </tr>
                          <tr>
                            <td>3.50 - 4.49</td>
                            <td>-</td>
                            <td>2<sup>nd</sup> Class Honour (Upper Disision)</td>
                          </tr>
                          <tr>
                            <td>2.50 - 3.49</td>
                            <td>-</td>
                            <td>2<sup>nd</sup> Class Honours (Lower Division)</td>
                          </tr>
                          <tr>
                            <td>2.00 - 2.49</td>
                            <td>-</td>
                            <td>3<sup>rd</sup> Class Honours</td>
                          </tr>
                          <tr>
                            <td>1.50 - 1.99</td>
                            <td>-</td>
                            <td>Pass</td>
                          </tr>
                          <tr>
                            <td>Below 1.50</td>
                            <td>-</td>
                            <td>Fail</td>
                          </tr>
                        </table>
                      </td>
                    </tr>

                    <tr>
                      <td style="padding-left: 10px;">
                        <div style="text-align: center"><b>DIPLOMA</b></div>
                        <table class="">
                          <tr>
                            <td>4.5 &amp; Above</td>
                            <td>-</td>
                            <td>Distinction</td>
                          </tr>
                          <tr>
                            <td>1.50 - 4.49</td>
                            <td>-</td>
                            <td>Pass</td>
                          </tr>
                          <tr>
                            <td>Below 1.50</td>
                            <td>-</td>
                            <td>Fail</td>
                          </tr>
                        </table>
                      </td>
                    </tr>

                    <tr>
                      <td style="padding-left: 10px;">
                        <div style="text-align: center"><b>GLOSSARY</b></div>
                        <table class="">
                          <tr>
                            <td>*</td>
                            <td>-</td>
                            <td>Trail</td>
                          </tr>
                          <tr>
                            <td>**</td>
                            <td>-</td>
                            <td>Retaken</td>
                          </tr>
                          <tr>
                            <td>CC</td>
                            <td>-</td>
                            <td>Cummulative Credits</td>
                          </tr>
                          <tr>
                            <td>GPA</td>
                            <td>-</td>
                            <td>Grade Point Average</td>
                          </tr>
                          <tr>
                            <td>CGPA</td>
                            <td>-</td>
                            <td>Cummulative Grade Point Average</td>
                          </tr>
                        </table>
                      </td>
                    </tr>

                    <tr>
                      <td style="padding-left: 10px;">
                        <div style="text-align: center"><b>PASS GRADES</b></div>
                        <table class="" style="width: 100%;">
                          <thead>
                            <th>Grade</th>
                            <th>Value</th>
                            <th>Score</th>
                            <th>Remarks</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>A+</td>
                              <td>5</td>
                              <td>80% &amp; Above</td>
                              <td>Excellent</td>
                            </tr>
                            <tr>
                              <td>A</td>
                              <td>4.5</td>
                              <td>70%- 79.99%</td>
                              <td>Excellent</td>
                            </tr>
                            <tr>
                              <td>B+</td>
                              <td>4</td>
                              <td>65- 69.99%</td>
                              <td>Very Good</td>
                            </tr>
                            <tr>
                              <td>B</td>
                              <td>3.5</td>
                              <td>60 -64.99%</td>
                              <td>Very Good</td>
                            </tr>
                            <tr>
                              <td>C+</td>
                              <td>3</td>
                              <td>55 -59.99%</td>
                              <td>Good</td>
                            </tr>
                            <tr>
                              <td>C</td>
                              <td>2.5</td>
                              <td>50 -54.99%</td>
                              <td>Good</td>
                            </tr>
                            <tr>
                              <td>D+</td>
                              <td>2</td>
                              <td>45 -49.99%</td>
                              <td>Satisfactory</td>
                            </tr>
                            <tr>
                              <td>D</td>
                              <td>1.5</td>
                              <td>40 -44.99%</td>
                              <td>Satisfactory</td>
                            </tr>

                          </tbody>
                        </table>
                      </td>
                    </tr>

                    <tr>
                      <td style="padding-left: 10px;">
                        <div style="text-align: center"><b>FAILURE GRADE</b></div>
                        <table class="" style="width: 100%;">
                          <thead>
                            <th>Grade</th>
                            <th>Value</th>
                            <th>Score</th>
                            <th>Remarks</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>F</td>
                              <td>0</td>
                              <td>0 -39.99%</td>
                              <td>Fail</td>
                            </tr>

                          </tbody>
                        </table>
                      </td>
                    </tr>


                  </table>
                  <div style="text-align: center;width: 80%;margin-left: 10%;">
                    <p>* The Authenticity of this transcript may be checked from the Academic Affairs Office.</p>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="print('back_container')" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>

              </div>
            </div>
          </div>
        </div>

        <!-- End of Back Page -->
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
  <script src="../../js/print.js" type="text/javascript"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../../js/dashboard.js"></script>
  
  <script src="../../js/custom.js"></script>
  <script src="function.js"></script>
</body>

</html>