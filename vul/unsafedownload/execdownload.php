<?php


$PIKA_ROOT_DIR =  "../../";

include_once $PIKA_ROOT_DIR."inc/function.php";

header("Content-type:text/html;charset=utf-8");
// $file_name="cookie.jpg";
$file_path="download/{$_GET['filename']}";
//用以解决中文不能显示出来的问题
$file_path=iconv("utf-8","gb2312",$file_path);

//首先要判断给定的文件存在与否
if(!file_exists($file_path)){
    skip("你要下载的文件不存在，请重新下载", 'unsafe_down.php');
    return ;
}
$fp=fopen($file_path,"rb");
$file_size=filesize($file_path);
//下载文件需要用到的头
ob_clean();//输出前一定要clean一下，否则图片打不开
Header("Content-type: application/octet-stream");
Header("Accept-Ranges: bytes");
Header("Accept-Length:".$file_size);
Header("Content-Disposition: attachment; filename=".basename($file_path));
$buffer=1024;
$file_count=0;
//向浏览器返回数据

//循环读取文件流,然后返回到浏览器feof确认是否到EOF
while(!feof($fp) && $file_count<$file_size){

    $file_con=fread($fp,$buffer);
    $file_count+=$buffer;

    echo $file_con;
}
fclose($fp);
?>