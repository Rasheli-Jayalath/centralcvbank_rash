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

$superadmin = $_SESSION['superadmin'];


$valueac = $_REQUEST['ac'];

$valuea = $_REQUEST['a'];
$valueb = $_REQUEST['b'];
$valuec = $_REQUEST['c'];
$valued = $_REQUEST['d'];
$valuee = $_REQUEST['e'];
$valuef = $_REQUEST['f'];
$valueid = $_REQUEST['id'];
$valueo = $_REQUEST['o'];
$valuesa = $_REQUEST['sa'];
$valueos = $_REQUEST['os'];

if ($valuesa==1) {
	$checked = " checked ";
} else {
	$checked = "";
}
$now = new DateTime();
$nowyear = $now->format("Y");
@require_once("requires/configs.php");
@require_once("requires/db.class.php");
@require_once("requires/io.class.php");
$objDb  = new Database( );
$objDb2  = new Database( );

$sCondition = '';

if($valuea!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND (position LIKE '%".$valuea."%' OR areaOfExp LIKE '%".$valuea."%' OR keyQualification LIKE '%".$valuea."%')";
	}
	else
	{
	$sCondition=" (position LIKE '%".$valuea."%' OR areaOfExp LIKE '%".$valuea."%' OR keyQualification LIKE '%".$valuea."%')";
	}
//	echo $sCondition;
}
if($valueb!="")
{
	$mycv="";
//	$sSQL = " select distinct(cvId) as cvId FROM tbleducation WHERE eDegreeTitle LIKE '%$valueb%' ";
	$sSQL = " select distinct(cvId) as cvId FROM tbleducation WHERE eDiscipline LIKE '%$valueb%' ";

	$objDb->query($sSQL);
	$iCount = $objDb->getCount( );
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$cvId=$objDb->getField($i, cvId);
		if($mycv=="")
		{
		$mycv=$cvId;
		}
		else
		{
		$mycv.=','.$cvId;
		}	
	}				
	if($sCondition!="")
	{
	$sCondition.=" AND (cvId in (".$mycv."))";
	}
	else
	{
	$sCondition= " (cvId in (".$mycv."))";
	}
}
if ($valuec !='') {

$len = strlen($valuec);
$pos = strpos($valuec,'-');
$last = substr($valuec,-1);

if (strpos($valuec,'-') === 0) {
	$expstart = substr($valuec, 1, $len - $pos);
	//$sSQL1 = "SELECT * FROM tblcvmain WHERE totalExp <= ".$expstart;
	if($sCondition!="")
	{
		
	$sCondition.=" AND (
	if((year(now()) - startexpyr) = 0 , 1 ,year(now()) - startexpyr) <= ".$expstart	.") ";
	}
	else
	{
	$sCondition= " (if((year(now()) - startexpyr) = 0 , 1 ,year(now()) - startexpyr) <= ".$expstart.") ";
	}
} else if (strpos($valuec,'-') === false) {
	$expstart = substr($valuec, 0, $len - $pos);
	//$sSQL1 = "SELECT * FROM tblcvmain WHERE totalExp = ".$expstart;
	if($sCondition!="")
	{
	$sCondition.=" AND (if((year(now()) - startexpyr) = 0 , 1 ,year(now()) - startexpyr) = ".$expstart.") ";
	}
	else
	{
	$sCondition= " (if((year(now()) - startexpyr) = 0 , 1 ,year(now()) - startexpyr) = ".$expstart.") ";
	}
} else if (strpos($valuec,'-') > 0 && $last =='-') {
	$expstart = substr($valuec, 0, $len - 1);
	//$sSQL1 = "SELECT * FROM tblcvmain WHERE totalExp >= ".$expstart;
	if($sCondition!="")
	{
	$sCondition.=" AND (if((year(now()) - startexpyr) = 0 , 1 ,year(now()) - startexpyr) >= ".$expstart.") ";
	}
	else
	{
	$sCondition= " (if((year(now()) - startexpyr) = 0 , 1 ,year(now()) - startexpyr) >= ".$expstart.") ";
	}
} else if (strpos($valuec,'-') > 0) {
	$expstart = substr($valuec, 0, $pos);
	$expend = substr($valuec, $pos+1, $len - $pos);
	//$sSQL1 = "SELECT * FROM tblcvmain WHERE totalExp between ".$expstart." and ".$expend;
	if($sCondition!="")
	{
	$sCondition.=" AND (if((year(now()) - startexpyr) = 0 , 1 ,year(now()) - startexpyr) between ".$expstart." and ".$expend.") ";
	}
	else
	{
	$sCondition= " (if((year(now()) - startexpyr) = 0 , 1 ,year(now()) - startexpyr) between ".$expstart." and ".$expend.") ";
	}
}
}



