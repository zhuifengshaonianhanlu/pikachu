<?php
//客户端前端验证的后台函数
function upload_client($key,$save_path){
    $arr_errors=array(
        1=>'上传的文件超过了 php.ini中 upload_max_filesize 选项限制的值',
        2=>'上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
        3=>'文件只有部分被上传',
        4=>'没有文件被上传',
        6=>'找不到临时文件夹',
        7=>'文件写入失败'
    );
    if(!isset($_FILES[$key]['error'])){
        $return_data['error']='请选择上传文件！';
        $return_data['return']=false;
        return $return_data;
    }
    if ($_FILES[$key]['error']!=0) {
        $return_data['error']=$arr_errors[$_FILES[$key]['error']];
        $return_data['return']=false;
        return $return_data;
    }
    //新建一个保存文件的目录
    if(!file_exists($save_path)){
        if(!mkdir($save_path,0777,true)){
            $return_data['error']='上传文件保存目录创建失败，请检查权限!';
            $return_data['return']=false;
            return $return_data;
        }
    }
    $save_path=rtrim($save_path,'/').'/';//给路径加个斜杠
    if(!move_uploaded_file($_FILES[$key]['tmp_name'],$save_path.$_FILES[$key]['name'])){
        $return_data['error']='临时文件移动失败，请检查权限!';
        $return_data['return']=false;
        return $return_data;
    }
    //如果以上都通过了，则返回这些值，存储的路径，新的文件名（不要暴露出去）
    $return_data['new_path']=$save_path.$_FILES[$key]['name'];
    $return_data['return']=true;
    return $return_data;

}

//只通过MIME类型验证了一下图片类型，其他的无验证,upsafe_upload_check.php
function upload_sick($key,$mime,$save_path){
    $arr_errors=array(
        1=>'上传的文件超过了 php.ini中 upload_max_filesize 选项限制的值',
        2=>'上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
        3=>'文件只有部分被上传',
        4=>'没有文件被上传',
        6=>'找不到临时文件夹',
        7=>'文件写入失败'
    );
    if(!isset($_FILES[$key]['error'])){
        $return_data['error']='请选择上传文件！';
        $return_data['return']=false;
        return $return_data;
    }
    if ($_FILES[$key]['error']!=0) {
        $return_data['error']=$arr_errors[$_FILES[$key]['error']];
        $return_data['return']=false;
        return $return_data;
    }
    //验证一下MIME类型
    if(!in_array($_FILES[$key]['type'], $mime)){
        $return_data['error']='上传的图片只能是jpg,jpeg,png格式的！';
        $return_data['return']=false;
        return $return_data;
    }
    //新建一个保存文件的目录
    if(!file_exists($save_path)){
        if(!mkdir($save_path,0777,true)){
            $return_data['error']='上传文件保存目录创建失败，请检查权限!';
            $return_data['return']=false;
            return $return_data;
        }
    }
    $save_path=rtrim($save_path,'/').'/';//给路径加个斜杠
    if(!move_uploaded_file($_FILES[$key]['tmp_name'],$save_path.$_FILES[$key]['name'])){
        $return_data['error']='临时文件移动失败，请检查权限!';
        $return_data['return']=false;
        return $return_data;
    }
    //如果以上都通过了，则返回这些值，存储的路径，新的文件名（不要暴露出去）
    $return_data['new_path']=$save_path.$_FILES[$key]['name'];
    $return_data['return']=true;
    return $return_data;
    
}

//进行了严格的验证
function upload($key,$size,$type=array(),$mime=array(),$save_path){
    $arr_errors=array(
        1=>'上传的文件超过了 php.ini中 upload_max_filesize 选项限制的值',
        2=>'上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
        3=>'文件只有部分被上传',
        4=>'没有文件被上传',
        6=>'找不到临时文件夹',
        7=>'文件写入失败'
    );
//     var_dump($_FILES);
    if(!isset($_FILES[$key]['error'])){
        $return_data['error']='请选择上传文件！';
        $return_data['return']=false;
        return $return_data;
    }
    if ($_FILES[$key]['error']!=0) {
        $return_data['error']=$arr_errors[$_FILES[$key]['error']];
        $return_data['return']=false;
        return $return_data;
    }
    //验证上传方式
    if(!is_uploaded_file($_FILES[$key]['tmp_name'])){
        $return_data['error']='您上传的文件不是通过 HTTP POST方式上传的！';
        $return_data['return']=false;
        return $return_data;
    }
    //获取后缀名，如果不存在后缀名，则将变量设置为空
    $arr_filename=pathinfo($_FILES[$key]['name']);
    if(!isset($arr_filename['extension'])){
        $arr_filename['extension']='';
    }
    //先验证后缀名
    if(!in_array(strtolower($arr_filename['extension']),$type)){//转换成小写，在比较
        $return_data['error']='上传文件的后缀名不能为空，且必须是'.implode(',',$type).'中的一个';
        $return_data['return']=false;
        return $return_data;
    }
    
    //验证MIME类型，MIME类型可以被绕过
    if(!in_array($_FILES[$key]['type'], $mime)){
        $return_data['error']='你上传的是个假图片，不要欺骗我xxx！';
        $return_data['return']=false;
        return $return_data;
    }
    //通过getimagesize来读取图片的属性，从而判断是不是真实的图片，还是可以被绕过的
    if(!getimagesize($_FILES[$key]['tmp_name'])){
        $return_data['error']='你上传的是个假图片，不要欺骗我！';
        $return_data['return']=false;
        return $return_data;
    }
    //验证大小
    if($_FILES[$key]['size']>$size){
        $return_data['error']='上传文件的大小不能超过'.$size.'byte(500kb)';
        $return_data['return']=false;
        return $return_data;
    }

    //把上传的文件给他搞一个新的路径存起来
    if(!file_exists($save_path)){
        if(!mkdir($save_path,0777,true)){
            $return_data['error']='上传文件保存目录创建失败，请检查权限!';
            $return_data['return']=false;
            return $return_data;
        }
    }
    //生成一个新的文件名，并将新的文件名和之前获取的扩展名合起来，形成文件名称
    $new_filename=str_replace('.','',uniqid(mt_rand(100000,999999),true));
    if($arr_filename['extension']!=''){
        $arr_filename['extension']=strtolower($arr_filename['extension']);//小写保存
        $new_filename.=".{$arr_filename['extension']}";
    }
    //将tmp目录里面的文件拷贝到指定目录下并使用新的名称
    $save_path=rtrim($save_path,'/').'/';
    if(!move_uploaded_file($_FILES[$key]['tmp_name'],$save_path.$new_filename)){
        $return_data['error']='临时文件移动失败，请检查权限!';
        $return_data['return']=false;
        return $return_data;
    }
    //如果以上都通过了，则返回这些值，存储的路径，新的文件名（不要暴露出去）
    $return_data['save_path']=$save_path.$new_filename;
    $return_data['filename']=$new_filename;
    $return_data['return']=true;
    return $return_data;
    }

    
?>
