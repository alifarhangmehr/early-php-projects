<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<style type="text/css">
#panel .content {
	width: 960px;
	margin: 0 auto;
	padding-top: 15px;
	text-align: <?php echo $language_align; ?>;
	font-size: 0.85em;
}
</style>
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">

<p align="<?php echo $language_align; ?>">
<script language="javascript" type="text/javascript" src="js/ajax.js"></script>

<table border="0" align="center" width="50%" dir="<?php echo $language_direction; ?>" cellpadding="0" cellspacing="0" style="font-size:12px; color:#FFF">
  <tr>
    <td align="center" colspan="2"></td>
   </tr><tr>
    <td align="center"><a href="accountingIndex.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/accountingIcon.png" width="32" height="32" border="0" /></a></td>
    <td align="center"><a href="accountingIndex.php"><?php echo $word_for_accounting; ?></a></td>
   </tr><tr>
    <td align="center"><a href="../sale/index.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/shopIcon.png" width="32" height="32" border="0" /></a></td>
    <td align="center"><a href="accountingIndex.php"><?php echo $word_for_sale; ?></a></td>
   </tr><tr>
    <td align="center"><a href="storingIndex.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/wareHouseIcon.png" width="32" height="32" border="0" /></a></td>
    <td align="center"><a href="accountingIndex.php"><?php echo $word_for_storage; ?></a></td>
   </tr><tr>  
    <td align="center"><a href="ghifIndex.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/ghifAdministrator.png" width="32" height="32" border="0" /></a></td>
     <td align="center"><a href="accountingIndex.php"><?php echo $word_for_ghif_administrator; ?></a></td>
  </tr>
  <tr style="font-size:16px; color:#CC9900; font-weight:bold">
  <td colspan="2" align="center">
  	<table border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td colspan="3" style="color:#FFF; font-size:12px" align="center"><br /><?php echo $theme_select_title; ?><br /><br /></td>
      </tr>
      <tr>
        <td><a href="../themes/theme.php?theme=default"><img src="../themes/default/theme.png" width="36px" height="36px" style="border:hidden" title="<?php echo $theme_default; ?>" /></a></td>
        <td><a href="../themes/theme.php?theme=wood"><img src="../themes/wood/theme.png" width="36px" height="36px" style="border:hidden" title="<?php echo $theme_wood; ?>" /></a></td>
         <td><a href="../themes/theme.php?theme=khaste"><img src="../themes/khaste/theme.png" width="36px" height="36px" style="border:hidden" title="<?php echo $theme_khaste; ?>" /></a></td>
        <td><a href="../themes/theme.php?theme=yellow"><img src="../themes/yellow/theme.png" width="36px" height="36px" style="border:hidden" title="<?php echo $theme_yellow; ?>" /></a></td>
      </tr>
    </table>
  </td>
  </tr>
</table>
</p>
</div>
<div class="left">
<table border="0" cellspacing="0" cellpadding="0" align="center" width="100%" style="color:#FFCC33; border:thin solid #FFF; padding:5px; font-size:12px">
  <tr>
    <td align="<?php echo $language_align; ?>" bgcolor="#000000"><?php echo $slide_name; ?></td>
    <td align="<?php echo $language_align; ?>" bgcolor="#000000"><?php echo $_SESSION['adminName']; ?></td>
    <td align="<?php echo $language_align; ?>" rowspan="4" bgcolor="#333333" width="2px" style="padding:5px"><a href="<?php echo $_SESSION['photoSource']; ?> "><img src="<?php echo $_SESSION['photoThumb']; ?>"  style="border:hidden" /></a></td>
  </tr>
  <tr>
    <td align="<?php echo $language_align; ?>" bgcolor="#333333"><?php echo $slide_family; ?></td>
    <td align="<?php echo $language_align; ?>" bgcolor="#333333"><?php echo $_SESSION['adminFamily']; ?></td>
  </tr>
  <tr>
    <td align="<?php echo $language_align; ?>" bgcolor="#000000"><?php echo $slide_grade; ?></td>
    <td align="<?php echo $language_align; ?>" bgcolor="#000000"><?php echo $_SESSION['adminGrade']; ?></td>
  </tr>
  <tr>
    <td align="<?php echo $language_align; ?>" bgcolor="#000000"><?php echo $slide_entering_cash; ?></td>
    <td align="<?php echo $language_align; ?>" bgcolor="#000000">
    <?php
		$cashListId=$_SESSION['cashListId'];
		$connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 5';
		$query="SELECT cashName FROM cashlist WHERE cashListId='$cashListId'";
		$result=$connector->queryRun($query);
		if(!$result) echo 'Error No. 6';
		$row=mysql_fetch_array($result);
		echo $row['cashName'];
	?>
    </td>
  </tr>
</table>
<br />
<table border="0" cellpadding="2" cellspacing="2" width="100%" style="color:#FFF; font-size:12px">
  <tr>
    <td colspan="2" align="center"><?php echo $slide_select_language_title; ?><br /></td>
  </tr>
  <tr>
    <td align="center"><img src="../language/fa/fa.gif" width="50" height="30" alt="فارسی" title="فارسی" onclick="changeLanguage('../language/language.php?language=fa')" style="cursor:pointer" /></td>
    <td align="center"><img src="../language/en/en.gif" width="50" height="30" alt="English" title="English" onclick="changeLanguage('../language/language.php?language=en')" style="cursor:pointer" /></td>
  </tr>
</table>





<table align="center">
<tr>
	<td>
	<?php
	
	$c2f=new Convertnumber2farsi();
	
	echo '<table width="40px" height="60px" align="right" id="tinyNewsDateTable" align="center" border="1" cellspacing="0" cellpadding="1">
     <tr height="25px">
	 	<td colspan="2" align="center" style="background:#666; color:#FFF">'.pdate(m).'</td>
	 </tr>
	 <tr height="25px">
	 	<td colspan="2" align="center" style="background:#666; color:#FFF">';
	 	include('../class/liveTime.php');
	  echo '
	  </td>
	  </tr>	  <tr>
		<td align="center" style="color:#FFF">'.$c2f->Convertnumber2farsi(pdate(d)).'</td>
		<td align="center" style="color:#FFF">'.$c2f->Convertnumber2farsi(pdate(Y)).'</td>
      </tr>
	</table>';
	?>
    
    </td>
</tr>
</table>






</div>
<div class="left right"><?php echo $slide_about_ghif; ?>
<p align="left"><?php echo $ghif_verison; ?></p>
</div>
</div>
</div>	
	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li><?php echo $slide_welcome; ?><span style="color:#6C0;"> <?php echo $_SESSION['adminName'].' '.$_SESSION['adminFamily']; ?></span></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#"><?php echo $slide_come_down; ?></a>
				<a id="close" style="display: none;" class="close" href="#"><?php echo $slide_go_up; ?></a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> 
	
</div>
<div id="languageDiv" align="center">
<?php echo $change_language_loader_title; ?>
</div>
<div id="ajaxLoader"></div>
</div>
<?php include('chat.php'); ?>