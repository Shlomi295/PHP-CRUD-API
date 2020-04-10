<?php 
include('ApiHandler.php');

$q= (isset($_GET['q'])) ? $_GET['q'] : null;

$url = getBaseUrl()."update-api.php?q=".$q;;

//$postdata = file_get_contents("php://input");
$q = $_REQUEST['q'];

$output = callAPI("PUT", $url, $q);
$result = json_decode($output, true);

print "<!DOCTYPE html> <html><head><title>cURL</title>
<link rel = 'stylesheet'
   type = 'text/css'
   href = 'Style.css' /></head><body>";
print  "<form action='create.php' method='post'>";
print "<h2>Update User</h2>";
print "<table><tr>";
print "<td>ID</td><td><input type='text' value=".$result['id']." name='id' id='sid'></td>";
print "</tr><tr>";
print  "<td>Firstname</td><td><input type='text' value=".$result['firstname']." name='firstname' id='fname'></td>";
print "</tr><tr>";
print "<td>Lastname</td><td><input type='text' value=".$result['lastname'] ." name='lastname' id='lname'></td>";
print "</tr></table>";
print "	<input type='submit' name=''><br>";
print "</form>";
print "</body></html>";
?>