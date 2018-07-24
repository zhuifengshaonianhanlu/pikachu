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

//判断是是否登录，如果已经登录，点击时，直接进入会员中心
if(check_op_login($link)){
    header("location:op1_mem.php");
}


$html='';
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);//转义，防注入
        $query="select * from member where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            $_SESSION['op']['username']=$username;
            $_SESSION['op']['password']=sha1(md5($password));
            header("location:op1_mem.php");
        }else{
            $html.="<p>登录失败,请重新登录</p>";
        }

    }

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
                <li class="active">op1 login</li>
            </ul><!-- /.breadcrumb -->
            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="lucy/123456,lili/123456,kobe/123456">
                点一下提示~
            </a>

        </div>
        <div class="page-content">

            <div class="op_form">
                <div class="op_form_main">
                    <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        Please Enter Your Information
                    </h4>

                    <form method="post">
                        <!--            <fieldset>-->
                        <label>
														<span>
															<input type="text" name="username" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                        </label>
                        </br>

                        <label>
														<span>
															<input type="password" name="password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                        </label>


                        <div class="space"></div>

                        <div class="clearfix">
                            <label><input class="submit" name="submit" type="submit" value="Login" /></label>
                        </div>

                    </form>
            <?php echo $html;?>
                </div><!-- /.widget-main -->

            </div><!-- /.widget-body -->

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->






<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
