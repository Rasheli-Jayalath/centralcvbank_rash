<?php
error_reporting(E_ALL & ~E_NOTICE);
@require_once("includes/saveurl.php");
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
	$nomination_id  = $_REQUEST['delete'];
	

	$sSQL = "SELECT * FROM nomination WHERE cvid=$cvid and nomination_id=$nomination_id;";
	if ($objDb->query($sSQL) == true && $objDb->getCount( ) == 1)
	{
		$sSQL5 = "DELETE FROM nomination WHERE cvid=$cvid and nomination_id=$nomination_id;";
		$objDb->query($sSQL5);
		$tuSql = "update tblcvmain SET lastupdate = now() where cvId = '$cvid'";
		$objDb->execute($tuSql);
		header ('Location: nomination_form.php?id='.$cvid);
	}
?>

