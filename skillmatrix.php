<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
if ($strusername==null)
{
	header("Location: ../index.php?init=3");
}
$now = new DateTime();
$nowyear = $now->format("Y");


//$file="images/cv-missinginfo.docx"; //file location 
//header('Content-Type: application/octet-stream');
//header('Content-Disposition: attachment; filename="'.basename($file).'"'); 
//header('Location : cv-missinginfo.php?cvid='.$cvId);
//header('Content-Length: ' . filesize($file));
//readfile($file);
?>
<?php

@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
	
 	$cvID=$_REQUEST['id'];
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#sel_depart").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getproject_status.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_user").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];

                            $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
    </script>

 <script type="text/javascript">

  var stile = "top=100, left=150, width=1000, height=800 status=no, menubar=no, toolbar=no scrollbar=yes";
     function Popup(apri) {
        window.open(apri, "", stile);
     }
 
</script>
 
  <script>
$(".meter > span").each(function () {
  $(this)
    .data("origWidth", $(this).width())
    .width(0)
    .animate(
      {
        width: $(this).data("origWidth")
      },
      1200
    );
});

</script>
<style>
#rcornerstg {
	background:#7DB758;
	height: 100px;
	width:  100px;
	padding: 35px;
	
	border-radius: 100%;
	display: inline-block;
	margin-top: 10px;
	color: white;
	font-size: 30px;
	line-height: 100%;
	text-align: center;
	}
#rcornersage {
	background-color: #C55B11;
	height: 100px;
	width:  100px;
	padding: 13px;
	border-radius: 100%;
	display: inline-block;
 	margin-top: 10px;
	color: white;
	font-size: 15px;
	line-height: 75%;
	text-align: center;
	word-spacing: normal;
	}

#rcornersexp {
	background: #3C6EC7;
	height: 100px;
	width:  100px;
	padding: 5px;
	border-radius: 100%;
	display: inline-block;
 	margin-top: 10px;
	color: white;
	font-size: 15px;
	line-height: 75%;
	text-align: center;
	word-spacing: normal;
	}
	 
#rcornerssjprof {
	background: #1A2A5A;
	height: 100px;
	width:  100px;
	padding: 15px;
	border-radius: 100%;
	display: inline-block;
	margin-top: 00px;
	color: white;
	font-size: 15px;
	line-height: 100%;
	text-align: center;
	word-spacing: normal;
	}
	 
#rcornerscountry {
	background:#00AF50;
	height: 100px;
	width:  100px;
	padding: 10px;
	border-radius: 100%;
	display: inline-block;
	margin-top: 00px;
	color: white;
	font-size: 15px;
	line-height: 50%;
	text-align: center;
	word-spacing: normal;
	text-align-last: center;
}

#rcornerspas {
	background: #D5A603;
	height: 100px;
	width:  100px;
	padding: 10px;
	border-radius: 100%;
	display: inline-block;
	margin-top: 10px;
	color: white;
	font-size: 12px;
	line-height: 70%;
	text-align: center;
 	}
	 	 
#rcornerstech {
	background: #838383;
	height: 100px;
	width: 100px;
	padding: 18px;
	border-radius: 100%;
	display: inline-block;
 	margin-top: 10px;
	color: white;
	font-size: 12px;
	text-align: center;
	line-height:80%;
	}
	 
	 
#rcornerstg {
	background:#7DB758;
	height: 100px;
	width:  100px;
	padding: 35px;
	
	border-radius: 100%;
	display: inline-block;
	margin-top: 10px;
	color: white;
	font-size: 30px;
	line-height: 100%;
	text-align: center;
	}
#contentdash{
 width:100%;
 padding:5px;
 border:1px #fdcb10 solid;
 
}
</style>
</head>
<? 
  $sSQL1 = "SELECT * FROM skillmatdb.tblskillemployee_detail where cvid='$cvID' ";
	
	$objDb->query($sSQL1);
