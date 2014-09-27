<?php

include_once 'Trello.php';

/**
* 
*/
class Song
{
  public $id;
  public $desc;

  function __construct($id)
  {
    $this->id = $id;
    $this->init();
  }

  function init()
  {
    $this->desc = trelloGetCardDescription($this->id);
  }

  public function inHTML()
  {
    $returnString  = "<section><p>";
    
    $desc = buildSections($this->desc);

    // Das hier könnte man alles mit einem Markdown Parser realisieren //
    $desc = buildParagraphs($desc);                                    //
    $desc = buildBreakLines($desc);                                    //
    $desc = buildBold($desc);                                          //
    /////////////////////////////////////////////////////////////////////
    
    $returnString .= $desc;

    $returnString .= "</p></section>";
    return $returnString;
  }
}

function buildBreakLines($text)
{
  $pattern = "=\n=";
  $replace = "<br />";

  $returnString = preg_replace($pattern, $replace, $text);
  return $returnString;
}

function buildSections($text)
{
  $pattern = "=\-\-[\-]+=";
  $replace = "</p></section><section><p>";

  $returnString = preg_replace($pattern, $replace, $text);
  return $returnString;
}

function buildParagraphs($text)
{
  $pattern = "=\n[\n]+=";
  $replace = "</p><p>";
  
  $returnString = preg_replace($pattern, $replace, $text);
  return $returnString;
}

function buildBold($text)
{
  $pattern = "=\*\*([a-zA-Z 0-9.]+)\*\*=";
  $replace = "<b>$1</b>";
  
  $returnString = preg_replace($pattern, $replace, $text);
  return $returnString;
}

?>