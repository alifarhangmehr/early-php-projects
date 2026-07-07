<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../settings/config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/jscript" language="javascript" src="js/validation.js"></script>
<link rel="stylesheet" type="text/css" href="../themes/activation.css" />
<title><?php echo $activation_title; ?></title>
</head>

<body>
<div align="center">
<form method="post" action="">
<fieldset style="width:500px">
<legend align="center"><?php echo $activation_title; ?></legend>
<table dir="<?php echo $language_direction; ?>">
<tr>
		<td><?php echo $activation_serial; ?></td>
		<td>
		<input type="txt" class="serialInput" name="serial5" id="serial5" onkeypress="checkSerial5()" /> - 
		<input type="txt" class="serialInput" name="serial4" id="serial4" onkeypress="checkSerial4()" /> - 
		<input type="txt" class="serialInput" name="serial3" id="serial3" onkeypress="checkSerial3()" /> - 
		<input type="txt" class="serialInput" name="serial2" id="serial2" onkeypress="checkSerial2()" /> - 
		<input type="txt" class="serialInput" name="serial1" id="serial1" onkeypress="checkSerial1()" />
		</td>
	</tr>
	<tr>
        <td colspan="2" align="center"><input class="activationSubmit" type="submit" name="registerSubmit" id="registerSubmit" value="<?php echo $activation_submit; ?>" /></td>
    </tr>
</table></fieldset></form>
</div>

<?php






ob_start(); 

system("wmic csproduct get uuid"); 
$cominfo=ob_get_contents(); 
ob_clean();
/*//echo $cominfo;
//echo '<br />';
$uuid=substr($cominfo,41,71); //+35
*/
$cominfo=str_split($cominfo);
for($i=0;$i<100;$i++){
	if($cominfo[$i]=='0' || $cominfo[$i]==1 || $cominfo[$i]==2 || $cominfo[$i]==3 || $cominfo[$i]==4 || $cominfo[$i]==5 

|| $cominfo[$i]==6 || $cominfo[$i]==7 || $cominfo[$i]==8 || $cominfo[$i]==9 || $cominfo[$i]=='-' || $cominfo[$i]=='A' || 

$cominfo[$i]=='B' || $cominfo[$i]=='C' || $cominfo[$i]=='E' || $cominfo[$i]=='E' || $cominfo[$i]=='F' || $cominfo[$i]=='G' 

|| $cominfo[$i]=='H' || $cominfo[$i]=='J' || $cominfo[$i]=='K' || $cominfo[$i]=='L' || $cominfo[$i]=='M' || $cominfo[$i]

=='N' || $cominfo[$i]=='O' || $cominfo[$i]=='P' || $cominfo[$i]=='Q' || $cominfo[$i]=='R' || $cominfo[$i]=='S' || $cominfo

[$i]=='T' || $cominfo[$i]=='X' || $cominfo[$i]=='Y' || $cominfo[$i]=='Z') $uuid.=$cominfo[$i];	
}


echo'
<tr> 	 	 	 	 	 	 	 	 	 	 	 	 
    <td width="148" align="right" bgcolor="#EAEAEA">کد فعالسازی</b><br /><a href="http://ghif.org/users/directActivation.php?

uuid=<?php echo $uuid; ?>" target="_blank">برای دریافت کد کلیک کنید</a></td>
    <td width="154" align="right" bgcolor="#EAEAEA"><textarea name="actCode" cols="35" rows="5" id="actCode"></textarea></td>
</tr>

    







<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" style="color:green; font-size:16px">
	  <tr>
		<td align="center"><a href="../index.php"><img src="../themes/default/images/ghifLogo0.png" /></a></td>
	  </tr>
	  <tr>
		<td width="294" align="center">'.$activation_installation_finished_successfully.'</td>
	  </tr>
	  <tr>
		<td width="294" align="center" dir="rtl">'.$activation_delete_install.'</td>
	  </tr>
	</table>';

?>




</body>
</html>