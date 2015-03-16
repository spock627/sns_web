/**
 * 方法描述：获取访问路径中某个参数
 *
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