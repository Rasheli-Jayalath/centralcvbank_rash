<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];
$strusername 	= $_SESSION['uname'];

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
$txtid				= $_REQUEST['txtid'];
$txtname			= $_REQUEST['txtname'];
$txtfatherName		= $_REQUEST['txtfatherName'];
$txtdob				= date('Y-m-d',strtotime($_REQUEST['txtdob']));
$chkgender			= $_REQUEST['chkgender'];
$opmstatus			= $_REQUEST['cmbmstatus'];
$txtcnic			= $_REQUEST['txtcnic'];
$txtlandline		= $_REQUEST['txtlandline'];
$txtmobile			= $_REQUEST['txtmobile'];
$txtemail			= $_REQUEST['txtemail'];
$txtemailTwo		= $_REQUEST['txtemailTwo'];
$cmbcitizen			= $_REQUEST['cmbcitizen'];
$cmbnationality		= $_REQUEST['cmbnationality'];
$txtlocation    	= $_REQUEST['txtlocation'];
$chksmec			= $_REQUEST['chksmec'];
$chkegc				= $_REQUEST['chkegc'];
$chksj				= $_REQUEST['chksj'];
$chkother			= $_REQUEST['chkother'];
$chkegcEmployee		= $_REQUEST['chkegcEmployee'];
$txtpassport		= $_REQUEST['txtpassport'];
$txttotalexperience	= $_REQUEST['txttotalexperience'];
$txtstartexpyr		= $_REQUEST['txtstartexpyr'];
$txtprofession		= $_REQUEST['txtprofession'];
$cmbfgroup			= $_REQUEST['cmbfgroup'];
$cmbfgroup2			= $_REQUEST['cmbfgroup2'];

$txtssn				= $_REQUEST['txtssn'];
$txtposition		= $_REQUEST['txtposition'];
$txtcposition		= $_REQUEST['txtcposition'];
$txtpaddress		= $_REQUEST['txtpaddress'];
$txtoaddress		= $_REQUEST['txtoaddress'];
$txtcaddress		= $_REQUEST['txtcaddress'];
$txtareaofexpertise	= $_REQUEST['txtareaofexpertise'];
$txtwecountries		= $_REQUEST['txtwecountries'];
$txtcompcap			= $_REQUEST['txtcompcap'];
$txtKeyQualification= $_REQUEST['txtKeyQualification'];
$txtremarks			= $_REQUEST['txtremarks'];
$txtinfo1			= $_REQUEST['txtinfo1'];
$txtinfo2			= $_REQUEST['txtinfo2'];
$txtinfo3			= $_REQUEST['txtinfo3'];
$txtinfodetail		= $_REQUEST['txtinfodetail'];
$txtref				= $_REQUEST['txtref'];
$picture			= $_REQUEST['picture'];
$signature			= $_REQUEST['signature'];
$originalcv			= $_REQUEST['originalcv'];
$datetime			= date('Y-m-d',strtotime($_REQUEST['txtposteddate']));
$txtlastupdate		= $_REQUEST['txtlastupdate'];
$txtupdated_on		= $_REQUEST['txtupdated_on'];

$txtexpectedSalary	= $_REQUEST['txtexpectedSalary'];
$txtSalaryRange		= $_REQUEST['txtSalaryRange'];

$txtexp_current		= $_REQUEST['txtexp_current'];
$txtexp_prev		= $_REQUEST['txtexp_prev'];
$txtexp_never		= $_REQUEST['txtexp_never'];

$cmbnationality2	= $_REQUEST['cmbnationality2'];
$cmbemployed_by		= $_REQUEST['cmbemployed_by'];
$cmbresidence		= $_REQUEST['cmbresidence'];

