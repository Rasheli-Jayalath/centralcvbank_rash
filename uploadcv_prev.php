<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$strusername = $_SESSION['uname'];
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];



$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Dhaka'));
$updatedon = $date->format('Y-m-d H:i:s');

if ($strusername==null )
{
	header("Location: ../index.php?init=3");
}
?>
<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
@include("fckeditor/fckeditor.php");

$cvID = $_REQUEST['id'];
$msg="";

$saveBtn	= $_REQUEST['save']; 
$updateBtn	= $_REQUEST['update'];
$clear		= $_REQUEST['clear'];
$next    	= $_REQUEST['next'];
//--------------------------------------------------------------
$txtid				= $_REQUEST['txtid'];
$txtname			= $_REQUEST['txtname'];
$signature			= $_REQUEST['signature'];
$picture			= $_REQUEST['picture'];
$originalcv			= $_REQUEST['originalcv'];
$birthcert			= $_REQUEST['birthcert'];
$edudocs			= $_REQUEST['edudocs'];
$expdocs			= $_REQUEST['expdocs'];

$txtdatetime		= date('Y-m-d');
$txtlastupdate		= $_REQUEST['txtlastupdate'];
$txtupdated_on		= $_REQUEST['txtupdated_on'];


$now = new DateTime();
$nowyear = $now->format("Y");

//-------------------------------------------------
if($clear!="")
{
$txtid				= '';
$txtname			= '';
$txtdob				= '';
$chkgender			= '';
$opmstatus			= '';
$txtcnic			= '';
$txtlandline		= '';
$txtmobile			= '';
$txtemail			= '';
$cmbcitizen			= '';
$txtlocation    	= '';
$chksmec			= '';
$chkegc				= '';
$txtpassport		= '';
$txttotalexperience	= '';
$txtstartexpyr		= '';
$txtprofession		= '';
$txtssn				= '';
$txtposition		= '';
$txtpaddress		= '';
$txtoaddress		= '';
$txtcaddress		= '';
$txtareaofexpertise	= '';
$txtwecountries		= '';
$txtcompcap			= '';
$txtKeyQualification= '';
$txtremarks			= '';
$txtinfo1			= '';
$txtinfo2			= '';
$txtinfo3			= '';
$txtinfodetail		= '';
$txtref				= '';
$originalcv			= '';
$birthcert			= '';
$edudocs			= '';
$expdocs			= '';
$picture			= '';
$signature			= '';
$txtlastupdate		= '';
$txtupdated_on		= '';
}

if($next !=""){
  header('Location: submit-cv.php?id='.$txtid);
}

if($saveBtn!="")
{
	$picture=$_FILES['picture']['name'];
	if ($picture!='')
	{
		$target_path = "images/pics/";
		$picture = $txtid."-".$picture;
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 		
	}

	$signature = $_FILES['signature']['name'];
	if ($signature!='')
	{  
		$target_path = "images/signature/";
//		$signature = $txtid."-".$signature;
		$signature = $txtid."-".$signature;

		$target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 		
	}

	$originalcv=$_FILES['originalcv']['name'];
	if ($originalcv!='')
	{
		$target_path = "images/originalcv/";
		$originalcv = $txtid."-".$originalcv;
		$target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 		
	}


	$birthcert=$_FILES['birthcert']['name'];
	if ($birthcert!='')
	{
		$target_path = "images/birthcert/";
		$birthcert = $txtid."-".$birthcert;
		$target_path = $target_path . basename($birthcert); 
		move_uploaded_file($_FILES['birthcert']['tmp_name'], $target_path); 		
	}

 	$edudocs=$_FILES['edudocs']['name'];
	if ($edudocs!='')
	{
		$target_path = "images/edudocs/";
		$edudocs = $txtid."-".$edudocs;
		$target_path = $target_path . basename($edudocs); 
		move_uploaded_file($_FILES['edudocs']['tmp_name'], $target_path); 		
	}


 	$expdocs=$_FILES['expdocs']['name'];
	if ($expdocs!='')
	{
		$target_path = "images/expdocs/";
		$expdocs = $txtid."-".$expdocs;
		$target_path = $target_path . basename($expdocs); 
		move_uploaded_file($_FILES['expdocs']['tmp_name'], $target_path); 		
	}


 	$objDb->execute($sSQL);
	$txtid = $objDb->getAutoNumber();
	$cvId = $txtid;

$tuSql = "update tblcvmain SET lastupdate = now(),  ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);


	header('Location: submit-cv.php?id='.$txtid);
	

	
	}	
//------------------------------------------update button procedure ------------------------------------------

