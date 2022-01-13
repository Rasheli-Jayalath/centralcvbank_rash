<?php
include ('includes/saveurl.php'); 
  
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
if ($strusername==null)
{
	header("Location: ../index.php?init=3");
}
?>
<?php

@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
	
	$cvID=$_REQUEST['cvid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php /*?><script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 1;var pfHideImages = 0;var pfImageDisplayStyle = 'none';var pfDisablePDF = 0;var pfDisableEmail = 1;var pfDisablePrint = 1;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if ('https:' === document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/pf-button.gif" alt="Print Friendly and PDF"/></a><?php */?>

<?php include ('includes/metatag.php'); ?>
<?php // include ('includes/excel-export.php'); ?>

<?php //include ('includes/msword-export.php'); ?>

 <script type="text/javascript">

  var stile = "top=100, left=150, width=1000, height=800 status=no, menubar=no, toolbar=no scrollbar=yes";
     function Popup(apri) {
        window.open(apri, "", stile);
     }
 
</script>

<script type="text/javascript">
	$(document).ready(function () {
		$("#makeMeScrollable").smoothDivScroll({
			mousewheelScrolling: "allDirections",
			manualContinuousScrolling: true,
			autoScrollingMode: "onStart"
		});
	});
</script>


<title>CV Bank-<?=$cvID?>&nbsp;&nbsp;&nbsp;</title>
<link rel="stylesheet" href="css/style.css" rel="stylesheet"/>


<div ng-controller="testController">
    <div id="exportContent">


<div id="wrap">
<style type="text/css">

.style1 {
	font-size: 18px;
	font-weight: bold;
	color: #000000;
}
 

 
 
</style>


<!-- <button onclick="Export2Doc('exportContent');">Export as .doc</button> -->



<script type="text/javascript">

    function Export2Doc(element, filename = '') {

        var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml + document.getElementById(element).innerHTML +postHtml;

        var blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });

        // Specify link url
        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

        // Specify file name
        filename = filename ? filename + '.doc' : 'document.doc';

        // Create download link element
        var downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = url;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }

        document.body.removeChild(downloadLink);
    }

</script>

    <!-- Bootstrap core CSS -->
        <link href="http://demos.codexworld.com/includes/css/bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="http://demos.codexworld.com/includes/css/style.css" rel="stylesheet">

</head>


<body>

<div ng-controller="testController">
    <div id="exportContent">

    


<div id="wrap">
<?



$sSQL1 = " select * FROM tblcvmain WHERE cvId=$cvID   ";
$objDb->query($sSQL1);

	$cvId					=	$objDb->getField(0, cvId);
	$name					=	$objDb->getField(0, name);
	$dob					=	$objDb->getField(0, dob);
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
	$citizenship			=	$objDb->getField(0, citizenship);
	$location				=	$objDb->getField(0, location);
	$smecEmp				=	$objDb->getField(0, smecEmp);
	$egcEmp					=	$objDb->getField(0, egcEmp);
	$otherEmp				=	$objDb->getField(0, otherEmp);
	$position				=	$objDb->getField(0, position);
	$totalExp				=	$objDb->getField(0, totalExp);
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
	$picture				=	$objDb->getField(0, picture);
	$signature				=	$objDb->getField(0, signature);
	$datetime				=	$objDb->getField(0, datetime);
?>



 
<table class="allformat" width="100%" align="center" cellpadding="1" cellspacing="0" border="0"  >
	 
 
            <div align="center">
                 
				 <br>
                   <span class="style1"  >CURRICULUM VITAE (CV) </span> <br />
                
	 	  </div>
      </td>
	</tr>
</table>


