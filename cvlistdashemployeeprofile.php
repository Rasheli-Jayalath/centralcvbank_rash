<?php
error_reporting(E_ALL & ~E_NOTICE);

session_start();

$strusername = $_SESSION['uname'];
// $strdept = $_SESSION['department'];

$url_detail = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if ($strusername==null  ) 
{
	header("Location: ../index.php?init=3");
}

$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];
$now = new DateTime();
$nowyear = $now->format("Y");

$steoi 	= $_REQUEST['st'];
$sskill 	= $_REQUEST['skill'];
$ffgroup 	= $_REQUEST['fgroup'];
$countrysel 	= $_REQUEST['cc'];



//$cntry 	= $_REQUEST['current_country'];
 
if ($countrysel=="SACA"){ 
	$ccond1 = "and country!="."'".$countrysel."'";
	$ccond2 = " country!="."'".$countrysel."'";	
} else  {
	$ccond1 = "and country="."'".$countrysel."'";
	$ccond2 = " country="."'".$countrysel."'";

}
//echo 'AA : '.$ccond;

/* if ($countrysel1=="CAR"){ 
		$ccc = "CAR & CAU";
	} else
if ($countrysel1=="SACA"){ 
		$ccc = "";
	} else
{
	$countrysel1	= $_REQUEST['cc'];
}*/


switch ($steoi) {
    case "Cut":
   $steoi = "Cut & Cover"; 
        break;
    case "Decision Making":
	$steoi = "Decision Making & Problem Solving";  
        break;
        case "Water Hydraulics ":
	$steoi = "Water Hydraulics & Me";  
        break;
        case "PM ":
	$steoi = "PM & Ops";  
        break;

	default;
$steoi 	= $_REQUEST['st'];
    break;
}

/*
if($steoi = "Cut"){
   $steoi = "Cut & Cover";}
else 
if($steoi1 = "Decision Making"){
	$steoi = "Decision Making & Problem Solving"; }
 else 
 if($steoi1 != "Decision Making")
 {
  $steoi	= $_REQUEST['st'];	
  $steoi1	="";	
 }
*/

//echo $cvflag."cvflag<br>" ;
//echo $cvadmflag."adm<br>" ;
//echo $cventryflag."entry" ;

if ($cvflag==0)
{
	header("Location: ../index.php");
}
?>
<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
	$objDb3 = new Database( );
	
	$view					=	$_REQUEST['v'];
	$viewdt					=	$_REQUEST['vd'];
	$txtid					=	$_REQUEST['txtid'];

  $ddfuncgroupname1	= $_REQUEST['ddfuncgroupname'];
  $ddskilltype1		= $_REQUEST['ddskilltype'];
  $ddskillspecial1	= $_REQUEST['ddskilldetail'];
  $ddskillrating		= $_REQUEST['ddskillrating'];



	$txtname			= $_REQUEST['txtname'];

	$txteid				= $_REQUEST['txteid'];
	$txtresource_id		= $_REQUEST['txtresource_id'];
	$txtemp_name		= $_REQUEST['txtemp_name'];
	$txtemp_designation	= $_REQUEST['txtemp_designation'];
	$txtdate_of_joining	= $_REQUEST['txtdate_of_joining'];
	$txtdate_of_birth	= $_REQUEST['txtdate_of_birth'];
	$txttotal_exp		= $_REQUEST['txttotal_exp'];
	$txtexp_smec		= $_REQUEST['txtexp_smec'];
	$txtemploy_entity	= $_REQUEST['txtemploy_entity'];
	$txtjob_family		= $_REQUEST['txtjob_family'];
	$txtPAS_2018		= $_REQUEST['txtPAS_2018'];
	$txtPAS_2019		= $_REQUEST['txtPAS_2019'];
	$txtPAS_2020		= $_REQUEST['txtPAS_2020'];
	$txtcountry			= $_REQUEST['txtcountry'];
	$txthigh_qualif		= $_REQUEST['txthigh_qualif'];
	$txttalent_grid		= $_REQUEST['txttalent_grid'];
	$txtflight_risk		= $_REQUEST['txtflight_risk'];
	$txtmobility		= $_REQUEST['txtmobility'];

