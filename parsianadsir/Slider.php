<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
  <title>jquery sliders</title>
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  <script type="text/javascript">var _siteRoot='index.html',_root='index.html';</script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
 </head>
 <body>
     <?php
	require("class/connection.php");
	$connector=new connection();
	$query="SELECT * FROM banner WHERE bannerId='1'";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
	$image1=$row['image1'];
	$image2=$row['image2'];
	$image3=$row['image3'];
	$image4=$row['image4'];
	$image5=$row['image5'];
	$image6=$row['image6'];
	$image7=$row['image7'];
	$image8=$row['image8'];
	$image9=$row['image9'];
	$image10=$row['image10'];
?>

  <!--/top-->
  <div id="header"><div class="wrap">
   <div id="slide-holder">
<div id="slide-runner">
    <img id="slide-img-1" src="<?php echo $image1 ?>" class="slide" alt="" />
    <img id="slide-img-2" src="<?php echo $image2 ?>" class="slide" alt="" />
    <img id="slide-img-3" src="<?php echo $image3 ?>" class="slide" alt="" />
    <img id="slide-img-4" src="<?php echo $image4 ?>" class="slide" alt="" />
    <div id="slide-controls">
     <p id="slide-client" class="text"><span></span></p>
     <p id="slide-desc" class="text"></p>
     <p id="slide-nav"></p>
    </div>
</div>
	
	<!--content featured gallery here -->
   </div>
   <script type="text/javascript">
    if(!window.slider) var slider={};slider.data=[{"id":"slide-img-1","client":"","desc":""},{"id":"slide-img-2","client":"","desc":""},{"id":"slide-img-3","client":"","desc":""},{"id":"slide-img-4","client":"","desc":""}];
   </script>
  </div></div><!--/header-->
 </body>
</html>
