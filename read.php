<?php
include('ApiHandler.php');

$q= (isset($_GET['q'])) ? $_GET['q'] : null;

if ($q!=null)
	$url = getBaseUrl()."read-api.php?q=".$q;
else
	$url = getBaseUrl()."read-api.php";


$output = callAPI("GET", $url, null); // call api handler
$result= json_decode($output, true);

print "<!DOCTYPE html> <html><head><title>cURL</title></head><body>";
print "<table border='0' bgcolor='#339933' cellpadding='5' cellspacing='1'>";

//This is working on local but not on public server for some reason
$key = array_key_first($result[0]);

if ($key != "message")
{
	print "<tr style='background-color:#aaaaaa'><td>ID</td><td>First Name</td><td>Last Name</td></tr>";
	for ($i=0;$i<count($result);$i++){
		$vals= $result[$i];
		print "<tr bgcolor='#006633'><td width='50' style='color:#ffff99'>" . $vals["id"] . "</td><td width='150' style='background:#CCFFCC;color:#000700'>";
		print $vals["firstname"] . "</td><td width='150' style='background:#CCFFCC;color:#000700'>";
		print $vals["lastname"] . "</td></tr>";
	}
	print "</table>";
	print"<a href='form.html'>Add user</a> </br>";
	print"<a href='read.php'>Show all users</a></br>";
	print "</body></html>";
} 
else {
	
	print "<tr style='background-color:#aaaaaa'><td>Message</td></tr>";
	for ($i=0;$i<count($result);$i++){
		$vals= $result[$i];
		print "<tr><td>" . $vals["message"] . "</td></tr>";
	}

	

	print "</table>";
	print"<a href='form.html'>Add user</a> </br>";
	print"<a href='read.php'>Show all users</a></br>";
	print"</body></html>";
}


?>
