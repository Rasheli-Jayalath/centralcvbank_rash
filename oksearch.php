<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$strusername = $_SESSION['uname'];
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];



$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Dhaka'));
$updatedon = $date->format('Y-m-d H:i:s');

if ($strusername==null )
{
	header("Location: ../index.php?init=3");
}
?>
<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
@include("fckeditor/fckeditor.php");

$cvID = $_REQUEST['id'];
$msg="";

$saveBtn	= $_REQUEST['save']; 
$updateBtn	= $_REQUEST['update'];
$clear		= $_REQUEST['clear'];
$next    	= $_REQUEST['next'];
//--------------------------------------------------------------
$txtid				= $_REQUEST['txtid'];
$txtname			= $_REQUEST['txtname'];
$signature			= $_REQUEST['signature'];
$picture			= $_REQUEST['picture'];
$originalcv			= $_REQUEST['originalcv'];
$birthcert			= $_REQUEST['birthcert'];
$edudocs			= $_REQUEST['edudocs'];
$expdocs			= $_REQUEST['expdocs'];

$txtdatetime		= date('Y-m-d');
$txtlastupdate		= $_REQUEST['txtlastupdate'];
$txtupdated_on		= $_REQUEST['txtupdated_on'];


$now = new DateTime();
$nowyear = $now->format("Y");

//-------------------------------------------------
if($clear!="")
{
$txtid				= '';
$txtname			= '';
$txtdob				= '';
$chkgender			= '';
$opmstatus			= '';
$txtcnic			= '';
$txtlandline		= '';
$txtmobile			= '';
$txtemail			= '';
$cmbcitizen			= '';
$txtlocation    	= '';
$chksmec			= '';
$chkegc				= '';
$txtpassport		= '';
$txttotalexperience	= '';
$txtstartexpyr		= '';
$txtprofession		= '';
$txtssn				= '';
$txtposition		= '';
$txtpaddress		= '';
$txtoaddress		= '';
$txtcaddress		= '';
$txtareaofexpertise	= '';
$txtwecountries		= '';
$txtcompcap			= '';
$txtKeyQualification= '';
$txtremarks			= '';
$txtinfo1			= '';
$txtinfo2			= '';
$txtinfo3			= '';
$txtinfodetail		= '';
$txtref				= '';
$originalcv			= '';
$birthcert			= '';
$edudocs			= '';
$expdocs			= '';
$picture			= '';
$signature			= '';
$txtlastupdate		= '';
$txtupdated_on		= '';
}

if($next !=""){
  header('Location: submit-cv.php?id='.$txtid);
}

if($saveBtn!="")
{
	$picture=$_FILES['picture']['name'];
	if ($picture!='')
	{
		$target_path = "images/pics/";
		$picture = $txtid."-".$picture;
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 		
	}

	$signature = $_FILES['signature']['name'];
	if ($signature!='')
	{  
		$target_path = "images/signature/";
//		$signature = $txtid."-".$signature;
		$signature = $txtid."-".$signature;

		$target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 		
	}

	$originalcv=$_FILES['originalcv']['name'];
	if ($originalcv!='')
	{
		$target_path = "images/originalcv/";
		$originalcv = $txtid."-".$originalcv;
		$target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 		
	}


	$birthcert=$_FILES['birthcert']['name'];
	if ($birthcert!='')
	{
		$target_path = "images/birthcert/";
		$birthcert = $txtid."-".$birthcert;
		$target_path = $target_path . basename($birthcert); 
		move_uploaded_file($_FILES['birthcert']['tmp_name'], $target_path); 		
	}

 	$edudocs=$_FILES['edudocs']['name'];
	if ($edudocs!='')
	{
		$target_path = "images/edudocs/";
		$edudocs = $txtid."-".$edudocs;
		$target_path = $target_path . basename($edudocs); 
		move_uploaded_file($_FILES['edudocs']['tmp_name'], $target_path); 		
	}


 	$expdocs=$_FILES['expdocs']['name'];
	if ($expdocs!='')
	{
		$target_path = "images/expdocs/";
		$expdocs = $txtid."-".$expdocs;
		$target_path = $target_path . basename($expdocs); 
		move_uploaded_file($_FILES['expdocs']['tmp_name'], $target_path); 		
	}


 	$objDb->execute($sSQL);
	$txtid = $objDb->getAutoNumber();
	$cvId = $txtid;

$tuSql = "update tblcvmain SET lastupdate = now(),  ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);


	header('Location: submit-cv.php?id='.$txtid);
	

	
	}	
