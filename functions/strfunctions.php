<?php
function custom_echo($str, $length)
{
  if(strlen($str)<=$length)
  {
    echo $str;
  }
  else
  {
    $newstr=substr($str,0,$length) . '...';
    echo $newstr;
  }
}