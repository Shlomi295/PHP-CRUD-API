<?php
include('ApiHandler.php');

$url = getBaseUrl()."create-api.php";

$postdata = file_get_contents("php://input");
$output = callAPI("POST", $url, $postdata);
$json = json_decode($output, true);

echo ("<p>$output</p>");
?>