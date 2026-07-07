<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../class/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/install.css" />
<script type="application/javascript" language="javascript" src="../js/getLocation.js"></script>
<link rel="shortcut icon" href="../themes/favicon.ico" type="image/x-icon">
<link rel="icon" href="../themes/favicon.ico" type="image/x-icon">
<title><?php echo $step2_title; ?></title>
</head>
<body onload="getLocation()">
<br />
<?php
	//$accountId=$_POST['accountId'];
	$connector=new connection();
	$query="SELECT * FROM settings WHERE settingId='1'";
	$result=$connector->queryRun($query);	 	 	 	
	$row = mysql_fetch_array($result);
	$query2="SELECT * FROM guild";
	$result2=$connector->queryRun($query2);	 	 	 	
?>
<form method="post" action="step2p.php" enctype="multipart/form-data">
<div align="center">
<fieldset style="width:600px">
<legend align="center"><?php echo $step2_title; ?></legend>
<br />
<table align="center" width="455" border="0" dir="<?php echo $language_direction; ?>">
   <tr class="installTableTr">
     <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_company_name; ?></td>
     <td width="154" align="<?php echo $language_align; ?>" >
     <input name="companyName" type="text" id="companyName" value="<?php echo $row['companyName']; ?>" size="30" /></td>
   </tr>
   <tr class="installTableTr">
     <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_services; ?></td>
     <td width="154" align="<?php echo $language_align; ?>" ><textarea name="whatToDo" cols="30" id="whatToDo"><?php echo $row['whatToDo']; ?></textarea></td>
   </tr>
   <tr class="installTableTr">
   	 <td align="<?php echo $language_align; ?>"><?php echo $step2_fields_count; ?></td>
     <td width="154" align="<?php echo $language_align; ?>" ><input name="fieldCount" type="text" id="fieldCount" value="3" /></td>
   </tr>
   <tr class="installTableTr">
     <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_country; ?></td>
     <td width="154" align="<?php echo $language_align; ?>" ><input name="country" type="text" id="country" value="" /></td>
   </tr>
   <tr class="installTableTr">
   	 <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_state; ?></td>
     <td width="154" align="<?php echo $language_align; ?>" ><input name="state" type="text" id="state" value="" /></td>
   </tr>
   <tr class="installTableTr">
     <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_address1; ?></td>
     <td width="154" align="<?php echo $language_align; ?>" ><textarea name="address1" cols="30" id="address1"><?php echo $row['address1']; ?></textarea></td>
   </tr>
   <tr class="installTableTr">
     <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_address2; ?></td>
     <td width="154" align="<?php echo $language_align; ?>" ><textarea name="address2" cols="30" id="address2"><?php echo $row['address2']; ?></textarea></td>
   </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_tel1; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="tel1" type="text" id="tel1" value="<?php echo $row['tel1']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_tel2; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="tel2" type="text" id="tel2" value="<?php echo $row['tel2']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_mobile1; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="mob1" type="text" id="mob1" value="<?php echo $row['mob1']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_mobile2; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="mob2" type="text" id="mob2" value="<?php echo $row['mob2']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_sms1; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="sms1" type="text" id="sms1" value="<?php echo $row['sms1']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_sms2; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="sms2" type="text" id="sms2" value="<?php echo $row['sms2']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_fax1; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="fax1" type="text" id="fax1" value="<?php echo $row['fax1']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_fax2; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="fax2" type="text" id="fax2" value="<?php echo $row['fax2']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr"> 	 	 	 	 	 	 	 	 	 	 	 	 
   <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_site1; ?></td>
   <td width="154" align="<?php echo $language_align; ?>" ><input name="site1" type="text" id="site1" value="<?php echo $row['site1']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr"> 	 	 	 	 	 	 	 	 	 	 	 	 
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_site2; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="site2" type="text" id="site2" value="<?php echo $row['site2']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr"> 	 	 	 	 	 	 	 	 	 	 	 	 
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_email1; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input name="email1" type="text" id="email1" value="<?php echo $row['email1']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
    <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_email2; ?></td>
    <td width="154" align="<?php echo $language_align; ?>" ><input type="text" name="email2" id="email2" value="<?php echo $row['email2']; ?>" size="30" /></td>
  </tr>
  <tr class="installTableTr">
        <td colspan="2" align="<?php echo $language_align; ?>">
			<input type="checkbox" name="location" id="location" checked="checked" style="width:0" />
			<label for="location"><?php echo $step2_location; ?></label><br />
			<p style="font-size:10px"><?php echo $step2_location_attention; ?></p>
            <input type="hidden" name="lat" id="lat" value="" />
			<input type="hidden" name="long" id="long" value="" />
		</td>
    </tr>
  <tr class="installTableTr">
      <td width="148" align="<?php echo $language_align; ?>" ><?php echo $step2_logo; ?></td>
      <td width="154" align="<?php echo $language_align; ?>" ><input type="file" name="logoImage" id="logoImage" /></td>
  </tr>
  <tr class="installTableTr">
      <td colspan="2"><input type="submit" class="installSubmit" value="<?php echo $step2_submit; ?>" /></td>
  </tr>
</table></fieldset></form>

</body>
</html>
