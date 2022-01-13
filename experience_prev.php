<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];

$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];

$strusername 	= $_SESSION['uname'];



$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Dhaka'));
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
	
@include("fckeditor/fckeditor.php");

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

$txtStartDate 	= $_REQUEST['txtStartDate'];
$txtLastDate 	= $_REQUEST['txtLastDate'];

$txtEmployeer 	= $_REQUEST['txtEmployeer'];
$txtPosition 	= $_REQUEST['txtPosition'];
$txtPName 		= $_REQUEST['txtPName'];
$txtLocation 	= $_REQUEST['txtLocation'];
$txtCountry 	= $_REQUEST['txtCountry'];
$txtClient 		= $_REQUEST['txtClient'];
$txtPDesc 		= $_REQUEST['txtPDesc'];
$txtDutyPerform = $_REQUEST['txtDutyPerform'];
//$txtDetailTasks = $_REQUEST['txtDetailTasks'];
$txterSummary	= $_REQUEST['txterSummary'];
$txtrefName     = $_REQUEST['txtrefName'];
$txtrefDesig    = $_REQUEST['txtrefDesig'];
$txtrefTele     = $_REQUEST['txtrefTele'];
$txtrefEmail    = $_REQUEST['txtrefEmail'];
$txtprojCost    = $_REQUEST['txtprojCost'];
$txtiprojCost    = $_REQUEST['txtiprojCost'];
$txtprojDistance = $_REQUEST['txtprojDistance'];
$txtprojFundedby = $_REQUEST['txtprojFundedby'];
$todate 		 = $_REQUEST['todate'];

//echo "============================";
if($clear !="")
{
	header ('Location: cvlist.php?v=latest');
}

if($todate=='Y') $txtLastDate='To-Date';

if($save !="" ){

  			$iSql = "Insert into tblemploymentrecord SET 
					cvId        		= '$cvID',
					eFromDate 			= '$txtStartDate',
					eToDate 			= '$txtLastDate',
					employeer 			= '$txtEmployeer',
					jobTitle 			= '".mysql_real_escape_string($txtPosition)."',
					projTitle 			= '".mysql_real_escape_string($txtPName)."',
					location 			= '".mysql_real_escape_string($txtLocation)."',
					country 			= '$txtCountry',
					client 				= '".mysql_real_escape_string($txtClient)."',
					projDesc     		= '".mysql_real_escape_string($txtPDesc)."',
					dutiesPerformed     = '".mysql_real_escape_string($txtDutyPerform)."',
					ersummary	     	= '".mysql_real_escape_string($txterSummary)."',  
					refName     	    = '$txtrefName',  
					refDesig     	    = '$txtrefDesig',  
					refTele     	    = '$txtrefTele',  
					refEmail     	    = '$txtrefEmail',
					projCost     	    = '$txtprojCost',
					projFundedby   	    = '$txtprojFundedby',
					iprojCost     	    = '$txtiprojCost',
					projDistance   	    = '$txtprojDistance'
					 ";

/*  			$iSql = "Insert into tblemploymentrecord SET 
						cvId        		= '$cvID',
						eFromDate 			= '$txtStartDate',
						eToDate 			= '$txtLastDate',
						employeer 			= '$txtEmployeer',
						jobTitle 			= '".mysql_real_escape_string($txtPosition)."',
						projTitle 			= '".mysql_real_escape_string($txtPName)."',
						location 			= '".mysql_real_escape_string($txtLocation)."',
						country 			= '$txtCountry',
						client 				= '".mysql_real_escape_string($txtClient)."',
						projDesc     		= '".mysql_real_escape_string($txtPDesc)."',
						dutiesPerformed     = '".mysql_real_escape_string($txtDutyPerform)."',
						detailTasks     	= '".mysql_real_escape_string($txtDetailTasks)."',  
						ersummary	     	= '".mysql_real_escape_string($txterSummary)."',  
						refName     	    = '$txtrefName',  
						refDesig     	    = '$txtrefDesig',  
						refTele     	    = '$txtrefTele',  
						refEmail     	    = '$txtrefEmail'
					 ";
*/

						
						//echo $iSql;
  $objDb2->execute($iSql);
	
	
$tuSql = "update tblcvmain SET lastupdate = now(),  ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);
	
	$edit 			= "";
	$txtStartDate 	= "";
	$txtLastDate 	= "";
	$txtEmployeer 	= "";
	$txtPosition 	= "";
	$txtPName 		= "";
	$txtLocation 	= "";
	$txtCountry 	= "";
	$txtClient 		= "";
	$txtPDesc 		= "";
	$txtDutyPerform = "";
//	$txtDetailTasks = "";
	$txterSummary   = "";
	$txtrefName     = "";
	$txtrefDesig    = "";
	$txtrefTele     = "";
	$txtrefEmail    = "";

	$txtprojCost	= "";
	$txtiprojCost	= "";
	$txtprojDistance	= "";

	$txtprojFundedby= "";
}

