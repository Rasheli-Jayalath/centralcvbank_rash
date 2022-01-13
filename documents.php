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
?>

<?php

error_reporting(E_ALL & ~E_NOTICE);
session_start();
 $user_cd = $_SESSION['uid'];

$strusername = $_SESSION['uname'];
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];



$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
$updatedon = $date->format('Y-m-d H:i:s');

if ($strusername==null )
{
	header("Location: ../index.php?init=3");
}
?>

<?php
//@require_once("requires/session.php");

	//$objDb  = new Database( );
	//$objDb2 = new Database( );
@include("fckeditor/fckeditor.php");

$cvID = $_REQUEST['id'];
$msg="";

$saveBtn	= $_REQUEST['save']; 
$updateBtn	= $_REQUEST['update'];
$clear		= $_REQUEST['clear'];
$next    	= $_REQUEST['next'];
//--------------------------------------------------------------
$txtid				= $_REQUEST['txtid'];
$txtname			= $_REQUEST['txtname'];
$signature			= $_REQUEST['signature'];
$picture			= $_REQUEST['picture'];
$originalcv			= $_REQUEST['originalcv'];
$birthcert			= $_REQUEST['birthcert'];
$edudocs			= $_REQUEST['edudocs'];
$expdocs			= $_REQUEST['expdocs'];

$txtdatetime		= date('Y-m-d');
$txtlastupdate		= $_REQUEST['txtlastupdate'];
$txtupdated_on		= $_REQUEST['txtupdated_on'];


$now = new DateTime();
$nowyear = $now->format("Y");

//-------------------------------------------------
if($clear!="")
{
$txtid				= '';
$txtname			= '';
$txtdob				= '';
$chkgender			= '';
$opmstatus			= '';
$txtcnic			= '';
$txtlandline		= '';
$txtmobile			= '';
$txtemail			= '';
$cmbcitizen			= '';
$txtlocation    	= '';
$chksmec			= '';
$chkegc				= '';
$txtpassport		= '';
$txttotalexperience	= '';
$txtstartexpyr		= '';
$txtprofession		= '';
$txtssn				= '';
$txtposition		= '';
$txtpaddress		= '';
$txtoaddress		= '';
$txtcaddress		= '';
$txtareaofexpertise	= '';
$txtwecountries		= '';
$txtcompcap			= '';
$txtKeyQualification= '';
$txtremarks			= '';
$txtinfo1			= '';
$txtinfo2			= '';
$txtinfo3			= '';
$txtinfodetail		= '';
$txtref				= '';
$originalcv			= '';
$birthcert			= '';
$edudocs			= '';
$expdocs			= '';
$picture			= '';
$signature			= '';
$txtlastupdate		= '';
$txtupdated_on		= '';
}
if($cvID=="")
{
}
else
{
$cvId=$cvID;
}
?>
<style>
a
{
text-decoration:none
}

