<?php

$servername ="heroku_f01a4c8c373e40c";
$dBUsername ="b50bdeb4a006e5";
$dBPassword ="92e202b8";
$dBName ="WebDB";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection Failed".mysqli_connect_error())
}