<table class="allformat" width="100%" align="center" cellpadding="1" cellspacing="1" border="0"  >

  <tr>
		<td class="bff" >1.</td>
		<td width="21%" class="bf" ><b>Proposed Position: </b></td>
		<td width="76%" colspan="4" class="nf"><b><?=$position?></b></td> 
  </tr>
    
	<tr>
 		<td  class="bff" >2.</td>
		<td  class="bff"><b>Name of Firm: </b></td>
		<?php
			if($smecEmp=="Y")
			{
				$compName="SMEC International Pty. Ltd.";
			}
			
			if($egcEmp=="Y")
				{
					$compName=$compName." Engineering General Consultants EGC (Pvt), Ltd.";
				}
				
			if($smecEmp=="" and $egcEmp=="")
			{
				$compName="<font color='#FF0000'> Please enter firm name here </font>";
			}
			
		?>
		<td colspan="4" class="nf"><?=$compName;?></td>
	</tr>
	<tr>
		<td class="bf" >3.</td>
		<td class="bf"><strong>Name of Staff: </strong></td>
		<td colspan="4" class="nf"><strong><?=$name?></strong></td>
	</tr>
	<tr>
	  <td  class="bf" >4.</td>
	  <td  class="bf"><strong>Profession:</strong></td>
	  <td colspan="4"  class="nf" ><?=$profession?></td>
    </tr>
	<tr>
		<td  class="bf" >5.</td>
		<td  class="bf"> <?php if ($dob==''|| $dob=='1970-01-01' || $dob=='01-01-1900' || $dob=='1900-01-01'|| $dob=='1900-01-00'|| $dob=='0000-00-00') { echo '<mark> Date of Birth: </mark>';} else {echo "Date of Birth: "; } ?>  </td>
        <td colspan="4"  class="nf" > <?php if ($dob=='01-01-1970' || $dob=='1970-01-01' || $dob=='01-01-1900' || $dob=='1900-01-01'|| $dob=='1900-01-00'|| $dob=='0000-00-00') { echo '';} else {echo date("d-m-Y", strtotime($dob));}?></td>
	</tr>
	<tr>
		<td   class="bf" >6.</td>
		<td   class="bf" ><strong>Nationality: &nbsp;</strong></td>
		
		<? 
		$sSQL1 = " select * FROM tblcountries Where countryId=$citizenship ";
		$objDb->query($sSQL1);
		$citizenship= $objDb->getField(0, citizenship);
		 ?>
		 <td class="nf" colspan="4"><?=$citizenship;?></td>
	</tr>
	<tr>
		<td class="bf" >7.</td>
		<td colspan="5" class="bf"><strong>Membership of Professional Societies: </strong></td>
	</tr>
	
	<tr>
		<td></td>
        <td colspan="5" class="nf">
		<ul>
			<?
				$sSQL1 = " select * FROM tblmop Where cvId=$cvID  ";
				$objDb->query($sSQL1);
				$iCount = $objDb->getCount( );
				if($iCount>0)
				{
					for ($i = 0 ; $i < $iCount; $i ++)
					{
					$society  		= $objDb->getField($i, society);
			?>

				<li><?=$society?> </li>
				<? }
			}
			?>
		  </ul>
		
		 </td>
	</tr>
	
		
		
	
	<tr>
	  <td  >&nbsp;</td>
	  <td colspan="5"  >&nbsp;</td>
    </tr>

	<tr>
		<td class="bf" >8.</td>
		<td colspan="5"   class="bf" ><strong>Key Qualification:</strong></td>
	</tr>
		<tr>
		  <td  >&nbsp;</td>
		  <td colspan="5" style="text-align:justify"><span class="nf">
		    <?=$keyQualification;?> </span></td>
    </tr>

  
  
  <?php /*?>  <tr>
          <td class="bf" >&nbsp;</td>
          <td colspan="5" class="bf"><p>Some Relevant Projects are:</p></td>
    </tr>
	<tr>
	  <td  class="bf"   >&nbsp;</td>
	  <td   class="bf" colspan="5">
      			<table align="center" class="allformat" width="100%"  cellpadding="0" cellspacing="0" border="0"  >
			<?
						$sSQL1 = " select * FROM tblemploymentrecord Where cvId=$cvID   order by CONCAT(RIGHT(eFromDate,4), LEFT(eFromDate,4)) desc  ";
						$objDb->query($sSQL1);
						$iCount = $objDb->getCount( );
						if($iCount>0)
						{
							for ($i = 0 ; $i < $iCount; $i ++)
							{
							$eFromDate  		= $objDb->getField($i, eFromDate);
							$eToDate  			= $objDb->getField($i, eToDate);
							$jobTitle  			= $objDb->getField($i, jobTitle);
							$client  			= $objDb->getField($i, client);
							$employeer 			= $objDb->getField($i, employeer);
							$projDesc  			= $objDb->getField($i, projDesc);
							$dutiesPerformed  	= $objDb->getField($i, dutiesPerformed);
							$projTitle  		= $objDb->getField($i, projTitle);
							$location 			= $objDb->getField($i, location);
 							
			 				$arryFrom=explode('-',$eFromDate);
							$FromMonth=$arryFrom[0];
							$FromDate=$arryFrom[1];
							
							$arryTo=explode('-',$eToDate);
							$ToMonth=$arryTo[0];
							$ToDate=$arryTo[1];

				
							if($FromMonth==1)  $Fmonth="Jan";
							if($FromMonth==2)  $Fmonth="Feb";
							if($FromMonth==3)  $Fmonth="Mar";
							if($FromMonth==4)  $Fmonth="Apr";
							if($FromMonth==5)  $Fmonth="May";
							if($FromMonth==6)  $Fmonth="Jun";
							if($FromMonth==7)  $Fmonth="July";
							if($FromMonth==8)  $Fmonth="Aug";
							if($FromMonth==9)  $Fmonth="Sep";
							if($FromMonth==10) $Fmonth="Oct";
							if($FromMonth==11) $Fmonth="Nov";
							if($FromMonth==12) $Fmonth="Dec";
							
							if($ToMonth==1)  $Tmonth="Jan";
							if($ToMonth==2)  $Tmonth="Feb";
							if($ToMonth==3)  $Tmonth="Mar";
							if($ToMonth==4)  $Tmonth="Apr";
							if($ToMonth==5)  $Tmonth="May";
							if($ToMonth==6)  $Tmonth="Jun";
							if($ToMonth==7)  $Tmonth="Jul";
							if($ToMonth==8)  $Tmonth="Aug";
							if($ToMonth==9)  $Tmonth="Sep";
							if($ToMonth==10) $Tmonth="Oct";
							if($ToMonth==11) $Tmonth="Nov";
							if($ToMonth==12) $Tmonth="Dec";
 			?>
			<tr>
				<td width="100%" colspan="2" class="nf" style="height:22px"><span class="nf" style="height:22px">
				  <strong> <?=$jobTitle;?></strong>, <?=$projTitle;?>, </span>
                  (<? echo $Fmonth." ".$FromDate." To ".$Tmonth." ".$ToDate;?>), <span class="nf" style="height:22px">
				<?=$location;?>
		    </span></td>
				</tr>
			<? }
			}
			?>
		  </table>
		</td>
    </tr><?php */?>

 
    <tr>
	      <td   >&nbsp;</td>
	      <td colspan="5"  >&nbsp;</td>
    </tr>
    <tr>
		<td class="bf" >9.</td><td colspan="5" class="bf"><strong>Education: &nbsp;</strong></td>
		
	</tr>
	<tr>
			<td></td>
			<td class="nf" colspan="5">
                <ul>
                <?
                    $sSQL1 = " select * FROM tbleducation Where cvId=$cvID  ";
                    $objDb->query($sSQL1);
                    $iCount = $objDb->getCount( );
                    if($iCount>0)
                    {
                        for ($i = 0 ; $i < $iCount; $i ++)
                        {
                        $eduYear  			= $objDb->getField($i, eduYear);
                        $eDegreeTitle  		= $objDb->getField($i, eDegreeTitle);
                        $eSpecialization  	= $objDb->getField($i, eSpecialization);
                        $eInstitute  		= $objDb->getField($i, eInstitute);
                        $eLocation			= $objDb->getField($i, eLocation);
                        $eCountry1	  		= $objDb->getField($i, eCountry);
                 
                $sSQL11 = " select * FROM tblcountries Where countryId=$eCountry1 ";
                $objDb2->query($sSQL11);
                $eCountry = $objDb2->getField(0, name);
                ?>
                <li>
                <? echo $eDegreeTitle." (".$eSpecialization.") from ".$eInstitute.", ".$eLocation.", ".$eCountry." - ".$eduYear; ?>
                </li>
                <?
                }
                }
                ?>
                </ul>
			</td>
			
	</tr>
	<tr>
	  <td   >&nbsp;</td>
	  <td colspan="5"  >&nbsp;</td>
    </tr>
	<tr>
		<td class="bf" >&nbsp;</td><td colspan="5" class="bf"><strong>Other Trainings: &nbsp;</strong></td>
		
	</tr>
	
	<tr>
		<td></td><td colspan="5" class="nf">
			<ul>
			<?
				$sSQL1 = " select * FROM tblothers Where cvId=$cvID  ";
				$objDb->query($sSQL1);
				$iCount = $objDb->getCount( );
				if($iCount>0)
				{
					for ($i = 0 ; $i < $iCount; $i ++)
					{
					$oDesc  		= $objDb->getField($i, oDesc);
			?>

				<li><?=$oDesc?> </li>
				<? }
			}
			?>
			</ul> 	
		</td>
	</tr>
	
	<tr>
	  <td class="bf" >&nbsp;</td>
	  <td class="nf" colspan="5">&nbsp;</td>
    </tr>
	<tr>
     
	<td class="bf" >10.</td><td class="nf" colspan="5"><span style="  font-weight:bold;">Countries of Experience:</span> &nbsp;&nbsp;<?=$workExpCountries;?></td>
		

	</tr>

      
      
      &nbsp;
	  <td colspan="5"    >&nbsp;</td>
	  <td  align="left">&nbsp;</td>
 
	<tr>
	  <td  >&nbsp;</td>
	  <td colspan="5"    >&nbsp;</td>
    </tr>
	<tr>
		<td width="3%"  class="bf"  " >11.</td>


		<td   class="bf" colspan="5"><strong>Employment Record:</strong></td>
	</tr>
		<tr>
			<td></td>
			<td colspan="5">
				<table class="allformat" width="100%"  cellpadding="1" cellspacing="0" border="0" >
       <?php
						$sSQL1 = " select * FROM tblemploymentrecord Where cvId=$cvID order by CONCAT(RIGHT(eFromDate,4), LEFT(eFromDate,4)) desc  ";
						//$sSQL1 = " select * FROM tblemploymentrecord Where cvId=$cvID order by CONCAT(RIGHT(eFromDate,4), LEFT(eFromDate,4)) desc  ";
				//		$sSQL1= "SELECT a.*, b.name as cname FROM tblemploymentrecord a left outer join tblcountries b on a.country=b.countryid Where a.cvId=$cvID  order by CONCAT(RIGHT(a.eFromDate,4), LEFT(a.eFromDate,4)) desc";
						
						$objDb->query($sSQL1);
						$iCount = $objDb->getCount( );
						if($iCount>0)
						{
							for ($i = 0 ; $i < $iCount; $i ++)
							{
						 	$eFromDate  		= $objDb->getField($i, eFromDate);
							$eToDate  			= $objDb->getField($i, eToDate);
							$jobTitle  			= $objDb->getField($i, jobTitle);
							$client  			= $objDb->getField($i, client);
							$projDesc  			= $objDb->getField($i, projDesc);
							$dutiesPerformed  	= $objDb->getField($i, dutiesPerformed);
							$projTitle  		= $objDb->getField($i, projTitle);
							$projCost	  		= $objDb->getField($i, projCost);
							$location	  		= $objDb->getField($i, location);
							$employeer	  		= $objDb->getField($i, employeer);
							 							
			 				$arryFrom=explode('-',$eFromDate);
							$FromMonth=$arryFrom[0];
							$FromDate=$arryFrom[1];
							
							$arryTo=explode('-',$eToDate);
							$ToMonth=$arryTo[0];
							$ToDate=$arryTo[1];
							
							
 							if($FromMonth==0)  $Fmonth="To-Date";
							if($FromMonth==1)  $Fmonth="January";
							if($FromMonth==2)  $Fmonth="February";
							if($FromMonth==3)  $Fmonth="March";
							if($FromMonth==4)  $Fmonth="April";
							if($FromMonth==5)  $Fmonth="May";
							if($FromMonth==6)  $Fmonth="June";
							if($FromMonth==7)  $Fmonth="July";
							if($FromMonth==8)  $Fmonth="August";
							if($FromMonth==9)  $Fmonth="September";
							if($FromMonth==10) $Fmonth="October";
							if($FromMonth==11) $Fmonth="November";
							if($FromMonth==12) $Fmonth="December";
							if($FromMonth >12) $Fmonth=$FromMonth;
							
//							if($ToMonth==0)  $Tmonth="";
							if($ToMonth==1)  $Tmonth="January";
							if($ToMonth==2)  $Tmonth="February";
							if($ToMonth==3)  $Tmonth="March";
							if($ToMonth==4)  $Tmonth="April";
							if($ToMonth==5)  $Tmonth="May";
							if($ToMonth==6)  $Tmonth="June";
							if($ToMonth==7)  $Tmonth="July";
							if($ToMonth==8)  $Tmonth="August";
							if($ToMonth==9)  $Tmonth="September";
							if($ToMonth==10) $Tmonth="October";
							if($ToMonth==11) $Tmonth="November";
							if($ToMonth==12) $Tmonth="December";
							if($ToMonth>12 or $ToMonth=="To-Date") $Tmonth=$eToDate;
  		 	?> 						
            <tr>
                <td  class="bf" style="vertical-align:top; padding:10px 0 0 0;" ><strong>Name of Assignment or Project:</strong></td>
                <td  ><span class="nf" style="vertical-align:top; padding:10px 0 0 0;"> <?=$projTitle;?>  </span></td>  
            </tr>
            <tr>
                <td width="30%" class="bf"><strong>From:</strong></td>
                <td width="70%"  class="nf"><? echo $Fmonth." ".$FromDate." To ".($ToDate!='Date'? $Tmonth: '')." ".$ToDate;?></td>
            </tr>
            <tr>
                <td width="30%" class="bf"><strong>Employer:</strong></td>
                <td class="nf"><?=$employeer;?></td>
            </tr>
            <tr>
                <td width="30%" class="bf"><strong>Position Held:</strong></td>
                <td class="nf"><?=$jobTitle;?></td>
            </tr>
            <tr>
                <td colspan="2" class="bf" style="vertical-align:top; padding:5px 0 0 0;"><strong>Description of Duties</strong>:</td>
            </tr>
            <tr>
                <td colspan="6" class="nf" style="vertical-align:top; padding:5px 0 0 0;" align="justify"><?=$dutiesPerformed;?></td>
            </tr>
            <? }
            }
            ?>
			  </table>
			</td>
 
	
	<tr>
		<td class="bf" >12.</td> <td class="bf" colspan="5"><strong>Languages: &nbsp;</strong></td>
		
	</tr>
	<tr>
		<td></td>
		<td   colspan="5">
