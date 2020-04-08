$(document).ready(function () {
    var req = new FormData();
    $('.submit').click(function () {
        var email= $('#userName').val();
        var psw=$('#passWord').val();
        req.append("email",email);
        req.append("psw",psw);

        $.ajax({
            url: '../../api/login.php',
            type: 'post',
            data: req,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (e) {
                console.log('success:\n')
                console.log(e);
                loginSuccess(e);
            },
            error: function (e) {
                console.log('error:\n')
                $('body').html(e.responseText);
            },
            complete: function (e) {
                console.log('complete:\n')

            }
        })
    })
    function loginSuccess(list) {
        var name=list[0]['userName'];
        console.log(name)
        $('body').html("用户"+name+"登录成功，但是暂时还干不了什么");
    }
})