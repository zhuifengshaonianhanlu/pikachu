<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "op2_admin_edit.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
}
$PIKA_ROOT_DIR =  "../../../";
include_once $PIKA_ROOT_DIR . 'header.php';
include_once $PIKA_ROOT_DIR.'inc/mysql.inc.php';
include_once $PIKA_ROOT_DIR.'inc/function.php';
include_once $PIKA_ROOT_DIR.'inc/config.inc.php';

$link=connect();
// 判断是否登录，没有登录不能访问
//这里只是验证了登录状态，并没有验证级别，所以存在越权问题。
if(!check_op2_login($link)){
    header("location:op2_login.php");
    exit();
}
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){//用户名密码必填
        $getdata=escape($link, $_POST);//转义
        $query="insert into member(username,pw,sex,phonenum,email,address) values('{$getdata['username']}',md5('{$getdata['password']}'),'{$getdata['sex']}','{$getdata['phonenum']}','{$getdata['email']}','{$getdata['address']}')";
        $result=execute($link, $query);
        if(mysqli_affected_rows($link)==1){//判断是否插入
            header("location:op2_admin.php");
        }else {
            $html.="<p>修改失败,请检查下数据库是不是还是活着的</p>";

        }
    }
}


if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_unset();
    session_destroy();
    setcookie(session_name(),'',time()-3600,'/');
    header("location:op2_login.php");

}



?>





<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="../op.php">Over Permission</a>
                </li>
                <li class="active">op2 admin edit</li>
            </ul><!-- /.breadcrumb -->
            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="想知道当超级boss是什么滋味吗">
                点一下提示~
            </a>

        </div>
        <div class="page-content">
            <div id="edit_main">
                <p class="edit_title">hi,<?php if($_SESSION['op2']['username']){echo $_SESSION['op2']['username'];} ?>,欢迎来到后台管理中心 | <a style="color:bule;" href="op2_admin_edit.php?logout=1">退出登录</a>|<a href="op2_admin.php">回到admin</a></p>

                <form class="from_main" method="post">
                    <label>用户:<br /><input type="text" name="username" placeholder="必填"/></label><br />
                    <label>密码:<br /><input type="password" name="password" placeholder="必填"/></label><br />
                    <label>性别:<br /><input type="text" name="sex" /></label><br />
                    <label>电话:<br /><input type="text" name="phonenum" /></label><br />
                    <label>邮箱:<br /><input type="text" name="email" /></label><br />
                    <label>地址:<br /><input type="text" name="address" /></label><br />
                    <input class="sub" type="submit" name="submit" value="创建" />
                </form>


            </div>


        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->




<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
