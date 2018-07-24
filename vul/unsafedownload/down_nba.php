<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "unsafedownload.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
}

$PIKA_ROOT_DIR =  "../../";
include_once $PIKA_ROOT_DIR . 'header.php';





?>


<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="unsafedownload.php">unsafe filedownload</a>
                </li>
                <li class="active">不安全的文件下载</li>
            </ul><!-- /.breadcrumb -->

            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="我就说一句,1996年的状元是艾弗森,但是下面这个列表里面kobe排在第一位,你说奇怪不奇怪吧。">
                点一下提示~
            </a>
        </div>
        <div class="page-content">

            <div id="usd_main" style="width: 600px;">
                <h2 class="title" >NBA 1996年   黄金一代</h2>
                <p class="mes" style="color: #1d6fa6;">Notice:点击球员名字即可下载头像图片！</p>
                <div class="png" style="float: left">
                    <img src="download/kb.png" /><br />
                    <a href="execdownload.php?filename=kb.png" >科比.布莱恩特</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/ai.png" /><br />
                    <a href="execdownload.php?filename=ai.png" >阿伦.艾弗森</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/ns.png" /><br />
                    <a href="execdownload.php?filename=ns.png" >史蒂夫.纳什</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/rayal.png" /><br />
                    <a href="execdownload.php?filename=rayal.png" >雷.阿伦</a>
                </div>


                <div class="png" style="float: left">
                    <img src="download/mbl.png" /><br />
                    <a href="execdownload.php?filename=mbl.png" >斯蒂芬.马布里</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/camby.png" /><br />
                    <a href="execdownload.php?filename=camby.png" >马库斯.坎比</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/pj.png" /><br />
                    <a href="execdownload.php?filename=pj.png" >斯托贾科维奇</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/bigben.png" /><br />
                    <a href="execdownload.php?filename=bigben.png" >本.华莱士</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/sks.png" /><br />
                    <a href="execdownload.php?filename=sks.png" >伊尔戈斯卡斯</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/oldfish.png" /><br />
                    <a href="execdownload.php?filename=oldfish.png" >德里克.费舍尔</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/smallane.png" /><br />
                    <a href="execdownload.php?filename=smallane.png" >杰梅因.奥尼尔</a>
                </div>

                <div class="png" style="float: left">
                    <img src="download/lmx.png" /><br />
                    <a href="execdownload.php?filename=lmx.png" >阿卜杜.拉希姆</a>
                </div>
            </div>


        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->





<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
