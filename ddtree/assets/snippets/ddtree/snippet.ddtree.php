<?php
/*
*/

$doc = isset($doc) ? $doc : 0;
$depth = isset($depth) ? $depth: 100;
if(!function_exists("getItems"))
{
function getItems($p=0, $d=100, $l=0)
{
  global $modx,$modx_charset;
  ($modx_charset=='UTF-8') ? $nbsp=chr(0xC2).chr(0xA0) : $nbsp=chr(0xA0);
  $c=$modx->getDocumentChildren($p);
  foreach($c as $k)
  {
   $out.=str_repeat($nbsp,$l*5).$k['pagetitle']."==".$k['id']."||";
   if($l<$d) $out.=getItems($k['id'],$d,$l+1);
  }
  return $out;
}
}
return getItems($doc,$depth);
?>
