<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<?php
if($_POST['arze']!='' && $_POST['taghaza']!=''){
	$arze=$_POST['arze'];
	$taghaza=$_POST['taghaza'];
	echo '<form method="post" action="northWest.php">';
	echo '<table border="1" cellpadding="2">';
	for($i=0;$i<$arze+2;$i++){
		echo '<tr>';
		for($j=0;$j<$taghaza+2;$j++){ //+2 baraye 2 sotune ezafi
			if($i==0 && $j==0 || $i==$arze+1 && $j==$taghaza+1)
				echo '<td></td>'; //khali gooshe bala samte chap va paen samte rast
			else if($i==0 && $j==$taghaza+1)
				echo '<td>عرضه</td>'; // bala samte rast
			else if($i==0 && $j!=0) 
				echo '<td>'.$j.'</td>'; //header satr
			else if($i==$arze+1 && $j==0) 
				echo '<td>تقاضا</td>'; //paen samte chap
			else if($i!=0 && $j==0) 
				echo '<td>'.$i.'</td>'; //header sotun
			else{ // baghiye halat
				echo '<td><input type="text" size="2" name="'.$i.'/'.$j.'" /></td>';
				
			}
		}//end for j
		echo '</tr>';
	}//end for i
	echo '</table>';
}
echo '
	<input type="hidden" name="arze" value="'.$arze.'" />
	<input type="hidden" name="taghaza" value="'.$taghaza.'" />
	<input type="submit" value="اجرای الگوریتم" />
	</form>
';
?>
<form method="post" action="index.php">
تعداد عرضه : <input type="text" name="arze" />
<br />
تعداد تقاضا : <input type="text" name="taghaza" />
<br />
<input type="submit" value="تشکیل جدول" />
</form>
</body>
</html>
