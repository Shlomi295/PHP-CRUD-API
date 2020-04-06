<?php 
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postData = file_get_contents('php://input');

$json = file_get_contents('employees.json');
$jsonarray = json_decode($json,true);

//remove the object with the array index provided
unset($jsonarray[(int)$postData]);
$arr2 = array_values($jsonarray); 

//save to json file
saveToFile(json_encode($arr2),'employees.json');

//return result with OK 200
$result = json_response($arr2);

return $result;


?>