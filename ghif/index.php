<?php
session_start();
include('class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('themes/login.css');
$pageHeader->createPageHeader('index','');
include('language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$query='SELECT * FROM settings';
$pageHeader->includeFile('js/ajax.js');
$table=new table();
$setting=$table->ifValueExist($query);
if(!$setting) echo '<script language="javascript" type="text/javascript">redirectPage(\'install\')</script>';
?>
<br /><br /><br />
<form id="login" method="post" action="login.php">
    <h1><?php echo $login_window_header; ?></h1>
    <fieldset id="inputs">
        <input id="username" name="user" type="text" placeholder="<?php echo $login_window_user_placeHolder; ?>" autofocus required>
       
        <input id="password" name="pass" type="password" placeholder="<?php echo $login_window_pass_placeHolder; ?>" required>
        <br />
        <?php echo $login_cash_list_select; ?>
        <select name="cashListId">
        <?php 
		$connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 5';
		$query="SELECT cashListId,cashName FROM cashlist";
		$result=$connector->queryRun($query);
		if(!$result) echo 'Error No. 6';
		while($row=mysql_fetch_array($result))
			echo '<option value="'.$row['cashListId'].'">'.$row['cashName'].'</option>';
		?>
        </select>
        
    </fieldset>
    <?php 
		$query1="SELECT version FROM settings WHERE settingId=1";
		$result1=$connector->queryRun($query1);
		if(!$result1) echo 'Error No. 8';
		$row1=mysql_fetch_array($result1);
		?>
    
    <fieldset id="actions">
        <input type="submit" id="submit" value="<?php echo $login_window_submit_value; ?>">
     </fieldset>
</form>
</body>
</html>
