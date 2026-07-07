<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student register form</title>
</head>

<body bgcolor="#CCCCCC">
<form name="addStudentForm" method="post" action="addStudentFormP.php" enctype="multipart/form-data">
<table align="center" width="600" border="0">
  <tr>
    <td width="133">id</td>
    <td width="401"><input type="text" name="id" id="id" /></td>
    <td width="44">&nbsp;</td>
  </tr>
  <tr>
    <td>studentNumber</td>
    <td><input type="text" name="studentNumber" id="studentNumber" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>user</td>
    <td><input type="text" name="user" id="user" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>pass</td>
    <td><input type="text" name="pass" id="pass" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>groupName</td>
    <td><input type="text" name="groupName" id="groupName" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>name</td>
    <td><input type="text" name="name" id="name" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>family</td>
    <td><input type="text" name="family" id="family" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>نام</td>
    <td><input type="text" name="pName" id="pName" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>نام خانوادگی</td>
    <td><input type="text" name="pFamily" id="pFamily" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>certificateName</td>
    <td><input type="text" name="certificateName" id="certificateName" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>father</td>
    <td><input type="text" name="father" id="father" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>country</td>
    <td><input type="text" name="country" id="country" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>state</td>
    <td><input type="text" name="state" id="state" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>city</td>
    <td><input type="text" name="city" id="city" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>email</td>
    <td><input type="text" name="email" id="email" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>website</td>
    <td><input type="text" name="website" id="website" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>nationalCode</td>
    <td><input type="text" name="nationalCode" id="nationalCode" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>gender</td>
    <td><input type="text" name="gender" id="gender" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>single</td>
    <td><input type="text" name="single" id="single" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>birthday</td>
    <td><input type="text" name="birthday" id="birthday" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>birthPlace</td>
    <td><input type="text" name="birthPlace" id="birthPlace" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>education</td>
    <td><textarea name="education" cols="40" rows="3" id="education"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>interest</td>
    <td><textarea name="interest" cols="40" rows="3" id="interest"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>brief</td>
    <td><textarea name="brief" cols="40" rows="3" id="brief"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>registerDate</td>
    <td><input type="text" name="registerDate" id="registerDate" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>graduateDate</td>
    <td><input type="text" name="graduateDate" id="graduateDate" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>mobile1</td>
    <td><input type="text" name="mobile1" id="mobile1" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>mobile2</td>
    <td><input type="text" name="mobile2" id="mobile2" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>telephone</td>
    <td><input type="text" name="telephone" id="telephone" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>homeAddress</td>
    <td><input name="homeAddress" type="text" id="homeAddress" size="60" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>workAddress</td>
    <td><input name="workAddress" type="text" id="input27" size="60" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>image</td>
    <td><input type="file" name="file" id="file" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>homePage</td>
    <td><input type="text" name="homePage" id="homePage" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>accessLevel</td>
    <td><input type="text" name="accessLevel" id="accessLevel" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<div align="center">
<input type="submit" value="register" />
</div>
</form>
<br /><br />
</body>
</html>