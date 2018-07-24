<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$PIKA_ROOT_DIR =  "../../../";

include_once $PIKA_ROOT_DIR.'inc/config.inc.php';
include_once $PIKA_ROOT_DIR.'inc/mysql.inc.php';
include_once $PIKA_ROOT_DIR.'inc/function.php';


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
if ($SELF_PAGE = "admin.php"){
    $ACTIVE = array('','','','','','','','active open','','','','','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

}
include_once $PIKA_ROOT_DIR.'header.php';


$link=connect();
$is_login_id=check_xss_login($link);
if(!$is_login_id){
    header("location:admin_login.php");
}


$state = '你已经成功登录留言板后台,<a href="admin.php?logout=1">退出登陆</a>';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id=escape($link, $_GET['id']);
    $query="delete from xssblind where id=$id";
    execute($link, $query);
}


if(isset($_GET['logout']) && $_GET['logout'] == '1'){
    setcookie('ant[uname]','');
    setcookie('ant[pw]','');
    header("location:admin_login.php");

}



?>



<div class="main-content" xmlns="http://www.w3.org/1999/html">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="../xss.php">xss</a>
                </li>
                <li class="active">xss盲打</li>

            </ul><!-- /.breadcrumb -->
            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="被弹了吗?">
                点一下提示~
            </a>

        </div>
        <div class="page-content">
            <div id="list_blid_con">
                <?php echo $state;?>
                <h2>用户反馈的意见列表：</h2>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>编号</td>
                        <td>时间</td>
                        <td>内容</td>
                        <td>姓名</td>
                        <td>操作</td>
                    </tr>
                    <?php
                    $query="select * from xssblind";
                    $result=mysqli_query($link, $query);
                    while($data=mysqli_fetch_assoc($result)){
                        $html=<<<A
    <tr>
        <td>{$data['id']}</td>
        <td>{$data['time']}</td>
        <td>{$data['content']}</td>
        <td>{$data['name']}</td>
        <td><a href="admin.php?id={$data['id']}">删除</a></td>
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
include_once $PIKA_ROOT_DIR.'footer.php';


?>
