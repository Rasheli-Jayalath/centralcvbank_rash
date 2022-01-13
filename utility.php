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
$sql_select="select cvId, name from tblcvmain where cvId=6219";
$query_select=mysql_query($sql_select); 
while($result=mysql_fetch_array($query_select))
{
	 $cvId=$result['cvId'];
	  $txtname=mysql_real_escape_string(trim($result['name']));
	$created_by	= $strusername;
			 $userid_owner	= $user_cd; 
			 $datt=date('Y-m-d H:i:s');
			 $doc_creat_by=$created_by." ".$datt;
$sSQL_c = ("INSERT INTO  rs_tbl_category (parent_cd,category_name,category_status,category_order,cid,creater,creater_id) VALUES (0,'$txtname', 0, 0,$cvId,'$doc_creat_by',$userid_owner)");
	$res_s=mysql_query($sSQL_c);
	echo $cat_id=mysql_insert_id();

	$sabc_u="UPDATE rs_tbl_category SET parent_group=$cat_id WHERE category_cd=$cat_id";
	mysql_query($sabc_u);
	$sSQL_tem = ("INSERT INTO   rs_tbl_category_template (cat_id,cat_temp_order,cat_field_name,cat_title_text) VALUES ($cat_id,1, 'report_title', 'Title')");
	$res_tem=mysql_query($sSQL_tem);
	
	
	for($i=0; $i<9; $i++)
	{
		if($i==0)
		{
			$foldername='CVs';
		}
		
		elseif($i==1)
		{
			$foldername='Pictures';
		}
		elseif($i==2)
		{
			$foldername='Signatures';
		}
		elseif($i==3)
		{
			$foldername='Education Documents';
		}
		elseif($i==4)
		{
			$foldername='Experience Documents';
		}
		elseif($i==5)
		{
			$foldername='Certificates and Membership';
		}
		elseif($i==6)
		{
			$foldername='Verification';
		}
		elseif($i==7)
		{
			$foldername='Correspondence';
		}
		
		elseif($i==8)
		{
			$foldername='Others';
		}
		
	$sSQL_1 = ("INSERT INTO  rs_tbl_category (parent_cd,category_name,category_status,category_order,cid,creater,creater_id) VALUES ($cat_id,'$foldername', 0, 0,$cvId,' $doc_creat_by',$userid_owner)");
	$res_1=mysql_query($sSQL_1);
		 $cat_id_1=mysql_insert_id();
		$p_group=$cat_id."_".$cat_id_1;
	$sabc_1="UPDATE rs_tbl_category SET parent_group='$p_group' WHERE category_cd=$cat_id_1";
	mysql_query($sabc_1);
	
	if($foldername=='CVs')
	{
	$sSQL_tem1 = ("INSERT INTO   rs_tbl_category_template (cat_id,cat_temp_order,cat_field_name,cat_title_text) VALUES ($cat_id_1,1, 'report_title', 'File Name')");
	$res_tem1=mysql_query($sSQL_tem1);
	$sSQL_tem2 = ("INSERT INTO   rs_tbl_category_template (cat_id,cat_temp_order,cat_field_name,cat_title_text) VALUES ($cat_id_1,1, 'remarks', 'Description')");
	$res_tem2=mysql_query($sSQL_tem2);
	}
	else
	{
		$sSQL_tem = ("INSERT INTO   rs_tbl_category_template (cat_id,cat_temp_order,cat_field_name,cat_title_text) VALUES ($cat_id_1,1, 'report_title', 'File Name')");
		$res_tem=mysql_query($sSQL_tem);
	}
	
	
	$i=$i++;
	}
	
	$cat_id="";
}
	




?>

