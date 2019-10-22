<?php


date_default_timezone_set("Africa/Nairobi");

$currentTime=time();
$date=strftime("%B-%d-%m %H:%M:%S",$currentTime);

echo $date;

?>