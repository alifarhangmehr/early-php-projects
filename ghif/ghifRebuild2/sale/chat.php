<link type="text/css" rel="stylesheet" media="all" href="../modules/chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="../modules/chat/css/screen.css" />
<script language="javascript" type="text/javascript">
function openChatDiv(){
	document.getElementById('chatBut').style.display="none";
	document.getElementById('chat').style.display="block";
}
function closeChatDiv(){
	document.getElementById('chatBut').style.display="block";
	document.getElementById('chat').style.display="none";
}
closeChatDiv();
</script>
<div id="chatBut" onclick="openChatDiv()">
<img src="../themes/<?php echo $_SESSION['theme']; ?>/images/chatIcon5.png" width="32" height="32" align="middle" /> چت با اعضا </div>
<div id="chat">
<div style="position:fixed; bottom:0px; width:220px">
<?php
$connector=new connection();
$query="SELECT * FROM employes";
$result=$connector->queryRun($query);
while($row = mysql_fetch_array($result)){
	if($_SESSION['adminId']!=$row['employeId']){
		if($row['photoThumb']=='') $photo='../themes/'.$_SESSION['theme'].'/images/noPhoto1.png' ; else $photo=$row['photoThumb'];
			echo '<div id="chatBox"><a href="javascript:void(0)" onclick="javascript:chatWith(\''.$row['user'].'\')" style="color:#FFFFFF">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" dir="'.$language_direction.'"><tr>
			<td rowspan="2" width="50px"><img src="'.$photo.'" width="40px" height="50" align="middle" /></td>
			<td style="color:#FFFFFF">'.$row['name'].' '.$row['family'].'</td>
			</tr>
			<tr>
			
				<!-- <td>'.$row['grade'].'</td> -->
		
			</tr></table>
			
			</a></div>';
	}
}
?>
</div>
<div id="closeChatDiv" onclick="closeChatDiv()" ><img src="../themes/<?php echo $_SESSION['theme']; ?>/images/noIcon1.png" width="16" height="16" /></div>
</div>

<script type="text/javascript" src="../modules/chat/js/jquery.js"></script>

<script type="text/javascript" src="../modules/chat/js/chat.js"></script>