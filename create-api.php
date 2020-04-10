<?php 
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



$postData = file_get_contents('php://input');

if ($postData==null){
	include "employees.json";
	exit;
}

$json = file_get_contents('employees.json');
$obj = json_decode($postData,true);
$jsonarray = json_decode($json,true);

// append the array at the end of the json array
array_push($jsonarray,$obj);

//save json file
if ($jsonarray != NULL)
{
    saveToFile(json_encode($jsonarray),'employees.json');
}
else{
    $result = "There was something wrong and the Result is empty";
}

//return result with OK 200
$result = json_response($jsonarray);

return $result;

?>