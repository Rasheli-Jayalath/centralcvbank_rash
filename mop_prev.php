<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];

$strusername 	= $_SESSION['uname'];

$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
$updatedon = $date->format('Y-m-d H:i:s');



$txtid				= $_REQUEST['txtid'];
$txtname			= $_REQUEST['txtname'];

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

$txtmop 	= $_REQUEST['txtmop'];
$txtsociety = $_REQUEST['txtsociety'];


if($clear !="")
{
    $edit 			="";
	$txtmop 		= "";
	$txtsociety     = "";
}

if($next !=""){
  header ('Location: education.php?id='.$cvID);
}

if($save !="" ){
  			$iSql = "Insert into tblmop SET 
            cvId        = '$cvID',
			mop 		= '$txtmop',
			society     = '$txtsociety' 
		  ";
  $objDb2->execute($iSql);
  
  	$tuSql = "update tblcvmain SET datetime = now(), ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);


	$edit 			="";		  
	$txtmop 		= "";
	$txtsociety     = "";
}

if($update !="" ){
  $uSql = "Update tblmop SET 
			cvId        = '$cvID',
			mop 		= '$txtmop',
			society     = '$txtsociety' 
			where mId = '$edit' 
		  ";
  $objDb2->execute($uSql);	
	$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);

  	$edit 			="";	  
	$txtmop 		= "";
	$txtsociety     = "";
}

if($edit !=""){
  $eSql = "Select * from tblmop where mId='$edit'";
  $objDb2 ->query($eSql);
  $eCount = $objDb2->getCount();
	if($eCount > 0){
	  $dmId         = $objDb2->getField(0,mId);
	  $dmop 		= $objDb2->getField(0,mop);
	  $dsociety     = $objDb2->getField(0,society);
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
     <form name="frmmop" action=""  method="post"  style=" border-top:1px solid #fdcb10; margin-top:20px">
		 <table width="93%"  align="center" cellpadding="1" cellspacing="1" border="0" >
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

         
         
        </td>         </tr>
					<tr>
						<td colspan="2" ><h1>Member of Professional Associations:
						</h1></td>
					</tr>
<!--					<tr>
						<td width="25%" class="label" >Member of Professional: &nbsp;</td>
					  <td width="75%" ><input type="text" value="<?= $dmop !="" ? $dmop : $txtmop ?>" name="txtmop"  style="width:600px"  /></td>
					</tr>
-->
  <tr>
    <td class="label" >&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
						<td class="label" ><span style="border: 0px solid #0E0989">Member of Professional Association(s)</span>:</td>
						<td ><input type="text" value="<?= $dsociety !="" ? $dsociety : $txtsociety ?>" name="txtsociety"   style="width:500px" /></td>
					</tr>
					<tr>
					  <td height="16"></td>
					  <td >&nbsp;</td>
		   </tr>
					<tr>
						<td height="38"></td>
						<td >
						 <?php
						   if($edit!=""){
						 ?>
						  <input type="submit" value="Update" name="update" onclick="return mop()" />
						 <?php
						   }else{
						 ?>
						  <input type="submit" value="Save" name="save" onclick="return mop()" />
						 <?    
						   }
						 ?>
						&nbsp;&nbsp;<input type="submit" value="Next" name="next" /> &nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  />
						</td>
					</tr>
					<tr>
					  <td height="16"></td>
							 <td align="right" > <font color="#999999">This page updated on: <?php if($lastupdate!="") echo $lastupdate ; else echo $txtlastupdate; ?>
</font></td>
		   </tr>
					<tr>
					  <td height="16"></td>
					  <td >&nbsp;</td>
                      
		   </tr>
					
				</table>
</form>
		   <table width="93%"  align="center" cellpadding="1" cellspacing="1" border="0" >
			<tr style="font-weight:bold; color:#0E0989; background:#F0F0F0">
					<td width="5%" height="36" align="center" style="border: 1px solid #0E0989" >Sr. No.</td> 
					<td width="77%" style="border: 1px solid #0E0989" >&nbsp; Professional Association(s)</td>
					<td width="7%" style="border: 1px solid #0E0989" align="center" >Edit</td>
              <td width="11%"  style="border: 1px solid #0E0989" align="center"> Delete</td>                    
 		     </tr>	
				   <?
				$sSQL = " select * from tblmop where cvId='$cvID'";
				$objDb->query($sSQL);
				$iCount = $objDb->getCount( );
				if($iCount>0)
				{
					for ($i = 0 ; $i < $iCount; $i ++)
					{
					$mop  		= $objDb->getField($i, mop);
					$society  	= $objDb->getField($i, society);
					$mId  		= $objDb->getField($i, mId);
					
					?>
				   <tr>
<!--					<td width="55%" height="27" style="border-bottom:1px solid #cccccc" >&nbsp;<?=  $mop?></td> -->
					<td width="5%" align="center" style="border-bottom:1px solid #cccccc" >&nbsp;<?=$i+1?></td>
					<td style="border-bottom:1px solid #cccccc" width="77%" >&nbsp;<?=$society?></td>
					<td style="border-bottom:1px solid #cccccc" width="7%" align="center"><a href="mop.php?id=<?=$cvID?>&edit=<?=$mId?>"><img src="../cvfinal/images/edit.png" width="37" height="32" /></a>
					<td style="border-bottom:1px solid #cccccc" width="11%" align="center">&nbsp; <a href="delete-mop.php?id=<?=$cvID?>&delete=<?=$mId?>" onClick="javascript: confirm('Do you really want to delete this record?');" title="Delete Membership"><img src="../cvfinal/images/delete22.png" alt="Delete" width="24" height="31" ></a>
                    
                    </td>
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