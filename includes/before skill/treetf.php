<?php

error_reporting(E_ALL & ~E_NOTICE);

static $inc_count=1;
session_start();
$strusername = $_SESSION['uname'];
if ($strusername==null)
{
	header("Location: ../index.php?init=3");
}
$strusername = $_SESSION['uname'];
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$superadminflag = $_SESSION['superadmin'];

if ($cvflag==0 || $cventryflag==0) 
{
$msg = '<script type="text/javascript">alert("You have no Privileges to Open this page!")</script>';
echo $msg;

header("Location: ../index.php");

}
else
{
function ListFolder($path,$inc_count)
{
    
	//using the opendir function
    $dir_handle = @opendir($path) or die("<font color='#666666' size='3'> <br /><br /><br /><br /><center><strong>Not Uploaded: $path</strong></center> </font>");

    //Leave only the lastest folder name
	
     $dirname1 = explode("/", $path);
	 $dirname = end($dirname1);

    //display the target folder.
	
	 $inc_count++;
    echo '<li id="node_'.$inc_count.'">'.'<a href="#" id="'.$inc_count.'">'.$dirname."</a>";
	echo "<ul >";
    $inc_count++;
	readdir($dir_handle);
     while (false !== ($file = readdir($dir_handle))) 
    {
 
	    if($file!="." && $file!="..")

        {
            if (is_dir($path."/".$file))
            {   $inc_count++; //Display a list of sub folders.
                ListFolder($path."/".$file,$inc_count);
            }
            else
            {
                //Display a list of files.
				//chmod($path."/".$file,0444);
                echo "<li id='node_".$inc_count."' class='dhtmlgoodies_sheet.gif'><a href='".$path."/".$file."' target='_blank' > $file </a></li>";
            }
        }
    }
    echo "</ul>";
    echo "</li>";

   //closing the directory
    closedir($dir_handle);
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Sent for Missing Info for Candidate</title>

<head>
	<title>List based Folder tree</title>
	<link rel="stylesheet" href="folder-tree-static/css/folder-tree-static.css" type="text/css">
	<link rel="stylesheet" href="folder-tree-static/css/context-menu.css" type="text/css">
	<script type="text/javascript" src="folder-tree-static/js/ajax.js"></script>
	<script type="text/javascript" src="folder-tree-static/js/folder-tree-static.js"></script>
	<script type="text/javascript" src="folder-tree-static/js/context-menu.js"></script>
</head>

<body>

<ul id="dhtmlgoodies_tree" class="dhtmlgoodies_tree">
		
	</ul>
    <div style="font-family:arial;font-size:14px;font-weight:bold; width:700px;">
    <?php 

	$projectname = stripslashes($projectname); 
	echo $projectname."<br />";
?></div>
 <ul id="dhtmlgoodies_tree2" class="dhtmlgoodies_tree">

<?php 
 
//ListFolder("../proposals/".$_GET['dir'],$inc_count); 
ListFolder("../emailcenter/".$_GET['dir'],$inc_count); 


?>
</ul>
<!--<a href="#" onclick="expandAll('dhtmlgoodies_tree2');return false">Expand all</a>
<a href="#" onclick="collapseAll('dhtmlgoodies_tree2');return false">Collapse all</a>-->


</body>
</html>