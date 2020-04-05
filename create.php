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
$result = json_decode($output, true);

print "<!DOCTYPE html> <html><head><title>cURL</title></head><body>";
print"<h3>The User was added successfully</h3>";
print"<a href='form.html'>Add user</a>";

print "<table border='1' align='center' width='30%'>";

if ($result!=null)
{
	print "<tr style='background-color:#aaaaaa'><td>Action</td><td>ID</td><td>First Name</td><td>Last Name</td></tr>";
	for ($i=0;$i<count($result);$i++){
        $vals= $result[$i];
        print"<tr><td><a href='delete.php?q=$i' id='$i'>Delete</a></td><td>";
		print  $vals["id"] . "</td><td>";
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
    print "</table>
    </body></html>";
}
?>