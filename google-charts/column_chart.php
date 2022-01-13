<?php
$sql = mysql_connect("localhost","root","");
if(!$sql)
{
	echo "Connection Not Created";
}
$con = mysql_select_db("cvbankdb");
if(!$sql)
{
	echo "Database Not Connected";
}
?>

<?
 //include('db.php');
$data[] = array('Employee','Markes');
$sql1 = "select * from cvbankdb.courses";
$query = mysql_query($sql1);
while($result = mysql_fetch_array($query))
{
$data[] = array($result['subject'],(int)$result['number']);
  
}

$data = array($data);	
echo json_encode($data);

//echo json_encode($data, JSON_NUMERIC_CHECK);
?>
