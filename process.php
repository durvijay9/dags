<?php
error_reporting(0);
header("Access-Control-Allow-Origin: none");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$result->value1 = $request->value1;
$resultjson = (json_encode($result));
echo $resultjson;

?>