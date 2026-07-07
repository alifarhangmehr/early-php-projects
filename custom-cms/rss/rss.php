<?php
include('../class/connect.php');
echo'<?xml version="1.0" encoding="utf-8" ?>
<?xml-stylesheet href="/css/rss20.xsl" type="text/xsl"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:pheedo="http://www.pheedo.com/namespace/pheedo">';
echo '<channel>';
echo '<title>سایت گروه آرمانی</title>';
echo '<link>http://www.idealg.com</link>';
echo '<description>مرکز تحقیقات گروه آرمانی</description>';
echo '<copyright>کپی رایت</copyright>';
echo '<language>فارسی</language>';
echo '<lastBuildDate>1389</lastBuildDate>';
echo '<category>'.$category.'</category>';
echo '<ttl>'.$ttl.'</ttl>';










$con=new connect();
$con-> dbConnect();
if($con){
	echo 'yes';
	
}else{
	echo 'no';
}



$query = "SELECT * from news";

//$query="INSERT INTO photo VALUES ('$id', '$group','$serie','$photoName', '$newFile', '$place','$date','$camera','$lens','$focus','$iso','$other') ";
$result=$con->queryRun($query);
if($result){
	echo 'added';
}else{
	echo 'not added';
}
$num=mysql_num_rows($result);

for($i=0;$i<$num;$i++)
{
	$row=mysql_fetch_array($result);
	
	
	
	$title=$row['newsTitle'];
	$link='myLink';
	$description='brief';
	$copyright='myCopyright';
	$language='myLanguage';
	$lastBuildDate=$row['fullDate'];
	$category='myCategory';
	$ttl='myTtl';
	
	
	
	
	
	
	
	
	
	
	echo '<item><title>'.$title.'</title><description>'.$description.'</description>'.'</item>';
	
	

}
echo '</channel>';
echo '</rss>';




?>