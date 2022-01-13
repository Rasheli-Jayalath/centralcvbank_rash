<?php

 

$BD  = $_SESSION['BD'];
$PK  = $_SESSION['PK'];
$IN = $_SESSION['IND'];
$SL  = $_SESSION['SL'];
$AF  = $_SESSION['AF'];
$KZ  = $_SESSION['KZ'];
 $NP  = $_SESSION['NP'];
$ALLC = $_SESSION['ALLC'];

if($BD==1){ 
$countrycode = 'BD'; 
}
else if ($PK==1){ 
$countrycode = 'PK'; 
}
else if ($IN==1){ 
$countrycode = 'IN'; 
}
else if ($SL==1){ 
$countrycode = 'SL'; 
}
else if ($AF==1){ 
$countrycode = 'AF'; 
}
else if ($KZ==1){ 
$countrycode = 'KZ'; 
}
else if ($NP==1){ 
$countrycode = 'NP'; 
}
else if ($ALLC==1){ 
$countrycode = 'ALLC'; 
}

/*
//echo $countrycode." " .  $clen = strlen($countrycode);
  $clen = strlen($countrycode);
if ($clen==2)
{	include 'headerloc.php'; }
else 
{	include 'header.php'; 	}
*/
?>
