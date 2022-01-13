<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

 
 		$sql = mysql_query("SELECT edited_by as editedby FROM tblcvmain where cvId = '$cvID'  limit 1");
	 	$data=mysql_fetch_assoc($sql); 
		$editedperson = $data['editedby'];
 		//echo '<font color=#DEA202 size="6"><b>'.roundToTheNearestAnything($data['Employees'],10).'+</b></font>';
		//echo $data['editedby']; 
 	 
		 
$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', edited_by = '$editedperson, $strusername' where cvId = '$cvID'";
$objDb2->execute($tuSql);

?>