<?php
include('ApiHandler.php');

$url = getBaseUrl()."create-api.php";

$id = $_POST['id'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];

$postdata = array($id,$firstName,$lastName);

//$postdata = http_build_query($fields);
//$postdata = file_get_contents("php://input");

$output = callAPI("POST", $url, $postdata);

$json = json_decode($output, true);

echo ("<p>$output $json </p>");
?>