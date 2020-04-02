<?php 
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$body = file_get_contents('php://input');
// $body = detectRequestBody();
$id = $body[0];
$firstName = $body[1];
$lastName = $body[2];

$json = file_get_contents('employees.json');
$obj = json_decode($json,true);

$employee = new Employee;

$employee->id = $id;
$employee->firstName = $firstName;
$employee->lastName = $lastName;

$result = array_push($obj, $employee);

return $result;

?>