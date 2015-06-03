/*
* 页面加载时方法
* */
$(function(){
    $(".replySubmit").hide();
    var width=$(window).width();
    $('#container').width(width);
});
/**
 * 点击评论按钮
 * */
function reply(id){
    var replyArea=$(id).parent().parent().find('.replySubmit');
    replyArea.show();
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
                    var html='<div class="messagePanel"><div class="messageHead">' +
                        '<div class="headImg"><a href="/sns_web/public/home"><img src="common/image/cat.jpg" class="img-circle himg"></a></div>'+
                        '<div class="mtime">'+'Time('+new Date().format("yyyy-MM-dd hh:mm:ss")+')</div>' +
                        '<div class="mview">View(45)</div> ' +
                        '</div> ' +
                        '<div class="message"> ' +
                        '<div class="content">'+text+'</div>' +
                        '</div>' +
                        '<div class="reply">' +
                            '<div onclick="reply(this)" class="replyBtn comment-font">' +
                                '<span class="glyphicon glyphicon-comment"></span>'+
                                '<span class="comment-count">111</span>'+
                            '</div>'+
                            '<div class="comment-font" onclick="zan(this)">' +
                                '<span class="glyphicon glyphicon-heart"></span>'+
                                '<span class="zan-count">22</span>'+
                            '</div>'+
                        '</div>'+
                        '<div class="replySubmit" style="display:none">'+
                            '<textarea id="userReply" class="form-control" rows="3"></textarea>'+
                            '<button type="button"onclick="submitReply(this)" class="btn btn-success confirmBtn">确认</button>'+
                        '</div></div>';
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
var count=1;
function viewMore(id){
    var url=location.href;
    if(url.indexOf('page')!=-1){
        count=1;
    }else{
        count++;
        $.ajax({
            url: "message/currentpage",
            type:"post",
            data:{
                "page":count
            },
            dataType:"json",
            async:false,
            success:function(data){
                if(data.length==0){
                    alert('没有更多了');
                    return false;
                }
                for(var i=0;i<data.length;i++){
                    var html='<div class="messagePanel"><div class="messageHead">' +
                        '<div class="headImg"><a href="/sns_web/public/home"><img src="common/image/cat.jpg" class="img-circle himg"></a></div>'+
                        '<div class="mtime">'+'Time('+new Date().format("yyyy-MM-dd hh:mm:ss")+')</div>' +
                        '<div class="mview">View(45)</div> ' +
                        '</div> ' +
                        '<div class="message"> ' +
                        '<div class="content">'+data[i].content+'</div>' +
                        '</div>' +
                        '<div class="reply">' +
                        '<div onclick="reply(this)" class="replyBtn comment-font">' +
                        '<span class="glyphicon glyphicon-comment"></span>'+
                        '<span class="comment-count">111</span>'+
                        '</div>'+
                        '<div class="comment-font" onclick="zan(this)">' +
                        '<span class="glyphicon glyphicon-heart"></span>'+
                        '<span class="zan-count">22</span>'+
                        '</div>'+
                        '</div>'+
                        '<div class="replySubmit" style="display:none">'+
                        '<textarea id="userReply" class="form-control" rows="3"></textarea>'+
                        '<button type="button"onclick="submitReply(this)" class="btn btn-success confirmBtn">确认</button>'+
                        '</div></div>';
                    $('#messageList').append(html);
                    $(id).parent().parent().remove();
                }
                $('#messageList').append(
                    '<div align="center" class="">' +
                    '<h3>' +
                    '<span onclick="viewMore(this)" id="viewMore" class="label label-success">查看更多</span>' +
                    '</h3> ' +
                    '</div>'
                );
            },
            error:function(data){
                alert(JSON.stringify(data));
            }

        });
    }
}
/**
 * 点赞功能
 * 点击第一次加一，第二次取消加一
 * **/
var zanFlag=false;
function zan(id){
    if(!zanFlag){
        zanFlag=true;
        var zanSpan=$(id).find('span').eq(1);
        var result=Number(zanSpan.text())+1;
        $(zanSpan).text(result);
    }else{
        zanFlag=false;
        var zanSpan=$(id).find('span').eq(1);
        var result=Number(zanSpan.text())-1;
        $(zanSpan).text(result);
    }
}

/**
 * 提交评论
 * */
function submitReply(id){
    var replyArea=$(id).parent();
    replyArea.hide();
    var content=$(id).prev().val();
    var html='<ul class="commnet-items">' +
        '<li>' +
            '<div class="comment-avatar"> ' +
                '<a href="#"> ' +
                    '<img src="common/image/cat.jpg" alt="avatar"/> ' +
                '</a> ' +
            '</div> ' +
            '<div class="comment-content"> ' +
                '<div class="content-detail"> ' +
                    '<a href="#">昵称:</a>'
             +content+
                '</div> ' +
                '<div class="comment-op"> ' +
                    '<span class="time">今天'+new Date().format("hh:mm")+'</span>'+
                        '<a href="#"> ' +
                             '<span>回复</span> ' +
                        '</a> ' +
                '</div> ' +
            '</div> ' +
            '<div class="clear"></div> ' +
            '<div class="comment-sub"> ' + '</div> ' +
        '</li> ' +
        '</ul>'
    $(id).parent().prev().append(html);
}
/**
 *
 * **/
function replyComment(){

}