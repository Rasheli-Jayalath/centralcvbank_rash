<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$strusername 	= $_SESSION['uname'];
$superadminflag = $_SESSION['superadmin'];

$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
$updatedon = $date->format('Y-m-d H:i:s');

//echo $cvflag;
//echo $cvadmflag;
//echo $cventryflag;
//echo $strusername ;

if ($strusername==null )
	{
		header("Location: ../index.php?init=3");
	}
else if ($cvadmflag==0  and $cventryflag==0)
	{
		header("Location: ../index.php?init=3");
	//echo "adm".$cvadmflag;
	//echo "entry".$cventryflag;
	}

else if ($cventryflag==0)
	{
		header("Location: ../index.php?init=3");
//	echo "entry".$cventryflag;

	}
	
@require_once("requires/session.php");
@require_once("includes/saveurl.php");
	$objDb  = new Database( );
	$objDb2 = new Database( );

$cvID   = $_REQUEST['id'];

if($cvID=="")
{
header('Location: submit-cv.php');
}
$clear  = $_REQUEST['clear'];
$save   = $_REQUEST['save'];
$next   = $_REQUEST['next'];
$update = $_REQUEST['update'];
$edit    = $_REQUEST['edit'];

$txtposition			= $_REQUEST['txtposition'];
$txtfullname			= $_REQUEST['txtfullname'];
$txtpname		= $_REQUEST['txtpname'];

$txtinter		= $_REQUEST['txtinter'];
$txtstartdate		= $_REQUEST['txtstartdate'];
$txtenddate			= $_REQUEST['txtenddate'];
$txtmanmonth	= $_REQUEST['txtmanmonth'];
$txtattach			= $_REQUEST['txtattach'];
$project_status			= $_REQUEST['chkgenderRadios'];

if($clear!="")
{
$txtposition			= '';
$txtfullname		= '';
$txtpname			= '';
$txtinter		= '';
$txtstartdate		= '';
$txtenddate			= '';
$txtmanmonth	= '';
$txtattach			= '';
$project_status			= '';
}

if($next !=""){
  header ('Location: language.php?id='.$cvID);
}

if($save !=""){
		$signature = $_FILES['txtattach']['name'];
		//$ext = pathinfo($orignal_name_file, PATHINFO_EXTENSION);
		$target_path = "nomination_form/";
		  $part1=$cvID."_".$signature;
		  $picture = $part1;
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['txtattach']['tmp_name'], $target_path); 	

  $iSql = " Insert into nomination SET 
  				cvid				= '$cvID',
				position            = '$txtposition',
				full_time         = '$txtfullname',
				project_name     = '$txtpname',
                attachment		= '$picture',
				intermittent    = '$txtinter',
				start_date       = '$txtstartdate', 
				end_date        = '$txtenddate',
				man_month      = '$txtmanmonth',
				project_status ='$project_status' 
		  ";
		  
    if($objDb2->execute($iSql)){
	$tuSql = "update tblcvmain SET datetime = now(), ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);

	    $eduId ="";
	 
		$txtposition			= '';
		$txtfullname		= '';
		$txtpname			= '';
		$txtinter		= '';
		$txtstartdate		= '';
		$txtenddate			= '';
		$txtmanmonth	= '';
	}		  
}

if($update !=""){
	$orignal_name_file=$_FILES["txtattach"]["name"];
	$ext = pathinfo($orignal_name_file, PATHINFO_EXTENSION);
	
		$target_path = "nomination_form/";
	if(isset($cvID)&&$cvID!=0)
	{
	 $sSQL1 = " select * FROM nomination Where cvid= '$cvID' AND nomination_id='$edit' ";
	$objDb->query($sSQL1);
   $pCount = $objDb->getCount();
	if($pCount>0 && $orignal_name_file!='')
	{
		
	$DBpicture = $objDb->getField(0,attachment);
		
	
		if($DBpicture!='')
 		{ 
 		$DBpicture="nomination_form/".$DBpicture;
		if (file_exists($DBpicture)) 
		{ 
		@unlink($DBpicture); 
		
		}
		  $part1=$cvID."_".$orignal_name_file;
		  //$rand=rand(1,99999999);
    	  //$part2=900000000-$rand;
    	  //$file_name=$part1."_".$ext;
		  $picture=$part1;
		  $target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['txtattach']['tmp_name'], $target_path); 	
		$tpSql = "update nomination SET position='$txtposition', full_time='$txtfullname', position='$txtposition', project_name='$txtpname', intermittent='$txtinter',
		start_date='$txtstartdate', end_date='$txtenddate', man_month='$txtmanmonth', project_status='$project_status', attachment='$picture' where cvid = '$cvID' AND 
		nomination_id='$edit'";
		$objDb2->execute($tpSql);	
		}
	}
	else 
	{
		$tpSql = "update nomination SET position='$txtposition', full_time='$txtfullname', position='$txtposition', project_name='$txtpname', intermittent='$txtinter',
		start_date='$txtstartdate', end_date='$txtenddate', man_month='$txtmanmonth', project_status='$project_status' where cvid = '$cvID' AND nomination_id='$edit'";
		$objDb2->execute($tpSql);
		  }
	}

	}



