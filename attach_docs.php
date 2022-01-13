<?php 
require_once("config/config.php");
$objCommon 		= new Common;
$objMenu 		= new Menu;
//$objNews 		= new News;
$objContent 	= new Content;
$objTemplate 	= new Template;
$objMail 		= new Mail;
$objCustomer 	= new Customer;
//$objCart 	= new Cart;
$objAdminUser 	= new AdminUser;
$objProduct 	= new Product;
$objValidate 	= new Validate;
//$objOrder 		= new Order;
$objLog 		= new Log;
require_once('rs_lang.admin.php');
require_once('rs_lang.website.php');
require_once('rs_lang.eng.php');

error_reporting(E_ALL & ~E_NOTICE);
session_start();
 $user_cd = 1;

$strusername = "Administrator";
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];
 $sql_select="select cvid, folder, old_filename, new_filename from tbldocs where cvid=6219";
$query_select=mysql_query($sql_select); 
while($result=mysql_fetch_array($query_select))
{
  
	echo $cvid=$result['cvid'];
	 $folder=$result['folder'];
	 echo  $old_filename=mysql_real_escape_string(trim($result['old_filename']));
	  $combine="";
	   $r_title=explode(".",$old_filename);
	  echo  $length=count($r_title);
	   for($j=0;$j<$length-1;$j++)
	   {
		   $combine=$combine." " .$r_title[$j];
	   }
	   
	  $report_title=$combine;
	   
	 $new_filename=$result['new_filename'];
	  $n_title=explode(".",$new_filename);	  
	   $extension=$n_title[1];
	// $file_size=round((filesize($filePath)),3);
	
$sql_selectm="select ep_name, datetime, posted_date from tblcvmain where cvId=$cvid";
$query_selectm=mysql_query($sql_selectm);
$cvrecord=mysql_num_rows($query_selectm); 
if($cvrecord==1)
{	
$resultm=mysql_fetch_array($query_selectm);
		 $ep_name=$resultm['ep_name'];
		 $datetime=$resultm['datetime'];
		 $posted_date=$resultm['posted_date'];
		 $created_by	= $ep_name;
			 $datt=$datetime;
			 $doc_creat_by=$created_by." ".$datt;
	
if( $folder=="original_cv")
{	 
echo $sql_selectd="select category_cd,cid from rs_tbl_category where cid=$cvid and category_name='CVs'";

}
else if( $folder=="edu_doc")
{	 
$sql_selectd="select category_cd,cid  from rs_tbl_category where cid=$cvid and category_name='Education Documents'";

}
else if( $folder=="exp_doc")
{	 
$sql_selectd="select category_cd,cid  from rs_tbl_category where cid=$cvid and category_name='Experience Documents'";
}
else if( $folder=="signatures")
{	 
echo $sql_selectd="select category_cd,cid from rs_tbl_category where cid=$cvid and category_name='Signatures'";

}
else if( $folder=="pictures")
{	 
$sql_selectd="select category_cd,cid  from rs_tbl_category where cid=$cvid and category_name='Pictures'";

}
else if( $folder=="others" || $folder=="pecdocs" || $folder=="birthcert" )
{	 
$sql_selectd="select category_cd,cid  from rs_tbl_category where cid=$cvid and category_name='Certificates and Membership'";
}
if($sql_selectd!="")
{
$query_selectd=mysql_query($sql_selectd); 
$resultd=mysql_fetch_array($query_selectd);

	echo  $category_cd=$resultd['category_cd'];
	$cid=$resultd['cid'];
	
if( $folder=="original_cv")
{
	echo 	$sSQL_c = ("INSERT INTO  rs_tbl_documents (report_category,report_title,report_file,extension,remarks,uploading_file_date,doc_creater, cvid) VALUES ($category_cd,'$report_title', '$new_filename', '$extension','Original CV','$posted_date','$doc_creat_by',$cid)");
}
else
{
echo 	$sSQL_c = ("INSERT INTO  rs_tbl_documents (report_category,report_title,report_file,extension,remarks,uploading_file_date,doc_creater, cvid) VALUES ($category_cd,'$report_title', '$new_filename', '$extension','','$posted_date','$doc_creat_by',$cid)");	
}

	
	$res_s=mysql_query($sSQL_c);

}
}
$remarks='';
 $category_cd='';	
 $sql_selectd="" ;
	 
}
	




?>

