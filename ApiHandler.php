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
         curl_setopt($handle, CURLOPT_POSTFIELDS, $request);

         // default:
         // if ($request)
         //     $handle = sprintf("%s?%s", $url, http_build_query($request));
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

function getBaseUrl()
{
   return "http://localhost/api/";
}


function json_response($data=null, $httpStatus=200)
{
    header_remove();

    header("Content-Type: application/json");

    header('Status: ' . $httpStatus);

    echo json_encode($data);
    
    exit();
}

function saveToFile($data, $saveTo)
{
   $file = fopen($saveTo,'w');
   fwrite($file, $data);
   fclose($file);

}


?>