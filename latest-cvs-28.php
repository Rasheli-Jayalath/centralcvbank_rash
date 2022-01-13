<?php
error_reporting(E_ALL & ~E_NOTICE);

session_start();

$strusername = $_SESSION['uname'];

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
	$txtname				=	$_REQUEST['txtname'];
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
	
	$addinfo1				=	$_REQUEST['txtinfo1'];
	$addinfo2				=	$_REQUEST['txtinfo2'];
	$txtaddinfo3			=	$_REQUEST['txtaddInfo3'];
	$txtinfodetail			=	$_REQUEST['txtinfodetail'];


	$chksmec				= $_REQUEST['chksmec'];
	$chkegc					= $_REQUEST['chkegc'];
	$chksj					= $_REQUEST['chksj'];
	$chkother				= $_REQUEST['chkother'];

	$picture				= $_REQUEST['picture'];
	$signature				= $_REQUEST['signature'];
	$originalcv				= $_REQUEST['originalcv'];
	$datetime				= date('Y-m-d');
	$lastupdate				= $_REQUEST['lastupdate'];
	$cvStatus				= $_REQUEST['cvStatus'];
	$cvVerification			= $_REQUEST['cvVerification'];
	
	
	$lastupdate				= $_REQUEST['lastupdate'];
	$posted_date			= $_REQUEST['posted_date'];
	$updated_on				= $_REQUEST['updated_on'];

	//NEW VARIABLES APR-2021
	$SalaryRange			= $_REQUEST['SalaryRange'];
	$fgroup					= $_REQUEST['fgroup'];
	$fgroup2				= $_REQUEST['fgroup2'];
	$exp_current			= $_REQUEST['exp_current'];
	$exp_prev				= $_REQUEST['exp_prev'];
	$exp_never				= $_REQUEST['exp_never'];

	$ep_name				= $_REQUEST['ep_name'];
	
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


// new variables apr-2021

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

if($fgroup!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND fgroup LIKE '%".$fgroup."%'";
	}
	else
	{
	$sCondition=" fgroup LIKE '%".$fgroup."%'";
	}
}

if($fgroup2!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND fgroup2 LIKE '%".$fgroup2."%'";
	}
	else
	{
	$sCondition=" fgroup2 LIKE '%".$fgroup2."%'";
	}
}

if($exp_current!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND exp_current LIKE '%".$exp_current."%'";
	}
	else
	{
	$sCondition=" exp_current LIKE '%".$exp_current."%'";
	}
}

if($exp_prev!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND exp_prev LIKE '%".$exp_prev."%'";
	}
	else
	{
	$sCondition=" exp_prev LIKE '%".$exp_prev."%'";
	}
}

if($exp_never!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND exp_never LIKE '%".$exp_never."%'";
	}
	else
	{
	$sCondition=" exp_never LIKE '%".$exp_never."%'";
	}
}

//// end


if($txtCountry!="")
{
	if($sCondition!="")
	{
		if($txtCountry=="240")
			{
			$sCondition.=" AND citizenship NOT LIKE '%99%'";
			} else 
			{
			$sCondition.=" AND citizenship = '".$txtCountry."'";
			}
	}
	else
	{
		if($txtCountry=="240")
			{
			$sCondition=" citizenship NOT LIKE '%99%'";
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

 
//echo "vdate: " .$viewdt;

 //$vdate = "2017-04-24";
 
if($view=='99allcv')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position, cposition,citizenship, sjEmp, egcEmployee, originalcv, startexpyr, picture, posted_date, updated_on,cvStatus, cvVerification, addinfo3, ep_name FROM tblcvmain order by cvId desc ";
}

else if($view=='latest')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
 $sSQL1 = " select cvId,name,position,cposition, citizenship, sjEmp, egcEmployee, startexpyr,picture, originalcv, posted_date, updated_on, SalaryRange, fgroup, fgroup2, exp_current, exp_prev, exp_never, cvStatus, cvVerification, addinfo3, ep_name FROM tblcvmain order by cvId desc limit 0,19 ";
}

else if($view=='modif')
{
	
	//SELECT cvId, name, datetime, posted_date, lastupdate,updated_on FROM tblcvmain WHERE updated_on >= CURDATE();
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position, cposition, citizenship, sjEmp, egcEmployee,startexpyr,fgroup, fgroup2, picture,originalcv, posted_date, updated_on, cvStatus, cvVerification, addinfo3, ep_name FROM tblcvmain order by updated_on desc limit 0,25  ";
  
}else if($view=='modiftod')
{
	//SELECT cvId, name, datetime, posted_date, lastupdate,updated_on FROM tblcvmain WHERE updated_on >= CURDATE();
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,startexpyr,picture,fgroup, fgroup2, originalcv, posted_date, updated_on, cvStatus, cvVerification, addinfo3, ep_name FROM tblcvmain WHERE updated_on >= CURDATE() ";
}

else if($view=='tod')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position,cposition,citizenship,sjEmp, egcEmployee,startexpyr,fgroup, fgroup2, picture,originalcv, cvStatus, cvVerification, addinfo3, ep_name, posted_date, updated_on FROM tblcvmain WHERE posted_date = CURDATE() ";
}

