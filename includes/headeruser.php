<?php
error_reporting(E_ALL & ~E_NOTICE);

/*session_start();
echo $strusername = $_SESSION['uname'];

$pdslibflag = $_SESSION['pdslibrary'];

if ($pdslibflag==3){
  	$pdsflag=3;
	}
else
{
$pdsflag = $_SESSION['pdslibrary'];	
}

if ($strusername==null){
	$strusername=="Guest";
//	header("Location: ../index.php?init=3"); 
}

//$uid = $_SESSION['uid'];
//$name = $_SESSION['uname'];

if ($pdsflag==0)
{
//	header("Location: ../index.php");
}
*/
?>

<?php include ('saveurl.php');  ?>

<?

//$sCurPage = substr($_SERVER['PHP_SELF'], (strrpos($_SERVER['PHP_SELF'], "/") + 1));
//$pages = array('pdslist-4.php?v=cur');

//$pdsflag = $_SESSION['pds'];
 
?>

<div id="logo"><a href="index.php"  title="DB Profile  - SACA Division" >

<img src="images/bdprofileheader.png" title="DB Profile - SACA Division" alt="DB Profile  - SACA Division" width="100%" height="100%"  /></a> 

 
</div>
 <div id="topmenu">

    <ul id="menu">
<!-- 		<li><a href="index.php" <? if($sCurPage=='index.php') echo 'class="current"' ; ?> >Home</a></li> -->
		<li class="buttonview">
			<a href="bdprofile-in.php?v=fbd" <? if($sCurPage=='bdprofile-in.php?v=fbd') echo 'class="current"' ; ?> > Home </a></li>
	 
 	
    	<?php /*
        if ($pdsdocviewflag==1) {
        ?>
        
		<li><a href="submit-pds.php" <? if(in_array($sCurPage,$pages)) echo 'class="current"' ; ?> >Submit PDS</a></li>
       <?php  if ($pdsadmflag==1) { ?>
		<li><a href="submit-pds.php" <? if($sCurPage=='submit-pds.php.php') echo 'class="current"' ; ?> >Submit PDS</a></li>
        <?php }?>
	<!--	<li><a href="search.php" <? if($sCurPage=='search.php') echo 'class="current"' ; ?> >Search </a></li> -->
		
		<li><a href="searchadv.php" <? if($sCurPage=='searchadv.php') echo 'class="current"' ; ?> >Advanced Search</a></li>
 <!--	<li><a href="pdslist-in.php?v=inhand" <? if($sCurPage=='pdslist-in.php?v=inhand') echo 'class="current"' ; ?> >In-Hand</a></li>
-->
		<!-- <li><a href="pdslist.php?v=inhand" <? if($sCurPage=='pdslist.php?v=inhand') echo 'class="current"' ; ?> >In-Hand</a></li>
		<li><a href="pdslist.php?v=99allpds" <? if($sCurPage=='pdslist.php?v=99allpds') echo 'class="current"' ; ?> >View All</a></li>
		<!-- <li><a href="pdsgraph1.php" <? if($sCurPage=='pdsgraph1.php') echo 'class="current"' ; ?> >Progress Chart</a></li>-->

         <?php  if ($pdsadmflag==1) { ?>
 	<!--	<li><a href="upload_docs.php" <? if($sCurPage=='upload_docs.php') echo 'class="current"'  ; ?> >Upload</a></li>  -->
       <?php }?>
 		<!-- <li><a href="summary.php" <? if($sCurPage=='summary.php') echo 'class="current"'  ; ?> >Summary</a></li>  -->
        <?php
		}
		else {
        ?>
		<!-- <li><a href="search.php" <? if($sCurPage=='search.php') echo 'class="current"' ; ?> >Search </a></li> -->
		<li><a href="pdslist-in.php?v=inhand" <? if($sCurPage=='pdslist-in.php?v=inhand') echo 'class="current"' ; ?> >In-Hand</a></li>
		<!--<li><a href="pdsgraph1.php" <? if($sCurPage=='pdsgraph1.php') echo 'class="current"' ; ?> >Progress Chart</a></li> -->
   	
	
		<?php
		}*/
 	 ?>
       </ul>
</div>
    
	<?
	//if($sCurPage!='searchadv.php' && $sCurPage!='pdslistcv.php' && $sCurPage!='index.php')
	{
	?>
	
	<?
	}
	?>