if($update !="" ){
  $uSql = "Update tblemploymentrecord SET 
			cvId        		= '$cvID',
			eFromDate 			= '$txtStartDate',
			eToDate 			= '$txtLastDate',
			employeer 			= '$txtEmployeer',
			jobTitle 			= '".mysql_real_escape_string($txtPosition)."',
			projTitle 			= '".mysql_real_escape_string($txtPName)."',
			location 			= '".mysql_real_escape_string($txtLocation)."',
			country 			= '$txtCountry',
			client 				= '".mysql_real_escape_string($txtClient)."',
			projDesc     		= '".mysql_real_escape_string($txtPDesc)."',
			dutiesPerformed     = '".mysql_real_escape_string($txtDutyPerform)."',
			ersummary	     	= '".mysql_real_escape_string($txterSummary)."', 
			refName     	    = '$txtrefName',
			refDesig     	    = '$txtrefDesig',
			refTele     	    = '$txtrefTele',  
			refEmail     	    = '$txtrefEmail',
			projCost     	    = '$txtprojCost',
			projFundedby     	= '$txtprojFundedby',
			iprojCost     	    = '$txtiprojCost',
			projDistance   	    = '$txtprojDistance'

			where empId = '$edit' 
		  ";
 		  //echo $uSql."==upd============================";
  $objDb2->execute($uSql);	
  
$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);
	
	
	
	$edit 			= "";
	$txtStartDate 	= "";
	$txtLastDate 	= "";
	$txtEmployeer 	= "";
	$txtPosition 	= "";
	$txtPName 		= "";
	$txtLocation 	= "";
	$txtCountry 	= "";
	$txtClient 		= "";
	$txtPDesc 		= "";
	$txtDutyPerform = "";
//	$txtDetailTasks = "";
	$txterSummary   = "";
	$txtrefName     = "";
	$txtrefDesig    = "";
	$txtrefTele     = "";
	$txtprojDistance = "";
	$txtrefEmail    = "";
	$txtprojFundedby= "";
	$txtprojCost	= "";
	$txtiprojCost	= "";

}

if($edit !=""){
  $eSql = "Select * from tblemploymentrecord where empId='$edit'";
    $objDb2 ->query($eSql);
  $eCount = $objDb2->getCount();
	if($eCount > 0)
	{
	  $eFromDate    = $objDb2->getField(0,eFromDate);
	  $eToDate 		= $objDb2->getField(0,eToDate);
	  $employeer    = $objDb2->getField(0,employeer);
	  $jobTitle     = $objDb2->getField(0,jobTitle);
	  $projTitle    = $objDb2->getField(0,projTitle);
	  $location     = $objDb2->getField(0,location);
	  $country     	= $objDb2->getField(0,country);
	  $client     	= $objDb2->getField(0,client);
	  $projDesc     = $objDb2->getField(0,projDesc);
	  $dutiesPerformed = $objDb2->getField(0,dutiesPerformed);
//	  $detailTasks  = $objDb2->getField(0,detailTasks);
	  $ersummary    = $objDb2->getField(0,ersummary);
	  $refName      = $objDb2->getField(0,refName);
	  $refDesig     = $objDb2->getField(0,refDesig);
	  $refTele      = $objDb2->getField(0,refTele);
	  $refEmail     = $objDb2->getField(0,refEmail);
	  $projCost		= $objDb2->getField(0,projCost);  
	  $projFundedby	= $objDb2->getField(0,projFundedby);  
	  $iprojCost	= $objDb2->getField(0,iprojCost);
	  $projDistance = $objDb2->getField(0,projDistance);

	}
}

