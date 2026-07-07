<?php
session_start();
?>
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


include('../../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
require('../../class/connection.php');
$connector0=new connection();
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
    if ($id=='goodName')
    {
        $query0  = "SELECT *
                  FROM goods
                  WHERE goodName LIKE '%$data%'
                  LIMIT 10";

        $result0=$connector0->queryRun($query0);

        $dataList = array();
		//$i=1;
        while ($row0 = mysql_fetch_array($result0))
        {	
			
			
			$toReturn=$row0['goodName'].'</span><br />';
			$connector=new connection();
			$query="SELECT * FROM `goodfields` ORDER BY `goodfields`.`goodFieldId` ASC LIMIT 0 , 3";
			$result=$connector->queryRun($query);
			
			$i=1;
			while($row = mysql_fetch_array($result)){
				
				$field='field'.$i;
				$fieldId='fieldId'.$i;
				$fieldName='fieldName'.$i;
				$goodFieldId=$row0[$fieldId];
				
				$connector2=new connection();
				$query2="SELECT * FROM `$field` WHERE `$fieldId`='$goodFieldId'";
				$result2=$connector2->queryRun($query2);
				$row2=mysql_fetch_array($result2);
				if($row2[$fieldName]!='')
					$toReturn.=$row['goodFieldName'].' : <span style="color:#66CC00; font-weight:bold">'.$row2[$fieldName].'</span>';
				else 
					$toReturn.=$row['goodFieldName'].' : <span style="color:#FFCC00; font-weight:bold">'.$ausu_autosuggest_unRegistered.'</span> ';
				$i++;
			}
            $dataList[] = '<li id="' .$row0['barcode'] . '"><a href="#">' . $toReturn . '</a></li>';
        }

        if (count($dataList)>=1)
        {
            $dataOutput = join("\r\n", $dataList);
            echo $dataOutput;
        }
        else
        {
            echo '<li><a href="#">'.$ausu_autosuggest_notFound.'</a></li>';
        }
    }

	
	
	

	
	
	else if ($id=='oaName')
    {
        $query  = "SELECT * FROM oa WHERE name LIKE '%$data%' OR family LIKE '%$data%' OR company LIKE '%$data%' 
                  LIMIT 10";

        $result=$connector->queryRun($query);

        $dataList = array();

        while ($row = mysql_fetch_array($result))
        {
			if($row['name']!='' || $row['family']!='') $name='<span style="color:#FFCC00">'.$row['name'].' '.$row['family'].'</span>'; else $name='<span style="color:#FFCC00; font-weight:bold">'.$ausu_autosuggest_unRegistered.'</span>';
						
			if($row['company']!='') $company='<span style="color:#FFCC00">'.$row['company'].'</span>'; else $company='<span style="color:#FFCC00; font-weight:bold">'.$ausu_autosuggest_unRegistered.'</span>';
			

			$toReturn   = $ausu_autosuggest_name.' : '.$name.' | '.$ausu_autosuggest_company.' : '.$company;
            $dataList[] = '<li id="' .$row['oaId'] . '"><a href="#">' . $toReturn . '</a></li>';
        }

        if (count($dataList)>=1)
        {
            $dataOutput = join("\r\n", $dataList);
            echo $dataOutput;
        }
        else
        {
            echo '<li><a href="#">'.$ausu_autosuggest_notFound.'</a></li>';
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