<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$strusername = $_SESSION['uname'];
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];



$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
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


//------------------------------------------update button procedure ------------------------------------------

if($updateBtn!='')
{
	$picture = $_FILES['picture']['name'];
	$orignal_name_file=$_FILES["picture"]["name"];
	$name_file_type=$_FILES["picture"]["type"];
	$ext = pathinfo($orignal_name_file, PATHINFO_EXTENSION);
	
		$target_path = "cv_documents/";
	if(isset($cvID)&&$cvID!=0)
	{
	 $sSQL1 = " select * FROM tbldocs Where cvId= '$cvID' AND folder='pictures' ";
	$objDb->query($sSQL1);
   $pCount = $objDb->getCount();
	if($pCount>0 && $orignal_name_file!='')
	{
		
	$DBpicture = $objDb->getField(0,new_filename);
		
	
		if($DBpicture!='')
 		{ 
 		$DBpicture="cv_documents/".$DBpicture;
		if (file_exists($DBpicture)) 
		{ 
		@unlink($DBpicture); 
		
		}
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $picture=$file_name;
		  $target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 	
		$tpSql = "update tbldocs SET old_filename='$orignal_name_file',  new_filename='$picture' where cvId = '$cvID' AND folder='pictures'";
		$objDb2->execute($tpSql);	
		}
	}
	else 
	{
		  if($orignal_name_file!='')
		  {
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $picture=$file_name;
		  $target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 	
		$tpSql = "INSERT INTO  tbldocs (cvid, folder, old_filename, new_filename) VALUES ('$cvID', 'pictures', '$orignal_name_file', '$picture' )";
		$objDb2->execute($tpSql);
		  }
	}
		
	}

/////////////////////////Signature//////////////////////////
	$signature = $_FILES['signature']['name'];
	$orignal_name_file=$_FILES["signature"]["name"];
	$name_file_type=$_FILES["signature"]["type"];
	$ext = pathinfo($orignal_name_file, PATHINFO_EXTENSION);
			$target_path = "cv_documents/";
	if(isset($cvID)&&$cvID!=0)
	{
	 $sSQL1 = " select * FROM tbldocs Where cvId= '$cvID' AND folder='signatures' ";
	$objDb->query($sSQL1);
   $pCount = $objDb->getCount();
	if($pCount>0 && $orignal_name_file!='')
	{
		
	$DBsignature = $objDb->getField(0,new_filename);
		
	
		if($DBsignature!='')
 		{ 
 		$DBsignature="cv_documents/".$DBsignature;
		if (file_exists($DBsignature)) 
		{ 
		@unlink($DBsignature); 
		
		}
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $signature=$file_name;
		  $target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 	
		$tpSql = "update tbldocs SET old_filename='$orignal_name_file',  new_filename='$signature' where cvId = '$cvID' AND folder='signatures'";
		$objDb2->execute($tpSql);	
		}
	}
	else 
	{
		  if($orignal_name_file!='')
		  {
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $signature=$file_name;
		  $target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 	
		$tpSql = "INSERT INTO  tbldocs (cvid,  folder, old_filename, new_filename) VALUES ('$cvID', 'signatures', '$orignal_name_file', '$signature' )";
		$objDb2->execute($tpSql);
		  }
	}
		
	}

	
/////////////////////////Orignal CV//////////////////////////
	$originalcv = $_FILES['originalcv']['name'];
	$orignal_name_file=$_FILES["originalcv"]["name"];
	$name_file_type=$_FILES["originalcv"]["type"];
	$ext = pathinfo($orignal_name_file, PATHINFO_EXTENSION);
			$target_path = "cv_documents/";
	if(isset($cvID)&&$cvID!=0)
	{
	 $sSQL1 = " select * FROM tbldocs Where cvId= '$cvID' AND folder='original_cv' ";
	$objDb->query($sSQL1);
   $pCount = $objDb->getCount();
	if($pCount>0 && $orignal_name_file!='')
	{
		
	$DBoriginalcv = $objDb->getField(0,new_filename);
		
	
		if($DBoriginalcv!='')
 		{ 
 		$DBoriginalcv="cv_documents/".$DBoriginalcv;
		if (file_exists($DBoriginalcv)) 
		{ 
		@unlink($DBoriginalcv); 
		
		}
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $originalcv=$file_name;
		  $target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 	
		$tpSql = "update tbldocs SET old_filename='$orignal_name_file',  new_filename='$originalcv' where cvId = '$cvID' AND folder='original_cv'";
		$objDb2->execute($tpSql);	
		}
	}
	else 
	{
		  if($orignal_name_file!='')
		  {
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $originalcv=$file_name;
		  $target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 	
		$tpSql = "INSERT INTO  tbldocs (cvid,  folder, old_filename, new_filename) VALUES ('$cvID', 'original_cv', '$orignal_name_file', '$originalcv' )";
		$objDb2->execute($tpSql);
		  }
	}
		
	}	
	
	////////////////////////others////////////////////////////
	
	$others = $_FILES['others']['name'];
	$orignal_name_file=$_FILES["others"]["name"];
	$name_file_type=$_FILES["others"]["type"];
	$ext = pathinfo($orignal_name_file, PATHINFO_EXTENSION);
			$target_path = "cv_documents/";
	if(isset($cvID)&&$cvID!=0)
	{
	 $sSQL1 = " select * FROM tbldocs Where cvId= '$cvID' AND folder='others' ";
	$objDb->query($sSQL1);
   $pCount = $objDb->getCount();
	if($pCount>0 && $orignal_name_file!='')
	{
		
	$DBothers = $objDb->getField(0,new_filename);
		
	
		if($DBothers!='')
 		{ 
 		$DBothers="cv_documents/".$DBothers;
		if (file_exists($DBothers)) 
		{ 
		@unlink($DBothers); 
		
		}
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $others=$file_name;
		  $target_path = $target_path . basename($others); 
		move_uploaded_file($_FILES['others']['tmp_name'], $target_path); 	
		$tpSql = "update tbldocs SET old_filename='$orignal_name_file',  new_filename='$others' where cvId = '$cvID' AND folder='others'";
		$objDb2->execute($tpSql);	
		}
	}
	else 
	{
		  if($orignal_name_file!='')
		  {
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $others=$file_name;
		  $target_path = $target_path . basename($others); 
		move_uploaded_file($_FILES['others']['tmp_name'], $target_path); 	
		$tpSql = "INSERT INTO  tbldocs (cvid,  folder, old_filename, new_filename) VALUES ('$cvID', 'others', '$orignal_name_file', '$others' )";
		$objDb2->execute($tpSql);
		  }
	}
		
	}
	 

 	////////////////////////Education Docs////////////////////////////
	
	$edudocs = $_FILES['edudocs']['name'];
	$orignal_name_file=$_FILES["edudocs"]["name"];
	$name_file_type=$_FILES["edudocs"]["type"];
	$ext = pathinfo($orignal_name_file, PATHINFO_EXTENSION);
			$target_path = "cv_documents/";
	if(isset($cvID)&&$cvID!=0)
	{
	 $sSQL1 = " select * FROM tbldocs Where cvId= '$cvID' AND folder='edu_doc' ";
	$objDb->query($sSQL1);
   $pCount = $objDb->getCount();
	if($pCount>0 && $orignal_name_file!='')
	{
		
	$DBedudocs = $objDb->getField(0,new_filename);
		
	
		if($DBedudocs!='')
 		{ 
 		$DBedudocs="cv_documents/".$DBedudocs;
		if (file_exists($DBedudocs)) 
		{ 
		@unlink($DBedudocs); 
		
		}
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $edudocs=$file_name;
		  $target_path = $target_path . basename($edudocs); 
		move_uploaded_file($_FILES['edudocs']['tmp_name'], $target_path); 	
		$tpSql = "update tbldocs SET old_filename='$orignal_name_file',  new_filename='$edudocs' where cvId = '$cvID' AND folder='edu_doc'";
		$objDb2->execute($tpSql);	
		}
	}
	else 
	{
		  if($orignal_name_file!='')
		  {
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $edudocs=$file_name;
		  $target_path = $target_path . basename($edudocs); 
		move_uploaded_file($_FILES['edudocs']['tmp_name'], $target_path); 	
		$tpSql = "INSERT INTO  tbldocs (cvid,  folder, old_filename, new_filename) VALUES ('$cvID', 'edu_doc', '$orignal_name_file', '$edudocs' )";
		$objDb2->execute($tpSql);
		  }
	}
		
	} 	 
  	
		////////////////////////Education Docs////////////////////////////
	
	$expdocs = $_FILES['expdocs']['name'];
	$orignal_name_file=$_FILES["expdocs"]["name"];
	$name_file_type=$_FILES["expdocs"]["type"];
	$ext = pathinfo($orignal_name_file, PATHINFO_EXTENSION);
			$target_path = "cv_documents/";
	if(isset($cvID)&&$cvID!=0)
	{
	 $sSQL1 = " select * FROM tbldocs Where cvId= '$cvID' AND folder='exp_doc' ";
	$objDb->query($sSQL1);
   $pCount = $objDb->getCount();
	if($pCount>0 && $orignal_name_file!='')
	{
		
	$DBexpdocs = $objDb->getField(0,new_filename);
		
	
		if($DBexpdocs!='')
 		{ 
 		$expdocs="cv_documents/".$DBexpdocs;
		if (file_exists($DBexpdocs)) 
		{ 
		@unlink($DBexpdocs); 
		
		}
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $expdocs=$file_name;
		  $target_path = $target_path . basename($expdocs); 
		move_uploaded_file($_FILES['expdocs']['tmp_name'], $target_path); 	
		$tpSql = "update tbldocs SET old_filename='$orignal_name_file',  new_filename='$expdocs' where cvId = '$cvID' AND folder='exp_doc'";
		$objDb2->execute($tpSql);	
		}
	}
	else 
	{
		  if($orignal_name_file!='')
		  {
		  $part1=900000000+$cvID;
		  $rand=rand(1,99999999);
    	  $part2=900000000-$rand;
    	  $file_name=$part1."_".$part2.".".$ext;
		  $expdocs=$file_name;
		  $target_path = $target_path . basename($expdocs); 
		move_uploaded_file($_FILES['expdocs']['tmp_name'], $target_path); 	
		$tpSql = "INSERT INTO  tbldocs (cvid,  folder, old_filename, new_filename) VALUES ('$cvID', 'exp_doc', '$orignal_name_file', '$expdocs' )";
		$objDb2->execute($tpSql);
		  }
	}
		
	} 	 
	 
	 
	if ($dbpicture =='' )  {$pic='';}  else {$pic = $picture;	}
	if ($dbsignature=='' ) {$sign='';} else {$sign= $signature;}
	if ($dboriginalcv=='' ){$ocv='';}  else {$ocv = $originalcv;}
	if ($dbbirthcert=='' ) {$bcert='';}  else {$bcert= $birthcert;}
	if ($dbedudocs =='' )  {$eddocs='';}  else {$eddocs= $edudocs;}
	if ($dbexpdocs =='' )  {$exdocs='';}  else {$exdocs= $expdocs;}



	
	$msg="Updated!";
}	