$iCount = $objDb->getCount( );
/* if($iCount>0)
{
	for ($i = 0 ; $i < $iCount; $i++)
	{*/
	//$i;//echo "ASDFASDF".$cvId." " .$j;
	$eid				=	$objDb->getField(0, sno);
	$cvId				=	$objDb->getField(0, cvid);
	$resource_id		=	$objDb->getField(0, resource_id);
	$emp_name			=	$objDb->getField(0, emp_name);
	$emp_designation	=	$objDb->getField(0, emp_designation);
	$date_of_joining	=	$objDb->getField(0, date_of_joining);
	$date_of_birth		=	$objDb->getField(0, date_of_birth);
	$total_exp			=	$objDb->getField(0, total_exp);
	$exp_smec			=	$objDb->getField(0, exp_smec);
	$employ_entity		=	$objDb->getField(0, employ_entity);
	$job_family			=	$objDb->getField(0, job_family);
	$PAS_2018			=	$objDb->getField(0, PAS_2018);
	$PAS_2019			=	$objDb->getField(0, PAS_2019);
	$PAS_2020			=	$objDb->getField(0, PAS_2020);
	$country			=	$objDb->getField(0, country);
	$high_qualif		=	$objDb->getField(0, high_qualif);
	$qualif_detail		=	$objDb->getField(0, qualif_detail);
	$talent_grid		=	$objDb->getField(0, talent_grid);
	$flight_risk		=	$objDb->getField(0, flight_risk);
	$mobility			=	$objDb->getField(0, mobility);
	
	$sno				=	$objDb->getField(0, sno);
	$resource_id		=	$objDb->getField(0, resource_id);
	$fgroup1				=	$objDb->getField(0, fgroup);
	$ddskillspecial1		=	$objDb->getField(0, skillspecial);
	$skilltypedesc1		=	$objDb->getField(0, skilltypedesc);
	$rating1			=	$objDb->getField(0, rating);
	 //$namee = "AbhishekSobbana";

	$searchphoto = $resource_id.".jpg";
$picemp="../skillmatrix/empphotoschang/".$resource_id.".jpg";
		
$searchedfile = file_exists($picemp) ;
 	
	/* blue color = #0A2140 */
	?>	

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
<div class="d-sm-flex align-items-center justify-content-between border-bottom">
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <?php include('includes/submenu.php') ?>

              <?php //echo $sSQL1;?>
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
<?php //echo $sSQL1;
?>
                    

	
<div style="background-color: #0A2140; height: 70px;">
	<table width="100%"  >
<tr>
  <td  >&nbsp; </td>
  <td  >&nbsp;</td>
  <td width="16%" >&nbsp;</td>
  <td width="6%" >&nbsp;</td>
  <td width="6%" >&nbsp;</td>
  <td width="6%" >&nbsp;</td>
  <td width="23%" rowspan="2" align="right"><img src="../skillmatrix/images/smec_logo_white.png" title="SMEC Logo" width="153" height="70" /></td>
</tr>
<tr>
  <td width="16%" valign="middle" bgcolor="purple">
	  <img src="../skillmatrix/images/profilestar1.png" width="48" height="37" alt="Telant Profile icon" style="vertical-align: middle"  /> 
    <span style="font-size: 20px; color: white; "> Talent Profile</span></span></td> 
	
	<td width="17%" valign="middle" bgcolor="green"> <img src="../skillmatrix/images/profilestar1.png" width="48" height="37" alt="Telant Profile icon" style="vertical-align: middle" />
<span style="font-size: 20px; color: white; "><span style="color: aliceblue">Career Path</span></span></td>
  </tr>
<tr>
  <td  >&nbsp;</td>
  <td  >&nbsp;</td>
  <td colspan="4" >&nbsp;</td>
  <td align="right">&nbsp;</td>
</tr>
		</table>
</div>

