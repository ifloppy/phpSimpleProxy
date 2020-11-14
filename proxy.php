<?php
if(isset($_GET['url'])==false){die("请将参数填写完整，详见https://github.com/ifloppy/phpSimpleProxy");}
$token=(string)rand(1000,9999);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $_GET['url']);
curl_setopt ($ch,  CURLOPT_HEADER,false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION ,1); 
if(isset($_SERVER['HTTP_REFERER'])==true){curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_REFERER']);}
$data_down = curl_exec($ch);
if($data_down  === FALSE){die("代理时发生错误");}
curl_close($ch);
file_put_contents($token, $data_down);
header('Content-Type: '.mime_content_type($token));
unlink($token);
echo $data_down;
?>
