<!--var x = document.getElementById("location");-->

function getLocation() {
	if(document.getElementById("location").checked){
	
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}

function showPosition(position) {
    document.getElementById('lat').value=position.coords.latitude;
    document.getElementById('long').value=position.coords.longitude;
}
}