$ddskilltype = rtrim($ddskilltype1);
 $ddskillspecial = rtrim($ddskillspecial1);

/*


	$gender					=	$_REQUEST['gender'];
	$txtegcEmployee			=	$_REQUEST['txtegcEmployee'];
	$totalyears				=	$_REQUEST['totalyears'];
	$startexpyr				=	$_REQUEST['startexpyr'];
 	$txtgeneral				=	$_REQUEST['txtgeneral'];
	$years					=	$_REQUEST['years'];
	$txtpost				=	$_REQUEST['txtpost'];
	$txtlocation			=	$_REQUEST['txtlocation'];
	$txtCountry				=	$_REQUEST['txtCountry'];
	$txtAreaOfExpert		=	$_REQUEST['txtAreaOfExpert'];
	$txtkeyqualification	=	$_REQUEST['txtkeyqualification'];
	$workExpCountries		=	$_REQUEST['workExpCountries'];
	$txtpq					=	$_REQUEST['txtpq'];
	$txtprojDistance		=	$_REQUEST['txtprojDistance'];

	$chksmec				= $_REQUEST['chksmec'];
	$chkegc					= $_REQUEST['chkegc'];
	$chksj					= $_REQUEST['chksj'];
	$chkother				= $_REQUEST['chkother'];

	$addinfo1				=	$_REQUEST['txtinfo1'];
	$addinfo2				=	$_REQUEST['txtinfo2'];
	$txtaddinfo3			=	$_REQUEST['txtaddInfo3'];
	$txtinfodetail			=	$_REQUEST['txtinfodetail'];
	
	$picture				= $_REQUEST['picture'];
	$signature				= $_REQUEST['signature'];
	$originalcv				= $_REQUEST['originalcv'];
	$datetime				= date('Y-m-d');
	$lastupdate				= $_REQUEST['lastupdate'];
	$posted_date			= $_REQUEST['posted_date'];
	$updated_on				= $_REQUEST['updated_on'];
	
	$SalaryRange			= $_REQUEST['SalaryRange'];


	$cvStatus				= $_REQUEST['cvStatus'];
	$cvVerification			= $_REQUEST['cvVerification'];
	$ep_name				= $_REQUEST['ep_name'];
	$edited_by				= $_REQUEST['edited_by'];	
	$referece				= $_REQUEST['referece'];
	
		*/
	



//	$datetime = $datetime1+6;
	
 	$pic    ="images/pics/".$dbpicture;
  	$sign	="images/signature/".$dbsignature;
  	$ocv	="images/originalcv/".$dboriginalcv;

 	
$sCondition="";	
	
if($txtid!="")
{
$sCondition=" cvId='$txtid' ";
}

if($txtname!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND name LIKE '%".$txtname."%'";
	}
	else
	{
	$sCondition=" name LIKE '%".$txtname."%'";
	}
}	

 
if($txtresource_id!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND resource_id LIKE '%".$txtresource_id."%'";
	}
	else
	{
	$sCondition=" resource_id LIKE '%".$txtresource_id."%'";
	}
}	


if($ddfuncgroupname!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND fgroup LIKE '%".$ddfuncgroupname."%'";
	}
	else
	{
	$sCondition=" fgroup LIKE '%".$ddfuncgroupname."%'";
	}
}


if($ddskilltype!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND skillspecial LIKE '%".$ddskilltype."%'";
	}
	else
	{
	$sCondition=" skillspecial LIKE '%".$ddskilltype."%'";
	}
}


if($ddskillspecial!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND skilltypedesc LIKE '%".$ddskillspecial."%'";
	}
	else
	{
	$sCondition=" skilltypedesc LIKE '%".$ddskillspecial."%'";
	}
}


if($ddskillrating!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND rating LIKE '%".$ddskillrating."%'";
	}
	else
	{
	$sCondition=" rating LIKE '%".$ddskillrating."%'";
	}
}


if($country!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND rating LIKE '%".$ddskillrating."%'";
	}
	else
	{
	$sCondition=" rating LIKE '%".$ddskillrating."%'";
	}
}



