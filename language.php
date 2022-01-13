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
	
?>
<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );

   
	$cvID = $_REQUEST['id'];
	
	$edit = $_REQUEST['edit'];
if($cvID=="")
{
header('Location: submit-cv.php');
}	

$update  = $_REQUEST['update'];
$save    = $_REQUEST['save'];
$next    = $_REQUEST['next'];
$clear   = $_REQUEST['clear'];



$txtlanguage 	= $_REQUEST['txtlanguage'];
$txtspeak 		= $_REQUEST['txtspeak'];
$txtread 		= $_REQUEST['txtread'];
$txtwrite 		= $_REQUEST['txtwrite'];
	

if($clear !="")
{
$edit 			= "";
$txtlanguage 	= "";
$txtspeak 		= "";
$txtread 		= "";
$txtwrite 		= "";
}

if($next !=""){
  header ('Location: othertrainings.php?id='.$cvID);
}

if($save !="" ){

  			$iSql = "Insert into tbllanguages SET 
            cvId        = '$cvID',
			lname 		= '$txtlanguage',
			lspeaking	= '$txtspeak',
			lreading	= '$txtread',
			lwritten     = '$txtwrite'  ";
  $objDb2->execute($iSql);

	$tuSql = "update tblcvmain SET datetime = now(),   ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);
		$edit 			= "";
		$txtlanguage 	= "";
		$txtspeak 		= "";
		$txtread 		= "";
		$txtwrite 		= "";
}

if($update !="" ){
  $uSql = "Update tbllanguages SET 
			cvId        = '$cvID',
			lname 		= '$txtlanguage',
			lspeaking	= '$txtspeak',
			lreading	= '$txtread',
			lwritten     = '$txtwrite' 	where lId = '$edit'  ";
  $objDb2->execute($uSql);
$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";	

$objDb2->execute($tuSql);
		$edit 			= "";
		$txtlanguage 	= "";
		$txtspeak 		= "";
		$txtread 		= "";
		$txtwrite 		= "";
}

