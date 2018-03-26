<?php
//error_reporting(0); 
$data=json_decode(file_get_contents("php://input"));
include 'geocoding.php';
$obj = new geocoding();
$result = $obj->geocode($data->address);
echo json_encode($result);
?>