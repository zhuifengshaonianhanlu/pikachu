<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "xss.php"){
    $ACTIVE = array('','','','','','','','active open','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

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
                    <a href="#">xss</a>
                </li>
                <li class="active">xss概述</li>
            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">


            <div id="vul_info">
                <dl>
                    <dt class="vul_title">XSS（跨站脚本）概述</dt>
                    <dd class="vul_detail">
                        Cross-Site Scripting 简称为“CSS”，为避免与前端叠成样式表的缩写"CSS"冲突，故又称XSS。一般XSS可以分为如下几种常见类型：<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;1.反射性XSS;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;2.存储型XSS;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;3.DOM型XSS;<br />
                    </dd>
                    <dd class="vul_detail">
                        <br />
                        XSS漏洞一直被评估为web漏洞中危害较大的漏洞，在OWASP TOP10的排名中一直属于前三的江湖地位。<br/>
                        XSS是一种发生在前端浏览器端的漏洞，所以其危害的对象也是前端用户。<br/>
                        形成XSS漏洞的主要原因是程序对输入和输出没有做合适的处理，导致“精心构造”的字符输出在前端时被浏览器当作有效代码解析执行从而产生危害。<br/>
                        因此在XSS漏洞的防范上，一般会采用“对输入进行过滤”和“输出进行转义”的方式进行处理:<br/>
                        &nbsp;&nbsp;输入过滤：对输入进行过滤，不允许可能导致XSS攻击的字符输入;<br />
                        &nbsp;&nbsp;输出转义：根据输出点的位置对输出到前端的内容进行适当转义;<br />
                    </dd>
                    <dd class="vul_detail_1">
                        <br />
                        你可以通过“Cross-Site Scripting”对应的测试栏目，来进一步的了解该漏洞。
                    </dd>
                </dl>
            </div>

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->





<?php
include_once $PIKA_ROOT_DIR.'footer.php';

?>