<div style="width: 100%; display: table; background: #0A2140; " >
<div style="display: table-row; height: 600px; background: #0A2140; ">
<div style="width: ; display: table-cell; background: #0A2140; "> 
	 <table width="100%" align="center" cellpadding="0" cellspacing="0" border="00" >
		<tr>
		  <td colspan="2" align="center" >&nbsp;</td>
	   </tr>
		<tr>
		  <td colspan="2" align="center" >&nbsp;</td>
	   </tr>
		<tr>
		  <td colspan="2" align="center" >&nbsp;</td>
		</tr>
		<tr>
		 <td colspan="2" align="center"><? if($searchedfile > 0){ ?>
	      <img src="<? echo $picemp?>" width="153" height="175"/></a>
	      <? } else { ?>
	      <img src="../skillmatrix/empphotos/defaultskilldash.png" width="153" height="175"/></a>
	      <? }?>
	</td>
	</tr>
	
       <tr>
	      <td colspan="2"  align="center" >&nbsp;</td>
       </tr>
       <tr>
         <td colspan="2" align="center" >&nbsp;</td>
       </tr>
       <tr>
	      
       <td colspan="2" align="center" ><span style="font-size: 18px; color: darkgoldenrod; font-weight: bolder;"><?=$emp_name?></span></td>
	</tr> 
 
	   <tr  >
	     <td colspan="2" align="center" >&nbsp;</td>
       </tr>
	   <tr  >
	     <td colspan="2" align="center" >&nbsp;</td>
       </tr>
	   <tr  >
	     <td colspan="2" align="center" ><span style="font-size: 18px; color: white; font-weight: bolder; "><?=$emp_designation?></span></td> 
       </tr>
	   <tr  >
	     <td colspan="2" align="center" >&nbsp;</td>
       </tr>
	   <tr  >
	     <td colspan="2" align="center" >&nbsp;</td>
       </tr>	   
		   
	    
	   <tr>
	  <td align="center" valign="top" bgcolor="purple"><h1> 
		  <span style="font-size: 20px; color: white;">Education</span><br />
		   </h1></td>
	  <td width="41"  >&nbsp;</td>
	  </tr>
	
	  <tr>
	    <td colspan="2" align="center" valign="top">&nbsp;</td>
       </tr>
	  <tr>
	    <td colspan="2" align="center" valign="top">&nbsp;</td>
       </tr>
	  <tr>
	  <td colspan="2" align="center" valign="top">
	  <span style="color: goldenrod; font-size: 30px">
	  <?=$high_qualif?> </span></td>
      <tr>
        <td colspan="2" align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
<td colspan="2" align="center" valign="top">
	  <span style="color: navajowhite; font-size: 15px"><?=$qualif_detail?> </span></td>		  
	</tr>
<tr>
  <td colspan="2" align="center" valign="top">&nbsp;</td>
</tr>
<tr>
  <td colspan="2" align="center" valign="top">&nbsp;</td>
</tr>
<tr>
  <td colspan="2" align="center" valign="top">&nbsp;</td>
</tr>
 <tr>
	  <td align="center" valign="top" bgcolor="purple"><h1> 
		  <span style="font-size: 20px; color: white;">Talent Grid</span><br />
		  </span></h1></td>
	  <td >&nbsp;</td>
	  </tr>
<tr>
	<td colspan="2">
	<a href="../skillmatrix/images/talentgridpic.png" title="Talent Grid" target="_blank"><img src="../skillmatrix/images/talentgridpic.png" width="136" height="111" alt="Talent Grid" style="vertical-align: middle"/>
	<span id="rcornerstg" style=""> <?=$talent_grid?></span></a>&nbsp;&nbsp;</td>
	</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>

  </table>
</div>
	

<div style="display: table-cell; background: #0A2140; width: 22%; vertical-align: top"> 
  
 <table width="95%" height="400px" align="center" bgcolor="0A2140"  cellpadding="0" cellspacing="0" border="0"; >
 
<tr>
  <td bgcolor="white" width="2px"> </td> 
	<td >&nbsp;&nbsp;&nbsp;</td>