/* normal search */
if($gender!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND gender LIKE '%".$gender."%'";
	}
	else
	{
	$sCondition=" gender LIKE '%".$gender."%'";
	}
}

if($egcEmployee!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND egcEmployee LIKE '%".$egcEmployee."%'";
	}
	else
	{
	$sCondition=" egcEmployee LIKE '%".$egcEmployee."%'";
	}
}


if($cvVerification!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND cvVerification LIKE '%".$cvVerification."%'";
	}
	else
	{
	$sCondition=" cvVerification LIKE '%".$cvVerification."%'";
	}
}


if($referece!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND referece LIKE '%".$referece."%'";
	}
	else
	{
	$sCondition=" referece LIKE '%".$referece."%'";
	}
}






 	
if($txtpq!="")
{
$mycv="";
	$sSQL = " select distinct(cvId) as cvId FROM tbleducation WHERE eDegreeTitle LIKE '%$txtpq%' ";
	$objDb->query($sSQL);
	$iCount = $objDb->getCount( );
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$cvId=$objDb->getField($i, cvId);
		if($mycv=="")
		{
		$mycv=$cvId;
		}
		else
		{
		$mycv.=','.$cvId;
		}	
	}	
	
 	if($sCondition!="")
	{
	$sCondition.=" AND cvId in (".$mycv.")";
	}
	else
	{
	$sCondition= "cvId in (".$mycv.")";
	}
}

if($totalyears!="")
{
$array=explode('-',$totalyears);
//var_dump($array);
$startYear=$array[0];
$endYear=$array[1];
	if($sCondition!="")
	{
	$sCondition.=" AND totalExp BETWEEN $startYear AND $endYear";
	}
	else
	{
	$sCondition=" totalExp BETWEEN $startYear AND $endYear ";
	}
	//echo $sCondition;
}

if($projDistance !="")
{
$array=explode('-',$projDistance);
//var_dump($array);
$startkms=$array[0];
$endkms=$array[1];
	if($sCondition!="")
	{
	$sCondition.=" AND projDistance BETWEEN $startkms AND $endkms";
	}
	else
	{
	$sCondition=" projDistance BETWEEN $startkms AND $endkms ";
	}
	//echo $sCondition;
}


if($years!="" && $totalyears=="")
{
$array=explode('-',$years);
//var_dump($array);
$startYear=$array[0];
$endYear=$array[1];
	if($sCondition!="")
	{
	$sCondition.=" AND totalExp BETWEEN $startYear AND $endYear";
	}
	else
	{
	$sCondition=" totalExp BETWEEN $startYear AND $endYear ";
	}
	//echo $sCondition;
}

if($txtgeneral!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND (position LIKE '%".$txtgeneral."%' OR areaOfExp LIKE '%".$txtgeneral."%' OR keyQualification LIKE '%".$txtgeneral."%')";
	}
	else
	{
	$sCondition=" position LIKE '%".$txtgeneral."%' OR areaOfExp LIKE '%".$txtgeneral."%' OR keyQualification LIKE '%".$txtgeneral."%'";
	}
//	echo $sCondition;
}

if($txtpost!="" && $txtgeneral=="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND position LIKE '%".$txtpost."%'";
	}
	else
	{
	$sCondition=" position LIKE '%".$txtpost."%'";
	}
}

if($txtlocation!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND location LIKE '%".$txtlocation."%'";
	}
	else
	{
	$sCondition=" location LIKE '%".$txtlocation."%'";
	}
}

if($txtaddinfo3!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND addinfo3 LIKE '%".$txtaddinfo3."%'";
	}
	else
	{
	$sCondition=" addinfo3 LIKE '%".$txtaddinfo3."%'";
	}
}



if($txtchksj!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND sjEmp LIKE '%".$txtchksj."%'";
	}
	else
	{
	$sCondition=" sjEmp LIKE '%".$txtchksj."%'";
	}
}



