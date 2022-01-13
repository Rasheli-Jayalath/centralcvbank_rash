<?php
error_reporting( E_ALL & ~E_NOTICE );
session_start();
$strusername = $_SESSION[ 'uname' ];

if ( $strusername == null ) {
  header( "Location: ../index.php?init=3" );
}
$cvflag = $_SESSION[ 'cv' ];
$cvadmflag = $_SESSION[ 'cvadm' ];
$cventryflag = $_SESSION[ 'cventry' ];
$superadminflag = $_SESSION[ 'superadmin' ];
$uid = $_SESSION[ 'uid' ];
$name = $_SESSION[ 'uname' ];
//$user_status = $_SESSION['user_status'];
//$userphoto =  $uid."-".$name.".jpg";
@require_once( "requires/session.php" );

$objDb = new Database();
//$objDb1 = new Database();

function roundToTheNearestAnything( $value, $roundTo ) {
  $mod = $value % $roundTo;
  return $value + ( $mod < ( $roundTo / 2 ) ? -$mod : $roundTo - $mod );
}

if ( $cvflag == 0 ) {
  header( "Location: ../index.php" );
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
                          <div style="margin:auto; float: left;display: flex; justify-content: center;align-items: center; height: 250px;width: 100% ; background-image: linear-gradient(to bottom right, #00b09b, #96c93d); padding: 30px;border-radius: 20px;">
                                      <div style="background-color: ; margin-left:;width: 100%;">
                            <a style="float: left;" href="cvlistdashemployeeprofile.php?v=co&cc=SACA" target="_blank"> 
     <img src="images/flagsaca/sacaflag1.png" alt="" width="156" height="147" /><br /></a>
     <a style="float: left; margin-top: 160px; margin-left: -115px;" href="cvlist.php?v=sje" title="SJ Cvs" target="_blank"><img src="../skillmatrix/images/logo-sj.jpg" alt="" width="99" height="43" /></a>
     <div style="background-color: ; width:;margin-left: ;margin-top: 50px; float: right;">  
                              <p style="font-size: 20px;color: white;font-weight: 500;">SACA Division</p>
       <?php  
 		$sql = mysql_query("SELECT COUNT(country) as AllCountries FROM skillmatdb.tblskillemployee_detail WHERE country!='' ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>
                              
                              <h1  style="font-weight: 900;color: white"> <? echo $data['AllCountries']; ?></h1>
                              </div>
                            </div>
                          </div>
<div id="contentdash" style="margin-top: 20px; margin-left: 20px; background-color:">
   <table width="100%"  align="center" border="0" >
 
   <tr>
     <td width="352" align="center">&nbsp;</td>
     <td width="240" align="center">&nbsp;</td>
     <td width="187" align="center">&nbsp;</td>
     <td width="187" align="center">&nbsp;</td>
     <td width="187" align="center">&nbsp;</td>
     <td width="187" align="center">&nbsp;</td>
   </tr>
   <tr>
     
                          <div style="float: left;display: flex; justify-content: center;align-items: center; height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #7F7FD5, #91EAE4); padding: 30px;border-radius: 20px;">
                            <div><a href="cvlistdashemployeeprofile.php?v=co&cc=Afghanistan" target="_blank">
                             <img src="images/flagsaca/afghanistan.png" alt="" width="83" height="72" /><?php echo $fgname1; ?></a>  
                              <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">Afghanistan</p>
       <?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='afghanistan'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>
                              
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>
     
                          <div style="float: left;margin-left: 20px;display: flex; justify-content: center;align-items: center; height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #F8CDDA, #1D2B64 ); padding: 30px;border-radius: 20px;">
                            <div> <a href="cvlistdashemployeeprofile.php?v=co&cc=Bangladesh" target="_blank"> 
                            <img src="../skillmatrix/images/flagsaca/bangladesh.png" alt="" width="83" height="72" /></a>
<?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='Bangladesh'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>                            
                          <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">Bangladesh </p>
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>

	   
                          <div style="float: left;margin-left: 20px;display: flex; justify-content: center;align-items: center; height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #757F9A,#D7DDE8); border-radius: 20px;">
                            <div> <a href="cvlistdashemployeeprofile.php?v=co&cc=CAR and CAU" target="_blank"> <img src="images/flagsaca/Tajikistan.png" alt="" width="83" height="72" /></a>
<?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='CAR and CAU'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>                            
                          <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">CAR & CAU </p>
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>
                          
                          
                          <div style="float: left;margin-left: 20px;display: flex; justify-content: center;align-items: center; height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #757F9A,#D7DDE8); border-radius: 20px;">
                            <div> <a href="cvlistdashemployeeprofile.php?v=co&cc=Geo" target="_blank"> <img src="images/flagsaca/georgia.png" alt="" width="83" height="72" /></a>
<?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='GEO'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>                            
                          <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">GEO </p>
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>

                          
                          <div style="float: left;margin-left: 20px;display: flex; justify-content: center;align-items: center;height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #FF5F6D, #FFC371); padding: 30px;border-radius: 20px;">
                            <div> <a href="cvlistdashemployeeprofile.php?v=co&cc=India" target="_blank"> <img src="images/flagsaca/india.png" alt="" width="83" height="72" /></a>
<?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='India'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>                            
                          <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">India </p>
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>

    </table>
    
</div>
<div id="contentdash" style="margin-top: 20px; margin-left: 120px; background-color:;width: 80%;">
   <table width="100%"  align="center" border="0" >
 
   <tr>
     <td width="352" align="center">&nbsp;</td>
     <td width="240" align="center">&nbsp;</td>
     <td width="187" align="center">&nbsp;</td>
     <td width="187" align="center">&nbsp;</td>
     <td width="187" align="center">&nbsp;</td>
     <td width="187" align="center">&nbsp;</td>
   </tr>
   <tr>
                          
                          <div style="float: left;margin-top: 20px;display: flex; justify-content: center;align-items: center;height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #ff6e7f,#bfe9ff); padding: 30px;border-radius: 20px;">
                            <div> <a href="cvlistdashemployeeprofile.php?v=co&cc=KZ" target="_blank"> <img src="images/flagsaca/Kazakhstan.png" alt="" width="83" height="72" /></a>
<?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='KZ'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>                            
                          <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">Kazakhstan </p>
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>

                          
                          <div style="margin-left:20px; margin-top:20px; float: left;margin-left: ;display: flex; justify-content: center;align-items: center;height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #FF5F6D, #FFC371); padding: 30px;border-radius: 20px;">
                            <div> <a href="cvlistdashemployeeprofile.php?v=co&cc=Nepal" target="_blank"> <img src="images/flagsaca/Nepal.png" alt="" width="83" height="72" /></a>
<?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='Nepal'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>                            
                          <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">Nepal </p>
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>

                          
                          <div style="margin-top:20px; float: left;margin-left: 20px;display: flex; justify-content: center;align-items: center;height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #FF5F6D, #FFC371); padding: 30px;border-radius: 20px;">
                            <div> <a href="cvlistdashemployeeprofile.php?v=co&cc=Pakistan" target="_blank"> <img src="images/flagsaca/pakistany.png" alt="" width="83" height="72" /></a>
<?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='Pakistan'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>                            
                          <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">Pakistan </p>
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>

                          
                          <div style="margin-top:20px; float: left;margin-left: 20px;display: flex; justify-content: center;align-items: center;height: 250px;width: 190px;; background-image: linear-gradient(to bottom right, #ff6e7f,#bfe9ff); padding: 30px;border-radius: 20px;">
                            <div><a href="cvlistdashemployeeprofile.php?v=co&cc=Sri Lanka" target="_blank"> <img src="images/flagsaca/srilanka.png" alt="" width="83" height="72" /></a>
<?php  
 		$sql = mysql_query("SELECT COUNT(country) AS CountryData FROM skillmatdb.tblskillemployee_detail WHERE country='Sri Lanka'  ");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>                            
                          <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">Sri Lanka </p>
                              <h1  style="font-weight: 900;color: white"><? echo $data['CountryData']; ?></h1>
                            </div>
                          </div>
</tr></table></div>
          <!--pol end ----------------                         -->
                    
                  
                  
                  
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
<!-- page-body-wrapper ends --> 

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