$cmbcvStatus		= $_REQUEST['cmbcvStatus'];
$chkcvVerification 	= $_REQUEST['chkcvVerification'];
$chkbdprofile 		= $_REQUEST['chkbdprofile'];
$txtlinkedin_link 	= $_REQUEST['txtlinkedin_link'];
$txtosocial_media 	= $_REQUEST['txtosocial_media'];

$now = new DateTime();
$nowyear = $now->format("Y");
//$texpyr = ($nowyear - $startexpyr);
//echo $eyear;

//-------------------------------------------------
if($clear!="")
{
$txtid				= '';
$txtname			= '';
$txtfatherName		= '';
$txtdob				= '';
$chkgender			= '';
$txtexpectedSalary	= '';
$txtSalaryRange		= '';
$txtemailTwo		= '';
$cmbcvStatus		= '';

$opmstatus			= '';
$txtcnic			= '';
$txtlandline		= '';
$txtmobile			= '';
$txtemail			= '';
$cmbcitizen			= '';
$cmbnationality		= '';	
$txtlocation    	= '';
$chksmec			= '';
$chkegc				= '';
$chksj				= '';
$chkother			= '';
$chkegcEmployee		= '';
$txtpassport		= '';
$txttotalexperience	= '';
$txtstartexpyr		= '';
$txtprofession		= '';
$cmbfgroup			= '';
$cmbfgroup2			= '';
	
$txtssn				= '';
$txtposition		= '';
$txtcposition		= '';
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
$picture			= '';
$signature			= '';
$birthcert			= '';
$edudocs			= '';
$expdocs			= '';
$txtlastupdate		= '';
$txtcvVerification	= '';
	
$txtexp_current		= '';
$txtexp_prev		= '';
$txtexp_never		= '';
	
$txtupdated_on		= '';
$$datetime			= '';
$ep_name			= '';

$cmbnationality2	= '';
$cmbemployed_by		= '';
$cmbresidence		= '';
$chkbdprofile		= '';
    
$txtlinkedin_link 	= '';
$txtosocial_media 	= '';

}

if($next !=""){
  header('Location: firminfo.php?id='.$txtid);
}