if($txtCountry!="")
{
	if($sCondition!="")
	{
		if($txtCountry=="240")
			{
			$sCondition.=" AND citizenship NOT LIKE '%162%'";
			} else 
			{
			$sCondition.=" AND citizenship = '".$txtCountry."'";
			}
	}
	else
	{
		if($txtCountry=="240")
			{
			$sCondition=" citizenship NOT LIKE '%162%'";
			}
			else
			{
			$sCondition=" citizenship = '".$txtCountry."'";
			}
	}
	//echo $sCondition;
} 	
if($txtAreaOfExpert!="" && $txtgeneral=="")
{
$filter1="";
$txtAreaOfExpert = trim($txtAreaOfExpert);
$txtAreaOfExpert = str_replace(" ",",",$txtAreaOfExpert);
$workExpCountries = str_replace(",,",",",$workExpCountries);		
$arrAOE=explode(',',$txtAreaOfExpert);
	
for($i=0; $i< sizeof($arrAOE); $i++)
{
	if($filter1=="")
	{
	$filter1="areaOfExp LIKE '%".$arrAOE[$i]."%'  ";
	}
	{
 	$filter1.=" OR areaOfExp LIKE '%".$arrAOE[$i]."%' ";
	}
}

	if($sCondition!="")
	{
	$sCondition.=" AND (".$filter1.")";
	}
	else
	{
	$sCondition = " ( ".$filter1." ) ";
	}
}
if($txtkeyqualification!="" && $txtgeneral=="")
{
$filter2="";
$txtkeyqualification = trim($txtkeyqualification);	
$txtkeyqualification = str_replace(" ",",",$txtkeyqualification);
$workExpCountries = str_replace(",,",",",$workExpCountries);		
$arrKQ=explode(',',$txtkeyqualification);

for($j=0; $j< sizeof($arrKQ); $j++)
{
	if($filter2=="")
	{
	$filter2="keyQualification LIKE '%".$arrKQ[$j]."%'  ";
	}
	{
 	$filter2.=" OR keyQualification LIKE '%".$arrKQ[$j]."%' ";
	}
}

	if($sCondition!="")
	{
	$sCondition.=" AND (".$filter2.")";
	}
	else
	{
	$sCondition = " ( ".$filter2." ) ";
	}
	
}

if($workExpCountries!="")
{
$filter3;
$workExpCountries = trim($workExpCountries);
$workExpCountries = str_replace(" ",",",$workExpCountries);	
$workExpCountries = str_replace(",,",",",$workExpCountries);	
$arrWE=explode(',',$workExpCountries);

for($k=0; $k< sizeof($arrWE); $k++)
{
	if($filter3=="")
	{
	$filter3="workExpCountries LIKE '%".$arrWE[$k]."%'  ";
	}
	{
 	$filter3.=" OR workExpCountries LIKE '%".$arrWE[$k]."%' ";
	}
}

	if($sCondition!="")
	{
	$sCondition.=" AND (".$filter3.")";
	}
	else
	{
	$sCondition = " ( ".$filter3." ) ";
	}
 }


if($SalaryRange!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND SalaryRange LIKE '%".$SalaryRange."%'";
	}
	else
	{
	$sCondition=" SalaryRange LIKE '%".$SalaryRange."%'";
	}
}

if($view=='grid')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
//$sSQL1 = " select * from tblskillemployee_detail order by resource_id desc   ";
//$sSQL1 = "SELECT talent_grid, count(talent_grid) as cnt_tgrid FROM tblskillemployee_detail where talent_grid='$steoi' ";
 $sSQL1 = "SELECT * FROM skillmatdb.tblskillemployee_detail where talent_grid='$steoi' $ccond1 order by emp_name asc";
}
else if($view=='jf')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
//$sSQL1 = " select * from tblskillemployee_detail order by resource_id desc   ";
//$sSQL1 = "SELECT talent_grid, count(talent_grid) as cnt_tgrid FROM tblskillemployee_detail where talent_grid='$steoi' ";
$sSQL1 = "SELECT * FROM skillmatdb.tblskillemployee_detail where job_family='$steoi' $ccond1 order by emp_name asc";
}

