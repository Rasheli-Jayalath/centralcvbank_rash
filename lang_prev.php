<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$strusername = $_SESSION['uname'];
$cvflag 		= $_SESSION['cv'];
$cvadmflag 		= $_SESSION['cvadm'];
$cventryflag 	= $_SESSION['cventry'];
$strusername 	= $_SESSION['uname'];
$superadminflag = $_SESSION['superadmin'];


$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
$updatedon = $date->format('Y-m-d H:i:s');



//echo $cvflag;
//echo $cvadmflag;
//echo $cventryflag;
//echo $strusername ;

if ($strusername==null )
	{
		header("Location: ../index.php?init=3");
	}
else if ($cvadmflag==0  and $cventryflag==0)
	{
		header("Location: ../index.php?init=3");
	//echo "adm".$cvadmflag;
	//echo "entry".$cventryflag;
	}

else if ($cventryflag==0)
	{
		header("Location: ../index.php?init=3");
//	echo "entry".$cventryflag;

	}
	
?>
<?php
@require_once("requires/session.php");

	$objDb  = new Database( );
	$objDb2 = new Database( );

   
	$cvID = $_REQUEST['id'];
	
	$edit = $_REQUEST['edit'];
if($cvID=="")
{
header('Location: submit-cv.php');
}	

$update  = $_REQUEST['update'];
$save    = $_REQUEST['save'];
$next    = $_REQUEST['next'];
$clear   = $_REQUEST['clear'];



$txtlanguage 	= $_REQUEST['txtlanguage'];
$txtspeak 		= $_REQUEST['txtspeak'];
$txtread 		= $_REQUEST['txtread'];
$txtwrite 		= $_REQUEST['txtwrite'];
	

if($clear !="")
{
$edit 			= "";
$txtlanguage 	= "";
$txtspeak 		= "";
$txtread 		= "";
$txtwrite 		= "";
}

if($next !=""){
  header ('Location: othertrainings.php?id='.$cvID);
}

if($save !="" ){

  			$iSql = "Insert into tbllanguages SET 
            cvId        = '$cvID',
			lname 		= '$txtlanguage',
			lspeaking	= '$txtspeak',
			lreading	= '$txtread',
			lwritten     = '$txtwrite'  ";
  $objDb2->execute($iSql);

	$tuSql = "update tblcvmain SET datetime = now(),   ep_name = '$strusername' where cvId = '$cvID'";
	$objDb2->execute($tuSql);
		$edit 			= "";
		$txtlanguage 	= "";
		$txtspeak 		= "";
		$txtread 		= "";
		$txtwrite 		= "";
}

if($update !="" ){
  $uSql = "Update tbllanguages SET 
			cvId        = '$cvID',
			lname 		= '$txtlanguage',
			lspeaking	= '$txtspeak',
			lreading	= '$txtread',
			lwritten     = '$txtwrite' 	where lId = '$edit'  ";
  $objDb2->execute($uSql);
$tuSql = "update tblcvmain SET lastupdate = now(),  updated_on = '$updatedon', ep_name = '$strusername' where cvId = '$cvID'";	

$objDb2->execute($tuSql);
		$edit 			= "";
		$txtlanguage 	= "";
		$txtspeak 		= "";
		$txtread 		= "";
		$txtwrite 		= "";
}

