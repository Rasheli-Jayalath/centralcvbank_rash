<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
if ($strusername==null)
{
	header("Location: ../index.php?init=3");
}
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];
?>


<?php
    
	@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('includes/metatag.php'); ?>
</head>

<body>
<div id="wrap">
   <?php
     include 'includes/header.php';
   ?>
   <div id="content"> <form name="searchfrm" id="searchfrm" action="cvlist.php"  method="post"  style=" border:1px solid #FFFFFF" >
     <table width="90%"  align="center" cellpadding="1" cellspacing="1" >
       <tr>
         <td colspan="4" ><h1>Search By Selection:</h1></td>
       </tr>
       <tr>
         <td width="23%" height="24" class="label" >ID: &nbsp;</td>
         <td width="25%" ><input type="text" value="" name="txtid" style="width:70px;" /></td>
         <td width="14%" class="label">Name: &nbsp;</td>
         <td width="38%" ><input type="text" value="" name="txtname"  /></td>
       </tr>
       <tr>
	   <td class="label">Professional Qualification: </td>
         <td ><input type="text" value="" name="txtpq"  style="width:200px;" /></td>
         <td height="24" class="label">Gender: </td>
         <td ><select name="gender">
		 	<option value="" selected="selected">All</option>
             <option value="M" >Male</option>
             <option value="F" >Female</option>
           </select>         </td>
         
       </tr>
      
       <tr>
        	<td height="26" class="label" >Experience in Years: &nbsp;</td>
         <td ><select name="totalyears" style="width:200px;" >
             <option value="" selected="selected">Select Experience years</option>
             <option value="5-99" > More than 05 years</option>
             <option value="10-99" >More than 10 years</option>
             <option value="15-99" >More than 15 years</option>
             <option value="20-99" >More than 20 years</option>
             <option value="25-99" >More than 25 years</option>
             <option value="30-99" >More than 30 years</option>
           </select>         </td>
		  <td class="label">General Criteria: &nbsp;</td>
         <td  ><input type="text" value="" name="txtgeneral"  style="width:200px;"  /></td>
       </tr>





       <tr>
        	<td height="26" class="label" >Experience Bracket in Years: &nbsp;</td>
         <td ><select name="years" style="width:200px;" >
             <option value="" selected="selected">Select Experience Range</option>
             <option value="1-2" >Between 01-02 years</option>
             <option value="2-5" >Between 02-05 years</option>
             <option value="5-7" >Between 05-07 years</option>
             <option value="7-9" >Between 07-09 years</option>
             <option value="10-12" >Between 10-12 yeas</option>
             <option value="12-99" >More than 12 years</option>
           </select>         </td>
		  <td class="label">Position Applied: &nbsp;</td>
         <td  ><input type="text" value="" name="txtpost"  style="width:200px;"  /></td>
       </tr>
       
       <tr>
        
         <td height="24" class="label">Location: &nbsp;</td>
         <td ><input type="text" value="" name="txtlocation"  /></td>
		  <td class="label">Citizenship: &nbsp;</td>
         <td ><select name="txtCountry" style="width:200px;" >
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
         <td height="24" class="label">Area of Experience: &nbsp;</td>
         <td colspan="3" ><input type="text" value="" name="txtAreaOfExpert"  style="width:400px;"  /><span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
       </tr>
       <tr>
         <td class="label">Key Qualification: &nbsp;</td>
         <td colspan="3"><input type="text" value="" name="txtkeyqualification" style="width:400px;" /><span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
       </tr>
     
      
       <tr>
         <td height="24" class="label">Work Experience Countries: &nbsp;</td>
         <td  colspan="3" ><input type="text" value="" name="workExpCountries" style="width:400px;" /><span style="font-size:10px" > (Enter Keywords Seperated by Comma)</span></td>
       </tr>
       
       <tr>
        	<td height="26" class="label" >CV Verification: &nbsp;</td>
         <td >
         
         <select name="cvVerification" style="width:200px;">
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
       
             	<td height="26" class="label" >Proj Distance KMS: </td>
         <td ><select name="projDistance" style="width:200px;" >
             <option value="" selected="selected">Select Range</option>
             <option value="700-900" >Between 701-900 Kms</option>
           </select>         </td>
         <td>&nbsp;</td>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td colspan="3">
          <input type="button" value=" GO " name="btn" style="background:#FF9900"   onclick="return validateSearch();"  /></td>
       </tr>
       <tr>
         <td  colspan="4" align="center" >&nbsp;</td>
       </tr>
     </table>
  </form>  </div>
   
   
<? include ("includes/footer.php"); ?>
</div>
</body>
</html>
<?
	$objDb  -> close( );
	$objDb2 -> close( );
?>