<td>
	<div id="rcornersage">Age<hr>
	<span style="font-size: 25px"> <br />
	<?php
	//$dob='1981-10-07';
	echo $diffage = (date('Y') - date('Y',strtotime($date_of_birth)));
	//if($diffage<=30){echo "< 30";} else if($diffage>=30){echo "> 30";}
	?>
	</span></div>
  
	<div id="rcornersexp"><br />
Experience<hr>
	<span style="font-size: 25px"> <br />
		<?php // if (($nowyear - $startexpyr) == 0) {echo '1';} else {echo ($nowyear - $startexpyr); } ?>	</span>
		<span style="font-size: 25px">
	<?=$total_exp?>
	</span></div>
  
  
  <div  id="rcornersage"> with SMEC<hr><br />  
    <span style="font-size: 25px"><?=$exp_smec?>
    </span></div>
  
</td>
	
	<td bgcolor="white" width="2px"> </td><td >&nbsp;</td>
	
<td> 
  
		<div  id="rcornerscountry"> Country<hr>
	    <span style="font-size: 15px"> <br /><?=$country;?> </span></div>
		<div id="rcornerspas"> <br />
 PAS Grading<hr><br />
		<span style="font-size: 20px"> <? if ($PAS_2019="N/A"){echo $PAS_2020;} else {echo $PAS_2019.",".$PAS_2020;} ?></span></div>
	
		<div id="rcornerstech">Job Family<hr>

		<span style="font-size: 15px"> <br /><?=$job_family?></span></div>
</td>
     
    </tr>
  </table>
  <table width="85%" border="0" align="center" cellpadding="0" cellspacing="5px";    >
    <tr>
	  <td align="center" valign="top" bgcolor="purple"><h1> 
		  <span style="font-size: 20px; color: white;">Flight Risk</span><br />
		  </span></h1></td>
<tr>
	<td align="center"  ><br />
<h1> 
	 <span style="font-size: 20px; color: darkgoldenrod;"><?=$flight_risk ?></span></h1>
	<br />
<br />
<br />

	</td>
	</tr>	
	
	 </tr>	 
<tr>
	  <td align="center" valign="top" bgcolor="purple"><h1><span style="font-size: 20px; color: white;">Mobility</span></h1></td>
    </tr>
<tr>
	<td align="center"  ><br />
<h1> 
	 <span style="font-size: 20px; color: darkgoldenrod;">
	<?=$mobility ?>	
	  </span></h1>
<br />

	</td>
	</tr>
<tr>
  <td align="left"  >&nbsp;</td>
</tr>	
  </table>
</div>
<div style="display: table-row; background: #0A2140; width: ">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="5px"; style="min-height: 150px; outline: auto; outline-color: white;"  >
  <tr height="10px">
	<td  colspan="2" align="center"  bgcolor="white"  style="color: darkblue;  font-size: 12px" >
		<strong>MANAGERIAL SKILLS</strong></td>
  </tr>
<tr>
 <?
	function cutAfter($string, $len = 50, $append = '...') {
	return (strlen($string) > $len) ? 
	substr($string, 0, $len - strlen($append)) . $append : 
	$string;
	}
	
$SQLpos1 = "SELECT * FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='MANAGERIAL SKILLS'";

$objDb->query($SQLpos1);  
$iCount = $objDb->getCount( );
if($iCount>0)
{
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$oid  			= $objDb->getField($i, 0);
	$resource_id	= $objDb->getField($i, 1);
	$Country		= $objDb->getField($i, 2);
	$fgroup			= $objDb->getField($i, 3);		
	$skillspecial	= $objDb->getField($i, 4);		
	$skilltypedesc	= $objDb->getField($i, 5);
	$srating1		= $objDb->getField($i, 6);
	?>
<tr>
	<td width="66%" style="color: white; font-size: 12px; line-height: 12px; padding: 10px" > <?
	echo cutAfter($skilltypedesc, 35);?>  
	</td>
	<td width="34%">
	<meter style="background-color:red;" value="<?=$srating1;?>"  max="4" title="(<?=$srating1;?>)" ></meter>
	<span style="color: white;  "><?=$srating1;?></span>
	</td>
    </tr>

	<? 	}   
		}
	  ?>
	</tr>
		
  </table>
