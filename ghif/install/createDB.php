<?php
session_start();
include('../class/pageHeader.php');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

$pageHeader=new pageHeader();
$pageHeader->includeFile('class/connection.php');

$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';

$dbNameAndUser='ghif';
$query="CREATE DATABASE `$dbNameAndUser` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci";
$result1=$connector->queryRun($query);

$query="CREATE USER '$dbNameAndUser'@'localhost' IDENTIFIED BY '111111'";
$result2=$connector->queryRun($query);

$query="GRANT ALL PRIVILEGES ON * . * TO '$dbNameAndUser'@'localhost' IDENTIFIED BY '111111' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0";
$result3=$connector->queryRun($query);

$query="GRANT ALL PRIVILEGES ON `$dbNameAndUser\_%` . * TO '$dbNameAndUser'@'localhost';";
$result4=$connector->queryRun($query);

if($result1 && $result2 && $result3 && $result4) echo '<p align="center" style="color:green">'.$createDb_successfully_message.'</p>';
else echo '<p align="center" style="color:red">'.$createDb_unsuccessfull_message.'</p>';

?>