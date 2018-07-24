<?php


include_once "inc/config.inc.php";
include_once "inc/mysql.inc.php";

$html='';
if(!@mysqli_connect(DBHOST,DBUSER,DBPW,DBNAME)){
    $html.=
        "<p >
        <a href='pkxss_install.php' style='color:red;'>
        提示:欢迎使用xss后台，点击进行初始化安装!
        </a>
    </p>";
}else{
    header("location:pkxss_login.php");
}



?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>pikachu Xss 后台</title>
    <link rel="stylesheet" type="text/css" href="pkxss.css"/>
</head>
<body>
<div id="title">
    <h1>欢迎使用 pikachu Xss 后台</h1>
    <?php echo $html;?>
</div>
</body>
</html>