else if($view=='co')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
//$sSQL1 = " select * from tblskillemployee_detail order by resource_id desc   ";
//$sSQL1 = "SELECT talent_grid, count(talent_grid) as cnt_tgrid FROM tblskillemployee_detail where talent_grid='$steoi' ";
   $sSQL1 = "SELECT * FROM skillmatdb.tblskillemployee_detail where $ccond2 order by emp_name asc";
}


else if($view=='cha')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
//$sSQL1 = " select * from tblskillemployee_detail order by resource_id desc   ";
//$sSQL1 = "SELECT talent_grid, count(talent_grid) as cnt_tgrid FROM tblskillemployee_detail where talent_grid='$steoi' ";
$sSQL1 = "SELECT * FROM skillmatdb.tblskillemployee_detail WHERE fgroup='$steoi' $ccond1 order by emp_name asc";
	
}

else if($view=='ttni')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
//$sSQL1 = " select * from tblskillemployee_detail order by resource_id desc   ";
//$sSQL1 = "SELECT talent_grid, count(talent_grid) as cnt_tgrid FROM tblskillemployee_detail where talent_grid='$steoi' ";
$sSQL1 = "SELECT * FROM skillmatdb.tblskillemployee_detail WHERE talent_grid='N1' order by emp_name asc";
//	echo $sSQL1;
}
else if($view=='tta')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
//$sSQL1 = " select * from tblskillemployee_detail order by resource_id desc   ";
//$sSQL1 = "SELECT talent_grid, count(talent_grid) as cnt_tgrid FROM tblskillemployee_detail where talent_grid='$steoi' ";
$sSQL1 = "SELECT * FROM skillmatdb.tblskillemployee_detail WHERE talent_grid='a1' order by Career_frame_1 desc";
//	echo $sSQL1; SELECT * FROM `tblskillemployee_detail` ORDER BY `tblskillemployee_detail`.`Career_frame_1` DESC

	
}

else if($view=='special')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
//$sSQL1 = " select * from tblskillemployee_detail order by resource_id desc   ";
//$sSQL1 = "SELECT talent_grid, count(talent_grid) as cnt_tgrid FROM tblskillemployee_detail where talent_grid='$steoi' ";
// $sSQL1 = "SELECT * FROM tblskilldata where skilltypedesc='$steoi' ";
 $sSQL1 = "	SELECT *, a.resource_id,a.fgroup,a.skilltypedesc,a.rating FROM skillmatdb.tblskilldata a INNER JOIN skillmatdb.tblskillemployee_detail b ON a.resource_id = b.resource_id where a.fgroup='$ffgroup' and a.skillspecial='$sskill' and a.rating!=0 and a.skilltypedesc='$steoi' ";
		
}

else if($view=='latest')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select * from skillmatdb.tblskillemployee_detail order by emp_name asc ";
}

