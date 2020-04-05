<?php 
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postData = file_get_contents('php://input');

$json = file_get_contents('employees.json');
$jsonarray = json_decode($json,true);

unset($jsonarray[(int)$postData]);
$arr2 = array_values($jsonarray); 

saveToFile(json_encode($arr2),'employees.json');

$result = json_response($arr2);

return $result;

?>