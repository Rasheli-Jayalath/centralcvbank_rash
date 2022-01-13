<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
if ($strusername==null)
{
	header("Location: ../index.php?init=3");
}
$pdsflag = $_SESSION['pds'];
$pdsadmflag = $_SESSION['pdsadm'];
if ($pdsflag==0)
{
	header("Location: ../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('includes/metatag.php'); ?>
</head>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        data: {
            table: document.getElementById('datatable')
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Projects In-Hand'
        },
        yAxis: {
            allowDecimals: true,
            title: {
                text: 'Months'
            }
        },
		
        tooltip: {
            formatter: function() {
                return '<b>'+ this.series.name +'</b><br/>'+
                    this.point.y +' '+ this.point.name.toLowerCase();
            }
        }
		
    });
});
		</script>
	</head>
    
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table width="532" height="213" id="datatable" border="1" align="center">
	<thead>
		<tr>
			<th>Project</th>
			<th>Duration</th>
			<th>Completed</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		  <td width="218">PMC</td>
		  <td width="62" align="center" valign="middle">24</td>
		  <td width="143" align="center" valign="middle">9</td>
		</tr>
		<tr>
		  <td width="218">SSESA</td>
		  <td align="center" valign="middle">12</td>
		  <td align="center" valign="middle">11</td>
		</tr>
		<tr>
		  <td width="218">NKB</td>
		  <td align="center" valign="middle">60</td>
		  <td align="center" valign="middle">12</td>
		</tr>
		<tr>
		  <td width="218">FMC</td>
		  <td align="center" valign="middle">72</td>
		  <td align="center" valign="middle">21</td>
		</tr>
		<tr>
		  <td width="218">Lawi HPP</td>
		  <td align="center" valign="middle">73</td>
		  <td align="center" valign="middle">22</td>
		</tr>
		<tr>
		  <td width="218">Munda Dam</td>
		  <td align="center" valign="middle">73</td>
		  <td align="center" valign="middle">25</td>
	  </tr>
		<tr>
		  <td width="218">Fsd Highway Circle</td>
		  <td align="center" valign="middle">56</td>
		  <td align="center" valign="middle">53</td>
	  </tr>
		<tr>
		  <td width="218">River Bridge in District, Okara</td>
		  <td align="center" valign="middle">70</td>
		  <td align="center" valign="middle">61</td>
	  </tr>
		<tr>
		  <td width="218">Lower Bari Doab Canal</td>
		  <td align="center" valign="middle">70</td>
		  <td align="center" valign="middle">65</td>
	  </tr>
		<tr>
		  <td width="218">EIA/RAP,Kachhi Canal</td>
		  <td align="center" valign="middle">123</td>
		  <td align="center" valign="middle">114</td>
	  </tr>
	</tbody>
</table>
<body>
<div id="wrap">
  <?php
     include 'includes/header.php';
   ?>
  <div id="content" >
   <table width="90%"  align="center" border="0" >
     <tr>
       <td height="40" align="left" style="color:#0E0989; font-size:22px" ><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="864" height="114">
<param name="movie" value="../swfs/PDS.swf" />
<param name="quality" value="best" />
<param name="menu" value="true" />
<param name="allowScriptAccess" value="sameDomain" />
<embed src="../swfs/PDS.swf" quality="best" menu="true" width="864" height="114" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="sameDomain" />
</object>

 
       
       </td>
     </tr>
     <tr><td height="40" align="left" style="color:#0E0989; font-size:22px" >Welcome to EGC Project Data Sheets (PDS) Bank</td>
   </tr>
    <tr><td height="31"><strong>Project Data Sheets (PDS) Bank - System Introduction</strong></td>
    </tr>
   <tr>
     <td height="99"  style="line-height:18px; text-align:justify">Engineering General Consultants EGC Pvt. Ltd. is going to start its computerized PDS Bank to handle the large amount of Project Data Sheets of its projects. Here is the option to enter Project Data Sheets by using Submit PDS option. A strong database is working at backend. You can also view the latest entered PDS here. The facility to search required PDS is also here. </td>
   </tr>
   </tr>
   <tr><td height="29"><strong>EGC Mission</strong></td>
   </tr>
   <tr><td height="56"  style="line-height:18px;">

To develop and promote excellence for providing quality based consultancy services in

engineering and other fields and to make acknowledged and respected contribution towards building a better world.</td>
   </tr>
   <tr><td height="21"><br />
</td></tr>
</table>
    
  </div>
   <? include ("includes/footer.php"); ?>
</div>
</body>
</html>
