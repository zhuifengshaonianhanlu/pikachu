<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "fi_remote.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','active open','','',
        'active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
}

$PIKA_ROOT_DIR =  "../../";
include_once $PIKA_ROOT_DIR . 'header.php';


$html1='';
if(!ini_get('allow_url_include')){
    $html1.="<p style='color: red'>warning:你的allow_url_include没有打开,请在php.ini中打开了再测试该漏洞,记得修改后,重启中间件服务!</p>";
}
$html2='';
if(!ini_get('allow_url_fopen')){
    $html2.="<p style='color: red;'>warning:你的allow_url_fopen没有打开,请在php.ini中打开了再测试该漏洞,重启中间件服务!</p>";
}
$html3='';
if(phpversion()<='5.3.0' && !ini_get('magic_quotes_gpc')){
    $html3.="<p style='color: red;'>warning:你的magic_quotes_gpc打开了,请在php.ini中关闭了再测试该漏洞,重启中间件服务!</p>";
}


//远程文件包含漏洞,需要php.ini的配置文件符合相关的配置
$html='';
if(isset($_GET['submit']) && $_GET['filename']!=null){
    $filename=$_GET['filename'];
    include "$filename";//变量传进来直接包含,没做任何的安全限制


}



?>


<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="fileinclude.php">file include</a>
                </li>
                <li class="active">远程文件包含</li>
            </ul><!-- /.breadcrumb -->

            <a href="#" style="float:right" data-container="body" data-toggle="popover" data-placement="bottom" title="tips(再点一下关闭)"
               data-content="先了解一下include()函数的用法吧">
                点一下提示~
            </a>
        </div>
        <div class="page-content">

            <div id=fi_main>
                <p class="fi_title">which NBA player do you like?</p>
                <form method="get">
                    <select name="filename">
                        <option value="">--------------</option>
                        <option value="include/file1.php">Kobe bryant</option>
                        <option value="include/file2.php">Allen Iverson</option>
                        <option value="include/file3.php">Kevin Durant</option>
                        <option value="include/file4.php">Tracy McGrady</option>
                        <option value="include/file5.php">Ray Allen</option>
                    </select>
                    <input class="sub" type="submit" name="submit" />
                </form>
                <?php
                echo $html1;
                echo $html2;
                echo $html3;
                echo $html;
                ?>
            </div>

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->





<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>