if($clear !="")
{
    $edit 			="";
	//$txtmop 		= "";
//	$txtsociety     = "";
}

if($next !=""){
  header ('Location: dta.php?id='.$cvID);
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('includes/metatag.php'); ?>
<script src="ckeditor/ckeditor.js"></script>
</head>

<body>
<div id="wrap">
   <?php
     include 'includes/header.php';
   ?>
   <div id="content">
     <form name="frmempInfo" action=""  method="post" onsubmit="return empInfo(thisform);" style=" border-top:1px solid #fdcb10; margin-top:20px">
		 <table width="90%" align="center" cellpadding="1" cellspacing="1" >
        <tr>
        <td height="24" colspan="8" bgcolor="#CCCC66" class="mouseoversmall" >
 	    <? echo $cvId;?> - <?php if($name!="") echo $name ; else echo $txtname; ?>
         
           		<?php 
		$piclen = strlen($pic);
	 
		if ($piclen > 12) {
		?>
        <img  src="<? echo $pic?>"   width="40" height="40"/> 
        <?php 
		} 
		elseif ($pic=="" or $piclen <= '12') {
		?>
        <img src="images/noimage/no-profile-img.gif" width="30" height="30" alt="profile " />
 		<?php 
		}
		?>          
        </td>          </tr>
					<tr>
					<td colspan="4"><h1>Experience:</h1></td>
					</tr>
					<tr>
						<td width="16%" colspan="1" class="label" ><span class="mend">*</span>From: &nbsp;</td>
						<td colspan="3">
                    <input type="text" name="txtStartDate" value="<?= $eFromDate !="" ? $eFromDate : $txtStartDate ?>"  maxlength="7" style="width:80px;" /> (MM-YYYY)
                    <span class="label" style="padding-left:20px;" ><span class="mend">*</span>To: &nbsp;</span>
                    <input type="text" name="txtLastDate" value="<?= $eToDate !="" ? $eToDate : $txtLastDate ?>" maxlength="7" style="width:80px;" /> (MM-YYYY) 
&nbsp;&nbsp;&nbsp; <input type="checkbox" value="Y" name="todate" <? if($eToDate=='To-Date') echo 'checked="checked"' ;?> onClick="javascript: document.txtLastDate.value=''" /> To-Date</td>
					</tr>
 			 
					<tr>
						<td class="label" ><span class="mend">*</span>Employer: &nbsp;</td>
						<td colspan="3"  ><input type="text" value="<?= $employeer !="" ? $employeer : $txtEmployeer ?>" name="txtEmployeer" style="width:600px;" /></td>
					</tr>
 
					<tr>
						<td class="label" ><span class="mend">*</span>Position/Title: &nbsp;</td>
						<td colspan="3"  ><input type="text" value="<?= $jobTitle !="" ? $jobTitle : $txtPosition ?>" name="txtPosition" style="width:600px;" /></td>
					</tr>
					<tr>
				<td valign="top" class="label" ><span class="mend">*</span>Project Name: &nbsp;<br /><font color="#FF0000"> <br />
						  <strong>	 [ Ctrl+Shift+V ]<br /></strong>for Paste Data here.) </font></td>
						<td colspan="3"  >
                        <!--=================================================-->
						<?
						if (trim(str_replace('&nbsp', '', strip_tags($_POST['projTitle']))) == '')
							if($projTitle=="") $projName=$txtPName; else $projName=$projTitle;
							$oFCKeditor = new FCKeditor('txtPName') ;	
							$oFCKeditor->BasePath   = 'fckeditor/';
							$oFCKeditor->Width      = "605px";
							$oFCKeditor->Height     = "250";
							$oFCKeditor->ToolbarSet = "Basic";
							$oFCKeditor->Value	    = $projName;
							$oFCKeditor->Create( );
						?>                        
                        <!--=================================================-->                        </td>
					</tr>
					<tr>
					  <td colspan="1" class="label" >&nbsp;</td>
					  <td colspan="3">&nbsp;</td>
		   </tr>
					<tr>
						<td width="16%" colspan="1" class="label" >Location: &nbsp;</td>
						<td colspan="3"><input type="text" value="<?= $location !="" ? $location : $txtLocation ?>" name="txtLocation" style="width:230px;" />
						<span class="label" style="padding-left:40px" ><span class="mend">*</span>Country: &nbsp;</span>
					  			<select name="txtCountry" style="width:250px;" >
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
						   </select></td>
					</tr>
					<tr>
						<td class="label" valign="top" >Client: &nbsp;</td>
						<td colspan="3"  ><textarea name="txtClient" rows="1" cols="44" style="width:600px" /><?= $client !="" ? $client : $txtClient ?></textarea></td>
					</tr>
                    
                    					<tr>
						<td class="label" >Funding Provided by: &nbsp;</td>
						<td colspan="3"  ><input type="text" value="<?= $projFundedby !="" ? $projFundedby : $txtprojFundedby ?>" name="txtprojFundedby" style="width:600px;" /></td>
					</tr>

                    
                    <tr>
					                      <td class="label" valign="top">&nbsp;</td>
					                      <td colspan="3" >&nbsp;</td>
           </tr>
                    <tr>
						<td class="label" valign="top">Project Description/<br />
				      Main Project Features:<br /><font color="#FF0000"> <br />
					  <strong>	 [ Ctrl+Shift+V ]<br /></strong>for Paste Data here.) </font></td>

