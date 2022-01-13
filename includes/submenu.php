<?
/* $sCurPage = substr($_SERVER['PHP_SELF'], (strrpos($_SERVER['PHP_SELF'], "/") + 1));
$pages = array('submitform.php','firminfo.php','mop.php','education.php','language.php','othertrainings.php','latest-cvs.php','achievements.php', 'experience.php','dta.php','uploadcv.php'); */
?> 
 <!-- <ul class="nav nav-tabs" id="myTab" role="tablist"> -->

 <? include "includes/submenuclick.php"; ?>

	<ul class="nav nav-pills" id="myTab" role="tablist">

  <li class="nav-item">
      <a class="nav-link <?=$sub ?>" id="personal-tab" data-toggle="tab" href="submitform.php?id=<?php echo $cvID; ?>"  role="tab" aria-controls="home" aria-selected="false">Personal</a> </li>
  <li class="nav-item"> 
      <a class="nav-link <?=$fir ?>"  id="firminfo-tab" data-toggle="tab" href="firminfo.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="firminfo" aria-selected="false">Firm Info</a> </li>
  <li class="nav-item"> 
      <a class="nav-link <?=$mop ?>" id="mop-tab" data-toggle="tab" href="mop.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="membership" aria-selected="false">Membership</a> </li>
  <li class="nav-item"> 
      <a class="nav-link <?=$edu ?>" id="education-tab" data-toggle="tab" href="education.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="education" aria-selected="false">Education</a> </li>
  <li class="nav-item"> 
      <a class="nav-link <?=$lan ?>" id="language-tab" data-toggle="tab" href="language.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="language" aria-selected="true">Languages</a> </li>
  <li class="nav-item"> 
      <a class="nav-link <?=$oth ?>" id="othertrainings-tab" data-toggle="tab" href="othertrainings.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="othertrainings" aria-selected="false">Training</a> </li>
  <li class="nav-item"> 
      <a class="nav-link <?=$ach ?>" id="achievements-tab" data-toggle="tab" href="achievements.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="achievements" aria-selected="false">Achieve./Publi.</a> </li>
  <li class="nav-item"> 
      <a class="nav-link <?=$exp ?>" id="experience-tab" data-toggle="tab" href="experience.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="experience" aria-selected="false">Experience</a> </li>
  <li class="nav-item"> 
      <a class="nav-link <?=$upl ?>" id="uploadcv-tab" data-toggle="tab" href="uploadcv.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="uploadcv" aria-selected="false">Upload Docs.</a> </li>

<?php $sqlc="select category_cd from rs_tbl_category where cid='$cvId' and parent_cd=0";
$sqlrwc=mysql_query($sqlc);
 
if(mysql_num_rows($sqlrwc)>=1)
{
$sqlrw1c=mysql_fetch_array($sqlrwc);
?>
		
<li class="nav-item">
<a class="nav-link <?=$doc ?>" id="uploadcv-tab" data-toggle="tab" href="documents.php&cid=<?php echo $cvID; ?>&category_cd=<?php echo $sqlrw1c['category_cd'];?>" role="tab" aria-controls="uploadcv" aria-selected="false">Documents</a> </li>
<?php
}
?>

  <li class="nav-item"> 
      <a class="nav-link <?=$nom ?>" id="nomination-tab" data-toggle="tab" href="nomination_form.php?id=<?php echo $cvID; ?>" role="tab" aria-controls="uploadcv" aria-selected="false">Proposal Nomination</a> </li>

<?php 
  $ssSQL1 = "SELECT * FROM tblskillemployee_detail where cvid='$cvId' ";
	
$sqlrwcc=mysql_query($ssSQL1);
if(mysql_num_rows($sqlrwcc)>=1)
{
?>
<li class="nav-item"> 
      <a class="nav-link" id="skillmatrix-tab" data-toggle="tab" href="skillmatrix.php" role="tab" aria-controls="uploadcv" aria-selected="false">Skill Matrix</a> </li>
	  
<?php } ?>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="personal-tab">...</div>
  <div class="tab-pane fade" id="firminfo" role="tabpanel" aria-labelledby="firminfo-tab">...</div>
  <div class="tab-pane fade" id="achievements" role="tabpanel" aria-labelledby="achievements-tab">...</div>
</div>


<!--
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item"> 
      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="submitform.php" role="tab" aria-controls="overview" aria-selected="true">Basic Info</a> </li>
  <li class="nav-item"> 
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="firminfo.php" role="tab" aria-selected="false">Company Info</a> </li>
  <li class="nav-item"> 
      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Jobs</a> </li>
  <li class="nav-item"> 
      <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a> </li>
</ul>
 

 <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link  active" href="submitform.php">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="firminfo.php"> firminfo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
-->
 
