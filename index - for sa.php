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
$uid = $_SESSION['uid'];
$name = $_SESSION['uname'];
//$user_status = $_SESSION['user_status'];
 //$userphoto =  $uid."-".$name.".jpg";
@require_once("requires/session.php");

	$objDb  = new Database( );

function roundToTheNearestAnything($value, $roundTo)
{
    $mod = $value%$roundTo;
    return $value+($mod<($roundTo/2)?-$mod:$roundTo-$mod);
}


if ($cvflag==0)
{
	header("Location: ../index.php");
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('includes/metatag.php'); ?>
 <link rel="stylesheet" href="css/counting.css">
  </head>
 
 
<body>
<div id="wrap">
   
	<?php include 'includes/countryselection.php'; ?>
	
	
	
   <div id="content" >
   <table width="90%"  align="center" border="0" >
      <tr>
       <td height="40" colspan="8" align="center" style="color:#0E0989; font-size:22px" >
<!-- <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="864" height="114">
<param name="movie" value="../swfs/CVVV.swf" />

<param name="menu" value="true" />
<param name="allowScriptAccess" value="sameDomain" />
<embed src="../swfs/CVVV.swf" menu="true" width="864" height="114" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="sameDomain" />
</object>
-->
<img src="images/CVbenefits.png" width="830" height="252"  align="center"/>     

</td></tr>
      <tr>
        <td height="40" colspan="8" align="left" style="color:#0E0989; font-size:22px" >
         </td>
      </tr>
      <tr>
     <td height="40" colspan="8" align="left" style="color:#0E0989; font-size:22px" >Welcome to BDMS - CV Bank</td>
   </tr>
   
    <tr><td height="31" colspan="8" style="font-size:18px; color:maroon"><strong>CV Bank - System Introduction</strong></td>
    </tr>
   <tr>
     <td height="65" colspan="8"  style="line-height:18px; text-align:justify">  
     <p>SMEC -  CV Bank is user friendly intelligent system designed to provide maximum facilitation. This system fully automates the storage, retrieval and search of relevant CVs. This system is backbone of the whole business development as maximum marks are assigned to proposed staff portion of the proposal for any project. This is online and real-time solution available locally and globally under strict security anf safety of data.</p></td>
   </tr>
 
   <tr>
     <td height="8" colspan="8"  style="line-height:18px; text-align:justify; border-bottom:groove"></td>
   </tr>
 
   <tr>
     <td height="27" colspan="2" align="center"><a href="cvlist.php?v=egcemp" title="Company Employees" target="_blank"><img src="images/emps.png" width="117" height="107" /></a></td>
     <td width="198" align="center"><a href="cvlist.php?v=freel" title="Free Lancers" target="_blank"><img src="images/freelancer1.png" alt="" width="131" height="80" /></a></td>
     <td width="150" align="center"><a href="cvlist.php?v=exemp" title="Ex-Employees" target="_blank"><img src="images/exemps.png" alt="" width="80" height="78" /></a></td>
     <td width="141" align="center"><a href="cvlist.php?v=oth" title="Other Cvs" target="_blank"><img src="images/othercand.jpg" alt="" width="101" height="86" /></a></td>
     <td colspan="3" align="center"><a href="cvlist.php?v=sje" title="SJ Cvs" target="_blank"><img src="images/logo-sj.jpg" alt="" width="99" height="43" /></a></td>
   </tr>
   <tr>
     <td colspan="2" align="center">
	  <?php  
 		$sql = mysql_query("SELECT COUNT(egcEmployee) AS Employees FROM cvbankdb.tblcvmain WHERE egcEmployee='E'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
 		?>
  	<div  ><span class="count">
      <? echo $data['Employees']; ?></span></div>       
     </td>
     <td align="center">
       <?php  
 		$sql = mysql_query("SELECT COUNT(egcEmployee) AS Freelancer FROM cvbankdb.tblcvmain WHERE egcEmployee='F'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Freelancer'],10).'+</b></font>';
 		?>
       <div  ><span class="count">
         <? echo $data['Freelancer']; ?>
         </span></div>       
     </td>
     
<td align="center">
	 
     <?php  
 		$sql = mysql_query("SELECT COUNT(egcEmployee) AS ExEmployees FROM cvbankdb.tblcvmain WHERE egcEmployee='X'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=gray size="6"><b>'.$data['ExEmployees'].'</b></font>';
 		?> 
  	<div  ><span class="count">
      <? echo $data['ExEmployees']; ?>
	</span></div>       
     </td>
      
  <td align="center">
     <?php  
 		$sql = mysql_query("SELECT COUNT(egcEmployee) AS OthEmployees FROM cvbankdb.tblcvmain WHERE egcEmployee='O'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.$data['OthEmployees'].'</b></font>';
 		?> 
  	<div  ><span class="count">
      <? echo $data['OthEmployees']; ?>
	</span></div>       
     </td>


    <td colspan="3" align="center"><?php  
 		$sql = mysql_query("SELECT COUNT(sjEmp) AS sjEmployees FROM cvbankdb.tblcvmain WHERE sjEmp='Y'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.$data['sjEmployees'].'</b></font>';
		?>
  	<div id="lahorecouting"><span class="count">
      <? echo $data['sjEmployees']; ?>
	</span></div>       
     </td>
   </tr>

   <tr>
    <td height="21" colspan="2" align="center" style="font-size:18px; color:gray"><strong>Employees</strong></td>
    <td height="21" align="center" style="font-size:18px; color:gray"><strong>Freelancers</strong></td>
    <td height="21" align="center" style="font-size:18px; color:gray"><strong>Ex-Employees</strong></td>
    <td height="21" align="center" style="font-size:18px; color:gray"><strong>Others</strong></td>
    <td height="21" colspan="3" align="center" style="font-size:18px; color:gray"><strong>Surbana Jurong</strong></td>
   </tr>

   <tr>
     <td height="21" colspan="8" style="border-bottom:groove">&nbsp;</td>
   </tr>
   
  <tr>
     <td height="17" colspan="8">
     </td>
  </tr>
    </table>
    
</div>
   <? include ("includes/footer.php"); ?>
</div>


<script src='scripts/jquery.min.js'></script>
 <script src="scripts/counting.js"></script>


</body>
</html>
