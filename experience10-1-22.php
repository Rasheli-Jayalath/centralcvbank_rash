<?php
error_reporting( E_ALL & ~E_NOTICE );
session_start();
$strusername = $_SESSION[ 'uname' ];

$cvflag = $_SESSION[ 'cv' ];
$cvadmflag = $_SESSION[ 'cvadm' ];
$cventryflag = $_SESSION[ 'cventry' ];
$superadminflag = $_SESSION[ 'superadmin' ];

$strusername = $_SESSION[ 'uname' ];


$date = new DateTime();
$date->setTimezone( new DateTimeZone( 'Asia/Dhaka' ) );
$updatedon = $date->format( 'Y-m-d H:i:s' );


//echo $cvflag;
//echo $cvadmflag;
//echo $cventryflag;
//echo $strusername ;

if ( $strusername == null ) {
  header( "Location: ../index.php?init=3" );
} else if ( $cvadmflag == 0 and $cventryflag == 0 ) {
  header( "Location: ../index.php?init=3" );
  //echo "adm".$cvadmflag;
  //echo "entry".$cventryflag;
} else if ( $cventryflag == 0 ) {
  header( "Location: ../index.php?init=3" );
  //	echo "entry".$cventryflag;

}

?>
<?php
@require_once( "requires/session.php" );

$objDb = new Database();
$objDb2 = new Database();

@include( "fckeditor/fckeditor.php" );

$cvID = $_REQUEST[ 'id' ];
$edit = $_REQUEST[ 'edit' ];

if ( $cvID == "" ) {
  header( 'Location: submit-cv.php' );
}

$update = $_REQUEST[ 'update' ];
$save = $_REQUEST[ 'save' ];
$next = $_REQUEST[ 'next' ];
$clear = $_REQUEST[ 'clear' ];

$txtStartDate = $_REQUEST[ 'txtStartDate' ];
$txtLastDate = $_REQUEST[ 'txtLastDate' ];

$txtEmployeer = $_REQUEST[ 'txtEmployeer' ];
$txtPosition = $_REQUEST[ 'txtPosition' ];
$txtPName = $_REQUEST[ 'txtPName' ];
$txtLocation = $_REQUEST[ 'txtLocation' ];
$txtCountry = $_REQUEST[ 'txtCountry' ];
$txtClient = $_REQUEST[ 'txtClient' ];
$txtPDesc = $_REQUEST[ 'txtPDesc' ];
$txtDutyPerform = $_REQUEST[ 'txtDutyPerform' ];
//$txtDetailTasks = $_REQUEST['txtDetailTasks'];
$txterSummary = $_REQUEST[ 'txterSummary' ];
$txtrefName = $_REQUEST[ 'txtrefName' ];
$txtrefDesig = $_REQUEST[ 'txtrefDesig' ];
$txtrefTele = $_REQUEST[ 'txtrefTele' ];
$txtrefEmail = $_REQUEST[ 'txtrefEmail' ];
$txtprojCost = $_REQUEST[ 'txtprojCost' ];
$txtiprojCost = $_REQUEST[ 'txtiprojCost' ];
$txtprojDistance = $_REQUEST[ 'txtprojDistance' ];
$txtprojFundedby = $_REQUEST[ 'txtprojFundedby' ];
$todate = $_REQUEST[ 'todate' ];

//echo "============================";
if ( $clear != "" ) {
  header( 'Location: cvlist.php?v=latest' );
}

if ( $todate == 'Y' )$txtLastDate = 'To-Date';