else if($view=='vdate')
{
	//v=vd&vd=2017-04-24;
	//$viewdt					=	$_REQUEST['vd'];
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position,cposition,citizenship,sjEmp, egcEmployee,startexpyr,picture,fgroup, fgroup2, originalcv, posted_date, cvStatus, cvVerification, posted_date, updated_on, addinfo3, ep_name  FROM tblcvmain WHERE posted_date = '$viewdt' order by posted_date asc, cvId desc ";
}


else if($view=='foreign')
{

//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,startexpyr,fgroup, fgroup2, picture, originalcv, cvStatus, cvVerification, addinfo3, ep_name, posted_date, updated_on FROM tblcvmain WHERE citizenship !='99' order by posted_date desc limit 0,1000 ";
}

else if($view=='inemp')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,startexpyr,fgroup, fgroup2, picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name FROM tblcvmain  where egcEmployee='E' order by cvId asc";
}
else if($view=='freel')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,startexpyr,picture, fgroup, fgroup2, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name FROM tblcvmain  where egcEmployee='F' order by cvId asc";
}
else if($view=='exemp')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship,egcEmployee,startexpyr,fgroup, fgroup2, picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name FROM tblcvmain  where egcEmployee='X' order by cvId asc";
}
else if($view=='oth')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,fgroup, fgroup2, startexpyr,picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name FROM tblcvmain  where egcEmployee='O' order by cvId asc";
}
else if($view=='sje')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,startexpyr,fgroup, fgroup2, picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name FROM tblcvmain  where sjEmp='Y' order by cvId asc";
}
else if($view=='verif')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,startexpyr,fgroup, fgroup2, picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name FROM tblcvmain  where cvVerification='V' order by cvId asc";
}
else if($view=='nverif')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,startexpyr,fgroup, fgroup2, picture, originalcv, lastupdate,cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name FROM tblcvmain  where cvVerification='N' order by cvId asc";
}

else if($view=='pend')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,cposition,citizenship, sjEmp, egcEmployee,startexpyr,fgroup, fgroup2, picture, originalcv, lastupdate,cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name FROM tblcvmain where cvVerification='P' order by cvId asc";
}

