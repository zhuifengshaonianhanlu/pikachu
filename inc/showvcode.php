<?php 
session_start();
include_once 'function.php';
//$_SESSION['vcode']=vcode(100,40,30,4);
$_SESSION['vcode']=vcodex();
//验证码绕过 on server 这里其实还是有一个问题,就是服务端将验证码字符串以明文COOKIE的方式给了前端,那验证码还有什么鸟意义。。。
setcookie('bf[vcode]',$_SESSION['vcode']);
?>