else
{
 //$sSQL1 = " select cvId, name,position,citizenship, sjEmp, egcEmployee,startexpyr, picture,originalcv, lastupdate, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by,referece, SalaryRange FROM tblcvmain WHERE $sCondition order by cvId desc";
//echo $sSQL1 = "select * FROM tblskilldata WHERE $sCondition and resource_id=";
	
   $sSQL1 = "SELECT * FROM skillmatdb.tblskillemployee_detail E JOIN tblskilldata D ON (E.resource_id = D.resource_id) WHERE $sCondition ";
 echo $sSQL1;
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
<script type = "text/javascript">

function goPage() {
var url = document.myform.selmenu.value;
if (url !="") {
window.location = url;
}
}
</script>
<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
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
      <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
          <div class="row">
 <div style="margin:auto; float: left;display: flex; justify-content: center;align-items: center; height: 50px;width: 100% ; background-image: linear-gradient(to bottom right, #c0c0c0, grey); padding: 30px;border-radius: 20px;">
<? if ($view == 'tta') { echo "<b>TOP TALENT IDENTIFIED BY SACA DIVISION </b>"; } else {  ?>
	  <strong style="color: darkblue; font-size: 30px;">List of Staff :</strong> 
  <? } ?>		
		     <?php  
 		$sql = mysql_query("SELECT count(*) as ResourceCnt  FROM skillmatdb.tblskillemployee_detail WHERE talent_grid='a1' order by Career_frame_1 desc ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>
        <span class="count" style="color:black"> (<? echo $data['ResourceCnt']; ?>) </span> 
	  
	  <span style="font-size: 20px; color: black" > <?=$countrysel;?>
	    </span>
        </div>
<div id="contentdash">
<table width="100%" height="279" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="">

<!-- <tr style="font-weight:bold; color:#0E0989; background:#F0F0F0">
    <td width="3%"  style="border: 1px solid #0E0989" align="center">Sr. No.</td>
    <td width="20%" style="border: 1px solid #0E0989" align="center">Person Name</td>
    <td width="20%" style="border: 1px solid #0E0989" align="center">Proposed Position</td>
    <td width="5%" style="border: 1px solid #0E0989" align="center">Total <br />Exper.</td>
    <td width="7%" style="border: 1px solid #0E0989" align="center">Functional Group</td>
	<td width="7%" style="border: 1px solid #0E0989" align="center">Skill Type</td>
	<td width="7%" style="border: 1px solid #0E0989" align="center">Skill Speciality</td>
	<td width="7%" style="border: 1px solid #0E0989" align="center">Skill Rating</td>
	<td width="7%" style="border: 1px solid #0E0989" valign="middle" align="center"> Nationality</td>
    <td width="4%" style="border: 1px solid #0E0989"  align="center">CV ID </td>
</tr> -->

<?php
//echo $sSQL1;
$objDb  = new Database( );
$objDb->query($sSQL1);
$iCount = $objDb->getCount( );
if($iCount>0)
{
	for ($i = 0 ; $i < $iCount; $i++)
	{
	//$i;//echo "ASDFASDF".$cvId." " .$j;
	$eid				=	$objDb->getField($i, sno);
	$cvid				=	$objDb->getField($i, cvid);
	$resource_id		=	$objDb->getField($i, resource_id);
	$emp_name			=	$objDb->getField($i, emp_name);
	$emp_designation	=	$objDb->getField($i, emp_designation);
	$date_of_joining	=	$objDb->getField($i, date_of_joining);
	$date_of_birth		=	$objDb->getField($i, date_of_birth);
	$total_exp			=	$objDb->getField($i, total_exp);
	$exp_smec			=	$objDb->getField($i, exp_smec);
	$employ_entity		=	$objDb->getField($i, employ_entity);
	$job_family			=	$objDb->getField($i, job_family);
	$PAS_2018			=	$objDb->getField($i, PAS_2018);
	$PAS_2019			=	$objDb->getField($i, PAS_2019);
	$PAS_2020			=	$objDb->getField($i, PAS_2020);
	$country			=	$objDb->getField($i, country);
	$high_qualif		=	$objDb->getField($i, high_qualif);
	$qualif_detail		=	$objDb->getField($i, qualif_detail);
	$talent_grid		=	$objDb->getField($i, talent_grid);
	$flight_risk		=	$objDb->getField($i, flight_risk);
	$mobility			=	$objDb->getField($i, mobility);
	
	$sno				=	$objDb->getField($i, sno);
	$resource_id		=	$objDb->getField($i, resource_id);
	$fgroup1			=	$objDb->getField($i, fgroup);
	$ddskillspecial1	=	$objDb->getField($i, skillspecial);
	$skilltypedesc1		=	$objDb->getField($i, skilltypedesc);
	$rating1			=	$objDb->getField($i, rating);
	?>
 <? //$namee = "AbhishekSobbana";

	$searchphoto = $resource_id.".jpg";
$picemp="../skillmatrix/empphotoschang/".$resource_id.".jpg";
		
$searchedfile = file_exists($picemp) ;
	?>	
<tr>
  <td rowspan="6"  align="center">&nbsp;</td>
  <td width="12%" rowspan="6" align="center" valign="middle">
  <?
// your file
 
 // outputs 'image'
 
		
	  ?>
	  <a href="cvskillprofile.php?id=<?=$cvid?>" target="_new">
		  <? if($searchedfile > 0){ ?>
		  <img  src="<? echo $picemp?>" width="97" height="120"/></a>
		  <? } else { ?>
		  <img  src="../skillmatrix/empphotos/defaultskilldash.png" width="97" height="90"/></a>
		<? }?>
	</td>
  <td height="36" style="color: #008CD0; font-size: 20px">&nbsp;</td>
  <td colspan="2"  align="right"  class="profileemp">&nbsp;</td>
  <td class="profileemp" align="right" >&nbsp;</td>
  <td  align="left" >&nbsp;</td>
</tr>
<tr>
 
  <td height="23" style="color: #008CD0; font-size: 20px"> <?=$emp_name?>  - <?=$resource_id?>  
    </a></td>
  <td colspan="2"  align="right"  class="profileemp">&nbsp;</td>
  <td width="17%" class="profileemp" align="right" >&nbsp;</td>
  <td width="6%"  align="left" >&nbsp;</td>
</tr>
<tr>
  <td height="27" class="profileemptext" ><strong>
    <?=$emp_designation?>
  </strong></td>
  <td width="13%"   class="profileemp" align="right"> SMEC Experience:<span class="profileemptext">
    <?=$exp_smec?>
    yrs</span></td>
  <td width="13%"  align="right"  class="profileemp">Total Exp: <span class="profileemptext"><?=$total_exp?>yrs</span></td>
  <td  class="profileemp" align="right">Hire Date:&nbsp;<span class="profileemptext"><?=$date_of_joining?></span></td>
  <td  align="left" >&nbsp;</td>
  </tr>
<tr>
  <td height="26" colspan="2"  style="color: brown; font-size:16px"><span class="profileemp">Access Role: <span class="profileemptext">
    <?=$job_family?>
    ,
    <?=$employ_entity?>
    ,
    <?=$country?>
    
  </span></span></td>
  <td align="right"  class="profileemp">Talent Grid: &nbsp;<span class="profileemptext">
    <?=$talent_grid?>
  </span></td> 
  <td  class="profileemp" align="right">&nbsp;</td> <td  class="profileemp" align="right">&nbsp;</td>
</tr>
<tr>
  <td height="18" colspan="2" valign="top" style="color: brown; font-size:16px"><span class="profileemp">Highest Qualification:</span> <span>
    <style: class="profileemptext" style="color: brown;">
    <strong><em><?=$high_qualif?>
    <br />
    <?=$qualif_detail?>
    <br />
    </em></strong></span></td>
  <td align="right"  class="profileemp">DOB: <span>
    <style: class="profileemptext">
    <?=$date_of_birth?>
  </span></td> 
  <td  class="profileemp" align="right">  <a href="cvskillprofile.php?id=<?=$cvid?> " target="new" ><strong><em>Detail Profile</em></strong></a></td> <td  class="profileemp" align="right">&nbsp;</td>
</tr>
<tr>
  <td width="34%" height="32" valign="top" style="color: brown; font-size:16px">&nbsp;</td>
  <td colspan="2" align="right"  class="profileemp">&nbsp;</td>
</tr>
<tr>
  <td colspan="7"  align="center"> <hr color="#C8C8C8"> </td>
</tr>
<?php
	}
	}
else { ?>
<tr>
<td height="50" colspan="9" align="center" >No Record Found</td>
</tr>
<?php }  

	?>
 </table>
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
</div>
<?php
	$objDb  -> close( );
	$objDb2 -> close( );
	$objDb3 -> close( );	
?><!-- page-body-wrapper ends --> 

<!-- container-scroller --> 

<!-- plugins:js --> 

<!-- End plugin js for this page --> 
<!-- inject:js  
<script src="js/off-canvas.js"></script> 
<script src="js/hoverable-collapse.js"></script> 
<script src="js/template.js"></script> 
<script src="js/settings.js"></script> 
<script src="js/todolist.js"></script> 

<!-- endinject  
<!-- Custom js for this page 
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
<!-- container-scroller --> 

<!-- plugins:js --> 
<script src="vendors/js/vendor.bundle.base.js"></script> 
<!-- endinject --> 
<!-- Plugin js for this page --> 
<script src="vendors/chart.js/Chart.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script> 
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
<script src="https://code.highcharts.com/highcharts.src.js"></script> 
<script src="js/chart.js"></script> 
<!-- End custom js for this page-->

</body>
</html>
