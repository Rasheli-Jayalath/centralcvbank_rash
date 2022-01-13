<?php

  if(isset($_POST['submit_docs'])){
          header("Content-Type: application/vnd.msword");
          header("Expires: 0");//no-cache
          header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
          header("content-disposition: attachment;filename=sampleword.doc");
  }
?>






<?php
/*
header("Content-Type: application/vnd.mspowerpoint");
$fname = "Export ".time().".doc";
  $file = fopen($fname,"w+");
  fwrite($file,$msword);
  fclose($file);
  header('Content-Type: application/vnd.ms-word');
  header('Content-Disposition: attachment; filename="'.basename($fname).'"');
  readfile($fname);
  unlink($fname);  
 */

?>




<?php /*?><?php

	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=spreadsheet.xls" );
	
	// print your data here. note the following:
	// - cells/columns are separated by tabs ("\t")
	// - rows are separated by newlines ("\n")
	
	// for example:
	echo 'First Name' . "\t" . 'Last Name' . "\t" . 'Phone' . "\n";
	echo 'John' . "\t" . 'Doe' . "\t" . '555-5555' . "\n";
?><?php */?>

<?php /*?><?php

$select = " select mdid, opportunityid, projectname, sector, clientname, eoistatus, eoiduedate, tfduedate, tfstatus, leadfirm FROM  maindata WHERE eoistatus='to be submitted' or tfstatus='to be submitted' order by mdid desc limit 0,100";

$export = mysql_query($select); 
$fields = mysql_num_fields($export); 
for ($i = 0; $i < $fields; $i++) { 
   $header .= mysql_field_name($export, $i) . "\t"; 
} 
while($row = mysql_fetch_row($export)) { 
    $line = ''; 
    foreach($row as $value) {                                             
        if ((!isset($value)) OR ($value == "")) { 
            $value = " \t"; 
        } else {
        $value=stripcslashes($value); 
            $value = str_replace('"', '""', $value); 
            $value = '"' . $value . '"' . "\t"; 
        } 
        $line .= $value; 
    } 
    $data .= trim($line)."\n"; 
} 
$data = str_replace("\r","",$data); 
if ($data == "") { 
    $data = "\n(0) Records Found!\n";                         
} 
header("Content-type: application/x-msdownload"); 
header("Content-Disposition: attachment; filename=list.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo "$header\n$data"; 
?><?php */?>





