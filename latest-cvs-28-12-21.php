<?php
error_reporting(E_ALL & ~E_NOTICE);

session_start();

$strusername = $_SESSION['uname'];


$url_detail = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

// if ($strusername==null  ) 
// {
// 	header("Location: index.php?init=3");
// }

$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];
$now = new DateTime();
$nowyear = $now->format("Y");

//echo $cvflag."cvflag<br>" ;
//echo $cvadmflag."adm<br>" ;
//echo $cventryflag."entry" ;


// if ($cvflag==0)
// {
// 	header("Location: index.php");
// }

?>
<?php


@require_once("requires/session.php");

	$objDb  = new Database();
	$objDb2 = new Database();
	$objDb3 = new Database();

  $view					=	$_REQUEST['v'];
  $ccountry				=	$_REQUEST['ccc'];

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


  $BD  = $_SESSION['BD'];
$PK  = $_SESSION['PK'];
$IN = $_SESSION['IND'];
$SL  = $_SESSION['SL'];
$AF  = $_SESSION['AF'];
$KZ  = $_SESSION['KZ'];
$NP  = $_SESSION['NP'];
$ALLC = $_SESSION['ALLC'];

if($BD==1){ 
$countrycode = 'BD'; 
}
else if ($PK==1){ 
$countrycode = 'PK'; 
}
else if ($IN==1){ 
$countrycode = 'IN'; 
}
else if ($SL==1){ 
$countrycode = 'SL'; 
}
else if ($AF==1){ 
$countrycode = 'AF'; 
}
else if ($KZ==1){ 
$countrycode = 'KZ'; 
}
else if ($NP==1){ 
$countrycode = 'NP'; 
}
else if ($ALLC==1){ 
$countrycode = 'ALLC'; 
}


  if ($countrycode==$ccountry)
{	$ccc = $ccountry; }
else 
{	$ccc = "invalid"; }

 	


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





if($view=='99allcv')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee, originalcv, startexpyr, picture, posted_date, updated_on,cvStatus, cvVerification, addinfo3, ep_name, edited_by,referece FROM tblcvmain order by cvId desc ";
}

else if($view=='latestc' and $ccc)
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
 $sSQL1 = "select * FROM tblcvmain where ep_name like '$ccc%' order by cvId  ";
}

else if($view=='latest')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select * FROM tblcvmain order by cvId desc limit 0,19 ";
}

else if($view=='modifi' and $ccc)
{
	
	//SELECT cvId, name, datetime, posted_date, lastupdate,updated_on FROM tblcvmain WHERE updated_on >= CURDATE();
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture,originalcv, posted_date, updated_on, cvStatus, cvVerification, addinfo3, ep_name, edited_by,referece FROM tblcvmain 
where ep_name like'$ccc%' order by updated_on desc limit 0,25  ";
}

else if($view=='modif')
{
	
	//SELECT cvId, name, datetime, posted_date, lastupdate,updated_on FROM tblcvmain WHERE updated_on >= CURDATE();
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture,originalcv, posted_date, updated_on, cvStatus, cvVerification, addinfo3, ep_name, edited_by,referece FROM tblcvmain order by updated_on desc limit 0,25  ";
  
}else if($view=='modiftod')
{
//SELECT cvId, name, datetime, posted_date, lastupdate,updated_on FROM tblcvmain WHERE updated_on >= CURDATE();
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture,originalcv, posted_date, updated_on, cvStatus, cvVerification, addinfo3, ep_name, edited_by,referece FROM tblcvmain WHERE updated_on >= CURDATE() ";
}

else if($view=='tod')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position,citizenship,sjEmp, egcEmployee,startexpyr,picture,originalcv, cvStatus, cvVerification, addinfo3, ep_name, edited_by , posted_date, updated_on,referece FROM tblcvmain WHERE posted_date = CURDATE() ";
}
else if($view=='months')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT YEAR(posted_date), DATE_FORMAT(posted_date, '%M') as 'Month', COUNT(*) from tblcvmain GROUP BY YEAR(posted_date), MONTH(posted_date) ORDER BY YEAR(posted_date) desc, month(posted_date) DESC";
}

