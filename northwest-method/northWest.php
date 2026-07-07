<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<?php
	$arze=$_POST['arze'];
	$taghaza=$_POST['taghaza'];
	echo '<form method="post" action="northWest.php">';
	echo '<table border="1" cellpadding="2">';
	for($i=0;$i<$arze+2;$i++){
		echo '<tr>';
		for($j=0;$j<$taghaza+2;$j++){ //+2 baraye 2 sotune ezafi
			if($i==0 && $j==0 || $i==$arze+1 && $j==$taghaza+1)
				echo '<td></td>'; //khali gooshe bala samte chap va paen samte rast
			else if($i==0 && $j==$taghaza+1)
				echo '<td>عرضه</td>'; // bala samte rast
			else if($i==0 && $j!=0) 
				echo '<td>'.$j.'</td>'; //header satr
			else if($i==$arze+1 && $j==0) 
				echo '<td>تقاضا</td>'; //paen samte chap
			else if($i!=0 && $j==0) 
				echo '<td>'.$i.'</td>'; //header sotun
			else if($i==$arze+1) {
				$value=$_POST[$i.'/'.$j];
				echo '<td id="td'.$i.'/'.$j.'" width="60px"><input type="text" size="2"  value="'.$value.'" id="'.$i.'/'.$j.'" /><br />'.$value.'</td>';
			}else if($j==$taghaza+1) {
				$value=$_POST[$i.'/'.$j];
				echo '<td id="td'.$i.'/'.$j.'" width="60px"><input type="text" size="2"  value="'.$value.'" id="'.$i.'/'.$j.'" /><br />'.$value.'</td>';
			}else{ // baghiye halat
			
				$value=$_POST[$i.'/'.$j];
				echo '<td id="td'.$i.'/'.$j.'" width="60px"><input type="text" size="2"  value="'.$value.'" id="'.$i.'/'.$j.'" /><br /></td>';
				
			}
		}//end for j
		echo '</tr>';
	}//end for i
	echo '</table>';
echo '
	<input type="hidden" id="arze" value="'.$arze.'" />
	<input type="hidden" id="taghaza" value="'.$taghaza.'" />
	</form>
';


?>
<div id="result">z=</div>
<script language="javascript" type="text/javascript">
	arze=parseFloat(document.getElementById('arze').value);
	taghaza=parseFloat(document.getElementById('taghaza').value);
	
	//newValueArze=parseFloat(document.getElementById('1/'+(taghaza+1)).value);
	newValueTaghaza=parseFloat(document.getElementById((arze+1)+'/1').value);
	i=1;
	j=1;
	z='Z=';
	tZ=0;
	tM=0;
	for(k=0;k<(arze+taghaza-1);k++){ // tedade peymayesh ha barabare arze+ taghaza - 2 mibashad (arze+taghaza-2)
	document.getElementById('td'+i+'/'+j).bgColor='#FC0';
	//alert('i : '+i+' , j : '+j);
	newValueArze=document.getElementById(i+'/'+(taghaza+1)).value;
	newValueTaghaza=document.getElementById((arze+1)+'/'+j).value;
		if(newValueArze>newValueTaghaza){ //harkate ofoghi
			//if(i==2 && j==2) alert('here');
			//alert('if');
			//temp=document.getElementById('1/6').value;
			//alert(temp);
			
			document.getElementById('td'+i+'/'+(taghaza+1)).innerHTML+='->'+(newValueArze-newValueTaghaza); //adade arze reshte
			document.getElementById('td'+i+'/'+j).innerHTML+=newValueTaghaza; //adade tooye khoone i,j
			

			document.getElementById(i+'/'+(taghaza+1)).value=(newValueArze-newValueTaghaza); //adade arze input
		
			document.getElementById('td'+(arze+1)+'/'+j).innerHTML+='->0'; //adade taghaza reshte
			document.getElementById((arze+1)+'/'+j).value=0; //adade taghaza input
			
			
			// mohasebeye z
			
			value=document.getElementById(i+'/'+j).value;
			z+='('+newValueTaghaza+'*'+value+')';
			
			if(value!='M')
				tZ+=parseFloat(newValueTaghaza)*parseFloat(value);
			else{
				//alert('M here');
				tM+=parseFloat(newValueTaghaza);
			}
			//alert(z);
			j++;
		}else{ // harkate amudi
			//alert('else');
			
			//alert(newValueArze);
			document.getElementById('td'+(arze+1)+'/'+j).innerHTML+='->'+(newValueTaghaza-newValueArze); //adade taghaza reshte
			document.getElementById('td'+i+'/'+j).innerHTML+=newValueArze; //adade tooye khoone i,j
			
			document.getElementById((arze+1)+'/'+j).value=(newValueTaghaza-newValueArze); //adade taghaza input
			
			document.getElementById('td'+i+'/'+(taghaza+1)).innerHTML+='->0'; //adade arze reshte
			document.getElementById(i+'/'+(taghaza+1)).value=0; //adade arze input
			
			
			// mohasebete z
			value=document.getElementById(i+'/'+j).value;
			z+='('+newValueArze+'*'+value+')';
			if(value!='M'){
				//alert(tZ2);
				tZ+=parseFloat(newValueArze)*parseFloat(value);
			}
			else{
				//alert(value);
				tM+=parseFloat(newValueArze);
			}
			i++;
		
			}
		if(k!=(arze+taghaza-2)) z+='+';
			
	}//end for i
document.getElementById('result').innerHTML=z+'<br /> Z='+tZ+'+'+tM+'M';
if(tM!=0)
	document.getElementById('result').innerHTML+='<br /> این یک جواب موجه نیست';
else
	document.getElementById('result').innerHTML+='<br /> این یک جواب موجه است';
</script>

</body>
</html>
