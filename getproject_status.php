<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );
$departid = 0;

if(isset($_POST['depart'])){
   $departid = $_POST['depart']; // department id
}

$users_arr = array();

if($departid > 0){

					$sSQL1 = "SELECT * FROM tbl_project WHERE project_id=".$departid;
					$objDb->query($sSQL1);
					$iCount1 = $objDb->getCount( );
					if($iCount1>0)
					{
						for ($i = 0 ; $i < $iCount1; $i ++)
						{
						$userid  			= $objDb->getField($i, project_status);
						$name  			= $objDb->getField($i, project_status);
        $users_arr[] = array("id" => $userid, "name" => $name);
    }
}
}
// encoding array to json format
echo json_encode($users_arr);

?>