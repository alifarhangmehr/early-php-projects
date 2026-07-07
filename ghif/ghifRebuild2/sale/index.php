<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('saleIndex','$');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<br /><br /><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" dir="<?php echo $language_direction; ?>">
  <tr>
    <td align="center"><a href="addCash.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/cashIcon4.png" width="128" height="128"><br /><?php echo $saleIndex_add_cash; ?></a></td>
    <td align="center"><a href="showFactor.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/documentIcon2.png" width="128" height="128"><br /><?php echo $saleIndex_show_factor; ?></a></td>
    <td align="center"><a href="addFactor.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/documentIcon1.png" width="128" height="128"><br /><?php echo $saleIndex_create_sale_factor; ?></a></td>
    <td align="center"><a href="addPFactor.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/documentIcon1.png" width="128" height="128"><br /><?php echo $saleIndex_create_purchase_factor; ?></a></td>
    <td align="center"><a href="addGood.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/shopIcon4.png" width="128" height="128"><br /><?php echo $saleIndex_add_good; ?></a></td>
    <td align="center"><a href="showGood.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/shopIcon5.png" width="128" height="128"><br /><?php echo $saleIndex_show_good; ?></a></td>
  </tr>
  <tr>
    <td align="center"><a href="showOutgo.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/cashIcon2.png" width="128" height="128"><br /><?php echo $saleIndex_show_outgo; ?></a></td>
    <td align="center"><a href="manageReports.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/chartIcon1.png" width="128" height="128"><br /><?php echo $saleIndex_chart; ?></a></td>
    <td align="center"><a href="showOa.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/userIcon2.png" width="128" height="128"><br /><?php echo $saleIndex_opponent_account; ?></a></td>
    <td align="center"><a href="showCustomer.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/userIcon1.png" width="128" height="128"><br /><?php echo $saleIndex_show_customer; ?></a></td>
    <td align="center"><a href="showAccount.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/cashIcon3.png" width="128" height="128"><br /><?php echo $saleIndex_roll_account; ?></td>
    <td align="center"><a href="ghifSettings.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/settingIcon1.png" width="128" height="128"><br /><?php echo $saleIndex_ghif_settings; ?></a></td>
  </tr>
  <tr>
    <td align="center"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/ghifIcon1.png" width="128" height="128"></td>
    <td align="center"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/ghifIcon1.png" width="128" height="128"></td>
    <td align="center"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/ghifIcon4.png" width="128" height="128"></td>
    <td align="center"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/ghifIcon1.png" width="128" height="128"></td>
    <td align="center"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/ghifIcon1.png" width="128" height="128"></td>
    <td align="center"><a href="../general/logout.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/exitIcon1.png" width="128" height="128"><br /><?php echo $saleIndex_sign_out; ?></a></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>

</body>
</html>
