<?php


include_once "inc/config.inc.php";
include_once "inc/mysql.inc.php";


$link=connect();
$html='';
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){
        //转义，防注入
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);
        $query="select * from users where username='$username' and password=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            $_SESSION['pkxss']['username']=$username;
            $_SESSION['pkxss']['password']=sha1(md5($password));
            header("location:xssmanager.php");
        }else{
            $html.="<p>登录失败,请重新登录</p>";
        }

    }

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
    <h1>pikachu Xss 后台</h1>
    <?php echo $html;?>
    <div>
        <form method="post">
            用户:<input name="username" type="text" />
            密码<input name="password" type="password" />
            <input type="submit" name="submit" value="login" />
        </form>
    </div>
</div>
<p>admin/123456</p>
</body>
</html>
