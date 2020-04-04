<?php
include('ApiHandler.php');
$url = getBaseUrl()."create-api.php";

$postdata = file_get_contents("php://input");
$id = $_REQUEST["id"];
$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];

$arrayRequest = array("id"=>$id,"firstname"=>$firstname,"lastname"=>$lastname);


$json = json_encode($arrayRequest,true);


$output = callAPI("POST", $url, $json);


var_dump($output);

echo ("<p>$output</p>");
?>