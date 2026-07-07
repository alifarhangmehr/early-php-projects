<?php
include('class/connect.php');

$con=new connect();
$con-> dbConnect();
if($con){
	echo 'yes';
	
}else{
	echo 'no';
}
$getId=$_GET['id'];


$query = "SELECT * from news where id='$getId'";

//$query="INSERT INTO photo VALUES ('$id', '$group','$serie','$photoName', '$newFile', '$place','$date','$camera','$lens','$focus','$iso','$other') ";
$result=$con->queryRun($query);
if($result){
	echo 'added';
}else{
	echo 'not added';
}
$num=mysql_num_rows($result);
?>

<?php
/*
for($i=0;$i<$num;$i++){
	$row = mysql_fetch_array($result);
	echo '<tr>';
	echo '<td>'.$row['dateEN'].'</td>'; 
	echo '<td>'.$row['dateFA'].'</td>';
	echo '<td>'.$row['newsGroup'].'</td>';
	echo '<td>'.$row['author'].'</td>';
	echo '<td>'.$row['newsTitle'].'</td>';
	echo '<td>'.$row['brief'].'</td>';
	echo '<td>'.$row['image'].'</td>';
	echo '</tr>';
}
*/

?>








































<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css">
<script language="javascript" type="text/javascript" src="java/index.js"></script>
<title>پروتال خبری گروه آرمای</title>
</head>

<body>
<table width="960px" border="0" cellspacing="0" cellpadding="0" align="center" style="background:url(image/bg3.jpg) no-repeat">
  <tr>
    <td colspan="4" height="80px"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

    </td>
  </tr>
  <tr>
    <td colspan="4" height="300px"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
  	<td colspan="4"><p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>

  <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" align="center">&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr>
    <td width="65">&nbsp;</td>
    <td width="683" colspan="2">
    <div id="randomNewsDiv" align="center">
    <table border="0" id="newsTable">
    <?php
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
        
        echo '<tr><td colspan="2" id="newsTitleTd">'.$row['newsTitle'].'<br />
		<div id=hideNewsBody'.$row['id'].' style="color:#FFF; font-weight:100" >'.$row['newsBody'].'</div>
		
		
		</td></tr>';
        
    //	echo 'تاریخ میلادی : '.$row['dateEN'].'<br />'; 
    //	echo 'تاریخ فارسی : '.$row['dateFA'].'<br />';
    //	echo 'گروه خبری : '.$row['newsGroup'].'<br />';
    //	echo 'نویسنده : '.$row['author'].'<br />';
    //	echo 'خلاصه خبر : '.$row['newsBody'].'<br />';
        echo '<tr><td width="150px" height="150px"><img src= '.$row['image'].' /></td><td id="newsBriefTd">'.$row['brief'].'<br /><br />
		<a href="#" style="color:#CC6" >گروه خبری : '.$row['newsGroup'].'</a><br />
		<a style="color:#36C" onclick="showNewsBody('.$row['id'].')" >متن کامل ...</a></td></tr>';

        
    //	echo 'عکس : '.$row['image'].'<br />';
        echo '<tr><td colspan="2">نوشته شده توسط <a style="color:#FC0">'.$row['author'].'</a>'.' در تاریخ <a style="color:#FC0">'.$row['dateFA'].'</a>'.' شمسی و <a style="color:#FC0">'.$row['dateEN'].'</a>'.' میلادی'.' در ساعت : <a style="color:#FC0">'.$row['newsTime'].'</a><hr width="100%"</td></tr>';
    }
    
    
    ?> 
    </table>
    <table border="1">
    </table>
    <p>&nbsp;</p>
    </div>
    </td>
    <td width="65">&nbsp;</td>
  </tr>
   <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" align="center">
    
    <p>&nbsp;</p></td>
    <td width="65">&nbsp;</td>
  </tr>
    
    
  <tr>
    <td width="65">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="147">&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr style="background:url(image/bg1-bot.jpg) no-repeat">
    <td colspan="4"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

      
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" id="copyrightTd">طراحی شده توسط <a href="www.idealg.com" style="color:#CCC; font-size:12px">گروه آرمانی </a> - تابستان 1389</td>
    <td width="65">&nbsp;</td>
  </tr>
</table>
<div id="newsBody"></div>
</body>
</html>



























