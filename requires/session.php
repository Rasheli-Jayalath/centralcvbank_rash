<?
	error_reporting(E_ALL & ~E_NOTICE);
	//@session_start( );
	@ob_start( );

	@ini_set('display_errors', 1);

	@require_once("configs.php");
	@require_once("db.class.php");
	@require_once("io.class.php");
	
	//@require_once("general.php");

	
?>