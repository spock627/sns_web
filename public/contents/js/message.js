/**
 * 发表内容
 * */
function publish(){
    var text=$('#userText').val();//获取内容
    var uid=$('#uid').val();//获取用户id
    if(text==''){
        return false;
    }else{
        $.ajax({
            url:"message/insert",
            type:"POST",
            async:false,
            dataType:"text",
            data:{
                "uid":uid,
                "content":text
            },
            success:function(data){
                alert(data);
                if(data=="success"){
                    var html='<div class="messageHead">' +
                        '<div class="headImg"><img src="common/image/cat.jpg" class="img-circle himg"></div> ' +
                        '<div class="mtime">'+'Time('+new Date().format("yyyy-MM-dd hh:mm:ss")+')</div>' +
                        '<div class="mview">View(45)</div> ' +
                        '</div> ' +
                        '<div class="message"> ' +
                        '<div class="content">'+text+'</div>' +
                        '</div>' +
                        '<div>' +
                        '<button type="button" class="btn btn-success">评论</button> ' +
                        '<button type="button" class="btn btn-default">转发</button> ' +
                        '</div>';
                    $('#messageList').append(html);
                }else{

                }
            },
            error:function(e){
                alert(JSON.stringify(e));
            }
        });
    }
}

//date处理
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
