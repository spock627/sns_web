/*
* 页面初始化方法
* */
$(function(){
    initUserData();
});
function updateInfo(){
    location.href="updateSave";
}
function initUserData(){
    var age=getParamter("age");
    $("#age").text(age);
}
