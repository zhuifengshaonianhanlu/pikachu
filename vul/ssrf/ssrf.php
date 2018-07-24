<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "ssrf.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
}

$PIKA_ROOT_DIR =  "../../";
include_once $PIKA_ROOT_DIR.'header.php';






?>


<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="ssrf.php"></a>
                </li>
                <li class="active">概述</li>
            </ul>
        </div>
        <div class="page-content">

         <b>SSRF(Server-Side Request Forgery:服务器端请求伪造)</b>
         <p>其形成的原因大都是由于服务端<b>提供了从其他服务器应用获取数据的功能</b>,但又没有对目标地址做严格过滤与限制</p>
            导致攻击者可以传入任意的地址来让后端服务器对其发起请求,并返回对该目标地址请求的数据<br>
            <br>
            数据流:攻击者----->服务器---->目标地址<br>
            <br>
            根据后台使用的函数的不同,对应的影响和利用方法又有不一样
            <pre style="width: 500px;">
PHP中下面函数的使用不当会导致SSRF:
file_get_contents()
fsockopen()
curl_exec()
            </pre><br>
            如果一定要通过后台服务器远程去对用户指定("或者预埋在前端的请求")的地址进行资源请求,<b>则请做好目标地址的过滤</b>。
<br>
            <br>

            你可以根据"SSRF"里面的项目来搞懂问题的原因

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->



<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
