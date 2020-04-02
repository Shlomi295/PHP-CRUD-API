<?php
include('ApiHandler.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$q=$_REQUEST['q'];

	if ($q==null){
		include "employees.json";
		exit;
	}
	
	$json  = file_get_contents("employees.json"); //read json from URL
	$obj = json_decode($json, true); //convert json string to array

	$found=false;
	$count=0;
	echo "[";
	for ($i=0;$i<sizeof($obj);$i++){
		$current=$obj[$i];
		if ($current['id']==$q){
			if ($count>0) echo ",";
			$count++;
			
			echo '{"id":"'.$current['id'].'","firstname":"'.$current['firstname'].'","lastname":"'.$current['lastname'].'"}';
			$found=true;
		}
	}
	
	if (!$found)
		echo '{"message":"not found"}';
	
	echo "]";



?>
