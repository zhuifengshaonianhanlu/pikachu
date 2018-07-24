<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$SELF_PAGE = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);

if ($SELF_PAGE = "csrf.php"){
    $ACTIVE = array('','','','','','','','','','','','','','','','','','','','','','','','','','active open','active','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

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
                    <a href="#">CSRF</a>
                </li>
                <li class="active">CSRF概述</li>
            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">

            <div id="vul_info">
                <dl>
                    <dt class="vul_title">CSRF(跨站请求伪造)概述</dt>
                    <dd class="vul_detail">
                        Cross-site request forgery 简称为“CSRF”，在CSRF的攻击场景中攻击者会伪造一个请求（这个请求一般是一个链接），然后欺骗目标用户进行点击，用户一旦点击了这个请求，整个攻击就完成了。所以CSRF攻击也成为"one click"攻击。
                        很多人搞不清楚CSRF的概念，甚至有时候会将其和XSS混淆,更有甚者会将其和越权问题混为一谈,这都是对原理没搞清楚导致的。<br/>
                        这里列举一个场景解释一下，希望能够帮助你理解。<br />
                        <b>场景需求：</b><br />小黑想要修改大白在购物网站tianxiewww.xx.com上填写的会员地址。<br />
                        <b>先看下大白是如何修改自己的密码的：</b><br />登录---修改会员信息，提交请求---修改成功。<br />
                        所以小黑想要修改大白的信息，他需要拥有：1，登录权限 2，修改个人信息的请求。<br />
                    <dd class="vul_detail">
                        但是大白又不会把自己xxx网站的账号密码告诉小黑，那小黑怎么办？<br />
                        于是他自己跑到www.xx.com上注册了一个自己的账号，然后修改了一下自己的个人信息（比如：E-mail地址），他发现修改的请求是：<br />
                        【http://www.xxx.com/edit.php?email=xiaohei@88.com&Change=Change】<br />
                        于是，他实施了这样一个操作：把这个链接伪装一下，在小白登录xxx网站后，欺骗他进行点击，小白点击这个链接后，个人信息就被修改了,小黑就完成了攻击目的。<br />
                    </dd>
                    <dd class="vul_detail">
                        <b>为啥小黑的操作能够实现呢。有如下几个关键点：</b><br />
                        1.www.xxx.com这个网站在用户修改个人的信息时没有过多的校验，导致这个请求容易被伪造;<br />
                        ---因此，我们判断一个网站是否存在CSRF漏洞，其实就是判断其对关键信息（比如密码等敏感信息）的操作(增删改)是否容易被伪造。<br />
                        2.小白点击了小黑发给的链接，并且这个时候小白刚好登录在购物网上;<br />
                        ---如果小白安全意识高，不点击不明链接，则攻击不会成功，又或者即使小白点击了链接，但小白此时并没有登录购物网站，也不会成功。<br />
                        ---因此，要成功实施一次CSRF攻击，需要“天时，地利，人和”的条件。<br />
                        当然，如果小黑事先在xxx网的首页如果发现了一个XSS漏洞，则小黑可能会这样做：
                        欺骗小白访问埋伏了XSS脚本（盗取cookie的脚本）的页面，小白中招，小黑拿到小白的cookie，然后小黑顺利登录到小白的后台，小黑自己修改小白的相关信息。<br />
                        ---所以跟上面比一下，就可以看出CSRF与XSS的区别：CSRF是借用户的权限完成攻击，攻击者并没有拿到用户的权限，而XSS是直接盗取到了用户的权限，然后实施破坏。
                    </dd>

                    <dd class="vul_detail">
                        因此，网站如果要防止CSRF攻击，则需要对敏感信息的操作实施对应的安全措施，防止这些操作出现被伪造的情况，从而导致CSRF。比如：<br />
                        --对敏感信息的操作增加安全的token；<br />
                        --对敏感信息的操作增加安全的验证码；<br />
                        --对敏感信息的操作实施安全的逻辑流程，比如修改密码时，需要先校验旧密码等。<br />

                        <br />
                        <p>如果你没有读太明白,不要犹豫,请再读一遍啦</p>

                    </dd>
                    <dd class="vul_detail">
                        你可以通过“Cross-site request forgery”对应的测试栏目，来进一步的了解该漏洞。
                    </dd>
                </dl>
            </div>

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->





<?php
include_once $PIKA_ROOT_DIR.'footer.php';

?>
