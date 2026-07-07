<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>
//var myCenter=new google.maps.LatLng(35.798580,50.892750);
var myCenter=new google.maps.LatLng(35.798580,50.892750);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:18,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);



<?php
require_once("connection.php");
$connector=new connection();
$query="select * from parkposition";
$result=$connector->queryRun($query);
while($row=mysql_fetch_array($result)){
	$lat=$row['lat'];
	$lng=$row['lng'];
echo "	var parkPos=new google.maps.LatLng(".$lat.",".$lng.");
	var marker=new google.maps.Marker({
	  position:parkPos,";
if($row["status"]=='1')
	  echo "icon:'greenPin.png'";
else
	  echo "icon:'redPin.png'";
	  echo "});
	marker.setMap(map);
	google.maps.event.addListener(marker, 'click', 
  function () {
  window.location.href = 'request.php?parkId=".$row['parkPositonId']."';
});
	
	";
}
?>


}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" style="width:955px;height:600px;"></div>
</body>
</html>
