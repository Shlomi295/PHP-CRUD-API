<?php 
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$postData = file_get_contents('php://input');

$json = file_get_contents('employees.json');
$obj = json_decode($postData,true);
$jsonarray = json_decode($json,true);


array_push($jsonarray,$obj);

$result = json_response($jsonarray);

saveToFile($result,'employees.json');

return $result;

?>