if ( $save != "" ) {

  $iSql = "Insert into tblemploymentrecord SET 
					cvId        		= '$cvID',
					eFromDate 			= '$txtStartDate',
					eToDate 			= '$txtLastDate',
					employeer 			= '$txtEmployeer',
					jobTitle 			= '" . mysql_real_escape_string( $txtPosition ) . "',
					projTitle 			= '" . mysql_real_escape_string( $txtPName ) . "',
					location 			= '" . mysql_real_escape_string( $txtLocation ) . "',
					country 			= '$txtCountry',
					client 				= '" . mysql_real_escape_string( $txtClient ) . "',
					projDesc     		= '" . mysql_real_escape_string( $txtPDesc ) . "',
					dutiesPerformed     = '" . mysql_real_escape_string( $txtDutyPerform ) . "',
					ersummary	     	= '" . mysql_real_escape_string( $txterSummary ) . "',  
					refName     	    = '$txtrefName',  
					refDesig     	    = '$txtrefDesig',  
					refTele     	    = '$txtrefTele',  
					refEmail     	    = '$txtrefEmail',
					projCost     	    = '$txtprojCost',
					projFundedby   	    = '$txtprojFundedby',
					iprojCost     	    = '$txtiprojCost',
					projDistance   	    = '$txtprojDistance'
					 ";

  /*  			$iSql = "Insert into tblemploymentrecord SET 
  						cvId        		= '$cvID',
  						eFromDate 			= '$txtStartDate',
  						eToDate 			= '$txtLastDate',
  						employeer 			= '$txtEmployeer',
  						jobTitle 			= '".mysql_real_escape_string($txtPosition)."',
  						projTitle 			= '".mysql_real_escape_string($txtPName)."',
  						location 			= '".mysql_real_escape_string($txtLocation)."',
  						country 			= '$txtCountry',
  						client 				= '".mysql_real_escape_string($txtClient)."',
  						projDesc     		= '".mysql_real_escape_string($txtPDesc)."',
  						dutiesPerformed     = '".mysql_real_escape_string($txtDutyPerform)."',
  						detailTasks     	= '".mysql_real_escape_string($txtDetailTasks)."',  
  						ersummary	     	= '".mysql_real_escape_string($txterSummary)."',  
  						refName     	    = '$txtrefName',  
  						refDesig     	    = '$txtrefDesig',  
  						refTele     	    = '$txtrefTele',  
  						refEmail     	    = '$txtrefEmail'
  					 ";
  */


  //echo $iSql;
  $objDb2->execute( $iSql );


  $tuSql = "update tblcvmain SET lastupdate = now(),  ep_name = '$strusername' where cvId = '$cvID'";
  $objDb2->execute( $tuSql );

  $edit = "";
  $txtStartDate = "";
  $txtLastDate = "";
  $txtEmployeer = "";
  $txtPosition = "";
  $txtPName = "";
  $txtLocation = "";
  $txtCountry = "";
  $txtClient = "";
  $txtPDesc = "";
  $txtDutyPerform = "";
  //	$txtDetailTasks = "";
  $txterSummary = "";
  $txtrefName = "";
  $txtrefDesig = "";
  $txtrefTele = "";
  $txtrefEmail = "";

  $txtprojCost = "";
  $txtiprojCost = "";
  $txtprojDistance = "";

  $txtprojFundedby = "";
}

if ( $update != "" ) {
  $uSql = "Update tblemploymentrecord SET 
			cvId        		= '$cvID',
			eFromDate 			= '$txtStartDate',
			eToDate 			= '$txtLastDate',
			employeer 			= '$txtEmployeer',
			jobTitle 			= '" . mysql_real_escape_string( $txtPosition ) . "',
			projTitle 			= '" . mysql_real_escape_string( $txtPName ) . "',
			location 			= '" . mysql_real_escape_string( $txtLocation ) . "',
			country 			= '$txtCountry',
			client 				= '" . mysql_real_escape_string( $txtClient ) . "',
			projDesc     		= '" . mysql_real_escape_string( $txtPDesc ) . "',
			dutiesPerformed     = '" . mysql_real_escape_string( $txtDutyPerform ) . "',
			ersummary	     	= '" . mysql_real_escape_string( $txterSummary ) . "', 
			refName     	    = '$txtrefName',
			refDesig     	    = '$txtrefDesig',
			refTele     	    = '$txtrefTele',  
			refEmail     	    = '$txtrefEmail',
			projCost     	    = '$txtprojCost',
			projFundedby     	= '$txtprojFundedby',
			iprojCost     	    = '$txtiprojCost',
			projDistance   	    = '$txtprojDistance'

			where empId = '$edit' 
		  ";
  //echo $uSql."==upd============================";
  $objDb2->execute( $uSql );

  $tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";
  $objDb2->execute( $tuSql );


  $edit = "";
  $txtStartDate = "";
  $txtLastDate = "";
  $txtEmployeer = "";
  $txtPosition = "";
  $txtPName = "";
  $txtLocation = "";
  $txtCountry = "";
  $txtClient = "";
  $txtPDesc = "";
  $txtDutyPerform = "";
  //	$txtDetailTasks = "";
  $txterSummary = "";
  $txtrefName = "";
  $txtrefDesig = "";
  $txtrefTele = "";
  $txtprojDistance = "";
  $txtrefEmail = "";
  $txtprojFundedby = "";
  $txtprojCost = "";
  $txtiprojCost = "";

}