<?php /*?>						<td  >
                <!-- <div class="ckeditor" contenteditable="true" id="editor1" tabindex="1"></div> -->
                        <!--=================================================-->
						<?
							if($projDesc=="") $projDes=$txtPDesc; else $projDes=$projDesc;
 						?>                        
                        <!--=================================================-->                       
                <textarea class="ckeditor" cols="70" id="ckeditorcv" rows="10" tabindex="1"  name="txtPDesc" >
				<?= $projDesc !="" ? $projDes : $txtPDesc ?>
                 </textarea>
				<script src="ckeditor/ckeditortoolbar.js"></script></td>
<?php */?>
					<td colspan="3" >
                        <!--=================================================-->
						<?
							if($projDesc=="") $projDesc=$txtPDesc; else $projDesc=$projDesc;
							$oFCKeditor = new FCKeditor('txtPDesc') ;	
							$oFCKeditor->BasePath   = 'fckeditor/';
							$oFCKeditor->Width      = "605px";
							$oFCKeditor->Height     = "250px";
							$oFCKeditor->ToolbarSet = "Basic";
							$oFCKeditor->Value	    = $projDesc;
							$oFCKeditor->Create( );
						?>                        
                        <!--=================================================-->                        </td>
 
					</tr>
	   
	   				<tr>
	   				  <td class="label" >&nbsp;</td>
	   				  <td  >&nbsp;</td>
	   				  <td align="right">&nbsp;</td>
	   				  <td  >&nbsp;</td>
		   </tr>
	   				<tr>
						<td class="label" > <strong> Project Cost:</strong></td>
						<td width="30%"  ><input type="text" value="<?= $iprojCost !="" ? $iprojCost : $txtiprojCost ?>" name="txtiprojCost" style="width:250px;" /></td>
						<td width="14%" align="right" class="label"> <strong>Project Roads Length (Kms): &nbsp;</strong></td>
						<td width="40%"  ><input type="text" value="<?= $projDistance !="" ? $projDistance : $txtprojDistance ?>" maxlength="4" name="txtprojDistance" style="width:170px;" /></td>
					</tr> 
					<tr>
                    <td class="label" >&nbsp;</td>
                    <td colspan="3"  >&nbsp;</td>
					</tr> 
		
	   
	   
					<tr>
					  <td class="label" valign="top">&nbsp;</td>
					  <td colspan="3"  >&nbsp;</td>
		   </tr>
					<tr>
						<td class="label" valign="top"><span class="mend">*</span>Duties Performed: &nbsp;<br />
						<font color="#FF0000"> <br />
						  <strong>	 [ Ctrl+Shift+V ]<br /></strong>for Paste Data here.) </font></td>
						<td colspan="3"  >
                        <!--=================================================-->
						<?
							if($dutiesPerformed=="") $dutyPerform=$txtDutyPerform; else $dutyPerform=$dutiesPerformed;
							$oFCKeditor = new FCKeditor('txtDutyPerform') ;	
							$oFCKeditor->BasePath   = 'fckeditor/';
							$oFCKeditor->Width      = "605px";
							$oFCKeditor->Height     = "250px";
							$oFCKeditor->ToolbarSet = "Basic";
							$oFCKeditor->Value	    = $dutyPerform;
							$oFCKeditor->Create( );
						?>                        
                        <!--=================================================-->                        </td>
					</tr>
