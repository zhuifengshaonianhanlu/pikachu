<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$PIKA_ROOT_DIR =  "../../../";

include_once $PIKA_ROOT_DIR.'inc/config.inc.php';
include_once $PIKA_ROOT_DIR.'inc/mysql.inc.php';


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
if ($SELF_PAGE = "post_login.php"){
    $ACTIVE = array('','','','','','','','active open','','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

}
include_once $PIKA_ROOT_DIR.'header.php';



$link=connect();

$html = "<p>please input username and password!</p>";

if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){

        //这里没有使用预编译方式,而是使用的拼接SQL,所以需要手动转义防止SQL注入
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);


        $query="select * from users where username='$username' and password=md5('$password')";

        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);

            //登录时，生成cookie,1个小时有效期，供其他页面判断
            setcookie('ant[uname]',$_POST['username'],time()+3600);
            setcookie('ant[pw]',sha1(md5($_POST['password'])),time()+3600);


            header("location:xss_reflected_post.php");
//            echo '"<script>windows.location.href="xss_reflected_post.php"</script>';

        }else{
            $html ="<p>username or password error!</p>";
        }

    }else{
        $html ="<p>please input username and password!</p>";
    }
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
                <li class="active">反射性xss(post)</li>

            </ul><!-- /.breadcrumb -->
            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="为了能够让你练习xss获取cookie,我们还是登陆一下,账号admin/123456">
                点一下提示~
            </a>

        </div>
        <div class="page-content">


            <div class="xss_form">
                <div class="xss_form_main">
                    <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        Please Enter Your Information
                    </h4>

                    <form method="post" action="post_login.php">
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
                            <!--                    <button type="button" name="submit">-->
                            <!--                        <i class="ace-icon fa fa-key"></i>-->
                            <!--                        <span class="bigger-110">Login</span>-->
                            <!--                    </button>-->
                        </div>

                    </form>
                    <?php echo $html;?>


                </div><!-- /.widget-main -->

            </div><!-- /.widget-body -->



        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->


<?php
include_once $PIKA_ROOT_DIR.'footer.php';


?>
