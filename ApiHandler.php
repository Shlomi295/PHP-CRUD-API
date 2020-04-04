<?php
function callAPI($method, $url, $request){
   $handle = curl_init();
   switch ($method){
      
      case "GET":
         curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');	 					
         curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);	
         break;

      case "PUT":
         curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($request)
            curl_setopt($handle, CURLOPT_POSTFIELDS, $request);			 					
         break;
      
      case "POST":
         // curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "POST");
         curl_setopt($handle, CURLOPT_POST, 1);
         if ($request)
         curl_setopt($handle, CURLOPT_POSTFIELDS, $request);
         break;

       case "DELETE":
         curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "DELETE");  

         default:
         if ($request)
             $handle = sprintf("%s?%s", $url, http_build_query($request));
   }

   curl_setopt($handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($handle, CURLOPT_HTTPHEADER, [
      "Content-Type: application/json; charset=UTF-8",
      "Access-Control-Allow-Origin: *"
      ]);

      $agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; .NET CLR 1.1.4322)";

   curl_setopt($handle, CURLOPT_USERAGENT, $agent);
   curl_setopt($handle, CURLOPT_URL, $url);
   curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($handle, CURLOPT_FOLLOWLOCATION, 1);

   $response = curl_exec($handle);
        $errno = curl_errno($handle);
        $err = curl_error($handle);

  curl_close($handle);

  if ($errno) {
   return "cURL Error #:" . $err;
} else {
   return $response;
}


}

function getBaseUrl()
{
   return "http://localhost/api/";
}

class Employee{
   var $id;
   var $firstName;
   var $lastName;
}


?>