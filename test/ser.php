<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */
//
//class A{
//    public $test="pikachu";
//}
//
//
//$s=new A(); //创建一个对象
//
//$serdata = serialize($s); //把这个对象进行序列化
//echo $serdata;
//
//echo '<br>';
//
//$u=unserialize($serdata);
//echo $u->test;


class S{
    var $test = "<script>alert('xss')</script>";
}

echo '<br>';
$a = new S();
echo serialize($a);


?>