<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
require('../class/shamsiDate.php');
require('../settings/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>backup</title>
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>

</head>

<body>
<?php
$todayShamsiDate=pdate("Y-m-d_").date("H-i-s");
$structure = '../backup/'.$todayShamsiDate.'/';
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
  $todayShamsiDate=pdate("Y-m-d_").date("H-i-s");
  $handle = fopen('../backup/'.$todayShamsiDate.'/database'.$todayShamsiDate.'.sql','w+');
  fwrite($handle,$return);
  fclose($handle);
}
//backup images
function Zip($source, $destination)
{
    if (extension_loaded('zip') === true)
    {
        if (file_exists($source) === true)
        {
                $zip = new ZipArchive();

                if ($zip->open($destination, ZIPARCHIVE::CREATE) === true)
                {
                        //$source = realpath($source);

                        if (is_dir($source) === true)
                        {
                                $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

                                foreach ($files as $file)
                                {
                                        //$file = realpath($file);

                                        if (is_dir($file) === true)
                                        {
                                                //$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                                        }

                                        else if (is_file($file) === true)
                                        {
                                                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                                        }
                                }
                        }

                        else if (is_file($source) === true)
                        {
                                //$zip->addFromString(basename($source), file_get_contents($source));
                        }
                }

                return $zip->close();
        }
    }

    return false;
}
$zipFileName=$todayShamsiDate;
Zip('../upload/', '../backup/'.$zipFileName.'.zip'); //ok
Zip('../uploadEmp/', '../backup/'.$zipFileName.'.zip'); //ok
Zip('../backup/'.$todayShamsiDate, '../backup/'.$zipFileName.'.zip');
$directory='../backup/'.$todayShamsiDate;
deleteAll($directory);


function deleteAll($directory, $empty = false) {
    if(substr($directory,-1) == "/") {
        $directory = substr($directory,0,-1);
    }

    if(!file_exists($directory) || !is_dir($directory)) {
        return false;
    } elseif(!is_readable($directory)) {
        return false;
    } else {
        $directoryHandle = opendir($directory);
       
        while ($contents = readdir($directoryHandle)) {
            if($contents != '.' && $contents != '..') {
                $path = $directory . "/" . $contents;
               
                if(is_dir($path)) {
                    deleteAll($path);
                } else {
                    unlink($path);
                }
            }
        }
       
        closedir($directoryHandle);

        if($empty == false) {
            if(!rmdir($directory)) {
                return false;
            }
        }
       
        return true;
    }
} 








?>
</p>
<p>&nbsp;</p>
<p align="center" dir="rtl">عملیات backup گیری با موفقیت انجام شد .</p>
<p align="center" dir="rtl"><a href="adminIndex.php"><img src="../themes/default/images/homeIcon.png" /><br />بازگشت</a></p>
</body>
</html>