else if($view=='vdate')
{
	//v=vd&vd=2017-04-24;
//$viewdt					=	$_REQUEST['vd'];
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " SELECT cvId,name,position,citizenship,sjEmp, egcEmployee,startexpyr,picture,originalcv, posted_date, cvStatus, cvVerification, posted_date, updated_on, addinfo3, ep_name, edited_by,referece FROM tblcvmain WHERE posted_date = '$viewdt' order by posted_date asc, cvId desc ";
}


else if($view=='foreign')
{

//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture, originalcv, cvStatus, cvVerification, addinfo3, ep_name, edited_by , posted_date, updated_on,referece FROM tblcvmain WHERE citizenship !='162' order by posted_date desc limit 0,100 ";
}

else if($view=='egcemp')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by, referece FROM tblcvmain  where egcEmployee='E' order by cvId desc";
}
else if($view=='freel')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by,referece FROM tblcvmain  where egcEmployee='F' order by cvId asc";
}
else if($view=='exemp')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship,egcEmployee,startexpyr,picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by,referece FROM tblcvmain  where egcEmployee='X' order by cvId asc";
}
else if($view=='oth')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by,referece FROM tblcvmain  where egcEmployee='O' order by cvId asc";
}
else if($view=='sje')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by,referece FROM tblcvmain  where sjEmp='Y' order by cvId asc";
}
else if($view=='verif')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture, originalcv, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by,referece FROM tblcvmain  where cvVerification='V' order by cvId asc";
}
else if($view=='nverif')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture, originalcv, lastupdate,cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by, referece FROM tblcvmain  where cvVerification='N' order by cvId asc";
}

else if($view=='pend')
{
//$sSQL1 = " select cvId, name,position,citizenship FROM tblcvmain order by cvId desc limit 0,50   ";
$sSQL1 = " select cvId,name,position,citizenship, sjEmp, egcEmployee,startexpyr,picture, originalcv, lastupdate,cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by,referece FROM tblcvmain  where cvVerification='P' order by cvId asc";
}