//------------------------------------------update button procedure ------------------------------------------

if($updateBtn!='')
{
	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBpicture = $objDb->getField(0, picture);
	$txtname1  = $objDb->getField(0, name);
	
	$picture = $_FILES['picture']['name'];
	
	if ($picture!='')
	{
		if($DBpicture!='')
 		{ 
 		$DBpicture="images/pics/".$DBpicture;
		if (file_exists($DBpicture)) { @unlink($DBpicture); }
		}
		
		$target_path = "images/pics/";
		$picture=$cvID."-Pic-".$txtname1.".jpg";
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 		
	}
	else
	{
	$picture = $DBpicture;
	}

 
 	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBsignature = $objDb->getField(0, signature);
	$txtname1  = $objDb->getField(0, name);

	$signature = $_FILES['signature']['name'];

	if ($signature!='')
	{
		if($DBsignature!='')
		{ 
		$DBsignature ="images/signature/".$DBsignature;
		if (file_exists($DBsignature)) { @unlink($DBsignature); }
		}

		$target_path = "images/signature/";
		$signature   = $cvID."-Sign-".$txtname1.".jpg";
		$target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 
	}
	else
	{
	$signature = $DBsignature;
	}
	
 
  	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBoriginalcv = $objDb->getField(0, originalcv);
	$txtname1     = $objDb->getField(0, name);
	
 	$originalcv   = $_FILES['originalcv']['name'];
	
	if ($originalcv!='')
	{
		if($DBoriginalcv!='')
		{ 
		$DBoriginalcv = "images/originalcv/".$DBoriginalcv;
		if (file_exists($DBoriginalcv)) { @unlink($DBoriginalcv); }
		}

		$target_path = "images/originalcv/";
//		$signature   = $cvID."-Sign-".$txtname1.".jpg";

		$originalcv = $cvID."-CV-".$originalcv;
	
		$target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 
	}
	else
	{
	$originalcv = $DBoriginalcv;
	}
	
	 
  	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBbirthcert = $objDb->getField(0, birthcert);
	$txtname1    = $objDb->getField(0, name);
	
 	$birthcert   = $_FILES['birthcert']['name'];
	
	if ($birthcert   !='')
	{
		if($DBbirthcert !='')
		{ 
		$DBbirthcert    = "images/birthcert/".$DBbirthcert;
		if (file_exists($DBbirthcert)) { @unlink($DBbirthcert); }
		}

		$target_path = "images/birthcert/";
//		$signature   = $cvID."-Sign-".$txtname1.".jpg";

		$birthcert = $cvID."-BCe-".$birthcert;
	
		$target_path = $target_path . basename($birthcert); 
		move_uploaded_file($_FILES['birthcert']['tmp_name'], $target_path); 
	}
	else
	{
	$birthcert = $DBbirthcert;
	}
	
 	 	 
  	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBedudocs	 = $objDb->getField(0, edudocs);
	$txtname1    = $objDb->getField(0, name);
	
 	$edudocs = $_FILES['edudocs']['name'];
	
	if ($edudocs   !='')
	{
		if($DBedudocs !='')
		{ 
		$DBedudocs    = "images/edudocs/".$DBedudocs;
		if (file_exists($DBedudocs)) { @unlink($DBedudocs); }
		}

		$target_path = "images/edudocs/";
//		$signature   = $cvID."-Sign-".$txtname1.".jpg";

		$edudocs = $cvID."-Edu-".$edudocs;
	
		$target_path = $target_path . basename($edudocs); 
		move_uploaded_file($_FILES['edudocs']['tmp_name'], $target_path); 
	}
	else
	{
	$edudocs = $DBedudocs;
	}
	 
	 
	 	 
  	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBexpdocs = $objDb->getField(0, expdocs);
	$txtname1     = $objDb->getField(0, name);
	
 	$expdocs = $_FILES['expdocs']['name'];
	
	if ($expdocs   !='')
	{
		if($DBexpdocs !='')
		{ 
		$DBexpdocs    = "images/expdocs/".$DBexpdocs;
		if (file_exists($DBexpdocs)) { @unlink($DBexpdocs); }
		}

		$target_path = "images/expdocs/";
//		$signature   = $cvID."-Sign-".$txtname1.".jpg";

		$expdocs = $cvID."-Exp-".$expdocs;
	
		$target_path = $target_path . basename($expdocs); 
		move_uploaded_file($_FILES['expdocs']['tmp_name'], $target_path); 
	}
	else
	{
	$expdocs = $DBexpdocs;
	}
	 
	 
	 
 	$pic  		="images/pics/".$picture;
	$sign		="images/signature/".$signature;
	$ocv		="images/originalcv/".$originalcv;
	$bcert		="images/birthcert/".$birthcert;
	$exdocs		="images/expdocs/".$expdocs;
	$eddocs		="images/edudocs/".$edudocs;
		

	if ($dbpicture =='' )  {$pic='';}  else {$pic = $picture;	}
	if ($dbsignature=='' ) {$sign='';} else {$sign= $signature;}
	if ($dboriginalcv=='' ){$ocv='';}  else {$ocv = $originalcv;}
	if ($dbbirthcert=='' ) {$bcert='';}  else {$bcert= $birthcert;}
	if ($dbedudocs =='' )  {$eddocs='';}  else {$eddocs= $edudocs;}
	if ($dbexpdocs =='' )  {$exdocs='';}  else {$exdocs= $expdocs;}



 	$sSQL = ("UPDATE tblcvmain set picture='$picture',  signature = '$signature', originalcv='$originalcv', birthcert='$birthcert', edudocs='$edudocs', expdocs='$expdocs', datetime='$datetime' WHERE cvId='$cvID'" )	;
 	$objDb->execute($sSQL);
	
	
	
	$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);
	
	$msg="Updated!";
}	

