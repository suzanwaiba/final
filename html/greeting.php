<?php
date_default_timezone_set('Asia/Kathmandu');
$hour = date('G');
$date = date('l, F j');

if ($hour >= 0 && $hour < 12) {
  $greeting = "Good morning, ";
} elseif ($hour >= 12 && $hour < 17) {
  $greeting = "Good afternoon, ";
} else {
  $greeting = "Good evening, ";
}
?>