.report_tbl {
/*margin-right:-45px;*/
padding:0px;
min-width:100%;	box-shadow: 10px 10px 5px #888888;
border:1px solid #000000;

-moz-border-radius-bottomleft:0px;
-webkit-border-bottom-left-radius:0px;
border-bottom-left-radius:0px;

-moz-border-radius-bottomright:0px;
-webkit-border-bottom-right-radius:0px;
border-bottom-right-radius:0px;

-moz-border-radius-topright:0px;
-webkit-border-top-right-radius:0px;
border-top-right-radius:0px;

-moz-border-radius-topleft:0px;
-webkit-border-top-left-radius:0px;
border-top-left-radius:0px;
}.report_tbl table{
min-width:100%;
height:100%;
margin-left:50px;
padding:0px;
}.report_tbl tr:last-child td:last-child {
-moz-border-radius-bottomright:0px;
-webkit-border-bottom-right-radius:0px;
border-bottom-right-radius:0px;
}
.report_tbl table tr:first-child td:first-child {
-moz-border-radius-topleft:0px;
-webkit-border-top-left-radius:0px;
border-top-left-radius:0px;
}
.report_tbl table tr:first-child td:last-child {
-moz-border-radius-topright:0px;
-webkit-border-top-right-radius:0px;
border-top-right-radius:0px;
}.report_tbl tr:last-child td:first-child{
-moz-border-radius-bottomleft:0px;
-webkit-border-bottom-left-radius:0px;
border-bottom-left-radius:0px;
}.report_tbl tr:hover td{
background-color:#d3e9ff;
}
.report_tbl td{
vertical-align:middle;
	background:-o-linear-gradient(bottom, #ffffff 5%, #d3e9ff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #d9d9ea) ); 	background:-moz-linear-gradient( center top, #ffffff 5%, #d3e9ff 100% );	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#d3e9ff");	background: -o-linear-gradient(top,#ffffff,d3e9ff);
background-color:#ffffff;
border:1px solid #000000;
border-width:0px 1px 1px 0px;
text-align:left;
padding:7px;
font-size:14px;
font-family:Arial;
font-weight:normal;
color:#000000;
}.report_tbl tr:last-child td{
border-width:0px 1px 0px 0px;
}.report_tbl tr td:last-child{
border-width:0px 0px 1px 0px;
}.report_tbl tr:last-child td:last-child{
border-width:0px 0px 0px 0px;
}
.report_tbl tr:first-child td{
	background:-o-linear-gradient(bottom, #0057af 5%, #007fff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, 
#c0c0c0), color-stop(1, #c0c0c0) );	background:-moz-linear-gradient( center top, #0057af 5%, #007fff 100% );	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0057af", endColorstr="#007fff");	background: -o-linear-gradient(top,#0057af,007fff);
background-color:#0057af;
border:0px solid #000000;
text-align:center;
border-width:0px 1px 1px 0;
font-size:14px;
font-family:Arial;
font-weight:bold;
color:#ffffff;
}
.report_tbl tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #0057af 5%, #007fff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #edf4fa), color-stop(1, #007fff) );	background:-moz-linear-gradient( center top, #0057af 5%, #007fff 100% );	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0057af", endColorstr="#007fff");	background: -o-linear-gradient(top,#0057af,007fff);
background-color:#0057af;
}
.report_tbl tr:first-child td:first-child{
border-width:0px 1px 1px 0px;
}
.report_tbl tr:first-child td:last-child{
border-width:0px 0px 1px 0px;
}
</style>
<script src="lightbox/js/lightbox.min.js"></script>
  <link href="lightbox/css/lightbox.css" rel="stylesheet" /> 
<?php

 //$user_type= 1;


$report_path = REPORT_PATH;

$category_cd = $_REQUEST['category_cd'];
$subcategory_cd = $_REQUEST['subcategory_cd'];
$cid = $_REQUEST['cid'];
if(isset($_GET['mode']) && $_GET['mode'] == "delete"){
				$report_cd = $_GET['report_cd'];
				$cid_del = $_GET['cid'];
				$cat_cd_del = $_GET['cat_cd'];
				$category_cd_del = $_GET['category_cd'];
				$sql2d="Select * from rs_tbl_documents where report_id='$report_cd'";
				$res2d=mysql_query($sql2d);
				$row2d=mysql_fetch_array($res2d);				
				$file_report=$row2d['report_file'];
				if($file_report!=""){
									@unlink(REPORT_PATH . $file_report);
										
									}
				$objProduct->resetProperty();
				$objProduct->setProperty("report_id", $report_cd);
				$objProduct->actReport("D");
				$objCommon->setMessage("Record deleted Successfully", 'Info');
				$activity="File deleted successfully";
	$sSQLlog_log = "INSERT INTO rs_tbl_user_log(user_id, epname, logintime, user_ip, user_pcname, url_capture) VALUES ('$uid', '$nameuser', '$nowdt', '$ipadd', '$hostname','$activity')";
	mysql_query($sSQLlog_log);	
				//redirect('./?p=reports&category_cd='.$category_cd_del.'&cat_cd='.$cat_cd_del.'&cid='.$cid_del);
				redirect('./documents.php?id='.$cvID.'&category_cd='.$category_cd_del.'&cat_cd='.$cat_cd_del.'&cid='.$cid_del);
	
	
}
if(isset($_GET['mode']) && $_GET['mode'] == "cat_delete"){
				$category_cd_c = $_GET['category_cd'];
				$cid_c = $_GET['cid'];
				$cat_cd_c = $_GET['cat_cd'];
				$category_cd_cat = $_GET['sel_category_cd'];
				 $sql2c="Select * from rs_tbl_category where parent_cd='$category_cd_cat'";
				$res2c=mysql_query($sql2c);
				if(mysql_num_rows($res2c)>=1)
				{
				
				$objCommon->setMessage("You should delete its sub category(s) first", 'Error');
				//redirect('./?p=reports&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
				redirect('./documents.php?id='.$cvID.'&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
				}
				else
				{
				
			
				
				
			   $sql2t="Select * from rs_tbl_documents where report_category='$category_cd_cat'";
				$res2t=mysql_query($sql2t);
				 $res2t=mysql_query($sql2t);
				$row2d=mysql_fetch_array($res2d);
					if(mysql_num_rows($res2t)>=1)
					{
					$objCommon->setMessage("You should delete its document(s) first", 'Error');
					//redirect('./?p=reports&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
					redirect('./documents.php?id='.$cvID.'&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
					}
					else
					{
					 $sdeletet= "Delete from rs_tbl_category_template where cat_id='$category_cd_cat'";
					   mysql_query($sdeletet);
						$objProduct->resetProperty();
						$objProduct->setProperty("category_cd", $category_cd_cat);
						$objProduct->actCategory("D");
						$objCommon->setMessage(PRD_DELETE_SUCCESS, 'Info');
						$activity="Category deleted successfully";
	$sSQLlog_log = "INSERT INTO rs_tbl_user_log(user_id, epname, logintime, user_ip, user_pcname, url_capture) VALUES ('$uid', '$nameuser', '$nowdt', '$ipadd', '$hostname','$activity')";
	mysql_query($sSQLlog_log);		
						
						//redirect('./?p=reports&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
						redirect('./documents.php?id='.$cvID.'&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
					}				
				
				
				}
	
	
}
if(isset($_GET['mode']) && $_GET['mode'] == "task_delete"){
				$category_cd_c = $_GET['category_cd'];
				$cid_c = $_GET['cid'];
				$cat_cd_c = $_GET['cat_cd'];
				$sel_task_id = $_GET['sel_task_id'];
				$delete_task_msg= "Delete from rs_tbl_threads where thread_no='$sel_task_id'";
				mysql_query($delete_task_msg);
				$delete_task_attach= "Delete from rs_tbl_attachments where thread_no='$sel_task_id'";
				mysql_query($delete_task_attach);				
				$delete_task= "Delete from rs_tbl_threads_titles where tt_id='$sel_task_id'";
				mysql_query($delete_task);
				$activity="Task deleted successfully";
	$sSQLlog_log = "INSERT INTO rs_tbl_user_log(user_id, epname, logintime, user_ip, user_pcname, url_capture) VALUES ('$uid', '$nameuser', '$nowdt', '$ipadd', '$hostname','$activity')";
	mysql_query($sSQLlog_log);	
				redirect('./?p=reports&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
	
	
}

if(isset($_GET['mode']) && $_GET['mode'] == "lock"){
				$category_cd_c = $_GET['category_cd'];
				$cid_c = $_GET['cid'];
				$cat_cd_c = $_GET['cat_cd'];
				$sel_task_id = $_GET['sel_task_id'];
				$status="0";
				echo $sql_pro="UPDATE rs_tbl_threads_titles SET status='$status' where tt_id='$sel_task_id'";
				mysql_query($sql_pro);
				$activity="Task has been locked";
	$sSQLlog_log = "INSERT INTO rs_tbl_user_log(user_id, epname, logintime, user_ip, user_pcname, url_capture) VALUES ('$uid', '$nameuser', '$nowdt', '$ipadd', '$hostname','$activity')";
	mysql_query($sSQLlog_log);	
				redirect('./?p=reports&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
	
	
}
if(isset($_GET['mode']) && $_GET['mode'] == "active"){
				$category_cd_c = $_GET['category_cd'];
				$cid_c = $_GET['cid'];
				$cat_cd_c = $_GET['cat_cd'];
				$sel_task_id = $_GET['sel_task_id'];
				$status="1";
				echo $sql_pro="UPDATE rs_tbl_threads_titles SET status='$status' where tt_id='$sel_task_id'";
				mysql_query($sql_pro);
				$activity="Task has been activated";
	$sSQLlog_log = "INSERT INTO rs_tbl_user_log(user_id, epname, logintime, user_ip, user_pcname, url_capture) VALUES ('$uid', '$nameuser', '$nowdt', '$ipadd', '$hostname','$activity')";
	mysql_query($sSQLlog_log);	
				redirect('./?p=reports&category_cd='.$category_cd_c.'&cat_cd='.$cat_cd_c.'&cid='.$cid_c);
	
	
}
///Filter
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_REQUEST["go_submit"])){
$report_sts = $_POST['report_status'];
echo $cvID;
if(isset($_GET['cat_cd']))
{
$cat_cd_new='&cat_cd='.$_GET['cat_cd'];
}
if($report_sts=='6')
{
//redirect('./?p=reports&cid='.$_GET['cid'].'&category_cd='.$_GET['category_cd'].$cat_cd_new);
redirect('./documents.php?id='.$cvID.'&cid='.$_GET['cid'].'&category_cd='.$_GET['category_cd'].$cat_cd_new);
}
else
{
//redirect('./?p=reports&cid='.$_GET['cid'].'&category_cd='.$_GET['category_cd'].$cat_cd_new.'&status='.$report_sts );
redirect('./documents.php?id='.$cvID.'&cid='.$_GET['cid'].'&category_cd='.$_GET['category_cd'].$cat_cd_new.'&status='.$report_sts );

}
}
///Filter End


///Task Filter
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_REQUEST["go_submit1"])){
$task_sts = $_POST['task_status'];

if(isset($_GET['cat_cd']))
{
$cat_cd_new='&cat_cd='.$_GET['cat_cd'];
}
if($task_sts=='7')
{
redirect('./?p=reports&cid='.$_GET['cid'].'&category_cd='.$_GET['category_cd'].$cat_cd_new);
}
else
{
redirect('./?p=reports&cid='.$_GET['cid'].'&category_cd='.$_GET['category_cd'].$cat_cd_new.'&t_status='.$task_sts );
}
}
///Task Filter End


if(isset($_GET['mode']) && $_GET['mode'] == "dgfDelete"){
	$report_cd = $_GET['report_cd'];
	
	$sdelete= "Delete from rs_tbl_documents where report_id='report_cd'";
	 mysql_query($sdelete);
      $sdeletet= "Delete from rs_tbl_category_template where cat_id='$category_cd'";
	   mysql_query($sdeletet);
		$objProduct->resetProperty();
		$objProduct->setProperty("category_cd", $category_cd);
		$objProduct->actCategory("D");
		
		 $sql2c="Select * from rs_tbl_category where parent_cd='$category_cd'";
				$res2c=mysql_query($sql2c);
				if(mysql_num_rows($res2c)>=1)
				{
				while($row2c=mysql_fetch_array($res2c))
				{
		/**/
			 $sql2d="Select * from rs_tbl_documents";
				$res2d=mysql_query($sql2d);
				while($row2d=mysql_fetch_array($res2d))
				{
				$d_subcat=$row2d['report_subcategory'];
				/*if($d_subcat=="")
				{
				$sdelete= "Delete from rs_tbl_documents where report_id='$row2d[report_id]'";
	 			  mysql_query($sdelete);

				}
				else
				{*/
				$d_sub_cat=explode("_",$d_subcat);				
				$dl=count($d_sub_cat);
				for($h=0;$h<$dl;$h++)
				{
				$report_suby=$d_sub_cat[$h];
				if($report_suby==$row2c['category_cd'])
				{
				 $sdelete= "Delete from rs_tbl_documents where report_id='$row2d[report_id]'";
	 			  mysql_query($sdelete);
				}
				
				}
				//}
				
				}
				 $sdeletet= "Delete from rs_tbl_category_template where cat_id='$row2c[category_cd]'";
	   mysql_query($sdeletet);
				$sdeletect= "Delete from rs_tbl_category where category_cd='$row2c[category_cd]'";
	 	 mysql_query($sdeletect);
		 		}
				}
				else
				{
				 $sql2d="Select * from rs_tbl_documents";
				$res2d=mysql_query($sql2d);
				while($row2d=mysql_fetch_array($res2d))
				{
				$d_subcat=$row2d['report_subcategory'];
				$d_sub_cat=explode("_",$d_subcat);				
				$dl=count($d_sub_cat);
				for($h=0;$h<$dl;$h++)
				{
				$report_suby=$d_sub_cat[$h];
				if($report_suby==$category_cd)
				{
				 $sdelete= "Delete from rs_tbl_documents where report_id='$row2d[report_id]'";
	 			  mysql_query($sdelete);
				}
				
				}
				
				}
				/* $sdeletet= "Delete from rs_tbl_category_template where cat_id='$category_cd'";
	   mysql_query($sdeletet);*/
				}
		
		
		$objCommon->setMessage(PRD_DELETE_SUCCESS, 'Info');
		redirect('./?p=category');
	
	
}
if(isset($_GET['cat_cd']))
	{
	 $cat_cd=$_GET['cat_cd'];
	}
	if(isset($_REQUEST['sort']))
	{
	 
	 if($_REQUEST['sort']=="asc")
	 {
	 $sort="asc";
	 $order="desc";
	 }
	 else if($_REQUEST['sort']=="desc")
	 {
	 $sort="desc";
	 $order="asc";
	 }
	 
	}
	else
	{
	$order="asc";
	}
	
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["download_submit"])){

	 	$files_download =$_POST['file_download'];
		$category=$_GET['category_cd'];
		 if(isset($files_download)){ 
		$files_count=count($files_download); 
		 for($i=0;$i<$files_count;$i++)
		 {
		 $all_download[]=$files_download[$i];		
		 }
		 $out = '';
   $out .="category_name".",";
   $out .="report_title".",";
   $out .="report_file".",";
   $out .="doc_issue_date".",";
   $out .="report_status".",";
   $out .="doc_upload_date".",";
   $out .="doc_creater".",";
   $out .="doc_last_modified_by".",";
   $out .="\n";
		foreach ($all_download as $selected_file_id) {

 $getquery="SELECT category_cd,category_name,report_title,report_file,doc_issue_date,report_status,doc_upload_date,doc_creater,doc_last_modified_by FROM rs_tbl_documents INNER JOIN rs_tbl_category ON 
 (rs_tbl_documents.report_category = rs_tbl_category.category_cd) where report_category=$category and report_id=$selected_file_id";
 $result=mysql_query($getquery);
 $num_rows = mysql_num_rows($result);

  $l = mysql_fetch_array($result);
  
	$results[] = $l['report_file'];
    $cat_name=preg_replace('/\s+/','_',$l['category_name']);
    $out.=$l['category_name'].",";
    $out.=str_replace(',','',$l['report_title']).",";	
	$out.="<a href='" .$l['report_file'] . "'>".$l['report_file']."</a> ,";
    $out.=$l['doc_issue_date'].",";
	$out.=$l['report_status'].",";
    $out.=$l['doc_upload_date'].",";
	$out.=$l['doc_creater'].",";
    $out.=$l['doc_last_modified_by'].",";
    $out .="\n";
 

}
}
 $td = date('Y-m-d-h-m-s',time());
 $filename1 = $cat_name.$td.".zip";
 // $f = fopen ("data/".$filename,'w+');
 // fputs($f, $out);
  //fclose($f);
  
  
  $zip = new ZipArchive();
$filename = SITE_PATH."Zip/".$filename1;

if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
}

