<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body dir="rtl">
<?php
/*
 * AUSU jQuery-Ajax Autosuggest v1.0
 * Demo of a simple server-side request handler
 * Note: This is a very cumbersome code and should only be used as an example
 */

# Establish DB Connection



require('../../class/connection.php');
$connector=new connection();


$id     =   @$_POST['id'];          // The id of the input that submitted the request.
$data   =   @$_POST['data'];        // The value of the textbox.

if ($id && $data)
{
	$id=str_split($id);
	$id=$id[0].$id[1].$id[2].$id[3].$id[4].$id[5].$id[6].$id[7].$id[8].$id[9];
	
		/*echo '<script language="javascript">alert("'.$id.'");</script>';*/

	if ($id=='scoreTitle')
    {	

		
        $query  = "SELECT * FROM scores WHERE title LIKE '%$data%' AND parentId!='' OR fullCode LIKE '$data%' AND parentId!='' LIMIT 10";
        $result=$connector->queryRun($query);
        $dataList = array();
        while ($row = mysql_fetch_array($result))
        {
			$parentId=$row['parentId'];
			$connector1=new connection();
			$query1="SELECT code FROM scores WHERE scoreId='$parentId'";
			$result1=$connector1->queryRun($query1);
			$row1=mysql_fetch_array($result1);
		
		
			
			if($row['title']!='') $name='<span style="color:#FFCC00">'.$row['title'].'</span> <span style="font-weight:bold">'.$row1['code'].$row['code'].'</span>';
			$toReturn   = $name;
            $dataList[] = '<li id="' .$row['scoreId'] . '"><a href="#">' . $toReturn . '</a></li>';
        }
        if (count($dataList)>=1)
        {
            $dataOutput = join("\r\n", $dataList);
            echo $dataOutput;
        }
        else
        {
            echo '<li><a href="#">موردی یافت نشد</a></li>';
        }
}


else if ($id=='comparativ')
{
		
        $query  = "SELECT * FROM comparative WHERE title LIKE '%$data%' OR code LIKE '$data%' LIMIT 10";
        $result=$connector->queryRun($query);
        $dataList = array();
        while ($row = mysql_fetch_array($result))
        {
					
			
			if($row['title']!='') $name='<span style="color:#FFCC00">'.$row['title'].'</span> <span style="font-weight:bold">'.$row['code'].'</span>';
			$toReturn   = $name;
            $dataList[] = '<li id="' .$row['comparativeId'] . '"><a href="#">' . $toReturn . '</a></li>';
        }
        if (count($dataList)>=1)
        {
            $dataOutput = join("\r\n", $dataList);
            echo $dataOutput;
        }
        else
        {
            echo '<li><a href="#">موردی یافت نشد</a></li>';
        }
}


	}
else
{
    echo 'Request Error';
}











?>
</body>
</html>