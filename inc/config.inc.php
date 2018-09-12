<?php
//全局session_start
session_start();
//全局居设置时区
date_default_timezone_set('Asia/Shanghai');
//全局设置默认字符
header('Content-type:text/html;charset=utf-8');
//定义数据库连接参数
define('DBHOST', 'localhost');//将localhost修改为数据库服务器的地址
define('DBUSER', 'root');//将root修改为连接mysql的用户名
define('DBPW', 'root');//将root修改为连接mysql的密码，如果改了还是连接不上，请先手动连接下你的数据库，确保数据库服务没问题在说！
define('DBNAME', 'pikachu');//自定义，建议不修改
define('DBPORT', '3306');//将3306修改为mysql的连接端口，默认tcp3306

?>
