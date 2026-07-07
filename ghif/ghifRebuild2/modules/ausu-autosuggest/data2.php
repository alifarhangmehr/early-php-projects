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



//$query="SELECT * FROM `goods`";
//
//$i=0;
//while($row = mysql_fetch_array($result)){


# Assign local variables
$id     =   @$_POST['id'];          // The id of the input that submitted the request.
$data   =   @$_POST['data'];        // The value of the textbox.

if ($id && $data)
{
	
	
	$query  = "SELECT * FROM goodfields";
    $result=$connector->queryRun($query);
	$fieldCount=mysql_num_rows($result);
		
	for($i=1;$i<=$fieldCount;$i++){
	$field='field'.$i;
	$fieldId='fieldId'.$i;
	$fieldName='fieldName'.$i;	
	if ($id==$field)
    {
		
        $query  = "SELECT * FROM `$field` WHERE `$fieldName` LIKE '%$data%'";
        $result=$connector->queryRun($query);
        $dataList = array();
        while ($row = mysql_fetch_array($result))
        {
			if($row[$fieldName]!='') $name='<span style="color:#FFCC00">'.$row[$fieldName].'</span>';
			$toReturn   = $name;
            $dataList[] = '<li id="' .$row[$fieldId] . '"><a href="#">' . $toReturn . '</a></li>';
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

}
else
{
    echo 'Request Error';
}

?>
</body>
</html>