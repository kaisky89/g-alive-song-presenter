<?php

function curlCall($url)
{
  // Get cURL resource
  $curl = curl_init();
  
  // Set some options - we are passing in a useragent too here
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
  ));
  
  // Send the request & save response to $resp
  $resp = curl_exec($curl);
  
  // Close request to clear up some resources
  curl_close($curl);

  return $resp;
}

function trelloGetCardDescription($id)
{
  $json_resp = curlCall("https://api.trello.com/1/cards/".$id."?fields=desc&key=99dd423e0fd7293fe3ac28fecf7308a2");
  $data_resp = json_decode($json_resp);
  return $data_resp->desc;
}

?>