<br />
 

<table width="99%" border="1" bordercolor="white" align="center" cellpadding="0" cellspacing="0">
	<?
	$SQLpos1 = " SELECT rating FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='SOFT SKILLS' and skilltypedesc='Business Acumen' ";
	$objDb->query($SQLpos1);
	$iCount = $objDb->getCount( );
	$srating1	= $objDb->getField(0, 0);
	?>
<tr>
	<td colspan="6" bgcolor="white" style="color: darkblue; font-size: 12px" align="center" > <strong>SOFT SKILLS </strong></td>
</tr>
	<tr style="line-height: 20px; vertical-align: text-top">
	<td width="45%" bgcolor="#118DFF" style="color: white" align="left" ><strong>Business Acumen</strong>
		<br />
		<br />
		<br />
		<br />
		<br />
		<span style="font-size: 16px;"> &nbsp;<? echo $srating1 ?> </span>
	</td>
	<?
	$SQLpos1 = " SELECT rating FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='SOFT SKILLS' and skilltypedesc='Communication' ";
	$objDb->query($SQLpos1);
	$iCount = $objDb->getCount( );
	$srating1	= $objDb->getField(0, 0);
	?>		
    <td width="25%" bgcolor="#12239E" style="color: white"  align="center"><strong>Communication</strong>
		 	<br />
			<br />
			<br />
			<br />
			<br />
			<br />
		<span style="font-size: 16px; text-align-last: left"> &nbsp;<?=$srating1 ?> </span>
      </td>
	<?
	$SQLpos1 = " SELECT rating FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='SOFT SKILLS' and skilltypedesc='Interpersonal' ";
	$objDb->query($SQLpos1);
	$iCount = $objDb->getCount( );
	$srating1	= $objDb->getField(0, 0);
	?>			
	    <td width="30%" bgcolor="#E66C37" style="color: white"  align="left"><strong>Interpersonal </strong>
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
		<span style="font-size: 16px;"> &nbsp;<?=$srating1 ?> </span>
	  </td>
    </tr>
  
          <tr>
		<?
		$SQLpos1 = " SELECT rating FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='SOFT SKILLS' and skilltypedesc='Leadership' ";
		$objDb->query($SQLpos1);
		$iCount 	= $objDb->getCount( );
		$srating1	= $objDb->getField(0, 0);
		?>	
            <td colspan="2" bgcolor="#6B007B" style="color: white"  align="left" ><strong>Leadership</strong><br />
			<br />
			<br />
			<br />
			<br />
		<span style="font-size: 16px;"> &nbsp;<?=$srating1 ?> </span>
		</td>
		<?
		$SQLpos1 = " SELECT rating FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='SOFT SKILLS' and skilltypedesc='Problem Solving' ";
		$objDb->query($SQLpos1);
		$iCount 	= $objDb->getCount( );
		$srating1	= $objDb->getField(0, 0);
		?>	
            <td width="30%" rowspan="2"  align="left" bgcolor="#744EC2" style="color: white; vertical-align: text-top" ><strong> Problem <br />
            Solving<br />
      		<br />
			<br />
			<br />
			<br />
			<br />
			<br />			
			<br />
			<br />
			<br />
		    <span style="font-size: 16px;"> &nbsp;<?=$srating1 ?> 
		    </span>
            </strong></tr>
      <tr>
          		<?
		$SQLpos1 = " SELECT rating FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='SOFT SKILLS' and skilltypedesc='Presentation' ";
		$objDb->query($SQLpos1);
		$iCount		= $objDb->getCount( );
		$srating1	= $objDb->getField(0, 0);
		?>	
	    <td colspan="2" bgcolor="#E044A7" style="color: white"  align="left"  ><strong>Presentation<br />
   	<br />
		  <br />
		  <br />
		  <br />
	    <span style="font-size: 16px;"> &nbsp;<?=$srating1 ?> 
	    </span>
	    </strong></tr>
		</tr>
		<tr style="border-bottom:  medium;border-left: 0; border-right: 0; border-top: 0">
		 <td colspan="3"><span style="font-size: 12px; color: white; "> <strong>Skill Rating:</strong><br />
		   <strong>1</strong>-Has basic knowledge, <strong>2</strong>-Can do with support, <br />
		   <strong>3</strong>-Has knowledge and can do independently with minimum support,<br />
    <strong>4</strong>-Expert knowledge and can train others </span>  </td>         
