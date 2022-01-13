<?
$sCurPage = substr($_SERVER['PHP_SELF'], (strrpos($_SERVER['PHP_SELF'], "/") + 1));
$pages = array('submit-cv.php','firminfo.php','mop.php','education.php','language.php','othertrainings.php','achivements.php','experience.php');
?>
<div id="logo"><a href="index.php"  title="CV Bank" >
<img src="images/cv-bank.jpg" title="CV Bank" alt="CV Bank" width="950" height="85"  /></a>
    <!-- <img src="images/logo.gif" width="240" height="81" alt="SMEC" title="SMEC" align="left" class="smec" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <img src="images/egc.jpg" width="70" height="69" alt="EGC" title="EGC" class="egc" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div style="color:#E9E9E9; font-size:48px; float:right; font-weight:bold; width:300px; margin-top:15px" >CV Bank</div>--> 
   </div>
   <div id="topmenu">
    <ul id="menu">
		<li><a href="index.php" <? if($sCurPage=='index.php') echo 'class="current"' ; ?> >Home</a></li>
		<?php
        if ($cvadmflag==0) {
        ?>
                <li><a href="#" class="current">Submit CV</a></li>
        <?php
        } else
        {
        ?>
                <li><a href="submit-cv.php" <? if(in_array($sCurPage,$pages)) echo 'class="current"' ; ?> >Submit CV</a></li>
        <?php
        }
        ?>
		<li><a href="search.php" <? if($sCurPage=='search.php') echo 'class="current"' ; ?>>Search CVs</a></li>
		<li><a href="cvlist.php?v=latest" <? if($sCurPage=='cvlist.php') echo 'class="current"' ; ?>>View Latest CVs</a></li>
	</ul>
    </div>
	<?
	if($sCurPage!='search.php' && $sCurPage!='cvlist.php' && $sCurPage!='index.php')
	{
	?>
	<ul id="cv-menu">
	  <li><a href="submit-cv.php?id=<?=$cvID?>" <? if($sCurPage=='submit-cv.php') echo 'class="sel"' ; ?> >Basic Information</a></li><li>|</li>
	  <li><a href="firminfo.php?id=<?=$cvID?>" <? if($sCurPage=='firminfo.php') echo 'class="sel"' ; ?> >Company Information</a></li><li>|</li>
	  <li><a href="mop.php?id=<?=$cvID?>" <? if($sCurPage=='mop.php') echo 'class="sel"' ; ?> >Membership</a></li><li>|</li>
	  <li><a href="education.php?id=<?=$cvID?>" <? if($sCurPage=='education.php') echo 'class="sel"' ; ?> >Education</a></li><li>|</li>
	  <li><a href="language.php?id=<?=$cvID?>" <? if($sCurPage=='language.php') echo 'class="sel"' ; ?> >Languages</a></li><li>|</li>
	  <li><a href="othertrainings.php?id=<?=$cvID?>" <? if($sCurPage=='othertrainings.php') echo 'class="sel"' ; ?> >Other Trainings</a></li><li>|</li>
	  <li><a href="achievements.php?id=<?=$cvID?>" <? if($sCurPage=='achivements.php') echo 'class="sel"' ; ?> >Achivements/Publications</a></li><li>|</li>
	  <li><a href="experience.php?id=<?=$cvID?>" <? if($sCurPage=='experience.php') echo 'class="sel"' ; ?> >Experience</a></li>
    </ul>
	<?
	}
	?>