if($edit !=""){
	//echo "yes";
  $eSql = "Select * from nomination where nomination_id='$edit'";
  $objDb2 ->query($eSql);
  $eCount = $objDb2->getCount();
	if($eCount > 0){
	  $cvid           = $objDb2->getField($i,cvid);
	  $db_position          = $objDb2->getField($i,position);
	  $db_fullname      = $objDb2->getField($i,full_time);
	  $db_pname     = $objDb2->getField($i,project_name);
	  $db_attach        = $objDb2->getField($i,attachment);
	  $db_inter         = $objDb2->getField($i,intermittent);
	  $db_startdate       = $objDb2->getField($i,start_date);
	  $db_enddate  = $objDb2->getField($i,end_date);
	  $db_manmonth       = $objDb2->getField($i,man_month);
	  $project_status  = $objDb2->getField($i,project_status);
	}
}

if($cvID!="")
{
	$sSQL_edit = " Select * FROM tblcvmain WHERE nomination_id='$nomination_id'";
	$objDb->query($sSQL_edit);
	
	$cvId					=	$objDb->getField(0, cvId);
	$name					=	$objDb->getField(0, name);
	$datetime				=	$objDb->getField(0, datetime);
	$lastupdate				=	$objDb->getField(0, lastupdate);
	$dbpicture				=	$objDb->getField(0, picture);
 
	$lastupdate				=	$objDb->getField(0, lastupdate);
 	$updated_on				=	$objDb->getField(0, updated_on);
 
   	$pic    ="images/pics/".$dbpicture;
  	$sign	="images/signature/".$dbsignature;
  	$ocv	="images/originalcv/".$dboriginalcv;

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
            <?php //include('includes/submenu.php') ?>

              
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
<?php //echo $uSql;
?>
                    
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                  Nomination Detail Against Projects
                  <h4>
                  <div class="table-responsive pt-1">
                    <table class="table table-bordered">
                      <thead>   
                <tr>
                  <th width="68%">Project Name</th>
                  <th width="68%">Position</th>
                  <th width="68%">Full Time</th>
                  <th width="68%">Intermittent</th>
                  <th width="68%">Man Months</th>
                  <th width="68%">Input Start Date</th>
                  <th width="68%">Input End Date</th>
                  <th width="68%">Project Status</th>
                  <th width="68%">Attachment</th>
               
                </tr>	
            <?php
					$sSQL = " select * from nomination where cvid='$cvID'";
					$objDb->query($sSQL);
					$iCount = $objDb->getCount( );
					if($iCount>0)
					{
						for ($i = 0 ; $i < $iCount; $i ++)
						{
						$nomination_id  			= $objDb->getField($i, nomination_id);
						$project_id  			= $objDb->getField($i, project_id);
						$position  		= $objDb->getField($i, position);
						$man_month  		= $objDb->getField($i, man_month);
						$full_time  		= $objDb->getField($i, full_time);
						$intermittent  			= $objDb->getField($i, intermittent);
						$start_date  		= $objDb->getField($i, start_date);
						$end_date  	= $objDb->getField($i, 	end_date);
						$attachment 				= $objDb->getField($i, 	attachment);

					$ssSQL = " select * from tbl_project where project_id='$project_id'";
					$objDb2->query($ssSQL);
					$isCount = $objDb2->getCount( );
						for ($is = 0 ; $is < $isCount; $is ++)
						{
						$project_idd  			= $objDb2->getField($is, project_id);
						$project_namee  			= $objDb2->getField($is, project_name);
						$project_statuss  			= $objDb2->getField($is, project_status);
						?>
				   <tr>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <?=$project_namee?>
				     </span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <?=$position?>
				     </span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <?=$full_time?>
				     </span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <?=$intermittent?>
				     </span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <?=$man_month?>
				     </span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <?=$start_date?>
				     </span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <?=$end_date?>
				     </span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <?=$project_statuss?>
				     </span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc">
				       <a href="nomination_form/<?php echo $attachment ?>" target="_blank" style="text-decoration:none"><?=$attachment?></a>
				     </span></td>
 	             </tr>
				   <?
					}
				} 
					}
				?>
		   </table><br clear="all" />
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
