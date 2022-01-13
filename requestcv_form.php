<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];
$strusername 	= $_SESSION['uname'];
$loggeduserename =$_SESSION['name'];
$loggeduseremail 	=   $_SESSION['email'];

$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Dhaka'));
$updatedon = $date->format('Y-m-d H:i:s');

if ($strusername==null  )
	{		header("Location: ../index.php?init=3");	}
else if ($cvadmflag==0  and $cventryflag==0)
	{		header("Location: ../index.php?init=3");	}

else if ($strusername==null or $cventryflag==0)
	{		header("Location: ../index.php?init=3");	}

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

//echo "here".$saveBtn;

//--------------------------------------------------------------

$txtprojectname		= $_REQUEST['txtprojectname'];
$txtposition		= $_REQUEST['txtposition'];
$txtqualification	= $_REQUEST['txtqualification'];
$txtexperience		= $_REQUEST['txtexperience'];
$txtdescription		= $_REQUEST['txtdescription'];
$txtspcexperience	= $_REQUEST['txtspcexperience'];
$txtsplcondition	= $_REQUEST['txtsplcondition'];
$txttimeline		= $_REQUEST['txttimeline'];
$txtrequestername	= $_REQUEST['txtrequestername'];
$txtrequesteremail	= $_REQUEST['txtrequesteremail'];
$request_status	= $_REQUEST['chkgenderRadios'];



$now = new DateTime();
$nowyear = $now->format("Y");
//$texpyr = ($nowyear - $startexpyr);
//echo $eyear;

//-------------------------------------------------
if($clear!="")
{

$txtprojectname		= '';
$txtposition		= '';
$txtqualification	= '';
$txtexperience		= '';
$txtdescription		= '';
$txtspcexperience	= '';
$txtsplcondition	= '';
$txttimeline		= '';
$txtrequestername	= '';
$txtrequesteremail	= '';
$request_status		= '';

}

if($next !=""){
  header('Location: firminfo.php?id='.$txtid);
}


if($saveBtn!="")
{

$dateposted=date('Y/m/d') ; // this to get current date as text .

if($txtprojectname!='' && $txtposition!='' && $txtqualification!='' && $txtexperience!='' && $txtdescription!='' && $txtspcexperience!='' && $txtsplcondition!='' && $txttimeline!='' && $txtrequestername!='' && $txtrequesteremail!='' )
{
    $sSQL = ("INSERT INTO tblrequest_cv(project_name,position,qualifications,experience,description,specific_experience,special_condition,timeline,requestor_name,email,requested_date, request_status) VALUES ('$txtprojectname','$txtposition', '$txtqualification', '$txtexperience','$txtdescription','$txtspcexperience', '$txtsplcondition', '$txttimeline', '$txtrequestername','$txtrequesteremail','$dateposted', '$request_status')") ;

    
        $objDb->execute($sSQL);
    
        $txtid = $objDb->getAutoNumber();
         $cvId = $txtid;
    
        $msg="Saved!";

      $alertresult='<div class="alert alert-success">Thank You! Your Request has been Received.</div>';
          
     
        // header('Location: requestcv_form.php');
}
else
{
    //echo '<script>alert("Please Fill all fields")</script>';
    $alertresult='<div class="alert alert-danger">Please Fill all fields</div>';

}

     
 

}

//------------------------------------------------------------------------------------

