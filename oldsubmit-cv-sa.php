<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];
$strusername 	= $_SESSION['uname'];


$u_resourceid 	= $_SESSION['idcard'];
$useremail  = $_SESSION['email'];
//$name  = $_SESSION['name'];
$BD  = $_SESSION['BD'];
$PK  = $_SESSION['PK'];
$IN = $_SESSION['IND'];
$SL  = $_SESSION['SL'];
$AF  = $_SESSION['AF'];
$KZ  = $_SESSION['KZ'];
$NP  = $_SESSION['NP'];
$ALLC = $_SESSION['ALLC'];

if($BD==1){ 
$countrycode = 'BD'; 
}
else if ($PK==1){ 
$countrycode = 'PK'; 
}
else if ($IN==1){ 
$countrycode = 'IN'; 
}
else if ($SL==1){ 
$countrycode = 'SL'; 
}
else if ($AF==1){ 
$countrycode = 'AF'; 
}
else if ($KZ==1){ 
$countrycode = 'KZ'; 
}
else if ($NP==1){ 
$countrycode = 'NP'; 
}
else {
$countrycode = 'ALLC'; 
}



 
$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
$updatedon = $date->format('Y-m-d H:i:s');


if ($strusername==null  )
	{
		header("Location: ../index.php?init=3");
	}
else if ($cvadmflag==0  and $cventryflag==0)
	{
		header("Location: ../index.php?init=3");
	}

else if ($strusername==null or $cventryflag==0)
	{
		header("Location: ../index.php?init=3");
	}

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

//echo "here".$saveBtn;

//--------------------------------------------------------------
$txtid				= $_REQUEST['txtid'];
$txtname			= $_REQUEST['txtname'];
$txtfatherName		= $_REQUEST['txtfatherName'];
$txtdob				= date('Y-m-d',strtotime($_REQUEST['txtdob']));
$chkgender			= $_REQUEST['chkgender'];
$opmstatus			= $_REQUEST['cmbmstatus'];
$txtcnic			= $_REQUEST['txtcnic'];
$txtlandline		= $_REQUEST['txtlandline'];
$txtmobile			= $_REQUEST['txtmobile'];
$txtemail			= $_REQUEST['txtemail'];
$txtemailTwo		= $_REQUEST['txtemailTwo'];
$cmbcitizen			= $_REQUEST['cmbcitizen'];
$cmbnationality		= $_REQUEST['cmbnationality'];
$txtlocation    	= $_REQUEST['txtlocation'];
$chksmec			= $_REQUEST['chksmec'];
$chkegc				= $_REQUEST['chkegc'];
$chksj				= $_REQUEST['chksj'];
$chkother			= $_REQUEST['chkother'];
$chkegcEmployee		= $_REQUEST['chkegcEmployee'];
$txtpassport		= $_REQUEST['txtpassport'];
$txttotalexperience	= $_REQUEST['txttotalexperience'];
$txtstartexpyr		= $_REQUEST['txtstartexpyr'];
$txtprofession		= $_REQUEST['txtprofession'];
$txtssn				= $_REQUEST['txtssn'];
$txtposition		= $_REQUEST['txtposition'];
$txtpaddress		= $_REQUEST['txtpaddress'];
$txtoaddress		= $_REQUEST['txtoaddress'];
$txtcaddress		= $_REQUEST['txtcaddress'];
$txtareaofexpertise	= $_REQUEST['txtareaofexpertise'];
$txtwecountries		= $_REQUEST['txtwecountries'];
$txtcompcap			= $_REQUEST['txtcompcap'];
$txtKeyQualification= $_REQUEST['txtKeyQualification'];
$txtremarks			= $_REQUEST['txtremarks'];
$txtinfo1			= $_REQUEST['txtinfo1'];
$txtinfo2			= $_REQUEST['txtinfo2'];
$txtinfo3			= $_REQUEST['txtinfo3'];
$txtinfodetail		= $_REQUEST['txtinfodetail'];
$txtref				= $_REQUEST['txtref'];
$picture			= $_REQUEST['picture'];
$signature			= $_REQUEST['signature'];
$originalcv			= $_REQUEST['originalcv'];
$datetime			= date('Y-m-d',strtotime($_REQUEST['txtposteddate']));
$txtlastupdate		= $_REQUEST['txtlastupdate'];
$txtupdated_on		= $_REQUEST['txtupdated_on'];

$txtexpectedSalary	= $_REQUEST['txtexpectedSalary'];
$txtSalaryRange		= $_REQUEST['txtSalaryRange'];
$cmbcvStatus		= $_REQUEST['cmbcvStatus'];
$chkcvVerification 	= $_REQUEST['chkcvVerification'];
$chkbdprofile 		= $_REQUEST['chkbdprofile'];

$now = new DateTime();
$nowyear = $now->format("Y");
//$texpyr = ($nowyear - $startexpyr);
//echo $eyear;


//-------------------------------------------------
if($clear!="")
{
$txtid				= '';
$txtname			= '';
$txtfatherName		= '';
$txtdob				= '';
$chkgender			= '';
$txtexpectedSalary	= '';
$txtSalaryRange		= '';
$txtemailTwo		= '';
$cmbcvStatus		= '';

$opmstatus			= '';
$txtcnic			= '';
$txtlandline		= '';
$txtmobile			= '';
$txtemail			= '';
$cmbcitizen			= '';
$cmbnationality		= '';	
$txtlocation    	= '';
$chksmec			= '';
$chkegc				= '';
$chksj				= '';
$chkother			= '';
$chkegcEmployee		= '';
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
$picture			= '';
$signature			= '';
$birthcert			= '';
$edudocs			= '';
$expdocs			= '';
$txtlastupdate		= '';
$cvVerification		= '';
$chkbdprofile		= '';
$txtupdated_on		= '';
$$datetime			= '';
$ep_name			= '';

}

