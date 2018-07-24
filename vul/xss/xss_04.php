<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */

$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "xss_04.php"){
    $ACTIVE = array('','','','','','','','active open','','','','','','','','','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

}



$PIKA_ROOT_DIR =  "../../";
include_once $PIKA_ROOT_DIR.'header.php';


$jsvar='';
$html='';


//这里讲输入动态的生成到了js中,形成xss
//javascript里面是不会对tag和字符实体进行解释的,所以需要进行js转义

//讲这个例子主要是为了让你明白,输出点在js中的xss问题,应该怎么修?
//这里如果进行html的实体编码,虽然可以解决XSS的问题,但是实体编码后的内容,在JS里面不会进行翻译,这样会导致前端的功能无法使用。
//所以在JS的输出点应该使用\对特殊字符进行转义


if(isset($_GET['submit']) && $_GET['message'] !=null){
    $jsvar=$_GET['message'];
//    $jsvar=htmlspecialchars($_GET['message'],ENT_QUOTES);
    if($jsvar == 'tmac'){
        $html.="<img src='{$PIKA_ROOT_DIR}assets/images/nbaplayer/tmac.jpeg' />";
    }
}


?>

<div class="main-content" xmlns="http://www.w3.org/1999/html">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="xss.php">xss</a>
                </li>
                <li class="active">xss之js输出</li>
            </ul><!-- /.breadcrumb -->

            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="输入被动态的生成到了javascript中,如何是好。输入tmac试试-_-">
                点一下提示~
            </a>


        </div>
        <div class="page-content">

            <div id="xssr_main">
                <p class="xssr_title">which NBA player do you like?</p>
                <form method="get">
                    <input class="xssr_in" type="text" name="message" />

                    <input class="xssr_submit" type="submit" name="submit" value="submit" />
                </form>
                </br>
               <p id="fromjs"></p>
                <?php echo $html;?>
            </div>

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->


<script>
    $ms='<?php echo $jsvar;?>';
    if($ms.length != 0){
        if($ms == 'tmac'){
            $('#fromjs').text('tmac确实厉害,看那小眼神..')
        }else {
//            alert($ms);
            $('#fromjs').text('无论如何不要放弃心中所爱..')
        }

    }


</script>


<?php
include_once $PIKA_ROOT_DIR.'footer.php';

?>
