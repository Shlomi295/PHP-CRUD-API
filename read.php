<?php

$q= (isset($_GET['q'])) ? $_GET['q'] : null;

if ($q!=null)
$url = "http://localhost/api/read-api.php/read-api.php?q=".$q;
else
	$url = "http://localhost/api/read-api.php";



	$handle = curl_init();
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($handle);
	curl_close($handle);
$result= json_decode($output, true);

print "<!DOCTYPE html> <html><head><title>cURL</title></head><body>";
print "<table border='1' width='30%'>";

$key = array_search ('not found', $result);

$index = "message";
if (!$key)
{
	print "<tr style='background-color:#aaaaaa'><td>ID</td><td>First Name</td><td>Last Name</td></tr>";
	for ($i=0;$i<count($result);$i++){
		$vals= $result[$i];
		print "<tr><td>" . $vals["id"] . "</td><td>";
		print $vals["firstname"] . "</td><td>";
		print $vals["lastname"] . "</td></tr>";
	}
	print "</table></body></html>";
} 
else {
	
	print "<tr style='background-color:#aaaaaa'><td>Message</td></tr>";
	for ($i=0;$i<count($result);$i++){
		$vals= $result[$i];
		print "<tr><td>" . $vals["message"] . "</td></tr>";
	}
	print "</table></body></html>";
}


?>