if($next !=""){
  header('Location: firminfo.php?id='.$txtid);
}

  $epid = $countrycode."_".$u_resourceid;

//	echo 	$u_resourceid 	= $_SESSION['idcard'];


if($saveBtn!="")
{
	$picture=$_FILES['picture']['name'];
	if ($picture!='')
	{
		$target_path = "images/pics/";
		$picture=$txtid."-".$picture;
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 		
	}

	$originalcv=$_FILES['originalcv']['name'];
	if ($originalcv!='')
	{
		$target_path = "images/originalcv/";
		$originalcv=$txtid."-".$originalcv;
		$target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 		
	}

	$signature=$_FILES['signature']['name'];
	if ($signature!='')
	{
		$target_path = "images/signature/";
		$signature=$txtid."-".$signature;
		$target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 		
	}

/*	$sSQL = ("INSERT INTO tblcvmain(cvId, name, dob, gender, maritalStatus, permanentAddress, officeAddress, correspondenceAddress, cnic, passportNo, 
		ssn, landline, mobile, email, citizenship, location, smecEmp, egcEmp, position, totalExp, 
		profession, areaOfExp, workExpCountries, keyQualification, computerCapabilities, remarks, referece, 
		addInfo1, addInfo2, addInfo3, addInfoDetail, picture, datetime) 
		VALUES ($txtid,'$txtname','$txtdob','$chkgender','$opmstatus','$txtpaddress','$txtoaddress','$txtcaddress','$txtcnic','$txtpassport',
		'$txtssn','$txtlandline','$txtmobile','$txtemail','$cmbcitizen','$txtlocation','$chksmec','$chkegc','$txtposition','$txttotalexperience',
		'$txtprofession','$txtareaofexpertise','$txtwecountries','$txtKeyQualification','$txtcompcap','$txtremarks','$txtref',
		'$txtinfo1','$txtinfo2','$txtinfo3','$txtinfodetail','$picture','$datetime')");
*/
$dateposted=date('Y/m/d') ; // this to get current date as text .

	
	
 $sSQL = ("INSERT INTO cvbankdb.tblcvmain (name, fatherName, dob, gender, maritalStatus, permanentAddress, officeAddress, correspondenceAddress, cnic, passportNo, ssn, landline, mobile, email, emailTwo, citizenship, nationality, location, smecEmp, egcEmp, sjEmp, otherEmp,  egcEmployee,position, totalExp, startexpyr, profession, areaOfExp, workExpCountries, keyQualification, computerCapabilities, remarks, referece, addInfo1, addInfo2, addInfo3, addInfoDetail, originalcv, picture, signature, posted_date, expectedSalary, SalaryRange, cvStatus, cvVerification, bdprofile,ep_name) VALUES ('$txtname','$txtfatherName', '$txtdob', '$chkgender','$opmstatus','$txtpaddress', '$txtoaddress', '$txtcaddress', '$txtcnic','$txtpassport', '$txtssn','$txtlandline', '$txtmobile','$txtemail', '$txtemailTwo', '$cmbcitizen', '$cmbnationality', '$txtlocation', '$chksmec', '$chkegc', '$chksj', '$chkother', '$chkegcEmployee', '$txtposition', '$txttotalexperience', '$txtstartexpyr', '$txtprofession', '$txtareaofexpertise', '$txtwecountries', '$txtKeyQualification', '$txtcompcap', '$txtremarks','$txtref', '$txtinfo1', '$txtinfo2','$txtinfo3', '$txtinfodetail', '$originalcv', '$picture', '$signature', '$dateposted', '$txtexpectedSalary','$txtSalaryRange', '$cmbcvStatus', '$chkcvVerification','$chkbdprofile', '$epid')");

//mysql_insert_id $strusername 	= $_SESSION['uname'];
//echo $sSQL;


	$objDb->execute($sSQL);

	$txtid = $objDb->getAutoNumber();
 	$cvId = $txtid;

	
	$msg="Saved!";
 
	 header('Location: firminfo.php?id='.$txtid);

}

//------------------------------------------------------------------------------------

