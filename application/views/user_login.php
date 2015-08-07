<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page | Amaze UI Example</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <base href="<?php echo site_url();?>"/>
    <link rel="alternate icon" type="image/png" href="assets/admin/img/favicon.png">
    <link rel="stylesheet" href="assets/admin/css/amazeui.min.css"/>
    <style>
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }
        .header p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>用户登录</h1>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

        <form id="myform" method="post" class="am-form" >
            <label for="username">用户名:</label>
            <input type="text" name="username" id="username" value="">
            <br>
            <label for="password">密码:</label>
            <input type="password" name="password" id="password" value="">
            <br>
            <label for="remember-me">
                <input id="remember-me" type="checkbox">
                记住密码
            </label>
            <br />
            <div class="am-cf">
                <input type="button" name="" value="登录" id="submit" class="am-btn am-btn-primary am-btn-sm am-fl">
                <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
            </div>
        </form>
        <hr>
        <p>? 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </div>
</div>
<script src="assets/admin/js/jquery.min.js"></script>
<script src="assets/admin/js/util.js"></script>
<script>

    $(function(){
        var sUsername = util.cookie.getCookie('username'),
            sPassword = util.cookie.getCookie('password');
        if(sUsername && sPassword){
            ajaxLogin(sUsername, sPassword);
        }

        $('#submit').on('click', function(){
            var $username = $('#username'),
                $password = $('#password');

            var bSubmit = true;
            if($.trim($username.val()) == ""){
                alert('请输入用户名!');
                $username.focus();
                bSubmit = false;
            }

            if($.trim($password.val()) == ""){
                alert('请输入密码!');
                $password.focus();
                bSubmit = false;
            }

            if(bSubmit){
                ajaxLogin($username.val(), $password.val());
            }
        });

        function ajaxLogin(sName, sPwd){
            $.post('user/check_login', {
                username: sName,
                password: sPwd
            }, function(data){
                if(data == 'success'){
                    if(   $('#remember-me').is(":checked")   ){
                        util.cookie.setCookie('username', sName, 30);
                        util.cookie.setCookie('password', sPwd, 30);
                    }
                    location.href = 'welcome/index';
                }else{
                    alert('用户名或密码不正确!');
                }
            }, 'text');
        }
    });
</script>

</body>
</html>