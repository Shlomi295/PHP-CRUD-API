<?php
//api handler to assign curl options to relevant call
function callAPI($method, $url, $request){
   $handle = curl_init();
   switch ($method){
      
      case "GET":
         curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');	 					
         curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);	
         break;

      case "PUT":
         curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "POST");
         curl_setopt($handle, CURLOPT_POSTFIELDS, $request);			 					
         break;
      
      case "POST":
         curl_setopt($handle, CURLOPT_POST, 1);
         if ($request)
         curl_setopt($handle, CURLOPT_POSTFIELDS, $request);
         break;

       case "DELETE": 
         curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "GET"); 
         curl_setopt($handle, CURLOPT_POSTFIELDS, $request);

   }

   curl_setopt($handle, CURLOPT_HTTPHEADER, [
      "Content-Type: application/json; charset=UTF-8",
      "Access-Control-Allow-Origin: *"
      ]);

   curl_setopt($handle, CURLOPT_URL, $url);
   curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);

   $response = curl_exec($handle);
        $errno = curl_errno($handle);
        $err = curl_error($handle);

  curl_close($handle);

      if ($errno) {
         return "cURL Error #:" . $err;} 
      else {

   return $response;
}


}

//get base URL, don't forget to swap this between local and server
function getBaseUrl()
{
   return "https://personal-sites.deakin.edu.au/~smoreh/sit780/api/";
}


function json_response($data=null, $httpStatus=200)
{
    header_remove();

    header("Content-Type: application/json");

    header('Status: ' . $httpStatus);

    echo (json_encode($data));
    exit;
    
}

//save to json file
function saveToFile($data, $saveTo)
{
   $file = fopen($saveTo,'w');
   fwrite($file, $data);
   fclose($file);
}


?>