if($updateBtn!='')
{
	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBpicture = $objDb->getField(0, picture);
	$txtname1  = $objDb->getField(0, name);
	
	$picture = $_FILES['picture']['name'];
	
	if ($picture!='')
	{
		if($DBpicture!='')
 		{ 
 		$DBpicture="images/pics/".$DBpicture;
		if (file_exists($DBpicture)) { @unlink($DBpicture); }
		}
		
		$target_path = "images/pics/";
		$picture=$cvID."-Pic-".$txtname1.".jpg";
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 		
	}
	else
	{
	$picture = $DBpicture;
	}

 
 	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBsignature = $objDb->getField(0, signature);
	$txtname1  = $objDb->getField(0, name);

	$signature = $_FILES['signature']['name'];

	if ($signature!='')
	{
		if($DBsignature!='')
		{ 
		$DBsignature ="images/signature/".$DBsignature;
		if (file_exists($DBsignature)) { @unlink($DBsignature); }
		}

		$target_path = "images/signature/";
		$signature   = $cvID."-Sign-".$txtname1.".jpg";
		$target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 
	}
	else
	{
	$signature = $DBsignature;
	}
	
 
  	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBoriginalcv = $objDb->getField(0, originalcv);
	$txtname1     = $objDb->getField(0, name);
	
 	$originalcv   = $_FILES['originalcv']['name'];
	
	if ($originalcv!='')
	{
		if($DBoriginalcv!='')
		{ 
		$DBoriginalcv = "images/originalcv/".$DBoriginalcv;
		if (file_exists($DBoriginalcv)) { @unlink($DBoriginalcv); }
		}

		$target_path = "images/originalcv/";
//		$signature   = $cvID."-Sign-".$txtname1.".jpg";

		$originalcv = $cvID."-CV-".$originalcv;
	
		$target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 
	}
	else
	{
	$originalcv = $DBoriginalcv;
	}
	
	 
  	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBbirthcert = $objDb->getField(0, birthcert);
	$txtname1    = $objDb->getField(0, name);
	
 	$birthcert   = $_FILES['birthcert']['name'];
	
	if ($birthcert   !='')
	{
		if($DBbirthcert !='')
		{ 
		$DBbirthcert    = "images/birthcert/".$DBbirthcert;
		if (file_exists($DBbirthcert)) { @unlink($DBbirthcert); }
		}

		$target_path = "images/birthcert/";
//		$signature   = $cvID."-Sign-".$txtname1.".jpg";

		$birthcert = $cvID."-BCe-".$birthcert;
	
		$target_path = $target_path . basename($birthcert); 
		move_uploaded_file($_FILES['birthcert']['tmp_name'], $target_path); 
	}
	else
	{
	$birthcert = $DBbirthcert;
	}
	
 	 	 
  	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBedudocs	 = $objDb->getField(0, edudocs);
	$txtname1    = $objDb->getField(0, name);
	
 	$edudocs = $_FILES['edudocs']['name'];
	
	if ($edudocs   !='')
	{
		if($DBedudocs !='')
		{ 
		$DBedudocs    = "images/edudocs/".$DBedudocs;
		if (file_exists($DBedudocs)) { @unlink($DBedudocs); }
		}

		$target_path = "images/edudocs/";
//		$signature   = $cvID."-Sign-".$txtname1.".jpg";

		$edudocs = $cvID."-Edu-".$edudocs;
	
		$target_path = $target_path . basename($edudocs); 
		move_uploaded_file($_FILES['edudocs']['tmp_name'], $target_path); 
	}
	else
	{
	$edudocs = $DBedudocs;
	}
	 
	 
	 	 
  	$sSQL1 = " select * FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBexpdocs = $objDb->getField(0, expdocs);
	$txtname1     = $objDb->getField(0, name);
	
 	$expdocs = $_FILES['expdocs']['name'];
	
	if ($expdocs   !='')
	{
		if($DBexpdocs !='')
		{ 
		$DBexpdocs    = "images/expdocs/".$DBexpdocs;
		if (file_exists($DBexpdocs)) { @unlink($DBexpdocs); }
		}

		$target_path = "images/expdocs/";
//		$signature   = $cvID."-Sign-".$txtname1.".jpg";

		$expdocs = $cvID."-Exp-".$expdocs;
	
		$target_path = $target_path . basename($expdocs); 
		move_uploaded_file($_FILES['expdocs']['tmp_name'], $target_path); 
	}
	else
	{
	$expdocs = $DBexpdocs;
	}
	 
	 
	 
 	$pic  		="images/pics/".$picture;
	$sign		="images/signature/".$signature;
	$ocv		="images/originalcv/".$originalcv;
	$bcert		="images/birthcert/".$birthcert;
	$exdocs		="images/expdocs/".$expdocs;
	$eddocs		="images/edudocs/".$edudocs;
		

	if ($dbpicture =='' )  {$pic='';}  else {$pic = $picture;	}
	if ($dbsignature=='' ) {$sign='';} else {$sign= $signature;}
	if ($dboriginalcv=='' ){$ocv='';}  else {$ocv = $originalcv;}
	if ($dbbirthcert=='' ) {$bcert='';}  else {$bcert= $birthcert;}
	if ($dbedudocs =='' )  {$eddocs='';}  else {$eddocs= $edudocs;}
	if ($dbexpdocs =='' )  {$exdocs='';}  else {$exdocs= $expdocs;}



 	$sSQL = ("UPDATE tblcvmain set picture='$picture',  signature = '$signature', originalcv='$originalcv', birthcert='$birthcert', edudocs='$edudocs', expdocs='$expdocs', datetime='$datetime' WHERE cvId='$cvID'" )	;
 	$objDb->execute($sSQL);
	
	
	
	$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);
	
	$msg="Updated!";
}	

