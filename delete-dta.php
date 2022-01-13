<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
if ($strusername==null)
{
	header("Location: ../index.php?init=3");
}
$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
$updatedon = $date->format('Y-m-d H:i:s');

?>
<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
	
	$cvid = $_REQUEST['id'];
	$did  = $_REQUEST['delete'];
	
	
	$sSQL = "SELECT * FROM tbldta WHERE cvId=$cvid and dId=$did;";

	
	if ($objDb->query($sSQL) == true && $objDb->getCount( ) == 1)
	{
		$sSQL5 = "DELETE FROM cvbankdb.tbldta WHERE cvId=$cvid and dId=$did";
		$objDb->query($sSQL5);
		
		$tuSql = "update cvbankdb.tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvid'";
		$objDb->execute($tuSql);
		
		header ('Location: dta.php?id='.$cvid);
	}
?>

