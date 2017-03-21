<?php
//$userid =  $_POST["userid"];
//$password =  $_POST["password"];
$myObj->userid = $_POST["userid"];
$myObj->password = $_POST["password"];
$content = json_encode($myObj);
$url = "your url";    


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 201 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


curl_close($curl);

$response = json_decode($json_response, true);
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>

<body>
<form action="/a.php" method="post">
  Username:<br>
  <input type="text" name="userid"><br>
  Password:<br>
  <input type="text" name="password"><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