//-------------------------------------------------------------------------------------

if($cvID!="")
{
	$sSQL_edit = " Select * FROM tblcvmain WHERE cvId='$cvID'";
	$objDb->query($sSQL_edit);
	
	$cvId					=	$objDb->getField(0, cvId);
	$name					=	$objDb->getField(0, name);
	$dbsignature			=	$objDb->getField(0, signature);
	$dbpicture				=	$objDb->getField(0, picture);
	$dboriginalcv			=	$objDb->getField(0, originalcv);
	$dbbirthcert			=	$objDb->getField(0, birthcert);
	$dbedudocs				=	$objDb->getField(0, edudocs);
	$dbexpdocs				=	$objDb->getField(0, expdocs);

	$datetime				=	$objDb->getField(0, datetime);
 
 	$lastupdate				=	$objDb->getField(0, lastupdate);
 	$updated_on				=	$objDb->getField(0, updated_on);

	
   	$pic    ="images/pics/".$dbpicture;
  	$sign	="images/signature/".$dbsignature;
  	$ocv	="images/originalcv/".$dboriginalcv;
  	$bcert	="images/birthcert/".$dbbirthcert;
  	$eddocs	="images/edudocs/".$dbedudocs;
  	$exdocs	="images/expdocs/".$dbexpdocs;

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
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/style.css">

<div id="content">
	<form name="uploadcv" id="uploadcv" action=""  method="post" onsubmit="return uploadcv(this);" style=" border-top:1px solid #fdcb10; margin-top:20px"  enctype="multipart/form-data">
	  
	  <table width="96%" height="660" border="0"  align="left" cellpadding="1" cellspacing="1">
      
        <tr>
        <td height="24" colspan="5" bgcolor="#CCCC66" class="mouseover2" ><strong><? echo $cvId;?> - <?php if($name!="") echo $name ; else echo $txtname; ?>
          -  </strong><font color="#999999">updated on:
          <?php if($lastupdate!="") echo $lastupdate ; else echo $txtlastupdate; ?>
         </font> </td>
        </tr>
					<tr>
					<td height="31" colspan="2"><h1> &nbsp;&nbsp;&nbsp;&nbsp;Upload  Documents/particulars:</h1></td>
					<td colspan="42"><font color="#009933"><strong><?php if($msg!="") echo $msg; else echo "";?></strong></font></td>
					</tr>

					<tr>
					  <td width="22%" height="68" class="label" ><h2><strong>Picture</strong>:&nbsp;</h2></td>
					  <td colspan="2" ><input type="file" name="picture" accept="image/jpg, image/jpeg" />
                      <font color="#CCCCCC"><? echo ltrim($pic,'images/pics');?></font><br />
                      <font color="#FF0000">Only <strong>jpg format</strong> file can be uploaded.
					  <br> <b>Photo</b> should be less then <b>100 KB.</b> </font>                      <!--  <a href="<?=$pic?>" target="_new"><img src="<?=$pic?>" width="66" height="81" alt="ddd" /></a></td> -->                    </td>
					  <td width="18%" >
      <div class="mg-image"> 
  		<?php 
		$piclen = strlen($pic);
		if ($piclen !="") {
		?>
        <img  src="<? echo $pic; ?>"   width="76" height="78"/> 
        <?php 
		} 
		elseif ($pic=="" or $piclen <= '1') {
		?>
        <img src="images/noimage/no-profile-img.gif" width="76" height="78" alt="profile " />

		<?php 
		}
		?>
              </div>
                      
                      
                      &nbsp;</td>
					  <?php /*?> <td colspan="2" rowspan="3"  >
					   <iframe  src="includes/treetf.php?dir=<?=$mdID;?>" name="myiframe" width="100%" height="250px;" class="reference" frameborder="0" ></iframe>
</td>
                      
                      </td><?php */?>
					  <td width="1%"> </td>
                    </tr>

					<tr>
					  <td height="83"   class="label" ><h2><strong>Signature</strong>:</h2></td>
					  <td colspan="2" ><input type="file" name="signature" accept="image/jpg, image/jpeg"  />
                      <font color="#CCCCCC"><? echo ltrim($sign,'images/signature');?></font> <br />
                      <font color="#FF0000">Only <strong>jpg Format</strong> file can be uploaded.</font>
					<!-- <a href="<?=$sign?>" target="_new"><img src="<?=$sign?>" width="66" height="81" alt="ddd" /></a></td> -->                    </td>
					  <td >
                      
                       <div class="mg-image"> 
 
  		<?php 
		$signlen = strlen($sign);
 		if ($signlen > 0) {
		?>
        <img  src="<? echo $sign?>" alt="Signature" width="95" height="49"/> 
        <?php 
		} 
		elseif ($sign=="" or $signlen <= '0') {
		?>
        <img src="images/signe.jpg" width="90" height="54"  alt="File not uploaded"/>

		<?php 
		}
		?>
        </div>
                      
                      &nbsp;</td>
					  <td> </td>
                    </tr>
           <tr>
		   <td height="85" class="label"><h2><strong>Original CV</strong>:</h2></td>
           <td colspan="2" class="smec">
             <input type="file" name="originalcv" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/* <br /> size="50" maxlength="50"" />
             
             <font color="#CCCCCC"> <? echo ltrim($ocv,'images/originalcv');?> </font> <br />
             <font color="#FF0000"> Only <strong> doc/pdf </strong> file  can be uploaded.</font><a href="<? echo $ocv; ?>" title="Original CV" > </a>           </td>
           <td class="smec">
           
           <div class="mg-image">  
          <?php
            $filename = $ocv;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 0) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/fdoc.png' alt='Original CV' width='52' height='54' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= 0) {
            ?>
          <img src="images/noimage/icon-cv2.png" width="53" height="58" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>
            </div>
           
           </td>
           <td> </td>
           </tr>

           <tr>
		   <td height="85" class="label"><h2><strong>NID/Passport:</strong></h2></td>
           <td colspan="2" class="smec">
             <input type="file" name="birthcert" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/* <br /> size="50" maxlength="50"" />
             
             <font color="#CCCCCC"> <? echo ltrim($bcert,'images/birthcert');?> </font> <br />
             <font color="#FF0000">Only <strong>pdf format</strong> file can be uploaded.</font>
             <?php /*?> 	 <a href="<?=$bcert?>" target="_new"><img src="images/write.png" width="66" height="81" alt="ddd" /></a> <?php */?> 
             <a href="<? echo $bcert; ?>" title="Birth Certificate" > </a>  </td>
           <td class="smec">

           <div class="mg-image">  
          <?php
            $filename = $bcert;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 18) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/birthcertpdf.png' alt='Birth Certificates/Docs' width='74' height='73' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= '18') {
            ?>
          <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>
			</div>
           </td>
           <td> </td>
           </tr>
  

         <tr>
		   <td height="85" class="label"><h2><strong>Educational  Docs:</strong></h2></td>
           <td colspan="2" class="smec">
  <input type="file" name="edudocs" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*" size="50" maxlength="50" />
             
             <font color="#CCCCCC"> <? echo ltrim($eddocs,'images/edudocs');?> </font> <br />
             <font color="#FF0000">Only <strong>pdf format</strong> file can be uploaded.</font>
             <a href="<? echo $eddocs; ?>" title="Educational Certificates/Docs" > </a>  </td>
 
           
              <td class="smec">
           <div class="mg-image">  
          <?php
            $filename = $exdocs;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 18) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/exppdf.png' alt='Experience Certificates/Docs' width='74' height='73' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= '18') {
            ?>
          <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>           </div> 
            
           </td>
           </tr>
            <td> </td>
        


        
                 <tr>
		   <td height="85" class="label"><h2><strong>Experience Docs:</strong></h2></td>
           <td colspan="2" class="smec">
             <input type="file" name="expdocs" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/* <br /> size="50" maxlength="50"" />
             
             <font color="#CCCCCC"> <? echo ltrim($exdocs,'images/expdocs');?> </font> <br />
             <font color="#FF0000">Only <strong>pdf format</strong> file can be uploaded.</font>
             <a href="<? echo $exdocs; ?>" title="Experience Certificates/Docs" > </a>  </td>
     
           
            <td class="smec">
           <div class="mg-image">  
          <?php
            $filename = $exdocs;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 18) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/exppdf.png' alt='Experience Certificates/Docs' width='74' height='73' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= '18') {
            ?>
          <img src="images/pdfempty2.png" width="49" height="49" alt="File not uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>
         </div>
           </td>
       
           <td> </td>
        </tr>
   
             <tr>
              <td height="10" align="right" bgcolor="#CCCCCC"  >&nbsp;</td>
              <td colspan="4" align="right" valign="middle" bgcolor="#CCCCCC" >
             <!--   <strong><?php echo "CV updated on :     ".date("d/m/Y", strtotime($lastupdate));?></strong> --> 
              
              &nbsp;</td>
            </tr>
            
   <!--       <tr>
            <td height="10" align="right">&nbsp;</td>
            <td align="center" ><strong>  Picture</strong></td>
            <td align="center" valign="middle" ><strong>  Signature</strong></td>
            <td align="center" valign="middle" >&nbsp;</td>
            <td align="center" valign="middle" ><strong>Original CV File</strong></td>
        <tr>
             <td height="10" align="right">&nbsp;</td>
             <td width="32%" align="center">
        
        <div class="mg-image"> 
  		<?php 
		$piclen = strlen($pic);
	 
		if ($piclen > 12) {
		?>
        <img  src="<? echo $pic?>"   width="117" height="127"/> 
        <?php 
		} 
		elseif ($pic=="" or $piclen <= '12') {
		?>
        <img src="images/noimage/no-profile-img.gif" width="119" height="132" alt="profile " />

		<?php 
		}
		?>
              </div>
 		  </td>                 
          
             <td width="20%" align="center" valign="middle"    >
             <div class="mg-image"> 
 
  		<?php 
		$signlen = strlen($sign);
 		if ($signlen > 17) {
		?>
        <img  src="<? echo $sign?>" alt="Signature" width="181" height="100"/> 
        <?php 
		} 
		elseif ($sign=="" or $signlen <= '17') {
		?>
        <img src="images/noimage/signature5.png" width="173" height="96"  alt="no yet signature uploaded"/>

		<?php 
		}
		?>
        </div>
	    </td>

        <td width="11%" align="center" valign="middle" >
            
<?php /*?>    <a href="<? echo $ocv; ?>" title="Original CV" > </a>
 	 	       <a href="<?=$ocv?>" target="_new"><img src="images/write.png" width="97" height="104" alt="Original CV" /></a>
<?php */?>            
  	    </td>
        <td width="22%" valign="middle" >
          <div class="mg-image">  
          <?php
            $filename = $ocv;
            if ($filename!='') {
            if (file_exists($filename)) {
			
            $filenamelen = strlen($filename);
 			//echo "name=".$filename."  len=".$filenamelen;

            if ($filenamelen > 18) {
            ?>
          <a href="<? echo $filename; ?>" target="_new" > 
            <img src='images/fdoc.png' alt='Original CV' width='106' height='106' /></a>
          <?php 
            } 
            elseif ($filenamelen=="" or $filenamelen <= '18') {
            ?>
          <img src="images/noimage/icon-cv2.png" width="68" height="72" alt="no yet signature uploaded" align="middle"/>
          <?php 
            } 
			}
			}
            ?>
        </td>
       
            <tr>
             <td height="10" align="right" bgcolor="#CCCCCC"  >&nbsp;</td>
             <td colspan="4" align="right" valign="middle" bgcolor="#CCCCCC"    >
              -->
 
	 
        <tr>
            <td height="39"></td>
            <td align="left" colspan="4"  >
            <?php
            if($cvID!="")
            {
            ?>
            <input type="submit" value="Update" name="update" />&nbsp;&nbsp;<input type="submit" value="Next" name="next" />
            <?php
            }
            else
            {
            ?>
            <input type="submit" value="Save & Next" name="save" />
            <?php
            }
            ?>&nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  /></td>

        </tr>
	</table>
	
    </form>
 
	<br clear="all" />
  </div>
  <?php include ("includes/footer.php"); ?>
</div>
</body>
</html>
<?php
	$objDb  -> close( );
	$objDb2 -> close( );
?>
