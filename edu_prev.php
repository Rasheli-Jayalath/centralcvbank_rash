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
header('Location: submit-cv.php');
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('includes/metatag.php'); ?>
</head>
<body>
<div id="wrap">
   <?php
     include 'includes/header.php';
   ?>
   <link rel="stylesheet" type="text/css" href="css/style.css">

 <div id="content">
      <form name="frmEduInfo" action=""  method="post"  style=" border-top:1px solid #fdcb10; margin-top:20px">
		 <table width="94%" align="center" cellpadding="1" cellspacing="1" >
        <tr>
        <td height="24" colspan="6" bgcolor="#CCCC66" class="mouseoversmall" >
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
        </td>    
        </tr>
					<tr>
						<td colspan="2"><h1><span class="mend">*</span>Education Information</h1></td>
					</tr>
					<tr>
						<td height="32" valign="" class="label"><span class="mend">*</span>Passing Year: &nbsp;</td>
					  <td ><input type="text" value="<?= $txtDate !="" ? $txtDate : $db_eduYear ?>" name="txtDate" style="width:80px;"  maxlength="4" /> <span style="font-size:12px;">(YYYY)</span></td>
					</tr>
					<tr>
					  <td height="35" class="label" >Educational Descipline </td>
					  <td > 
                        <p>
                          <!--                        <p>
                       
                            <option value="" selected="selected">Edu. Category</option>
                            <option value="Doctorate"  <?php if($ediscipline=='Doctorate'  || $db_ediscipline=='Doctorate')  echo 'selected="selected"'; ?>>Doctorate</option>
                            <option value="M.Phil/MS"  <?php if($ediscipline=='M.Phil/MS'  || $db_ediscipline=='M.Phil/MS')  echo 'selected="selected"'; ?>>M.Phil/MS</option>
                            <option value="Masters"    <?php if($ediscipline=='Masters'    || $db_ediscipline=='Masters')    echo 'selected="selected"'; ?>>Masters</option>
                            <option value="Graduation" <?php if($ediscipline=='Graduation' || $db_ediscipline=='Graduation') echo 'selected="selected"'; ?>>Graduation</option>
                          </select>
                        </p>
                        <p>&nbsp;</p>
                        <p>
                          <select name="db_ediscipline" style="width:205px;" >
                            <option value="" selected="selected">--- Select One ---</option>
-->
                          <select name="db_ediscipline" style="width:200px;" >
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
                      </p></td>
   </tr>
					<tr>
						<td width="9%" height="27" class="label" ><span class="mend">*</span>Degree Title: &nbsp;</td>
					  <td width="43%" ><input type="text" value="<?= $txtDtitle !="" ? $txtDtitle : $db_eDegreeTitle ?>" name="txtDtitle" style="width:600px;" /></td>
					</tr>
					<tr>
						<td width="9%" height="32" class="label" ><span class="mend">*</span>Institute: &nbsp;</td>
					  <td width="43%" ><input type="text" value="<?= $txtInstitute !="" ? $txtInstitute : $db_eInstitute ?>" name="txtInstitute" style="width:600px;" /></td>
					</tr>
					<tr>
						<td width="9%" height="37" colspan="1" class="label" ><span class="mend">*</span>Location: &nbsp;</td>
						<td><input type="text" value="<?= $txtLocation !="" ? $txtLocation : $db_eLocation ?>" name="txtLocation" style="width:300px;" />
						<span class="label" style="padding-left:40px" ><span class="mend">*</span>Country: &nbsp;</span>
					  			<select name="txtCountry" style="width:180px;" >
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
							<option value="<?= $iId ?>"<? if($iId == $db_eCountry  || $iId==$txtCountry) echo " selected"; ?>><?= $sName ?></option>
							<?
							}
							?>
								</select>					  </td>
					</tr>
					
					<tr>
						<td width="9%" height="36" class="label" ><span class="mend">*</span>Specialization: &nbsp;</td>
					  <td width="43%" ><input type="text" value="<?= $txtSpecialization !="" ? $txtSpecialization : $db_eSpecialization ?>" name="txtSpecialization" style="width:600px;" /></td>
					</tr>
					
					<tr>
						<td height="39"></td>
						<td>
					     <?php
						   if($edit!=""){
						 ?>
						  <input type="submit" value="Update" name="update" onclick="return eduInfo();"/>
						 <?php
						   }else{
						 ?>
						  <input type="submit" value="Save" name="save" onclick="return eduInfo();"/>
						 <?    
						   }
						 ?>
						&nbsp;&nbsp;<input type="submit" value="Next" name="next" /> &nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  />
						</td>
						</tr>
					</table>

	 </form> <br clear="all" />
	 <table width="100%"  align="center" cellpadding="1" cellspacing="1" border="0" >
                          <tr style="font-weight:bold; color:#0E0989; background:#F0F0F0">
                            <td width="9%" height="25" align="center" style="border: 1px solid #0E0989" > End <br />
                            Year</td>
                            <td width="25%" style="border: 1px solid #0E0989" >Discipline</td>
                            <td width="25%" style="border: 1px solid #0E0989" >&nbsp; Degree Title</td>
							<td width="19%" style="border: 1px solid #0E0989" >&nbsp; Institute</td>
                            <td width="14%" style="border: 1px solid #0E0989" >&nbsp; Location</td>
							<td width="13%" style="border: 1px solid #0E0989" >&nbsp; Country</td>
							<td width="14%" style="border: 1px solid #0E0989" > Specialization</td>
							<td width="16%"  style="border: 1px solid #0E0989" > Edit</td>
                            <td width="3%"  style="border: 1px solid #0E0989"align="center"   > Delete</td>                                                
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
                            <td width="9%" height="27" style="border-bottom:1px solid #cccccc" ><?=$eduYear?></td>
                            <td style="border-bottom:1px solid #cccccc" width="25%" ><?=$ediscipline?></td>
                            <td style="border-bottom:1px solid #cccccc" width="25%" ><?=$eDegreeTitle?></td>
								 <td style="border-bottom:1px solid #cccccc" width="19%" ><?=$eInstitute?></td>
                            <td style="border-bottom:1px solid #cccccc" width="14%" ><?=$eLocation?></td>
                            <td style="border-bottom:1px solid #cccccc" width="13%" ><?=$CountryName?></td>
                            <td style="border-bottom:1px solid #cccccc" width="14%" ><?=$eSpecialization?></td>
                            <td style="border-bottom:1px solid #cccccc" width="6%" >&nbsp;
 		 				 <a href="education.php?id=<?=$cvID?>&edit=<?=$eduId?>"><img src="images/edit.png" width="22" height="22" /></a></td>
	           		    <td style="border-bottom:1px solid #cccccc" width="6%" >&nbsp; <a href="delete-edu.php?id=<?=$cvID?>&delete=<?=$eduId?>" onClick="javascript: confirm('Do you really want to delete this record?');" title="Delete Education record"><img src="images/delete22.png" alt="Delete" width="20" height="20"  /></a>


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
