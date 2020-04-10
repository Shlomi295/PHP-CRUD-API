<?php
include('ApiHandler.php');

$url = getBaseUrl()."delete-api.php";

$postdata = file_get_contents("php://input");
$q = $_REQUEST['q'];

$output = callAPI("DELETE", $url, $q);
$result = json_decode($output, true);

print "<!DOCTYPE html> <html><head><title>cURL</title>
<link rel = 'stylesheet'
   type = 'text/css'
   href = 'Style.css' /></head><body>";
print"<h3>The User was removed successfully</h3>";
print "<table border='1' width='30%'>";

if ($result!=null)
{
	print "<tr style='background-color:#aaaaaa'><td>Action</td><td>ID</td><td>First Name</td><td>Last Name</td></tr>";
	for ($i=0;$i<count($result);$i++){
        $vals= $result[$i];
        print"<tr bgcolor='#006633'><td style='background:#CCFFCC;color:#000700'><a class='delete' href='delete.php?q=$i' id='$i'>Delete</a><a class='update' href='update.php?q=$i' id='$i'> Update</a></td>";
		print "<td width='50' style='background:#CCFFCC;color:#000700'>" . $vals["id"] . "</td>";
		print "<td width='150' style='background:#CCFFCC;color:#000700'>";
		print $vals["firstname"] . "</td><td width='150' style='background:#CCFFCC;color:#000700'>";
		print $vals["lastname"] . "</td></tr>";
	}
	print "</table>";
	print"<a href='form.html'>Add user</a> </br>";
	print"<a href='read.php'>Show all users</a></br>";
	print"<a href='create.php'>Edit users</a></br>";
	print "</body></html>";
} else {
	print "<tr style='background-color:#aaaaaa'><td>Message</td></tr>";
	for ($i=0;$i<count($result);$i++){
		$vals= $result[$i];
		print "<tr><td>" . $vals["message"] . "</td></tr>";
	}
    print "</table>";
	print"<a href='form.html'>Add user</a> </br>";
	print"<a href='read.php'>Show all users</a></br>";
	print "</body></html>";
   
}
?>