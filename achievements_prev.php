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

$cvID 	= $_REQUEST['id'];

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
  header ('Location: experience.php?id='.$cvID);
}

if($save !=""){
 	$iSql = "Insert into tblachievements SET   
            cvId   = '$cvID',         
			aDesc  = '$txtDescription'
		  ";
  if($objDb2->execute($iSql)){
$tuSql = "update tblcvmain SET datetime = now(),  ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);
    $aId ="";
	$txtDescription = "";
  }	  
}

if($update !=""){
 $uSql = "Update tblachievements SET 
		   aDesc  = '$txtDescription'
 			where aId = '$edit' 
		  ";
		  
  if($objDb2->execute($uSql)){
$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";

	$objDb2->execute($tuSql);
    $edit ="";
	$txtDescription   = "";
  }	
 }



if($edit !=""){
  $eSql = "Select * from tblachievements where aId='$edit'";
  $objDb2 ->query($eSql);

  $eCount = $objDb2->getCount();
	if($eCount > 0){
	  $db_aId    = $objDb2->getField($i,aId);
	  $db_cvId   = $objDb2->getField($i,cvId);
	  $db_aDesc  = $objDb2->getField($i,aDesc);
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
	<script src="ckeditor/ckeditor.js"></script>
	<link href="sample.css" rel="stylesheet">
	<style>
 		.cke_focused,
		.cke_editable.cke_focused
		{
			outline: 1px groove blue !important;
			*border: 3px dotted blue !important;	/* For IE7 */
		}
 	</style>
	<script>

		CKEDITOR.on( 'instanceReady', function( evt ) {
			var editor = evt.editor;
			editor.setData( '<?= $txtDescription !="" ? $txtDescription : $db_aDesc ?>' );
		 

			// Apply focus class name.
			editor.on( 'focus', function() {
				editor.container.addClass( 'cke_focused' );
			});
			editor.on( 'blur', function() {
				editor.container.removeClass( 'cke_focused' );
			});

			// Put startup focus on the first editor in tab order.
			if ( editor.tabIndex == 1 )
				editor.focus();
		});

	</script>
 </head>
<body>
<div id="wrap">
   <?php
     include 'includes/header.php';
    ?>
   <div id="content">
     <form name="frmAchievement" action=""  method="post" style=" border-top:1px solid #fdcb10; margin-top:20px">
		 <table width="90%" align="center" cellpadding="1" cellspacing="1" >
        <tr>
        <td height="24" colspan="7" bgcolor="#CCCC66" class="mouseoversmall" >
        
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
						<td colspan="3"><h1>Notable Achievements/Publications:</h1><font color="#FF0000"> <br />
						  <strong> [ Ctrl+Shift+V ]</strong> for Paste Data here.) </font></td>
					</tr>
					<tr>
					  <td colspan="2"   align="left" valign="top">
                    
                    <tr>
                      <td>&nbsp;</td>
                      <td height="36"><span class="mend">*</span> Description:  &nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                    <td></td>
                    <td height="36">
                
                <h1 class="samples">
                <textarea class="ckeditor" cols="80" id="editor1" rows="10" tabindex="1"  name="txtDescription" >
				<?= $txtDescription !="" ? $txtDescription : $db_aDesc ?> </textarea>
                </h1>
                <div class="ckeditor" contenteditable="true" id="editor1" tabindex="1"></div>
                </td>
   
       
           </tr>
					<tr>
						<td width="88%" colspan="2"   align="left" valign="top">
					     <!-- <textarea  name="txtDescription" cols="80" rows="6"/><?= $txtDescription !="" ? $txtDescription : $db_aDesc ?></textarea>--> </td> 
					</tr>
					<tr>
						<td height="36" colspan="3">
						  <?php
						   if($edit!=""){
						 ?>
						  <input type="submit" value="Update" name="update" onclick="return frmAchievement();" />
						  <?php
						   }else{
						 ?>
						  <input type="submit" value="Save" name="save" onclick="return frmAchievement();" />
						  <?php    
						   }
						 ?>
						  &nbsp;&nbsp;<input type="submit" value="Next" name="next" /> &nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  />					    </td>
					</tr>
				</table>
			</form>
		
	 <table width="90%"  align="center" cellpadding="1" cellspacing="1" border="0" >
                          <tr style="font-weight:bold; color:#0E0989; background:#F0F0F0">
                          <td width="91%" style="border: 1px solid #0E0989" height="29" >&nbsp;Notable Achievement/Publications</td>
						  <td width="9%"  style="border: 1px solid #0E0989" >&nbsp; Edit</td>
   						  <td width="3%"  style="border: 1px solid #0E0989" > Delete</td>                    
                          </tr>
                  <?php
					$sSQL = " select * from tblachievements where cvId='$cvID'";
					$objDb->query($sSQL);
					$iCount = $objDb->getCount( );
					if($iCount>0)
					{
						for ($i = 0 ; $i < $iCount; $i ++)
						{
						$aId   = $objDb->getField($i, aId);
						$aDesc = $objDb->getField($i, aDesc);
						
						?>
                          <tr>
                            <td width="91%" height="27" style="border-bottom:1px solid #cccccc" >&nbsp;
                                <?=$aDesc?></td>
                            <td style="border-bottom:1px solid #cccccc" width="9%" >&nbsp;
							<a href="achievements.php?id=<?=$cvID?>&edit=<?=$aId?>" title="Edit" ><img src="images/edit.png" width="30" height="30" /></a>
                     
                        <td style="border-bottom:1px solid #cccccc" width="3%" >&nbsp; <a href="delete-achieve.php?id=<?=$cvID?>&delete=<?=$aId?>" onClick="javascript: confirm('Do you really want to delete this record?');" title="Delete Achievement's Record"><img src="images/delete22.png" alt="Delete" width="23" height="25"  /></a>
        </td>
                          </tr>
                          <?php
						}
				}
				?>
     </table>	
		<br clear="all" />
   </div>
   <?php include ("includes/footer.php"); ?>
</div>
</body>
</html>
