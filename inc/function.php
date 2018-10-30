<?php 
//验证码
function vcode($width=120,$height=40,$fontSize=30,$countElement=5,$countPixel=100,$countLine=4){
	header('Content-type:image/jpeg');
	$element=array('a','b','c','d','e','f','g','h','i','j','k','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9');
	$string='';
	for ($i=0;$i<$countElement;$i++){
		$string.=$element[rand(0,count($element)-1)];
	}
	$img=imagecreatetruecolor($width, $height);
	$colorBg=imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
	$colorBorder=imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
	$colorString=imagecolorallocate($img,rand(10,100),rand(10,100),rand(10,100));
	imagefill($img,0,0,$colorBg);
	for($i=0;$i<$countPixel;$i++){
		imagesetpixel($img,rand(0,$width-1),rand(0,$height-1),imagecolorallocate($img,rand(100,200),rand(100,200),rand(100,200)));
	}
	for($i=0;$i<$countLine;$i++){
		imageline($img,rand(0,$width/2),rand(0,$height),rand($width/2,$width),rand(0,$height),imagecolorallocate($img,rand(100,200),rand(100,200),rand(100,200)));
	}
	//imagestring($img,5,0,0,'abcd',$colorString);
	imagettftext($img,$fontSize,rand(-5,5),rand(5,15),rand(30,35),$colorString,'../assets/fonts/ManyGifts.ttf',$string);
	imagejpeg($img);
	imagedestroy($img);
	return $string;
}

//之前的验证码有点问题，重新从网上搜了一个简单的验证码函数，是的，从网上搜的。
function vcodex(){
	
	$string = "abcdefghijklmnopqrstuvwxyz0123456789";
    	$str = "";
    	for($i=0;$i<6;$i++){
        	$pos = rand(0,35);
        	$str .= $string{$pos};
    	}
    //session_start();
    //$_SESSION['img_number'] = $str;
	
	$img_handle = Imagecreate(80, 20);  //图片大小80X20
    	$back_color = ImageColorAllocate($img_handle, 255, 255, 255); //背景颜色（白色）
    	$txt_color = ImageColorAllocate($img_handle, 0,0, 0);  //文本颜色（黑色）
    
    //加入干扰线
    	for($i=0;$i<3;$i++)
    	{
        	$line = ImageColorAllocate($img_handle,rand(0,255),rand(0,255),rand(0,255));
        	Imageline($img_handle, rand(0,15), rand(0,15), rand(100,150),rand(10,50), $line);
    	}
    //加入干扰象素
    	for($i=0;$i<200;$i++) 
    	{
        	$randcolor = ImageColorallocate($img_handle,rand(0,255),rand(0,255),rand(0,255));
        	Imagesetpixel($img_handle, rand()%100 , rand()%50 , $randcolor);
    	}
	
	Imagefill($img_handle, 0, 0, $back_color);             //填充图片背景色
    	ImageString($img_handle, 28, 10, 0, $str, $txt_color);//水平填充一行字符串
	
	ob_clean();   // ob_clean()清空输出缓存区    
    	header("Content-type: image/png"); //生成验证码图片    
    	Imagepng($img_handle);//显示图片
	return $str;
	
}


//生成一个token,以当前微妙时间+一个5位的前缀
function set_token(){
    if(isset($_SESSION['token'])){
       unset($_SESSION['token']);
    }
    $_SESSION['token']=str_replace('.','',uniqid(mt_rand(10000,99999),true));
}




//跳转页面
function skip($notice,$url){
$html=<<<A
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="2;URL={$url}" />
<title>notice</title>
<link rel="stylesheet" type="text/css" href="../../../style/header.css"/>
</head>
<body>
<p id='op_notice'>{$notice} | <a href='{$url}'>点击快速返回</a></p>
</body>
</html>
A;
echo $html;
exit();
}

//在访问一个页面时，先验证是否登录,csrf里面，使用的是session验证
function check_csrf_login($link){
    if(isset($_SESSION['csrf']['username']) && isset($_SESSION['csrf']['password'])){
        $query="select * from member where username='{$_SESSION['csrf']['username']}' and sha1(pw)='{$_SESSION['csrf']['password']}'";
        $result=execute($link,$query);
        if(mysqli_num_rows($result)==1){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


//在访问一个页面时，先验证是否登录,sqli的insert,update问题里面，使用的是session验证
function check_sqli_session($link){
    if(isset($_SESSION['sqli']['username']) && isset($_SESSION['sqli']['password'])){
        $query="select * from member where username='{$_SESSION['sqli']['username']}' and sha1(pw)='{$_SESSION['sqli']['password']}'";
        $result=execute($link,$query);
        if(mysqli_num_rows($result)==1){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


//在访问一个页面时，先验证是否登录,sqli里面，使用的是cookie验证
function check_sqli_login($link){
    if(isset($_COOKIE['ant']['uname']) && isset($_COOKIE['ant']['pw'])){
        //这里如果不对获取的cookie进行转义，则会存在SQL注入漏洞，也会导致验证被绕过
        //$username=escape($link, $_COOKIE['ant']['username']);
        //$password=escape($link, $_COOKIE['ant']['password']);
        $username=$_COOKIE['ant']['uname'];
        $password=$_COOKIE['ant']['pw'];


        $query="select * from users where username='$username' and sha1(password)='$password'";

        $result=execute($link,$query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            return $data['id'];
        }else{
            return false;
        }
    }else{
        return false;
    }
}

/*xss里面的logincheck*/
function check_xss_login($link){
    if(isset($_COOKIE['ant']['uname']) && isset($_COOKIE['ant']['pw'])){
        //这里如果不对获取的cookie进行转义，则会存在SQL注入漏洞，也会导致验证被绕过
        $username=escape($link, $_COOKIE['ant']['uname']);
        $password=escape($link, $_COOKIE['ant']['pw']);
//         $username=$_COOKIE['ant']['uname'];
//         $password=$_COOKIE['ant']['pw'];
        $query="select * from users where username='$username' and sha1(password)='$password'";
        $result=execute($link,$query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            return $data['id'];
        }else{
            return false;
        }
    }else{
        return false;
    }
}
/*op1的check login*/
function check_op_login($link){
    if(isset($_SESSION['op']['username']) && isset($_SESSION['op']['password'])){
        $query="select * from member where username='{$_SESSION['op']['username']}' and sha1(pw)='{$_SESSION['op']['password']}'";
        $result=execute($link,$query);
        if(mysqli_num_rows($result)==1){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

/*op2的check login*/
function check_op2_login($link){
    if(isset($_SESSION['op2']['username']) && isset($_SESSION['op2']['password'])){
        $query="select * from users where username='{$_SESSION['op2']['username']}' and sha1(password)='{$_SESSION['op2']['password']}'";
        $result=execute($link,$query);
        if(mysqli_num_rows($result)==1){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
?>
