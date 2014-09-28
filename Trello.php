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

function trelloGetPlaylists($boardId)
{
  $json_resp = curlCall("https://api.trello.com/1/boards/".$boardId."?lists=open&list_fields=name&fields=name,desc&key=99dd423e0fd7293fe3ac28fecf7308a2");
  $data_resp = json_decode($json_resp);

  $lists = $data_resp->lists;
  $returnLists;
  foreach ($lists as $list) {
    $returnLists[$list->id] = $list->name;
  }

  return $returnLists;
}

function trelloGetPlaylist($playlistId)
{
  $json_resp = curlCall("https://api.trello.com/1/lists/".$playlistId."?cards=open&card_fields=name,shortLink&key=99dd423e0fd7293fe3ac28fecf7308a2");
  $data_resp = json_decode($json_resp);
  $songs = $data_resp->cards;
  $returnSongs;
  foreach ($songs as $song) {
    $returnSongs[$song->shortLink] = $song->name;
  }
  //return $songs;
  return $returnSongs;
}

function trelloGetPlaylistName($playlistId)
{
  $json_resp = curlCall("https://api.trello.com/1/lists/".$playlistId."?key=99dd423e0fd7293fe3ac28fecf7308a2");
  $data_resp = json_decode($json_resp);
  $name = $data_resp->name;
  return $name;
}

?>