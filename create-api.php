<?php 
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$postData = file_get_contents('php://input');

$json = file_get_contents('employees.json');
$obj = json_decode($postData,true);
$jsonarray = json_decode($json,true);


array_push($jsonarray,$obj);

if ($jsonarray != NULL)
{
    saveToFile(json_encode($jsonarray),'employees.json');
}
else{
    $result = "There was something wrong and the Result is empty";
}

<<<<<<< HEAD
$result = json_response($jsonarray);

=======
>>>>>>> 5c098f1eb99f200ca07b381f70f525c18009627d
return $result;

?>