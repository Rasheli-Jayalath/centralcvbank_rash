<?php

@require_once( "requires/session.php" );

$objDb = new Database();
$objDb2 = new Database();

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
.tablerw {
    border-right: 1px solid #fff;
    padding-left: 5px;
}
.tablerwdata {
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
    <div> <a class="navbar-brand brand-logo" href="index.php"> <img src="images/faviconblue.png" alt="saca smec logo" width="100%" /> </a> <a class="navbar-brand brand-logo-mini" href="index.php"> <img src="images/logo-mini.svg" alt="logo" /> </a> </div>
  </div>
  <?php include "includes/topheader.php" ; ?>
    <?php include ('includes/countryselection.php');  ?>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas"> <span class="mdi mdi-menu"></span> </button>
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
            <div class="col-11 grid-margin">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title text-center"></h4> -->
                  <form name="searchfrm" id="searchfrm" action="latest-cvs.php"  method="post"  >
                    <table  width="90%"  style="border-collapse: separate; border-spacing:0 8px; font-size: 13px;" cellpadding="1" cellspacing="1">
                      <tr>
                        <td colspan="4"  align="center" ><h3><strong> Search By Selection</strong></h3></td>
                      </tr>
<!--                      <tr>
                        <td  class="label text-end mt-1">&nbsp;</td>
                        <td >&nbsp;</td>
                        <td class="label text-end mt-1">&nbsp;</td>
                        <td align="right" ><input style="margin-top: 0px; color: white;" class="btn btn-primary" width="200px" type="submit" value="GO" name="btn"  onclick="return validateSearch();"  /></td>
                      </tr>
-->
                      <tr>
                        <td width="23%" height="14" class="label text-end mt-1">ID:&nbsp;</td>
                        <td width="25%" ><input class="form-control" type="text" value="" name="txtid" /></td>
                        <td width="14%" class="label text-end mt-1">Name: &nbsp;</td>
                        <td width="38%" ><input class="form-control" type="text" value="" name="txtname"  /></td>
                      </tr>
                     
						<tr>
						  <td class="label text-end mt-1"><strong>Email:</strong></td>
						  <td ><input class="form-control" type="text" value="" name="email"   /></td>
						  <td height="20" class="label text-end mt-1"><strong>Citizenship:</strong></td>
						  <td ><select class="form-select form-select-sm" name="txtCountry"  >
						    <option value="" selected="selected">Country</option>
						    <?
							$sSQL = "SELECT countryId, name FROM tblcountries ORDER BY name";
							$objDb->query( $sSQL );

							$iCount = $objDb->getCount();

							for ( $i = 0; $i < $iCount; $i++ ) {
							  $iId = $objDb->getField( $i, 0 );
							  $sName = $objDb->getField( $i, 1 );
							  ?>
						    <option value="<?= $iId ?>"<? if($iId == $country || $iId==$txtCountry) echo " selected"; ?>>
						      <?= $sName ?>
					        </option>
						    <?
							}
							?>
					      </select></td>
					  </tr>
						<tr>
                            <td class="label text-end mt-1"><strong>Functional Group</strong></td>
                            <td ><span class="col-sm-9">
                              <select name="fgroup"  class="form-select form-select-sm" >
                                <option value="" selected="selected">--- Select One ---</option>
    		  <?php
					$sSQLs = " SELECT sid, sectorname FROM tblfgsector ORDER BY sectorname asc ";
					$objDb->query($sSQLs);

					$iCount = $objDb->getCount( );
					for ($i = 0; $i < $iCount; $i ++)
					{
					$s_id 			= $objDb->getField($i, 0);
					$sectorname 	= $objDb->getField($i, 1);
			?>
				<option value="<?=$sectorname?>" <?php if($fgroup==$sectorname) echo 'selected="selected"'; ?> >
				  <?=$sectorname?>
				</option>
				<?php } ?>
			  </select>
                            </span></td>
                            <td height="20" class="label text-end mt-1"><span class="label text-end mt-2"><strong>Educational Discipline:</strong></span></td>
                            <td >
								<select class="form-select form-select-sm" name="eDiscipline"  >
									  <option value="" selected="selected">Select Edu. Discipline...</option>
									  <option value="Doctorate">Doctorate</option>
									  <option value="M.Phil/MS">M.Phil/MS </option>
									  <option value="Masters">Masters</option>
									  <option value="Graduation">Graduation</option>
								  <!--    <option value="Diploma Holder">Diploma Holder</option>  -->
								</select>
							</td>
                      </tr>
                       
                        <tr>
                        <td class="label text-end mt-1">Professional Qualification: </td>
                 
                            <td ><input class="form-control" type="text" value="" name="txtpq"   /></td>
                        <td height="20" class="label text-end mt-1">Gender: </td>
                        <td ><select class="form-select form-select-sm" name="gender"  >
                            <option value="" selected="selected">All</option>
                            <option value="M" >Male</option>
                            <option value="F" >Female</option>
                          </select></td>
                      </tr>
      <!--                <tr>
                        <td height="26" class="label text-end mt-1" >Experience in Years: </td>
                        <td ><select class="form-select form-select-sm" name="totalyears" >
                            <option value="" selected="selected">Select Experience years</option>
                            <option value="5-99" > More than 05 years</option>
                            <option value="10-99" >More than 10 years</option>
                            <option value="15-99" >More than 15 years</option>
                            <option value="20-99" >More than 20 years</option>
                            <option value="25-99" >More than 25 years</option>
                            <option value="30-99" >More than 30 years</option>
                          </select></td>
                        <td class="label text-end mt-1">General Criteria:</td>
                        <td  ><input class="form-control" type="text" value="" name="txtgeneral"    /></td>
                      </tr> -->
                      <tr>
                        <td height="26" class="label text-end mt-1" >Experience Bracket in Years: </td>
                        <td ><select class="form-select form-select-sm" name="years"   >
                            <option value="" selected="selected">Select Experience Range</option>
                            <option value="05-10" >Between 05-10 years</option>
                            <option value="10-15" >Between 10-15 years</option>
                            <option value="15-20" >Between 15-20 years</option>
                            <option value="20-25" >Between 20-25 years</option>
                            <option value="25-30" >Between 25-30 years</option>
                            <option value="30-50" >More then 30 years</option>
                          </select></td>
                        <td class="label text-end mt-1">Position Applied:</td>
                        <td  ><input class="form-control" type="text" value="" name="txtpost"   /></td>
                      </tr>
  
                      <tr>
                        <td height="24" class="label text-end mt-1">Languages:</td>
                        <td ><select name="lname" class="form-select form-select-sm" >
                          <option value="" selected="selected">Select Language</option>
                          <option value="Assamese">Assamese</option>
                          <option value="English">English</option>
                          <option value="Hindi">Hindi</option>
                          <option value="Kashmiri">Kashmiri</option>
                          <option value="Malayalam">Malayalam</option>
                          <option value="Nepali">Nepali</option>
                          <option value="Punjabi">Punjabi</option>
                          <option value="Tamil">Tamil</option>
                          <option value="Bengali">Bengali</option>
                          <option value="Gujarati">Gujarati</option>
                          <option value="Kannada">Kannada</option>
                          <option value="Konkani">Konkani</option>
                          <option value="Marathi">Marathi</option>
                          <option value="Oriya">Oriya</option>
                          <option value="Sindhi">Sindhi</option>
                          <option value="Telugu">Telugu</option>
                          <option value="Urdu">Urdu</option>
                          <option value="Arabic">Arabic</option>
                          <option value="Balochi">Balochi</option>
                          <option value="Pashto">Pashto</option>
                          <option value="French">French </option>
                          <option value="German">German </option>
                          <option value="Dutch">Dutch</option>
                          <option value="">----------------------</option>
                          <option value="Afrikanns">Afrikanns</option>
                          <option value="Afrikanns">Afrikanns</option>
                          <option value="Albanian">Albanian</option>
                          <option value="Arabic">Arabic</option>
                          <option value="Armenian">Armenian</option>
                          <option value="Basque">Basque</option>
                          <option value="Bulgarian">Bulgarian</option>
                          <option value="Catalan">Catalan</option>
                          <option value="Cambodian">Cambodian</option>
                          <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                          <option value="Croation">Croation</option>
                          <option value="Czech">Czech</option>
                          <option value="Danish">Danish</option>
                          <option value="Estonian">Estonian</option>
                          <option value="Fiji">Fiji</option>
                          <option value="Finnish">Finnish</option>
                          <option value="French">French</option>
                          <option value="Georgian">Georgian</option>
                          <option value="German">German</option>
                          <option value="Greek">Greek</option>
                          <option value="Hebrew">Hebrew</option>
                          <option value="Hungarian">Hungarian</option>
                          <option value="Icelandic">Icelandic</option>
                          <option value="Indonesian">Indonesian</option>
                          <option value="Irish">Irish</option>
                          <option value="Italian">Italian</option>
                          <option value="Japanese">Japanese</option>
                          <option value="Javanese">Javanese</option>
                          <option value="Korean">Korean</option>
                          <option value="Latin">Latin</option>
                          <option value="Latvian">Latvian</option>
                          <option value="Lithuanian">Lithuanian</option>
                          <option value="Macedonian">Macedonian</option>
                          <option value="Malay">Malay</option>
                          <option value="Maltese">Maltese</option>
                          <option value="Maori">Maori</option>
                          <option value="Mongolian">Mongolian</option>
                          <option value="Norwegian">Norwegian</option>
                          <option value="Persian">Persian</option>
                          <option value="Polish">Polish</option>
                          <option value="Portuguese">Portuguese</option>
                          <option value="Quechua">Quechua</option>
                          <option value="Romanian">Romanian</option>
                          <option value="Russian">Russian</option>
                          <option value="Samoan">Samoan</option>
                          <option value="Serbian">Serbian</option>
                          <option value="Slovak">Slovak</option>
                          <option value="Slovenian">Slovenian</option>
                          <option value="Spanish">Spanish</option>
                          <option value="Swahili">Swahili</option>
                          <option value="Swedish ">Swedish </option>
                          <option value="Tamil">Tamil</option>
                          <option value="Tatar">Tatar</option>
                          <option value="Telugu">Telugu</option>
                          <option value="Thai">Thai</option>
                          <option value="Tibetan">Tibetan</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Turkish">Turkish</option>
                          <option value="Ukranian">Ukranian</option>
                          <option value="Uzbek">Uzbek</option>
                          <option value="Vietnamese">Vietnamese</option>
                          <option value="Welsh">Welsh</option>
                          <option value="Xhosa">Xhosa</option>
                          <option value="">----------------------</option>
                          <option value="Balochi">Balochi</option>
                          <option value="Indonesian">Indonesian </option>
                          <option value="Punjabi">Punjabi</option>
                          <option value="Persian">Persian</option>
                          <option value="Pashto">Pashto</option>
                          <option value="Portuguese">Portuguese</option>
                          <option value="Russian">Russian </option>
                          <option value="Sindhi">Sindhi</option>
                        </select></td>
                        <td class="label text-end mt-1">Area of Experience:</td>
                        <td ><input class="form-control" type="text" value="" name="txtAreaOfExpert"    />
                        <span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
                      </tr>
                   <!--   <tr>
                        <td height="24" class="label text-end mt-1">&nbsp;</td>
                        <td >&nbsp;</td>
                        <td class="label text-end mt-1">Key Qualification:</td>
                        <td ><input class="form-control" type="text" value="" name="txtkeyqualification"   />
                          <span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
                      </tr>
					-->


                      <tr>
                        <td height="24" class="label text-end mt-1">Work Experience Countries:</td>
                        <td ><input class="form-control" type="text" value="" name="workExpCountries"  />
                          <span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
                        <td class="label text-end mt-1">CV Verification:</td>
                        <td ><select class="form-select form-select-sm" name="cvVerification" >
                            <option value="" selected="selected">Select Verification...</option>
                            <option value="V" >Verified</option>
                            <option value="N" >Not-Verified </option>
                            <option value="P" >Pending </option>
                            <option value="O" >Others </option>
							
                          </select></td>
                      </tr>
                       
						  <tr>
                        <td height="26" class="label text-end mt-2" ><span class="label text-end mt-1">Name of Educational Institute:</span></td>
                        <td ><input class="form-control" type="text" value="" name="eInstitute"   /></td>
                        <td  class="label text-end mt-1"> <!-- <span class="label text-end mt-2">Employed By:</span> --> </td>
                        <td colspan="3"> <!-- <input class="form-control" type="text" value="" name="employed_by" /> --></td>
                      </tr>
						
					  <tr>
                            <td height="26" class="label text-end mt-2" >Employer Name:</td>
                            <td ><input class="form-control" type="text" value="" name="employeer"  /></td>
                            <td  class="label text-end mt-1"><span class="label text-end mt-2">Project Name:</span></td>
                            <td colspan="3"><input class="form-control" type="text" value="" name="projTitle"  /></td>
                      </tr>
						 <tr >
                        <td colspan="4" align="center">
                          <input style="margin-top: 15px; color: white;" class="btn btn-behance" width="200px" type="submit" value="Search" name="btn"  onclick="return validateSearch();"  /></td>
                      </tr>
					  <tr>
                        <td  colspan="4" align="center" >&nbsp;</td>
                      </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End CV bank Search Tab id="search" --> 
          
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
$objDb->close();
$objDb2->close();
?>