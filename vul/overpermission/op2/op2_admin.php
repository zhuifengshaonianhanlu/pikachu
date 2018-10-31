<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "op2_admin.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
}
$PIKA_ROOT_DIR =  "../../../";
include_once $PIKA_ROOT_DIR . 'header.php';
include_once $PIKA_ROOT_DIR.'inc/mysql.inc.php';
include_once $PIKA_ROOT_DIR.'inc/function.php';
include_once $PIKA_ROOT_DIR.'inc/config.inc.php';


$link=connect();
// 判断是否登录，没有登录不能访问
//如果没登录，或者level不等于1，都就干掉
if(!check_op2_login($link) || $_SESSION['op2']['level']!=1){
    header("location:op2_login.php");
    exit();
}

//删除
if(isset($_GET['id'])){
    $id=escape($link, $_GET['id']);//转义
    $query="delete from member where id={$id}";
    execute($link, $query);
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
                <li class="active">op2 admin</li>
            </ul><!-- /.breadcrumb -->
            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="想知道当超级boss是什么滋味吗">
                点一下提示~
            </a>

        </div>
        <div class="page-content">
            <div id="admin_left">
                <p class="left_title">用户管理</p>
                <ul>
                    <li><a href="op2_admin.php">查看用户列表</a></li>
                    <li><a href="op2_admin_edit.php">添加用户</a></li>
                </ul>

            </div>

            <div id="admin_main">
                <p class="admin_title">hi,<?php echo $_SESSION['op2']['username'];?>欢迎来到后台会员管理中心 | <a style="color:bule;" href="op2_admin.php?logout=1">退出登录</a></p>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>用名</td>
                        <td>性别</td>
                        <td>手号</td>
                        <td>邮箱</td>
                        <td>地址</td>
                        <td>操作</td>

                    </tr>
                    <?php
                    $query="select * from member";
                    $result=execute($link, $query);
                    while ($data=mysqli_fetch_assoc($result)){
                        $username=htmlspecialchars($data['username']);
                        $sex=htmlspecialchars($data['sex']);
                        $phonenum=htmlspecialchars($data['phonenum']);
                        $email=htmlspecialchars($data['email']);
                        $address=htmlspecialchars($data['address']);
                        $html=<<<A
    <tr>
        <td>{$username}</td>
        <td>{$sex}</td>
        <td>{$phonenum}</td>
        <td>{$email}</td>
        <td>{$address}</td>
        <td><a href="op2_admin.php?id={$data['id']}">删除</a></td>
    </tr>
A;

                        echo $html;
                    }

                    ?>


                </table>

            </div>


        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->




<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