if($updateBtn!='')
{
	$sSQL1 = " select picture FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);
	$DBpicture=$objDb->getField(0, picture);
	
	$picture=$_FILES['picture']['name'];
	if ($picture!='')
	{
		if($DBpicture!='')
		{ 
		$DBpicture="images/pics/".$DBpicture;
		if (file_exists($DBpicture)) { @unlink($DBpicture); }
		}

		$target_path = "images/pics/";
		$picture=$txtid."-".$picture;
		$target_path = $target_path . basename($picture); 
		move_uploaded_file($_FILES['picture']['tmp_name'], $target_path); 		
	}
	else
	{
	$picture=$DBpicture;
	}


	$sSQL1 = " select originalcv FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBoriginalcv=$objDb->getField(0, originalcv);
	$originalcv=$_FILES['originalcv']['name'];
	if ($originalcv!='')
	{
		if($DBoriginalcv!='')
		{ 
		$DBoriginalcv="images/originalcv/".$DBoriginalcv;
		if (file_exists($DBoriginalcv)) { @unlink($DBoriginalcv); }
		}

		$target_path = "images/originalcv/";
		$originalcv=$txtid."-".$originalcv;
		$target_path = $target_path . basename($originalcv); 
		move_uploaded_file($_FILES['originalcv']['tmp_name'], $target_path); 
	}
	else
	{
	$originalcv=$DBoriginalcv;
	}


	$sSQL1 = " select signature FROM tblcvmain Where cvId= '$cvID' ";
	$objDb->query($sSQL1);

	$DBsignature = $objDb->getField(0, signature);
	$signature = $_FILES['signature']['name'];
	if ($signature!='')
	{
		if($DBsignature!='')
		{ 
		$DBsignature="images/signature/".$DBsignature;
		if (file_exists($DBsignature)) { @unlink($DBsignature); }
		}

		$target_path = "images/signature/";
		$signature = $txtid."-".$signature;
		$target_path = $target_path . basename($signature); 
		move_uploaded_file($_FILES['signature']['tmp_name'], $target_path); 
	}
	else
	{
	$signature = $DBsignature;
	}
	
$updatedon=date('Y/m/d H:i:s a') ;

//	echo $DBpicture;
//	echo $picture;
	$sSQL = ("UPDATE tblcvmain set 
			name='$txtname',		 				fatherName='$txtfatherName',		 		
			dob='$txtdob', 							gender='$chkgender',  maritalStatus='$opmstatus', 
			permanentAddress='$txtpaddress', 		officeAddress='$txtoaddress', 
			correspondenceAddress='$txtcaddress', 	cnic='$txtcnic', 
			passportNo='$txtpassport', 				ssn='$txtssn', 
			landline='$txtlandline', 				mobile='$txtmobile',
			email='$txtemail',						emailTwo='$txtemailTwo',	
			citizenship='$cmbcitizen', 				nationality='$cmbnationality',
			location='$txtlocation', 				smecEmp='$chksmec', 
			otherEmp='$chkother', 					egcEmployee='$chkegcEmployee', 
			egcEmp='$chkegc',sjEmp='$chksj',		position='$txtposition', 
			totalExp='$txttotalexperience', 		startexpyr='$txtstartexpyr',
			profession='$txtprofession', 			areaOfExp='$txtareaofexpertise',
			workExpCountries='$txtwecountries', 	keyQualification='$txtKeyQualification',
			computerCapabilities='$txtcompcap', 	remarks='$txtremarks',
			referece='$txtref', 					addInfo1='$txtinfo1',
			addInfo2='$txtinfo2', 					addInfo3='$txtinfo3',
			addInfoDetail='$txtinfodetail', 		picture='$picture', signature = '$signature',
			originalcv='$originalcv',				updated_on='$updatedon', 
			expectedSalary='$txtexpectedSalary', 	SalaryRange='$txtSalaryRange', 
			cvStatus='$cmbcvStatus', 				cvVerification='$chkcvVerification', 
			bdprofile='$chkbdprofile',              edited_by='$strusername'
			WHERE cvId='$cvID'" )	;
	$objDb->execute($sSQL);
//echo $sSQL;
	$msg="Updated!";
}	

//-------------------------------------------------------------------------------------

if($cvID!="")
{
	$sSQL_edit = " Select * FROM tblcvmain WHERE cvId='$cvID'";
	$objDb->query($sSQL_edit);
	
	$cvId					=	$objDb->getField(0, cvId);
	$name					=	$objDb->getField(0, name);
	$fatherName				=	$objDb->getField(0, fatherName);
	$dob					=	date('d-m-Y',strtotime($objDb->getField(0, dob)));
	$gender					=	$objDb->getField(0, gender);
	$maritalStatus			=	$objDb->getField(0, maritalStatus);
	$permanentAddress		=	$objDb->getField(0, permanentAddress);
	$officeAddress			=	$objDb->getField(0, officeAddress);
	$correspondenceAddress	=	$objDb->getField(0, correspondenceAddress);
	$cnic					=	$objDb->getField(0, cnic);
	$passportNo				=	$objDb->getField(0, passportNo); 
	$ssn					=	$objDb->getField(0, ssn);
	$landline				=	$objDb->getField(0, landline);
	$mobile					=	$objDb->getField(0, mobile);
	$email					=	$objDb->getField(0, email);
	$emailTwo				=	$objDb->getField(0, emailTwo);
	$cmbcitizen				=	$objDb->getField(0, citizenship);
	$cmbnationality			=	$objDb->getField(0, nationality);
	$location				=	$objDb->getField(0, location);
	$smecEmp				=	$objDb->getField(0, smecEmp);
	$egcEmp					=	$objDb->getField(0, egcEmp);
	$sjEmp					=	$objDb->getField(0, sjEmp);
	$otherEmp				=	$objDb->getField(0, otherEmp);
	$egcEmployee			=	$objDb->getField(0, egcEmployee);	
	
	$position				=	$objDb->getField(0, position);
	$totalExp				=	$objDb->getField(0, totalExp);
	$startexpyr				=	$objDb->getField(0, startexpyr);
	$profession				=	$objDb->getField(0, profession);
	$areaOfExp				=	$objDb->getField(0, areaOfExp);
	$workExpCountries		=	$objDb->getField(0, workExpCountries);
	$keyQualification		=	$objDb->getField(0, keyQualification);
	$computerCapabilities	=	$objDb->getField(0, computerCapabilities);
	$remarks				=	$objDb->getField(0, remarks);
	$referece				=	$objDb->getField(0, referece);
	$addInfo1				=	$objDb->getField(0, addInfo1);
	$addInfo2				=	$objDb->getField(0, addInfo2);
	$addInfo3				=	$objDb->getField(0, addInfo3);
	$addInfoDetail			=	$objDb->getField(0, addInfoDetail);
	$dbpicture				=	$objDb->getField(0, picture);
	$dbsignature			=	$objDb->getField(0, signature);
	$dboriginalcv			=	$objDb->getField(0, originalcv);
	$datetime				=	$objDb->getField(0, datetime);
	$lastupdate				=	$objDb->getField(0, lastupdate);
	$updated_on				=	$objDb->getField(0, updated_on);
	$posted_date			=	$objDb->getField(0, posted_date);

	$expectedSalary			=	$objDb->getField(0, expectedSalary);
	$SalaryRange			=	$objDb->getField(0, SalaryRange);
	$cmbcvStatus			=	$objDb->getField(0, cvStatus);
	$chkcvVerification		=	$objDb->getField(0, cvVerification);
	$chkbdprofile			=	$objDb->getField(0, bdprofile);
	
	
	//$pic=SITE_URL."images/pics/".$dbpicture;
	$pic="images/pics/".$dbpicture;
	$signature="images/signature/".$dbsignature;
	
	if ($dboriginalcv=='' ) {$ocv='';} else {
	$ocv="images/originalcv/".$dboriginalcv;}
}

if($cvID=="")
{
$sSQL1 = " select max(cvId) cvId FROM tblcvmain ";
$objDb->query($sSQL1);
$cvId=$objDb->getField(0, cvId);
$cvId=$cvId+1;
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

<link rel="stylesheet" type="text/css" href="css/style.css">
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>

<script>
/*
$(document).ready(function(){
$('#name').keyup(name_check);

});
	
function name_check(){	
var name = $('#name').val();
//var dob = $('#dob').val();


if(name == "" || name.length < 4){
$('#name').css('border', '3px #CCC solid');
$('#tick').hide();
}else{

jQuery.ajax({
   type: "POST",
   url: "check.php",
   data: 'name='+ name,
   cache: false,
   success: function(response){
if(response == 1){
	$('#name').css('border', '3px #C33 solid');	
	$('#tick').hide();
	$('#cross').fadeIn();
	}else{
	$('#name').css('border', '3px #090 solid');
	$('#cross').hide();
	$('#tick').fadeIn();
	     }
}
});
}
}*/
</script>


</head>
	
	
<body>
<div id="wrap">
 <?php include ('includes/countryselection.php');  ?>

<div id="content">
	  <form name="frmpersonalInfo" id="frmcontact" action=""  method="post" onsubmit="return personalinfo(this);" style=" border-top:1px solid #fdcb10; margin-top:20px"  enctype="multipart/form-data">
	  
	  <table width="100%" border="0"  align="center" cellpadding="1" cellspacing="1">
            <tr>
            <td colspan="2"><h1>Basic Information</h1></td>
            
            <td colspan="42"><font color="#009933"><strong><?php if($msg!="") echo $msg; else echo "";?></strong></font></td>
            </tr>
            <tr>
            <td width="13%"     class="label" >ID: </td>
            <td width="21%" ><input type="text" value="<?=$cvId;?>" name="txtid" style="width:70px;" readonly="yes"  /></td>
            <td width="16%" class="label"><span class="mend">*</span>Name:&nbsp;</td>
            <td width="24%" align="left" valign="top" >
           <!-- <input type="text" value="<?php // if($name!="") echo $name ; else echo $txtname; ?>" name="txtname"  /> 
            <font color="#FF0000"><strong>check name exists or not... </strong></font>-->
            
            <input id="txtname" name="txtname" type="text" value="<?php if($name!="") echo $name ; else echo $txtname; ?>"/>
			<img id="tick"  src="images/tick.png" width="16" height="16"/></td>
         <td width="25%" rowspan="7" align="center">
           <?php 
		$piclen = strlen($pic);
	 
		if ($piclen > 12) {
		?>
           <img  src="<? echo $pic?>"   width="117" height="127"/> 
           <?php 
		} 
		elseif ($pic=="" or $piclen <= '12') {
		?>
           <img src="images/noimage/no-profile-img.gif" width="93" height="113" alt="profile " />
           <?php 
		}
		?></td>
         </tr>
            
            <tr>
              <td class="label">Date of Birth: &nbsp;</td>
              <td ><input type="text" value="<?php if ($dob=='01-01-1970' || $dob=='1970-01-01' || $dob=='01-01-1900' || $dob=='1900-01-01') { echo '';} else {echo $dob;};?>" name="txtdob" style="width:100px;"  />
                <span style="font-size:12px;">(DD-MM-YYYY)</span></td>
              <td  class="label">Father's Name:</td>
              <td align="left"><input id="txtfatherName" name="txtfatherName" type="text" value="<?php if($fatherName!="") echo $fatherName ; else echo $txtfatherName; ?>"/></td>
            </tr>
            <tr>
            <td class="label">Merital Status: &nbsp;</td>
            <td ><select name="cmbmstatus" style="width:100px;" >
              <option value="U" <?php if($maritalStatus=='U' || $cmbmstatus=='U') echo 'selected="selected"'; ?>>Unmarried</option>
              <option value="M" <?php if($maritalStatus=='M' || $cmbmstatus=='M') echo 'selected="selected"'; ?>>Married</option>
            </select></td>
            
            <td  class="label"><span class="mend">*</span>Gender: &nbsp;</td>
            <td align="left">
            <input type="radio" value="M" name="chkgender" <?php if($gender=='M' || $chkgender=='M') echo 'checked="checked"'; else  echo 'checked="checked"'; ?> />Male
            <input type="radio" value="F" name="chkgender" <?php if($gender=='F' || $chkgender=='F') echo 'checked="checked"'; else echo ""; ?> />Female</td>
            </tr>
					<tr>
					  <td class="label">Landline: &nbsp;</td>
					  <td ><input type="text" value="<?php if($landline!="") echo $landline ; else echo $txtlandline; ?>" name="txtlandline" /></td>
					  <td class="label"><span class="mend">*</span>Start Exp. Yr:&nbsp;&nbsp; </td>
					  <td align="left" ><input name="txtstartexpyr" type="text" style="width:50px;" value="<?php if($startexpyr!="") echo $startexpyr ;else echo $txtstartexpyr; ?>" size="4" maxlength="4"  minlength="4"    />
					  (yyyy) 
			          <strong>Total <?php echo $texpyr = ($nowyear - $startexpyr);?> Yrs</strong></td>
	    </tr>
					<tr>
						<td class="label"><span class="mend">*</span>Email: &nbsp;</td>
						<td ><input type="text" value="<?php if($email!="") echo $email ; else echo $txtemail; ?>" name="txtemail" title="Only One Email for Sending or acknowledgement purposes..."/></td>
						<td class="label">Mobile: &nbsp;</td>
						<td align="left" ><input type="text" value="<?php if($mobile!="") echo $mobile ; else echo $txtmobile; ?>" name="txtmobile"  /></td>
					</tr>
		<tr>
		  <td height="24" class="label">Email (Optional):</td>
		  <td><input type="text" value="<?php if($emailTwo!="") echo $emailTwo ; else echo $txtemailTwo; ?>" name="txtemailTwo"  /></td>
                
 	 
 
			    <td class="label"><span class="mend">*</span>Employed by:</td>
                <td> <? 
					if($egcEmp=="Y" && $smecEmp!="Y"){$chksmec=10;} 
					if($sjEmp=="Y" && $smecEmp!="Y"){$chksmec=9;}
					if($otherEmp=="Y" && $smecEmp!="Y"){$chksmec=99;}
					if($countrycode=="ALLC"){$cselect = "c_code!=''" ;} else {$cselect = 'c_code='. "'" .$countrycode. "'" ;}
					
   	  $sSQL = " SELECT srno, employed_by,c_code FROM cvbankdb.tblemployer where $cselect  or c_code='ALLC' ORDER BY c_code, employed_by asc  ";

	  $sSQL2 = " SELECT flag FROM cvbankdb.tblcountries where code='$countrycode' ";
			$objDb->query($sSQL2);
			$flagselect = $objDb->getField(0,flag);
		?>
				 
				<select name="chksmec"  style="width:200px;" >
				<option value="" selected="selected">--- Select Employer ---</option>

		<?php
					
  	 // $sSQL = " SELECT srno, employed_by,c_code FROM cvbankdb.tblemployer where $cselect ORDER BY c_code, employed_by asc  ";


		$objDb->query($sSQL);
		$iCount = $objDb->getCount( );
		for ($i = 0; $i < $iCount; $i ++)
		{
		 $srno1  		= $objDb->getField($i, 0);
		 $employed_by   = $objDb->getField($i, 1);
		 $c_code   = $objDb->getField($i, 2);
		?>

		<option value="<?= $srno1; ?>" <?php if($srno1 == $smecEmp || $srno1==$chksmec) echo "selected";  ?>>
		<? //$srno1.". ".$employed_by." - ".$c_code ?>
			<?= $employed_by ;?>	
	<!--	<img src="images/logos_countries/<?=$flagselect?>" title="<?=$employed_by ?>" width="50%"  /> -->
					
					</option>
					
		<?php
		}
		?>
           </select>
 
			</td>
                 
		</tr>
 					<tr>
					  <td height="24" class="label"><span class="mend">*</span>Location: &nbsp;</td>
					  <td ><input type="text" value="<?php if($location!="") echo $location ; else echo $txtlocation; ?>" name="txtlocation"  /></td>
                      
					  <td class="label"><span class="mend">*</span>Citizenship:</td>
					  <td align="left" >
                      <select name="cmbcitizen"  style="width:200px;" >
				      <option value="" selected="selected">--- Select Citizenship ---</option>
					    <?php
							$sSQL = "SELECT countryId, citizenship FROM cvbankdb.tblcountries ORDER BY citizenship";
							$objDb->query($sSQL);
							
							$iCount = $objDb->getCount( );
							
							for ($i = 0; $i < $iCount; $i ++)
							{
							$iId   = $objDb->getField($i, 0);
							$sName = $objDb->getField($i, 1);
							?>
					    <option value="<?= $iId ?>" <?php if($iId == $citizenship || $iId==$cmbcitizen) echo "selected"; ?>>
					    <?= $sName ?>
				        </option>
					    <?php
							}
							?>
				      </select></td>
	   				</tr>
 					<tr>
					  <td height="22" class="label">Passport No: &nbsp;</td>
					  <td ><input type="text" value="<?php if($passportNo!="") echo $passportNo ;else echo $txtpassport; ?>" name="txtpassport"  /></td>
 					  
                      <td class="label"><span class="mend">*</span>Birth Place:</td>
					  <td align="left" >
                      
                      <select name="cmbnationality" style="width:200px;" >
				      <option value="<?=$iId1 ?>" <?php if($iId1 == $name || $iId1 ==$cmbnationality) echo "selected"; ?>> 
                      <option value="" selected="selected">--- Select Nationality ---</option> <?= $sName1 ?>
                       </option>
					    <?php
							$sSQL = "SELECT countryId, name FROM cvbankdb.tblcountries ORDER BY name";
							$objDb->query($sSQL);
 
 							$iCount = $objDb->getCount( );
 							for ($i = 0; $i < $iCount; $i ++)
							{
							$iId1   = $objDb->getField($i, 0);
							$sName1 = $objDb->getField($i, 1);
						?>
					    <option value="<?=$iId1 ?>" <?php if($iId1 == $name || $iId1==$cmbnationality) echo "selected"; ?> > <?= $sName1 ?>
				        </option>
					    <?php
							}
							?>
				      </select></td>        
                       <td></td>
               	    
					    
                </tr>
 
            <tr>
            <td class="label">Profession: &nbsp;</td>
            <td ><input type="text" value="<?php if($profession!="") echo $profession ; else echo $txtprofession; ?>" name="txtprofession"  /></td>
            <td class="label">CNIC: &nbsp;</td>
            <td align="left" ><input type="text" value="<?php if($cnic!="") echo $cnic ; else echo $txtcnic; ?>" name="txtcnic"  /></td>
         <td></td>
           
            </tr>
            <tr>
              <td class="label"><span class="mend">*</span>Proposed Position: &nbsp;</td>
              <td ><input type="text" value="<?php if($position!="") echo $position ;else echo $txtposition; ?>" name="txtposition"  /></td>
                
              <td class="label">NTN/ SSN: &nbsp;</td>
              <td colspan="2" ><input type="text" value="<?php if($ssn!="") echo $ssn ; else echo $txtssn; ?>" name="txtssn" style="width:140px" /> (Social Security No.)</td>
            </tr>
            <tr>
              <td class="label">Expected Salary:</td>
              <td ><input id="txtexpectedSalary" name="txtexpectedSalary" type="text" value="<?php if($expectedSalary!="") echo $expectedSalary ; else echo $txtexpectedSalary; ?>"/></td>
              <td class="label">&nbsp;</td>
              <td colspan="2" >&nbsp;</td>
            </tr>
	
	   <tr>
			  <td height="29" class="label">Functional Group-1: &nbsp;</td>
			  <td><select name="cmbfgroup" style="width:205px;" >
			  <option value="" selected="selected">--- Select One ---</option>
                <?php
				$sSQLs = " SELECT sid, sectorname FROM cvbankdb.tblfgsector ORDER BY sid ";
				$objDb->query($sSQLs);
				
				$iCount = $objDb->getCount( );
				for ($i = 0; $i < $iCount; $i ++)
				{
				$s_id 			= $objDb->getField($i, 0);
				$sectorname 	= $objDb->getField($i, 1);
				?>
                 <option value="<?=$sectorname?>" <?php if($fgroup==$sectorname) echo 'selected="selected"'; ?> ><?=$sectorname?> </option>
				 <?php } ?>
                </select>
		  </td>
			  <td class="label">&nbsp;</td>
			  <td align="left" >&nbsp;</td>
			  <td></td>
        </tr>
            <tr>
              <td height="30" class="label">Functional Group-2: &nbsp;</td>
              <td ><select name="cmbfgroup2" style="width:205px;" >
                <option value="" selected="selected">--- Select One ---</option>
                <?php
				$sSQLs2 = " SELECT sid, sectorname FROM cvbankdb.tblfgsector ORDER BY sid ";
				$objDb->query($sSQLs2);
				
				$iCount = $objDb->getCount( );
				for ($i = 0; $i < $iCount; $i ++)
				{
				$s_id2 			= $objDb->getField($i, 0);
				$sectorname2 	= $objDb->getField($i, 1);
				?>
                <option value="<?=$sectorname2?>" <?php if($fgroup2==$sectorname2) echo 'selected="selected"'; ?> >
                <?=$sectorname2?>
                </option>
                <?php } ?>
              </select></td>
              <td class="label">&nbsp;</td>
              <td align="left" >&nbsp;</td>
              <td></td>
            </tr>
	
            <tr>
            <td class="label" valign="top" >   Permanent Address:</td>
            <td colspan="4" ><textarea name="txtpaddress" style="width:800px; height:50px"  /><?php if($permanentAddress!="") echo $permanentAddress ; else echo $txtpaddress; ?></textarea></td>
            </tr>
            <tr>
                <td  class="label"  valign="top" >Office Address:</td>
                <td colspan="4"><textarea name="txtoaddress" style="width:800px; height:50px"  /><?php if($officeAddress!="") echo $officeAddress ; else echo $txtoaddress; ?></textarea></td>
            </tr>
            <tr>
                <td  class="label"  valign="top" >Correspondence Address: </td>
                <td colspan="4"><textarea name="txtcaddress" style="width:800px; height:50px"  /><?php if($correspondenceAddress!="") echo $correspondenceAddress ; else echo $txtcaddress; ?></textarea></td>
            </tr>
            <tr>
                <td  class="label"  valign="top" >Area of Expertise:</td>
                <td  colspan="4"><textarea name="txtareaofexpertise" style="width:800px; height:50px"  /><?php if($areaOfExp!="") echo $areaOfExp ; else echo $txtareaofexpertise; ?></textarea></td>
            </tr>
					<tr>
						<td  class="label"  valign="top" >Work Experience Countries:</td>
						<td  colspan="4"><textarea name="txtwecountries" style="width:800px; height:50px"  /><?php if($workExpCountries!="") echo $workExpCountries ; else echo $txtwecountries; ?></textarea></td>
					</tr>
					<tr>
						<td  class="label"  valign="top" >Computer Capabilities:</td>
						<td  colspan="4"><textarea name="txtcompcap" style="width:800px; height:50px"  /><?php if($computerCapabilities!="") echo $computerCapabilities ; else echo $txtcompcap; ?></textarea></td>
					</tr>
					
					<tr>
						<td  class="label"  valign="top">Key Qualification:<br /><font color="#FF0000"> <br />
						  <strong>	 [ Ctrl+Shift+V ]<br /></strong>for Paste Data here.) </font></td>
						<td  colspan="4">
						<?php
						if($keyQualification=="") $qualification=$txtKeyQualification; else $qualification=$keyQualification;
						$oFCKeditor = new FCKeditor('txtKeyQualification') ;
						
						$oFCKeditor->BasePath   = 'fckeditor/';
						$oFCKeditor->Width      = "806px";
						$oFCKeditor->Height     = "300px";
						$oFCKeditor->ToolbarSet = "Basic";
						$oFCKeditor->Value	    = $qualification;
						
						$oFCKeditor->Create( );
						?></td>
					</tr>
            <tr>
                <td  class="label"  valign="top" >Remarks:</td>
                <td  colspan="4"><textarea name="txtremarks" style="width:800px; height:50px"  /><?php if($remarks!="") echo $remarks ; else echo $txtremarks; ?></textarea></td>
            </tr>
                <tr>
                <td  class="label"   >Info 1:</td>
                <td  colspan="4"><input type="text" value="<?php if($addInfo1!="") echo $addInfo1 ;else echo $txtinfo1; ?>" name="txtinfo1" style="width:800px"  /></td>
            </tr>
            
                <tr>
                <td  class="label"  >Info 2:</td>
                <td  colspan="4"><input type="text" value="<?php if($addInfo2!="") echo $addInfo2 ;else echo $txtinfo2; ?>" name="txtinfo2"  style="width:800px"   /></td>
            </tr>
            
                <tr>
                <td  class="label"  >Ackowledgement Email Sent:</td>
                <td  colspan="4"><input type="text" value="<?php if($addInfo3!="") echo $addInfo3 ;else echo $txtinfo3; ?>" name="txtinfo3"  style="width:800px"   /></td>
            </tr>
					<tr>
						<td  class="label"  valign="middle" >Info Detail:</td>
					  <td  colspan="4"><textarea name="txtinfodetail" style="width:800px; height:50px"  /><?php if($addInfoDetail!="") echo $addInfoDetail ;else echo $txtinfodetail; ?></textarea></td>
					</tr>
						<tr>
						<td  class="label" >Reference:</td>
						<td  colspan="4"><input type="text" value="<?php if($referece !="") echo $referece ; else echo $txtref; ?>" name="txtref"  style="width:800px"   /></td>
					</tr>
                    
 <!--            <tr>
			  <td class="label">Picture Upload:&nbsp;</td>
		    <td colspan="4" bgcolor="#CCCCCC" class="smec"><p>
		      <input type="file" name="picture" accept="image/jpg, image/jpeg, image/png"  />
		      <?php echo $pic;?><br />
		      <font color="#FF0000">Only jpg format can be uploaded.</font></td>
		 

			</tr>

		<tr>
		  <td class="label">Original CV Upload:</td>
		  <td colspan="3" align="left" bgcolor="#CCCCCC"><input type="file" name="originalcv" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/* size="50" maxlength="50" /> 
           <a href="<?php echo $ocv;?>" target="_blank"><?php echo $ocv;?></a>
		  <td align="left" bgcolor="#CCCCCC" class="label">&nbsp;</td>
	    </tr>

	-->				<tr >
                          <td height="10" align="right">&nbsp;</td>
                          <td colspan="4" align="right" valign="middle" bgcolor="#CCCCCC"    >
                        
                   		<b><?php echo "Last updated on :     ".date("d-M-Y H:i:s", strtotime($updated_on));?></b> 
 
                        </tr>
 <tr>
   <td height="10" align="right">&nbsp;</td>
   <td colspan="4" align="left" valign="middle"  >&nbsp;</td>
 </tr>
 <tr>
   <td align="right" bgcolor="#000066">&nbsp;</td>
   <td colspan="4" align="left" valign="middle" bgcolor="#000066"  ><h1>Only for Official Use:</h1></td>
 </tr>
 <tr>
   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
   <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF"  >&nbsp;</td>
   <td colspan="2"   align="left" valign="middle" bgcolor="#FFFFFF"  >&nbsp;</td>
 </tr>
 <tr>
   <td height="52" align="right" bgcolor="#AAE7F9"><strong><span class="mend">*</span>CV Class:</strong></td>
   <td colspan="2" align="left" valign="middle" bgcolor="#AAE7F9"  >
     
     <strong>
       <select name="cmbcvStatus"  style="width:200px;" >
         <!-- <option value="C" selected="selected">Class C: General</option>  -->
         
         
         <?php
                $sSQL = "SELECT sId, cvStatus,cvStatusdesc FROM cvbankdb.tblcvstatus ORDER BY cvStatus";
                $objDb->query($sSQL);
    
                $iCount = $objDb->getCount( );
                for ($i = 0; $i < $iCount; $i ++)
                {
                $sId1   = $objDb->getField($i, 0);
                $cvStatus1 = $objDb->getField($i, 1);
                $cvStatusdesc = $objDb->getField($i, 2);
            ?>
         <option value="<?=$cvStatus1 ?>" <?php if($cmbcvStatus == $cvStatus1 || $iId==$cmbcvStatus) echo "selected"; ?>>
           <?=  $cvStatusdesc?>
           </option>
         <?php
							}
							?>
         </select>
       </strong> 
         
     </td>
	 
   <td colspan="2"   align="left" valign="middle" bgcolor="#AAE7F9"  ><span  ><strong>Employee Type:</strong></span>
<input type="radio" value="E" name="chkegcEmployee" <?php if($egcEmployee=='E' || $chkegcEmployee=='E') echo 'checked="checked"'; else echo ""; ?> />Regular Emp.
<input type="radio" value="F" name="chkegcEmployee" <?php if($egcEmployee=='F' || $chkegcEmployee=='F') echo 'checked="checked"'; else echo ""; ?> />Freelance Emp.
<input type="radio" value="X" name="chkegcEmployee" <?php if($egcEmployee=='X' || $chkegcEmployee=='X') echo 'checked="checked"'; else echo ""; ?> />Ex-Employee 
<input type="radio" value="O" name="chkegcEmployee" <?php if($egcEmployee=='O' || $chkegcEmployee=='O') echo 'checked="checked"'; else echo ""; ?>/>Other 
         </td>
     
 </tr>
 
 <tr>
   <td height="52" align="right" bgcolor="#AAE7F9"><strong><span class="mend">*</span>Salary Range: (INR)</strong></td>
   <td colspan="2" align="left" valign="middle" bgcolor="#AAE7F9"  >
         <strong>
            <select name="txtSalaryRange" style="width:200px;" >
                <option value="">Select One...</option>                
				<option value="25000 - 40000" <? if($SalaryRange=="25000 - 40000") echo 'selected=selected"' ; ?>>25000 - 40000</option>
                <option value="40001 - 55000" <? if($SalaryRange=="40001 - 55000") echo 'selected=selected"' ; ?>>40001 - 55000</option>
                <option value="55001 - 60000" <? if($SalaryRange=="55001 - 60000") echo 'selected=selected"' ; ?>>55001 - 60000</option>
                <option value="60001 - 75000" <? if($SalaryRange=="60001 - 75000") echo 'selected=selected"' ; ?>>60001 - 75000</option>
                <option value="75001 - 80000" <? if($SalaryRange=="75001 - 80000") echo 'selected=selected"' ; ?>>75001 - 80000</option>
                <option value="80001 - 95000" <? if($SalaryRange=="80001 - 95000") echo 'selected=selected"' ; ?>>80001 - 95000</option>
                <option value="95001 - 125000" <? if($SalaryRange=="95001 - 125000") echo 'selected=selected"' ; ?>>95001 - 125000</option>
                <option value="125001 - 150000" <? if($SalaryRange=="125001 - 150000") echo 'selected=selected"' ; ?>>125001 - 150000</option>
                <option value="150001 - 175000" <? if($SalaryRange=="150001 - 175000") echo 'selected=selected"' ; ?>>150001 - 175000</option>
                <option value="Above 175000" <? if($SalaryRange=="above 175000") echo 'selected=selected"' ; ?>>Above 175000</option>
            </select>	
        </strong> 
   </td>
   
   <td colspan="2"   align="left" valign="middle" bgcolor="#CCCC00"  ><span  ><strong>Verification Type:</strong></span>
   <input type="radio" value="V" name="chkcvVerification" <?php if($cvVerification=='V' || $chkcvVerification=='V') echo 'checked="checked"'; else echo ""; ?> />Verified
   <input type="radio" value="N" name="chkcvVerification" <?php if($cvVerification=='N' || $chkcvVerification=='N') echo 'checked="checked"'; else echo ""; ?> />Non-Verified
   <input type="radio" value="P" name="chkcvVerification" <?php if($cvVerification=='P' || $chkcvVerification=='P') echo 'checked="checked"'; else echo  ""; ?> />Pending 
   <input type="radio" value="O" name="chkcvVerification" <?php if($cvVerification=='O' || $chkcvVerification=='O') echo 'checked="checked"'; else echo  ""; ?> />Other 
  </td>
   &nbsp;<td width="1%"></td>
 </tr>
  <tr>
    <td height="30" align="left" bgcolor="#AAE7F9">&nbsp;</td>
    <td colspan="4" align="left" valign="middle" bgcolor="#AAE7F9" > <h2><strong>
      <input type="checkbox" value="1" name="chkbdprofile" <?php if($bdprofile=='1' || $chkbdprofile=='1') echo 'checked="checked"';  ?> />
      BD Profile</strong></h2></td>
  </tr>
  <tr>
    <td height="10" align="left" bgcolor="#AAE7F9">&nbsp;</td>
    <td colspan="4" align="left" valign="middle" bgcolor="#AAE7F9" >&nbsp;</td>
  </tr>
  <tr>
   <td height="10" align="left" bgcolor="#AAE7F9">&nbsp;</td>
   <td colspan="4" align="left" valign="middle" bgcolor="#AAE7F9" ><br /></td>
   
   
 </tr>

 
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
				<input type="submit" value="Save & Next" name="save" id="save" />
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