if ( $edit != "" ) {
  $eSql = "Select * from tblemploymentrecord where empId='$edit'";
  $objDb2->query( $eSql );
  $eCount = $objDb2->getCount();
  if ( $eCount > 0 ) {
    $eFromDate = $objDb2->getField( 0, eFromDate );
    $eToDate = $objDb2->getField( 0, eToDate );
    $employeer = $objDb2->getField( 0, employeer );
    $jobTitle = $objDb2->getField( 0, jobTitle );
    $projTitle = $objDb2->getField( 0, projTitle );
    $location = $objDb2->getField( 0, location );
    $country = $objDb2->getField( 0, country );
    $client = $objDb2->getField( 0, client );
    $projDesc = $objDb2->getField( 0, projDesc );
    $dutiesPerformed = $objDb2->getField( 0, dutiesPerformed );
    //	  $detailTasks  = $objDb2->getField(0,detailTasks);
    $ersummary = $objDb2->getField( 0, ersummary );
    $refName = $objDb2->getField( 0, refName );
    $refDesig = $objDb2->getField( 0, refDesig );
    $refTele = $objDb2->getField( 0, refTele );
    $refEmail = $objDb2->getField( 0, refEmail );
    $projCost = $objDb2->getField( 0, projCost );
    $projFundedby = $objDb2->getField( 0, projFundedby );
    $iprojCost = $objDb2->getField( 0, iprojCost );
    $projDistance = $objDb2->getField( 0, projDistance );

  }
}

if ( $clear != "" ) {
  $edit = "";
  //$txtmop 		= "";
  //	$txtsociety     = "";
}

if ( $next != "" ) {
  header( 'Location: dta.php?id=' . $cvID );
}

