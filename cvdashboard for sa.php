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

@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2  = new Database( );

function roundToTheNearestAnything($value, $roundTo)
{
    $mod = $value%$roundTo;
    return $value+($mod<($roundTo/2)?-$mod:$roundTo-$mod);
}

$nowdatecatch = new DateTime();
$nowdt = $nowdatecatch->format("Y/m/d");

if ($cvflag==0)
{
	header("Location: ../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('includes/metatag.php'); ?>
<link rel="stylesheet" href="css/style.css"> 

<script type="text/javascript" src="Highcharts/js/jquery.min.js"></script>

<script type="text/javascript">
		$(function () {
			$('#container').highcharts({
				data: {
					table: document.getElementById('datatable') 
				},
				chart: {
					type: 'bar',
								options3d: {
						enabled: true,
						alpha: 110,
						beta: 10,
						viewDistance: 15,
						depth: 40
					},
					marginTop: 40,
					marginRight: 0
				},
		 //area, bar, column, areaspline, pie, scatter, line
//		 http://www.highcharts.com/component/content/article/2-articles/news/54-highcharts-3-0-released
		   
				title: {
					text: 'Last 4 Week CV Entry Progress'
				},
				yAxis: {
					allowDecimals: false,
					title: {
						text: ''
					}
				},
		
				  plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 10
        }
				},
				
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b><br/>'+
						  this.series.name.toUpperCase()+'='+ this.point.y +'';
					}
				},
			
			});
		});
		 </script>
         
         <script type="text/javascript">
		$(function () {
			$('#container1').highcharts({
				data: {
					table: document.getElementById('datatable1') 
				},
				chart: {
					type: 'pie',
								options3d: {
						enabled: true,
						alpha: 110,
						beta: 10,
						viewDistance: 45,
						depth: 40
					},
					marginTop: 40,
					marginRight: 0
				},
		 //area, bar, column, areaspline, pie, scatter, line
//		 http://www.highcharts.com/component/content/article/2-articles/news/54-highcharts-3-0-released
		   
				title: {
					text: 'CV Entry Progress'
				},
				yAxis: {
					allowDecimals: false,
					title: {
						text: ''
					}
				},
		
				  plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 100
        }
				},
				
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b><br/>'+
						  this.series.name.toUpperCase()+'='+ this.point.y +'';
					}
				},
			
			});
		});
		 </script>
 </head>

<body>
 <script src="Highcharts/js/modules/data.js"></script>
 
<div id="wrap">
<?php include 'includes/header.php'; ?>
 <div id="content" >
 
   <table width="100%"  align="center" border="0" height="126" >
  