</table>
</div>

<?   
$sqlt = mysql_query("SELECT count(*) as cnt FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='SOFTWARE PROFICIENCY' ");
$data=mysql_fetch_assoc($sqlt); 
//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';

if ($data['cnt']!=0) {
?>



 <div style="display: table-cell; background: #0A2140; width: ; "> 

  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="3px"; style="  outline: auto; outline-color: white;"  >
 <tr>
	<td  colspan="2" align="center"  bgcolor="white"  style="color: darkblue;  font-size: 12px; " >
		<strong>SOFTWARE PROFICIENCY</strong>
	 </td>
  </tr>
<tr>
 <?
  $SQLpos1 = "SELECT * FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='SOFTWARE PROFICIENCY' and rating!=0";
$objDb->query($SQLpos1);  
$iCount = $objDb->getCount( );
if($iCount>0)
{
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$oid  			= $objDb->getField($i, 0);
	$resource_id	= $objDb->getField($i, 1);
	$Country		= $objDb->getField($i, 2);
	$fgroup			= $objDb->getField($i, 3);		
	$skillspecial	= $objDb->getField($i, 4);		
	$skilltypedesc	= $objDb->getField($i, 5);
	$srating1		= $objDb->getField($i, 6);
	?>
<tr>
	<td width="67%" style="color: white; font-size: 12px; line-height: 12px; padding: 10px" > <?
	echo cutAfter($skilltypedesc, 35);?>  
	</td>
	<td width="33%">
	<meter  value="<?=$srating1;?>" low="1" high="1" optimum="1" max="4" title="(<?=$srating1;?>)" ></meter>
	<span style="color: white; "><?=$srating1;?></span>
	</td>
	<? }   }  ?>
    </tr>
 </table>
</div>

<? } else {

  
$sqlt = mysql_query("SELECT count(*) as cnt FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='PROJECT MANAGEMENT' ");
$data=mysql_fetch_assoc($sqlt); 
//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';

if ($data['cnt']!=0) {
?>



 <div style="display: table-cell; background: #0A2140; width: ; "> 

  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="3px"; style="  outline: auto; outline-color: white;"  >
 <tr>
	<td  colspan="2" align="center"  bgcolor="white"  style="color: darkblue;  font-size: 12px; " >
		<strong>PROJECT MANAGEMENT</strong>
	 </td>
  </tr>
<tr>
 <?
  $SQLpos1 = "SELECT * FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='PROJECT MANAGEMENT' and rating!=0";
$objDb->query($SQLpos1);  
$iCount = $objDb->getCount( );
if($iCount>0)
{
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$oid  			= $objDb->getField($i, 0);
	$resource_id	= $objDb->getField($i, 1);
	$Country		= $objDb->getField($i, 2);
	$fgroup			= $objDb->getField($i, 3);		
	$skillspecial	= $objDb->getField($i, 4);		
	$skilltypedesc	= $objDb->getField($i, 5);
	$srating1		= $objDb->getField($i, 6);
	?>
<tr>
	<td width="67%" style="color: white; font-size: 12px; line-height: 12px; padding: 10px" > <?
	echo cutAfter($skilltypedesc, 35);?>  
	</td>
	<td width="33%">
	<meter  value="<?=$srating1;?>" low="1" high="1" optimum="1" max="4" title="(<?=$srating1;?>)" ></meter>
	<span style="color: white; "><?=$srating1;?></span>
	</td>
	<? }   }  ?>
    </tr>
 </table>
</div>	
<?php }
	
} ?>


