<?php 
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postData = file_get_contents('php://input');
$json = file_get_contents('employees.json');
$jsonarray = json_decode($json,true);

$object = $jsonarray[(int)$postData];

unset($jsonarray[(int)$postData]);
$arr2 = array_values($jsonarray); 

$data= json_encode($arr2,true);
// save to json file
saveToFile($data,'employees.json');

//return result with OK 200
$result = json_response($object);

return $result;

?>