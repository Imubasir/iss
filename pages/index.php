<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ISS | Homepage</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../plugins/morris/moris.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../custom_css/custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/logo.png" />
</head>
<body>
  <div class="container-scroller d-flex">
    <!--  -->
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">

        <li class="nav-item active keep-open">
          <a class="nav-link index" data-toggle="collapse" href="#home" aria-expanded="false" aria-controls="home" id="home_menu">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Home</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="home">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item active" id="dashboard"> <a class="nav-link" href="./"> Dashboard </a></li>
              <li class="nav-item" id="profile"> <a class="nav-link" href="967595/"> Profile </a></li>
              <li class="nav-item" id="notification"> <a class="nav-link" href="939425/"> Notification </a></li>
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
              <li class="nav-item" id="enrollment"> <a class="nav-link" href="153180/"> Enrollment </a></li>
              <li class="nav-item" id="std_courses"> <a class="nav-link" href="593359/"> Courses </a></li>
              <li class="nav-item" id="std_programmes"> <a class="nav-link" href="793752/"> Programmes </a></li>
              <li class="nav-item" id="resultStatment"> <a class="nav-link" href="214071/"> Result Statements </a></li>
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
              <li class="nav-item" id="transcripts"> <a class="nav-link" href="351586/"> Transcripts </a></li>
              <li class="nav-item" id="signatory"> <a class="nav-link" href="559056/"> Signatory </a></li>
              <li class="nav-item" id="scheduler"> <a class="nav-link" href="969145/"> Scheduler </a></li>
              <li class="nav-item" id="requests"> <a class="nav-link" href="426771/"> Requests </a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item sidebar-category">
          <p>Institutional Settings</p>
          <span></span>
        </li>
        <li class="nav-item" id="users">
          <a class="nav-link" href="306248/">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Users</span>
          </a>
        </li>
        <li class="nav-item" id="sett_notification">
          <a class="nav-link" href="651616/">
            <i class="mdi mdi-bell-ring menu-icon"></i>
            <span class="menu-title">Notifications</span>
          </a>
        </li>
        <li class="nav-item" id="sett_programmes">
          <a class="nav-link" href="488208/">
            <i class="mdi mdi-view-list menu-icon"></i>
            <span class="menu-title">Programmes</span>
          </a>
        </li>
        <li class="nav-item" id="sett_courses">
          <a class="nav-link" href="258520/">
            <i class="mdi mdi-view-module menu-icon"></i>
            <span class="menu-title">Courses/Subjects</span>
          </a>
        </li>
        <li class="nav-item" id="uploads">
          <a class="nav-link" href="823219/">
            <i class="mdi mdi-cloud-upload menu-icon"></i>
            <span class="menu-title">Data Uploads</span>
          </a>
        </li>
        <li class="nav-item" id="update">
          <a class="nav-link" href="347077/">
            <i class="mdi mdi-tooltip-edit menu-icon"></i>
            <span class="menu-title">Update Data</span>
          </a>
        </li>
        <li class="nav-item" id="log">
          <a class="nav-link" href="206983/">
            <i class="mdi mdi-history menu-icon"></i>
            <span class="menu-title">Log</span>
          </a>
        </li>

        <li class="nav-item sidebar-category">
          <p></p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../">
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

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" id="logged_name">Welcome back, <?php echo $_SESSION['name'] ?></h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block" id="system_date"> <?php echo date('l d M Y') ?> </h4>
            </li>
            
            <li class="nav-item dropdown me-2">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-email-open mx-0"></i>
                <span class="count bg-danger">1</span>
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
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <h5 style="color: black;">Summary Statistics</h5>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="<?php echo '../images/profile_uploads/'.$_SESSION['image'] ?>" alt="profile"/>
                <span class="nav-profile-name"><?php echo $_SESSION['name'] ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="./180363/">
                  <i class="mdi mdi-trending-up text-primary"></i>
                  Reports
                </a>
                <a class="dropdown-item" href="./967595/">
                  <i class="mdi mdi-account text-primary"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="../">
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link icon-link">
                <i class="mdi mdi-plus-circle-outline"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://www.gntc.edu.gh" target="_blank" class="nav-link icon-link">
                <i class="mdi mdi-web"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link icon-link">
                <i class="mdi mdi-clock-outline"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <br>
          <div class="data_sum">
            <div class="row">
              <div class="col-3">
                <div class="card">
                  <div class="card-body" style="position: relative;">
                    <div class="data-content">
                      <div><h6>Population</h6></div>
                      <div>3,000</div>
                    </div>
                    <div class="data-icon data-icon-color1"><i class="mdi mdi-database"></i></div>
                    <hr class="divider">
                    <span class="data-meta">Overall Population</span>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="card">
                  <div class="card-body" style="position: relative;">
                    <div class="data-content">
                      <div><h6>Graduated</h6></div>
                      <div>2,500</div>
                    </div>
                    <div class="data-icon data-icon-color2"><i class="mdi mdi-account-star"></i></div>
                    <hr class="divider">
                    <span class="data-meta">Overall Graduates</span>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="card">
                  <div class="card-body" style="position: relative;">
                    <div class="data-content">
                      <div><h6>On Going</h6></div>
                      <div>2,500</div>
                    </div>
                    <div class="data-icon data-icon-color3"><i class="mdi mdi-checkbox-multiple-marked-circle-outline"></i></div>
                    <hr class="divider">
                    <span class="data-meta">Still Enrolled</span>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="card">
                  <div class="card-body" style="position: relative;">
                    <div class="data-content">
                      <div><h6>Requests Processed</h6></div>
                      <div>2,500</div>
                    </div>
                    <div class="data-icon data-icon-color4"><i class="mdi mdi-sync"></i></div>
                    <hr class="divider">
                    <span class="data-meta">Still Enrolled</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <canvas id="enrollChart" width="250" height="150"></canvas>
            </div>
            <div class="col-6">
              <canvas id="resultChart" width="250" height="150"></canvas>
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
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="../vendors/js/vendor.bundle.base.js"></script> -->
  
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../plugins/moment/moment.js" type="text/javascript"></script>
  <script src="../plugins/morris/moris.js" type="text/javascript"></script>
  <script src="../plugins/raphael/raphael.js" type="text/javascript"></script>

  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../js/dashboard.js"></script>
  <script src="../js/custom.js"></script>