if($edit !=""){
 $eSql = "Select * from tbllanguages where lId='$edit'";
  $objDb2 ->query($eSql);

		$dlname  		= $objDb2->getField(0, lname);
		$dlspeaking  	= $objDb2->getField(0, lspeaking);
		$dlreading  	= $objDb2->getField(0, lreading);
		$dlwritten  	= $objDb2->getField(0, lwritten);

}
if($cvID!="")
{
	$sSQL_edit = " Select * FROM tblcvmain WHERE cvId='$cvID'";
	$objDb->query($sSQL_edit);
	
	$cvId					=	$objDb->getField(0, cvId);
	$name					=	$objDb->getField(0, name);
	$datetime				=	$objDb->getField(0, datetime);
	$lastupdate				=	$objDb->getField(0, lastupdate);
	$dbpicture				=	$objDb->getField(0, picture);
	
	$lastupdate				=	$objDb->getField(0, lastupdate);
 	$updated_on				=	$objDb->getField(0, updated_on);
 
   	$pic    ="images/pics/".$dbpicture;
  	$sign	="images/signature/".$dbsignature;
  	$ocv	="images/originalcv/".$dboriginalcv;

//	$picture 	="images/pics/".$dbpicture;
//	$signature	="images/signature/".$dbsignature;
//	$originalcv	="images/originalcv/".$dboriginalcv;

 
//	$ocv=$dboriginalcv;}
	//echo $ocv."k here";
}
if($cvID=="")
{
}
else
{
$cvId=$cvID;
}	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('includes/metatag.php'); ?>
</head>
<body>
<div id="wrap">
   <?php
     include 'includes/header.php';
   ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
   
