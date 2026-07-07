<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addBackup','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../class/file.php');
include('../settings/config.php');
?>
<script type="text/javascript" language="javascript">
function showContent() {
	var target=document.getElementById('ajaxLoader');
	var spinner= new Spinner(opts).spin(target);
}
</script>
</head>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<p align="center" id="waitingP"><?php echo $addBackup_processing_message; ?><br /><span style="color:green"><?php echo $addBackup_please_be_patient; ?></span></p>



</div>

<body>

<?php
$table=new table();
date_default_timezone_set('Asia/Tehran');
$date=pdate(YmdHis);
$employeId=$_SESSION['adminId'];
$connector=new connection();

$tableName='backup';
$idColumnName='backupId';
$backupId=$table->maxTableId($tableName,$idColumnName);



$comments=$addBackup_add_backup_message;

$columns[0]='employeId';
$columns[1]='date';
$columns[2]='comments';


$values[0]=$employeId;
$values[1]=$date;
$values[2]=$comments;


$tableName='backup';
$idColumnName='backupId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);




$result=$connector->queryRun($query);
$_SESSION['todayShamsiDate']=$todayShamsiDate=pdate("Y-m-d_").date("H-i-s");
$structure = '../backup/sql/';
if (!mkdir($structure, 0, true)) {
    die('Failed to create folders...');
}
backup_tables($hostName,$dbUser,$dbPass,$dbName);
/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
  
  $link = mysql_connect($host,$user,$pass);
  mysql_query("SET CHARACTER SET utf8");
  mysql_select_db($name,$link);
  
  //get all of the tables
  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //cycle through
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);
    
    //$return.= 'DROP TABLE '.$table.';';
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysql_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          $row[$j] = ereg_replace("\n","\\n",$row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
  }
  
  //save file
  //$todayShamsiDate=pdate("Y-m-d_").date("H-i-s");
  $handle = fopen('../backup/sql/'.$_SESSION['todayShamsiDate'].'.sql','a+');
  fwrite($handle,$return);
  fclose($handle);
  //echo $return;

}
//backup images
$zipFileName=$_SESSION['todayShamsiDate'];
$dstFile='../backup/'.$zipFileName.'.zip';
//
Zip('../images',$dstFile); //ok
Zip('../backup/sql', $dstFile);

//$sqlTempFolder='../backup/'.$todayShamsiDate.'.sql';
//unlink($sqlTempFile);
deleteAll('../backup/sql');

?>
</p>
<script type="text/javascript" language="javascript">
	document.getElementById('ajaxLoader').style.display="none";
	document.getElementById('waitingP').style.display="none";
	
</script>
<p>&nbsp;</p>
<p align="center" dir="rtl"><img src="../themes/default/images/saveIcon.png" width="64" height="64" /><?php echo $addBackup_successfully_message; ?></p>
<p align="center" dir="rtl"><a href="showBackup.php"><br /><?php echo $addBackup_successfully_back_link; ?></a></p>

</body>
</html>