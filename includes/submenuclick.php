<? function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}

 $adressSelect =  getAddress();
 
//$text = $adressSelect;

// this echoes "Simple text." because chars are case sensitive
//echo strpbrk($text, 'fi');

//$a = 'How are you?';

$sear = $adressSelect;
//if(strpos($sear,'firm'))

//$mystring = 'abc';
//$findme   = 'f';

$search =  substr($adressSelect, 51, 3);  // bcd
//$searchtwo = 'mop';


if(preg_match("/{$search}/i", $adressSelect)) {

    if($search == 'fir') {$firminfo="active"; }
		else
    if($search == 'mop')  { $mop="active"; }	
		else
	if($search == 'edu') { $edu="active"; }	
		else
	if($search == 'lan') { $lan="active"; }	
		else
	if($search == 'oth') { $oth="active"; }	
		else
	if($search == 'ach') { $ach="active"; }	
		else
	if($search == 'exp') { $exp="active"; }	
		else
	if($search == 'upl') { $upl="active"; }	
		else
	if($search == 'doc') { $doc="active"; }		
		else
	if($search == 'nom') { $nom="active"; }		

else {
	 { $sub="active"; }	
	 }
}



?>

