function checkValidate(){
   var email=$('#InputEmail').val();
    var passwd=$('#InputPassword').val();
    if(email==''){
        alert('Email can not be null!');
        return false;
    }else if(passwd==''){
        alert('Passwd can not be null!');
        return false;
    }
}
