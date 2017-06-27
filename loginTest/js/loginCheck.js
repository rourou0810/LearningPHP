$(function(){

	var ok1=false;
    var ok2=false;
    var ok3=false;
    var ok4=false;
     

    //提交按钮,所有验证通过方可提交
    $('#signUp').click(function(){

        //验证用户名
        if($('#username').val().length >= 3 && $('#username').val().length <=12 && $('#username').val()!=''){
            ok1=true;
        }else{
            $('#username').prev().text('用户名应该为3-20位之间').show();
        }

        //验证密码
        if($('#password').val().length >= 6 && $('#password').val().length <=20 && $('#password').val()!=''){
            ok2=true;
        }else{
            $('#password').prev().text('密码应该为6-20位之间').show();
        }

        //验证确认密码
        if($('#password_r').val().length >= 6 && $('#password_r').val().length <=20 && $('#password_r').val()!='' && $('#password_r').val() == $("#password").val()){
            ok3=true;
        }else{
            $('#password_r').prev().text('与上面的密码一致').show();
        }

        //验证邮箱
        if($('#email').val().search(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/)==-1){
            $('#email').prev().text('请输入正确的EMAIL格式').show();
        }else{                  
            ok4=true;
        }

        if(ok1 && ok2 && ok3 && ok4){
            $.ajax({
                type: "POST",
                url: "signUp.php",
                data: {
                    "username":$("#username").val(),
                    "password":$("#password").val(),
                    "email":$("#email").val()
                },
                success: function(msg){
                    $('#errormsg').text(msg).show();
                }
            });
        }else{
            return false;
        }
    });

});