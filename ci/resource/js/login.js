$(function(){
	
	$('#submit').click(function(){
        var isCheckSignUp = true;

		//验证用户名
		var uname = $('#username').val(),
			pwd   = $('#pwd').val();

        if(!(uname.length >= 3 && uname.length <=12)){
            errorMsgTip('#username','用户名应该为3-20位之间');
            isCheckSignUp = false;
        }

        //验证密码
        if(!(pwd.length >= 6 && pwd.length <=20)){
            errorMsgTip('#pwd','密码应该为6-20位之间');
            isCheckSignUp = false;
        }

        function errorMsgTip(eleID,msgtip){
        	$(eleID).parent().parent().find('.errortip').empty();
            $(eleID).parent().parent().find('.errortip').text(msgtip).show();
        }

        if(isCheckSignUp == false){
            return false;
	    }
    })

    


});