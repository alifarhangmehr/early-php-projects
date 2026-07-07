<?php
session_start();
include('class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->includeFile('themes/login.css');
$pageHeader->createPageHeader('index','');
include('language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<br /><br /><br /><br /><br /><br />
<table width="700px" border="0" align="center">
  <tr>
    <td align="center"><a href="accounting"><img src="themes/<?php echo $_SESSION['theme']; ?>/images/accountingIcon2.png" width="128" height="128" border="0" /></a></td>
    <td align="center"><a href="store/selectCash.php"><img src="themes/<?php echo $_SESSION['theme']; ?>/images/shopIcon2.png" width="128" height="128" border="0" /></a></td>
    <td align="center"><a href="storing"><img src="themes/<?php echo $_SESSION['theme']; ?>/images/wareHouseIcon2.png" width="128" height="128" border="0" /></a></td>
    <td align="center"><a href="controlPanel"><img src="themes/<?php echo $_SESSION['theme']; ?>/images/ghifAdministrator2.png" width="128" height="128" border="0" /></a></td>
  </tr>
  <tr style="font-size:16px; color:#CC9900; font-weight:bold">
    <td align="center"><?php echo $word_for_accounting; ?></td>
    <td align="center"><?php echo $word_for_sale; ?></td>
    <td align="center"><?php echo $word_for_storage; ?></td>
    <td align="center"><?php echo $word_for_ghif_administrator; ?></td>
  </tr>
</table>
</body>
</html>