$zip->addFromString("list-".$cat_name.$td.".csv", $out);
$zip->addFromString("instructions.txt", " The list of downloaded files is provided as csv in this archive.\n");

foreach ($results as $file) {
//echo $file
$zip->addFile("project_reports/".$file,"/".$file);
}

echo "numfiles: " . $zip->numFiles . "\n";
echo "status:" . $zip->status . "\n";
$zip->close();	


header('Content-Type: application/octet-stream');
header('Content-disposition: attachment; filename='.basename($filename1));
header('Content-Length: ' . filesize("Zip/".$filename1));
ob_clean();
flush();
readfile("Zip/".$filename1);
unlink("Zip/".$filename1);			


	
}


	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<?php include ('includes/metatag.php'); ?>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Central CV Bank 

</title>
<!-- plugins:css -->
<link rel="stylesheet" href="vendors/feather/feather.css">
<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/typicons/typicons.css">
<link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
<!-- endinject --> 
<!-- Plugin css for this page -->
<link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="js/select.dataTables.min.css">
<!-- End plugin css for this page --> 
<!-- inject:css -->
<link rel="stylesheet" href="css/vertical-layout-light/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="images/favicon.png" />
<script>
function atleast_onecheckbox(e) {
  if ($("input[type=checkbox]:checked").length === 0) {
      e.preventDefault();
      alert('Please check atleast on record');
      return false;
  }
}
</script>
<script>
function selectAllUnSelectAll(chkAll, strSelecting, frm){
if(chkAll.checked == true){
		for(var i = 0; i < frm.elements.length; i++){
			if(frm.elements[i].name == strSelecting){
				frm.elements[i].checked = true;
			}
		}
	}
	else{
		for(var i = 0; i < frm.elements.length; i++){
			if(frm.elements[i].name == strSelecting){
				frm.elements[i].checked = false;
			}
		}
	}
}