<?php /*?>					<tr>
						<td class="label" valign="top">Detailed Tasks Assigned: &nbsp;</td>
						<td  >
                        <!--=================================================-->
						<?
							if($detailTasks=="") $tasks=$txtDetailTasks; else $tasks=$detailTasks;
							$oFCKeditor = new FCKeditor('txtDetailTasks') ;	
							$oFCKeditor->BasePath   = 'fckeditor/';
							$oFCKeditor->Width      = "605px";
							$oFCKeditor->Height     = "250";
							$oFCKeditor->ToolbarSet = "Basic";
							$oFCKeditor->Value	    = $tasks;
							$oFCKeditor->Create( );
						?>                        
                        <!--=================================================-->                        </td>
					</tr>
*/?>
<!--
	   <tr>
						<td class="label" valign="top">Summary of Activities performed relevant to the Assignment:<br /><br /><font color="#FF0000"> <br />
						  <strong>	 [ Ctrl+Shift+V ]<br /></strong>for Paste Data here.) </font></td>
						<td  >
                        <!--================================================= 
						<?
							if($ersummary=="") {$summary=$txterSummary;} else $summary=$ersummary;
							$oFCKeditor = new FCKeditor('txterSummary') ;	
							$oFCKeditor->BasePath   = 'fckeditor/';
							$oFCKeditor->Width      = "605px";
							$oFCKeditor->Height     = "250";
							$oFCKeditor->ToolbarSet = "Basic";
							$oFCKeditor->Value	    = $summary;
							$oFCKeditor->Create( );
						?>                        
                        <!--=================================================                        </td>
					</tr>
	-->
					<tr>
					  <td class="label" ><h2>&nbsp;</h2></td>
					  <td colspan="3"  >&nbsp;</td>
		   </tr>
				<!--	<tr>
						<td class="label" > </span>Ref. Name: &nbsp;</td>
						<td  ><input type="text" value="<?= $refName !="" ? $refName : $txtrefName ?>" name="txtrefName" style="width:600px;" /></td>
					</tr>
					<tr>
						<td class="label" > </span>Ref. Designation: &nbsp;</td>
						<td  ><input type="text" value="<?= $refDesig !="" ? $refDesig : $txtrefDesig ?>" name="txtrefDesig" style="width:600px;" /></td>
					</tr>
					<tr>
						<td class="label" > </span>Ref. Tele: &nbsp;</td>
						<td  ><input type="text" value="<?= $refTele !="" ? $refTele : $txtrefTele ?>" name="txtrefTele" style="width:600px;" /></td>
					</tr>
					<tr>
						<td class="label" > </span>Ref. Email: &nbsp;</td>
						<td  ><input type="text" value="<?= $refEmail !="" ? $refEmail : $txtrefEmail ?>" name="txtrefEmail" style="width:600px;" /></td>
					</tr> 