if($edit !=""){
 $eSql = "Select * from tbllanguages where lId='$edit'";
  $objDb2 ->query($eSql);

		$dlname  		= $objDb2->getField(0, lname);
		$dlspeaking  	= $objDb2->getField(0, lspeaking);
		$dlreading  	= $objDb2->getField(0, lreading);
		$dlwritten  	= $objDb2->getField(0, lwritten);

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
                  
                  
     <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
              <h2  >Language Proficiency:</h2>
                   <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th> * Language:</th>
                          <th>Speeking</th>
                          <th>Reading</th>
                          <th>Writing</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td height="86">
                            <select name="txtlanguage"  class="form-control" >
                            <option value="" selected="selected">Select Language</option>
                            <option value="Assamese"<? if($dlname =="Assamese") echo 'selected="selected"' ; ?> >Assamese</option>
                            <option value="English"<? if($dlname =="English") echo 'selected="selected"' ; ?> >English</option>
                            <option value="Hindi"<? if($dlname =="Hindi") echo 'selected="selected"' ; ?> >Hindi</option>
                            <option value="Kashmiri"<? if($dlname =="Kashmiri") echo 'selected="selected"' ; ?> >Kashmiri</option>
                            <option value="Malayalam"<? if($dlname =="Malayalam") echo 'selected="selected"' ; ?> >Malayalam</option>
                            <option value="Nepali"<? if($dlname =="Nepali") echo 'selected="selected"' ; ?> >Nepali</option>
                            <option value="Punjabi"<? if($dlname =="Punjabi") echo 'selected="selected"' ; ?> >Punjabi</option>
                            <option value="Tamil"<? if($dlname =="Tamil") echo 'selected="selected"' ; ?> >Tamil</option>
                            <option value="Bengali"<? if($dlname =="Bengali") echo 'selected="selected"' ; ?> >Bengali</option>
                            <option value="Gujarati"<? if($dlname =="Gujarati") echo 'selected="selected"' ; ?> >Gujarati</option>
                            <option value="Kannada"<? if($dlname =="Kannada") echo 'selected="selected"' ; ?> >Kannada</option>
                            <option value="Konkani"<? if($dlname =="Konkani") echo 'selected="selected"' ; ?> >Konkani</option>
                            <option value="Marathi"<? if($dlname =="Marathi") echo 'selected="selected"' ; ?> >Marathi</option>
                            <option value="Oriya"<? if($dlname =="Oriya") echo 'selected="selected"' ; ?> >Oriya</option>
                            <option value="Sindhi"<? if($dlname =="Sindhi") echo 'selected="selected"' ; ?> >Sindhi</option>
                            <option value="Telugu"<? if($dlname =="Telugu") echo 'selected="selected"' ; ?> >Telugu</option>
                            <option value="Urdu" <? if($dlname =="Urdu") echo 'selected="selected"' ; ?> >Urdu</option>
                            <option value="Arabic"<? if($dlname =="Arabic") echo 'selected="selected"' ; ?> >Arabic</option>
                            <option value="Balochi"<? if($dlname =="Balochi") echo 'selected="selected"' ; ?> >Balochi</option>
                            <option value="Pashto"<? if($dlname =="Pashto") echo 'selected="selected"' ; ?> >Pashto</option>
                            <option value="French"<? if($dlname =="French ") echo 'selected="selected"' ; ?> >French </option>
                            <option value="German"<? if($dlname =="German ") echo 'selected="selected"' ; ?> >German </option>
                            <option value="Dutch"<? if($dlname =="Dutch") echo  'selected=selected"' ; ?>  >Dutch</option>
                            <option value="" >----------------------</option>
                            <option value="Afrikanns"<? if($dlname =="Afrikanns") echo  'selected=selected"' ; ?>  >Afrikanns</option>
                            <option value="Afrikanns"<? if($dlname =="Afrikanns") echo  'selected=selected"' ; ?>  >Afrikanns</option>
                            <option value="Albanian"<? if($dlname =="Albanian") echo  'selected=selected"' ; ?>  >Albanian</option>
                            <option value="Arabic"<? if($dlname =="Arabic") echo  'selected=selected"' ; ?>  >Arabic</option>
                            <option value="Armenian"<? if($dlname =="Armenian") echo  'selected=selected"' ; ?>  >Armenian</option>
                            <option value="Basque"<? if($dlname =="Basque") echo  'selected=selected"' ; ?>  >Basque</option>
                            <option value="Bulgarian"<? if($dlname =="Bulgarian") echo  'selected=selected"' ; ?>  >Bulgarian</option>
                            <option value="Catalan"<? if($dlname =="Catalan") echo  'selected=selected"' ; ?>  >Catalan</option>
                            <option value="Cambodian"<? if($dlname =="Cambodian") echo  'selected=selected"' ; ?>  >Cambodian</option>
                            <option value="Chinese (Mandarin)"<? if($dlname =="Chinese (Mandarin)") echo  'selected=selected"' ; ?>  >Chinese (Mandarin)</option>
                            <option value="Croation"<? if($dlname =="Croation") echo  'selected=selected"' ; ?>  >Croation</option>
                            <option value="Czech"<? if($dlname =="Czech") echo  'selected=selected"' ; ?>  >Czech</option>
                            <option value="Danish"<? if($dlname =="Danish") echo  'selected=selected"' ; ?>  >Danish</option>
                            <option value="Estonian"<? if($dlname =="Estonian") echo  'selected=selected"' ; ?>  >Estonian</option>
                            <option value="Fiji"<? if($dlname =="Fiji") echo  'selected=selected"' ; ?>  >Fiji</option>
                            <option value="Finnish"<? if($dlname =="Finnish") echo  'selected=selected"' ; ?>  >Finnish</option>
                            <option value="French"<? if($dlname =="French") echo  'selected=selected"' ; ?>  >French</option>
                            <option value="Georgian"<? if($dlname =="Georgian") echo  'selected=selected"' ; ?>  >Georgian</option>
                            <option value="German"<? if($dlname =="German") echo  'selected=selected"' ; ?>  >German</option>
                            <option value="Greek"<? if($dlname =="Greek") echo  'selected=selected"' ; ?>  >Greek</option>
                            <option value="Hebrew"<? if($dlname =="Hebrew") echo  'selected=selected"' ; ?>  >Hebrew</option>
                            <option value="Hungarian"<? if($dlname =="Hungarian") echo  'selected=selected"' ; ?>  >Hungarian</option>
                            <option value="Icelandic"<? if($dlname =="Icelandic") echo  'selected=selected"' ; ?>  >Icelandic</option>
                            <option value="Indonesian"<? if($dlname =="Indonesian") echo  'selected=selected"' ; ?>  >Indonesian</option>
                            <option value="Irish"<? if($dlname =="Irish") echo  'selected=selected"' ; ?>  >Irish</option>
                            <option value="Italian"<? if($dlname =="Italian") echo  'selected=selected"' ; ?>  >Italian</option>
                            <option value="Japanese"<? if($dlname =="Japanese") echo  'selected=selected"' ; ?>  >Japanese</option>
                            <option value="Javanese"<? if($dlname =="Javanese") echo  'selected=selected"' ; ?>  >Javanese</option>
                            <option value="Korean"<? if($dlname =="Korean") echo  'selected=selected"' ; ?>  >Korean</option>
                            <option value="Latin"<? if($dlname =="Latin") echo  'selected=selected"' ; ?>  >Latin</option>
                            <option value="Latvian"<? if($dlname =="Latvian") echo  'selected=selected"' ; ?>  >Latvian</option>
                            <option value="Lithuanian"<? if($dlname =="Lithuanian") echo  'selected=selected"' ; ?>  >Lithuanian</option>
                            <option value="Macedonian"<? if($dlname =="Macedonian") echo  'selected=selected"' ; ?>  >Macedonian</option>
                            <option value="Malay"<? if($dlname =="Malay") echo  'selected=selected"' ; ?>  >Malay</option>
                            <option value="Maltese"<? if($dlname =="Maltese") echo  'selected=selected"' ; ?>  >Maltese</option>
                            <option value="Maori"<? if($dlname =="Maori") echo  'selected=selected"' ; ?>  >Maori</option>
                            <option value="Mongolian"<? if($dlname =="Mongolian") echo  'selected=selected"' ; ?>  >Mongolian</option>
                            <option value="Norwegian"<? if($dlname =="Norwegian") echo  'selected=selected"' ; ?>  >Norwegian</option>
                            <option value="Persian"<? if($dlname =="Persian") echo  'selected=selected"' ; ?>  >Persian</option>
                            <option value="Polish"<? if($dlname =="Polish") echo  'selected=selected"' ; ?>  >Polish</option>
                            <option value="Portuguese"<? if($dlname =="Portuguese") echo  'selected=selected"' ; ?>  >Portuguese</option>
                            <option value="Quechua"<? if($dlname =="Quechua") echo  'selected=selected"' ; ?>  >Quechua</option>
                            <option value="Romanian"<? if($dlname =="Romanian") echo  'selected=selected"' ; ?>  >Romanian</option>
                            <option value="Russian"<? if($dlname =="Russian") echo  'selected=selected"' ; ?>  >Russian</option>
                            <option value="Samoan"<? if($dlname =="Samoan") echo  'selected=selected"' ; ?>  >Samoan</option>
                            <option value="Serbian"<? if($dlname =="Serbian") echo  'selected=selected"' ; ?>  >Serbian</option>
                            <option value="Slovak"<? if($dlname =="Slovak") echo  'selected=selected"' ; ?>  >Slovak</option>
                            <option value="Slovenian"<? if($dlname =="Slovenian") echo  'selected=selected"' ; ?>  >Slovenian</option>
                            <option value="Spanish"<? if($dlname =="Spanish") echo  'selected=selected"' ; ?>  >Spanish</option>
                            <option value="Swahili"<? if($dlname =="Swahili") echo  'selected=selected"' ; ?>  >Swahili</option>
                            <option value="Swedish "<? if($dlname =="Swedish ") echo  'selected=selected"' ; ?>  >Swedish </option>
                            <option value="Tamil"<? if($dlname =="Tamil") echo  'selected=selected"' ; ?>  >Tamil</option>
                            <option value="Tatar"<? if($dlname =="Tatar") echo  'selected=selected"' ; ?>  >Tatar</option>
                            <option value="Telugu"<? if($dlname =="Telugu") echo  'selected=selected"' ; ?>  >Telugu</option>
                            <option value="Thai"<? if($dlname =="Thai") echo  'selected=selected"' ; ?>  >Thai</option>
                            <option value="Tibetan"<? if($dlname =="Tibetan") echo  'selected=selected"' ; ?>  >Tibetan</option>
                            <option value="Tonga"<? if($dlname =="Tonga") echo  'selected=selected"' ; ?>  >Tonga</option>
                            <option value="Turkish"<? if($dlname =="Turkish") echo  'selected=selected"' ; ?>  >Turkish</option>
                            <option value="Ukranian"<? if($dlname =="Ukranian") echo  'selected=selected"' ; ?>  >Ukranian</option>
                            <option value="Uzbek"<? if($dlname =="Uzbek") echo  'selected=selected"' ; ?>  >Uzbek</option>
                            <option value="Vietnamese"<? if($dlname =="Vietnamese") echo  'selected=selected"' ; ?>  >Vietnamese</option>
                            <option value="Welsh"<? if($dlname =="Welsh") echo  'selected=selected"' ; ?>  >Welsh</option>
                            <option value="Xhosa"<? if($dlname =="Xhosa") echo  'selected=selected"' ; ?>  >Xhosa</option>
                            <option value=""   >----------------------</option>
                            <option value="Balochi"<? if($dlname =="Balochi") echo 'selected="selected"' ; ?> >Balochi</option>
                            <option value="Indonesian"<? if($dlname =="Indonesian ") echo 'selected="selected"' ; ?> >Indonesian </option>
                            <option value="Punjabi"<? if($dlname =="Punjabi") echo 'selected="selected"' ; ?> >Punjabi</option>
                            <option value="Persian"<? if($dlname =="Persian") echo 'selected="selected"' ; ?> >Persian</option>
                            <option value="Pashto"<? if($dlname =="Pashto") echo 'selected="selected"' ; ?> >Pashto</option>
                            <option value="Portuguese"<? if($dlname =="Portuguese  ") echo 'selected="selected"' ; ?> >Portuguese</option>
                            <option value="Russian"<? if($dlname =="Russian ") echo 'selected="selected"' ; ?> >Russian </option>
                            <option value="Sindhi"<? if($dlname =="Sindhi") echo 'selected="selected"' ; ?> >Sindhi</option>
                            </select></td>
                          <td><select name="txtspeak" class="form-control" >
                            <option value="Excellent" <? if($dlspeaking =="Excellent") echo  'selected="selected"' ; ?>>Excellent</option>
                            <option value="Good" <? if($dlspeaking =="Good") echo  'selected="selected"' ; ?>>Good</option>
                            <option value="Fair" <? if($dlspeaking =="Fair") echo  'selected="selected"' ; ?>>Fair</option>
                            <option value="Normal" <? if($dlspeaking =="Normal") echo  'selected="selected"' ; ?>>Normal</option>
                            </select></td>
                          <td class="text-danger"><select name="txtread" class="form-control" >
                            <option value="Excellent" <? if($dlreading =="Excellent") echo  'selected="selected"' ; ?>>Excellent</option>
                            <option value="Good" <? if($dlreading =="Good") echo  'selected="selected"' ; ?>>Good</option>
                            <option value="Fair" <? if($dlreading =="Fair") echo  'selected="selected"' ; ?>>Fair</option>
                            <option value="Normal" <? if($dlreading =="Normal") echo  'selected="selected"' ; ?>>Normal</option>
                            </select>                          
                            <td class="text-danger"><select name="txtwrite" class="form-control" >
                              <option value="Excellent" <? if($dlwritten =="Excellent") echo  'selected="selected"' ; ?>>Excellent</option>
                              <option value="Good" <? if($dlwritten =="Good") echo  'selected="selected"' ; ?>>Good</option>
                              <option value="Fair" <? if($dlwritten =="Fair") echo  'selected="selected"' ; ?>>Fair</option>
                              <option value="Normal" <? if($dlwritten =="Normal") echo  'selected="selected"' ; ?>>Normal</option>
                              </select>  
                                
                            </tr>
                        <tr>
                          <td height="46">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="text-danger">                          
                          <td class="text-danger">                          
                        </tr>
                        </tbody>
                    </table>
                      
                      <tr>
			  <td></td></tr>
					<tr>
		 <div   align="center">
                <?php
                if ( $edit != "" ) {
                  ?>
                <input type="submit" value="Update" name="update" class="btn btn-primary me-3" style="color: white;" onclick="return language(this);" />
                <?php
                } else {
                  ?>
                <input type="submit" value="Save" name="save" class="btn btn-primary me-3" style="color: white;" onclick="return language(this);" />
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
					</tr>
				</table>
   
                      
               
                </div>
              </div>
            </div>                  
            
         <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Languages Detail<h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>   
                <tr>
                    <th align="center">#</th>
                    <th> Language  </th>
                    <th> Speaking  </th>
                    <th> Reading  </th>
                    <th> Written  </th>
                    <th> Edit  </th>
                    <th> Delete  </th>
                </tr>	
                        <?
				$sSQL = " select * from tbllanguages where cvId='$cvID'";
				$objDb->query($sSQL);
				$iCount = $objDb->getCount( );
				if($iCount>0)
				{
					for ($i = 0 ; $i < $iCount; $i ++)
					{
					$lname  	= $objDb->getField($i, lname);
					$lspeaking  = $objDb->getField($i, lspeaking);
					$lreading  	= $objDb->getField($i, lreading);
					$lwritten  	= $objDb->getField($i, lwritten);
					$lId  		= $objDb->getField($i, lId);
					
					?>
				   <tr>
				     <td align="center"   ><?=$i+1?></td>
					<td  >&nbsp;<?=$lname?></td>
					<td    >&nbsp;<?=$lspeaking?></td>
					<td    >&nbsp;<?=$lreading?></td>
					<td   >&nbsp;<?=$lwritten?></td>
					<td style="border-bottom:1px solid #cccccc" align="center" >&nbsp; <a href="language.php?id=<?=$cvID?>&edit=<?=$lId?>"><img src="images/edit-icon.png" width="22" height="22" /></a></td>
          		   <td style="border-bottom:1px solid #cccccc" width="6%" align="center">&nbsp; <a href="delete-lang.php?id=<?=$cvID?>&delete=<?=$lId?>" onClick="javascript: confirm('Do you really want to delete this record?');" title="Delete Language record"><img src="images/deletebutton.png" alt="Delete" width="20" height="20"  /></a>

                    
                    
                    
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
