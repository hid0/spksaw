<?php

function genPasswd($date)
{
  $str = explode('-', $date);
  return $str[2] . $str[1] . $str[0];
}
