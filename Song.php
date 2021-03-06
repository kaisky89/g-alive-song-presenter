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
    $returnString  = '<section data-markdown><script type="text/template">';

    $desc = buildSectionsFromLines($this->desc);
    $desc = buildBreakLines($desc);
    $desc = buildSectionsFromParagraph($desc);


    //// Das hier könnte man alles mit einem Markdown Parser realisieren //
    //$desc = buildBreakLines($desc);                                    //
    //$desc = buildBold($desc);                                          //
    ///////////////////////////////////////////////////////////////////////

    $returnString .= $desc;

    $returnString .= "</script></section>";
    return $returnString;
  }
}

function buildBreakLines($text)
{
  $pattern = "=\n=";
  $replace = "  \n";

  $returnString = preg_replace($pattern, $replace, $text);
  return $returnString;
}

function buildSectionsFromLines($text)
{
  $pattern = "=[\n]*\-\-[\-]+[\n]*=";
  $replace = '</script></section><section data-markdown><script type="text/template">';

  $returnString = preg_replace($pattern, $replace, $text);
  return $returnString;
}

function buildSectionsFromParagraph($text)
{
  $pattern = "=\n[\n]+=";
  $replace = '</script></section><section data-markdown><script type="text/template">';

  $returnString = preg_replace($pattern, $replace, $text);
  return $returnString;
}

function buildHarmonics($text)
{
  $pattern = "==";
  $replace = "</span>$1<span>";

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