</script>
</head>

<body>
<div class="conformtainer-scroller">
<!-- partial:partials/_navbar.html -->

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
       
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize"> <span class="icon-menu"></span> </button>
    </div>
    <div> <a class="navbar-brand brand-logo" href="index.php"> <img src="images/faviconblue.png" alt="saca smec logo" /> </a> <a class="navbar-brand brand-logo-mini" href="index.php"> <img src="images/logo-mini.svg" alt="logo" /> </a> </div>
  </div>
    <?php include "includes/topheader.php" ; ?>
    <?php include ('includes/countryselection.php');  ?>
    
    <!-- //yyyy   -->
    
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas"> <span class="mdi mdi-menu"></span> </button>
  </div>
</nav>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_settings-panel.html -->
<? include "includes/skinwheel.php"; ?>
<div id="right-sidebar" class="settings-panel"> <i class="settings-close ti-close"></i>
  <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
    <li class="nav-item"> <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a> </li>
    <li class="nav-item"> <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a> </li>
  </ul>
  <div class="tab-content" id="setting-content">
    <div class="tab-pane fasede show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
      <div class="add-items d-flex px-3 mb-0">
        <form class="form w-100">
          <div class="form-group d-flex">
            <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
            <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
          </div>
        </form>
      </div>
      <div class="list-wrapper px-3">
        <ul class="d-flex flex-column-reverse todo-list">
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Team review meeting at 3.00 PM </label>
            </div>
            <i class="remove ti-close"></i> </li>
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Prepare for presentation </label>
            </div>
            <i class="remove ti-close"></i> </li>
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Resolve all the low priority tickets due today </label>
            </div>
            <i class="remove ti-close"></i> </li>
          <li class="completed">
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox" checked>
                Schedule meeting for next week </label>
            </div>
            <i class="remove ti-close"></i> </li>
          <li class="completed">
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox" checked>
                Project review </label>
            </div>
            <i class="remove ti-close"></i> </li>
        </ul>
      </div>
      <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
      <div class="events pt-4 px-3">
        <div class="wrapper d-flex mb-2"> <i class="ti-control-record text-primary me-2"></i> <span>Feb 11 2018</span> </div>
        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
        <p class="text-gray mb-0">The total number of sessions</p>
      </div>
      <div class="events pt-4 px-3">
        <div class="wrapper d-flex mb-2"> <i class="ti-control-record text-primary me-2"></i> <span>Feb 7 2018</span> </div>
        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
        <p class="text-gray mb-0 ">Call Sarah Graves</p>
      </div>
    </div>
    <!-- To do section tab ends -->
    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
      <div class="d-flex align-items-center justify-content-between border-bottom">
        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small> </div>
      <ul class="chat-list">
        <li class="list active">
          <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Thomas Douglas</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">19 min</small> </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
          <div class="info">
            <div class="wrapper d-flex">
              <p>Catherine</p>
            </div>
            <p>Away</p>
          </div>
          <div class="badge badge-success badge-pill my-auto mx-2">4</div>
          <small class="text-muted my-auto">23 min</small> </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Daniel Russell</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">14 min</small> </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
          <div class="info">
            <p>James Richardson</p>
            <p>Away</p>
          </div>
          <small class="text-muted my-auto">2 min</small> </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Madeline Kennedy</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">5 min</small> </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Sarah Graves</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">47 min</small> </li>
      </ul>
    </div>
    <!-- chat tab ends --> 
  </div>
</div>
<!-- partial --> 
<!-- partial:partials/_sidebar.html leftside menu -->
<? include "includes/leftsidemenu.php"; ?>
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
<div class="col-sm-12">
<div class="home-tab">
<div class="d-sm-flex align-items-center justify-content-between border-bottom">
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <?php include('includes/submenu.php') ?>

              
              <div>
              <div class="btn-wrapper"> 
                <!--   <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>  --> 
              </div>
            </div>
          </div>
          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
              <div class="row">
                <div class="col-sm-12"> </div>
              </div>
              <!-- <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                   <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the printing</h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div class="chartjs-wrapper mt-5">
                                  <canvas id="performaneLine"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card bg-primary card-rounded">
                              <div class="card-body pb-0">
                                <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <p class="status-summary-ight-white mb-1">Closed Value</p>
                                    <h2 class="text-info">357
                                  </div>
                                  <div class="col-sm-8">
                                    <div class="status-summary-chart-wrapper pb-4">
                                      <canvas id="status-summary"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                      <div class="circle-progress-width">
                                        <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                      </div>
                                      <div>
                                        <p class="text-small mb-2">Total Visitors</p>
                                        <h4 class="mb-0 fw-bold">26.80%</h4>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="circle-progress-width">
                                        <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                      </div>
                                      <div>
                                        <p class="text-small mb-2">Visits per day</p>
                                        <h4 class="mb-0 fw-bold">9065</h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>-->
              
                   
                  
     <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
           
            <div class="table-responsive pt-1">
              <div id="wrapperPRight">
<!--<div id="wrapperPRight">-->


