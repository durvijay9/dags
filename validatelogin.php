<?php
//error_reporting(0);
header("Access-Control-Allow-Origin: *");
$postdata = file_get_contents("php://input");
$from_data = json_decode($postdata);
//$from_data = json_decode(file_get_contents("php://input"));
$data = array();
$error = array();
include("General.php");
$obj = new dags();
if(empty($from_data->userid))
	$error["userdi"] = "User Id is required";

if(empty($from_data->password))
	$error["password"] = "Password is required";

if(!empty($error))
	$data["error"] = $error;
else
{
	$conn = $obj->dbconnectDags();
	$data["status"] = $obj->loginuser($conn, $from_data->userid, $from_data->password);
}

echo json_encode($data);
?>