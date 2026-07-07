<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('delete','!');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$id=$_POST['hiddenDeleteId'];
$tableName=$_POST['hiddenTableName'];
$fieldId=$_POST['hiddenFieldId'];

$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$query="DELETE FROM $tableName WHERE $fieldId='$id'";
$result=$connector->queryRun($query);
if(!$result) echo 'Error No. 8';

?>
<script type="text/javascript" language="javascript">
	window.location="<?php echo $_SERVER["HTTP_REFERER"] ?>";
</script>