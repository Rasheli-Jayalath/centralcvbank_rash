<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername 	= $_SESSION['uname'];

$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
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

if($cvID=="")
{
header('Location: submit-cv.php');
}
$clear  = $_REQUEST['clear'];
$save   = $_REQUEST['save'];
$next   = $_REQUEST['next'];
$update = $_REQUEST['update'];
$edit   = $_REQUEST['edit'];


$txtDescription   = $_REQUEST['txtDescription'];

if($clear !=""){
    $edit ="";
	$txtDescription   = "";
}

if($next !=""){
  header ('Location: achievements.php?id='.$cvID);
}

if($save !=""){
 $iSql = "Insert into tblothers SET   
            cvId   = '$cvID',         
			oDesc  = '$txtDescription'
		  ";
  if($objDb2->execute($iSql)){
$tuSql = "update tblcvmain SET datetime = now(),   ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);
    $edit ="";
	$txtDescription = "";
  }	  

}

if($update !=""){
 $uSql = "Update tblothers SET 
		   oDesc  = '$txtDescription'
			 
			where oId = '$edit' 
		  ";
  if($objDb2->execute($uSql)){
$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);

    $edit ="";
	$txtDescription   = "";
  }		  

}

if($edit !=""){
  $eSql = "Select * from tblothers where oId='$edit'";
  $objDb2 ->query($eSql);
  $eCount = $objDb2->getCount();
	if($eCount > 0){
	  $db_oId    = $objDb2->getField($i,oId);
	  $db_cvId   = $objDb2->getField($i,cvId);
	  $db_oDesc  = $objDb2->getField($i,oDesc);
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
     <form name="frmOtherTraining" action=""  method="post" style=" border-top:1px solid #fdcb10; margin-top:20px">
		 <table width="90%" align="center" cellpadding="1" cellspacing="1" >
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
						<td colspan="2"><h1>Other Training</h1></td>
					</tr>
					<tr>
						<td class="label" valign="top"><span class="mend">*</span>Description: &nbsp;</td>
						<td ><textarea  name="txtDescription" cols="80" rows="6" style="width:600px"/><?= $txtDescription !="" ? $txtDescription : $db_oDesc ?></textarea></td>
					</tr>
					<tr>
						<td height="43"></td>
						<td>
						<?php
						   if($edit!=""){
						 ?>
						  <input type="submit" value="Update" name="update" onclick="return OtherTraining();" />
						 <?php
						   }else{
						 ?>
						  <input type="submit" value="Save" name="save" onclick="return OtherTraining();" />
						 <?    
						   }
						 ?>
						&nbsp;&nbsp;<input type="submit" value="Next" name="next" /> &nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  />
						</td>
					</tr>
				</table>
	      </form>
			
	 <table width="90%"  align="center" cellpadding="1" cellspacing="1" border="0" >
                          <tr style="font-weight:bold; color:#0E0989; background:#F0F0F0">
                            <td width="84%" style="border: 1px solid #0E0989" height="25" >&nbsp;Other Trainings</td>
							<td width="9%" style="border: 1px solid #0E0989" align="center"> Edit</td>
                            <td width="7%"  style="border: 1px solid #0E0989" align="center"> Delete</td>                    

                          </tr>
                  <?
					$sSQL = " select * from tblothers where cvId='$cvID'";
					$objDb->query($sSQL);
					$iCount = $objDb->getCount( );
					if($iCount>0)
					{
						for ($i = 0 ; $i < $iCount; $i ++)
						{
						$oId   = $objDb->getField($i, oId);
						$oDesc = $objDb->getField($i, oDesc);
						
						?>
                          <tr>
                            <td width="84%" height="27" style="border-bottom:1px solid #cccccc" > 
                                <?=$oDesc?></td>
                            <td style="border-bottom:1px solid #cccccc" width="9%" align="center" >&nbsp;
							<a href="othertrainings.php?id=<?=$cvID?>&edit=<?=$oId?>" title="Edit" ><img src="../cvfinal/images/edit.png" width="28" height="26" /></a></td>
                    <td style="border-bottom:1px solid #cccccc" width="7%" align="center"><a href="delete-otrg.php?id=<?=$cvID?>&delete=<?=$oId?>" onClick="javascript: confirm('Do you really want to delete this record?');" title="Delete Other Training Record"><img src="images/delete22.png" alt="Delete" width="31" height="29"  /></a>
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
