
<?php
session_start();
$uid = $_SESSION['uid'];
$nameuser = $_SESSION['uname'];
 
$ip = $_SERVER['REMOTE_ADDR'];
$ipadd = $ip;

//@require_once("requires/session.php");
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
 
// select @@session.time_zone;

$nowdatecatch = new DateTime();
$nowdatecatch->setTimezone(new DateTimeZone('Asia/Kolkata'));
$nowdt = $nowdatecatch->format('Y-m-d H:i:s');
//$date = date("Y-m-d H:i:s", strtotime($date_orig));
 

function current_url(){
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$validURL = str_replace ("&","&amp;",$url);
Return $validURL;
}
$fullurl = current_url();
//echo "Page URL is :  ".$fullurl;



$sSQLlog = "INSERT INTO controlpanel.tbluserlog(user_id, epname, logintime, user_ip, user_pcname, url_capture) VALUES ('$uid', '$nameuser', '$nowdt', '$ipadd', '$hostname', '$fullurl')";
mysql_query($sSQLlog);

//echo " KK  ".$sSQLlog;

	?>
    


 
