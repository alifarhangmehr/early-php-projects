<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $step0_title; ?></title>
<link rel="stylesheet" type="text/css" href="../themes/install.css" />
<link rel="shortcut icon" href="../themes/favicon.ico" type="image/x-icon">
<link rel="icon" href="../themes/favicon.ico" type="image/x-icon">
</head>
<?php
echo '<div align="center">
<br /><fieldset style="width:600px"><br />
<legend align="center" style="font-size:14">'.$step0_title.'</legend>	
	<form action="step1.php" method="post"><table cellspacing="20" dir="'.$language_direction.'">
    	<tr>
        	<td><textarea cols="70" rows="20" readonly="readonly" style="background:#FFF;">'.$step0_agreement.'</textarea></td>
        </tr>
		<tr>
			<td><input type="checkbox" name="agreement" id="agreement" style="width:0;" onchange="checkSubmit()" /><label for="agreement">'.$step0_agree.'</label></td>
		</tr>
		<tr>
    		<td align="center"><input type="submit" id="agreementSubmit" class="agreementSubmit" value="'.$step0_submit.'" disabled="disabled" /></td>
   		</tr> 
    </table></form></fieldset></div>';
?>
<script type="text/javascript" language="javascript">
function checkSubmit(){
	if(document.getElementById('agreement').checked){
		document.getElementById('agreementSubmit').disabled="";
		document.getElementById('agreementSubmit').style.background='#09F';
		document.getElementById('agreementSubmit').style.cursor='pointer';
	}
	else {
		document.getElementById('agreementSubmit').disabled="disabled";
		document.getElementById('agreementSubmit').style.background='#666';
		document.getElementById('agreementSubmit').style.cursor='default';
	}
}
</script>