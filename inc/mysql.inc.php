<?php
//db connect
function connect($host=DBHOST,$username=DBUSER,$password=DBPW,$databasename=DBNAME,$port=DBPORT){
	$link=@mysqli_connect($host, $username, $password, $databasename, $port);
	if(mysqli_connect_errno()){
// 		exit(mysqli_connect_error());
	    exit('数据库连接失败，请检查config.inc.php配置文件');
	}
	mysqli_set_charset($link,'utf8');
	return $link;
}

//sqli_widebyte



//判断一下操作是否成功，如果错误返回bool值，如果成功，则返回结果集
function execute($link,$query){
	$result=mysqli_query($link,$query);
	if(mysqli_errno($link)){//最近一次操作的错误编码，没错误返回0,没有输出
		exit(mysqli_error($link));//有错误，返回编码，为true，则打印报错信息
	}
	return $result;
}



//转义，避免fuck
function escape($link,$data){
    if(is_string($data)){
        return mysqli_real_escape_string($link,$data);
    }
    if(is_array($data)){
        foreach ($data as $key=>$val){
            $data[$key]=escape($link,$val);
        }
    }
    return $data;
}
?>