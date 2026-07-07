<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('ghifSettings','o');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<br /><br /><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" dir="<?php echo $language_direction; ?>">
  <tr>
  	<td align="center"><a href="showEmploye.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/userIcon1.png" width="128" height="128"><br /><?php echo $ghifSettings_show_employe; ?></a></td>
    <td align="center"><a href="showCashList.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/cashIcon1.png" width="128" height="128"><br /><?php echo $ghifSettings_show_cashList; ?></a></td>
    <td align="center"><a href="showStore.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/warehouseIcon1.png" width="128" height="128"><br /><?php echo $ghifSettings_show_store; ?></a></td>
    <td align="center"><a href="showfactorExtra.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/documentIcon1.png" width="128" height="128"><br /><?php echo $ghifSettings_show_factorExtra; ?></a></td>
    <td align="center"><a href="showBackup.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/backupIcon1.png" width="128" height="128"><br /><?php echo $ghifSettings_show_backup; ?></a></td>
  </tr>
  <tr>
  	<td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="update.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/updateIcon1.png" width="128" height="128"><br /><?php echo $ghifSettings_show_update; ?></a></td>
  </tr>
</table>
</body>
</html>