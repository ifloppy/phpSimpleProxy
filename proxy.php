<?php
if(isset($_GET['url'])==false){die("请将参数填写完整，详见https://github.com/ifloppy/phpSimpleProxy");}
$token=(string)rand(1000,9999);
$data_down=file_get_contents($_GET['url']);
file_put_contents($token, $data_down);
header('Content-Type: '.mime_content_type($token));
unlink($token);
echo $data_down;
?>