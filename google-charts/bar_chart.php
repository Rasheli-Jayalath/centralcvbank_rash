<?php
include('db.php');
$data[] = array('Employee','Markes');
$sql = "select * from courses";
$query = mysql_query($sql);
while($result = mysql_fetch_array($query))
{
$data[] = array($result['subject'],(int)$result['number']);
  
}




//	$data = array($data);			
echo json_encode($data);
?>
