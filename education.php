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

	$objDb  = new Database( );
	$objDb2 = new Database( );

$cvID   = $_REQUEST['id'];

if($cvID=="")
{
header('Location: submitform.php');
}
$clear  = $_REQUEST['clear'];
$save   = $_REQUEST['save'];
$next   = $_REQUEST['next'];
$update = $_REQUEST['update'];
$edit    = $_REQUEST['edit'];

$txtDate			= $_REQUEST['txtDate'];
$txtDtitle			= $_REQUEST['txtDtitle'];
$db_ediscipline		= $_REQUEST['db_ediscipline'];

$txtInstitute		= $_REQUEST['txtInstitute'];
$txtLocation		= $_REQUEST['txtLocation'];
$txtCountry			= $_REQUEST['txtCountry'];
$txtSpecialization	= $_REQUEST['txtSpecialization'];

if($clear!="")
{
$txtDate			= '';
$db_ediscipline		= '';
$txtDtitle			= '';
$txtInstitute		= '';
$txtLocation		= '';
$txtCountry			= '';
$txtSpecialization	= '';
}

if($next !=""){
  header ('Location: language.php?id='.$cvID);
}

if($save !=""){
  $iSql = " Insert into tbleducation SET 
				cvId            = '$cvID',
				eduYear         = '$txtDate',
				ediscipline     = '$db_ediscipline',
                
				eDegreeTitle    = '$txtDtitle',
				eLocation       = '$txtLocation', 
				eCountry        = '$txtCountry',
				eInstitute      = '$txtInstitute',
				eSpecialization ='$txtSpecialization' 
		  ";
		  
    if($objDb2->execute($iSql)){
	$tuSql = "update tblcvmain SET datetime = now(), ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);

	    $eduId ="";
	 
		$txtDate			= '';
		$db_ediscipline		= '';
		$txtDtitle			= '';
		$txtInstitute		= '';
		$txtLocation		= '';
		$txtCountry			= '';
		$txtSpecialization	= '';
	}		  
}

if($update !=""){
 $uSql = "Update tbleducation SET 
			 cvId            = '$cvID',
			 eduYear         = '$txtDate',
			 ediscipline     = '$db_ediscipline',
			 eDegreeTitle    = '$txtDtitle',
			 eLocation       = '$txtLocation', 
			 eCountry        = '$txtCountry',
			 eInstitute      = '$txtInstitute',
			 eSpecialization ='$txtSpecialization' 
			 
			where eduId = '$edit' 
		  ";
//echo $uSql;
    
  if($objDb2->execute($uSql)){
$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);

        $eduId ="";
		$txtDate			= '';
		$txtDtitle			= '';
		$db_ediscipline		= '';
        $txtInstitute		= '';
		$txtLocation		= '';
		$txtCountry			= '';
		$txtSpecialization	= '';
	}		  

}

if($edit !=""){
  $eSql = "Select * from tbleducation where eduId='$edit'";
  $objDb2 ->query($eSql);
  $eCount = $objDb2->getCount();
	if($eCount > 0){
	  $db_eduId            = $objDb2->getField($i,eduId);
	  $db_eduYear          = $objDb2->getField($i,eduYear);
	  $db_ediscipline      = $objDb2->getField($i,ediscipline);
	  $db_eDegreeTitle     = $objDb2->getField($i,eDegreeTitle);
	  $db_eLocation        = $objDb2->getField($i,eLocation);
	  $db_eCountry         = $objDb2->getField($i,eCountry);
	  $db_eInstitute       = $objDb2->getField($i,eInstitute);
	  $db_eSpecialization  = $objDb2->getField($i,eSpecialization);
	}
}

