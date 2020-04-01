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
         curl_setopt($handle, CURLOPT_POST, 1);
         if ($request)
            curl_setopt($handle, CURLOPT_POSTFIELDS, $request);
         break;
       case "DELETE":
         curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "DELETE");  
         
         default:
         if ($request)
            $url = sprintf("%s?%s", $url, http_build_query($request));
   }

 
   curl_setopt($handle, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));

   curl_setopt($handle, CURLOPT_URL, $url);
   $result = curl_exec($handle);
   if(!$result){die("Failed to connect to the API $url");}
   
   curl_close($handle);
   return $result;
}

function getBaseUrl(){
   return "https://personal-sites.deakin.edu.au/~smoreh/sit780/api/";
}
?>