<table class="allformat" width="100%"  cellpadding="1" cellspacing="0" border="0"  align="center">
 			<tr>
				<td width="20%"  class="bf" style="height:8px;"></td>
				<td width="20%"  class="bf" style="height:8px;"><strong>Speaking</strong></td>
				<td width="21%"  class="bf" style="height:8px;"><strong>Reading</strong></td>
				<td width="39%"  class="bf" style="height:8px;"><strong>Writing</strong></td>
			</tr>
			<?php
				$sSQL1 = " select * FROM tbllanguages Where cvId=$cvID  ";
				$objDb->query($sSQL1);
				$iCount = $objDb->getCount( );
				if($iCount>0)
				{
					for ($i = 0 ; $i < $iCount; $i ++)
					{
					$lname  		= $objDb->getField($i, lname);
					$lspeaking 		= $objDb->getField($i, lspeaking);
					$lreading  		= $objDb->getField($i, lreading);
					$lwritten  		= $objDb->getField($i, lwritten);
					
			?>
			<tr>
				<td width="20%"  class="nf" ><?=$lname;?></td>
				<td width="20%"  class="nf"><?=$lspeaking;?></td>
				<td width="21%"  class="nf"><?=$lreading;?></td>
				<td width="39%"  class="nf"><?=$lwritten;?></td>
			</tr>
			<?php }
			}
			?>
         
  </table>
 </td>
	</tr>
	
     </table>
    
