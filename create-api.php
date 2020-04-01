<?php 
include('ApiHandler.php');
$url = "https://personal-sites.deakin.edu.au/~smoreh/sit780/api/create.php";

$handle = curl_init();
curl_setopt($handle,CURLOPT_URL,$url);
curl_setopt($handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, 1);
$output = curl_exec($handle);
curl_close($handle);

$result= json_decode($output, true);

print "<!DOCTYPE html> <html><head><title>cURL</title></head><body>";
print "<table border='1' width='30%'>";


?>