/*
* 页面加载时方法
* */
$(function(){
    $(".reply").hide();
});
function reply(id){
    var replyArea=$(id).parent().next();
    replyArea.show();
}
function submitReply(id){
    var replyArea=$(id).parent();
    replyArea.hide();
}
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
            async:true,
            dataType:"text",
            data:{
                "uid":uid,
                "content":text
            },
            success:function(data){
                if(data=="success"){
                    $('#userText').val("");//清空
                    var html='<div class="messageHead">' +
                        '<div class="headImg"><a href="/sns_web/public/home"><img src="common/image/cat.jpg" class="img-circle himg"></a></div>'+
                        '<div class="mtime">'+'Time('+new Date().format("yyyy-MM-dd hh:mm:ss")+')</div>' +
                        '<div class="mview">View(45)</div> ' +
                        '</div> ' +
                        '<div class="message"> ' +
                        '<div class="content">'+text+'</div>' +
                        '</div>' +
                        '<div class="rep">' +
                        '<button type="button"  onclick="reply(this)" class="btn btn-success replyBtn">评论</button>'+
                        '<button type="button"  class="btn btn-default">转发</button>'+
                        '</div>'+
                        '<div class="reply" style="display:none">'+
                            '<textarea id="userReply" class="form-control" rows="3"></textarea>'+
                            '<button type="button"onclick="submitReply(this)" class="btn btn-success confirmBtn">确认</button>'+
                        '</div>';
                    $('#messageList').prepend(html);
                }else{
                    alert(data);
                }
            },
            error:function(e){
                alert(JSON.stringify(e));
            }
        });
    }
}

function uploadImg(){
    alert('上传图片');
}
//查看更多
var count=0;
function viewMore(){
    var url=location.href;
    if(url.indexOf('page')==-1){
        count=1;
    }else{
        $.ajax({
            url: "message/currentpage",
            type:"POST",
            dataType:"json",
            async:false,
            success:function(data){

                for(var i=0;i<data.length;i++){
                    var html='<div class="messageHead">' +
                        '<div class="headImg"><a href="/sns_web/public/home"><img src="common/image/cat.jpg" class="img-circle himg"></a></div>'+
                        '<div class="mtime">'+'Time('+new Date().format("yyyy-MM-dd hh:mm:ss")+')</div>' +
                        '<div class="mview">View(45)</div> ' +
                        '</div> ' +
                        '<div class="message"> ' +
                        '<div class="content">'+data[i].content+'</div>' +
                        '</div>' +
                        '<div class="rep">' +
                        '<button type="button"  onclick="reply(this)" class="btn btn-success replyBtn">评论</button>'+
                        '<button type="button"  class="btn btn-default">转发</button>'+
                        '</div>'+
                        '<div class="reply" style="display:none">'+
                        '<textarea id="userReply" class="form-control" rows="3"></textarea>'+
                        '<button type="button"onclick="submitReply(this)" class="btn btn-success confirmBtn">确认</button>'+
                        '</div>';
                    $('#messageList').append(html);
                }
            },
            error:function(data){
                alert(JSON.stringify(data));
            }

        });
    }
}