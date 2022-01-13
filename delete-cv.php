<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
if ($strusername==null)
{
	header("Location: ../index.php?init=3");
}
$cvflag = $_SESSION['cv'];
$cvadmflag = $_SESSION['cvadm'];
if ($cvflag==0 || $cvadmflag==0) 
{
header("Location: ../index.php");
}
else
{
?>
<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
	
	$cvid = $_REQUEST['cvid'];

	$sSQL = "SELECT * FROM tblcvmain WHERE cvId=$cvid;";
	if ($objDb->query($sSQL) == true && $objDb->getCount( ) == 1)
	{
		$sSQL2 = "DELETE FROM tblcvmain WHERE cvId=$cvid;";
		$objDb->query($sSQL2);
		$sSQL3 = "DELETE FROM tblachievements WHERE cvId=$cvid;";
		$objDb->query($sSQL3);
		$sSQL4 = "DELETE FROM tbleducation WHERE cvId=$cvid;";
		$objDb->query($sSQL4);
		$sSQL5 = "DELETE FROM tblemploymentrecord WHERE cvId=$cvid;";
		$objDb->query($sSQL5);
		$sSQL6 = "DELETE FROM tblfirm WHERE cvId=$cvid;";
		$objDb->query($sSQL6);
		$sSQL8 = "DELETE FROM tbllanguages WHERE cvId=$cvid;";
		$objDb->query($sSQL8);
		$sSQL9 = "DELETE FROM tblmop WHERE cvId=$cvid;";
		$objDb->query($sSQL9);
		$sSQL10 = "DELETE FROM tblothers WHERE cvId=$cvid;";
		$objDb->query($sSQL10);
		header("Location: cvlist.php?v=latest");
	}
}
?>

