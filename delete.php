<?php
include('ApiHandler.php');

$url = getBaseUrl()."delete-api.php";

$postdata = file_get_contents("php://input");
$q = $_REQUEST['q'];

$output = callAPI("DELETE", $url, $q);
$result = json_decode($output, true);

print "<!DOCTYPE html> <html><head><title>cURL</title></head><body>";
print"<h3>The User was removed successfully</h3>";
print"<a href='form.html'>Add user</a> </br>";
print"<a href='read.php'>Show all users</a></br>";
print "<table border='1' align='center' width='30%'>";

if ($result!=null)
{
	print "<tr style='background-color:#aaaaaa'><td>Action</td><td>ID</td><td>First Name</td><td>Last Name</td></tr>";
	for ($i=0;$i<count($result);$i++){
        $vals= $result[$i];
        print"<tr><td><a class='button' href='delete.php?q=$i' id='$i'>Delete</a><a href='update.php?q=$i' id='$i'> Update</a><td>";
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
    print "</table>";
    print "<ul>
    <li><a href='form.html'>Add User</a></li>
    </ul>";

    echo("<a href='form.html'>Add User</a>");

    print"</body></html>";
   
}
?>