if ( $cvID != "" ) {
  $sSQL_edit = " Select * FROM tblcvmain WHERE cvId='$cvID'";
  $objDb->query( $sSQL_edit );

  $cvId = $objDb->getField( 0, cvId );
  $name = $objDb->getField( 0, name );
  $datetime = $objDb->getField( 0, datetime );
  $lastupdate = $objDb->getField( 0, lastupdate );
  $dbpicture = $objDb->getField( 0, picture );

  $lastupdate = $objDb->getField( 0, lastupdate );
  $updated_on = $objDb->getField( 0, updated_on );


  $pic = "images/pics/" . $dbpicture;
  $sign = "images/signature/" . $dbsignature;
  $ocv = "images/originalcv/" . $dboriginalcv;

  //	$picture 	="images/pics/".$dbpicture;
  //	$signature	="images/signature/".$dbsignature;
  //	$originalcv	="images/originalcv/".$dboriginalcv;


  //	$ocv=$dboriginalcv;}
  //echo $ocv."k here";
}
if ( $cvID == "" ) {} else {
  $cvId = $cvID;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<?php include ('includes/metatag.php'); ?>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Central CV Bank </title>
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
  <?php include "includes/topheader.php" ; ?>
    <?php include ('includes/countryselection.php');  ?>
    
    <!-- //yyyy   -->
    
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas"> <span class="mdi mdi-menu"></span> </button>
  </div>
</nav>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_settings-panel.html -->
<? include "includes/skinwheel.php"; ?>
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
    <!-- To do section tab ends -->
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
    <!-- chat tab ends --> 
  </div>
</div>
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
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
<div class="col-sm-12">
<div class="home-tab">
  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
    <?php include('includes/submenu.php') ?>
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
        <div class="col-sm-12"> </div>
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
      
      <form name="frmpersonalInfo" id="frmcontact" action=""  method="post" onsubmit="return personalinfo(this);"   enctype="multipart/form-data">
        <div class="col-12 grid-margin">
        <div class="card">
        <div class="card-body">
        <h3 class="card-title">Experience Detail </h3>
        <p class="card-description"> Please provide the Company Detail here: Id#
          <?=$cvId;?>
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">From:(MM-YYYY)</label>
              <div class="col-sm-9">
                <input type="text" name="txtStartDate" value="<?= $eFromDate !="" ? $eFromDate : $txtStartDate ?>"  maxlength="7"  class="form-control"/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">To: (MM-YYYY)</label>
              <div class="col-sm-9">
                <input type="text" name="txtLastDate" value="<?= $eToDate !="" ? $eToDate : $txtLastDate ?>" maxlength="7" class="form-control" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Employer:</label>
              <div class="col-sm-9">
                <input type="text" value="<?= $employeer !="" ? $employeer : $txtEmployeer ?>" name="txtEmployeer" class="form-control" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Position/Title:</label>
              <div class="col-sm-9">
                <input type="text" value="<?= $jobTitle !="" ? $jobTitle : $txtPosition ?>" name="txtPosition" class="form-control" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Project Name: </label>
              <div class="col-sm-9">
                <?
                if ( trim( str_replace( '&nbsp', '', strip_tags( $_POST[ 'projTitle' ] ) ) ) == '' )
                  if ( $projTitle == "" )$projName = $txtPName;
                  else $projName = $projTitle;
                $oFCKeditor = new FCKeditor( 'txtPName' );
                $oFCKeditor->BasePath = 'fckeditor/';
                $oFCKeditor->Width = "750px";
                $oFCKeditor->Height = "150";
                $oFCKeditor->ToolbarSet = "Basic";
                $oFCKeditor->Value = $projName;
                $oFCKeditor->Create();
                ?>
              </div>
            </div>
          </div>
        </div>
        <br />   
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Location:</label>
              <div class="col-sm-9">
                <input type="text" value="<?= $location !="" ? $location : $txtLocation ?>" name="txtLocation"  class="form-control"/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">*Country: </label>
              <div class="col-sm-5">
                <select name="txtCountry" class="form-control" >
                  <option value="" selected="selected">Country</option>
                  <?
                  $sSQL = "SELECT countryId, name FROM tblcountries ORDER BY name";
                  $objDb->query( $sSQL );

                  $iCount = $objDb->getCount();

                  for ( $i = 0; $i < $iCount; $i++ ) {
                    $iId = $objDb->getField( $i, 0 );
                    $sName = $objDb->getField( $i, 1 );
                    ?>
                  <option value="<?= $iId ?>"<? if($iId == $country || $iId==$txtCountry) echo " selected"; ?>>
                  <?= $sName ?>
                  </option>
                  <?
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><span class="label">Client:</span></label>
              <div class="col-sm-9">
                <textarea name="txtClient" rows="1" class="form-control"  />
                <?= $client !="" ? $client : $txtClient ?>
                </textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Funding Agency:</label>
              <div class="col-sm-9">
                <input type="text" value="<?= $projFundedby !="" ? $projFundedby : $txtprojFundedby ?>" name="txtprojFundedby"  class="form-control" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Project Description/Main Project Features: </label>
              <div class="col-sm-9">
                <?
                if ( $projDesc == "" )$projDesc = $txtPDesc;
                else $projDesc = $projDesc;
                $oFCKeditor = new FCKeditor( 'txtPDesc' );
                $oFCKeditor->BasePath = 'fckeditor/';
                $oFCKeditor->Width = "750px";
                $oFCKeditor->Height = "150px";
                $oFCKeditor->ToolbarSet = "Basic";
                $oFCKeditor->Value = $projDesc;
                $oFCKeditor->Create();
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Project Cost:</label>
              <div class="col-sm-9">
                <input type="text" value="<?= $iprojCost !="" ? $iprojCost : $txtiprojCost ?>" name="txtiprojCost"  class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Project Roads Length (Kms):</label>
              <div class="col-sm-9">
                <input type="text" value="<?= $projDistance !="" ? $projDistance : $txtprojDistance ?>" maxlength="4" name="txtprojDistance"  class="form-control" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">*Duties Performed: </label>
              <div class="col-sm-9">
                <?
                if ( $dutiesPerformed == "" )$dutyPerform = $txtDutyPerform;
                else $dutyPerform = $dutiesPerformed;
                $oFCKeditor = new FCKeditor( 'txtDutyPerform' );
                $oFCKeditor->BasePath = 'fckeditor/';
                $oFCKeditor->Width = "750px";
                $oFCKeditor->Height = "150px";
                $oFCKeditor->ToolbarSet = "Basic";
                $oFCKeditor->Value = $dutyPerform;
                $oFCKeditor->Create();
                ?>
              </div>
            </div>
          </div>
        </div>
        
        <!--   <button type="submit" class="btn btn-primary me-2" style="width:200px">Submit</button>
              <button class="btn btn-light">Cancel</button> -->
        <div   align="center">
        <?php
        if ( $edit != "" ) {
          ?>
        <input type="submit" value="Update" name="update" class="btn btn-primary me-3" style="color: white;"  onclick="return firminfo(this);" />
        <?php
        } else {
          ?>
        <input type="submit" value="Save" name="save" class="btn btn-primary me-3" style="color: white;" onclick="return firminfo(this);" />
        <?
        }
        ?>
        &nbsp;&nbsp;
        <input type="submit" value="Next" class="btn btn-primary me-3" style="color: white;" name="next" />
        &nbsp;&nbsp;
        <input type="submit" value="Clear" name="clear" class="btn btn-primary me-3" style="color: white;" />
        <br />
        <br />
      </form>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">
            Experience Detail
            <h4>
            <div class="table-responsive pt-1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th  align="center"> Edit </th>
                    <th  >From</th>
                    <th  >To</th>
                    <th  >Employer</th>
                    <th  >Job Title</th>
                    <th > Project Name</th>
                    <th > Location</th>
                    <th > Country</th>
                    <th > Client</th>
                    <th > Project Description</th>
                    <th > Duties Performed</th>
                    <!-- 			89" > Project Cost</th> -->
                    <th > iProject Cost</th>
                    <th > Length</th>
                    <!--		<td width="15%" style="border: 1px solid #0E0989" > Detailed Tasks</td>
			<td width="15%" style="border: 1px solid #0E0989" > Exp Rec. Summary</td>
			<td width="15%" style="border: 1px solid #0E0989" > Ref. Name</td>  -->
                  
                    <?php if ( $cvadmflag == 1 ) {?><th> Delete</th><? } ?>
                  </tr>
  		<?
				$sSQL = " select * from tblemploymentrecord where cvId='$cvID' order by CONCAT(RIGHT(eFromDate,4), LEFT(eFromDate,4)) desc";
				$objDb->query($sSQL);
				$iCount = $objDb->getCount( );
				if($iCount>0)
				{
					for ($i = 0 ; $i < $iCount; $i ++)
					{
					$eFromDate  			= $objDb->getField($i, eFromDate);
					$eToDate  				= $objDb->getField($i, eToDate);
					$employeer  			= $objDb->getField($i, employeer);
					$jobTitle  				= $objDb->getField($i, jobTitle);
					$projTitle  			= $objDb->getField($i, projTitle);
					$location  				= $objDb->getField($i, location);
					$country				= $objDb->getField($i, country);
					$client  				= $objDb->getField($i, client);
					$projDesc  				= $objDb->getField($i, projDesc);
					$dutiesPerformed  		= $objDb->getField($i, dutiesPerformed);
//					$detailTasks  			= $objDb->getField($i, detailTasks);
					$ersummary  			= $objDb->getField($i, ersummary);
					$refName                = $objDb->getField($i, refName);
					$refDesig               = $objDb->getField($i, refDesig);
					$refTele                = $objDb->getField($i, refTele);
					$refEmail               = $objDb->getField($i, refEmail);
					$projCost				= $objDb->getField($i, projCost);	

					$iprojCost				= $objDb->getField($i, iprojCost);	
					$projDistance			= $objDb->getField($i, projDistance);	
					$projFundedby			= $objDb->getField($i, projFundedby);	

					$empId  				= $objDb->getField($i, empId);

					$sSQL2 = " select name FROM tblcountries WHERE countryId='$country' ";
					$objDb2->query($sSQL2);
					$CountryName=$objDb2->getField(0, name);	
					?>
                  <tr>
 <td><a href="experience.php?id=<?=$cvID?>&edit=<?=$empId?>"><img src="images/edit-icon.png" width="20" height="20" /></a></td>                      
                    <td ><?=$eFromDate?></td>
                    <td ><?=$eToDate?></td>
                    <td ><?=$employeer?></td>
                    <td ><?=$jobTitle?></td>
                    <td ><?=$projTitle?></td>
                    <td ><?=$location?></td>
                    <td ><?=$CountryName?></td>
                    <td ><?=$client?></td>
                    <td ><?=substr($projDesc, 0, 100)."..."?></td>
                    <td ><?=substr($dutiesPerformed, 0, 100)."..."?></td>
                    <!--  					<td style="border-bottom:1px solid #cccccc" width="15%" ><?=$projCost?></td>  -->
                    <td  ><?=$iprojCost?></td>
                    <td  ><?=$projDistance?></td>
                    <?php /*?>				 	<td style="border-bottom:1px solid #cccccc" width="15%" ><?=substr($detailTasks, 0, 100)."..."?>
</td>
<td style="border-bottom:1px solid #cccccc" width="15%"><?=$ersummary?></td>
<td style="border-bottom:1px solid #cccccc" width="15%"><?=$refName?></td>
                    <?php */?>
                   
                    <?php
                    if ( $cvadmflag == 1 ) {
                      ?>
                    <td   width="3%" >&nbsp; <a href="delete-experience.php?id=<?=$cvID?>&delete=<?=$empId?>" onclick="return confirm_delete('Do you want to Delete?');" title="Delete Experience"  > 
                      <script type="text/javascript">function confirm_delete(question) {if(confirm(question)){alert("Action to Delete!");}else{return false;} } </script> 
                      <img src="images/deletebutton.png" alt="Delete" width="20" height="20"  /></a></td>
                    <?
                    }
                    ?>
                  </tr>
                  <?
                  }
                  }
                  ?>
              </table>
              <br clear="all" />
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
</div>
<!-- container-scroller --> 

<!-- plugins:js --> 
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
</body>
</html>
