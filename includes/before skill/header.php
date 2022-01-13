<?php include ('includes/saveurl.php'); ?>

<link rel="stylesheet" type="text/css" href="css/style.css">
<style>

.img-circle {
    border-radius: 50%;
}

.img-circle25 {
    border-radius: 50%;
   padding:3px;
   border:3px solid #09F;
   background-color:#666;
}
</style>
<?
$sCurPage = substr($_SERVER['PHP_SELF'], (strrpos($_SERVER['PHP_SELF'], "/") + 1));
$pages = array('submit-cv.php','firminfo.php','mop.php','education.php','language.php','othertrainings.php','cvlist.php','achievements.php','experience.php','dta.php','uploadcv.php', 'statistics.php', 'cvdashboard.php');
?>
<div id="logo" align="right"><a href="index.php"  title="CV Bank" >
<img src="images/cv-bank.jpg" title="CV Bank" alt="CV Bank" width="950" height="85"  /></a>
<br />
<!-- <img src="images/logo.gif" width="240" height="81" alt="SMEC" title="SMEC" align="left" class="smec" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="images/egc.jpg" width="70" height="69" alt="EGC" title="EGC" class="egc" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div style="color:#E9E9E9; font-size:48px; float:right; font-weight:bold; width:300px; margin-top:15px" >CV Bank</div>--> 
<tr >
        <td valign="middle">  
        <? $userphoto =  $uid1= $_SESSION['uid']."-".$uname1= $_SESSION['uname'].".jpg"; ?>   
        <img class="img-circle25 "  src="../images/userpics/<? echo $userphoto; ?>"  width="50" height="45"/ align="right" />  
       <br />
 </td>
        <td > <font color=blue><strong><? echo $strname = $_SESSION['name']."&nbsp;&nbsp;"; ?></strong></font></td> 

</tr>
 </div>
