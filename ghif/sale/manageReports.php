<?php
session_start();
error_reporting(0);
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('manageReports','P');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<br /><br /><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" dir="<?php echo $language_direction; ?>">
  <tr>
    <td align="center"><a href="reportSample.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/chartIcon1.png" width="128" height="128"><br /><?php echo $manageReports_other_reports; ?></a></td>
    <td align="center"><a href="reportSaleInYear.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/chartIcon1.png" width="128" height="128"><br /><?php echo $manageReports_report_sale_in_year; ?></a></td>
    <td align="center"><a href="reportSaleInWeek.php"><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/chartIcon1.png" width="128" height="128"><br /><?php echo $manageReports_report_sale_in_this_week; ?></a></td>
  </tr>
</table>
</body>
</html>