<tr>

      <td width="222" align="center" id="rcornersegc" >
      <span style="font-size:22px;" ><strong>
    <!--  <div class="box"> -->
      <img src="images/noimage/egcw.png" width="52" height="56" /><strong><br />
        EGC - </strong>
            <?php  
 		$sql = mysql_query("SELECT COUNT(egcEmp) AS CompanyEmployees FROM cvbankdb.tblcvmain WHERE egcEmp='Y'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
 		?>
        <span class="count"><? echo $data['CompanyEmployees']; ?></span></strong></span></td>
   <!--    </div> -->
      <td width="148" height="122" rowspan="2" align="center" id="rcornerssmec"   style="font-size:22px;"><strong><img src="images/noimage/smecw.png" alt="" width="77" height="59" /><br />
        SMEC - </strong>
        <?php  
 		$sql = mysql_query("SELECT COUNT(smecEmp) AS CompanyEmployees FROM cvbankdb.tblcvmain WHERE smecEmp='Y'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
 		?>
        <span class="count"><? echo $data['CompanyEmployees']; ?></span></td>

      <td width="274" rowspan="2" align="center"  id="rcornerssj"><span style="font-size:18px;"  ><strong><img src="images/noimage/sjw.png" alt="" width="83" height="51" /><br />
        Surbana Jurong</strong>
          - 
          <?php  
 		$sql = mysql_query("SELECT COUNT(sjEmp) AS CompanyEmployees FROM cvbankdb.tblcvmain WHERE sjEmp='Y'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
 		?>
          <span class="count"><? echo $data['CompanyEmployees']; ?></span></span></td>
      <td width="276" rowspan="2" align="center" id="rcornersother"><span style="font-size:22px;"><strong><br />
          <br />
          <br />
          Other</strong>
        <?php  
 		$sql = mysql_query("SELECT COUNT(otherEmp) AS CompanyEmployees FROM cvbankdb.tblcvmain WHERE otherEmp='Y'");
		$data=mysql_fetch_assoc($sql); 
		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
 		?>
          <br />
          <span class="count"><? echo $data['CompanyEmployees']; ?></span></span></td>
    </tr>
 

  </table>
  <hr /> 

 
<div id="leftcolumn">

<div id="container" style="min-width: 200px; height: 300px; margin: 0 auto"></div>
<br />
<br />

<table width="300" height="42" id="datatable" border="0" align="center"  >

<? 
//$sSQL1 = "SELECT cvId, posted_date, WEEK(posted_date) as week FROM tblcvmain WHERE posted_date BETWEEN '2017-03-01' AND '2017-03-30' ORDER BY posted_date";

//	$sSQL1 = " select * FROM tbleducation Where cvId=$cvID  ";

//$date = '$posted_date'; 
//echo "monday".date("Y-m-d", strtotime('monday this week', strtotime($date))), "\n";   
//echo "sunday".date("Y-m-d", strtotime('sunday this week', strtotime($date))), "\n";


//$sSQL1 = " SELECT YEAR(posted_date) as YearOf, WEEK(posted_date) as WEEK, CONCAT(DATE_FORMAT(DATE_ADD(posted_date, INTERVAL(1-DAYOFWEEK(posted_date)) DAY),'%b-%e'), '   To  ', DATE_FORMAT(DATE_ADD(posted_date, INTERVAL(7-DAYOFWEEK(posted_date)) DAY),'%b-%e')) AS DATE_RANGE,count(cvId) as CvEntered FROM `tblcvmain` WHERE YEAR(posted_date)=2017 GROUP BY YEARWEEK (posted_date) ORDER BY `week` desc ";


$sSQL1 = " SELECT YEAR(posted_date) as YearOf, WEEK(posted_date) as WEEK, CONCAT(DATE_FORMAT(DATE_ADD(posted_date, INTERVAL(2-DAYOFWEEK(posted_date)) DAY),'%e-%b'), ' To ', DATE_FORMAT(DATE_ADD(posted_date, INTERVAL(8-DAYOFWEEK (posted_date)) DAY),'%e-%b')) AS DATE_RANGE,count(cvId) as CvEntered FROM `tblcvmain` WHERE YEAR(posted_date)=2017 GROUP BY YEARWEEK (posted_date) ORDER BY `week` desc";

$objDb->query($sSQL1); 

?>

<tbody>   

<thead style="color:#FFF">  <th width="293">Week </th> <th width="262">CV Entered/ Week</th>   
<?
$TotalDispWk = 4;
$iCount = $objDb->getCount( );
	if($iCount>0)
	{
		for ($i = 0 ; $i < $TotalDispWk; $i ++)
		{
	/*	$cvId			= $objDb->getField($i, cvId);
		$posted_date 	= $objDb->getField($i, posted_date);
		$week  			= $objDb->getField($i, week);*/
	//	$CvEntered  = $objDb->getField($i, CvEntered);
		$YearOf			= $objDb->getField($i, cvId);
		$CvEntered 		= $objDb->getField($i, CvEntered);
		$DATE_RANGE  	= $objDb->getField($i, DATE_RANGE);
		$week  			= $objDb->getField($i, week);
 ?>

<tr>
<!-- <td> <? echo "<strong>Week: ".$week."</strong> <small>(".$DATE_RANGE.") </small>";?> </td>  <td width="136" align="center"><? echo $CvEntered; ?></td> 
-->
</tr>
<tr>
<td width="293"> <? echo "<strong>  ".$DATE_RANGE." (".$CvEntered.") </strong> ";?> </td>  <td width="262" align="center"><? echo $CvEntered; ?></td> 

</tr>
 <? }}?>

</table>
<!-- ?v=vdate&amp;vd=2017/05/02  -->
	</div>

<div id="wrapper">

<div id="rightcolumn" >
<table width="95%" height="50%"   border="0" align="center" bgcolor="#0066FF">
<tr>
<td style="color:white; font-size:x-large" align="center" height="80px"><strong>TODAY's ENTRIES</strong>
  <br />
<? 

//$dayminus = "-18"; 

echo $nowtodaydate = date("d-M-Y");
//$date = $nowtodaydate;
//$newdate = strtotime($dayminus.' day', strtotime($date));
//echo "<br>new ".$newdate = date('Y-m-d', $newdate);
//$newdate1 = date('j-m-Y', $newdate);

//echo "<small> <br />  ".$newdate."</small>";

?>
</td>
</tr>
</table>

<table width="95%" height="00"   border="0" align="center" >

<tr valign="middle">
<? 

$sSQL1 = " SELECT cvId, posted_date, COUNT(*) as cnt_today_rec FROM tblcvmain WHERE posted_date = CURDATE() ";
  $objDb->query($sSQL1); ?>

<tbody>   
		<?
        //$TotalDispWk = 4;
        $iCount = $objDb->getCount( );
        if($iCount>0)
        {
            for ($i = 0 ; $i < 1; $i ++)
            {
            $posted_date	= $objDb->getField($i, posted_date);
            $cnt_today_rec	= $objDb->getField($i, cnt_today_rec);

$newDateplaced = date("d-M-Y", strtotime($posted_date));
$dateplace = $newDateplaced;

if($cnt_today_rec < 1){ $dateplace = date("d-M-Y", strtotime($nowdt)); } else {$dateplace = $newDateplaced;}

?>
<tr>
<td align="center" height="50px" bgcolor="#FFFFFF" > <strong><font size='+2' face='Calibri' color='#585858' >New Entries:</font></strong><font size='+2' face='Calibri' color='#585858' > <a href="cvlist.php?v=tod" title="Today Entered Record List" target="_new"> <? echo '('.$cnt_today_rec.") "; ?></a> </font>
    <!-- <progress max="30" value="<? echo $cnt_today_rec;?>" data-label="50% Complete"></progress>  -->
    
    </td>
         <? }}?>  </tr>
</tbody>

</table>
 
 
<table width="95%" height="00"   border="0" align="center" >

<tr valign="middle" >
<? 
$nowtoday = date("Y-m-d");

$sSQL1 = " SELECT cvId, updated_on, COUNT(*) as cnt_today_rec FROM tblcvmain WHERE updated_on like '$nowtoday%' ";
$objDb->query($sSQL1); ?>

<tbody>   
		<?
        //$TotalDispWk = 4;
        $iCount = $objDb->getCount( );
        if($iCount>0)
        {
            for ($i = 0 ; $i < 1; $i ++)
            {
            $updated_on	= $objDb->getField($i, updated_on);
            $cnt_today_rec	= $objDb->getField($i, cnt_today_rec);

$newDateplaced = "Modified - ".date("d-M-Y", strtotime($updated_on));
$dateplace = $newDateplaced;

if($cnt_today_rec < 1){ $dateplace = date("d-M-Y", strtotime($nowdt)); } else {$dateplace = $newDateplaced;}

?>
<tr>
    <td align="center" height="50px" bgcolor="#CCCCCC" valign="middle" ><font size='+2' face='Calibri' color='#585858' ><strong>Modified Entries:</strong><a href="cvlist.php?v=modiftod" title="Today Modofied Cvs Record List" target="_new"> <? echo ' ('.$cnt_today_rec.") "; ?></a></font>
<!--    <progress max="30" value="<? echo $cnt_today_rec;?>" data-label="50% Complete"></progress> -->

</td>  

 </tr>
 
 
 <? }}?>  </tr>
</tbody>

</table>

<div id="rightcolumn" >

<table width="95%" height="50px"   border="0" bordercolor="#F0F0F0" align="left"  >

<tr>
<? 
//$sSQL1 = "SELECT cvId, posted_date, WEEK(posted_date) as week FROM tblcvmain WHERE posted_date BETWEEN '2017-03-01' AND '2017-03-30' ORDER BY posted_date";
// $sSQL1 = "SELECT ep_name, count(*) as number FROM tblcvmain GROUP BY ep_name";  
// $sSQL1 = " SELECT cvId, count(*) as Total_Records_Entered FROM tblcvmain ";
//$sSQL1 = "select ep_name, COUNT(*)ascount from tblcvmain group by ep_name Union all select 'Total CVs' ep_name, COUNT(ep_name) from tblcvmain ORDER BY count DESC ";

$sSQL1 = "SELECT MONTHNAME(posted_date) as month_posted, ep_name, posted_date, count(*) as rec_count FROM tblcvmain WHERE posted_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND posted_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY group by ep_name";
$objDb->query($sSQL1);
?>
<tr> <td bgcolor="#996699"> <strong><font size='+2' face='Calibri' color='#FFFFFF'>  Last Week CVs (#) </font></strong></td></tr>
<tbody>   
		<?
        //$TotalDispWk = 4;
        $iCount = $objDb->getCount( );
        if($iCount>0)
        {
            for ($i = 0 ; $i < $iCount; $i ++)
            {
            $month_posted	= $objDb->getField($i, month_posted);
            $ep_name		= $objDb->getField($i, ep_name);
            $posted_date	= $objDb->getField($i, posted_date);			
            $rec_count		= $objDb->getField($i, rec_count);			
         ?>
  
  <tr>
  <td align="center" height="10"  bgcolor="#D8BFD8" valign="middle"> <font size='+1' face='Calibri' color='#585858'> <? echo   $ep_name.'  ('.$rec_count.")"; ?>   
  <progress max="30" value="<? echo $rec_count;?>" data-label="50% Complete"></progress> 
 </font>
         </td>
    </tr>

         <? }}?>
</tbody>

</table>
<br />
 

<div id="rightcolumn">
<table width="95%" cellpadding="20"   border="0" align="left"  >

<tr>
<? 
$sSQL1 = " select ep_name, COUNT(*) as count from tblcvmain group by ep_name Union all select 'Total CVs' ep_name, COUNT(ep_name) from tblcvmain ORDER BY `count` DESC ";
  $objDb->query($sSQL1);

 ?>


<tbody>   
		<?
        //$TotalDispWk = 4;
        $iCount = $objDb->getCount( );
        if($iCount>0)
        {
            for ($i = 0 ; $i < 1; $i ++)
            {
            $ep_name	= $objDb->getField($i, ep_name);
            $count		= $objDb->getField($i, count);
            $TotalCVs	= $objDb->getField($i, TotalCVs);			
         ?>
  <tr>
  <td align="center" height="40" bgcolor="#669966" > <font size='+1' face='Calibri'  color='#FFFFFF' >  <? echo $ep_name.'  ('.$count.") </font>"; ?>  
 <progress max="2000" value="<? echo $count;?>" data-label="50% Complete"></progress> 
 </font>        </td>
    </tr>
         <? }}?>
</tbody></tr>

</table>

</div>
</div>
</div>
 
<div id="wrapper">
<div id="leftcolumn">
<br />
 
 
<table width="300px" height="00"   border="0" align="left"  >

<tr>
<? 
$sSQL1 = " SELECT cvId, nationality, count(*) as cnt_nationality FROM `tblcvmain` WHERE nationality<>162 ";
  $objDb->query($sSQL1);
  ?>

 <tbody>   
 		<?
        //$TotalDispWk = 4;
        $iCount = $objDb->getCount( );
        if($iCount>0)
        {
            for ($i = 0 ; $i < 1; $i ++)
            {
  			 $cnt_nationality	= $objDb->getField($i, cnt_nationality);
   ?>
  <tr>
   <td height="40" width="35%" valign="middle" align="center"><a href="cvlist.php?v=foreign" title="Foreigner Attached with Us" target="_blank"><img src="images/foreignercv2.gif" width="55"  height="49"/ ></a></td>
  
  <td valign="middle" width="85%"><strong>  <font size='3' face='Calibri' color='#585858'>
  Foreigners <em>(<? echo $cnt_nationality; ?>)</em></font></strong> </td>
    <? }} ?>
    
    </tr>

<tr>
<? 
$sSQL1 = " SELECT count(eDegreeTitle) as phds FROM `tbleducation` where eDegreeTitle like 'Ph%' OR '%DOCT%' ";
  $objDb->query($sSQL1);
  ?>

 <tbody>   
 		<?
        //$TotalDispWk = 4;
        $iCount = $objDb->getCount( );
        if($iCount>0)
        {
            for ($i = 0 ; $i < 1; $i ++)
            {
  			 $phds	= $objDb->getField($i, phds);
         ?>
  <tr>
 
  <td height="40" width="35%" valign="middle" align="center"><a href="#" title="Ph.D. Doctors in CV Baank " target="_self"><img src="images/doctors.png" width="49"  height="49"/ ></a></td>
 
  <td valign="middle" width="8%"><font size='3' face='Calibri' color='#585858'> <strong>Ph.D. Doctors <em>(<? echo "$phds"; ?>)</em></strong> </font></td>
    <? }} ?>
    
    </tr>
 </tbody>
</table>


 <table width="320px" height="00"   border="0" align="left"  >

<tr>
<? 
$sSQL1 = " select cvId, cvVerification, Count(*) as Verfiycv FROM tblcvmain where cvVerification='V' ";
$objDb->query($sSQL1);
  ?>

 <tbody>   
 		<?
        //$TotalDispWk = 4;
        $iCount = $objDb->getCount( );
        if($iCount>0)
        {
            for ($i = 0 ; $i < 1; $i ++)
            {
  			 $Verfiycv	= $objDb->getField($i, Verfiycv);
         ?>
  <tr>
 
  <td height="0" valign="middle"><a href="cvlist.php?v=verif" title="Verified Cvs" target="_NEW"><img src="images/verified-done.gif" width="60"  height="56"/ ></a></td>
  <td valign="middle" width="90%" align="left"><strong><? echo "<font size='3' face='Calibri' color='#585858'> Verified CVs ($Verfiycv) </font>"; ?></strong></td>
    <? }} ?>
    
    </tr>
    
<tr>
		<? $sSQL1 = " select cvId, cvVerification, Count(*) as Pendcv FROM tblcvmain where cvVerification='P' ";
        $objDb->query($sSQL1);  ?>
 <tbody>   
 		<?
        //$TotalDispWk = 4;
        $iCount = $objDb->getCount( );
        if($iCount>0)
        {
            for ($i = 0 ; $i < 1; $i ++)
            {
  			 $Pendcv	= $objDb->getField($i, Pendcv);
         ?>
  <tr>
 
  <td height="0" align="center" valign="middle"><a href="cvlist.php?v=pend" title="Cvs Pending for Approval, Please review it!!!" target="_new"><img src="images/pending.gif" alt="" width="43"  height="40" /></a></td>
  <td valign="middle" width="90%" align="left"><font size='3' face='Calibri' color='#585858'> <strong>Pending CVs<em> (<? echo $Pendcv?>)</em></strong></font> </td>
    <? }} ?>
    </tr>
  </tbody>
</table>


<table border="0" width="100%"  align="left" >
   <tr>
     <td width="101"  align="center" valign="middle"><a href="statistics.php" title="Statistics" target="_new"><img src="images/experts1.png" alt="" width="55"  height="56"></a></td>
     <td width="532"  align="left" valign="middle"> <strong><font size='4' face='Calibri' color='#585858'> Available Professionals List </a>(<a href="statistics.php" title="Cv Statistics" target="_new">Statistics</a>)</font></strong></td>
   </tr>
</table>

</div>


</div>




<div id="rightcolumn">
<script src="Highcharts/js/highcharts.js"></script>
<script src="Highcharts/js/modules/data.js"></script>
<script src="Highcharts/js/modules/exporting.js"></script>

<div id="container1" style="min-width: 100px; height: 250px; margin: 0 auto"></div>
 
<table width="100%" height="100%" id="datatable1" border="0" align="center"  >

<? 
//$sSQL1 = "SELECT cvId, posted_date, WEEK(posted_date) as week FROM tblcvmain WHERE posted_date BETWEEN '2017-03-01' AND '2017-03-30' ORDER BY posted_date";

//	$sSQL1 = " select * FROM tbleducation Where cvId=$cvID  ";
// $sSQL1 = "select ep_name, COUNT(*) as count from tblcvmain group by ep_name Union all select 'Total CVs' ep_name, COUNT(ep_name) from tblcvmain ORDER BY `count` DESC ";
$sSQL1 = "select ep_name, COUNT(*) as count_rec from tblcvmain group by ep_name";
$objDb->query($sSQL1);
?>

<tbody>   

<thead style="color:#FFF"> <th width="293">Person </th> <th width="136">CV Entered (#)</th>   
<?
	$iCount = $objDb->getCount( );
	if($iCount>0)
	{
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$ep_name		= $objDb->getField($i, ep_name);
	$count_rec		= $objDb->getField($i, count_rec);			
	?>
<tr>
 
<td width="39"> <? echo "<strong> ".$ep_name." </strong>  ";?> </td>  <td width="51" align="center"><? echo $count_rec; ?></td> 

</tr>
 <? }}?>
 
</table>
</div>

 
 
 
 
 
 
 
 
 
<div id="leftcolumn">
    
<table width="50%" height="100%"  border="0" align="center"  class="CSSTableGenerator"  >
  <tr>
       <td colspan="3"   style="color:#0E0989; font-size:22px" >Month-wise CVs Entered in CV Bank</td>
     </tr>
<? 
//$sSQL1 = "SELECT cvId, posted_date, WEEK(posted_date) as week FROM tblcvmain WHERE posted_date BETWEEN '2017-03-01' AND '2017-03-30' ORDER BY posted_date";

//	$sSQL1 = " select * FROM tbleducation Where cvId=$cvID  ";
// $sSQL1 = "select ep_name, COUNT(*) as count from tblcvmain group by ep_name Union all select 'Total CVs' ep_name, COUNT(ep_name) from tblcvmain ORDER BY `count` DESC ";

$sSQL1 = " SELECT YEAR(posted_date) as Year, DATE_FORMAT(posted_date, '%M') as 'Month', COUNT(*) as CvEntered from tblcvmain GROUP BY YEAR(posted_date), MONTH(posted_date) ORDER BY YEAR(posted_date) desc, month(posted_date) DESC ";

//$sSQL1 = "select ep_name, COUNT(*) as count_rec from tblcvmain group by ep_name";
$objDb->query($sSQL1);
?>
 
  <td width="50" align="center"><strong>Year </strong></td> <td width="50" align="center"><strong>Month</strong></td>  
	<td width="50" align="center"><strong>CV Entered (#)</strong></td>   
<?
	$iCount = $objDb->getCount( );
	if($iCount>0)
	{
	for ($i = 0 ; $i < $iCount; $i ++)
	{
	$Year		= $objDb->getField($i, Year);
	$Month		= $objDb->getField($i, Month);			
	$CvEntered		= $objDb->getField($i, CvEntered);			
	?>
<tr>
 
<td width="50" align="center"> <? echo  $Year ;?> </td>  <td width="51" align="center"><? echo $Month; ?></td>  <td width="51" align="center"><? echo $CvEntered; ?></td> 

</tr>
 <? }}?>
 
</table>
</div>
</div>



  <? include ("includes/footer.php"); ?>
</div>
</div>
</div>

</div>
</div>
</body>
</html>
