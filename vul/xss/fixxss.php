<?php
/**
 * Created by PhpStorm.
 * User: hanlu220
 * Date: 2019/5/29
 * Time: 13:26
 */


/**
1.元素内容:能解释标签和字符实体
2.标签属性值,能解释字符实体
3.属性值支持javascript:协议的,像src,href等,能解释字符实体。
4.事件中的绑定函数,像onmouseover=""这种事件绑定也是标签属性值,能解释字符实体
5.script中的内容:不能解释标签和字符实体。

 *
 * 根据 HTML 的规格，script 元素中的数据不能出现 </。
 * 而字符实体因不能被解释也不能 使用。所以，必须通过变更生成的 JavaScript 代码来避免这些问题。
 */

$div = '';
$msg = '';
$in = '';


$url = '';
$name = '';
$print = '';

//001--------html普通标签位置输出
if (isset($_GET['div'])){
    //这里因为输出是在普通的div标签里面,所以这里直接htmlspecial实体编码即可
//    $div .= $_GET['div'];
    $div .= htmlspecialchars($_GET['div'],ENT_QUOTES);
}

//002-------输出在普通标签的普通属性
if (isset($_GET['msg'])){
    $msg .= $_GET['msg'];
//    防范措施:html实体编码
//    $msg .= htmlspecialchars($_GET['msg'],ENT_QUOTES);
}

//003------输出在事件属性中
if (isset($_GET['in'])){
    //这里实体编码能解决问题吗。并不能：onmouseover="init('&#039;);alert(document.cookie)//')">
    //问题的关键在于：onmouseover是html标签中的属性，能解释字符实体，因此虽然实体编码了，但是解析是任然会被解析成'
    //比较好的方法是：先做js转义，在进行html实体编码，在解析时：实体被解析出来后，任然是被转义的js
    $in .= htmlspecialchars($_GET['in'],ENT_QUOTES);
//    $in .= $_GET['in'];
}

//004-------输出点在特殊的属性中，如a标签的href

//检测输入的是否是http,https,或者/开通的url .正则：\A指定字符必须出现在开头。
function check_url($url){
    if (preg_match('/\Ahttp:/',$url) || preg_match('/\Ahttps:/',$url) || preg_match('#\A/#',$url)){
        return true;
    }else{
        return false;
    }
}

if (isset($_GET['url'])){
//    输出在a标签的href属性中,默认存在xss,payload:aa"><script>alert(1)</script>
//    此时用htmlspecialchars进行实体转义,有用吗? 上面的payload确实无法执行了。
    $url .= htmlspecialchars($_GET['url'],ENT_QUOTES);
//    但是因为href属性中支持使用javascript:执行js,因此问题任然存在,payload:javascript:alert(1)

//    $url .= $_GET['url'];

    //正确的做法：先检查是否是url，在进行html实体编码
//    if (check_url($_GET['url'])){
//        $url .= htmlspecialchars($_GET['url']);
//    }

}

//005-------输出点在js中
//转义函数:所有的字符串,除字母,数字,.号,-号外的其他全部进行转义。
//全部转义为unicode(utf-8是unicode的一种实现),unicode可以在js中可以被正常解析使用,
//所有的转义操作在后台进行后输出到前台

//转换字符的编码
function unicode_escape($str){
    $u16 = mb_convert_encoding($str[0],'UTF-16');
    return preg_replace('/[0-9a-f]{4}/','\u$0',bin2hex($u16));
}
//将字母和数字还有.-排除后的剩下的字符全部\uXXXX的unicode的形式进行转义
//搜索一个正则,并使用指定的回调函数进行callback
function escape_js_string($input){
    return preg_replace_callback('/[^-\.0-9a-zA-Z]+/u','unicode_escape',$input);
}


if (isset($_GET['name'])){
//    $name .= $_GET['name'];

    //处理1：这里直接html实体编码可以吗?其实也可以,就是输出的内容在js里面全是实体字符，
    //但是由于js本身并不解析html实体字符,因此虽然编码破坏了payload的含义，但也破坏了代码,比如"字符串比较"就无法完成。
//    $name .=htmlspecialchars($_GET['name'],ENT_QUOTES);

    //处理2：将字母和数字还有.-排除后的剩下的字符全部\uXXXX的unicode的形式进行转义
    $name .= escape_js_string($_GET['name']);
}


?>

<html>
<body>
<div>xss fix demo</div>

<div>
    <!--    001-输出点在普通的标签中,没什么好说的,实体编码即可-->
    <!--    payload:<script>alert('xss')</script>-->
    <?php echo $div;?>
    <!--    修复方案，输出的时候做html实体编码，注意单引号-->
</div>


<form>
    <!--    002-输出内容在标签属性中，普通属性-->
    <!--    payload:a"><script>alert('xss')</script>    -->
    <input name="msg" value="<?php echo $msg;?>">


    <!--    003-输出在支持事件绑定函数的属性中-->
    <!--    payload:');alert(document.cookie)//       -->
    <input type="button" value="submit" onmouseover="init('<?php echo $in;?>')">
</form>


    <!--    004-输出点在标签属性中,支持“javascript:协议” -->
    <!--    //输出点在标签内容中,payload:javascript:alert(1) -->
<a href="<?php echo $url;?>">www.google.com</a>



<!--    005-输出在js中-->
<script type="text/javascript">
    function init() {}

    // 005-输出点在js中,构造闭合，即可，payload:xx';alert(1);//
    var echoxy = '<?php echo $name;?>';
//    alert(echoxy);
    if (echoxy === '>中国'){
        alert("比较成功,你的编码杠杠的~");

    }


</script>

</body>
</html>
