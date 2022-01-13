<?php
  @require_once("requires/session.php");
  
    $objDb  = new Database( );

    $result = array();
    $userArray = array();
    $response = array();

    $return_arr = array();

    $sSQL = "SELECT DISTINCT c.name as cname, COUNT(c.name) as ccount FROM tblcvmain m LEFT JOIN tblcountries c  ON m.nationality= c.countryId where c.countryId <>104 GROUP BY c.countryId  ORDER BY ccount DESC";
	$objDb->query($sSQL);
//    $iCount = $objDb->getCount( );
    $iCount = 10;

        if($iCount>0)
        {
            for ($i = 0 ; $i < $iCount; $i ++)
            {

            //$countryName = $objDb->getField($i, cname);
            $countryCount = $objDb->getField($i, ccount);

        
            if(!$countryCount==0)
            {
                // $userArray["cname"]=$objDb->getField($i, cname);
                // $userArray["ccount"]=$objDb->getField($i, ccount);
                // $result[]=$userArray;
                
                $return_arr[] = array("cname" => $objDb->getField($i, cname) ,"ccount" => $objDb->getField($i, ccount));
            }

            }

            //$response["Request_detail"] = $result;
        }


        echo json_encode( $return_arr);

 ?>