<?   
$sqlt = mysql_query("SELECT count(*) as cnt FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='technical skills' and rating!=0");
$data=mysql_fetch_assoc($sqlt); 
//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';

if ($data['cnt']!=0) {
?>

<div style="display: table-cell; background: #0A2140; "> 
 		
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="5px"; style="min-height: 350px; outline: auto; outline-color: white;"  >
	<tr>
 	<td   colspan="2" align="center"  bgcolor="white" style="color: darkblue; font-size: 12px" > 
	 <strong>TECHNICAL SKILLS</strong></td>
 </tr>

 <?
$SQLpos1 = "SELECT * FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='technical skills' and rating!=0";
$objDb->query($SQLpos1);  

$iCount = $objDb->getCount( );
if($iCount>0)
{
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$oid  			= $objDb->getField($i, 0);
	$resource_id	= $objDb->getField($i, 1);
	$Country		= $objDb->getField($i, 2);
	$fgroup			= $objDb->getField($i, 3);		
	$skillspecial	= $objDb->getField($i, 4);		
	$skilltypedesc	= $objDb->getField($i, 5);
	$srating1		= $objDb->getField($i, 6);
	?>
<tr>
	<td width="67%" style="color: white; font-size: 12px; line-height: 12px; padding: 5px" > <?
	echo cutAfter($skilltypedesc, 35);?>  
	</td>
	<td width="33%">
	  <meter  value="<?=$srating1;?>" low="1" high="1" optimum="1" max="4" title="(<?=$srating1;?>)" ></meter>
	  <span style="color: white; "><?=$srating1;?></span>
	  </td>
  </tr>	
	  <? }   } ?> 
	  
	   </table>
	  
	  <? } else {
   
$sqlt = mysql_query("SELECT count(*) as cnt FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='BUSINESS DEVELOPMENT' and rating!=0");
$data=mysql_fetch_assoc($sqlt); 
//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';

if ($data['cnt']!=0) {
?>

<div style="display: table-cell; background: #0A2140; "> 
 		
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="5px"; style="min-height: 350px; outline: auto; outline-color: white;"  >
	<tr>
 	<td   colspan="2" align="center"  bgcolor="white" style="color: darkblue; font-size: 12px" > 
	 <strong>BUSINESS DEVELOPMENT</strong></td>
 </tr>

 <?
$SQLpos1 = "SELECT * FROM skillmatdb.tblskilldata where resource_id='$resource_id' and skillspecial='BUSINESS DEVELOPMENT' and rating!=0";
$objDb->query($SQLpos1);  

$iCount = $objDb->getCount( );
if($iCount>0)
{
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$oid  			= $objDb->getField($i, 0);
	$resource_id	= $objDb->getField($i, 1);
	$Country		= $objDb->getField($i, 2);
	$fgroup			= $objDb->getField($i, 3);		
	$skillspecial	= $objDb->getField($i, 4);		
	$skilltypedesc	= $objDb->getField($i, 5);
	$srating1		= $objDb->getField($i, 6);
	?>
<tr>
	<td width="67%" style="color: white; font-size: 12px; line-height: 12px; padding: 5px" > <?
	echo cutAfter($skilltypedesc, 35);?>  
	</td>
	<td width="33%">
	  <meter  value="<?=$srating1;?>" low="1" high="1" optimum="1" max="4" title="(<?=$srating1;?>)" ></meter>
	  <span style="color: white; "><?=$srating1;?></span>
	  </td>
  </tr>	
	  <? }   } ?> 
	  
	   </table><br clear="all" />
	
	<?php }
	
}
	?>
      </div>
      </div>
      </div>
	  
      
      <!-- content-wrapper ends --> 
      <!-- partial:partials/_footer.html -->
      

      <!-- partial --> 
    </div>
    <!-- main-panel ends --> 
  </div>
      <? include "includes/footer.php"; ?>
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
