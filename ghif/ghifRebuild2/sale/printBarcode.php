<?php
session_start();
error_reporting(0);
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../class/connection.php');
include('../class/farsiNumber.php');
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('class/access.php');
$login=new login();
$acLevelSign='d';
$login->check($acLevelSign);

$connector=new connection();
if(!$connector) echo 'Error No. 7';
$c2f=new Convertnumber2farsi();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $printBarcode_title; ?></title>
</head>
<body style="font-family:Tahoma, Geneva, sans-serif">
<table border="1" cellspacing="2" cellpadding="10" dir="rtl">
<?php
$goodId=$_POST['goodId'];
$count=$_POST['count'];
$query="SELECT * FROM goods WHERE goodId='$goodId'";
$result=$connector->queryRun($query);
if(!$result) echo 'Error No. 8';
$row=mysql_fetch_array($result);

$goodName=$row['goodName'];
$sellPrice=$row['sellPrice'];
$_SESSION['barcode']=$row['barcode']++;

$goodNameLen=strlen($goodName);
	   if($goodNameLen<15) $goodNamePrint=$goodName.'<br />';
	   else if($goodNameLen>=15) $goodNamePrint=$goodName;
for($i=0;$i<$count;$i++){

echo'<tr>
		<td align="center">
			<span style="font-size:16px">'.$goodNamePrint.'</span>
			<br />
			<img src="barcodeGenerator2.php" width="160x" />
			<br /><br />
			<span style="font-size:16px">'.$c2f->Convertnumber2farsi($sellPrice).' '.$currency_name.'</span>
		</td>
		<td align="center">
			<span style="font-size:16px">'.$goodNamePrint.'</span>
			<br />
			<img src="barcodeGenerator2.php" width="160x" />
			<br /><br />
			<span style="font-size:16px">'.$c2f->Convertnumber2farsi($sellPrice).' '.$currency_name.'</span>
		</td>
		<td align="center">
			<span style="font-size:16px">'.$goodNamePrint.'</span>
			<br />
			<img src="barcodeGenerator2.php" width="160x" />
			<br /><br />
			<span style="font-size:16px">'.$c2f->Convertnumber2farsi($sellPrice).' '.$currency_name.'</span>
		</td>
	</tr>';
}
?>
</table>
<script language="javascript" type="text/javascript">
window.print();
setTimeout("document.location.replace('<?php echo $_POST['sendPage']; ?>.php')",2000);
</script>
</body>
</html>