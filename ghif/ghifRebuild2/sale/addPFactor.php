<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addPFactor','h');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
if($_SESSION['ghifVersion']=='free') include('../general/premiumVersion.php');
?>