//-------------------------------------------------------------------------------------

if($cvID!="")
{
	$sSQL_edit = " Select * FROM tblcvmain WHERE cvId='$cvID'";
	$objDb->query($sSQL_edit);
	
	$cvId					=	$objDb->getField(0, cvId);
	$name					=	$objDb->getField(0, name);
	$dbsignature			=	$objDb->getField(0, signature);
	$dbpicture				=	$objDb->getField(0, picture);
	$dboriginalcv			=	$objDb->getField(0, originalcv);
	$dbbirthcert			=	$objDb->getField(0, birthcert);
	$dbedudocs				=	$objDb->getField(0, edudocs);
	$dbexpdocs				=	$objDb->getField(0, expdocs);

	$datetime				=	$objDb->getField(0, datetime);
 
 	$lastupdate				=	$objDb->getField(0, lastupdate);
 	$updated_on				=	$objDb->getField(0, updated_on);

	
   	$pic    ="images/pics/".$dbpicture;
  	$sign	="images/signature/".$dbsignature;
  	$ocv	="images/originalcv/".$dboriginalcv;
  	$bcert	="images/birthcert/".$dbbirthcert;
  	$eddocs	="images/edudocs/".$dbedudocs;
  	$exdocs	="images/expdocs/".$dbexpdocs;

//	$picture 	="images/pics/".$dbpicture;
//	$signature	="images/signature/".$dbsignature;
//	$originalcv	="images/originalcv/".$dboriginalcv;

 
//	$ocv=$dboriginalcv;}
	//echo $ocv."k here";
}
if($cvID=="")
{
}
else
{
$cvId=$cvID;
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
<div class="conformtainer-scroller">
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
                                    <h2 class="text-info">357
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
              
                   
                  
     <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
            
                   <div class="table-responsive">
                          
	<form name="uploadcv" id="uploadcv" action=""  method="post" onsubmit="return uploadcv(this);"   enctype="multipart/form-data">
	  
	  <table width="100%"   border="0"  align="left" cellpadding="1" cellspacing="1">
  					<tr>
					<td height="31" colspan="2"><h3> Upload  Documents/particulars:</h3></td>
					<td colspan="41"><font color="#009933"><strong><?php if($msg!="") echo $msg; else echo "";?></strong></font></td>
					</tr>

					<tr>
					  <td   class="label" > <strong>Picture</strong>:&nbsp; </td>
					  <td colspan="2" ><input type="file" name="picture" accept="image/jpg, image/jpeg" />
                      <font color="#CCCCCC"><? echo ltrim($pic,'images/pics');?></font><br />
                      <font color="#FF0000">Only <strong>jpg format</strong> file can be uploaded.
					  <br> <b>Photo</b> should be less then <b>100 KB.</b> </font>                      <!--  <a href="<?=$pic?>" target="_new"><img src="<?=$pic?>" width="66" height="81" alt="ddd" /></a></td> -->                    </td>
					  <td width="18%" >
      <div class="mg-image"> 
  		<?php 
		$piclen = strlen($pic);
		if ($piclen !="") {
		?>
        <img  src="<? echo $pic; ?>"   width="76" height="78"/> 
        <?php 
		} 
		elseif ($pic=="" or $piclen <= '1') {
		?>
        <img src="images/noimage/no-profile-img.gif" width="76" height="78" alt="profile " />

		<?php 
		}
		?>
              </div>
                      
                      
                      &nbsp;</td>
					  <?php /*?> <td colspan="2" rowspan="3"  >
					   <iframe  src="includes/treetf.php?dir=<?=$mdID;?>" name="myiframe" width="100%" height="250px;" class="reference" frameborder="0" ></iframe>
</td>
                      
                      </td><?php */?>
				    </tr>

					<tr>
					  <td height="83"   class="label" > <strong>Signature</strong>: </td>
					  <td colspan="2" ><input type="file" name="signature" accept="image/jpg, image/jpeg"  />
                      <font color="#CCCCCC"><? echo ltrim($sign,'images/signature');?></font> <br />
                      <font color="#FF0000">Only <strong>jpg Format</strong> file can be uploaded.</font>
					<!-- <a href="<?=$sign?>" target="_new"><img src="<?=$sign?>" width="66" height="81" alt="ddd" /></a></td> -->                    </td>
					  <td >
                      
                       <div class="mg-image"> 
 
  		<?php 
		$signlen = strlen($sign);
 		if ($signlen > 0) {
		?>
        <img  src="<? echo $sign?>" alt="Signature" width="95" height="49"/> 
        <?php 
		} 
		elseif ($sign=="" or $signlen <= '0') {
		?>
        <img src="images/signe.jpg" width="90" height="54"  alt="File not uploaded"/>

		<?php 
		}
		?>
        </div>
                      
                      &nbsp;</td>
				    </tr>
           <tr>
		   <td height="85" class="label"> <strong>Original CV</strong>: </td>
           <td colspan="2" class="smec">
             <input type="file" name="originalcv" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/* <br /> size="50" maxlength="50"" />
             
             <font color="#CCCCCC"> <? echo ltrim($ocv,'images/originalcv');?> </font> <br />
             <font color="#FF0000"> Only <strong> doc/pdf </strong> file  can be uploaded.</font><a href="<? echo $ocv; ?>" title="Original CV" > </a>           </td>
           <td class="smec">
             
             <div class="mg-image">  
               <?php
            $filename = $ocv;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 0) {
            ?>
               <a href="<? echo $filename; ?>" target="_new" > 
                 <img src='images/fdoc.png' alt='Original CV' width='52' height='54' /></a>
               <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= 0) {
            ?>
               <img src="images/noimage/icon-cv2.png" width="53" height="58" alt="File not uploaded" align="middle"/>
               <?php 
            } 
			}
			}
            ?>
               </div>
             
           </td>
           </tr>

           <tr>
		   <td height="85" class="label"><strong>NID/Passport:</strong></td>
           <td colspan="2" class="smec">
             <input type="file" name="birthcert" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/* <br /> size="50" maxlength="50"" />
             
             <font color="#CCCCCC"> <? echo ltrim($bcert,'images/birthcert');?> </font> <br />
             <font color="#FF0000">Only <strong>pdf format</strong> file can be uploaded.</font>
             <?php /*?> 	 <a href="<?=$bcert?>" target="_new"><img src="images/write.png" width="66" height="81" alt="ddd" /></a> <?php */?> 
             <a href="<? echo $bcert; ?>" title="Birth Certificate" > </a>  </td>
           <td class="smec">
             
             <div class="mg-image">  
               <?php
            $filename = $bcert;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 18) {
            ?>
               <a href="<? echo $filename; ?>" target="_new" > 
                 <img src='images/birthcertpdf.png' alt='Birth Certificates/Docs' width='74' height='73' /></a>
               <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= '18') {
            ?>
               <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
               <?php 
            } 
			}
			}
            ?>
               </div>
           </td>
           </tr>
  

         <tr>
		   <td height="85" class="label"><strong>Educational  Docs:</strong></td>
           <td colspan="2" class="smec">
  <input type="file" name="edudocs" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*" size="50" maxlength="50" />
             
             <font color="#CCCCCC"> <? echo ltrim($eddocs,'images/edudocs');?> </font> <br />
             <font color="#FF0000">Only <strong>pdf format</strong> file can be uploaded.</font>
             <a href="<? echo $eddocs; ?>" title="Educational Certificates/Docs" > </a>  </td>
 
           
              <td class="smec">
           <div class="mg-image">  
          <?php
            $filename = $exdocs;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 18) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/exppdf.png' alt='Experience Certificates/Docs' width='74' height='73' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= '18') {
            ?>
          <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>           </div> 
            
           </td>
           </tr>
          
        


        
      <tr>
		   <td height="85" class="label"><strong>Experience Docs:</strong></td>
           <td colspan="2" class="smec">
             <input type="file" name="expdocs" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/* <br /> size="50" maxlength="50"" />
             
             <font color="#CCCCCC"> <? echo ltrim($exdocs,'images/expdocs');?> </font> <br />
             <font color="#FF0000">Only <strong>pdf format</strong> file can be uploaded.</font>
             <a href="<? echo $exdocs; ?>" title="Experience Certificates/Docs" > </a>  </td>
     
           
            <td class="smec">
              <div class="mg-image">  
                <?php
            $filename = $exdocs;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 18) {
            ?>
                <a href="<? echo $filename; ?>" target="_new" > 
                  <img src='images/exppdf.png' alt='Experience Certificates/Docs' width='74' height='73' /></a>
                <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= '18') {
            ?>
                <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
                <?php 
            } 
			}
			}
            ?>
                </div>
            </td>
           </tr>
   
             
            
   <!--       <tr>
            <td height="10" align="right">&nbsp;</td>
            <td align="center" ><strong>  Picture</strong></td>
            <td align="center" valign="middle" ><strong>  Signature</strong></td>
            <td align="center" valign="middle" >&nbsp;</td>
            <td align="center" valign="middle" ><strong>Original CV File</strong></td>
        <tr>
             <td height="10" align="right">&nbsp;</td>
             <td width="32%" align="center">
        
        <div class="mg-image"> 
  		<?php 
		$piclen = strlen($pic);
	 
		if ($piclen > 12) {
		?>
        <img  src="<? echo $pic?>"   width="117" height="127"/> 
        <?php 
		} 
		elseif ($pic=="" or $piclen <= '12') {
		?>
        <img src="images/noimage/no-profile-img.gif" width="119" height="132" alt="profile " />

		<?php 
		}
		?>
              </div>
 		  </td>                 
          
             <td width="20%" align="center" valign="middle"    >
             <div class="mg-image"> 
 
  		<?php 
		$signlen = strlen($sign);
 		if ($signlen > 17) {
		?>
        <img  src="<? echo $sign?>" alt="Signature" width="181" height="100"/> 
        <?php 
		} 
		elseif ($sign=="" or $signlen <= '17') {
		?>
        <img src="images/noimage/signature5.png" width="173" height="96"  alt="no yet signature uploaded"/>

		<?php 
		}
		?>
        </div>
	    </td>

        <td width="11%" align="center" valign="middle" >
            
<?php /*?>    <a href="<? echo $ocv; ?>" title="Original CV" > </a>
 	 	       <a href="<?=$ocv?>" target="_new"><img src="images/write.png" width="97" height="104" alt="Original CV" /></a>
<?php */?>            
  	    </td>
        <td width="22%" valign="middle" >
          <div class="mg-image">  
          <?php
            $filename = $ocv;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 18) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/fdoc.png' alt='Original CV' width='106' height='106' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= '18') {
            ?>
          <img src="images/noimage/icon-cv2.png" width="68" height="72" alt="no yet signature uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>
        </td>
       
            <tr>
             <td height="10" align="right" bgcolor="#CCCCCC"  >&nbsp;</td>
             <td colspan="4" align="right" valign="middle" bgcolor="#CCCCCC"    >
              -->
 
	 
        <tr>
            <td height="39"></td>
            <td align="left" colspan="3"  >
            <?php
            if($cvID!="")
            {
            ?>
            <input type="submit" value="Update" name="update" class="btn btn-primary me-3" style="color: white;"/>&nbsp;&nbsp;<input type="submit" value="Next" name="next" class="btn btn-primary me-3" style="color: white;"/>
            <?php
            }
            else
            {
            ?>
            <input type="submit" value="Save & Next" name="save" class="btn btn-primary me-3" style="color: white;"/>
            <?php
            }
            ?>&nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  class="btn btn-primary me-3" style="color: white;"/></td>

        </tr>
	</table>
	
    </form>
 
	<br clear="all" />            
            
          
                      
               
                </div>
              </div>
            </div>            </div>               
     
      
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
