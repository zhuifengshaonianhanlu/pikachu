<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "sqli.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',);
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
                    <a href="sqli.php">sqli</a>
                </li>
                <li class="active">概述</li>
            </ul><!-- /.breadcrumb -->



        </div>
        <div class="page-content">

            <div id="vul_info">
                <dl>
                    <dt class="vul_title">Sql Inject(SQL注入)概述</dt>
                    <dd class="vul_detail"><br />
                        <p style="color: red;">哦,SQL注入漏洞，可怕的漏洞。</p><br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在owasp发布的top10排行榜里，注入漏洞一直是危害排名第一的漏洞，其中注入漏洞里面首当其冲的就是数据库注入漏洞。<br />
                        <b>一个严重的SQL注入漏洞，可能会直接导致一家公司破产！</b><br />
                        SQL注入漏洞主要形成的原因是在数据交互中，前端的数据传入到后台处理时，没有做严格的判断，导致其传入的“数据”拼接到SQL语句中后，被当作SQL语句的一部分执行。
                        从而导致数据库受损（被脱裤、被删除、甚至整个服务器权限沦陷）。<br />
                    </dd>

                    <dd class="vul_detail">
                        在构建代码时，一般会从如下几个方面的策略来防止SQL注入漏洞：<br />
                        1.对传进SQL语句里面的变量进行过滤，不允许危险字符传入；<br />
                        2.使用参数化（Parameterized Query 或 Parameterized Statement）；<br />
                        3.还有就是,目前有很多ORM框架会自动使用参数化解决注入问题,但其也提供了"拼接"的方式,所以使用时需要慎重!
                    </dd>
                    <br />
                    <dd class="vul_detail">
                        SQL注入在网络上非常热门，也有很多技术专家写过非常详细的关于SQL注入漏洞的文章，这里就不在多写了。<br/>
                        你可以通过“Sql Inject”对应的测试栏目，来进一步的了解该漏洞。
                    </dd>

                </dl>

            </div>




        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->





<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