<div id="content">
     <form name="frmlang"  method="post" style=" border-top:1px solid #fdcb10; margin-top:20px">
		 <table  width="90%"  align="center"  cellpadding="1" cellspacing="1" >
        <tr>
        <td height="24" colspan="6" bgcolor="#CCCC66" class="mouseoversmall" >
 	    <? echo $cvId;?> - <?php if($name!="") echo $name ; else echo $txtname; ?>
         
           		<?php 
		$piclen = strlen($pic);
	 
		if ($piclen > 12) {
		?>
        <img  src="<? echo $pic?>"   width="40" height="40"/> 
        <?php 
		} 
		elseif ($pic=="" or $piclen <= '12') {
		?>
        <img src="images/noimage/no-profile-img.gif" width="30" height="30" alt="profile " />
 		<?php 
		}
		?>          
        </td>  
                </tr>
					 <tr>
					   <td height="36" colspan="5" ><h1>Language Proficiency:</h1></td>
					</tr>
					<tr>
					<td width="11%">&nbsp;</td>
					<td><span class="mend">*</span>Language:</td>
					<td>Speaking:</td>
					<td>Reading:</td>
					<td>Writting:</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td width="23%" height="28" >
						
							<select name="txtlanguage" style="width:180px;" >
							<option value="" selected="selected">Select Language</option>
							<option value="Assamese"<? if($dlname =="Assamese") echo 'selected="selected"' ; ?> >Assamese</option>
							<option value="English"<? if($dlname =="English") echo 'selected="selected"' ; ?> >English</option>
							<option value="Hindi"<? if($dlname =="Hindi") echo 'selected="selected"' ; ?> >Hindi</option>
							<option value="Kashmiri"<? if($dlname =="Kashmiri") echo 'selected="selected"' ; ?> >Kashmiri</option>
							<option value="Malayalam"<? if($dlname =="Malayalam") echo 'selected="selected"' ; ?> >Malayalam</option>
							<option value="Nepali"<? if($dlname =="Nepali") echo 'selected="selected"' ; ?> >Nepali</option>
							<option value="Punjabi"<? if($dlname =="Punjabi") echo 'selected="selected"' ; ?> >Punjabi</option>
							<option value="Tamil"<? if($dlname =="Tamil") echo 'selected="selected"' ; ?> >Tamil</option>
							<option value="Bengali"<? if($dlname =="Bengali") echo 'selected="selected"' ; ?> >Bengali</option>
							<option value="Gujarati"<? if($dlname =="Gujarati") echo 'selected="selected"' ; ?> >Gujarati</option>
							<option value="Kannada"<? if($dlname =="Kannada") echo 'selected="selected"' ; ?> >Kannada</option>
							<option value="Konkani"<? if($dlname =="Konkani") echo 'selected="selected"' ; ?> >Konkani</option>
							<option value="Marathi"<? if($dlname =="Marathi") echo 'selected="selected"' ; ?> >Marathi</option>
							<option value="Oriya"<? if($dlname =="Oriya") echo 'selected="selected"' ; ?> >Oriya</option>
							<option value="Sindhi"<? if($dlname =="Sindhi") echo 'selected="selected"' ; ?> >Sindhi</option>
							<option value="Telugu"<? if($dlname =="Telugu") echo 'selected="selected"' ; ?> >Telugu</option>
							<option value="Urdu" <? if($dlname =="Urdu") echo 'selected="selected"' ; ?> >Urdu</option>
							<option value="Arabic"<? if($dlname =="Arabic") echo 'selected="selected"' ; ?> >Arabic</option>
							<option value="Balochi"<? if($dlname =="Balochi") echo 'selected="selected"' ; ?> >Balochi</option>
							<option value="Pashto"<? if($dlname =="Pashto") echo 'selected="selected"' ; ?> >Pashto</option>
							<option value="French"<? if($dlname =="French ") echo 'selected="selected"' ; ?> >French </option>
							<option value="German"<? if($dlname =="German ") echo 'selected="selected"' ; ?> >German </option>
                            <option value="Dutch"<? if($dlname =="Dutch") echo  'selected=selected"' ; ?>  >Dutch</option>
                            <option value="" >----------------------</option>                            

							<option value="Afrikanns"<? if($dlname =="Afrikanns") echo  'selected=selected"' ; ?>  >Afrikanns</option>
                            <option value="Afrikanns"<? if($dlname =="Afrikanns") echo  'selected=selected"' ; ?>  >Afrikanns</option>
                            <option value="Albanian"<? if($dlname =="Albanian") echo  'selected=selected"' ; ?>  >Albanian</option>
                            <option value="Arabic"<? if($dlname =="Arabic") echo  'selected=selected"' ; ?>  >Arabic</option>
                            <option value="Armenian"<? if($dlname =="Armenian") echo  'selected=selected"' ; ?>  >Armenian</option>
                            <option value="Basque"<? if($dlname =="Basque") echo  'selected=selected"' ; ?>  >Basque</option>
                            <option value="Bulgarian"<? if($dlname =="Bulgarian") echo  'selected=selected"' ; ?>  >Bulgarian</option>
                            <option value="Catalan"<? if($dlname =="Catalan") echo  'selected=selected"' ; ?>  >Catalan</option>
                            <option value="Cambodian"<? if($dlname =="Cambodian") echo  'selected=selected"' ; ?>  >Cambodian</option>
                            <option value="Chinese (Mandarin)"<? if($dlname =="Chinese (Mandarin)") echo  'selected=selected"' ; ?>  >Chinese (Mandarin)</option>
                            <option value="Croation"<? if($dlname =="Croation") echo  'selected=selected"' ; ?>  >Croation</option>
                            <option value="Czech"<? if($dlname =="Czech") echo  'selected=selected"' ; ?>  >Czech</option>
                            <option value="Danish"<? if($dlname =="Danish") echo  'selected=selected"' ; ?>  >Danish</option>
                            <option value="Estonian"<? if($dlname =="Estonian") echo  'selected=selected"' ; ?>  >Estonian</option>
                            <option value="Fiji"<? if($dlname =="Fiji") echo  'selected=selected"' ; ?>  >Fiji</option>
                            <option value="Finnish"<? if($dlname =="Finnish") echo  'selected=selected"' ; ?>  >Finnish</option>
                            <option value="French"<? if($dlname =="French") echo  'selected=selected"' ; ?>  >French</option>
                            <option value="Georgian"<? if($dlname =="Georgian") echo  'selected=selected"' ; ?>  >Georgian</option>
                            <option value="German"<? if($dlname =="German") echo  'selected=selected"' ; ?>  >German</option>
                            <option value="Greek"<? if($dlname =="Greek") echo  'selected=selected"' ; ?>  >Greek</option>
                            <option value="Hebrew"<? if($dlname =="Hebrew") echo  'selected=selected"' ; ?>  >Hebrew</option>
                            <option value="Hungarian"<? if($dlname =="Hungarian") echo  'selected=selected"' ; ?>  >Hungarian</option>
                            <option value="Icelandic"<? if($dlname =="Icelandic") echo  'selected=selected"' ; ?>  >Icelandic</option>
                            <option value="Indonesian"<? if($dlname =="Indonesian") echo  'selected=selected"' ; ?>  >Indonesian</option>
                            <option value="Irish"<? if($dlname =="Irish") echo  'selected=selected"' ; ?>  >Irish</option>
                            <option value="Italian"<? if($dlname =="Italian") echo  'selected=selected"' ; ?>  >Italian</option>
                            <option value="Japanese"<? if($dlname =="Japanese") echo  'selected=selected"' ; ?>  >Japanese</option>
                            <option value="Javanese"<? if($dlname =="Javanese") echo  'selected=selected"' ; ?>  >Javanese</option>
                            <option value="Korean"<? if($dlname =="Korean") echo  'selected=selected"' ; ?>  >Korean</option>
                            <option value="Latin"<? if($dlname =="Latin") echo  'selected=selected"' ; ?>  >Latin</option>
                            <option value="Latvian"<? if($dlname =="Latvian") echo  'selected=selected"' ; ?>  >Latvian</option>
                            <option value="Lithuanian"<? if($dlname =="Lithuanian") echo  'selected=selected"' ; ?>  >Lithuanian</option>
                            <option value="Macedonian"<? if($dlname =="Macedonian") echo  'selected=selected"' ; ?>  >Macedonian</option>
                            <option value="Malay"<? if($dlname =="Malay") echo  'selected=selected"' ; ?>  >Malay</option>
                            <option value="Maltese"<? if($dlname =="Maltese") echo  'selected=selected"' ; ?>  >Maltese</option>
                            <option value="Maori"<? if($dlname =="Maori") echo  'selected=selected"' ; ?>  >Maori</option>
                            <option value="Mongolian"<? if($dlname =="Mongolian") echo  'selected=selected"' ; ?>  >Mongolian</option>
                            <option value="Norwegian"<? if($dlname =="Norwegian") echo  'selected=selected"' ; ?>  >Norwegian</option>
                            <option value="Persian"<? if($dlname =="Persian") echo  'selected=selected"' ; ?>  >Persian</option>
                            <option value="Polish"<? if($dlname =="Polish") echo  'selected=selected"' ; ?>  >Polish</option>
                            <option value="Portuguese"<? if($dlname =="Portuguese") echo  'selected=selected"' ; ?>  >Portuguese</option>
                            <option value="Quechua"<? if($dlname =="Quechua") echo  'selected=selected"' ; ?>  >Quechua</option>
                            <option value="Romanian"<? if($dlname =="Romanian") echo  'selected=selected"' ; ?>  >Romanian</option>
                            <option value="Russian"<? if($dlname =="Russian") echo  'selected=selected"' ; ?>  >Russian</option>
                            <option value="Samoan"<? if($dlname =="Samoan") echo  'selected=selected"' ; ?>  >Samoan</option>
                            <option value="Serbian"<? if($dlname =="Serbian") echo  'selected=selected"' ; ?>  >Serbian</option>
                            <option value="Slovak"<? if($dlname =="Slovak") echo  'selected=selected"' ; ?>  >Slovak</option>
                            <option value="Slovenian"<? if($dlname =="Slovenian") echo  'selected=selected"' ; ?>  >Slovenian</option>
                            <option value="Spanish"<? if($dlname =="Spanish") echo  'selected=selected"' ; ?>  >Spanish</option>
                            <option value="Swahili"<? if($dlname =="Swahili") echo  'selected=selected"' ; ?>  >Swahili</option>
                            <option value="Swedish "<? if($dlname =="Swedish ") echo  'selected=selected"' ; ?>  >Swedish </option>
                            <option value="Tamil"<? if($dlname =="Tamil") echo  'selected=selected"' ; ?>  >Tamil</option>
                            <option value="Tatar"<? if($dlname =="Tatar") echo  'selected=selected"' ; ?>  >Tatar</option>
                            <option value="Telugu"<? if($dlname =="Telugu") echo  'selected=selected"' ; ?>  >Telugu</option>
                            <option value="Thai"<? if($dlname =="Thai") echo  'selected=selected"' ; ?>  >Thai</option>
                            <option value="Tibetan"<? if($dlname =="Tibetan") echo  'selected=selected"' ; ?>  >Tibetan</option>
                            <option value="Tonga"<? if($dlname =="Tonga") echo  'selected=selected"' ; ?>  >Tonga</option>
                            <option value="Turkish"<? if($dlname =="Turkish") echo  'selected=selected"' ; ?>  >Turkish</option>
                            <option value="Ukranian"<? if($dlname =="Ukranian") echo  'selected=selected"' ; ?>  >Ukranian</option>

                            <option value="Uzbek"<? if($dlname =="Uzbek") echo  'selected=selected"' ; ?>  >Uzbek</option>
                            <option value="Vietnamese"<? if($dlname =="Vietnamese") echo  'selected=selected"' ; ?>  >Vietnamese</option>
                            <option value="Welsh"<? if($dlname =="Welsh") echo  'selected=selected"' ; ?>  >Welsh</option>
                            <option value="Xhosa"<? if($dlname =="Xhosa") echo  'selected=selected"' ; ?>  >Xhosa</option>

                            <option value=""   >----------------------</option>                            
                            <option value="Balochi"<? if($dlname =="Balochi") echo 'selected="selected"' ; ?> >Balochi</option>
                            <option value="Indonesian"<? if($dlname =="Indonesian ") echo 'selected="selected"' ; ?> >Indonesian </option>
							<option value="Punjabi"<? if($dlname =="Punjabi") echo 'selected="selected"' ; ?> >Punjabi</option>
							<option value="Persian"<? if($dlname =="Persian") echo 'selected="selected"' ; ?> >Persian</option>
							<option value="Pashto"<? if($dlname =="Pashto") echo 'selected="selected"' ; ?> >Pashto</option>
							<option value="Portuguese"<? if($dlname =="Portuguese  ") echo 'selected="selected"' ; ?> >Portuguese</option>
							<option value="Russian"<? if($dlname =="Russian ") echo 'selected="selected"' ; ?> >Russian </option>
							<option value="Sindhi"<? if($dlname =="Sindhi") echo 'selected="selected"' ; ?> >Sindhi</option>
							<option value="Swahili"<? if($dlname =="Swahili ") echo 'selected="selected"' ; ?> >Swahili </option>

					  </select>					  </td>
						<td width="12%" >
						
							<select name="txtspeak" style="width:90px;" >
							<option value="Excellent" <? if($dlspeaking =="Excellent") echo  'selected="selected"' ; ?>>Excellent</option>
							<option value="Good" <? if($dlspeaking =="Good") echo  'selected="selected"' ; ?>>Good</option>
							<option value="Fair" <? if($dlspeaking =="Fair") echo  'selected="selected"' ; ?>>Fair</option>
							<option value="Normal" <? if($dlspeaking =="Normal") echo  'selected="selected"' ; ?>>Normal</option>
					  </select>					  </td>
						<td width="12%" >
							<select name="txtread" style="width:90px;" >
							<option value="Excellent" <? if($dlreading =="Excellent") echo  'selected="selected"' ; ?>>Excellent</option>
							<option value="Good" <? if($dlreading =="Good") echo  'selected="selected"' ; ?>>Good</option>
							<option value="Fair" <? if($dlreading =="Fair") echo  'selected="selected"' ; ?>>Fair</option>
							<option value="Normal" <? if($dlreading =="Normal") echo  'selected="selected"' ; ?>>Normal</option>
					  </select>					  </td>
						<td width="42%" ><select name="txtwrite" style="width:90px;" >
							<option value="Excellent" <? if($dlwritten =="Excellent") echo  'selected="selected"' ; ?>>Excellent</option>
							<option value="Good" <? if($dlwritten =="Good") echo  'selected="selected"' ; ?>>Good</option>
							<option value="Fair" <? if($dlwritten =="Fair") echo  'selected="selected"' ; ?>>Fair</option>
							<option value="Normal" <? if($dlwritten =="Normal") echo  'selected="selected"' ; ?>>Normal</option>
					  </select>					  </td>
					</tr>
					<tr>
					<td></td></tr>
					<tr>
						<td height="46" colspan="5" align="center"><?php
						   if($edit!=""){
						 ?>
						  <input type="submit" onclick="return language()" value="Update" name="update"  />
						 <?php
						   }else{
						 ?>
						  <input type="submit" onclick="return language()" value="Save" name="save"  />
						 <?    
						   }
						 ?>
					  &nbsp;&nbsp;<input type="submit" value="Next" name="next" /> &nbsp;&nbsp;<input type="submit" value="Clear" name="clear"  /></td>
						
					</tr>
				</table>
  </form>
	    
	   <table width="84%"  align="center" cellpadding="1" cellspacing="1" border="1"  >
		   <tr style="font-weight:bold; color:#0E0989; background:#F0F0F0">
				   <td width="31%"   style="border: 1px solid #0E0989" > Language Name</td>
				   <td width="19%"   style="border: 1px solid #0E0989" > Speaking</td>
				   <td width="17%"  style="border: 1px solid #0E0989" > Reading</td>
				   <td width="21%"   style="border: 1px solid #0E0989" >Written</td>
				   <td width="16%"  style="border: 1px solid #0E0989" align="center"> Edit</td>
                   <td width="16%"   style="border: 1px solid #0E0989" align="center"> Delete</td>                    

	     </tr>	
				   <?
				$sSQL = " select * from tbllanguages where cvId='$cvID'";
				$objDb->query($sSQL);
				$iCount = $objDb->getCount( );
				if($iCount>0)
				{
					for ($i = 0 ; $i < $iCount; $i ++)
					{
					$lname  	= $objDb->getField($i, lname);
					$lspeaking  = $objDb->getField($i, lspeaking);
					$lreading  	= $objDb->getField($i, lreading);
					$lwritten  	= $objDb->getField($i, lwritten);
					$lId  		= $objDb->getField($i, lId);
					
					?>
				   <tr>
					<td height="34" style="border-bottom:1px solid #cccccc" >&nbsp;<?=$lname?></td>
					<td style="border-bottom:1px solid #cccccc"  >&nbsp;<?=$lspeaking?></td>
					<td style="border-bottom:1px solid #cccccc"  >&nbsp;<?=$lreading?></td>
					<td style="border-bottom:1px solid #cccccc"  >&nbsp;<?=$lwritten?></td>
					<td style="border-bottom:1px solid #cccccc" align="center" >&nbsp; <a href="language.php?id=<?=$cvID?>&edit=<?=$lId?>"><img src="images/edit.png" width="22" height="22" /></a></td>
          		   <td style="border-bottom:1px solid #cccccc" width="6%" align="center">&nbsp; <a href="delete-lang.php?id=<?=$cvID?>&delete=<?=$lId?>" onClick="javascript: confirm('Do you really want to delete this record?');" title="Delete Language record"><img src="images/delete22.png" alt="Delete" width="20" height="20"  /></a>

                    
                    
                    
	     </tr>
				   <?
					}
				}
				?>
		   </table><br clear="all" />
   </div>
   <? include ("includes/footer.php"); ?>
</div>
</body>
</html>