if($cvID!="")
{
	$sSQL_edit = " Select * FROM tblcvmain WHERE cvId='$cvID'";
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
                <h3 class="card-title">Education Record </h3>
                <p class="card-description"> Please provide the Company Detail here: Id#
                  <?=$cvId;?>
                </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Passing Year:</label>
                      <div class="col-sm-9">
                          <input type="text" value="<?= $txtDate !="" ? $txtDate : $db_eduYear ?>" name="txtDate"   maxlength="4" class="form-control" /> <span style="font-size:12px;">(YYYY)</span>
                           
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Educational Discipline </label>
                      <div class="col-sm-9">
					 	<select name="db_ediscipline" class="form-control" >
							<option value="" selected="selected">--- Select One ---</option>
							<?php
							$sSQLs1 = " SELECT srno, discipline FROM tbleducation_cat ORDER BY srno asc ";
							$objDb->query($sSQLs1);

							$iCount = $objDb->getCount( );
							for ($i = 0; $i < $iCount; $i ++)
							{
							$srno 			= $objDb->getField($i, 0);
							$discipline1    = $objDb->getField($i, 1);
							?>
							<option value="<?=$discipline1?>" <?php if($db_ediscipline==$discipline1) echo 'selected="selected"'; ?> >
							<?=$discipline1?>
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
                      <label class="col-sm-3 col-form-label">*Degree Title: </label>
                      <div class="col-sm-9">
                        <input type="text" value="<?= $txtDtitle !="" ? $txtDtitle : $db_eDegreeTitle ?>" name="txtDtitle" class="form-control"  />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">*Institute:</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?= $txtInstitute !="" ? $txtInstitute : $db_eInstitute ?>" name="txtInstitute"  class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Location:</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?= $txtLocation !="" ? $txtLocation : $db_eLocation ?>" name="txtLocation" class="form-control"  />
                      </div>
                    </div>
                  </div>
               
                    
                        <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">*Country:</label>
                      <div class="col-sm-9">
                        <select name="txtCountry" class="form-control" >
                          <option value="" selected="selected">Country</option>
                          <?
							$sSQL = "SELECT countryId, name FROM tblcountries ORDER BY name";
							$objDb->query($sSQL);
							
							$iCount = $objDb->getCount( );
							
							for ($i = 0; $i < $iCount; $i ++)
							{
							$iId   = $objDb->getField($i, 0);
							$sName = $objDb->getField($i, 1);
							?>
                          <option value="<?= $iId ?>"<? if($iId == $db_eCountry  || $iId==$txtCountry) echo " selected"; ?>>
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
                      <label class="col-sm-3 col-form-label">Specialization:</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?= $txtSpecialization !="" ? $txtSpecialization : $db_eSpecialization ?>" name="txtSpecialization" class="form-control"  />
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
                </div>
                           
           
                <!--   <button type="submit" class="btn btn-primary me-2" style="width:200px">Submit</button>
              <button class="btn btn-light">Cancel</button> -->
                <div   align="center">
                <?php
                if ( $edit != "" ) {
                  ?>
                <input type="submit" value="Update" name="update" class="btn btn-primary me-3" style="color: white;" onclick="return firminfo(this);" />
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
                <input type="submit" value="Clear" name="clear"  class="btn btn-primary me-3" style="color: white;"  />
                <br />
                <br />
              </form>
   
                    
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                  Education Detail
                  <h4>
                  <div class="table-responsive pt-1">
                    <table class="table table-bordered">
                      <thead>   
                <tr>
                  <th width="68%">End Year</th>
                  <th width="68%">Discipline</th>
                  <th width="68%">Degree Title</th>
                  <th width="68%">Institute</th>
                  <th width="68%">Location</th>
                  <th width="68%">Country</th>
                  <th width="68%">Specialization</th>
               
                    <th width="18%" align="center"> Edit  </th>
                    <th width="18%" align="center" > Delete  </th>
                </tr>	
            <?
					$sSQL = " select * from tbleducation where cvId='$cvID'";
					$objDb->query($sSQL);
					$iCount = $objDb->getCount( );
					if($iCount>0)
					{
						for ($i = 0 ; $i < $iCount; $i ++)
						{
						$eduYear  			= $objDb->getField($i, eduYear);
						$ediscipline  		= $objDb->getField($i, ediscipline);
						$eDegreeTitle  		= $objDb->getField($i, eDegreeTitle);
						$eLocation  		= $objDb->getField($i, eLocation);
						$eCountry  			= $objDb->getField($i, eCountry);
						$eInstitute  		= $objDb->getField($i, eInstitute);
						$eSpecialization  	= $objDb->getField($i, eSpecialization);
						$eduId 				= $objDb->getField($i, eduId);
						
						$sSQL2 = " select name FROM tblcountries WHERE countryId='$eCountry' ";
						$objDb2->query($sSQL2);
						$CountryName=$objDb2->getField(0, name);	
						?>
				   <tr>
				     <td  ><span style="border-bottom:1px solid #cccccc"><?=$eduYear?></span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc"><?=$ediscipline?></span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc"><?=$eDegreeTitle?></span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc"><?=$eInstitute?></span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc"><?=$eLocation?></span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc"><?=$CountryName?></span></td>
				     <td  ><span style="border-bottom:1px solid #cccccc"><?=$eSpecialization?></span></td>
                        <td style="border-bottom:1px solid #cccccc" align="center" >&nbsp; 
                          <a href="education.php?id=<?=$cvID?>&edit=<?=$eduId?>" title="Edit" ><img src="images/edit-icon.png" width="30" height="30" /></a>
                        </td>
                        <td style="border-bottom:1px solid #cccccc" width="14%" align="center">&nbsp; <a href="delete-edu.php?id=<?=$cvID?>&delete=<?=$eduId?>" onClick="javascript: confirm('Do you really want to delete this record?');" title="Delete record"><img src="images/deletebutton.png" alt="Delete" width="20" height="20"  /></a>
 	             </tr>
				   <?
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
