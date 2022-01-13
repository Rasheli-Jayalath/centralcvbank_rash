<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
@require_once("includes/saveurl.php");
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
	
	//$cvid = $_REQUEST['id'];
	$project_id  = $_REQUEST['delete'];
	

	$sSQL = "SELECT * FROM tbl_project WHERE project_id=$project_id;";
	if ($objDb->query($sSQL) == true && $objDb->getCount( ) == 1)
	{
		$sSQL5 = "DELETE FROM tbl_project WHERE project_id=$project_id;";
		$objDb->query($sSQL5);
		$tuSql = "update tblcvmain SET lastupdate = now() where cvId = '$cvid'";
		$objDb->execute($tuSql);
		header ('Location: new_project_form.php');
	}
?>