<table class="allformat" width="100%"  cellpadding="1" cellspacing="0" border="0"  align="center">
 	<tr>
	  <td width="4%" class="bf">13.</td>
	  <td class="bf" align="left" colspan="2"  ><strong>Certification:</strong></td>
	 
	  <td   class="nf" style="vertical-align:bottom; text-align:left;">&nbsp;</td>
	  <td  align="left" class="nf" style="vertical-align:bottom; text-align:left;">&nbsp;</td> 
 	</tr>
	<tr>
	  <td></td>
	  <td class="nf" align="left" colspan="4"  ><p>I,  the undersigned, certify that to the best of my knowledge and belief, this  bio-data correctly describes myself, my qualifications and my experience.</p>
	    <p>&nbsp;</p></td>
	  </tr>
	<tr>
		<td></td>
		<td colspan="2" align="left" class="nf"  >
        <?php if ($signature!=='') {
		?>
        
        <img src="images/signature/<?php echo $signature; ?>" width="182" height="94"/> </td>
		  
        <?php  } 
		else if ($signature=='' and $smecEmp == "" and $egcEmp == "Y") {
		?>			
        <div style="border:1px solid #F7F7F7; width:400px; height:100px;">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/signature/egc-rep-jamil.jpg" alt="representataive sign" width="182" height="94"/></div>  
		
		<? 
		}
		else if ($signature=='' and $egcEmp =="" and $smecEmp == "Y") {
		?>			
        <div style="border:1px solid #F7F7F7; width:400px; height:100px;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/signature/smec-rep-ahsam.jpg" alt="representataive sign" width="182" height="94"/></div><td width="1%">
 		</td>

        <?
	 
		}
		?>
        <td width="21%"   class="nf" style="vertical-align:bottom; text-align:left;"><strong>Date: <?php echo date("d-m-Y"); ?> </strong></td>		 
	  </tr>

	<tr>
	  <td></td>
	  <td class="nf" colspan="2"><span style="border-top:1px solid" >
			
       <?php if ($signature!='') {
		     echo '[Signature of staff member <strike> or authorized representative of staff </strike>]';
			 } 
		else 
		{ 	 echo '[ Signature of <strike>staff member or </strike> authorized representative of staff ]';
		}
			 ?>	
      </span><br /></td>
	  <td class="nf" align="center" colspan="2" style="vertical-align:top;" ><span class="nf" style="vertical-align:top;"><span style="border-top:1px solid;" > (DD-MM-YYYY)</span></span></td>
 </tr>
	<tr>
		<td></td>
		
		<td class="nf" colspan="2">
        
        <?php 
		if ( $egcEmp=="Y") {
		     echo '<br>Full Name of Authorized Representative:  <u>Muhammad Jamil</u>';
			 } else
		if (  $smecEmp=="Y") {
		     echo '<br>Full Name of Authorized Representative:  <u>Ahsam Sohail Arshad</u>';
			 } 
			 ?>
        
        </td>


 	</tr>
     

</table> 
</table>


</div></div></div>
 





</body>
</html>
<?
	$objDb  -> close( );
	$objDb2 -> close( );
?>



 