-->

					<!-- <tr>
						<td class="label" > </span>Cost of Project: &nbsp;</td>
						<td  ><input type="text" value="<?= $projCost !="" ? $projCost : $txtprojCost ?>" name="txtprojCost" style="width:600px;" /></td>
					</tr> --> 
				
					<tr>
						<td height="38"></td>
						<td colspan="3" >
						 <?php
						   if($edit!=""){
						 ?>
						  <input type="submit" value="Update" name="update" onclick="return empInfo()" />
						 <?php
						   }else{
						 ?>
						  <input type="submit" value="Save" name="save" onclick="return empInfo()" />
						 <?    
						   }
						 ?>
						&nbsp;&nbsp;<input type="submit" value="Next" name="next" /> &nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  />
					  </td>
					</tr>
				</table>
</form>
			
			<table width="100%"  align="center" cellpadding="1" cellspacing="1" border="0" >
			<tr style="font-weight:bold; color:#0E0989; background:#F0F0F0">
			<td width="5%"  style="border: 1px solid #0E0989" > From </td>
			<td width="5%"  style="border: 1px solid #0E0989" > To</td>
			<td width="10%" style="border: 1px solid #0E0989" > Employer</td>
			<td width="10%" style="border: 1px solid #0E0989" > Job Title</td>
			<td width="12%" style="border: 1px solid #0E0989" > Project Name</td>
			<td width="8%"  style="border: 1px solid #0E0989" > Location</td>
			<td width="8%"  style="border: 1px solid #0E0989" > Country</td>
			<td width="6%"  style="border: 1px solid #0E0989" > Client</td>
			<td width="18%" style="border: 1px solid #0E0989" > Project Description</td>
			<td width="15%" style="border: 1px solid #0E0989" > Duties Performed</td>
<!-- 			<td width="15%" style="border: 1px solid #0E0989" > Project Cost</td> -->
			<td width="15%" style="border: 1px solid #0E0989" > iProject Cost</td>
			<td width="15%" style="border: 1px solid #0E0989" >  Length</td>
<!--		<td width="15%" style="border: 1px solid #0E0989" > Detailed Tasks</td>
			<td width="15%" style="border: 1px solid #0E0989" > Exp Rec. Summary</td>
			<td width="15%" style="border: 1px solid #0E0989" > Ref. Name</td>  -->
			<td width="3%"  style="border: 1px solid #0E0989" > Edit</td>

