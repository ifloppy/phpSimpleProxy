<?php
$token=(string)rand(1000,9999);
$file=fopen($token, "w");
$data_down=file_get_contents($_GET['url']);
fwrite($file, $data_down);
fclose($file);
header('Content-Type: '.mime_content_type($token));
unlink($token);
echo $data_down;
?>