else
{
 $sSQL1 = " select cvId, name,position,citizenship, sjEmp, egcEmployee,startexpyr, picture,originalcv, lastupdate, cvStatus, cvVerification, addinfo3, posted_date, updated_on, ep_name, edited_by,referece, SalaryRange FROM tblcvmain WHERE $sCondition order by cvId desc";
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
{
  padding: 10px;
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

                        <div class="card container-fluid" style="margin-top: 15px;" >
                        <div class="card-body" style="padding: 10px;">
                            <table style="border-radius:20px;">
                            <thead>
                              <tr style="text-align: center;font-size: 14px;font-weight: bolder;background-color: #c0c0c0; border-bottom:1px solid #d9d9d9;; ">
                                <th  style="width: 2%;padding: 10px;border-right: 1px solid #fff;">Sr. No</th>
                                <th style="width: 3%;" class="tablerw">Photo</th>
                                <th style="width: 10%;" class="tablerw">Person Name</th>
                                <th style="width: 12%;" class="tablerw">Proposed Position</th>
                                <th style="width: 3%;" class="tablerw">Total Exper.</th>
                                <th style="width: 5%;" class="tablerw">Nationality</th>
                                <th style="width: 3%;" class="tablerw">CV ID</th>
                                <th style="width: 33%;" class="tablerw">CV Templates</th>
                                <th style="width: 2%;" class="tablerw">Original CV</th>
                                <th style="width: 2%;" class="tablerw">Edit</th>
                                <th style="width: 3%;" class="tablerw">Verification Status</th>
                                <th style="width: 10%;" class="tablerw">Entered On</th>
                                <th style="width: 5%;" class="tablerw">Updated On</th>
                                <th style="width: 3%;" class="tablerw">Acknowledgement</th>
                                <th style="width: 5%;" class="tablerw">Entered by</th>
                                <th style="width: 5%;" class="tablerw">Edited by</th>
                                <th style="width: 3%;padding: 10px;padding-left: 5px;">Referenced by</th>
                              </tr>
                              </thead>
                              <tbody>


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
                                  $startexpyr		= $objDb->getField($i, startexpyr);
                                  $citizenship  	= $objDb->getField($i, citizenship);
                                  $egcEmployee	= $objDb->getField($i, egcEmployee);
                                  $picture	  	= $objDb->getField($i, picture);
                                  $dboriginalcv	= $objDb->getField($i, originalcv);
                                  $lastupdate  	= $objDb->getField($i, lastupdate);
                                  $posted_date	= $objDb->getField($i, posted_date);
                                  $updated_on		= $objDb->getField($i, updated_on);	
                                  $cvStatus	  	= $objDb->getField($i, cvStatus);
                                  $cvVerification = $objDb->getField($i, cvVerification);
                                  $addinfo3		= $objDb->getField($i, addinfo3);
                                  $ep_name		= $objDb->getField($i, ep_name);
                                  $edited_by		= $objDb->getField($i, edited_by);
                                  $referece		= $objDb->getField($i, referece);


                                  $sSQL2 = " select citizenship FROM tblcountries WHERE countryId='$citizenship' ";
                                    $objDb2->query($sSQL2);
                                    $CountryName=$objDb2->getField(0, citizenship);
                                  
  
   
	  		
                              ?>

                              <tr style="font-size: 14px; border-bottom:1px solid #d9d9d9">
                               <td style="text-align: center;"><?php echo $i+1 ?></td>

                               <td class="tablerwdata">
                                <?php 
                               /*       $dbsignature			=	$objDb->getField(0, signature);
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
                                        if ($cvflag==1  ){
     
								   ?>
						<img style="width: 40px;" class="rounded-circle" src="<? echo $pic; ?> " width="40" height="40" alt="Profile pic kk" title="Click to view upload page..."/> 
                                        <?php } else {
                                        ?>	
                                            <a href="uploadcv.php?id=<?=$cvId?>" target="_blank"> 
                                            <img style="width: 40px;" class="rounded-circle" src="images/noimage/884442_125.jpg" width="40" height="40" alt="Profile"  title="Click to enter Upload Page..."/> </a>
                                            <?php 
                                          }
                                        } 
                                        elseif ($pic=="" or $piclen <= '12' ) {
                                          if ($cvflag==1 and $cvadmflag==0 and $cventryflag==0){
                                          ?>
                                          <img style="width: 50px;" class="rounded-circle" src="<? echo $pic ?>"  alt="Profile" title="Click to enter Upload Page..."/> 
                                          
                                                <?php } else { ?>
                                          
                                          <a href="uploadcv.php?id=<?=$cvId?>" target="_blank">
                                              <img style="width: 50px;" class="rounded-circle" src="images/noimage/no-profile-img2.gif"  alt="Profile" title="Click to enter Upload Page..."/> </a>
                                        <?php 
                                        }
                                          }
                                        ?>  
                               <!-- <img style="width: 50px;" class="rounded-circle" src="images/faces/face8.jpg" /> -->
                              </td>

                               <td class="tablerwdata"><?php echo $name ?></td>
                               <td class="tablerwdata"><?php echo $position ?></td>
                               <td class="tablerwdata"><?php if (($nowyear - $startexpyr) == 0) {echo '1';} else {echo ($nowyear - $startexpyr); }?></td>
                               <td class="tablerwdata"><?php echo $CountryName ?></td>
                               <td class="tablerwdata"><?php echo $cvId ?></td>
                               <td class="tablerwdata">
                               <div class="row">
                                 <div class="col-9">
                                      <form action="">
                                      <select style="color:#000;" class="form-control form-control-sm" name="myDestination">
                                      <option value="eoi-format-dl1.php?cvid=<?=$cvId?>">EOI-Download</option>
                                   <!--   <option value="eoi-format.php?cvid=<?=$cvId?>">EOI-1</option>
                                      <option value="format-eoi2.php?cvid=<?=$cvId?>">EOI-2</option>
                                      <option value="adb-format-1.php?cvid=<?=$cvId?>">ADB-1</option>
                                      <option value="adb-format-2.php?cvid=<?=$cvId?>">ADB-2</option>  
                                      <option value="adb-format-3.php?cvid=<?=$cvId?>">ADB-3</option>  

                                      <option value="adb-format-5.php?cvid=<?=$cvId?>">ADB-5</option>  
                                      <option value="adb-format-6.php?cvid=<?=$cvId?>">ADB-6</option> 
                                  <!--    <option value="adb-format-7.php?cvid=<?=$cvId?>">ADB-7</option>  -->
                                   <!--   <option value="adb-format-8.php?cvid=<?=$cvId?>">ADB-8</option> 
                                      <option value="format-eoi2.php?cvid=<?=$cvId?>">--------------------</option>    
                                      <option value="cv-missinginfo.php?cvid=<?=$cvId?>">Missing Info</option>
                                      <option value="format-eoi2.php?cvid=<?=$cvId?>">--------------------</option>    
                                      
                                  <!-- <option value="adb-format-3.php?cvid=<?=$cvId?>">ADB Format-3</option> -->
                                    <!--   <option value="adb-format-4.php?cvid=<?=$cvId?>">Proposal</option>
                                      <option value="nha-gis-cv-format1.php?cvid=<?=$cvId?>">NHA/GIS</option>
                                      <option value="adb-3-2015.php?cvid=<?=$cvId?>">ADB 3-2015</option>
                                  <!--    <option value="adb-41-2015.php?cvid=<?=$cvId?>">ADB 41-2015</option>
                                      <option value="adb-42-2015.php?cvid=<?=$cvId?>">ADB 42-2015</option>e
                                      <option value="adb-43-2015.php?cvid=<?=$cvId?>">ADB 43-2015</option> -->
                                      <option value="format-eoi2.php?cvid=<?=$cvId?>">--------------------</option>    
                                  <!--     <option value="adb8-2014a.php?cvid=<?=$cvId?>">ADB 2014</option>
                                      <option value="adb3-2013.php?cvid=<?=$cvId?>">ADB 2013</option>

                                  <!-- <option value="eoi-format-format.php?cvid=<?=$cvId?>">World Bank</option> -->
                                      <option value="short-eoi-format.php?cvid=<?=$cvId?>">SHORT-CV</option>
                                  <!--    <option value="adb2-format.php?cvid=<?=$cvId?>">ADB 2012</option>
                                      <option value="wb-format.php?cvid=<?=$cvId?>">WB 2012</option>
                                      <option value="scip3a-format.php?cvid=<?=$cvId?>">SCIP3-1</option> -->
                                      <option value="">--------------------</option>
                                  <!--     <option value="adb-45-2015-og.php?cvid=<?=$cvId?>">OG-ADB45-15</option> 
                                      <option value="eoi-format-og.php?cvid=<?=$cvId?>">SMEC-OG</option> -->
                                      </select>
                                      </div>
                                           <div class="col-1">
                                              <button style="margin-left: -25px;" class="btn btn-sm btn-primary" onclick="ob=this.form.myDestination;window.open(ob.options[ob.selectedIndex].value)" formtarget="_blank">View</button>
                                          </div>  
                                      </form>
                                    </div>
                              </td>
                               <td class="tablerwdata"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Original CV"><i class="mdi mdi-file-document" style="font-size: 25px;"></i></a></td>
                               <td class="tablerwdata"><a class="nav-link" href="submitform.php?id=<?=$cvId ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit CV"><i class="mdi mdi-table-edit" style="font-size: 25px;"></i></a></td>
                              
                               <?php  if($cvVerification =="V"){ ?> 
                                      <td class="tablerwdata"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><i class="mdi mdi mdi-brightness-1" style="font-size: 25px;color: greenyellow;"></i></a>
                                      <!-- <td width="2%" align="center" style="border-bottom:1px solid #cccccc"><img src="images/tgreen.png" alt="green" title="CV Verified"  width="15" height="15"   />   -->
                              <?php }  else if($cvVerification=="N"){ ?> 
                                <td class="tablerwdata"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><i class="mdi mdi mdi-brightness-1" style="font-size: 25px;color: red;"></i></a>
                                      <!-- <td width="2%" align="center" style="border-bottom:1px solid #cccccc"><img src="images/tred.png" alt="red" title="CV Not Verified..."  width="15" height="15"  />   -->
                              <?php }  else if($cvVerification=="P" ){ ?> 
                                <td class="tablerwdata"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><i class="mdi mdi mdi-brightness-1" style="font-size: 25px;color: orange;"></i></a>
                                      <!-- <td width="2%" align="center" style="border-bottom:1px solid #cccccc"><img src="images/tyellow.png" alt="yellow" title="CV Pending..."  width="15" height="15"   />   -->
                              <?php }  else if($cvVerification=="O" or $cvVerification=="" ){ ?> 
                                <td class="tablerwdata"><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><i class="mdi mdi mdi-brightness-1" style="font-size: 25px;color: grey;"></i></a>
                                      <!-- <td width="2%" align="center" style="border-bottom:1px solid #cccccc"><img src="images/tother.png" alt="purple" title="CV - Other " width="15" height="15"    />   -->
                              <?php } else { echo '<td>'.$cvVerification; ?> 
                              <?php } ?>
                              </td>
                              
                              
                              <td class="tablerwdata">
                              <?php if ($posted_date=='0000-00-00' ||  $posted_date=='1970-01-01' ||  $posted_date=='01-01-1970') { echo '';} else {echo date('<b>d-m-y</b>', strtotime($posted_date));}?>
                               </td>

                               <td class="tablerwdata">
                               <?php if ($updated_on=='0000-00-00 00:00:00' ||  $updated_on=='1970-01-01 00:00:00') { echo '';} else {echo date('<b>d-m-y</b> (h:i:s)', strtotime($updated_on));}?>
                               </td>

                               <td style="text-align: center;" class="tablerwdata"><? if($addinfo3!="") { ?>
                                <i class="mdi mdi-email-open-outline" style="font-size: 25px;color: grey;"></i><br /> <strong><?=$addinfo3?></strong></small></td>
                                <? } ?>     

                               <td class="tablerwdata"><?=$ep_name?></td>
                               <td class="tablerwdata"><?=$edited_by?>
                              
                               <?
                                    $sql = mysql_query("SELECT edited_by as editedby FROM tblcvmain where cvId = '$cvID'  limit 1");
                                    echo $data=mysql_fetch_assoc($sql); 
                                    echo $editedperson = $data['editedby'];
                                ?>
                              
                              </td>
                               <td class="tablerwdata"><?=$referece?></td>
                              </tr>


                              <?php
                                  }
                                }
                                ?>
 
                              </tbody>
                            
                            </table>
                            </div>
                            </div>




          <!-- CONTENT ENDS -->
          <!-- CONTENT ENDS -->
          <!-- CONTENT ENDS -->
          <!-- CONTENT ENDS -->
          <!-- CONTENT ENDS -->

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

<?php
	$objDb  -> close( );
	$objDb2 -> close( );
	$objDb3 -> close( );	
?>