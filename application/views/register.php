<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Register Page |</title>
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
        <h1>用户注册</h1>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

        <form id="myform" method="post" class="am-form" action="user/do_register" >
            <label for="username">用户名:</label>
            <input type="text" name="username" id="username" value="">
            <br>
            <label for="password">密码:</label>
            <input type="password" name="password" id="password" value="">
            <br>
            <label for="password">确认密码:</label>
            <input type="password" name="password2" id="password2" value="">
            <br>
            <label for="picture">头像:</label>
            <input type="file" name="picture" id="picture" value="">
            <br />
            <div class="am-cf">
            <input type="button" name="" value="注 册" id="submit" class="am-btn am-btn-primary am-btn-sm am-fl">
            </div>
        </form>
        <hr>
        <p>? 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </div>
</div>
<script src="assets/admin/js/jquery.min.js"></script>
<script>
    $(function(){
        $('#submit').on('click',function() {
            var $username = $('#username'),
                $password = $('#password'),
                $password2 = $('#password2');

            var bSubmit = true;
            if ($.trim($username.val()) == "") {
                alert('请输入用户名!');
                $username.focus();
                bSubmit = false;
            }

            if ($.trim($password.val()) == "") {
                alert('请输入密码!');
                $password.focus();
                bSubmit = false;
            }
            if ($.trim($password2.val()) == "") {
                alert('请确认密码!');
                $password2.focus();
                bSubmit = false;
            }
            if ($password.val() !== "" && $password2.val() !== "") {
                if ($password.val() !== $password2.val()) {
                    alert('密码不一致！请确认！');
                    $password.focus();
                    bSubmit = false;
                }
            }

            if(bSubmit){
                $.post('user/do_register', {
                    username:$username.val() ,
                    password:$password.val()
                },function(data){
                    if(data =='success'){
                        localtion.href='user/login';
                    }else{
                        alert('注册失败！')；
                    }
                });
            }
        });



    });
</script>


</body>
</html>