<?php     $sqlss="select parent_group, category_status from rs_tbl_category where category_cd='$category_cd'  and cid=$cvID";
	$sqlrwss=mysql_query($sqlss);
	$sqlrw1ss=mysql_fetch_array($sqlrwss);
	$par_groups=$sqlrw1ss['parent_group'];
	$category_status=$sqlrw1ss['category_status'];
	$par_arr=explode("_",$par_groups);
	$lenns=count($par_arr);
	$category_name="";
	for($i=0;$i<$lenns;$i++)
	{
  $sqlCN="select category_name,parent_cd,cid from rs_tbl_category where category_cd='$par_arr[$i]' and cid=$cvID ";
		
	$sqlrCN=mysql_query($sqlCN);
	$sqlCNrw=mysql_fetch_array($sqlrCN);
	if($i==0)
	{
	$main_title=$sqlCNrw["category_name"];
	}
	$category_name .='<a href="documents.php?id='.$_REQUEST["id"].'&cid='.$sqlCNrw["cid"].'&cat_cd='.$sqlCNrw["parent_cd"].'&category_cd='.$par_arr[$i].'">'.$sqlCNrw["category_name"].'</a>';
	
	$category_name .="&nbsp;&raquo;&nbsp;";
	
	//$category_name .=$category_name;
	}
   $report_category=$category_name;
	$sql="Select * from rs_tbl_category where category_cd=".$category_cd. " and cid=".$cvID;
			$res=mysql_query($sql);
			$row3=mysql_fetch_array($res);
			
				//$report_category=$row3['category_name'];
				$parent_cd=$row3['parent_cd'];
				
			?>
         
		

    <?php //echo $objCommon->displayMessage();?>
	<div id="tableContainer" style="margin-top:4px" >
    <div style="font-size:20px; margin-bottom:20px; font-weight:bold"><?php echo $main_title; ?><?php 


?></div>
    <div  class="shadowWhite" >
    <div align="left"><?php echo $report_category;?></div></div>
    <table width="100%"  align="center" border="0" >

<?php if($superadminflag==1 || ($cvflag== 1 &&
$cvadmflag==1 && $cventryflag==1))
{
  ?>
<tr>
<td height="40" colspan="4" align="center" style=" padding-bottom:15px;padding-left:125px;" width="50%">
</td>
<td align="right" width="20%">

<a href="javascript:void(null);" onClick="window.open('category.php?id=<?php echo $_REQUEST["id"]; ?>&cat_cd=<?php echo $category_cd;?>&cid=<?php echo $cvID;?>', 'INV','width=870,height=550,scrollbars=yes');" ><img src="<?php echo SITE_URL;?>images/folder.ico" border="0" 
width="32" height="32" />Add Category</a>&nbsp;&nbsp;
<?php if($parent_cd!=0){?>
<a href="javascript:void(null);" onClick="window.open('upload_report.php?id=<?php echo $_REQUEST["id"]; ?>&cat_cd=<?php echo $_REQUEST["cat_cd"];?>&category_cd=<?php echo $category_cd;?>&cid=<?php echo $cid;?>', 'INV','width=550,height=400,scrollbars=yes');" >
<img src="<?php echo SITE_URL;?>images/doc.ico" border="0" width="32"/>Add File</a>
<?php
}
?>
</td>

</tr>
<?php
}
else if($_REQUEST['category_cd'])
{

			?>
			<tr>
<td height="40" colspan="2" align="center" style=" padding-bottom:15px;padding-left:125px;" width="50%"></td>
<td align="right" width="20%">
<!--<a href="javascript:void(null);" onclick="window.open('threads_input.php?cat_cd=<?php echo $category_cd;?>&cid=<?php echo $cid;?>', 'INV','width=870,height=550,scrollbars=yes');" ><img src="<?php echo SITE_URL;?>images/folder.ico" border="0" 
width="32" height="32" />Add Tasks</a> &nbsp;&nbsp;-->
</td>
<!--<td align="right" width="18%">
<a href="javascript:void(null);" onclick="window.open('category.php?cat_cd=<?php /*echo $category_cd;?>&cid=<?php echo $cid;?>', 'INV','width=870,height=550,scrollbars=yes');" ><img src="<?php echo SITE_URL;?>images/folder.ico" border="0" 
width="32" height="32" />Add Category</a></td>
<td align="right" width="12%"><a href="javascript:void(null);" onclick="window.open('upload_report.php?cat_cd=<?php echo $_REQUEST["cat_cd"];?>&category_cd=<?php echo $category_cd;?>&cid=<?php echo $cid;?>', 'INV','width=550,height=400,scrollbars=yes');" >
<img src="<?php echo SITE_URL;*/?>images/doc.ico" border="0" width="32"/>Add File</a></td> -->
</tr>
			<?php
			
}
?>


	
	<?php
	
			  
	$sql2="Select * from rs_tbl_category where parent_cd=".$category_cd. " and cid=".$cvID ;
			$res2=mysql_query($sql2);
		$total_num=mysql_num_rows($res2);
			if($total_num>=1)
			{
			?>
			<tr>
<td height="99" colspan="5"   style="line-height:18px;"  >

<span style="font-size:16px; font-weight:bold">Folders</span>
<table class="report_tbl" border="1px"  align="left" cellspacing="0" style="margin-top:5px; margin-bottom:20px" >

<tr >

<td style="color:#000066" width="2%">S#</td>
<?php
 $temp2="select * from rs_tbl_category_template where cat_id='$category_cd' order by cat_temp_order asc";
$res_temp2=mysql_query($temp2);
$res_temp2=mysql_fetch_array($res_temp2);
 $res_temp2['cat_title_text'];
?>
<td style="color:#000066" width="40%"><?php echo $res_temp2['cat_title_text'] ?></td>
<td style="color:#000066" width="25%">Created By</td>
<td style="color:#000066" width="25%">Last Modified By</td>
<td style="color:#000066" colspan="2">Actions</td>
<?php

?>

 </tr>
 <?php
 $y=1;
 while($row2=mysql_fetch_array($res2))
			 {
				$report_subcategory=$row2['category_name'];
				$category_cd."<br/>";
				$subcategory_id=$row2['category_cd'];
			$sub_folder="Select * from rs_tbl_category where parent_cd=".$subcategory_id." and cid=".$cvID;
			$sub_folders=mysql_query($sub_folder);
		    $total_subfolder=mysql_num_rows($sub_folders);
		    $files="Select * from rs_tbl_documents where report_category=".$subcategory_id;
			$files1=mysql_query($files);
		    $total_files=mysql_num_rows($files1);
if($superadminflag==1 || ($cvflag== 1 && $cvadmflag==1 && $cventryflag==1))
				{
				?>
				<tr >
<td style="color:#000066"><?php echo $y;?></td>
<td ><img  src="./images/folder1.png"/>&nbsp;<a style="color:#303131; text-decoration:none" href="documents.php?id=<?php echo $_REQUEST["id"]?>&category_cd=<?php echo $subcategory_id; ?>&cat_cd=<?php echo $category_cd; ?>&cid=<?php echo $cid; ?>"><?php echo $report_subcategory?></a></td>
<td><?php echo $row2['creater'];?><br /><font size="-5"><?php echo "folders: ".$total_subfolder."&nbsp;&nbsp; Files: ".$total_files; ?></font></td>
<td><?php echo $row2['last_modified_by'];?></td>
<td style="color:#000066" align="right"><a href="javascript:void(null);" onClick="window.open('category.php?category_cd=<?php echo $subcategory_id; ?>&cid=<?php echo $cid;?>', 'INV','width=750,height=700,scrollbars=yes');" >
<img src="./images/edit.gif" border="0" /></a></td>
<td style="color:#000066;" align="right">
<a href="javascript:void(0)" style="cursor: default;"><img  src="./images/delete.gif" style="opacity:0.4"/></a>

<!--<a href="documents.php?id=<?php echo $_REQUEST["id"]?>&sel_category_cd=<?php echo $subcategory_id; ?>&cid=<?php echo $_REQUEST['cid']; ?>&cat_cd=<?php if($_REQUEST['cat_cd'])
			 {
			 echo $_REQUEST['cat_cd'];
			 }
			 else
			 {
			 $cat=0;
			 
			 } ?>&category_cd=<?php echo $_REQUEST['category_cd']; ?>&mode=cat_delete"  onclick="return confirm('Are you sure, You want to delete category?')" ><img  src="./images/delete.gif"/></a>-->
             
             </td>

 </tr>
				<?php
				$y++;
				}
				else if($cvflag== 1 && $cvadmflag==0 && $cventryflag==1)
				{
				?>
				<tr>
<td style="color:#000066"><?php echo $y;?></td>
<td style="color:#000066"><img  src="./images/folder1.png"/>&nbsp;<a href="documents.php?id=<?php echo $_REQUEST["id"]?>&category_cd=<?php echo $subcategory_id; ?>&cat_cd=<?php echo $category_cd; ?>&cid=<?php echo $cid; ?>"><?php echo $report_subcategory?></a></td>
<td><?php echo $row2['creater'];?><br /><font size="-5"><?php echo "folders: ".$total_subfolder."&nbsp;&nbsp; Files: ".$total_files; ?></font></td>
<td><?php echo $row2['last_modified_by'];?></td>
<td colspan="2" style="color:#000066" align="right"><a href="javascript:void(null);" onClick="window.open('category.php?category_cd=<?php echo $subcategory_id; ?>&cid=<?php echo $cid;?>', 'INV','width=750,height=700,scrollbars=yes');" >
<img src="./images/edit.gif" border="0" /></a></td>


 </tr>
				<?php
				$y++;
				}
				else if($cvflag== 1 && $cvadmflag==0 && $cventryflag==0)
				{
				?>
				<tr>
<td style="color:#000066"><?php echo $y;?></td>
<td style="color:#000066"><img  src="./images/folder1.png"/>&nbsp;<a href="documents.php?id=<?php echo $_REQUEST["id"]?>&category_cd=<?php echo $subcategory_id; ?>&cat_cd=<?php echo $category_cd; ?>&cid=<?php echo $cid; ?>"><?php echo $report_subcategory?></a></td>
<td><?php echo $row2['creater'];?><br /><font size="-5"><?php echo "folders: ".$total_subfolder."&nbsp;&nbsp; Files: ".$total_files; ?></font></td>
<td><?php echo $row2['last_modified_by'];?></td>
<td colspan="2" style="color:#000066" align="right"></td>


 </tr>
				<?php
				$y++;
				}
				
				
			}
 ?>
</table>

</td>
</tr>
			<?php
			}
			
				
	?>
	