</body>

<script type="text/javascript">
  keep_open("keep-open,index");
  home_notification();

  $(document).ready(function () {
    /*Enrollment Chart*/
    $.ajax({
      url: '../php/chartData.php',

      success:function (response) {
        console.log(response);
        var data = JSON.parse(response);
        var chartLabel = [];
        var chartValue = [];
        for(var i = 0; i<data.length; i++) {
          var label = data[i].entryyear;
          var value = data[i].value;

          chartLabel.push(label);
          chartValue.push(value);
        }

        var ctx = $("#enrollChart");
        var x = new Chart(ctx, {
          type: 'line',
          data: {
            labels: chartLabel,
            datasets: [{
              label: 'Enrollments',
              data: chartValue,
              backgroundColor: '#223e9c',
              borderColor: '#252d4a',
              pointStyle: 'triangle',
              pointRadius: '5',
              pointHoverRadius: '10'
            }]
          },
          options: {
            title: {
              display: true,
              text: 'Enrollments',
              fontStyle: 'bold',
              position: 'top',
              fontSize: 23
            },
            legend: {
              display: true,
              position: 'bottom'
            }
          }
        })
      }
    });

      /*Result Chart*/
    $.ajax({
      url: '../php/chartData.php',

      success:function (response) {
        console.log(response);
        var data = JSON.parse(response);
        var chartLabel = [];
        var chartValue = [];
        for(var i = 0; i<data.length; i++) {
          var label = data[i].entryyear;
          var value = data[i].value;

          chartLabel.push(label);
          chartValue.push(value);
        }

        var ctx = $("#resultChart");
        var x = new Chart(ctx, {
          type: 'line',
          data: {
            labels: chartLabel,
            datasets: [{
              label: 'Passed',
              data: chartValue,
              backgroundColor: '#7d8ac9bf',
              borderColor: '#252d4a',
              pointStyle: 'triangle',
              pointRadius: '5',
              pointHoverRadius: '10'
            },
            {
              label: 'Failed',
              data: chartValue,
              backgroundColor: 'rgb(255 66 15 / 35%)',
              borderColor: '#252d4a',
              pointStyle: 'triangle',
              pointRadius: '5',
              pointHoverRadius: '10'
            }]
          },
          options: {
            title: {
              display: true,
              text: 'Performance',
              fontStyle: 'bold',
              position: 'top',
              fontSize: 23
            },
            legend: {
              display: true,
              position: 'bottom'
            }
          }
        })
      }
    });
  })
</script>

</html>