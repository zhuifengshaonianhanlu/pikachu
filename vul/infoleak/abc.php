<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "abc.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
}

$PIKA_ROOT_DIR =  "../../";
include_once $PIKA_ROOT_DIR.'header.php';


if(isset($_GET['logout']) && $_GET['logout'] == '1'){
    setcookie('abc[uname]','');
    setcookie('abc[pw]','');
    header("location:findabc.php");

}
?>


<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="infoleak.php">敏感信息泄露</a>
                </li>
                <li class="active">abc</li>
            </ul>


        </div>
        <div class="page-content">
            <a href="abc.php?logout=1">退出登陆</a>
            <br />
            <br />

            <p>那一天我二十一岁，在我一生的黄金时代</p>

            <p>我有好多奢望。我想爱，想吃，还想在一瞬间变成天上半明半暗的云</p>

            <p>后来我才知道，生活就是个缓慢受锤的过程，人一天天老下去，奢望也一天天消失，最后变得像挨了锤的牛一样</p>

            <p>可是我过二十一岁生日时没有预见到这一点。我觉得自己会永远生猛下去，什么也锤不了我</p>
                                                            -----王小波《黄金时代》

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->



<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
