head<?php
    
	@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
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

  <style>

.tablerw
{
  border-right: 1px solid #fff;
  padding-left: 5px;
}
.tablerwdata
{   padding: 10px;}
input[type='range'] {
  width: 210px;
  height: 30px;
  overflow: hidden;
  cursor: pointer;
    outline: none;
}
input[type='range'],
input[type='range']::-webkit-slider-runnable-track,
input[type='range']::-webkit-slider-thumb {
  -webkit-appearance: none;
    background: none;
}
input[type='range']::-webkit-slider-runnable-track {
  width: 200px;
  height: 1px;
  background: #003D7C;
}

input[type='range']:nth-child(2)::-webkit-slider-runnable-track{
  background: none;
}

input[type='range']::-webkit-slider-thumb {
  position: relative;
  height: 15px;
  width: 15px;
  margin-top: -7px;
  background: #fff;
  border: 1px solid #003D7C;
  border-radius: 25px;
  z-index: 1;
}


input[type='range']:nth-child(1)::-webkit-slider-thumb{
  z-index: 2;
}

.rangeslider{
    position: relative;
    height: 60px;
    width: 210px;
    display: inline-block;
    margin-top: -5px;
    margin-left: 20px;
}
.rangeslider input{
    position: absolute;
}
.rangeslider{
    position: absolute;
}

.rangeslider span{
    position: absolute;
    margin-top: 30px;
    left: 0;
}

.rangeslider .right{
   position: relative;
   float: right;
   margin-right: -5px;
}


/* Proof of concept for Firefox */
@-moz-document url-prefix() {
  .rangeslider::before{
    content:'';
    width:100%;
    height:2px;
    background: #003D7C;
    display:block;
    position: relative;
    top:16px;
  }

  input[type='range']:nth-child(1){
    position:absolute;
    top:35px !important;
    overflow:visible !important;
    height:0;
  }

  input[type='range']:nth-child(2){
    position:absolute;
    top:35px !important;
    overflow:visible !important;
    height:0;
  }
input[type='range']::-moz-range-thumb {
  position: relative;
  height: 15px;
  width: 15px;
  margin-top: -7px;
  background: #fff;
  border: 1px solid #003D7C;
  border-radius: 25px;
  z-index: 1;
}

  input[type='range']:nth-child(1)::-moz-range-thumb {
      transform: translateY(-20px);    
  }
  input[type='range']:nth-child(2)::-moz-range-thumb {
      transform: translateY(-20px);    
  }
}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


