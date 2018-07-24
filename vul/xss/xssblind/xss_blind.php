<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$PIKA_ROOT_DIR =  "../../../";

include_once $PIKA_ROOT_DIR.'inc/config.inc.php';
include_once $PIKA_ROOT_DIR.'inc/mysql.inc.php';


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
if ($SELF_PAGE = "xss_blind.php"){
    $ACTIVE = array('','','','','','','','active open','','','','','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

}

include_once $PIKA_ROOT_DIR.'header.php';


$link=connect();
$html='';
if(array_key_exists("content",$_POST) && $_POST['content']!=null){
    $content=escape($link, $_POST['content']);
    $name=escape($link, $_POST['name']);
    $time=$time=date('Y-m-d g:i:s');
    $query="insert into xssblind(time,content,name) values('$time','$content','$name')";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)==1){
        $html.="<p>谢谢参与，阁下的看法我们已经收到!</p>";
    }else {
        $html.="<p>ooo.提交出现异常，请重新提交</p>";
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
                <li class="active">xss盲打</li>

            </ul><!-- /.breadcrumb -->
            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="登录后台,看会发生啥?后台登录地址是/xssblind/admin_login.php">
                点一下提示~
            </a>

        </div>
        <div class="page-content">
            <div id="xss_blind">
                <p class="blindxss_tip">请在下面输入你对"锅盖头"这种发型的看法：</p>
                <p class="blindxss_tip">我们将会随机抽出一名送出麻港一日游</p>
                <form method="post">
                    <textarea class="content" name="content"></textarea><br />
                    <label>你的大名：</label><br />
                    <input class="name" type="text" name="name"/><br />
                    <input type="submit" name="submit" value="提交" />
                </form>
                <?php echo $html;?>
            </div>
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->


<?php
include_once $PIKA_ROOT_DIR.'footer.php';


?>
