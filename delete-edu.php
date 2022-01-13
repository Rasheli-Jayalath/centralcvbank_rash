<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
if ($strusername==null)
{
	header("Location: ../index.php?init=3");
}
?>
<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
	
	$cvid = $_REQUEST['id'];
	$eduid  = $_REQUEST['delete'];
	

	$sSQL = "SELECT * FROM tbleducation WHERE cvId=$cvid and eduId=$eduid;";
	if ($objDb->query($sSQL) == true && $objDb->getCount( ) == 1)
	{
		$sSQL5 = "DELETE FROM tbleducation WHERE cvId=$cvid and eduId=$eduid;";
		$objDb->query($sSQL5);
		$tuSql = "update tblcvmain SET lastupdate = now() where cvId = '$cvid'";
		$objDb->execute($tuSql);
		header ('Location: education.php?id='.$cvid);
	}
?>

