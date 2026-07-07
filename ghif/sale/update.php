<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('update','D');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$connector=new connection();
$query="SELECT version FROM settings";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);

?>
<script language="javascript" type="text/javascript">
checkForLatestUpdate();
</script>
<table dir="<?php echo $language_direction; ?>" align="center" cellspacing="10">
  <tr>
    <td><?php echo $update_current_version.' : '.$row['version']; ?>&nbsp;</td>
  </tr>
  
  <tr>
    <td align="center"><a href="http://www.ghif.org/update.php" style="text-decoration:none"><?php echo $update_link ?></a></td>
  </tr>
  <tr>
    <td>
    <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <input type="file" name="file" />
    
	</td>
    </tr>
    <tr>
    <td align="center"><input name="submit" type="submit" value="<?php echo $update_submit; ?>" /></form></td>
  </tr>
  <?php
	if (isset($_POST['submit'])){
	$allowedExts = array("zip");
	$temp=explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	$unzip_path='../temp/unzip/';
	if(in_array($extension, $allowedExts)) {
	  if ($_FILES["file"]["error"] > 0) {
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	  } else {
		move_uploaded_file($_FILES["file"]["tmp_name"],
		  "../temp/" . $_FILES["file"]["name"]);
	  }
	} else {
		$flag=false;
	}
	
	
	$zip = new ZipArchive;
	if ($zip->open("../temp/" . $_FILES["file"]["name"]) === true) {
		$zip->extractTo($unzip_path);
		$zip->close();
		foreach (glob($unzip_path . DIRECTORY_SEPARATOR . 'New Folder') as $file) {
			$finfo = pathinfo($file);
			rename($file, $unzip_path . DIRECTORY_SEPARATOR . $finfo['basename']);
		}
		unlink($unzip_path . DIRECTORY_SEPARATOR . 'New Folder');
	} else {
		$flag=false;
	}
	include('../temp/unzip/info.php');
	$my_file = '../temp/unzip/update.sql';
	$handle = fopen($my_file, 'r');
	$query = fread($handle,filesize($my_file));
	$explodedQuery=explode(";",$query);
	$limit=count($explodedQuery);
	for($i=0;$i<$limit-1;$i++){
		$executedQuery=$explodedQuery[$i];
		$result=$connector->queryRun($executedQuery);
		if(!$result) $flag=false;	
	}
	if($versionFrom==$row['version']){
		$flag=true;}
	for($i=0;$i<count($array);$i++){
		$copy=copy($unzip_path.$array[$i]['fileName'],'../'.$array[$i]['destination'].'/'.$array[$i]['fileName']);
		if(!$copy) $flag=false;
	}
	
	$updateField[0][0]='version';
	$updateField[0][1]=$versionTo;
	$tableName='settings';
	$condition='settingId=1';
	$table=new table();
	$table->updateTable($updateField,$tableName,$condition);
	if(!$table) $flag=false;
	function rrmdir($dir) { 
	  foreach(glob($dir . '') as $file) { 
		if(is_dir($file)) rrmdir($file); else unlink($file); 
	  } //rmdir($dir); 
	  
	} rrmdir('../temp');	
	if($flag){ echo '<tr><td>'.$update_changeLog_from.' '.$versionFrom.' '.$update_changeLog_to.' '.$versionTo.' '.$update_changeLog_successful.'</td></tr>
	<tr><td>'.$changeLog.'</td></tr>';
	}else{ echo '<tr><td>'.$update_error.'</td></tr>'; }
	
		
	
	
	}
  ?>
</table>


</body>
</html>