if($saveBtn!="")
{
	$picture=$_FILES['picture']['name'];
	if ($picture!='')
	{
		$target_path = "images/pics/";
		$picture=$txtid."-".$picture;
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 		
	}

	$originalcv=$_FILES['originalcv']['name'];
	if ($originalcv!='')
	{
		$target_path = "images/originalcv/";
		$originalcv=$txtid."-".$originalcv;
		$target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 		
	}

	$signature=$_FILES['signature']['name'];
	if ($signature!='')
	{
		$target_path = "images/signature/";
		$signature=$txtid."-".$signature;
		$target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 		
	}

/*	$sSQL = ("INSERT INTO tblcvmain(cvId, name, dob, gender, maritalStatus, permanentAddress, officeAddress, correspondenceAddress, cnic, passportNo, 
		ssn, landline, mobile, email, citizenship, location, smecEmp, egcEmp, position, totalExp, 
		profession, areaOfExp, workExpCountries, keyQualification, computerCapabilities, remarks, referece, 
		addInfo1, addInfo2, addInfo3, addInfoDetail, picture, datetime) 
		VALUES ($txtid,'$txtname','$txtdob','$chkgender','$opmstatus','$txtpaddress','$txtoaddress','$txtcaddress','$txtcnic','$txtpassport',
		'$txtssn','$txtlandline','$txtmobile','$txtemail','$cmbcitizen','$txtlocation','$chksmec','$chkegc','$txtposition','$txttotalexperience',
		'$txtprofession','$txtareaofexpertise','$txtwecountries','$txtKeyQualification','$txtcompcap','$txtremarks','$txtref',
		'$txtinfo1','$txtinfo2','$txtinfo3','$txtinfodetail','$picture','$datetime')");
*/
$dateposted=date('Y/m/d') ; // this to get current date as text .

     
 $sSQL = ("INSERT INTO tblcvmain (name, fatherName, dob, gender, maritalStatus, permanentAddress, officeAddress, correspondenceAddress, cnic, passportNo, ssn, landline, mobile, email, emailTwo, citizenship, nationality, nationality2, employed_by, c_country_resi,  location, smecEmp, egcEmp, sjEmp, otherEmp, egcEmployee, position, cposition, totalExp, startexpyr, profession, fgroup,fgroup2, areaOfExp, workExpCountries, keyQualification, computerCapabilities, remarks, referece, addInfo1, addInfo2, addInfo3, addInfoDetail, originalcv, picture, signature, posted_date, expectedSalary, SalaryRange, exp_current, exp_prev, exp_never, cvVerification, ep_name, bdprofile, linkedin_link, osocial_media) VALUES ('$txtname','$txtfatherName', '$txtdob', '$chkgender','$opmstatus','$txtpaddress', '$txtoaddress', '$txtcaddress', '$txtcnic','$txtpassport', '$txtssn','$txtlandline', '$txtmobile','$txtemail', '$txtemailTwo', '$cmbcitizen', '$cmbnationality', '$cmbnationality2', '$cmbemployed_by','$cmbresidence', '$txtlocation', '$chksmec', '$chkegc', '$chksj', '$chkother', '$chkegcEmployee', '$txtposition', '$txtcposition', '$txttotalexperience', '$txtstartexpyr', '$txtprofession', '$cmbfgroup', '$cmbfgroup2', '$txtareaofexpertise', '$txtwecountries', '$txtKeyQualification', '$txtcompcap', '$txtremarks','$txtref', '$txtinfo1', '$txtinfo2','$txtinfo3', '$txtinfodetail', '$originalcv', '$picture', '$signature', '$dateposted', '$txtexpectedSalary', '$txtSalaryRange', '$txtexp_current','$txtexp_prev','$txtexp_never', '$chkcvVerification', '$strusername', '$chkbdprofile', '$txtlinkedin_link', '$txtosocial_media')") ;

//mysql_insert_id $strusername 	= $_SESSION['uname'];

//echo $sSQL;

	$objDb->execute($sSQL);

    $txtid = $objDb->getAutoNumber();
 	$cvId = $txtid;

	$msg="Saved!";
 
	header('Location: firminfo.php?id='.$txtid);

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
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
     <!--             <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="submitform.php?id=<?php echo $cvId; ?>" role="tab" aria-controls="overview" aria-selected="true">Basic Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="firminfo.php?id=<?php echo $cvId; ?>" role="tab" aria-selected="false">Company Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Jobs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                    </li>
                  </ul>
-->
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
              <h4 class="card-title">Personal info: ID #: </h4>
           
                  <div class="row">
                <div class="col-md-6"> 
              
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">CV ID</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$cvId;?>" name="txtid" style="width:70px;" readonly="yes"  />
                      </div>
                   </div> </div>
                  
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Enter the Name" name="txtname" id="txtname"  value="<?php if($name!="") echo $name; else echo $txtname; ?>" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Enter Father Name</label>
                 
                    <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Father's name" name="txtfatherName" id="txtfatherName"  value="<?php if($fatherName!="") echo $fatherName; else echo $txtfatherName; ?>" />
                  </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="M" name="chkgenderRadios" id="chkgender" <?php if($gender=='M' || $chkgender=='M') echo 'checked="checked"'; else  echo ''; ?> />Male</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="F" name="chkgenderRadios" id="chkgender" <?php if($gender=='F' || $chkgender=='F') echo 'checked="checked"'; else   echo ''; ?> />Female </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Marital Status</label>
                    <div class="col-sm-9">
                      <select name="cmbmstatus"   class="form-control">
                        <option value="U" <?php if($maritalStatus=='U' || $cmbmstatus=='U') echo 'selected="selected"'; ?>>Unmarried</option>
                        <option value="M" <?php if($maritalStatus=='M' || $cmbmstatus=='M') echo 'selected="selected"'; ?>>Married</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if ($dob=='01-01-1970' || $dob=='1970-01-01' || $dob=='01-01-1900' || $dob=='1900-01-01') { echo '';} else {echo $dob;};?>" name="txtdob"  placeholder="dd/mm/yyyy"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Place  Birth/Location</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php if($location!="") echo $location ; else echo $txtlocation; ?>" name="txtlocation" class="form-control"  />
                    </div>
                  </div>
                </div>
              </div>
           <!--   <p class="card-description">
              <h3>Contact Info.</h3>
              </p>
-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  value="<?php if($email!="") echo $email ; else echo $txtemail; ?>" name="txtemail" title="Email for Sending or acknowledgement purposes..."/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">*Birth Place/ Country of Origin:</label>
                    <div class="col-sm-9">
                      <select name="cmbnationality" class="form-control"  >
                        <option value="<?=$iId1 ?>" <?php if($iId1 == $name || $iId1 ==$cmbnationality) echo "selected"; ?>> </option>
                        <option value="" selected="selected">--- Select Birth Place ---</option>
                        <?= $sName1 ?>
                        <?php
							$sSQL = "SELECT countryId, name FROM tblcountries ORDER BY name";
							$objDb->query($sSQL);
 
 							$iCount = $objDb->getCount( );
 							for ($i = 0; $i < $iCount; $i ++)
							{
							$iId1   = $objDb->getField($i, 0);
							$sName1 = $objDb->getField($i, 1);
						?>
                        <option value="<?=$iId1 ?>" <?php if($iId1 == $name || $iId1==$cmbnationality) echo "selected"; ?> >
                          <?= $sName1 ?>
                          </option>
                        <?php
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
                    <label class="col-sm-3 col-form-label">Email (Optional)</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if($emailTwo!="") echo $emailTwo ; else echo $txtemailTwo; ?>" name="txtemailTwo"  />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">*Citizenship/ Nationality:</label>
                    <div class="col-sm-9">
                      <select name="cmbcitizen"  class="form-control" >
                        <option value="" selected="selected">--- Select Citizenship ---</option>
                        <?php
                        $sSQL = "SELECT countryId, citizenship FROM tblcountries ORDER BY citizenship";
                        $objDb->query( $sSQL );

                        $iCount = $objDb->getCount();

                        for ( $i = 0; $i < $iCount; $i++ ) {
                          $iId = $objDb->getField( $i, 0 );
                          $sName = $objDb->getField( $i, 1 );
                          ?>
                        <option value="<?= $iId ?>" <?php if($iId == $citizenship || $iId==$cmbcitizen) echo "selected"; ?>>
                          <?= $sName ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

        <!--
                <p class="card-description">
              <h3>National ID./Citizen Info.</h3>
              </p>
        -->

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">National ID. No.</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  value="<?php if($cnic!="") echo $cnic ; else echo $txtcnic; ?>" name="txtcnic"  />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">2nd Nationality:</label>
                    <div class="col-sm-9">
                      <select name="cmbnationality2"  class="form-control" >
                        <option value="" selected="selected">--- Select 2nd Nationality ---</option>
                        <?php
                    $sSQL = "SELECT countryId, citizenship FROM tblcountries ORDER BY citizenship";
                    $objDb->query($sSQL);

                    $iCount = $objDb->getCount( );

                    for ($i = 0; $i < $iCount; $i ++)
                    {
                    $iId11   = $objDb->getField($i, 0);
                    $sName11 = $objDb->getField($i, 1);
                ?>
                        <option value="<?= $iId11 ?>" <?php if($iId11 == $cmbnationality2 || $iId11==$cmbnationality2) echo "selected"; ?>>
                          <?= $sName11 ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
             

                  
     <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Passport #:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if($passportNo!="") echo $passportNo ;else echo $txtpassport; ?>" name="txtpassport"  />
                    </div>
                  </div>
                </div>
         
         
         
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">*Current Country of Residence:</label>
                     
                    <div class="col-sm-9">
                      <select name="cmbresidence" class="form-control" >
                        <option value="" selected="selected">--- Select Residence Country ---</option>
                        <?php
                            $sSQL = "SELECT countryId, name FROM tblcountries ORDER BY name";
                            $objDb->query($sSQL);

                            $iCount = $objDb->getCount( );

                            for ($i = 0; $i < $iCount; $i ++)
                            {
                            $iId12   = $objDb->getField($i, 0);
                            $sName12 = $objDb->getField($i, 1);
                        ?>
                        <option value="<?= $iId12 ?>" <?php if($iId12 == $cmbresidence || $iId12==$cmbresidence) echo "selected"; ?>>
                          <?= $sName12 ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>                  
                  
                  
     
     <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mobile #</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if($mobile!="") echo $mobile ; else echo $txtmobile; ?>" name="txtmobile"  />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">*Functional Group-1: </label>
                    <div class="col-sm-9">
                      <select name="cmbfgroup" class="form-control" >
                        <option value="" selected="selected">--- Select One ---</option>
                        <?php
				$sSQLs = " SELECT sid, sectorname FROM tblfgsector ORDER BY sectorname asc ";
				$objDb->query($sSQLs);
				
				$iCount = $objDb->getCount( );
				for ($i = 0; $i < $iCount; $i ++)
				{
				$s_id 			= $objDb->getField($i, 0);
				$sectorname 	= $objDb->getField($i, 1);
				?>
                        <option value="<?=$sectorname?>" <?php if($fgroup==$sectorname) echo 'selected="selected"'; ?> >
                          <?=$sectorname?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>  
                  
                  
       <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Employed by</label>
                    <div class="col-sm-9">
                      <select name="chksmec" class="form-control">
                        <option value="" selected="selected">--- Select Employer ---</option>
                        <?
                        if ( $egcEmp == "Y" && $smecEmp != "Y" ) {
                          $chksmec = 10;
                        }
                        if ( $sjEmp == "Y" && $smecEmp != "Y" ) {
                          $chksmec = 9;
                        }
                        if ( $otherEmp == "Y" && $smecEmp != "Y" ) {
                          $chksmec = 99;
                        }
                        if ( $countrycode == "ALLC" ) {
                          $cselect = "c_code!=''";
                        } else {
                          $cselect = 'c_code=' . "'" . $countrycode . "'";
                        }

                        $sSQL = " SELECT srno, employed_by,c_code FROM tblemployer where $cselect  or c_code='ALLC' ORDER BY c_code, employed_by asc  ";

                        $sSQL2 = " SELECT flag FROM tblcountries where code='$countrycode' ";
                        $objDb->query( $sSQL2 );
                        $flagselect = $objDb->getField( 0, flag );
                        ?>
                        <?php

                        // $sSQL = " SELECT srno, employed_by,c_code FROM cvbankdb.tblemployer where $cselect ORDER BY c_code, employed_by asc  ";


                        $objDb->query( $sSQL );
                        $iCount = $objDb->getCount();
                        for ( $i = 0; $i < $iCount; $i++ ) {
                          $srno1 = $objDb->getField( $i, 0 );
                          $employed_by = $objDb->getField( $i, 1 );
                          $c_code = $objDb->getField( $i, 2 );
                          ?>
                        <option value="<?= $srno1; ?>" <?php if($srno1 == $smecEmp || $srno1==$chksmec) echo "selected";  ?>>
                          <? //$srno1.". ".$employed_by." - ".$c_code ?>
                          <?= $employed_by ;?>
                          <!--	<img src="images/logos_countries/<?=$flagselect?>" title="<?=$employed_by ?>" width="50%"  /> -->
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Functional Group-2:</label>
                    <div class="col-sm-9">
                      <select name="cmbfgroup2" class="form-control" >
                        <option value="" selected="selected">--- Select One ---</option>
                        <?php
				$sSQLs2 = " SELECT sid, sectorname FROM tblfgsector ORDER BY sectorname asc ";
				$objDb->query($sSQLs2);
				
				$iCount = $objDb->getCount( );
				for ($i = 0; $i < $iCount; $i ++)
				{
				$s_id2 			= $objDb->getField($i, 0);
				$sectorname2 	= $objDb->getField($i, 1);
				?>
                        <option value="<?=$sectorname2?>" <?php if($fgroup2==$sectorname2) echo 'selected="selected"'; ?> >
                          <?=$sectorname2?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>                
                  
                  
                  
                  
                  
                  
     
          <p class="card-description">
              <h3>Addresses Info.              </h3>
                      </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Permanent Address</label>
                    <div class="col-sm-9">
                      <input type="text" name="txtpaddress" class="form-control" value="<?php if($permanentAddress!="") {echo $permanentAddress ;} else {echo $txtpaddress; } ?>" style="height: 140px" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Office Address</label>
                    <div class="col-sm-9">
                      <input type="text" name="txtpaddress" class="form-control"  value="<?php if($permanentAddress!="") echo $permanentAddress ; else echo $txtpaddress; ?>" style="height: 140px" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Correspondence Address</label>
                    <div class="col-sm-9">
                      <input type="text" name="txtcorrespondenceAddress" class="form-control" value=" <?php if($correspondenceAddress!="") echo $correspondenceAddress ; else echo $txtcaddress; ?>" style="height: 140px"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Computer Capabilities</label>
                    <div class="col-sm-9">
                      <input type="text" name="txtcompcap"  class="form-control" value="<?php if($computerCapabilities!="") echo $computerCapabilities ; else echo $txtcompcap; ?>" style="height: 140px"/>
                    </div>
                  </div>
                </div>
              </div>
              <p class="card-description">
              <h3>Professional Information</h3>
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Profession</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if($profession!="") echo $profession ; else echo $txtprofession; ?>" name="txtprofession"  />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Current Position</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if($position!="") echo $position ;else echo $txtposition; ?>" name="txtposition"  />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Start Experrience (yyyy)</label>
                    <div class="col-sm-9">
                      <input name="txtstartexpyr" type="text" class="form-control" value="<?php if($startexpyr!="") echo $startexpyr ;else echo $txtstartexpyr; ?>" size="4" maxlength="4"  minlength="4"  />
                      <?php echo $texpyr = ($nowyear - $startexpyr);?> Yrs </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ex????pecte</label>
                    <div class="col-sm-9">
                      <input id="txtexpectedSalary" class="form-control" name="txtexpectedSalary" type="text" value="<?php if($expectedSalary!="") {echo $expectedSalary ;} else {echo $txtexpectedSalary;} ?>"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Area of Expertise</label>
                    <div class="col-sm-9">
                      <input  type="text" name="txtareaofexpertise" id="txtareaofexpertise" class="form-control" style="height:50px" value="<?php if($areaOfExp!="") {echo $areaOfExp ;} else {echo  $txtareaofexpertise; } ?>"  />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Work Exper. Countries:</label>
                    <div class="col-sm-9">               
                      <textarea name="txtwecountries" class="form-control" style="height:50px"  /><?php if($workExpCountries!="") echo $workExpCountries ; else echo $txtwecountries; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Key Qualification</label>
                  <div class="col-sm-9">
                    <?php
                    if ( $keyQualification == "" )$qualification = $txtKeyQualification;
                    else $qualification = $keyQualification;
                    $oFCKeditor = new FCKeditor( 'txtKeyQualification' );

                    $oFCKeditor->BasePath = 'fckeditor/';
                    $oFCKeditor->Width = "806px";
                    $oFCKeditor->Height = "300px";
                    $oFCKeditor->ToolbarSet = "Basic";
                    $oFCKeditor->Value = $qualification;
                    $oFCKeditor->Create();
                    ?>
                  </div>
                </div>
              </div>
                      
              <div class="row">
                <div class="col-md-6">
                  <br />
            <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Remarks</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txtremarks" value="<?php if($remarks!="") echo $remarks ; else echo $txtremarks; ?>"  />
                    </div>
                  </div>
                </div>
              </div>
              <p class="card-description">
              <h3>Other Info.</h3>
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Info 1</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if($addInfo1!="") echo $addInfo1 ;else echo $txtinfo1; ?>" name="txtinfo1"  />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Info 2</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if($addInfo2!="") echo $addInfo2 ;else echo $txtinfo2; ?>" name="txtinfo2"  />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Info Detail</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txtinfodetail" value="<?php if($addInfoDetail!="") echo $addInfoDetail ;else echo $txtinfodetail; ?>" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Reference</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txtref" value="<?php if($referece !="") echo $referece ; else echo $txtref; ?>" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Acknow. Email Sent</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php if($addInfo3!="") echo $addInfo3 ;else echo $txtinfo3; ?>" name="txtinfo3"    />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"> </label>
                  <div class="col-sm-9">
                    
                  </div>
                </div>
              </div>
                  
                  
         <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Linkedin Link</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php if($linkedin_link !="") echo $linkedin_link ; else echo $txtlinkedin_link; ?>" name="txtlinkedin_link"      />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Other Social Links:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php if($osocial_media !="") echo $osocial_media ; else echo $txtosocial_media; ?>" name="txtosocial_media"     />
                  </div>
                </div>
              </div>                  
                  
                  
                  
              <p class="card-description">
              <h3>Only for Official Use:</h3>
              </p>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">CV Class</label>
                  <div class="col-sm-9"> <strong>
                    <select name="cmbcvStatus"  class="form-control">
                      <?php
                      $sSQL = "SELECT sId, cvStatus,cvStatusdesc FROM tblcvstatus ORDER BY cvStatus";
                      $objDb->query( $sSQL );

                      $iCount = $objDb->getCount();
                      for ( $i = 0; $i < $iCount; $i++ ) {
                        $sId1 = $objDb->getField( $i, 0 );
                        $cvStatus1 = $objDb->getField( $i, 1 );
                        $cvStatusdesc = $objDb->getField( $i, 2 );
                        ?>
                      <option value="<?=$cvStatus1 ?>" <?php if($cmbcvStatus == $cvStatus1 || $iId==$cmbcvStatus) echo "selected"; ?>>
                      <?= $cvStatusdesc?>
                      </option>
                      <?php 	} ?>
                    </select>
                    </strong> </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Employee Type</label>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" value="E" name="chkegcEmployee" <?php if($egcEmployee=='E' || $chkegcEmployee=='E') echo 'checked="checked"'; else echo ""; ?> />
                        Regular</label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" value="F" name="chkegcEmployee" <?php if($egcEmployee=='F' || $chkegcEmployee=='F') echo 'checked="checked"'; else echo ""; ?> />
                        Freelance</label>
                    </div>
                  </div>
                    
               <label class="col-sm-3 col-form-label"> </label>

                  <div class="col-sm-4">
                  <div class="form-check">
                      <label class="form-check-label"> 
                        <input type="radio" value="X" name="chkegcEmployee" <?php if($egcEmployee=='X' || $chkegcEmployee=='X') echo 'checked="checked"'; else echo ""; ?> />
                        Ex-Employee </label>
                    </div> </div>
                  
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" value="O" name="chkegcEmployee" <?php if($egcEmployee=='O' || $chkegcEmployee=='O') echo 'checked="checked"'; else echo ""; ?>/>
                        Other </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
            <!--      <label class="col-sm-3 col-form-label">Salary Range (INR)</label>
                  <div class="col-sm-9"> <strong>
                    <select name="txtSalaryRange" class="form-control"  >
                      <option value="">Select One...</option>
                      <option value="25000 - 40000" <? if($SalaryRange=="25000 - 40000") echo 'selected=selected"' ; ?>>25000 - 40000</option>
                      <option value="40001 - 55000" <? if($SalaryRange=="40001 - 55000") echo 'selected=selected"' ; ?>>40001 - 55000</option>
                      <option value="55001 - 60000" <? if($SalaryRange=="55001 - 60000") echo 'selected=selected"' ; ?>>55001 - 60000</option>
                      <option value="60001 - 75000" <? if($SalaryRange=="60001 - 75000") echo 'selected=selected"' ; ?>>60001 - 75000</option>
                      <option value="75001 - 80000" <? if($SalaryRange=="75001 - 80000") echo 'selected=selected"' ; ?>>75001 - 80000</option>
                      <option value="80001 - 95000" <? if($SalaryRange=="80001 - 95000") echo 'selected=selected"' ; ?>>80001 - 95000</option>
                      <option value="95001 - 125000" <? if($SalaryRange=="95001 - 125000") echo 'selected=selected"' ; ?>>95001 - 125000</option>
                      <option value="125001 - 150000" <? if($SalaryRange=="125001 - 150000") echo 'selected=selected"' ; ?>>125001 - 150000</option>
                      <option value="150001 - 175000" <? if($SalaryRange=="150001 - 175000") echo 'selected=selected"' ; ?>>150001 - 175000</option>
                      <option value="Above 175000" <? if($SalaryRange=="above 175000") echo 'selected=selected"' ; ?>>Above 175000</option>
                    </select>
                    </strong> </div>-->
                </div>
              </div>
               <div class="col-md-7">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Verification Type</label>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="M" name="chkgender" id="chkgender" <?php if($gender=='M' || $chkgender=='M') echo 'checked="checked"'; else  echo 'checked="checked"'; ?> />
                        Verified </label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="F" name="chkgender" <?php if($gender=='F' || $chkgender=='F') echo 'checked="checked"'; else echo ""; ?> />
                        Non-Verified </label>
                    </div>
                  </div>
                    
                                   <label class="col-sm-3 col-form-label"> </label>

                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="F" name="chkgender" <?php if($gender=='F' || $chkgender=='F') echo 'checked="checked"'; else echo ""; ?> />
                        Pending </label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="F" name="chkgender" <?php if($gender=='F' || $chkgender=='F') echo 'checked="checked"'; else echo ""; ?> />
                        Other </label>
                    </div>
                  </div>
                </div>
              </div>
                  
                  
              <div class="row" >
              <div class="col-sm-6">
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                    <h2>BD Profile Intimation</h2> <input type="checkbox" value="1" name="chkbdprofile" <?php if($bdprofile=='1' || $chkbdprofile=='1') echo 'checked="checked"';  ?> /></label>
                </div>
              </div></div>
              
              <!--   <button type="submit" class="btn btn-primary me-2" style="width:200px">Submit</button>
              <button class="btn btn-light">Cancel</button> -->
             <div   align="center">
              <?php
              if ( $cvID != "" ) {
              ?>
              <input type="submit" value="Update" name="update" class="btn btn-primary me-3" style="color: white;"   />
              &nbsp;&nbsp;
              <input type="submit" value="Next" name="next" class="btn btn-primary me-3" style="color: white;"   />
              <?php
              } else {
                ?>
              <input type="submit" value="Save & Next" name="save" id="save" class="btn btn-primary me-3" style="color: white;"  />
              <?php
              }
              ?>
              &nbsp;&nbsp;
              <input type="submit" value="Clear" name="clear" class="btn btn-primary me-3" style="color: white;" />
           <br /><br />
                 
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
</body>
</html>
