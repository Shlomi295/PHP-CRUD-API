<?php 
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$id = $_POST['id'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastName'];

$json = file_get_contents('employees.json');
$obj = json_decode($json,true);

$employee = new Employee;

$employee->id = $id;
$employee->firstName = $firstName;
$employee->lastName = $lastName;

array_push($obj, $employee);


?>