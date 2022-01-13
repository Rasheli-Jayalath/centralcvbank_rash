<?php
error_reporting( E_ALL & ~E_NOTICE );
session_start();
$strusername = $_SESSION[ 'uname' ];


if ( $strusername == null ) {
  header( "Location: ../index.php?init=3" );
}
$cvflag = $_SESSION[ 'cv' ];
$cvadmflag = $_SESSION[ 'cvadm' ];
$cventryflag = $_SESSION[ 'cventry' ];
$superadminflag = $_SESSION[ 'superadmin' ];
$uid = $_SESSION[ 'uid' ];
$name = $_SESSION[ 'uname' ];
//$user_status = $_SESSION['user_status'];
//$userphoto =  $uid."-".$name.".jpg";
@require_once( "requires/session.php" );

$objDb = new Database();
//$objDb1 = new Database();

function roundToTheNearestAnything( $value, $roundTo ) {
  $mod = $value % $roundTo;
  return $value + ( $mod < ( $roundTo / 2 ) ? -$mod : $roundTo - $mod );
}


if ( $cvflag == 0 ) {
  header( "Location: ../index.php" );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SACA CV Bank </title>
<!-- plugins:css -->
<link rel="stylesheet" href="vendors/feather/feather.css">
<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/typicons/typicons.css">
<link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
<!-- endinject --> 
<!-- Plugin css for this page -->
<link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="js/select.dataTables.min.css">
<!-- End plugin css for this page --> 
<!-- inject:css -->
<link rel="stylesheet" href="css/vertical-layout-light/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="images/favicon.png" />
<link rel="stylesheet" href="css/counting.css">
</head>
<body>
<div class="container-scroller">
<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize"> <span class="icon-menu"></span> </button>
    </div>
    <div> <a class="navbar-brand brand-logo" href="index.php"> <img src="images/faviconblue.png" alt="saca smec logo" /> </a> <a class="navbar-brand brand-logo-mini" href="index.php"> <img src="images/logo-mini.svg" alt="logo" /> </a> </div>
  </div>
  <? include "includes/topheader.php" ; ?>
    
    <!-- //yyyy   -->
    
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas"> <span class="mdi mdi-menu"></span> </button>
  </div>
</nav>
  </div>

	
<!-- partial -->
<div class="container-fluid page-body-wrapper"> 
  <!-- partial:partials/_settings-panel.html -->
  <? include "includes/skinwheel.php"; ?>
  
  <!--	  
    <div id="right-sidebar" class="settings-panel"> <i class="settings-close ti-close"></i>
      <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item"> <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a> </li>
        <li class="nav-item"> <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a> </li>
      </ul>
      <div class="tab-content" id="setting-content">
        <div class="tab-pane fasede show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
          <div class="add-items d-flex px-3 mb-0">
            <form class="form w-100">
              <div class="form-group d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
              </div>
            </form>
          </div>
          <div class="list-wrapper px-3">
            <ul class="d-flex flex-column-reverse todo-list">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Team review meeting at 3.00 PM </label>
                </div>
                <i class="remove ti-close"></i> </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Prepare for presentation </label>
                </div>
                <i class="remove ti-close"></i> </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Resolve all the low priority tickets due today </label>
                </div>
                <i class="remove ti-close"></i> </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Schedule meeting for next week </label>
                </div>
                <i class="remove ti-close"></i> </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Project review </label>
                </div>
                <i class="remove ti-close"></i> </li>
            </ul>
          </div>
          <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2"> <i class="ti-control-record text-primary me-2"></i> <span>Feb 11 2018</span> </div>
            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
            <p class="text-gray mb-0">The total number of sessions</p>
          </div>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2"> <i class="ti-control-record text-primary me-2"></i> <span>Feb 7 2018</span> </div>
            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
            <p class="text-gray mb-0 ">Call Sarah Graves</p>
          </div>
        </div>
        <!-- To do section tab ends  
        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small> </div>
          <ul class="chat-list">
            <li class="list active">
              <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Thomas Douglas</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">19 min</small> </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <div class="wrapper d-flex">
                  <p>Catherine</p>
                </div>
                <p>Away</p>
              </div>
              <div class="badge badge-success badge-pill my-auto mx-2">4</div>
              <small class="text-muted my-auto">23 min</small> </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Daniel Russell</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">14 min</small> </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <p>James Richardson</p>
                <p>Away</p>
              </div>
              <small class="text-muted my-auto">2 min</small> </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Madeline Kennedy</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">5 min</small> </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Sarah Graves</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">47 min</small> </li>
          </ul>
        </div>
        <!-- chat tab ends  
      </div>
    </div>--> 
  <!-- partial --> 
  <!-- partial:partials/_sidebar.html leftside menu -->
  <? include "includes/leftsidemenu.php"; ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
              <div>
                <div class="btn-wrapper"> 
                  <!--   <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>  --> 
                </div>
              </div>
            </div>
            <div class="tab-content tab-content-basic">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                      <div>
                        <p class="statistics-title">Employees</p>
                        <h3 class="rate-percentage">
                          <?php
                          $sql = mysql_query( "SELECT COUNT(egcEmployee) AS Employees FROM tblcvmain WHERE egcEmployee='E'" );
                          $data = mysql_fetch_assoc( $sql );
                          //echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
                          ?>
                          <div  >
                          <span class="count"> <? echo $data['Employees']; ?></span></h3>
                        <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
	</div> 

	<div>
	<p class="statistics-title">Potential CVs</p>
	<h3 class="rate-percentage">100+</h3>
	<!-- <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>--> 
                      </div>
                      <div>
                        <p class="statistics-title">Employees</p>
                        <h3 class="rate-percentage">
                          <?php
                          $sql = mysql_query( "SELECT COUNT(egcEmployee) AS Employees FROM tblcvmain WHERE egcEmployee='E'" );
                          $data = mysql_fetch_assoc( $sql );
                          //echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
                          ?>
                          <div  >
                          <span class="count"> <? echo $data['Employees']; ?></span></h3>
                        <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
	</div> 

	<div>
	<p class="statistics-title">Potential CVs</p>
	<h3 class="rate-percentage">100+</h3>
	<!-- <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>--> 
                      </div>
                      <div>
                        <p class="statistics-title">Freelancers</p>
                        <h3 class="rate-percentage">
                          <?php
                          $sql = mysql_query( "SELECT COUNT(egcEmployee) AS Freelancer FROM tblcvmain WHERE egcEmployee='F'" );
                          $data = mysql_fetch_assoc( $sql );
                          //echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
                          ?>
                          <div  >
                          <span class="count"> <? echo $data['Freelancer']; ?> </span></h3>
                        <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>--> 
                      </div>
                      <div class="d-none d-md-block">
                        <p class="statistics-title">Ex-Employees</p>
                        <h3 class="rate-percentage">
                          <?php
                          $sql = mysql_query( "SELECT COUNT(egcEmployee) AS ExEmployees FROM tblcvmain WHERE egcEmployee='X'" );
                          $data = mysql_fetch_assoc( $sql );
                          //echo '<font color=gray size="6"><b>'.$data['ExEmployees'].'</b></font>';
                          ?>
                          <div  >
                          <span class="count"> <? echo $data['ExEmployees']; ?> </span> </h3>
                        <!-- <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>--> 
                      </div>
                      <div class="d-none d-md-block">
                        <p class="statistics-title">Other Talent</p>
                        <h3 class="rate-percentage">
                          <?php
                          $sql = mysql_query( "SELECT COUNT(egcEmployee) AS OthEmployees FROM tblcvmain WHERE egcEmployee='O'" );
                          $data = mysql_fetch_assoc( $sql );
                          //echo '<font color=#DEA202 size="6"><b>'.$data['OthEmployees'].'</b></font>';
                          ?>
                          <div  >
                          <span class="count"> <? echo $data['OthEmployees']; ?> </span></h3>
                        <!--<p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>--> 
                      </div>
                      <div class="d-none d-md-block">
                        <p class="statistics-title">SJ Talent</p>
                        <h3 class="rate-percentage">
                          <?php
                          $sql = mysql_query( "SELECT COUNT(sjEmp) AS sjEmployees FROM tblcvmain WHERE sjEmp='Y'" );
                          $data = mysql_fetch_assoc( $sql );
                          //echo '<font color=#DEA202 size="6"><b>'.$data['sjEmployees'].'</b></font>';
                          ?>
                          <div id="lahorecouting">
                          <span class="count"> <? echo $data['sjEmployees']; ?> </span></h3>
                        <!-- <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>--> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                   <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the printing</h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div class="chartjs-wrapper mt-5">
                                  <canvas id="performaneLine"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card bg-primary card-rounded">
                              <div class="card-body pb-0">
                                <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <p class="status-summary-ight-white mb-1">Closed Value</p>
                                    <h2 class="text-info">357</h2>
                                  </div>
                                  <div class="col-sm-8">
                                    <div class="status-summary-chart-wrapper pb-4">
                                      <canvas id="status-summary"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                      <div class="circle-progress-width">
                                        <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                      </div>
                                      <div>
                                        <p class="text-small mb-2">Total Visitors</p>
                                        <h4 class="mb-0 fw-bold">26.80%</h4>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="circle-progress-width">
                                        <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                      </div>
                                      <div>
                                        <p class="text-small mb-2">Visits per day</p>
                                        <h4 class="mb-0 fw-bold">9065</h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>-->
 
                          
                          
                          
                          
                          
<!--pol end ----------------                         -->
                          
                <div class="row">
                  <div class="row flex-grow">
                    <div class="col-md-2 grid-margin stretch-card" >
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Afghanistan</h4>
                          <div class="media">
                            <div class="media-body"> <img src="images/flagsaca/afghanistan.png" width="61" height="61" alt=""/>
                              <h2>
                              <span style="font-size: 35pt"> 235</span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Bangladesh</h4>
                          <div class="media">
                            <div class="media-body"> <img src="images/flagsaca/bangladesh.png" width="61" height="61" alt=""/>
                              <h2>
                              <span style="font-size: 35pt"> 235</span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Georgia</h4>
                          <div class="media">
                            <div class="media-body"> <img src="images/flagsaca/georgia.png" width="61" height="61" alt=""/>
                              <h2>
                              <span style="font-size: 35pt"> 235</span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">India</h4>
                          <div class="media">
                            <div class="media-body"> <img src="images/flagsaca/india.png" width="61" height="61" alt=""/>
                              <h2>
                              <span style="font-size: 35pt"> 235</span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Nepal</h4>
                          <div class="media">
                            <div class="media-body"> <img src="images/flagsaca/Nepal.png" width="61" height="61" alt=""/>
                              <h2>
                              <span style="font-size: 35pt"> 235</span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Pakistan</h4>
                          <div class="media">
                            <div class="media-body"> <img src="images/flagsaca/pakistany.png" width="61" height="61" alt=""/>
                              <h2>
                              <span style="font-size: 35pt"> 235</span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
<!--                    <div class="col-md-2 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Sri Lanka</h4>
                          <div class="media">
                            <div class="media-body"> <img src="images/flagsaca/srilanka.png" width="61" height="61" alt=""/>
                              <h2>
                              <span style="font-size: 35pt">
                              <?php
                              $sql = mysql_query( "SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='afghanistan'  " );
                              $data = mysql_fetch_assoc( $sql );
                              //echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
                              ?>
                              <div  ><span class="count"> <? echo $data['CountryData']; ?> </span></div>
                              </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
-->
             
                    
       <div class="row">

                      <!-- Last 4 week CV Entry -->
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Last 4 Week CV Entry Progress</h4>
                                   <h5 class="card-subtitle card-subtitle-dash"></h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div id="weeklychartid"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Last 4 week CV Entry -->

                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">


                           <!-- CV wise Entries -->
                           <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                      
                                      <div class="bg-primary" style="color: white;padding: 10px;border-radius: 15px;text-align: center;">
                                        <i class="mdi mdi-earth" style="font-size: 30px;"></i>
                                        <p class="text-small mb-2"  style="font-size: 13px;">	Foreigners</p>
                                        <a href="#"><h4 class="mb-0 fw-bold" style="font-size: 25px;color: gold;">411</h4></a>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    
                                      
                                      <div class="bg-primary" style="color: white;padding: 10px;border-radius: 15px;text-align: center;">
                                        <i class="mdi mdi-check-all" style="font-size: 30px;"></i>
                                        <p class="text-small mb-2" style="font-size: 13px;">Verified CVs</p>
                                        <a href="#"><h4 class="mb-0 fw-bold" style="font-size: 30px;color: gold;" >364</h4></a>
                                      </div>
                                  </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                  <div class="col-sm-6">
                                    
                                      <div class="bg-primary" style="color: white;padding: 10px;border-radius: 15px;text-align: center;">
                                        <i class="mdi mdi-tie" style="font-size: 30px;"></i>
                                        <p class="text-small mb-2" style="font-size: 13px;">Ph.D. Doctors</p>
                                        <a href="#"><h4 class="mb-0 fw-bold" style="font-size: 30px;color: gold;">76</h4></a>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">

                                      <div class="bg-primary" style="color: white;padding: 10px;border-radius: 15px;text-align: center;">
                                        <i class="mdi mdi-sync-alert" style="font-size: 30px;"></i>
                                        <p class="text-small mb-2" style="font-size: 13px;">Pending CVs</p>
                                       <a href="#"> <h4 class="mb-0 fw-bold" style="font-size: 30px;color: gold;">108</h4></a>
                                      </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                          <!-- CV wise Entries -->


                          <!-- Todays Entries -->
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded" style="background-image: linear-gradient(to bottom right, #02aab0 , #00cdac );">
                              <div class="card-body pb-0">
                                <h4 class="card-title card-title-dash mb-4" style=" font-size: 25px;text-align: center; color: white;">Today's Entries</h4>
                                
                                <div class="row" style="margin-bottom: 15px;margin-left: 5px;">

                                  <div class="col-sm-3" style="background-color: aliceblue;padding: 5px;border-radius: 15px;text-align: center;">
                                    <p class="status-summary-ight-white mb-1" style="font-size: 16px;color: black;font-weight: 600;margin-top: 12px;">New Entries</p>
                                    <h2 class="text-info" style="margin-top: 10px;">0</h2>
                                  </div>

                                  <div class="col-sm-4" style="background-color: aliceblue;padding: 5px;border-radius: 15px;text-align: center;margin-left: 10px;">
                                    <p class="status-summary-ight-white mb-1" style="font-size: 16px;color: black;font-weight: 600;margin-top: 12px;">Modified Entries</p>
                                    <h2 class="text-info" style="margin-top: 10px;">0</h2>
                                  </div>

                                  <div class="col-sm-4" style="background-color: aliceblue;padding: 5px;border-radius: 15px;text-align: center;margin-left: 10px">
                                    <p class="status-summary-ight-white mb-1" style="font-size: 16px;color: black;font-weight: 600;margin-top: 12px;">Total CVs</p>
                                    <h2 class="text-info" style="margin-top: 10px;">3837</h2>
                                    <!-- <p class="status-summary-ight-white mb-1" style="color: gray;">50% Complete</p> -->
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Todays Entries -->

                         

                          
                        </div>
                      </div>
                    </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                  <h4 class="card-title card-title-dash">Top Performer</h4>
                                </div>
                              </div>
                              <div class="mt-3">
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Brandon Washington</p>
                                      <small class="text-muted mb-0">162543</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face2.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                      <small class="text-muted mb-0">162543</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face3.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                      <small class="text-muted mb-0">162543</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face4.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                      <small class="text-muted mb-0">162543</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face5.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                      <small class="text-muted mb-0">Alaska, USA</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row flex-grow">
                    <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body card-rounded">
                          <h4 class="card-title  card-title-dash">Recent Entries</h4>
                          <div class="wrapper w-100">
                            <div class="list align-items-center border-bottom py-2">
                              <?
                              $sSQL02 = " SELECT cvId, name,position,totalExp, lastupdate, lastupdate FROM tblcvmain order by lastupdate DESC limit 0,1";
                              $objDb->query( $sSQL02 );
                              ?>
                              <?
                              $cvId = $objDb->getField( 0, cvId );
                              $name = $objDb->getField( 0, name );
                              $position = $objDb->getField( 0, position );
                              $totalExp = $objDb->getField( 0, totalExp );
                              $lastupdate = $objDb->getField( 0, lastupdate );
                              $lastupdate = $objDb->getField( 0, lastupdate );

                              //$newDateplaced = date("Y-M-d", strtotime($lastupdate1));
                              //$lastupdate = $newDateplaced;
                              ?>
                              <p class="mb-2 font-weight-medium"> <span style="font-size: 11pt">
                                <?=$name ."</span> - ". $position; ?>
                              </p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="mdi mdi-calendar text-muted me-1"></i>
                                  <p class="mb-0 text-small text-muted">
                                    <?=$lastupdate ?>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="wrapper w-100">
                              <div class="list align-items-center border-bottom py-2">
                                <?
                                $sSQL02 = " SELECT cvId, name,position,totalExp, lastupdate, lastupdate FROM tblcvmain order by lastupdate DESC limit 1,1";
                                $objDb->query( $sSQL02 );
                                ?>
                                <?
                                $cvId = $objDb->getField( 0, cvId );
                                $name = $objDb->getField( 0, name );
                                $position = $objDb->getField( 0, position );
                                $totalExp = $objDb->getField( 0, totalExp );
                                $lastupdate = $objDb->getField( 0, lastupdate );

                                //$newDateplaced = date("Y-M-d", strtotime($lastupdate1));
                                //$lastupdate = $newDateplaced;
                                ?>
                                <p class="mb-2 font-weight-medium"> <span style="font-size: 11pt">
                                  <?=$name ."</span> - ". $position; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center"> <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted">
                                      <?=$lastupdate ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="wrapper w-100">
                                <div class="list align-items-center border-bottom py-2">
                                  <?
                                  $sSQL02 = " SELECT cvId, name,position,totalExp, lastupdate, lastupdate FROM tblcvmain order by lastupdate DESC limit 2,1";
                                  $objDb->query( $sSQL02 );
                                  ?>
                                  <?
                                  $cvId = $objDb->getField( 0, cvId );
                                  $name = $objDb->getField( 0, name );
                                  $position = $objDb->getField( 0, position );
                                  $totalExp = $objDb->getField( 0, totalExp );
                                  $lastupdate = $objDb->getField( 0, lastupdate );

                                  //$newDateplaced = date("Y-M-d", strtotime($lastupdate1));
                                  //$lastupdate = $newDateplaced;
                                  ?>
                                  <p class="mb-2 font-weight-medium"> <span style="font-size: 11pt">
                                    <?=$name ."</span> - ". $position; ?>
                                  </p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> <i class="mdi mdi-calendar text-muted me-1"></i>
                                      <p class="mb-0 text-small text-muted">
                                        <?=$lastupdate ?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="wrapper w-100">
                                  <div class="list align-items-center border-bottom py-2">
                                    <?
                                    $sSQL02 = " SELECT cvId, name,position,totalExp, lastupdate, lastupdate FROM tblcvmain order by lastupdate DESC limit 3,1";
                                    $objDb->query( $sSQL02 );
                                    ?>
                                    <?
                                    $cvId = $objDb->getField( 0, cvId );
                                    $name = $objDb->getField( 0, name );
                                    $position = $objDb->getField( 0, position );
                                    $totalExp = $objDb->getField( 0, totalExp );
                                    $lastupdate = $objDb->getField( 0, lastupdate );

                                    //$newDateplaced = date("Y-M-d", strtotime($lastupdate1));
                                    //$lastupdate = $newDateplaced;
                                    ?>
                                    <p class="mb-2 font-weight-medium"> <span style="font-size: 11pt">
                                      <?=$name ."</span> - ". $position; ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center"> <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">
                                          <?=$lastupdate ?>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="wrapper w-100">
                                    <div class="list align-items-center border-bottom py-2">
                                      <?
                                      $sSQL02 = " SELECT cvId, name,position,totalExp, lastupdate, lastupdate FROM tblcvmain order by lastupdate DESC limit 4,1";
                                      $objDb->query( $sSQL02 );
                                      ?>
                                      <?
                                      $cvId = $objDb->getField( 0, cvId );
                                      $name = $objDb->getField( 0, name );
                                      $position = $objDb->getField( 0, position );
                                      $totalExp = $objDb->getField( 0, totalExp );
                                      $lastupdate = $objDb->getField( 0, lastupdate );

                                      //$newDateplaced = date("Y-M-d", strtotime($lastupdate1));
                                      //$lastupdate = $newDateplaced;
                                      ?>
                                      <p class="mb-2 font-weight-medium"> <span style="font-size: 11pt">
                                        <?=$name ."</span> - ". $position; ?>
                                      </p>
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center"> <i class="mdi mdi-calendar text-muted me-1"></i>
                                          <p class="mb-0 text-small text-muted">
                                            <?=$lastupdate ?>
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title card-title-dash">DEO Activities</h4>
                            <p class="mb-0">20 finished, 5 remaining</p>
                          </div>
                          <ul>
                            <li>
                              <div class="d-flex justify-content-between">
                                <?
                                $sSQL03 = " SELECT cvId, ep_name, lastupdate FROM tblcvmain order by lastupdate DESC limit 0,1";
                                $objDb->query( $sSQL03 );
                                 
                                $cvId = $objDb->getField( 0, cvId );
                                $epname = $objDb->getField( 0, ep_name );
                                $lastupdate = $objDb->getField( 0, lastupdate );
                                ?>
                                <div>
                                  <p class="mb-2 font-weight-medium">
                                    <?=$cvId ?>
                                    <span class="text-light-green style='font-size: 11pt' "> <em>entered by</em> </span>
                                    <?=$epname; ?>
                                  </p>
                                </div>
                                <p>Just now</p>
                           
                            </li>
								
								
                            <li>
                              <div class="d-flex justify-content-between">
                                <?
									$sSQL03 = " SELECT cvId, ep_name, lastupdate  FROM tblcvmain order by lastupdate DESC limit 1,1";
									$objDb->query( $sSQL03 );

									$cvId = $objDb->getField( 0, cvId );
									$epname = $objDb->getField( 0, ep_name );
									$lastupdate = $objDb->getField( 0, lastupdate );
                                ?>
                                <div>
								<p class="mb-2 font-weight-medium"><?=$cvId ?>
								<span class="text-light-green style='font-size: 11pt' "> <em>entered by</em> </span><?=$epname; ?>
									
									 </p>
                                </div>
                                <p>1hr</p>
                              </div>
                            </li>	
									
									
                            <li>
                              <div class="d-flex justify-content-between">
                                <?
                                $sSQL03 = " SELECT cvId, ep_name, lastupdate  FROM tblcvmain order by lastupdate DESC limit 2,1";
                                $objDb->query( $sSQL03 );
                                
                                $cvId = $objDb->getField( 0, cvId );
                                $epname = $objDb->getField( 0, ep_name );
                                $lastupdate = $objDb->getField( 0, lastupdate );
                                ?>
                                <div>
							    <p class="mb-2 font-weight-medium"><?=$cvId ?>
								 <span class="text-light-green style='font-size: 11pt' "> <em>entered by</em> </span><?=$epname; ?>
								 </p>
                                </div>
                                <p>1hr</p>
                              </div>
                            </li>	
							  
  <li>
                              <div class="d-flex justify-content-between">
                                <?
                                $sSQL03 = " SELECT cvId, ep_name, lastupdate FROM tblcvmain order by lastupdate DESC limit 3,1";
                                $objDb->query( $sSQL03 );
                                 
                                $cvId = $objDb->getField( 0, cvId );
                                $epname = $objDb->getField( 0, ep_name );
                                $lastupdate = $objDb->getField( 0, lastupdate );
                                ?>
                                <div>
                                  <p class="mb-2 font-weight-medium">
                                    <?=$cvId ?>
                                    <span class="text-light-green style='font-size: 11pt' "> <em>entered by</em> </span>
                                    <?=$epname; ?>
                                  </p>
                                </div>
                                <p>3hr</p>
                              </div>
                            </li>									

				  <li>
                              <div class="d-flex justify-content-between">
                                <?
                                $sSQL03 = " SELECT cvId, ep_name, lastupdate FROM tblcvmain order by lastupdate DESC limit 4,1";
                                $objDb->query( $sSQL03 );
                                 
                                $cvId = $objDb->getField( 0, cvId );
                                $epname = $objDb->getField( 0, ep_name );
                                $lastupdate = $objDb->getField( 0, lastupdate );
                                ?>
                                <div>
                                  <p class="mb-2 font-weight-medium">
                                    <?=$cvId ?>
                                    <span class="text-light-green style='font-size: 11pt' "> <em>entered by</em> </span>
                                    <?=$epname; ?>
                                  </p>
                                </div>
                                <p>2hr</p>
                              </div>
                            </li>	
									
									
	                          </ul>
								  
								  
								  
								  
                          <div class="list align-items-center pt-3">
                            <div class="wrapper w-100">
                              <p class="mb-0"> <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a> </p>
								
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
				 					  
								  
								  
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                  <h4 class="card-title card-title-dash">Top Performer</h4>
                                </div>
                              </div>
                              <div class="mt-3">
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Brandon Washington</p>
                                      <small class="text-muted mb-0">162543</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face2.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                      <small class="text-muted mb-0">162543</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face3.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                      <small class="text-muted mb-0">162543</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face4.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                      <small class="text-muted mb-0">162543</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                  <div class="d-flex"> <img class="img-sm rounded-10" src="images/faces/face5.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                      <small class="text-muted mb-0">Alaska, USA</small> </div>
                                  </div>
                                  <div class="text-muted text-small"> 1h ago </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8 d-flex flex-column">
                    <div class="row flex-grow">
                      <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                              <div>
                                <h4 class="card-title card-title-dash">Market Overview</h4>
                                <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                              </div>
                              <div>
                                <div class="dropdown">
                                  <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <h6 class="dropdown-header">Settings</h6>
                                    <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a> </div>
                                </div>
                              </div>
                            </div>
                            <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                              <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                <h2 class="me-2 fw-bold">$36,2531.00</h2>
                                <h4 class="me-2">USD</h4>
                                <h4 class="text-success">(+1.37%)</h4>
                              </div>
                              <div class="me-3">
                                <div id="marketing-overview-legend"></div>
                              </div>
                            </div>
                            <div class="chartjs-bar-wrapper mt-3">
                              <canvas id="marketingOverview"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row flex-grow">
                      <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                              <div>
                                <h4 class="card-title card-title-dash">Pending Requests</h4>
                                <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                              </div>
                              <div>
                                <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                              </div>
                            </div>
                            <div class="table-responsive  mt-1">
                              <table class="table select-table">
                                <thead>
                                  <tr>
                                    <th> <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" aria-checked="false">
                                          <i class="input-helper"></i></label>
                                      </div>
                                    </th>
                                    <th>Customer</th>
                                    <th>Company</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" aria-checked="false">
                                          <i class="input-helper"></i></label>
                                      </div></td>
                                    <td><div class="d-flex "> <img src="images/faces/face1.jpg" alt="">
                                        <div>
                                          <h6>Brandon Washington</h6>
                                          <p>Head admin</p>
                                        </div>
                                      </div></td>
                                    <td><h6>Company name 1</h6>
                                      <p>company type</p></td>
                                    <td><div>
                                        <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                          <p class="text-success">79%</p>
                                          <p>85/162</p>
                                        </div>
                                        <div class="progress progress-md">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div></td>
                                    <td><div class="badge badge-opacity-warning">In progress</div></td>
                                  </tr>
                                  <tr>
                                    <td><div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" aria-checked="false">
                                          <i class="input-helper"></i></label>
                                      </div></td>
                                    <td><div class="d-flex"> <img src="images/faces/face2.jpg" alt="">
                                        <div>
                                          <h6>Laura Brooks</h6>
                                          <p>Head admin</p>
                                        </div>
                                      </div></td>
                                    <td><h6>Company name 1</h6>
                                      <p>company type</p></td>
                                    <td><div>
                                        <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                          <p class="text-success">65%</p>
                                          <p>85/162</p>
                                        </div>
                                        <div class="progress progress-md">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div></td>
                                    <td><div class="badge badge-opacity-warning">In progress</div></td>
                                  </tr>
                                  <tr>
                                    <td><div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" aria-checked="false">
                                          <i class="input-helper"></i></label>
                                      </div></td>
                                    <td><div class="d-flex"> <img src="images/faces/face3.jpg" alt="">
                                        <div>
                                          <h6>Wayne Murphy</h6>
                                          <p>Head admin</p>
                                        </div>
                                      </div></td>
                                    <td><h6>Company name 1</h6>
                                      <p>company type</p></td>
                                    <td><div>
                                        <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                          <p class="text-success">65%</p>
                                          <p>85/162</p>
                                        </div>
                                        <div class="progress progress-md">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div></td>
                                    <td><div class="badge badge-opacity-warning">In progress</div></td>
                                  </tr>
                                  <tr>
                                    <td><div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" aria-checked="false">
                                          <i class="input-helper"></i></label>
                                      </div></td>
                                    <td><div class="d-flex"> <img src="images/faces/face4.jpg" alt="">
                                        <div>
                                          <h6>Matthew Bailey</h6>
                                          <p>Head admin</p>
                                        </div>
                                      </div></td>
                                    <td><h6>Company name 1</h6>
                                      <p>company type</p></td>
                                    <td><div>
                                        <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                          <p class="text-success">65%</p>
                                          <p>85/162</p>
                                        </div>
                                        <div class="progress progress-md">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div></td>
                                    <td><div class="badge badge-opacity-danger">Pending</div></td>
                                  </tr>
                                  <tr>
                                    <td><div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" aria-checked="false">
                                          <i class="input-helper"></i></label>
                                      </div></td>
                                    <td><div class="d-flex"> <img src="images/faces/face5.jpg" alt="">
                                        <div>
                                          <h6>Katherine Butler</h6>
                                          <p>Head admin</p>
                                        </div>
                                      </div></td>
                                    <td><h6>Company name 1</h6>
                                      <p>company type</p></td>
                                    <td><div>
                                        <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                          <p class="text-success">65%</p>
                                          <p>85/162</p>
                                        </div>
                                        <div class="progress progress-md">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div></td>
                                    <td><div class="badge badge-opacity-success">Completed</div></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 d-flex flex-column">
                    <div class="row flex-grow">
                      <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                  <h4 class="card-title card-title-dash">Type By Amount</h4>
                                </div>
                                <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row flex-grow">
                      <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                  <div>
                                    <h4 class="card-title card-title-dash">Leave Report1.1</h4>
                                  </div>
                                  <div>
                                    <div class="dropdown"> 
                                      <!-- <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button> 
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                            <h6 class="dropdown-header">Week Wise</h6>
                                            <a class="dropdown-item" href="#">Year Wise</a>
                                          </div>--> 
                                    </div>
                                  </div>
                                </div>
                                <div class="mt-3">
                                  <canvas id="leaveReport"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends --> 
    <!-- partial:partials/_footer.html -->
    <? include "includes/footer.php"; ?>
    <!-- partial --> 
  </div>
  <!-- main-panel ends --> 
</div>
<!-- page-body-wrapper ends --> 

<!-- container-scroller --> 

<!-- plugins:js --> 
                          
                           <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
    
    
    
  <!-- End custom js for this page-->
                        

     <script>
document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('weeklychartid', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['52','32']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                name: 'CV Entered/Week',
                data: [52, 32]
            }]
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('cventrychartid', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Manoj','Lalith','SL_BR6600001','Admin','BD_MN6400120','SS5500023','Neeraj','Seema','Kamraan','Nishva','Chetan','Mustafa','Tulika','Mayathri','ABC','Aman']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                name: 'CV Entered',
                data: [1,1,1,1,1,2,5,6,11,12,16,28,449,459,1102,1435]
            }]
        });
    });
    
  </script>

<script src="vendors/js/vendor.bundle.base.js"></script> 
<!-- endinject --> 
<!-- Plugin js for this page --> 
<script src="vendors/chart.js/Chart.min.js"></script> 
<script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> 
<script src="vendors/progressbar.js/progressbar.min.js"></script> 

<!-- End plugin js for this page --> 
<!-- inject:js --> 
<script src="js/off-canvas.js"></script> 
<script src="js/hoverable-collapse.js"></script> 
<script src="js/template.js"></script> 
<script src="js/settings.js"></script> 
<script src="js/todolist.js"></script> 
<!-- endinject --> 
<!-- Custom js for this page--> 
<script src="js/dashboard.js"></script> 
<script src="js/Chart.roundedBarCharts.js"></script> 
<!-- End custom js for this page--> 

<script src='scripts/jquery.min.js'></script> 
<script src="scripts/counting.js"></script>
  

                          
                          
                          
</body>
</html>