if($valueac!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND (fgroup = '".$valueac."') ";
	}
	else
	{
	$sCondition=" (fgroup = '".$valueac."') ";
	}
	 $sCondition;
}



if($valued!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND (areaOfExp LIKE '%".$valued."%') ";
	}
	else
	{
	$sCondition=" (areaOfExp LIKE '%".$valued."%') ";
	}
//	echo $sCondition;
}

if($valuee!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND (keyQualification LIKE '%".$valuee."%') ";
	}
	else
	{
	$sCondition=" (keyQualification LIKE '%".$valuee."%') ";
	}
//	echo $sCondition;
}

if($valuef!="")
{
	if($sCondition!="")
	{
	$sCondition.=" AND (position LIKE '%".$valuef."%') ";
	}
	else
	{
	$sCondition=" (position LIKE '%".$valuef."%') ";
	}
//	echo $sCondition;
}

if($valueid!="")
{
	if (substr($valueid,-1)==",") {$valueid=trim(substr($valueid,0,(strlen($valueid)-1)));}
//	echo $valueid;
	$sCondition=" (cvId in (".$valueid.") )";
//	echo $sCondition;
}

if($valueo!="")
{
	$orderby = " order by ".$valueo." ".$valueos;
	
} else {
	$orderby = " order by cvId"." ".$valueos;	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CV Bank - Smart Search</title>

<!--	<link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	-->	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('cvcheck[]');
  for each(var checkbox in checkboxes)
    checkbox.checked = source.checked;
}
</script>



</head>