<tr>	

<td  colspan="5"  style="line-height:18px; text-align:justify">
<form name="reports_cat" id="reports_cat" method="post" action="" onSubmit="return atleast_onecheckbox(event)"> </form>
<span style=" font-size:16px; font-weight:bold">Files</span>
<?php if($category_status==1){ ?>
<span style="font-size:16px; font-weight:bold; float:right">
<?php if(isset($_GET['cat_cd']))
{
$cat_cd1="&cat_cd=".$_GET['cat_cd'];
} ?>
<form name="filter_1" id="filter_1" method="post" action="documents.php?id=<?php echo $_REQUEST['id'];?>&cid=<?php echo $_GET['cid']; ?>&category_cd=<?php echo $_GET['category_cd']?><?php echo $cat_cd1; ?>"> 
<select name="report_status" >
		<option value="6" <?php if(!isset($_GET['status']))echo "selected";?>>All Files</option>
		 <option value="1" <?php if($_GET['status']=='1')echo "selected";?>>Initiated</option>
  		<option value="2" <?php if($_GET['status']=='2')echo "selected";?>>Approved</option>
  		<option value="3" <?php if($_GET['status']=='3')echo "selected";?>>Not Approved</option>
  		<option value="4" <?php if($_GET['status']=='4')echo "selected";?>>Under Review</option>
 		 <option value="5" <?php if($_GET['status']=='5')echo "selected";?>>Response Awaited</option>
		 <option value="7" <?php if($_GET['status']=='7')echo "selected";?>>Responded</option>
</select> 
		
		<input type="submit" form="filter_1" name="go_submit" id="go_submit" value="GO" /> </form>
</span>
<?php
}
?>
<?php if($category_status==1){?> <span style="float:right; padding-right:50px;"><?php } else { ?>
<span style="font-size:16px; font-weight:bold; float:right"><?php } ?><input type="submit" name="download_submit" id="download_submit" value="Download Files" form="reports_cat" /></span>

<table class="report_tbl" align="right" cellspacing="0" style="margin-top:5px; margin-bottom:20px"  >

<tr>
<td style="color:#000066" width="2%">S#</td>
<td style="color:#000066" width="2%"><input  type="checkbox" name="chkAll" id=
          "chkAll" value="1" form="reports_cat" onClick="selectAllUnSelectAll(this,'file_download[]',reports_cat);"/></td>

<?php
$templ="select * from rs_tbl_category_template where cat_id='$category_cd' order by cat_temp_order asc";
$res_temp=mysql_query($templ);
$total=mysql_num_rows($res_temp);
while($res_temp1=mysql_fetch_array($res_temp))
{
//echo $cat_field_namee $res_temp1['cat_field_name'];
?>
<?php if(isset($_GET['status']))
{
$stats="&status=".$_GET['status'];
} ?>
<td style="color:#000066"><?php echo $res_temp1['cat_title_text'] ?> 
 <a href="?p=reports&category_cd=<?php echo $category_cd; ?>&<?php if($cat_cd=="")
{
}
else
{ ?>cat_cd=<?php echo $cat_cd;}?>&cid=<?php echo $cid;?><?php echo $stats; ?>&field=<?php echo $res_temp1['cat_field_name'];?>&sort=<?php echo $order;?>"><?php if($order=="asc"){?><img src="images/asc.png" title="Ascending" alt="Ascending"/><?php }else{?> <img src="images/desc.png" title="Descending" alt="Descending"/><?php } ?> </a></td>

<?php
}

