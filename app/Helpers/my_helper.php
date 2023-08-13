<?php

use Config\Database;

function genPasswd($date)
{
  $str = explode('-', $date);
  return $str[2] . $str[1] . $str[0];
}

function count_user()
{
  return Database::connect()->table('users')->get()->getNumRows();
}

function count_student()
{
  return Database::connect()->table('tbl_siswa')->get()->getNumRows();
}

function count_dudi()
{
  return Database::connect()->table('tbl_dudi')->get()->getNumRows();
}
