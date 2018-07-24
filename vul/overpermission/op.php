<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "op.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
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
                    <a href="op.php">over permission</a>
                </li>
                <li class="active">概述</li>
            </ul><!-- /.breadcrumb -->


        </div>
        <div class="page-content">
            <div id="vul_info">
                <dd class="vul_detail">
                    如果使用A用户的权限去操作B用户的数据，A的权限小于B的权限，如果能够成功操作，则称之为越权操作。
                    越权漏洞形成的原因是后台使用了 不合理的权限校验规则导致的。
                </dd>
                <dd class="vul_detail">
                    一般越权漏洞容易出现在权限页面（需要登录的页面）增、删、改、查的的地方，当用户对权限页面内的信息进行这些操作时，后台需要对
                    对当前用户的权限进行校验，看其是否具备操作的权限，从而给出响应，而如果校验的规则过于简单则容易出现越权漏洞。
                </dd>
                <dd class="vul_detail_1">
                    因此，在在权限管理中应该遵守：<br />
                    1.使用最小权限原则对用户进行赋权;<br />
                    2.使用合理（严格）的权限校验规则;<br />
                    3.使用后台登录态作为条件进行权限判断,别动不动就瞎用前端传进来的条件;<br />

                </dd>
                <dd class="vul_detail_1">
                    你可以通过“Over permission”对应的测试栏目，来进一步的了解该漏洞。
                </dd>
                </dl>
            </div>


        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->






<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