//-------------------------------------------------------------------------------------


if($cvID!="")
{
	 $sSQL_p = " Select * FROM tbldocs WHERE cvId='$cvID' AND folder='pictures'";
	 $objDb->query($sSQL_p);
	 $pCount = $objDb->getCount();
	 if($pCount>0)
	 {
			  $dbpicture			=	$objDb->getField(0, new_filename);
			 $odbpicture			=	$objDb->getField(0, old_filename);
	 }
	
	
	 $sSQL_s = " Select * FROM tbldocs WHERE cvId='$cvID' AND folder='signatures'";
	$objDb->query($sSQL_s);
	 $sCount = $objDb->getCount();
	 if($sCount>0)
	 {
			$dbsignature				=	$objDb->getField(0, new_filename);
			$odbsignature				=	$objDb->getField(0, old_filename);
	 }
	 $sSQL_c = " Select * FROM tbldocs WHERE cvId='$cvID' AND folder='original_cv'";
	$objDb->query($sSQL_c);
	 $cCount = $objDb->getCount();
	 if($cCount>0)
	 {
			$dboriginalcv				=	$objDb->getField(0, new_filename);
			$odboriginalcv				=	$objDb->getField(0, old_filename);
	 }
	 $sSQL_o = " Select * FROM tbldocs WHERE cvId='$cvID' AND folder='others'";
	$objDb->query($sSQL_o);
	 $oCount = $objDb->getCount();
	 if($oCount>0)
	 {
			$others				=	$objDb->getField(0, new_filename);
			$oothers				=	$objDb->getField(0, old_filename);
	 }

	 $sSQL_edu = " Select * FROM tbldocs WHERE cvId='$cvID' AND folder='edu_doc'";
	$objDb->query($sSQL_edu);
	 $eduCount = $objDb->getCount();
	 if($eduCount>0)
	 {
			$dbedudocs				=	$objDb->getField(0, new_filename);
			$odbedudocs				=	$objDb->getField(0, old_filename);
	 }
	  $sSQL_exp = " Select * FROM tbldocs WHERE cvId='$cvID' AND folder='exp_doc'";
	$objDb->query($sSQL_exp);
	 $expCount = $objDb->getCount();
	 if($expCount>0)
	 {
			$dbexpdocs			=	$objDb->getField(0, new_filename);
			$odbexpdocs			=	$objDb->getField(0, old_filename);
	 }
	
	

	
   	$pic    ="cv_documents/".$dbpicture;
  	$sign	="cv_documents/".$dbsignature;
  	$ocv	="cv_documents/".$dboriginalcv;
  	$bcert	="cv_documents/".$dbothers;
  	$eddocs	="cv_documents/".$dbedudocs;
  	$exdocs	="cv_documents/".$dbexpdocs;


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
                          
	<form name="uploadcv" id="uploadcv" action=""  method="post" onsubmit="return uploadcv(this);" style=" border-top:1px solid #fdcb10; margin-top:20px"  enctype="multipart/form-data">
	  
	  <table width="96%" height="660" border="0"  align="right" cellpadding="1" cellspacing="1">
      
<?	  	    $sSQL_name = " Select name FROM tblcvmain WHERE cvId='$cvID' ";
	$objDb->query($sSQL_name);
 	 {
		 	$name			=	$objDb->getField(0, name);
 	 }
	?>
		  
        <tr>
        <td height="24" align="right"  colspan="5" ><strong>  <? echo $cvId;?></strong> - <strong> <?php   if($name!="") echo $name ; else echo $txtname; ?>       </strong>
		<!--	<font color="#999999">updated on:  -->
          <?php //if($lastupdate!="") echo $lastupdate ; else echo $txtlastupdate; ?>
        <!-- </font>-->  </td>
        </tr>
					<tr>
					<td height="31" colspan="2"><h1> Upload  Documents/ particulars:</h1></td>
					<td colspan="42"><font color="#009933"><strong><?php if($msg!="") echo $msg; else echo "";?></strong></font></td>
					</tr>

					<tr>
					  <td width="22%" height="68" class="label" ><h2><strong>Picture</strong>:&nbsp;</h2></td>
					  <td colspan="2" ><input type="file" name="picture" accept="image/jpg, image/jpeg" />
                      <font color="#CCCCCC"><? echo $odbpicture;?></font><br />
                      <font color="#FF0000">Only <strong>jpg format</strong> file can be uploaded.
					  <br> <b>Photo</b> should be less then <b>100 KB.</b> </font> </td>
					  <td width="18%" >
      <div class="mg-image"> 
  		<?php 
		$piclen = strlen($pic);
		if ($piclen >13) {
		?>
        <img  src="<? echo $pic; ?>"   width="76" height="78"/> 
        <?php 
		} 
		elseif ($pic=="" or $piclen <= 13) {
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
					  <td width="1%"> </td>
                    </tr>

					<tr>
					  <td height="83"   class="label" ><h2><strong>Signature</strong>:</h2></td>
					  <td colspan="2" ><input type="file" name="signature" accept="image/jpg, image/jpeg"  />
                      <font color="#CCCCCC"><? echo $odbsignature;?></font> <br />
                      <font color="#FF0000">Only <strong>jpg Format</strong> file can be uploaded.</font>
					<!-- <a href="<?=$sign?>" target="_new"><img src="<?=$sign?>" width="66" height="81" alt="ddd" /></a></td> -->                    </td>
					  <td >
                      
                       <div class="mg-image"> 
 
  		<?php 
		$signlen = strlen($sign);
 		if ($signlen >13) {
		?>
        <img  src="<? echo $sign?>" alt="Signature" width="95" height="49"/> 
        <?php 
		} 
		elseif ($sign=="" or $signlen <= 13) {
		?>
        <img src="images/noimage/signe.jpg" width="90" height="54"  alt="File to be uploaded"/>

		<?php 
		}
		?>
        </div>
                      
                      &nbsp;</td>
					  <td> </td>
                    </tr>
           <tr>
		   <td height="85" class="label"><h2><strong>Original CV</strong>:</h2></td>
           <td colspan="2" class="smec">
             <input type="file" name="originalcv" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/* <br /> size="50" maxlength="50"" />
             
             <font color="#CCCCCC"> <?php echo $odboriginalcv;?> </font> <br />
             <font color="#FF0000"> Only <strong> doc/pdf </strong> file  can be uploaded.</font><a href="<? echo $ocv; ?>" title="Original CV" > </a>           </td>
           <td class="smec">
           
           <div class="mg-image">  
          <?php
            $filename = $ocv;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 13) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/fdoc.png' alt='Original CV' width='252' height='154' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <=13) {
            ?>
          <img src="images/noimage/icon-cv2.png" width="53" height="58" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>
            </div>
           
           </td>
           <td> </td>
           </tr>

           <tr>
		   <td height="85" class="label"><h2><strong>NID/Passport:</strong></h2></td>
           <td colspan="2" class="smec">
             <input type="file" name="others" 
             accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/jpg, image/jpeg" size="50" 
             maxlength="50" />
             
             <font color="#CCCCCC"> <?php echo $oothers;?> </font> <br />
             <font color="#FF0000">Only <strong>pdf format</strong> file can be uploaded.</font>
             <?php /*?> 	 <a href="<?=$bcert?>" target="_new"><img src="images/write.png" width="66" height="81" alt="ddd" /></a> <?php */?> 
             <a href="<? echo $bcert; ?>" title="Others" > </a>  </td>
           <td class="smec">

           <div class="mg-image">  
          <?php
            $filename = $bcert;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 13) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/birthcertpdf.png' alt='Others/Docs' width='74' height='73' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= 13) {
            ?>
          <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>
			</div>
           </td>
           <td> </td>
           </tr>
  

         <tr>
		   <td height="85" class="label"><h2><strong>Educational  Docs:</strong></h2></td>
           <td colspan="2" class="smec">
  <input type="file" name="edudocs" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/jpg, image/jpeg" size="50" maxlength="50" />
             
             <font color="#CCCCCC"> <?php echo $odbedudocs;?> </font> <br />
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

            if ($filenamelen > 13) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/exppdf.png' alt='Experience Certificates/Docs' width='74' height='73' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= 13) {
            ?>
          <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>           </div> 
            
           </td>
           </tr>
            <td> </td>
        


        
                 <tr>
		   <td height="85" class="label"><h2><strong>Experience Docs:</strong></h2></td>
           <td colspan="2" class="smec">
             <input type="file" name="expdocs" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/jpg, image/jpeg"  size="50" maxlength="50" />
             
             <font color="#CCCCCC"> <?php echo $odbexpdocs;?> </font> <br />
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

            if ($filenamelen > 13) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/exppdf.png' alt='Experience Certificates/Docs' width='74' height='73' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= 13) {
            ?>
          <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>
         </div>
           </td>
       
           <td> </td>
        </tr>
   
             <tr>
              <td height="10" align="right"   >&nbsp;</td>
              <td colspan="4" align="right" valign="middle"  >
             <!--   <strong><?php echo "CV updated on :     ".date("d/m/Y", strtotime($lastupdate));?></strong> --> 
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
            <td align="left" colspan="4"  >
            <?php
            if($cvID!="")
            {
            ?>
            <input type="submit" value="Update" name="update" class="btn btn-primary me-3"/>&nbsp;&nbsp;<input type="submit" value="Next" name="next" class="btn btn-primary me-3" />
            <?php
            }
            else
            {
            ?>
            <input type="submit" value="Save & Next" name="save" class="btn btn-primary me-3"/>
            <?php
            }
            ?>&nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  class="btn btn-primary me-3"/></td>

        </tr>
	</table>
	
    </form>
 
	<br clear="all" />
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
