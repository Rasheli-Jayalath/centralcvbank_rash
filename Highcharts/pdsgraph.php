<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> <?php $title ?> </title>

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

<table width="433" height="213" id="datatable" border="1" align="center">
	<thead>
		<tr>
			<th>Project</th>
			<th>Duration</th>
			<th>Completed</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		  <td width="227">PMC</td>
		  <td width="95" align="center" valign="middle">24</td>
		  <td width="89" align="center" valign="middle">9</td>
		</tr>
		<tr>
		  <td width="227">SSESA</td>
		  <td align="center" valign="middle">12</td>
		  <td align="center" valign="middle">11</td>
		</tr>
		<tr>
		  <td width="227">NKB</td>
		  <td align="center" valign="middle">60</td>
		  <td align="center" valign="middle">12</td>
		</tr>
		<tr>
		  <td width="227">FMC</td>
		  <td align="center" valign="middle">72</td>
		  <td align="center" valign="middle">21</td>
		</tr>
		<tr>
		  <td width="227">Lawi HPP</td>
		  <td align="center" valign="middle">73</td>
		  <td align="center" valign="middle">22</td>
		</tr>
		<tr>
		  <td width="227">Munda Dam</td>
		  <td align="center" valign="middle">73</td>
		  <td align="center" valign="middle">25</td>
	  </tr>
		<tr>
		  <td width="227">Fsd Highway Circle</td>
		  <td align="center" valign="middle">56</td>
		  <td align="center" valign="middle">53</td>
	  </tr>
		<tr>
		  <td width="227">River Bridge in District, Okara</td>
		  <td align="center" valign="middle">70</td>
		  <td align="center" valign="middle">61</td>
	  </tr>
		<tr>
		  <td width="227">Lower Bari Doab Canal</td>
		  <td align="center" valign="middle">70</td>
		  <td align="center" valign="middle">65</td>
	  </tr>
		<tr>
		  <td width="227">EIA/RAP,Kachhi Canal</td>
		  <td align="center" valign="middle">123</td>
		  <td align="center" valign="middle">114</td>
	  </tr>
	</tbody>
</table>
</body>
</html>