<body>
<?php
$sSQL1 = "SELECT * FROM tblcvmain WHERE ".$sCondition.$orderby;
//echo $sSQL1;
$objDb->query($sSQL1);
$iCount = $objDb->getCount( );
if($iCount>0)
{
?>
<form action="cvchecklistbd.php" method="post" target="_blank"> 
	<input type="hidden" name="valueac" id="valueac" value="<?=$valueac ?>" />

<input type="hidden" name="valuea" id="valuea" value="<?=$valuea ?>" />
<input type="hidden" name="valueb" id="valueb" value="<?=$valueb ?>" />
<input type="hidden" name="valuec" id="valuec" value="<?=$valuec ?>" />
<input type="hidden" name="valued" id="valued" value="<?=$valued ?>" />
<input type="hidden" name="valuee" id="valuee" value="<?=$valuee ?>" />
<input type="hidden" name="valuef" id="valuef" value="<?=$valuef ?>" />

<table  style="width:100%" > 


<div class="container">
<!--  <div class="row">
    <div class="col-1" style="text-align: right;">
	<input class="btn btn-primary " type="submit" value="Make List" style="margin-top: 10px;margin-bottom: 10px; margin-right: 10px;">

    </div>
    <div class="col-4" style="text-align: left;">

    <select class="form-select form-control-sm" name="prnumber" id="prnumber" style="margin-top: 10px;margin-bottom: 10px;">
			<?php
			$prSQL = "select mdid, submission, projectname from proposalbank.maindata where locked = 0 and submission in ('eoi','tf') order by mdid desc";
			$objDb2->query($prSQL);
			$piCount = $objDb2->getCount( );
			?>
			<option value="" >Select Project Code</option>
			
			<?php
			for ($pi = 0; $pi < $piCount; $pi++) { ?>
			<option value="<?=$objDb2->getField($pi, mdid);?>" ><?=$objDb2->getField($pi, mdid);?> - <?=$objDb2->getField($pi, submission);?> - <?=$objDb2->getField($pi, projectname);?></option>
			<?php } ?>
    </select>

    </div>
    <div class="col-7" style="text-align: left;">
    <input class="btn btn-primary " type="submit" name="proposal" id="proposal"  value="Send-to-Proposal" style="margin-top: 10px;margin-bottom: 10px;">
    </div>
  </div>
</div>
-->

    <form action="#" method="post">
    <tr bgcolor="#625F5F" style="text-decoration:inherit; color:#CCC">
    
      <th style="width: 2%; text-align: center;"><strong>Sr. No.</strong></th>
      <th style="width: 1%; "><strong>SEL</strong></th>
      <th style="width: 3%; text-align: center;"><strong>ID</strong></th>
      <th style="width: 5%; "><strong>NAME</strong></th>
      <th style="width: 5%; "><strong>POSITION</strong></th>
      <th style="width: 3%; text-align: center;"><strong>EXP<br />(Yr)</strong></th>
      <th style="width: 3%; "><strong>VIEW</strong></th>
<!--      <th style="width: 5%; text-align: center;"><strong>UPDATED ON </strong></th>
      <th style="width: 10%; "><strong>EMAIL </strong></th>
-->

    </tr>
    </form>

<strong>
<?php
	for ($i = 0 ; $i < $iCount; $i ++)
	{
		$cvId  			= $objDb->getField($i, cvId);
		$name  			= $objDb->getField($i, name);
		$position  		= $objDb->getField($i, position);
		$email  		= $objDb->getField($i, email);
		$startexpyr  	= $objDb->getField($i, startexpyr);
		$lastupdate  	= $objDb->getField($i, lastupdate);
		$addinfo3		= $objDb->getField($i, addinfo3);
 

if ($i % 2 == 0) {
	$style = ' style="background:#f1f1f1;"';
} else {
	$style = ' style="background:#ffffff;"';
}

?>
</strong>


<tr <?php echo $style; ?>>
<td width="5px"><center> <?=$i+1;?> </center> </td>
<td>
<input class="form-check" type="checkbox" name="cvcheck[]" id="cvcheck[]" value="<?=$cvId;?>" <?php echo $checked; ?>></td>
<td align="center";><?=$cvId;?></td>
<td  ><?=ucwords(strtolower($name));?></td>
<td  ><?=ucwords(strtolower(substr($position,0,30)."..."));?></td><td align="center";>
  <?php if (($nowyear - $startexpyr) == 0) {echo '1';} else {echo ($nowyear - $startexpyr); }?></td>
  
<td>    
<form action="../" target="_new">

<div class="row">
 <div class="col-12 grid-margin">
 			  <form action="" >
				<select name="myDestination">
					  <option value="eoi-format-dl1.php?cvid=<?=$cvId?>">EOI-Download</option>
 					  <option value="short-eoi-format.php?cvid=<?=$cvId?>">SHORT-CV</option>
				</select>
 				<input type="button" value="View" onclick="ob=this.form.myDestination;window.open(ob.options[ob.selectedIndex].value)">
 			</form>
 
<!-- <td style="border-bottom:1px solid #cccccc" width="2%"  align="center"><small><?php echo date("d.m.Y", strtotime($lastupdate));?></small></td>
</td> -->
<?php if ($superadmin == 1 or $cvadmflag==1) { ?>
<!--<td>
 <form action="../" target="_new" name="submit">-->
<!--
<form action="../">
    <select  class="form-select form-select-sm" name="myDestination2" id="myDestination2"  onchange="window.open(this.options[this.selectedIndex].value,'_blank')">
    <option value="">Choose a destination...</option>
    <!--  <option value="http://www.yahoo.com/">YAHOO</option>  
    <option value="sendemailacknowledge.php?cvid=<?=$cvId?>" >Acknowledgement</option>
    <option value="cv-missinginfo.php?cvid=<?=$cvId?>">Missing Info</option>-->
    <!-- <option value="sendemailprovideinfo.php?cvid=<?=$cvId?>">Provide Info</option>  

    </select>
</form>
-->
<!-- <form action="../" target="_new">

<select name="myDestination2" id="myDestination2" >
  <option value="sendemailacknowledge.php?cvid=<?=$cvId?>">Acknowledgement</option>
   <option value="cv-missinginfo.php?cvid=<?=$cvId?>">Missing Info</option>
</select>

 <input type="button" style="height:20px; width:60px";  name= "Send"  value="Send"
onsubmit="ob=this.form.myDestination2;window.open(ob.options[ob.selectedIndex].value )" /> </button>
</form>
-->
<?php
/*
if(isset($_POST['myDestination2'])) {
$select1 = $_POST['myDestination2'];
// echo $select1;
 }
else{
//echo "not set";
}*/
		if(isset($_POST['myDestination2'])) {
		$nowyear2 = $now->format('Y-m-d H:i:s');
 		$nowyear3 = 'Acknowledgement on: '.$nowyear2;
 		echo $sql1 = "UPDATE tblcvmain SET addInfo3 = ".$nowyear3." WHERE cvId=$cvId";
		$result = mysql_query($sql1);
		echo "Data updated ack";
		}
		/*else
		{ //echo "Generate error";	
		}*/
    ?>
 
<?php /* ?><a href="sendemail.php?cvid=<?=$cvId?>" target="_blank">SendEmail</a>

<?php */ ?>


<!-- </td> -->
 
<?php } ?>
</tr>

<?php        
	}
?>

</form>
<?php
} else { echo "<br />","<center> No CV Found..... </center> <br /><br />"; }
?>

</td> 

</body>
</html>
