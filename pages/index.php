<?php


$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';

$url = $protocol.'://'.$_SERVER['HTTP_HOST']. '/icecoder/';
header( "location: " . $url );


exit;