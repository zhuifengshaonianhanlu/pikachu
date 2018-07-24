<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "op1_login.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
}
$PIKA_ROOT_DIR =  "../../../";
include_once $PIKA_ROOT_DIR . 'header.php';
include_once $PIKA_ROOT_DIR.'inc/mysql.inc.php';
include_once $PIKA_ROOT_DIR.'inc/function.php';
include_once $PIKA_ROOT_DIR.'inc/config.inc.php';

$link=connect();
// 判断是否登录，没有登录不能访问
if(!check_op_login($link)){
    header("location:op1_login.php");
}
$html='';
if(isset($_GET['submit']) && $_GET['username']!=null){
    //没有使用session来校验,而是使用的传进来的值，权限校验出现问题,这里应该跟登录态关系进行绑定
    $username=escape($link, $_GET['username']);
    $query="select * from member where username='$username'";
    $result=execute($link, $query);
    if(mysqli_num_rows($result)==1){
        $data=mysqli_fetch_assoc($result);
        $uname=$data['username'];
        $sex=$data['sex'];
        $phonenum=$data['phonenum'];
        $add=$data['address'];
        $email=$data['email'];

        $html.=<<<A
<div id="per_info">
   <h1 class="per_title">hello,{$uname},你的具体信息如下：</h1>
   <p class="per_name">姓名:{$uname}</p>
   <p class="per_sex">性别:{$sex}</p>
   <p class="per_phone">手机:{$phonenum}</p>    
   <p class="per_add">住址:{$add}</p> 
   <p class="per_email">邮箱:{$email}</p> 
</div>
A;
    }
}


if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_unset();
    session_destroy();
    setcookie(session_name(),'',time()-3600,'/');
    header("location:op1_login.php");

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
                <li class="active">op1 member</li>
            </ul><!-- /.breadcrumb -->
            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="这里可以查别人的信息吗?">
                点一下提示~
            </a>

        </div>
        <div class="page-content">
            <div id="mem_main">
                <p class="mem_title">欢迎来到个人信息中心  | <a style="color:bule;" href="op1_mem.php?logout=1">退出登录</a></p>
                <form class="msg1" method="get">
                    <input type="hidden" name="username" value="<?php echo $_SESSION['op']['username']; ?>" />
                    <input type="submit" name="submit" value="点击查看个人信息" />
                </form>
                <?php echo $html;?>

            </div>


        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->






<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
