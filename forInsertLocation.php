<?php
//error_reporting(0);
  $data=json_decode(file_get_contents("php://input"));
  $pincode=$data->pincode;
  $sector=$data->sector;
  $street=$data->street;
  $landmark=$data->landmark;
  $bhname=$data->bhname;
  $hfno=$data->hfno;
  $lat=$data->lat;
  $long=$data->long;

 $data=array();
 include("General.php");
 $obj = new dags();
 $conn = $obj->dbconnectDags();
 $data["status"] = $obj->insertLocation($conn, $hfno,$bhname,$landmark,$street,$sector,$pincode,"1",$lat,$long);
 echo json_encode($data);
?>