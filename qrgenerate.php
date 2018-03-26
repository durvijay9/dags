<?php
//error_reporting(0); 
$data=json_decode(file_get_contents("php://input"));
  $digiadd=$data->digiadd;
  $data	= array();
 include('qrcode/phpqrcode/qrlib.php'); 
 $qrfilename = $digiadd.".png";
 QRcode::png($digiadd, $qrfilename, "L", 6, 6);
 $data["digiadd"] = $qrfilename;
 echo json_encode($data);
 ?>