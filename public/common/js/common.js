
/*
* 该文件主要为通用的js工具功能
* */


/**
 * 方法描述：获取访问路径Url中某个参数
 * @param paramName 参数名
 * @param url 指定要截取参数的url（可以为空，如果为空url指向当前页面）
 */
function getParamter(paramName, url) {
    var seachUrl = window.location.search.replace("?", "");
    if (url != null) {
        var index = url.indexOf('?');
        url = url.substr(index + 1);
        seachUrl = url;
    }
    var ss = seachUrl.split("&");
    var paramNameStr = "";
    var paramNameIndex = -1;
    for ( var i = 0; i < ss.length; i++) {
        paramNameIndex = ss[i].indexOf("=");
        paramNameStr = ss[i].substring(0, paramNameIndex);
        if (paramNameStr == paramName) {
            var returnValue = ss[i].substring(paramNameIndex + 1, ss[i].length);
            if (typeof (returnValue) == "undefined") {
                returnValue = "";
            }
            return returnValue;
        }
    }
    return "";
}
/**
 * 方法描述：扩展js原生date功能
 *
 * @param format 参数名 eg：yyyy-MM-dd hh:mm:ss
 */
Date.prototype.format = function(format){
    var o = {
        "M+" : this.getMonth()+1, //month
        "d+" : this.getDate(), //day
        "h+" : this.getHours(), //hour
        "m+" : this.getMinutes(), //minute
        "s+" : this.getSeconds(), //second
        "q+" : Math.floor((this.getMonth()+3)/3), //quarter
        "S" : this.getMilliseconds() //millisecond
    }

    if(/(y+)/.test(format)) {
        format = format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));
    }

    for(var k in o) {
        if(new RegExp("("+ k +")").test(format)) {
            format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length));
        }
    }
    return format;
}