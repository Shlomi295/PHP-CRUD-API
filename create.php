<?php 

$url = "https://personal-sites.deakin.edu.au/~smoreh/sit780/api/create.php";

$handle = curl_init();
curl_setopt($handle,CURLOPT_URL,$url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true)
?>