<br />
 <div id="topmenu">
    <ul id="menu">
		<li><a href="index.php" <? if($sCurPage=='index.php') echo 'class="current"' ; ?> >Home</a></li>
		<?php
		if ($superadminflag==1) {
		?>
		<li><a href="submit-cv.php" <? if($sCurPage=='submit-cv.php') {echo 'class="current"' ;} ?> >Submit</a></li>
		<li><a href="search.php" <? if($sCurPage=='search.php') {echo 'class="current"' ;} ?>>Search</a></li>
   		<li><a href="searchadv.php" <? if($sCurPage=='searchadv.php') {echo 'class="current"' ;} ?>>Interactive Search</a></li>
		<li><a href="cvlist.php?v=latest" <? if($sCurPage=='cvlist.php?v=latest') {echo 'class="current"' ;} ?>>Latest CVs</a></li>
		<li><a href="cvlist.php?v=modif" <? if($sCurPage=='cvlist.php?v=modif') {echo 'class="current"' ;} ?>>Modified CVs</a></li>
		<li><a href="cvlist.php?v=99allcv" <? if($sCurPage=='cvlist.php?v=99allcv') {echo 'class="current"' ;} ?>>All CVs</a></li>
		<li><a href="cvdashboard.php" <? if($sCurPage=='cvdashboard.php') {echo 'class="current"' ;} ?>>Dashboard</a></li>
		
		
<!-- 	<li><a href="cvlist.php?v=foreign" <? if($sCurPage=='cvlist.php?v=foreign') {echo 'class="current"' ;} ?>>Foreigners</a></li>
       <li><a href="statistics.php" <? if($sCurPage=='statistics.php') echo 'class="sel"'; ?> >Statistics</a></li>
		<li><a href="cvlist.php?v=inemp" <? if($sCurPage=='cvlist.php?v=inemp') {echo 'class="current"' ;} ?>><font color="#990000">Employees</font></a></li>
		<li><a href="cvlist.php?v=verif" <? if($sCurPage=='cvlist.php?v=verif') {echo 'class="current"' ;} ?>><font color="#000000">Verified</font></a></li> -->
		<li><a href="images/blisted/List of Black Listed College.htm" target="_new" ><font color="#000000">B.Listed</font></a></li>
        
 		<? }
		else if ($cvflag==1 and ($cventryflag==1 or $cvadmflag==1)) {
        ?>
		<li><a href="submit-cv.php" <? if($sCurPage=='submit-cv.php') echo 'class="current"' ; ?> >Submit</a></li>
 		<li><a href="search.php" <? if($sCurPage=='search.php') echo 'class="current"' ; ?>>Search</a></li>
   		<li><a href="searchadv.php" <? if($sCurPage=='searchadv.php') echo 'class="current"' ; ?>>Interactive Search</a></li>
		<li><a href="cvlist.php?v=latest" <? if($sCurPage=='cvlist.php?v=latest') echo 'class="current"' ; ?>>Latest CVs</a></li>
		<li><a href="cvlist.php?v=modif" <? if($sCurPage=='cvlist.php?v=modif') echo 'class="current"' ; ?>>Modified CVs</a></li>        
		<li><a href="cvdashboard.php" <? if($sCurPage=='cvdashboard.php') {echo 'class="current"' ;} ?>>Dashboard</a></li>
		<!-- 		<li><a href="cvlist.php?v=foreign" 	<? if($sCurPage=='cvlist.php?v=foreign') {echo 'class="current"' ;} ?>>Foreigners</a></li>
       <li><a href="statistics.php" <? if($sCurPage=='statistics.php') echo 'class="sel"' ; ?> >Statistics</a></li>
		<li><a href="cvlist.php?v=inemp" <? if($sCurPage=='cvlist.php?v=inemp') {echo 'class="current"' ;} ?>><font color="#990000">Employees</font></a></li>        
		<li><a href="cvlist.php?v=verif" <? if($sCurPage=='cvlist.php?v=verif') {echo 'class="current"' ;} ?>><font color="#000000">Verified</font></a></li>-->
		<li><a href="images/blisted/List of Black Listed College.htm" target="_new" ><font color="#000000">B.Listed</font></a></li>   
		<?php }  
		else 
		{
		?>
  		<li><a href="search.php" <? if($sCurPage=='search.php') echo 'class="current"' ; ?>>Search</a></li>
   		<li><a href="searchadv.php" <? if($sCurPage=='searchadv.php') echo 'class="current"' ; ?>>Interactive Search</a></li>
		<li><a href="cvlist.php?v=latest" <? if($sCurPage=='cvlist.php?v=latest') echo 'class="current"' ; ?>>Latest CVs</a></li>
		<li><a href="cvlist.php?v=modif" <? if($sCurPage=='cvlist.php?v=modif') echo 'class="current"' ; ?>>Modified CVs</a></li>   

 <!--       <li><a href="statistics.php" <? if($sCurPage=='statistics.php') echo 'class="sel"' ; ?> >Statistics</a></li>
		<li><a href="cvlist.php?v=inemp" <? if($sCurPage=='cvlist.php?v=inemp') {echo 'class="current"' ;} ?>><font color="#990000">Employees</font></a></li>
		<li><a href="cvlist.php?v=verif" <? if($sCurPage=='cvlist.php?v=verif') {echo 'class="current"' ;} ?>><font color="#000000">Verified</font></a></li> -->
		<li><a href="images/blisted/List of Black Listed College.htm" target="_new" ><font color="#000000">B.Listed</font></a></li>   		</ul>
  		<? 
		} ?>

    </div>

	<?
	if($sCurPage!='search.php' && $sCurPage!='cvlist.php' && $sCurPage!='index.php' && $sCurPage!='searchadv.php' && $sCurPage!='statistics.php' && $sCurPage!='cvdashboard.php')
	{
	?>
	<ul id="cv-menu">
	  <li><a href="submit-cv.php?id=<?=$cvID?>" <? if($sCurPage=='submit-cv.php') echo 'class="sel"' ; ?> >Basic Info</a></li><li>|</li>
	  <li><a href="firminfo.php?id=<?=$cvID?>" <? if($sCurPage=='firminfo.php') echo 'class="sel"' ; ?> >Company Info</a></li><li>|</li>
	  <li><a href="mop.php?id=<?=$cvID?>" <? if($sCurPage=='mop.php') echo 'class="sel"' ; ?> >Membership</a></li><li>|</li>
	  <li><a href="education.php?id=<?=$cvID?>" <? if($sCurPage=='education.php') echo 'class="sel"' ; ?> >Education</a></li><li>|</li>
	  <li><a href="language.php?id=<?=$cvID?>" <? if($sCurPage=='language.php') echo 'class="sel"' ; ?> >Languages</a></li><li>|</li>
	  <li><a href="othertrainings.php?id=<?=$cvID?>" <? if($sCurPage=='othertrainings.php') echo 'class="sel"' ; ?> >Other Trg</a></li><li>|</li>
	  <li><a href="achievements.php?id=<?=$cvID?>" <? if($sCurPage=='achievements.php') echo 'class="sel"' ; ?> >Achiev./Publi.</a></li><li>|</li>
	  <li><a href="experience.php?id=<?=$cvID?>" <? if($sCurPage=='experience.php') echo 'class="sel"' ; ?> >Experience</a></li><li>|</li>
  	  <li><a href="dta.php?id=<?=$cvID?>" <? if($sCurPage=='dta.php') echo 'class="sel"' ; ?> >Detail Tasks</a></li><li>|</li>
	  <li><a href="uploadcv.php?id=<?=$cvID?>" <? if($sCurPage=='uploadcv.php') echo 'class="sel"' ; ?> >Upload</a></li>
     </ul>
	<?
	}
	?>