<?php
    
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
  <title>CV Bank </title>
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
<? include "includes/skinwheel.php"; ?>
<? include "includes/leftsidemenu.php"; ?>

   <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
               <div>
                <div class="btn-wrapper"> 
                  <!--   <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>  --> 
                </div>
              </div>
           

          <!-- CONTENT STARTS -->

          <div class="tab-pane fade show" id="search" role="tabpanel" aria-labelledby="search"> 
                    <div class="col-8 grid-margin">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title text-center">Search By Selection</h4>


                          <form name="searchfrm" id="searchfrm" action="latest-cvs.php"  method="post"  >
                              <table  width="90%"  style="border-collapse: separate; border-spacing:0 8px; font-size: 13px;" cellpadding="1" cellspacing="1">
                                
                                <tr>
                                  <td width="23%" height="24" class="label text-end mt-1">ID:&nbsp;</td>
                                  <td width="25%" ><input class="form-control" type="text" value="" name="txtid" style="width:70px;" /></td>
                                  <td width="14%" class="label text-end mt-1">Name: &nbsp;</td>
                                  <td width="38%" ><input class="form-control" type="text" value="" name="txtname"  /></td>
                                </tr>
                                <tr>
                                  <td class="label text-end mt-1">Professional Qualification: </td>
                                  <td ><input class="form-control" type="text" value="" name="txtpq"   /></td>
                                  <td height="24" class="label text-end mt-1">Gender: </td>
                                  <td ><select class="form-select form-select-sm" name="gender" style="width:200px;">
                                      <option value="" selected="selected">All</option>
                                      <option value="M" >Male</option>
                                      <option value="F" >Female</option>
                                    </select>         </td>
                                  
                                </tr>
                                
                                <tr>
                                    <td height="26" class="label text-end mt-1" >Experience in Years: &nbsp;</td>
                                  <td ><select class="form-select form-select-sm" name="totalyears" >
                                      <option value="" selected="selected">Select Experience years</option>
                                      <option value="5-99" > More than 05 years</option>
                                      <option value="10-99" >More than 10 years</option>
                                      <option value="15-99" >More than 15 years</option>
                                      <option value="20-99" >More than 20 years</option>
                                      <option value="25-99" >More than 25 years</option>
                                      <option value="30-99" >More than 30 years</option>
                                    </select>         </td>
                                <td class="label text-end mt-1">General Criteria: &nbsp;</td>
                                  <td  ><input class="form-control" type="text" value="" name="txtgeneral"    /></td>
                                </tr>





                                <tr>
                                    <td height="26" class="label text-end mt-1" >Experience Bracket in Years: &nbsp;</td>
                                  <td ><select class="form-select form-select-sm" name="years" style="width:200px;" >
                                      <option value="" selected="selected">Select Experience Range</option>
                                      <option value="1-2" >Between 01-02 years</option>
                                      <option value="2-5" >Between 02-05 years</option>
                                      <option value="5-7" >Between 05-07 years</option>
                                      <option value="7-9" >Between 07-09 years</option>
                                      <option value="10-12" >Between 10-12 yeas</option>
                                      <option value="12-99" >More than 12 years</option>
                                    </select>         </td>
                                <td class="label text-end mt-1">Position Applied: &nbsp;</td>
                                  <td  ><input class="form-control" type="text" value="" name="txtpost"   /></td>
                                </tr>
                                
                                <tr>
                                  
                                  <td height="24" class="label text-end mt-1">Location: &nbsp;</td>
                                  <td ><input class="form-control" type="text" value="" name="txtlocation"  /></td>
                                <td class="label text-end mt-1">Citizenship: &nbsp;</td>
                                  <td ><select class="form-select form-select-sm" name="txtCountry"  style="width:200px;">
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
                                      <option value="<?= $iId ?>"<? if($iId == $country || $iId==$txtCountry) echo " selected"; ?>><?= $sName ?></option>
                                      <?
                                      }
                                      ?>
                                      </select>
                                      </td>
                                </tr>
                                
                                
                                <tr>
                                  <td height="24" class="label text-end mt-1">Area of Experience: &nbsp;</td>
                                  <td colspan="3" ><input class="form-control" type="text" value="" name="txtAreaOfExpert"  style="width:400px;"  /><span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
                                </tr>
                                <tr>
                                  <td class="label text-end mt-1">Key Qualification: &nbsp;</td>
                                  <td colspan="3"><input class="form-control" type="text" value="" name="txtkeyqualification" style="width:400px;" /><span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
                                </tr>
                              
                                
                                <tr>
                                  <td height="24" class="label text-end mt-1">Work Experience Countries: &nbsp;</td>
                                  <td  colspan="3" ><input class="form-control" type="text" value="" name="workExpCountries" style="width:400px;" /><span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
                                </tr>
                                
                                <tr>
                                    <td height="26" class="label text-end mt-1" >CV Verification: &nbsp;</td>
                                  <td >
                                  
                                  <select class="form-select form-select-sm" name="cvVerification" style="width:200px;">
                                <option value="" selected="selected">Select Verification...</option>
                                      <option value="V" >Verified</option>
                                      <option value="N" >Not-Verified </option>
                                      <option value="P" >Pending </option>
                                    </select>    
                                </td>
                                <td>&nbsp;</td>
                                  <td  >&nbsp;</td>
                                </tr>
                                
                                <tr>
                          <!--	   <td class="label">Project Length Kms</td>
                                  <td ><input type="text" value="" name="txtprojDistance"  style="width:200px;" /></td>
                                  <td height="24" class="label">&nbsp;</td>
                                  <td > </td>
                                  -->
                                </tr>
                                
                                
                                
                                <tr>
                                
                                        <td height="26" class="label text-end mt-1" >Proj Distance KMS: </td>
                                  <td ><select class="form-select form-select-sm" name="projDistance" style="width:200px;" >
                                      <option value="" selected="selected">Select Range</option>
                                      <option value="700-900" >Between 701-900 Kms</option>
                                    </select>         </td>
                                  <td>&nbsp;</td>
                                  <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr >
                                  <td>&nbsp;</td>
                                  <td colspan="3">
                                    <input style="margin-top: 15px; color: white;" class="btn btn-primary" type="submit" value="GO" name="btn"    onclick="return validateSearch();"  /></td>
                                </tr>
                                <tr>
                                  <td  colspan="4" align="center" >&nbsp;</td>
                                </tr>
                              </table>
                            </form>

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

function alertd()
{
  var siv = document.getElementById("totalyears").value;
  alert(siv);
}

  </script>


</body>

</html>

<?
	$objDb  -> close( );
	$objDb2 -> close( );
?>