<?php if ($cvadmflag==1) {
	?>
            <td width="1%"  style="border: 1px solid #0E0989" > Delete</td>
<? 
}
?>
			  </tr>	
			<?
				$sSQL = " select * from tblemploymentrecord where cvId='$cvID' order by CONCAT(RIGHT(eFromDate,4), LEFT(eFromDate,4)) desc";
				$objDb->query($sSQL);
				$iCount = $objDb->getCount( );
				if($iCount>0)
				{
					for ($i = 0 ; $i < $iCount; $i ++)
					{
					$eFromDate  			= $objDb->getField($i, eFromDate);
					$eToDate  				= $objDb->getField($i, eToDate);
					$employeer  			= $objDb->getField($i, employeer);
					$jobTitle  				= $objDb->getField($i, jobTitle);
					$projTitle  			= $objDb->getField($i, projTitle);
					$location  				= $objDb->getField($i, location);
					$country				= $objDb->getField($i, country);
					$client  				= $objDb->getField($i, client);
					$projDesc  				= $objDb->getField($i, projDesc);
					$dutiesPerformed  		= $objDb->getField($i, dutiesPerformed);
//					$detailTasks  			= $objDb->getField($i, detailTasks);
					$ersummary  			= $objDb->getField($i, ersummary);
					$refName                = $objDb->getField($i, refName);
					$refDesig               = $objDb->getField($i, refDesig);
					$refTele                = $objDb->getField($i, refTele);
					$refEmail               = $objDb->getField($i, refEmail);
					$projCost				= $objDb->getField($i, projCost);	

					$iprojCost				= $objDb->getField($i, iprojCost);	
					$projDistance			= $objDb->getField($i, projDistance);	
					$projFundedby			= $objDb->getField($i, projFundedby);	

					$empId  				= $objDb->getField($i, empId);

					$sSQL2 = " select name FROM tblcountries WHERE countryId='$country' ";
					$objDb2->query($sSQL2);
					$CountryName=$objDb2->getField(0, name);	
					?>
                    
					<tr>
					<td width="5%" height="27" style="border-bottom:1px solid #cccccc" ><?=$eFromDate?></td>
					<td style="border-bottom:1px solid #cccccc" width="5%" ><?=$eToDate?></td>
					<td style="border-bottom:1px solid #cccccc" width="10%" ><?=$employeer?></td>
					<td style="border-bottom:1px solid #cccccc" width="10%" ><?=$jobTitle?></td>
					<td style="border-bottom:1px solid #cccccc" width="12%" ><?=$projTitle?></td>
					<td style="border-bottom:1px solid #cccccc" width="8%" ><?=$location?></td>
					<td style="border-bottom:1px solid #cccccc" width="8%" ><?=$CountryName?></td>
					<td style="border-bottom:1px solid #cccccc" width="6%" ><?=$client?></td>
				 	<td style="border-bottom:1px solid #cccccc" width="15%" ><?=substr($projDesc, 0, 100)."..."?> </td>
					<td style="border-bottom:1px solid #cccccc" width="15%" ><?=substr($dutiesPerformed, 0, 100)."..."?> </td>
<!--  					<td style="border-bottom:1px solid #cccccc" width="15%" ><?=$projCost?></td>  -->
 					<td style="border-bottom:1px solid #cccccc" width="15%" ><?=$iprojCost?></td>
 					<td style="border-bottom:1px solid #cccccc" width="15%" ><?=$projDistance?></td>                    
                    
<?php /*?>				 	<td style="border-bottom:1px solid #cccccc" width="15%" ><?=substr($detailTasks, 0, 100)."..."?> </td>
					<td style="border-bottom:1px solid #cccccc" width="15%" ><?=$ersummary?></td>
					<td style="border-bottom:1px solid #cccccc" width="15%" ><?=$refName?></td>
<?php */?>					
<td style="border-bottom:1px solid #cccccc" width="3%" ><a href="experience.php?id=<?=$cvID?>&edit=<?=$empId?>"><img src="images/edit.png" width="30" height="30" /></a></td>

<?php if ($cvadmflag==1) {
	?>    <td style="border-bottom:1px solid #cccccc" width="3%" >&nbsp; <a href="delete-experience.php?id=<?=$cvID?>&delete=<?=$empId?>" onclick="return confirm_delete('Do you want to Delete?');" title="Delete Experience"  >
<script type="text/javascript">function confirm_delete(question) {if(confirm(question)){alert("Action to Delete!");}else{return false;} } </script>
<img src="images/delete22.png" alt="Delete" width="23" height="25"  /></a></td>
<? 
}
?>
            </tr>

					<?
					}
				}
				?>
			</table>
		<br clear="all" />
   </div>
   <? include ("includes/footer.php"); ?>
</div>
</body>
</html>
<?
	$objDb  -> close( );
	$objDb2 -> close( );
?>