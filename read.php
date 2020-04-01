<?php

include('ApiHandler.php');

$q=$_GET['q'];
if ($q!=null)
	$url = getBaseUrl()."read-api.php?q=".$q;
else
	$url = getBaseUrl()."read-api.php";

$output = callAPI("GET", $url, false);


$result= json_decode($output, true);

print "<!DOCTYPE html> <html><head><title>cURL</title></head><body>";
print "<table border='1' width='30%'>";

if ($result[0]['message']==null)
{
	print "<tr style='background-color:#aaaaaa'><td>ID</td><td>First Name</td><td>Last Name</td></tr>";
	for ($i=0; $i< count($result); $i++){
		$vals= $result[$i];
		print "<tr><td>" . $vals["id"] . "</td><td>";
		print $vals["firstname"] . "</td><td>";
		print $vals["lastname"] . "</td></tr>";
		
	}
	print "</table></body></html>";
} else {
	print "<tr style='background-color:#aaaaaa'><td>Message</td></tr>";
	for ($i=0;$i<count($result);$i++){
		$vals= $result[$i];
		print "<tr><td>" . $vals["message"] . "</td></tr>";
	}
	print "</table></body></html>";
}

?>