if($updateBtn!='')
{
	$sSQL1 = " select picture FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);
	$DBpicture=$objDb->getField(0, picture);
	
	$picture=$_FILES['picture']['name'];
	if ($picture!='')
	{
		if($DBpicture!='')
		{ 
		$DBpicture="images/pics/".$DBpicture;
		if (file_exists($DBpicture)) { @unlink($DBpicture); }
		}

		$target_path = "images/pics/";
		$picture=$txtid."-".$picture;
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 		
	}
	else
	{
	$picture=$DBpicture;
	}


	$sSQL1 = " select originalcv FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBoriginalcv=$objDb->getField(0, originalcv);
	$originalcv=$_FILES['originalcv']['name'];
	if ($originalcv!='')
	{
		if($DBoriginalcv!='')
		{ 
		$DBoriginalcv="images/originalcv/".$DBoriginalcv;
		if (file_exists($DBoriginalcv)) { @unlink($DBoriginalcv); }
		}
		$target_path = "images/originalcv/";
		$originalcv=$txtid."-".$originalcv;
		$target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 
	}
	else
	{
	$originalcv=$DBoriginalcv;
	}


	$sSQL1 = " select signature FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBsignature = $objDb->getField(0, signature);
	$signature = $_FILES['signature']['name'];
	if ($signature!='')
	{
		if($DBsignature!='')
		{ 
		$DBsignature="images/signature/".$DBsignature;
		if (file_exists($DBsignature)) { @unlink($DBsignature); }
		}

		$target_path = "images/signature/";
		$signature = $txtid."-".$signature;
		$target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 
	}
	else
	{
	$signature = $DBsignature;
	}
	
$updatedon=date('Y/m/d H:i:s a') ;

//	echo $DBpicture;
//	echo $picture;
	$sSQL = ("UPDATE tblcvmain set 
			name='$txtname',		 				fatherName='$txtfatherName',		 		
			dob='$txtdob', 							gender='$chkgender',  maritalStatus='$opmstatus', 
			permanentAddress='$txtpaddress', 		officeAddress='$txtoaddress', 
			correspondenceAddress='$txtcaddress', 	cnic='$txtcnic', 
			passportNo='$txtpassport', 				ssn='$txtssn', 
			landline='$txtlandline', 				mobile='$txtmobile',
			email='$txtemail',						emailTwo='$txtemailTwo',	
			citizenship='$cmbcitizen', 				nationality='$cmbnationality',
			nationality2='$cmbnationality2', 	    employed_by='$cmbemployed_by', c_country_resi='$cmbresidence',
			location='$txtlocation', 				smecEmp='$chksmec', 
			otherEmp='$chkother', 					egcEmployee='$chkegcEmployee', 
			egcEmp='$chkegc',sjEmp='$chksj',		position='$txtposition', cposition='$txtcposition', 
			totalExp='$txttotalexperience', 		startexpyr='$txtstartexpyr',
			profession='$txtprofession', 			fgroup='$cmbfgroup', 
			fgroup2='$cmbfgroup2',					areaOfExp='$txtareaofexpertise',
			workExpCountries='$txtwecountries', 	keyQualification='$txtKeyQualification',
			computerCapabilities='$txtcompcap', 	remarks='$txtremarks',
			referece='$txtref', 					addInfo1='$txtinfo1',
			addInfo2='$txtinfo2', 					addInfo3='$txtinfo3',
			addInfoDetail='$txtinfodetail', 		picture='$picture', signature = '$signature',
			originalcv='$originalcv',				updated_on='$updatedon', 
			expectedSalary='$txtexpectedSalary', 	SalaryRange='$txtSalaryRange', 
			exp_current='$txtexp_current', 			exp_prev='$txtexp_prev', exp_never='$txtexp_never', 
			cvVerification='$chkcvVerification', 	ep_name='$strusername', bdprofile='$chkbdprofile', 
            linkedin_link='$txtlinkedin_link',      osocial_media='$txtosocial_media'
			WHERE cvId='$cvID'" );
	$objDb->execute($sSQL);
//echo $sSQL;
	$msg="Updated!";
}	

//-------------------------------------------------------------------------------------

if($cvID!="")
{
	$sSQL_edit = " Select * FROM tblcvmain WHERE cvId='$cvID'";
	$objDb->query($sSQL_edit);
	
	$cvId					=	$objDb->getField(0, cvId);
	$name					=	$objDb->getField(0, name);
	$fatherName				=	$objDb->getField(0, fatherName);
	$dob					=	date('d-m-Y',strtotime($objDb->getField(0, dob)));
	$gender					=	$objDb->getField(0, gender);
	$maritalStatus			=	$objDb->getField(0, maritalStatus);
	$permanentAddress		=	$objDb->getField(0, permanentAddress);
	$officeAddress			=	$objDb->getField(0, officeAddress);
	$correspondenceAddress	=	$objDb->getField(0, correspondenceAddress);
	$cnic					=	$objDb->getField(0, cnic);
	$passportNo				=	$objDb->getField(0, passportNo); 
	$ssn					=	$objDb->getField(0, ssn);
	$landline				=	$objDb->getField(0, landline);
	$mobile					=	$objDb->getField(0, mobile);
	$email					=	$objDb->getField(0, email);
	$emailTwo				=	$objDb->getField(0, emailTwo);
	$cmbcitizen				=	$objDb->getField(0, citizenship);
	$cmbnationality			=	$objDb->getField(0, nationality);
	$location				=	$objDb->getField(0, location);
    
    $cmbnationality2		=	$objDb->getField(0, nationality2);
    $cmbemployed_by			=	$objDb->getField(0, employed_by);
    $cmbresidence			=	$objDb->getField(0, c_country_resi);
     
    
	$smecEmp				=	$objDb->getField(0, smecEmp);
	$egcEmp					=	$objDb->getField(0, egcEmp);
	$sjEmp					=	$objDb->getField(0, sjEmp);
	$otherEmp				=	$objDb->getField(0, otherEmp);
	$egcEmployee			=	$objDb->getField(0, egcEmployee);	
	
	$position				=	$objDb->getField(0, position);
	$cposition				=	$objDb->getField(0, cposition);
	$totalExp				=	$objDb->getField(0, totalExp);
	$startexpyr				=	$objDb->getField(0, startexpyr);
	$profession				=	$objDb->getField(0, profession);
	$fgroup					=	$objDb->getField(0, fgroup);
	$fgroup2				=	$objDb->getField(0, fgroup2);
	
	$areaOfExp				=	$objDb->getField(0, areaOfExp);
	$workExpCountries		=	$objDb->getField(0, workExpCountries);
	$keyQualification		=	$objDb->getField(0, keyQualification);
	$computerCapabilities	=	$objDb->getField(0, computerCapabilities);
	$remarks				=	$objDb->getField(0, remarks);
	$referece				=	$objDb->getField(0, referece);
	$addInfo1				=	$objDb->getField(0, addInfo1);
	$addInfo2				=	$objDb->getField(0, addInfo2);
	$addInfo3				=	$objDb->getField(0, addInfo3);
	$addInfoDetail			=	$objDb->getField(0, addInfoDetail);
	$dbpicture				=	$objDb->getField(0, picture);
	$dbsignature			=	$objDb->getField(0, signature);
	$dboriginalcv			=	$objDb->getField(0, originalcv);
	$datetime				=	$objDb->getField(0, datetime);
	$lastupdate				=	$objDb->getField(0, lastupdate);
	$updated_on				=	$objDb->getField(0, updated_on);
	$posted_date			=	$objDb->getField(0, posted_date);

	$expectedSalary			=	$objDb->getField(0, expectedSalary);
	$SalaryRange			=	$objDb->getField(0, SalaryRange);
	
	$txtexp_current			=	$objDb->getField(0, exp_current);
	$txtexp_prev			=	$objDb->getField(0, exp_prev);
	$txtexp_never			=	$objDb->getField(0, exp_never);
	
	$chkcvVerification		=	$objDb->getField(0, cvVerification);
	$chkbdprofile			=	$objDb->getField(0, bdprofile);

	$txtlinkedin_link 		=	$objDb->getField(0, linkedin_link );
	$txtosocial_media 		=	$objDb->getField(0, osocial_media);
    
    
    
	//$pic=SITE_URL."images/pics/".$dbpicture;
	$pic="images/pics/".$dbpicture;
	$signature="images/signature/".$dbsignature;
	
	if ($dboriginalcv=='' ) {$ocv='';} else {
	$ocv="images/originalcv/".$dboriginalcv;}
}

if($cvID=="")
{
$sSQL1 = " select max(cvId) cvId FROM tblcvmain ";
$objDb->query($sSQL1);
$cvId=$objDb->getField(0, cvId);
$cvId=$cvId+1;
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
            
        <div class="tab-content tab-content-basic">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
              <div class="col-sm-12"> 
                <div class="form-group">
                
                </div>
              </div>
            </div>
            
            <form name="frmrequestcv" id="frmrequestcv" action=""  method="post" onsubmit="return personalinfo(this);"   enctype="multipart/form-data">
              <div class="col-12 grid-margin">
              <div class="card">
              <div class="card-body">
              <div class="col-sm-10 col-sm-offset-2">
                    <?php echo $alertresult; ?>    
                </div>
              <h4 class="card-title">Request CV</h4>
           
                  <div class="row">

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Project Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Project Name" name="txtprojectname" id="txtprojectname" style="width: 100%;" />
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Position</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Position" name="txtposition" id="txtposition" style="width: 100%;"   />
                    </div>
                  </div>
                </div>
                  </div>
                  
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Qualifications</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Qualifications" name="txtqualification" id="txtqualification" style="width: 100%;" />
                    </div>
                  </div>
                </div>
                  
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Experience</label>
                 
                    <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Experience" name="txtexperience" id="txtexperience"  style="width: 100%;"/>
                  </div>
                  </div>
                </div>
              </div>
                 
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control"  name="txtdescription" id="txtdescription" placeholder="Description" style="height: 100px;"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Specific Experience</label>
                 
                    <div class="col-sm-9">
                    <textarea class="form-control" placeholder="Enter Specific  Experience" name="txtspcexperience" id="txtspcexperience" style="height: 100px;" ></textarea>
                  </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Special Condition</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  name="txtsplcondition" id="txtsplcondition" placeholder="Special Condition" style="width: 100%;"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Timeline</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control"  name="txttimeline" id="txttimeline" placeholder="Timeline" style="width: 100%;"/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Requester Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  name="txtrequestername" id="txtrequestername" placeholder="Requester Name" style="width: 100%;" value="<?php echo $loggeduserename ?>" readonly/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    
                
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Requester Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  name="txtrequesteremail" id="txtrequesteremail" placeholder="Requester Email" style="width: 100%;"  value="<?php echo $loggeduseremail ?>" readonly/>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Request Status</label>
                    <div class="col-sm-9">
                      <select name="chkgenderRadios"   class="form-control" id="sel_user">
                        <option>Select Request Status</option>
                        <option value="1">Open</option>
                        <option value="0">Close</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    
                
                  </div>
                </div>
              </div>


              <div class="row" style="margin-top: 25px;">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                    <?php
              if ( $cvID != "" ) {
              ?>
              <input type="submit" value="Update" name="update" class="btn btn-primary me-3" style="color: white;"   />
              &nbsp;&nbsp;
              <input type="submit" value="Next" name="next" class="btn btn-primary me-3" style="color: white;"   />
              <?php
              } else {
                ?>
              <input type="submit" value="Save" name="save" id="save" class="btn btn-primary me-3" style="color: white;"  />
              <?php
              }
              ?>
              &nbsp;&nbsp;
              <input type="submit" value="Clear" name="clear" class="btn btn-primary me-3" style="color: white;" />
                </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    
                  </div>
                </div>
              </div>

             <div>
             
                 
     <!--  <button type="submit" class="btn btn-primary me-3" style="color: white;">Submit</button> -->

  </form>
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

<script>

var alertPlaceholder = document.getElementById('liveAlertPlaceholder')

function alertt(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}


</script>


</body>
</html>