else
{
$sSQL1 = " select * FROM tblcvmain WHERE $sCondition order by cvId desc";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CV Bank</title>
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

  <style>

.tablerw
{
  border-right: 1px solid #fff;
  padding-left: 5px;
}
.tablerwdata
{  padding: 10px;}

.tablerow
{  padding: 10px;

width="5%"; 
	class="mg-image"; style="border-bottom:1px solid #cccccc"; align="center";
	
	  
	  }
	  
	  
  </style>

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
    
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
   
          <div class="color-tiles mx-0 px-4">
    
          </div>
        </div>
      </div>
     

      <!-- partial -->
      
      <!-- NAV ENDS -->
       <!-- NAV ENDS -->
        <!-- NAV ENDS -->
         <!-- NAV ENDS -->

<? include "includes/leftsidemenu.php"; ?>


      <div class="main-panel">
        <div class="content-wrapper">
          
         <!-- TOP ROW -->
          <div class="row">
          <!-- TOP ROW -->

          <!-- CONTENT STARTS -->
          <!-- CONTENT STARTS -->
          <!-- CONTENT STARTS -->
          <!-- CONTENT STARTS -->
                  <div class="card container-fluid" style=" margin-top: 25px; text-align: center; padding: 15px;">
                    <div class="row">
                          <div class="col-sm-12">
                            <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                                <p class="statistics-title"></p>
                                <h3 class="rate-percentage"></h3>
                              </div>
                              <div>
                                <p class="statistics-title" style="font-size: 15px;">Employees</p>
                                <?php  
                                  $sql = mysql_query("SELECT COUNT(egcEmployee) AS Employees FROM tblcvmain WHERE egcEmployee='E'");
                                  $data=mysql_fetch_assoc($sql); 
                                  //echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
                                ?>
                                <h3 class="rate-percentage" style="font-weight: 900;"><? echo $data['Employees']; ?></h3>
                              </div>
                              <div>
                                <p class="statistics-title" style="font-size: 15px;">Freelancer</p>
                                <?php  
                                  $sql = mysql_query("SELECT COUNT(egcEmployee) AS Freelancer FROM tblcvmain WHERE egcEmployee='F'");
                                  $data=mysql_fetch_assoc($sql); 
                                  //echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
                                ?>
                                <h3 class="rate-percentage" style="font-weight: 900;"><? echo $data['Freelancer']; ?></h3>
                              </div>
                              <div>
                                <p class="statistics-title" style="font-size: 15px;">Ex-Emps</p>
                                <?php  
                                  $sql = mysql_query("SELECT COUNT(egcEmployee) AS ExEmployees FROM tblcvmain WHERE egcEmployee='X'");
                                  $data=mysql_fetch_assoc($sql); 
                                  //echo '<font color=gray size="6"><b>'.$data['ExEmployees'].'</b></font>';
                                  ?> 
                                <h3 class="rate-percentage" style="font-weight: 900;"><? echo $data['ExEmployees']; ?></h3>
                              </div>
                              <div >
                                <p class="statistics-title" style="font-size: 15px;">Others</p>
                                <?php  
                                  $sql = mysql_query("SELECT COUNT(egcEmployee) AS OthEmployees FROM tblcvmain WHERE egcEmployee='O'");
                                  $data=mysql_fetch_assoc($sql); 
                                  //echo '<font color=#DEA202 size="6"><b>'.$data['OthEmployees'].'</b></font>';
                                  ?> 
                                <h3 class="rate-percentage" style="font-weight: 900;"> <? echo $data['OthEmployees']; ?></h3>
                              </div>
                              <div >
                                <p class="statistics-title" style="font-size: 15px;">SJ</p>
                                <?php  
                                    $sql = mysql_query("SELECT COUNT(sjEmp) AS sjEmployees FROM tblcvmain WHERE sjEmp='Y'");
                                    $data=mysql_fetch_assoc($sql); 
                                    //echo '<font color=#DEA202 size="6"><b>'.$data['sjEmployees'].'</b></font>';
                                    ?>
                                <h3 class="rate-percentage" style="font-weight: 900;"><? echo $data['sjEmployees']; ?></h3>
                              </div>
                              <div>
                                <p class="statistics-title"></p>
                                <h3 class="rate-percentage"></h3>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                        <!-- Top Div with Numbers -->

                        <div class="container" style="text-align:center;margin-top: 25px; "><h3>

                        <?php if ($view=='latest') echo 'List of Latest CVs  (19 Nos.)' ; 
                          else 
                          if($view=='99allcv') echo 'List of All CVs' ;
                          else 
                          if($view=='modif') echo 'List of Modified/Updated CVs' ;
                          else 
                          if($view=='foreign') echo 'List of Foreigner CVs ' ;
                          else 
                          if($view=='egcemp') echo 'List of EGC Employed by HO/Projects' ;
                          else 
                          echo 'List of CVs' ;
                        ?>

                        </h3></div>

                        
<div class="card container-fluid" style="margin-top: 15px; overflow-x: auto">
                        <div class="card-body" style="padding: 10px;">
                            <table style="border-radius:20px;">
                            <thead>
                                    
     <tr style="text-align: center;font-size: 14px;font-weight: bolder;background-color: #c0c0c0; border-bottom:1px solid #d9d9d9;">
			<th  style="width: 2%;padding: 10px;border-right: 1px solid #fff;">Sr. No</th>
			<th style="width: 3%;" class="tablerw">Photo</th>
			<th style="width: 10%;" class="tablerw">Person Name</th>
			<th style="width: 12%;" class="tablerw">Proposed Position</th>
			<th style="width: 3%;" class="tablerw">Total Exper.</th>
			<th style="width: 5%;" class="tablerw">Nationality</th>
			<th style="width: 3%;" class="tablerw">CV ID</th>
			<th style="width: 43%;" class="tablerw">CV Templates</th>

<?php  

if ($superadminflag== 1) {
	
echo '
<td width="3%" class="tablerw"> Level </td> 
<td width="3%" class="tablerw"> F.Group-1 </td> 
<td width="3%" class="tablerw"> F.Group-2 </td> 
<td width="3%" class="tablerw"> Current Exper./ SMEC </td> 
<td width="3%" class="tablerw"> Prev. Exper./ SMEC </td> 
<td width="3%" class="tablerw"> No Exper./ SMEC </td> 

<td width="3%" class="tablerw"> Original CV</td>
<td width="3%" class="tablerw"> Edit</td>
<td width="3%" class="tablerw" valign="middle"> Verification <br> Status </td> 
<td width="3%" class="tablerw" valign="middle"> Created On</td> 
<td width="3%" class="tablerw" valign="middle"> Updated On</td> 
<td width="8%" class="tablerw"  valign="middle"> Class </td>
<td width="3%" class="tablerw" valign="middle"> Acknowledge-<br>ment </td> 
<td width="6%" class="tablerw"  valign="middle"> Delete</td>
<td width="6%" class="tablerw"  valign="middle"> Entered by</td>

';
}
else

if ($superadminflag == 0 and ($cvadmflag == 1 or $cventryflag==1)) {
echo ' 
<td width="3%" class="tablerw" valign="middle"> Level </td> 
<td width="3%" class="tablerw" valign="middle"> F.Group-1 </td> 
<td width="3%" class="tablerw" valign="middle"> F.Group-2 </td> 
<td width="3%" class="tablerw" valign="middle"> Current Exper./ SMEC </td> 
<td width="3%" class="tablerw" valign="middle"> Prev. Exper./ SMEC </td> 
<td width="3%" class="tablerw" valign="middle"> No Exper./ SMEC </td> 

<td width="3%" class="tablerw"> Original CV</td>
<td width="3%" class="tablerw"> Edit</td>
<td width="3%" class="tablerw" valign="middle"> Verification <br> Status </td> 
<td width="3%" class="tablerw" valign="middle"> Created On </td> 
<td width="3%" class="tablerw" valign="middle"> Updated On </td> 
<td width="8%" class="tablerw" valign="middle"> Class</td>
<td width="3%" class="tablerw" valign="middle"> Acknowledge-<br>ment</td> 
 ';

}
else {
?> 
<?php 
echo '
<td width="3%" class="tablerw" valign="middle"> Level </td> 
<td width="3%" class="tablerw" valign="middle"> F.Group-1 </td> 
<td width="3%" class="tablerw" valign="middle"> F.Group-2 </td> 
<td width="3%" class="tablerw" valign="middle"> Current Exper./ SMEC </td> 
<td width="3%" class="tablerw" valign="middle"> Prev. Exper./ SMEC </td> 
<td width="3%" class="tablerw" valign="middle"> No Exper./ SMEC </td> 

<td width="3%" class="tablerw" valign="middle"> Created On </td> 
<td width="3%" class="tablerw" valign="middle"> Updated On </td> 
 
<td width="8%" class="tablerw" valign="middle"> Class</td>  
';
}
?>	   
</tr>

	   
<?php
$objDb->query($sSQL1);
$iCount = $objDb->getCount( );
if($iCount>0)
{
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$cvId  			= $objDb->getField($i, cvId);
	$name  			= $objDb->getField($i, name);
	$position  		= $objDb->getField($i, position);
	$cposition  	= $objDb->getField($i, cposition);
	$startexpyr		= $objDb->getField($i, startexpyr);
	$citizenship  	= $objDb->getField($i, citizenship);
	$egcEmployee	= $objDb->getField($i, egcEmployee);
	$picture	  	= $objDb->getField($i, picture);
	$dboriginalcv	= $objDb->getField($i, originalcv);
	$lastupdate  	= $objDb->getField($i, lastupdate);
	$posted_date	= $objDb->getField($i, posted_date);
	$updated_on		= $objDb->getField($i, updated_on);	

	$SalaryRange	=	$objDb->getField($i, SalaryRange);
	$fgroup			=	$objDb->getField($i, fgroup);
	$fgroup2		=	$objDb->getField($i, fgroup2);
	$exp_current	=	$objDb->getField($i, exp_current);
	$exp_prev		=	$objDb->getField($i, exp_prev);
	$exp_never		=	$objDb->getField($i, exp_never);
		
	$cvStatus	  	= $objDb->getField($i, cvStatus);
	$cvVerification = $objDb->getField($i, cvVerification);
	$addinfo3		= $objDb->getField($i, addinfo3);
	$ep_name		= $objDb->getField($i, ep_name);
 
 	//$lastupdate+6;
 	
 	$pic    ="images/pics/".$dbpicture;
  	$sign	="images/signature/".$dbsignature;
  	$ocv	="images/originalcv/".$dboriginalcv;
	
	$sSQL2 = " select citizenship FROM tblcountries WHERE countryId='$citizenship' ";
	$objDb2->query($sSQL2);
 	$CountryName=$objDb2->getField(0, citizenship);


//	$sSQL3 = " select distinct(cvId) as cvId, projTitle, projDistance FROM tblemploymentrecord WHERE projDistance between '$projDistance'  and '$projDistance' ";
//	$sSQL3 = " select distinct(cvId) as cvId  FROM tblemploymentrecord WHERE projDistance between '$projDistance'  and '$projDistance' ";

//	$objDb3->query($sSQL3);
// 	$cvId=$objDb3->getField(0, cvId);

 ?>
<tr style="font-size: 12px;">

<td width="5%" align="center" style="border-bottom:1px solid #cccccc" ><?= $i+1 ?></td>
<td width="4%" align="center" style="border-bottom:1px solid #cccccc" >

<div class="mg-image"> 
  	 <?php 
/* 	$dbsignature			=	$objDb->getField(0, signature);
	$dbpicture				=	$objDb->getField(0, picture);
	//$dboriginalcv			=	$objDb->getField(0, originalcv);
	$datetime				=	$objDb->getField(0, datetime);
//	$lastupdate				=	$objDb->getField(0, lastupdate);
 
  	$pic    ="images/pics/".$picture;
  	$sign	="images/signature/".$dbsignature;
  	$ocv	="images/originalcv/".$dboriginalcv;
		
		
		*/
	 
$sSQL_p1 = " Select   folder, new_filename FROM tbldocs WHERE cvId='$cvId' AND folder='pictures'";
$objDb3->query($sSQL_p1);
//$pCount1 = $objDb3->getCount();

		$newpic1				=	$objDb3->getField(0, new_filename);
 
      	$pic	="cv_documents/".$newpic1;
									  
		$piclen = strlen($pic);
			
		if ($piclen >13) {
 		?>
        <img  src="<? echo $pic ?>" width="40" height="40" alt="Profile pic" title="Click to view upload page..."/> 
		<?php } 
	    else if ($piclen <=13) { ?>
			
		   <a href="uploadcv.php?id=<?=$cvId?>" target="_blank">
           <img src="images/noimage/no-profile-img2.gif" width="40" height="40" alt="Profile" title="Click to enter Upload Page..."/> </a>
 		<?php 
		}  

		?>  
  </div> </td>

<td style="border-bottom:1px solid #cccccc; font-size: 12px;" width="19%"  >
 
   <? 
     if ($egcEmployee=="E" ) { 
	  echo '<font color="maroon"><strong>'.strtoupper($name).'</strong></font> ' ;
	  }
	  else  if ($egcEmployee == "F")
	   {
		echo '<font color="black"><strong>'.strtoupper($name). '</strong></font> ' ;	   
		}
	   else  if ($egcEmployee == "X")
	   {
	  echo '<font color="grey">'.strtoupper($name).'</font> ' ;
	  } 
	  else
	  { echo '<font color="black">'.strtoupper($name).'</font> ' ;
	  }
    
    ?>
   
   <!-- <?
    
     if ($cvVerification=="V" ) { 
	  echo '<font color="green"><strong>'. "&#10003".'</strong></font> ' ;
	  }
	  else  if ($cvVerification == "N")
	   {
	  echo '<font color="green"><strong>'. "&#10060;".'</strong></font> ' ;
	   }
	   else  if ($cvVerification == "P")
	   {
	  echo '<font color="green"><strong>'. " &#8226;".'</strong></font> ' ;
	  } 
	  else
	  { echo '<font color="black">' .'</font> ' ;
	  }
    
    ?> -->
     
   </td>
   
<td style="border-bottom:1px solid #cccccc" width="15%" ><?=$position;?></td>
 <td style="border-bottom:1px solid #cccccc" width="8%" align="center"><?php if (($nowyear - $startexpyr) == 0) {echo '1';} else {echo ($nowyear - $startexpyr); }?>  
</td>
<td style="border-bottom:1px solid #cccccc" width="8%" ><?=$CountryName?></td>
<td width="6%" height="23" align="center" style="border-bottom:1px solid #cccccc" ><font color="#990000"> <strong><?=$cvId?> </strong></font></td>

 	   <td width="5%"   style="border-bottom:1px solid #cccccc" align="center"  >
	   <div class="row">
            <div class="col-12   ">
			  <form action="" style="width:200px"  >
			  <select   class="form-control" name="myDestination">
				  <option value="eoi-format-dl1.php?cvid=<?=$cvId?>">EOI-Download</option>
				  <option value="">--------------------</option>
				  <option value="short-eoi-format.php?cvid=<?=$cvId?>">SHORT-CV</option>
			</select>
			<div class="col-1" >
				<input type="button" value="View" class="btn btn-sm btn-primary" 
				onclick="ob=this.form.myDestination;window.open(ob.options[ob.selectedIndex].value)">
		</div>	 	
	    
			</form>
		</div>
  </td>
	
	
<td width="5%" class="mg-image" style="border-bottom:1px solid #cccccc" align="center" ><?=$SalaryRange?></td>
<td width="5%" class="mg-image" style="border-bottom:1px solid #cccccc" align="center" ><?=$fgroup?></td>
<td width="5%" class="mg-image" style="border-bottom:1px solid #cccccc" align="center" ><?=$fgroup2?></td>
<td width="5%" class="mg-image" style="border-bottom:1px solid #cccccc" align="center" ><?=$exp_current?></td>
<td width="5%" class="mg-image" style="border-bottom:1px solid #cccccc" align="center" ><?=$exp_prev?></td>
<td width="5%" class="mg-image" style="border-bottom:1px solid #cccccc" align="center" ><?=$exp_never?></td>
 
<?php if ($cvflag==0 and $cvadmflag==1 or $superadminflag==1 or $cventryflag==1) { ?>
    
	 <td width="5%" class="mg-image" style="border-bottom:1px solid #cccccc" align="center">
           <?php
		
		$sSQL_p1 = " Select   folder, new_filename FROM tbldocs WHERE cvId='$cvId' AND folder='originalcv'";
		$objDb3->query($sSQL_p1);
		//$pCount1 = $objDb3->getCount();

		$newfilename	 	=	$objDb3->getField(0, new_filename);

		$ocvfile	="cv_documents/".$newfilename;
  
	//	$piclen = strlen($ocvfile);
 	
            $filename = $ocvfile;
            if ($filename!='' ) {
            if (file_exists($filename)) {

            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

			if ($filenamelen > 18 ) { ?>	
	 
       <!--   <i class="mdi mdi-file-document" style="font-size: 35px;">  	 -->
          <a href="<? echo $filename; ?>" target="_new"> 
       <img src='images/fdoc.png' alt='Original CV' width='83' height='48'  title="Original CV" />
		 </a> 
			   
          <?php 
			} else {
			?>
         
          <img src='images/noimage/icon-cv2.png' alt='Original CV' width='33' height='28'  title="No Original CV" />
	     
          <?
				}
			}
		}
            ?>
		  </td>
        <?php } ?> 
 

<?php
if ($cvadmflag==1) {
?>
<td width="2%" align="center" style="border-bottom:1px solid #cccccc">
 	<a href="submitform.php?id=<?=$cvId?>" title="Edit CV">
		<img src="images/edit-icon.png" alt="Edit CV" width="20" height="19" />
	</a>
 	
</td>
 
    <?php  if($cvVerification =="V"){ ?> 
	<td style="border-bottom:1px solid #cccccc">
		<a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
			<i class="mdi mdi mdi-brightness-1" style="font-size: 25px;color: greenyellow;"></i></a>
	<!-- <td width="2%" align="center" style="border-bottom:1px solid #cccccc"><img src="images/tgreen.png" alt="green" title="CV Verified"  width="15" height="15"   />   -->
	<?php }  else if($cvVerification=="N"){ ?> 
	<td style="border-bottom:1px solid #cccccc">
		<a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
	<i class="mdi mdi mdi-brightness-1" style="font-size: 25px;color: red;"></i></a>
	<!-- <td width="2%" align="center" style="border-bottom:1px solid #cccccc"><img src="images/tred.png" alt="red" title="CV Not Verified..."  width="15" height="15"  />   -->
	<?php }  else if($cvVerification=="P" ){ ?> 
	<td style="border-bottom:1px solid #cccccc">
		<a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
			<i class="mdi mdi mdi-brightness-1" style="font-size: 25px;color: orange;"></i></a>
	<!-- <td width="2%" align="center" style="border-bottom:1px solid #cccccc"><img src="images/tyellow.png" alt="yellow" title="CV Pending..."  width="15" height="15"   />   -->
	<?php }  else if($cvVerification=="O" or $cvVerification=="" ){ ?> 
	<td style="border-bottom:1px solid #cccccc" ><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><i class="mdi mdi mdi-brightness-1" style="font-size: 25px;color: grey;"></i></a>
	<!-- <td width="2%" align="center" style="border-bottom:1px solid #cccccc"><img src="images/tother.png" alt="purple" title="CV - Other " width="15" height="15"    />   -->
	<?php } else { echo '<td>'.$cvVerification; ?> 
	<?php } ?>
</td>

<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small>
<?php //echo date('<b>d-m-y</b> (h:i:s)', strtotime($posted_date)); ?>


<?php if ($posted_date=='0000-00-00' ||  $posted_date=='1970-01-01' ||  $posted_date=='01-01-1970') { echo '';} else {echo date('<b>d-m-y</b>', strtotime($posted_date));}?>
</small>
</td>

<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small>
<?php if ($updated_on=='0000-00-00 00:00:00' ||  $updated_on=='1970-01-01 00:00:00') { echo '';} else {echo date('<b>d-m-y</b> (h:i:s)', strtotime($updated_on));}?>

</small></td>

<td width="14%" class="cvclass"  style="border-bottom:1px solid #cccccc " align="center"  title="A: Most Usable,
B: Less Usable
C: General
D: Balcklisted
E: Inactive/No use"> 

<?
   if ($cvStatus=="D" ) { 
	  echo '<font color="red"  ><strong>'.strtoupper($cvStatus).'</strong></font> ' ;
	  }
	  else
	  { echo '<font color="black">'.strtoupper($cvStatus).'</font> ' ;
	  }
    
    ?>





</td>
<!--<td style="border-bottom:1px solid #cccccc" width="5%"  align="center"><small><?php //echo date('<b>d-m-y</b> (h:i:s)', strtotime($lastupdate)); ?></small></td>
-->
<?php
if ($cvadmflag==1 and $superadminflag==0) {
?>
<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small>
<? if($addinfo3!="") {  ?>  <img src="images/email-icon-2.jpg" width="38" height="38" /><br /> <strong><?=$addinfo3?></strong></small>  <? } ?>
</td> 
<? } ?>

<?php
if ($superadminflag ==1) {
?>
<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small>
<? if($addinfo3!="") {  ?>  <img src="images/email-icon-2.jpg" width="38" height="38" /><br />  <strong><?=$addinfo3?></strong></small>  <? } ?>
</td> 

<td width="3%" align="center" style="border-bottom:1px solid #cccccc">
    <a href="delete-cv.php?cvid=<?=$cvId?>" onclick="return confirm_delete('Do you want to Delete CV #: <?=$cvId?> ?');" title="Delete CV" >
    <script type="text/javascript">function confirm_delete(question) {if(confirm(question)){alert("CV has been Deleted!");}else{return false;} } </script>
    <img src="images/deletebutton.png" alt="Delete record" width="23" height="25"  /></a>
</td>

<!-- <td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small>
<?php if ($updated_on=='0000-00-00 00:00:00' ||  $updated_on=='1970-01-01 00:00:00') { echo '';} else {echo date('<b>d-m-y</b> (h:i:s)', strtotime($updated_on));}?>
</small></td>
-->
<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small><?=$ep_name?></small></td> 


<?php
 }
?>
 
  <?php 
} else

if ($cventryflag==1) {

?>
   <td width="2%" align="center" style="border-bottom:1px solid #cccccc">
   <a href="submit-cv.php?id=<?=$cvId?>" title="Edit CV" ><img src="images/edit.png" alt="Edit" width="20" height="19" /></a></td>
   
<?php  if($cvVerification =="V"){ ?> 
        <td  style="border-bottom:1px solid #cccccc" width="2%"  align="center">><img src="images/tgreen.png" alt="green" title="CV Verified"  width="15" height="15"   />  
<?php }  else if($cvVerification=="N"){ ?> 
        <td  style="border-bottom:1px solid #cccccc" width="2%"  align="center">><img src="images/tred.png" alt="red" title="CV Not Verified..."  width="15" height="15"  />  
<?php }  else if($cvVerification=="P" ){ ?> 
        <td  style="border-bottom:1px solid #cccccc" width="2%"  align="center">><img src="images/tyellow.png" alt="yellow" title="CV Pending..."  width="15" height="15"   />  
<?php }  else if($cvVerification=="O" or $cvVerification=="" ){ ?> 
        <td  style="border-bottom:1px solid #cccccc" width="2%"  align="center">><img src="images/tother.png" alt="purple" title="CV - Other " width="15" height="15"    />  
<?php } else { echo '<td>'.$cvVerification; ?> 
<?php } ?>



<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small>
<?php if ($posted_date=='0000-00-00' ||  $posted_date=='1970-01-01' ||  $posted_date=='01-01-1970') { echo '';} else {echo date('<b>d-m-y</b>', strtotime($posted_date));}?></small>
</td>

<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small>
<?php if ($updated_on=='01-01-1970 00:00:00' || $updated_on=='1970-01-01' || $updated_on=='01-01-1900' || $updated_on=='1900-01-01'|| $updated_on=='1900-01-00'|| $updated_on=='0000-00-00 00:00:00') { echo '';} else {echo date('<b>d-m-y</b>', strtotime($updated_on));}?></small>
</td>

<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small><?=$addinfo3?></small></td>

<!-- <td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small><?=$ep_name?></small></td> -->

<!-- <td width="14%" class="cvclass"  style="border-bottom:1px solid #cccccc " align="center"  title="A: Most Usable,
B: Less Usable
C: General
D: Balcklisted
E: Inactive/No use"><?//= $cvStatus ?></td>-->
<?

} else 

if ($cvflag==1) {
?>
<!-- 
    <td style="border-bottom:1px solid #cccccc" align="center"><img src="images/edit.gif" alt="Edit"  /></a></td>
    <td style="border-bottom:1px solid #cccccc" align="center"><img src="images/delete.gif" alt="Delete"  /></a></td> 

    <td width="8%" align="center" style="border-bottom:1px solid #cccccc">
    <a href="submit-cv.php?id=<? // =$cvId?>" title="Edit CV"  ><img src="images/edit.gif" alt="Edit"  /></a></td>
-->
<td style="border-bottom:1px solid #cccccc" width="2%"  align="center">

<small><?php //echo date('<b>d-m-y</b> (h:i:s)', strtotime($posted_date)); ?></small>

<?php if ($posted_date=='01-01-1970' || $posted_date=='1970-01-01' || $posted_date=='01-01-1900' || $posted_date=='1900-01-01'|| $posted_date=='1900-01-00'|| $posted_date=='0000-00-00') { echo '';} else {echo date('<b>d-m-y</b>', strtotime($posted_date));}?>
</small>
</td>

<td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small><?php echo date('<b>d-m-y</b> (h:i:s)', strtotime($updated_on)); ?></small></td>

<?php
}
 
else
	 {
?>
 
</tr>
<tr>
<td height="50" colspan="21" align="center" >No Record Found</td>

<?php
}
	}
}
?>
</table>
</div>
			  
 </div>
    <!-- main-panel ends --> 
  </div>
  <!-- page-body-wrapper ends --> 
</div>			    
 <? include "includes/footer.php"; ?>
      <!-- partial --> 
   
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