<?php

session_start();

$char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$gen = substr(str_shuffle($char),0,6);

$_SESSION['captcha'] = $gen;

$image = imagecreate(100, 30);

$bg = imagecolorallocate($image, 66, 194, 245);

$tx = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 9, 25, 5, $gen, $tx);

header("Content-Type:image/png");

imagepng($image);

imagedestroy($image);

?>