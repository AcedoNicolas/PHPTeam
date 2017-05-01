// gewoon een test, niet gebruiken !

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        /*x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;*/

        var javascriptVariable =  position.coords.latitude + "-" +position.coords.longitude;
        window.location.href = "location.php?place=" + javascriptVariable;

    }
</script>
<?php

$data = $_GET['place'];
list($lat, $long) = explode("-", $data);
 // *
//
//

$lat="50.930690";
$long = "5.332480";

$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_ENCODING, "");
$curlData = curl_exec($curl);
curl_close($curl);

$address = json_decode($curlData);

//var_dump($address->results[0]->address_components[2]->long_name);
echo ($address->results[0]->address_components[2]->long_name)."<br>";




 ;?>
</body>
</html>