?>
<td style="color:#000066" width="10%">Uploaded Date</td>
<td style="color:#000066" width="15%">Created By</td>
<td style="color:#000066" width="15%">Last Modified By</td>
<?php if($category_status==1){ ?>
<td style="color:#000066" width="20%">Status</td>
<?php
}
?>
<td width="2%" style="color:#000066" colspan="2">Action </td>
 </tr>
 
 <?php
	$objProduct->resetProperty();
	$objProduct->setProperty("limit", PERPAGE);
	//$objProduct->setProperty("report_status", "1");
	if(isset($_GET['cat_cd']))
	{
	 $cat_cd=$_GET['cat_cd'];
	 
	$sqls="select parent_group from rs_tbl_category where category_cd='$category_cd' and parent_cd='$cat_cd' and cid=$cvID";
	$sqlrws=mysql_query($sqls);
	$sqlrw1s=mysql_fetch_array($sqlrws);
	$par_group=$sqlrw1s['parent_group'];
	$par_arr=explode("_",$par_group);
	$lenns=count($par_arr);
	$cat_cds=$par_arr[0];
	$str_ids1="";
	for($i=1;$i<$lenns;$i++)
	{
	if($i==($lenns-1))
	{
	$str_ids=$par_arr[$i];
	}
	else
	{
	$str_ids=$par_arr[$i]."_";
	}
	$str_ids1=$str_ids1.$str_ids;
	
	}
	//echo $str_ids1;
	$objProduct->setProperty("report_category", $_REQUEST["category_cd"]);
	if(isset($_REQUEST["status"]))
	{
	$objProduct->setProperty("report_status", $_REQUEST["status"]);
	}
	//$objProduct->setProperty("report_subcategory", $cat_cds);
	if(isset($sort) && isset($_REQUEST['field']))
	{
	$column_name=$_REQUEST['field'];
	$objProduct->setProperty("column_name", $column_name);
	$objProduct->setProperty("sort", $sort);
	$objProduct->lstReportSort();
	}
	else
	{
	$objProduct->lstReport();
	}
	//echo $objProduct->getSQL();
	}
	else
	{
	$report_subcategory12='is NULL';
	$objProduct->setProperty("report_category", $category_cd);
	$objProduct->setProperty("report_subcategory", $report_subcategory12);
	if(isset($_REQUEST["status"]))
	{
	$objProduct->setProperty("report_status", $_REQUEST["status"]);
	}
	if(isset($sort) && isset($_REQUEST['field']))
	{
	$column_name=$_REQUEST['field'];
	$objProduct->setProperty("column_name", $column_name);
	$objProduct->setProperty("sort", $sort);
	$objProduct->lstReportsub_nullSort();
	}
	else
	{
	$objProduct->lstReportsub_null();
	}
	}
	
	$i=0;
	$isno=0;
	$Sql = $objProduct->getSQL();
	$objProduct->totalRecords();
	
	if($objProduct->totalRecords() >= 1){
		while($rows = $objProduct->dbFetchArray(1)){
			$bgcolor = ($bgcolor == "#FFFFFF") ? "#f1f0f0" : "#FFFFFF";
			$i++;
			
			?>
			<tr>

<td><?php $isno=$isno+1; echo  $isno;?></td>
<td><input type="checkbox"    name="file_download[]"  value="<?php echo $rows['report_id'];?>" form="reports_cat" /></td>
<?php
$temp5="select * from rs_tbl_category_template where cat_id='$category_cd'order by cat_temp_order asc";
$res_temp5=mysql_query($temp5);
$total=mysql_num_rows($res_temp5);
while($ress_temp5=mysql_fetch_array($res_temp5))
{
 $cat_field_namee =$ress_temp5['cat_field_name'];
?>
<td>

				<?php
				if ($cat_field_namee=="report_title")
				{
					if($rows['report_file']!="")
					{
					?>
					<a href="<?php echo REPORT_URL.$rows['report_file'] ;?>" target="_blank"><?php echo $rows['report_title'];?></a>
					<?php
					}
					else
					{
					echo $rows['report_title'];
					}
				}
				else if($cat_field_namee=="doc_issue_date")
				{
					if($rows['doc_issue_date']=="" || $rows['doc_issue_date']==NULL || $rows['doc_issue_date']=="0000-00-00" || $rows['doc_issue_date']=="1970-01-01")
					{
					echo "";
					}
					else
					{
					echo date('d F Y',strtotime($rows['doc_issue_date']));
					}
				}
				else if($cat_field_namee=="doc_closing_date")
				{
					
					if($rows['doc_closing_date']=="" || $rows['doc_closing_date']==NULL || $rows['doc_closing_date']=="0000-00-00" || $rows['doc_closing_date']=="1970-01-01")
					{
					echo "";
					}
					else
					{
					echo date('d F Y',strtotime($rows['doc_closing_date']));
					}
				}
				else if($cat_field_namee=="doc_upload_date")
				{
					
					if($rows['doc_upload_date']=="" || $rows['doc_upload_date']==NULL || $rows['doc_upload_date']=="0000-00-00" || $rows['doc_upload_date']=="1970-01-01")
					{
					echo "";
					}
					else
					{
					echo date('d F Y',strtotime($rows['doc_upload_date']));
					}
				}
				else if($cat_field_namee=="received_date")
				{
					
					if($rows['received_date']=="" || $rows['received_date']==NULL || $rows['received_date']=="0000-00-00" || $rows['received_date']=="1970-01-01")
					{
					echo "";
					}
					else
					{
					echo date('d F Y',strtotime($rows['received_date']));
					}
				}
				/*else if($cat_field_namee=="report_status")
				{
					if($rows['report_status']==1)
					{
					echo "Active";
					}
					else if($rows['report_status']==2)
					{
					echo "Inactive";
					}
				}*/
				else
				{
				echo $rows[$cat_field_namee];
				}
				 
				 ?></td>
<?php }?>
<td style="color:#000066" ><?php echo date('d F Y',strtotime($rows['uploading_file_date'])); ?></td>
<td style="color:#000066" ><?php echo $rows['doc_creater']; ?></td>
<td style="color:#000066" ><?php echo $rows['doc_last_modified_by']; ?></td>
<?php 
$sqldoc="Select * from rs_tbl_category where category_cd=".$_REQUEST['category_cd']." and cid=".$cvID;
			$res2doc=mysql_query($sqldoc);
			$total_numdd=mysql_num_rows($res2doc);
			if($total_numdd>=1)
			{
				 $f=1;
 			while($row2doc=mysql_fetch_array($res2doc))
			 {
			
			 ?>
			 <?php if($category_status==1){ ?>
			  <td><?php
			 		if($rows['report_status']=='1')
					{
					echo "Initiated <span style='float:right'><img width='15' height='15'  src='./images/initiated.png'  alt='Initiated' />";
					} 
					else if($rows['report_status']=='2')
					{
					echo "Approved <span style='float:right'><img width='15' height='15'  src='./images/approved.png'  alt='Approved' /></span>";
					}
					else if($rows['report_status']=='3')
					{
					echo  "Not Approved <span style='float:right'><img width='15' height='15'  src='./images/not_approved.png'  alt='Not Approved' /></span>";
					}
					else if($rows['report_status']=='4')
					{
					echo "Under Review <span style='float:right'><img width='15' height='15'  src='./images/under_review.png'  alt='Under Review' /></span>";
					}
					else if($rows['report_status']=='5')
					{
					echo "Response Awaited <span style='float:right'><img width='15' height='15'  src='./images/awaiting_decision.png'  alt='Awaiting Decision' /></span>";
					}
					else if($rows['report_status']=='7')
					{
					echo "Responded<span style='float:right'><img width='15' height='15'  src='./images/responded.png'  alt='Responded' /></span>";
					}?></td>
					<?php
					}
					?>
<?php /*?><td><a href="javascript:void(null);" onclick="window.open('send_file.php?report_id=<?php echo $rows['report_id']; ?>', 'Email','width=550,height=400,scrollbars=yes');" ><img  src="./images/send_mail.png" title="Send Email"/></a></td><?php */?>
<?php	
			 if($superadminflag==1 || ($cvflag== 1 && $cvadmflag==1 && $cventryflag==1))
				{
			 
			 ?>
			 <td><a href="javascript:void(null);" onClick="window.open('upload_report.php?report_id=<?php echo $rows['report_id']; ?>&cid=<?php echo $cid; ?>', 'INV','width=650,height=400,scrollbars=yes');" ><img src="./images/edit.gif" border="0" /></a></td>
			 <td style="color:#000066" align="right">&nbsp;
             <a href="javascript:void(0)" style="cursor: default;"><img  src="./images/delete.gif" style="opacity:0.4"/></a>

             
             <!--<a href="?p=reports&report_cd=<?php echo $rows['report_id']; ?>&cid=<?php echo $_REQUEST['cid']; ?>&cat_cd=<?php if($_REQUEST['cat_cd'])
			 {
			 echo $_REQUEST['cat_cd'];
			 }
			 else
			 {
			 $cat=0;
			 echo $cat;
			 } ?>&category_cd=<?php echo $_REQUEST['category_cd']; ?>&mode=delete"  onclick="return confirm('Are you sure, You want to delete this record?')"><img  src="./images/delete.gif"/></a>--></td>
			 <?php
			 }
			 else if($row2doc['parent_cd']==0)
			 {
			 ?>
			<td colspan="2"></td> 
			 <!--<td colspan="2"><a href="javascript:void(null);" onclick="window.open('upload_report.php?report_id=<?php //echo $rows['report_id']; ?>', 'INV','width=550,height=400,scrollbars=yes');" ><img src="./images/edit.gif" border="0" /></a></td>--> 
			 <?php
			 }
			 else if($cvflag== 1 && $cvadmflag==0 && $cventryflag==1)
							{
							
							
?>
<td colspan="2"><a href="javascript:void(null);" onClick="window.open('upload_report.php?report_id=<?php echo $rows['report_id']; ?>&cid=<?php echo $cid; ?>', 'INV','width=650,height=400,scrollbars=yes');" ><img src="./images/edit.gif" border="0" /></a></td>
						
<?php
}
							
			
			/* else
			 {
			$u_rightdoc=$row2doc['user_right'];
			$arruright_doc= explode(",",$u_rightdoc);
			$arr_right_docu=count($arruright_doc);		
			 foreach($arruright_doc as $key => $val) 
			 	{
			   $arruright_doc[$key] = trim($val);
			   $aright_doc= explode("_", $arruright_doc[$key]);
			    if($aright_doc[0]==$user_cd)
						{
							if($aright_doc[1]==1)
							{
							
							
?>
<td colspan="2"><a href="javascript:void(null);" onClick="window.open('upload_report.php?report_id=<?php echo $rows['report_id']; ?>', 'INV','width=650,height=400,scrollbars=yes');" ><img src="./images/edit.gif" border="0" /></a></td>
						
<?php
}
							else if($aright_doc[1]==3)
							{
							
							
?>
<td ><a href="javascript:void(null);" onClick="window.open('upload_report.php?report_id=<?php echo $rows['report_id']; ?>', 'INV','width=650,height=400,scrollbars=yes');" ><img src="./images/edit.gif" border="0" /></a></td>
<td style="color:#000066" align="right">&nbsp;<a href="?p=reports&report_cd=<?php echo $rows['report_id']; ?>&cid=<?php echo $_REQUEST['cid']; ?>&cat_cd=<?php if($_REQUEST['cat_cd'])
			 {
			 echo $_REQUEST['cat_cd'];
			 }
			 else
			 {
			 $cat=0;
			 echo $cat;
			 } ?>&category_cd=<?php echo $_REQUEST['category_cd']; ?>&mode=delete"  onclick="return confirm('Are you sure, You want to delete this record?')"><img  src="./images/delete.gif"/></a></td>
						
<?php
}
							else if($aright_doc[1]==2)
							{
							?>
							<td></td>
							<?php
							}
					}
				}
				}*/
			
				$f++;
				}
			}
?>
</tr>
			
			
			
	<?php		
			
		
			
		}
    }
	else{
	?>
    <tr>
	<?php $colspn=$total+6;?>
    	<td colspan="<?php echo $colspn; ?>" align="center" style="background-color:white"><?php echo "No record Found";?></td>
    </tr>
		<?php
        }
        ?>
</table>
</td>
</tr>

</table>
		
		</div>
 			
		
		
  
</div>
              <br clear="all" />
            </div>
          </div>
        </div>
      </div>
<!-- container-scroller --> 

<!-- plugins:js --> 
<script src="vendors/js/vendor.bundle.base.js"></script> 
<!-- endinject --> 
<!-- Plugin js for this page --> 
<script src="vendors/chart.js/Chart.min.js"></script> 
<script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> 
<script src="vendors/progressbar.js/progressbar.min.js"></script> 

<!-- End plugin js for this page --> 
<!-- inject:js --> 
<script src="js/off-canvas.js"></script> 
<script src="js/hoverable-collapse.js"></script> 
<script src="js/template.js"></script> 
<script src="js/settings.js"></script> 
<script src="js/todolist.js"></script> 
<!-- endinject --> 
<!-- Custom js for this page--> 
<script src="js/dashboard.js"></script> 
<script src="js/Chart.roundedBarCharts.js"></script> 
<!-- End custom js for this page-->
</body>
</html>
