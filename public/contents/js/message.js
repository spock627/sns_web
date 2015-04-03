/*
* 页面加载时方法
* */
$(function(){
    $(".reply").hide();
    replyHander();
});
function replyHander(){
    $(".replyBtn").click(function(){
        $(".reply").show();
    });
    $(".confirmBtn").click(function(){
        $(".reply").hide();
    });
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
            async:false,
            dataType:"text",
            data:{
                "uid":uid,
                "content":text
            },
            success:function(data){
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
                    alert(data);
                }
            },
            error:function(e){
                alert(JSON.stringify(e));
            }
        });
    }
}