</head>
<body>
<script >
   (function() {

function addSeparator(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function rangeInputChangeEventHandler(e){
    var rangeGroup = $(this).attr('name'),
        minBtn = $(this).parent().children('.min'),
        maxBtn = $(this).parent().children('.max'),
        range_min = $(this).parent().children('.range_min'),
        range_max = $(this).parent().children('.range_max'),
        minVal = parseInt($(minBtn).val()),
        maxVal = parseInt($(maxBtn).val()),
        origin = $(this).context.className;

    if(origin === 'min' && minVal > maxVal-5){
        $(minBtn).val(maxVal-5);
    }
    var minVal = parseInt($(minBtn).val());
    $(range_min).html(addSeparator(minVal*1000) + ' €');


    if(origin === 'max' && maxVal-5 < minVal){
        $(maxBtn).val(5+ minVal);
    }
    var maxVal = parseInt($(maxBtn).val());
    $(range_max).html(addSeparator(maxVal*1000) + ' €');
}

$('input[type="range"]').on( 'input', rangeInputChangeEventHandler);
})();
</script>
    
 <div class="conformtainer-scroller">
<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
       
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize"> 
          <span class="icon-menu"></span> 
      </button>
    </div>
    <div> <a class="navbar-brand brand-logo" href="index.php"> <img src="images/faviconblue.png" alt="saca smec logo" /> </a> <a class="navbar-brand brand-logo-mini" href="index.php"> <img src="images/logo-mini.svg" alt="logo" /> </a> </div>
  </div>
    <?php include "includes/topheader.php" ; ?>
    <?php include ('includes/countryselection.php');  ?>
    
    <!-- //yyyy   -->
    
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas"> 
    <span class="mdi mdi-menu"></span> </button>
  </div>
</nav>
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
            <?php // include('includes/submenu.php') ?>

              
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
              
      <!-- partial -->
      
      <!-- NAV ENDS -->
       <!-- NAV ENDS -->
        <!-- NAV ENDS -->
         <!-- NAV ENDS -->


 
          <!-- TOP ROW -->

          <!-- CONTENT STARTS -->

          <div class="tab-pane fade show" id="search" role="tabpanel" aria-labelledby="search"> 
                    <div class="col-12 grid-margin">
                      <div class="card">
                        <div class="card-body">
                        <h4 class="card-title text-center"> Interactive search</h4>

              <form class="" action="interactive.php" method="post">

                <div class="row" style="height: 50px">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 text-end mt-1">Area of Experience:</label>
                      <div class="col-sm-7 text-start">
                      <input class="form-control" placeholder="Like : mechanical, dam, high, water..." name="valued" type="text" onKeyUp="showResult(valuea.value,valueb.value,valuec.value,this.value,valuee.value,valuef.value, valueid.value, valueo.value,valuesa.value,valueos.value)" size="10" maxlength="30"></td>
                      <!-- <select class="form-control">
                          <option>Select..</option>
                          <option>Mechanical</option>
                          <option>High</option>
                          <option>Water</option>
                        </select> -->

                      </div>
                    </div>
                  </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-4 text-end mt-1">Experience years:</label>
                                  <div class="col-sm-7 text-start">
                                      
                                    <input class="form-control" name="valuec" type="text" placeholder="Less Than 6 = -6, Greater Than 6 = 6-, b/w = 6-7" onKeyUp="showResult(valuea.value,valueb.value,this.value,valued.value,valuee.value,valuef.value, valueid.value, valueo.value,valuesa.value,valueos.value)" size="10" maxlength="30">
                                      <!-- <div class="rangeslider"> 
                                          <input class="min" name="range_1" type="range" min="1" max="100" value="10" />
                                          <input class="max" name="range_1" type="range" min="1" max="100" value="90" />
                                          <span class="range_min light left text-muted" style="  font-size: 14px;">1 years </span>
                                          <span class="range_max light right text-muted" style="  font-size: 14px;">20 years</span>
                                      </div> -->
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin-top: -15px;">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-4 text-end mt-1">Position :</label>
                                  <div class="col-sm-7 text-start">
                                  <input class="form-control" placeholder="Like : Team Leader, Economist, Surveyor..." name="valuef" type="text" onKeyUp="showResult(valuea.value,valueb.value,valuec.value,valued.value,valuee.value,this.value, eoi-format-dl1valueid.value, valueo.value,valuesa.value,valueos.value)" size="10" maxlength="30">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-4 text-end mt-1">Key Qualification</label>
                                   <div class="col-sm-7 text-start">
                                    <input class="form-control"  placeholder="Enter any text from key qualification"  name="valuee" type="text" onKeyUp="showResult(valuea.value,valueb.value,valuec.value,valued.value,this.value,valuef.value, valueid.value, valueo.value,valuesa.value,valueos.value)" size="10" maxlength="30">
                                  </div>
                                 </div>
                              </div>
                            </div>
                            <div class="row" style="height: 50px">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-4 text-end mt-1">Qualification:</label>
                                  <div class="col-sm-7 text-start">
                                  <input class="form-control" name="valueb" placeholder="Short code -> m: M.Sc., b: B = B.Sc." type="text" onKeyUp="showResult(valuea.value,this.value,valuec.value,valued.value,valuee.value,valuef.value, valueid.value, valueo.value,valuesa.value,valueos.value)" size="10" maxlength="30">
                                  <!-- <select class="form-control">
                                      <option>Select..</option>
                                      <option>M.Sc</option>
                                      <option>B.Sc.</option>
                                      <option>None</option>
                                    </select> -->
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-4 text-end mt-1">General Criteria :</label>
                                  <div class="col-sm-7 text-start">
                                  <input class="form-control" name="valuea" placeholder="Like: highyway, railway, dam, barrage." type="text" onKeyUp="showResult(this.value,valueb.value,valuec.value,valued.value,valuee.value,valuef.value, valueid.value, valueo.value,valuesa.value,valueos.value)" size="80" maxlength="120">
                                  <!-- <select class="form-control">
                                      <option>Select..</option>
                                      <option>Highyway</option>
                                      <option>Railway</option>
                                      <option>Dam</option>
                                    </select>                       -->
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin-top: -15px;">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-4 text-end mt-1">Sort By:</label>
                                  <div class="col-sm-4 text-start">
                                    <select class="form-select form-control-sm" name="valueo" onchange="showResult(valuea.value,valueb.value,valuec.value,valued.value,valuee.value,valuef.value,valueid.value,this.value,valuesa.value, valueos.value)">
                                      <option value="cvId">ID</option>
                                      <option value="name">Name</option>
                                      <option value="position">Position</option>
                                      <option value="startexpyr">Experience</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-3 text-center text-sm"> 
                                  <select class="form-select form-control-sm" name="valueos" onchange="showResult(valuea.value,valueb.value,valuec.value,valued.value,valuee.value,valuef.value,valueid.value,valueo.value,valuesa.value, this.value)">
                                  <option value="DESC">Descending</option>
                                  <option value="ASC">Ascending</option>
                                  </select>
                                  
                                </div>
                              </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-4 text-end mt-1">Selection of CV IDs</label>
                                  <div class="col-sm-7 text-start">
                                  <input class="form-control" name="valueid" placeholder="Provide IDs seperated by Comma like --> (16,8,65,100,1092...)" type="text" onKeyUp="showResult(valuea.value,valueb.value,valuec.value,valued.value,valuee.value,valuef.value, this.value, valueo.value,valuesa.value,valueos.value)" size="10" maxlength="255">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="height: 50px">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-4 text-end mt-1">Selection </label>
                                  <div class="col-sm-7 text-start">
                                  <select class="form-select form-control-sm" name="valuesa" onchange="showResult(valuea.value,valueb.value,valuec.value,valued.value,valuee.value,valuef.value,valueid.value,valueo.value,this.value, valueos.value)">
                                  <option value="1">Select All</option>
                                  <option value="0">None</option>
                                  </select>
                                  </div>
                                </div>
                              </div>
                           
             
                          </div>
                           

      
                          </form>
                        </div>
                      </div>



                    </div>
                    
                    <div class="col-12 grid-margin">
                      <div class="card">

                      <div class="card-body" style="padding: 10px;">
                      <div id="livesearch"></div>
                     
                      </div>

                      </div>
                    </div>






                  </div>  <!-- End CV bank Search Tab id="search" -->

 
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


  <script>
      function showResult(stra, strb, strc, strd, stre, strf, strid, stro, strsa, stros) {
      
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
          }
        }
        xmlhttp.open("GET","livesearch_revamped.php?a="+stra+"&b="+strb+"&c="+strc+"&d="+strd+"&e="+stre+"&f="+strf+"&id="+strid+"&o="+stro+"&sa="+strsa+"&os="+stros,true);
        xmlhttp.send();
      }
</script>


</body>

</html>

