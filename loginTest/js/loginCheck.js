$(function(){

	var isCheckSignUp = true;

    //提交按钮,所有验证通过方可提交
    $('#signUp').click(function(){

        //验证用户名
        if(!($('#username').val().length >= 3 && $('#username').val().length <=12)){
            errorMsgTip('#username','用户名应该为3-20位之间');
            isCheckSignUp = false;
        }

        //验证密码
        if(!($('#password').val().length >= 6 && $('#password').val().length <=20)){
            errorMsgTip('#password','密码应该为6-20位之间');
            isCheckSignUp = false;
        }

        //验证确认密码
        if(!($('#password_r').val().length >= 6 && $('#password_r').val().length <=20 && $('#password_r').val() == $("#password").val())){
            errorMsgTip('#password_r','与上面的密码一致');
            isCheckSignUp = false;
        }

        //验证邮箱
        if($('#email').val().search(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/)==-1){
            errorMsgTip('#email','请输入正确的邮箱地址');
            isCheckSignUp = false;
        }

        function errorMsgTip(eleID,msgtip){
            $(eleID).prev().text(msgtip).show();
        }

        if(isCheckSignUp){
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
        }
    });

});