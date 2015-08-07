<!-- Login and Register -->
<div class="style-switcher style-off">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 text-center">

            <div class="switch-colours clearfix">
                <div class="set clearfix">
                    <?php
                    $login_user = $this->session->userdata('login_user');
                    if($login_user){
                    ?>
                    <h3 class="lighter"><a href="#"><?php echo $login_user->username;?></a></h3>
                    <h3 class="lighter"><a href="user/logout">退 出</a></h3>
                    <?php }else{?>
                    <h3 class="lighter"><a href="user/login">登 录</a></h3>
                    <h3 class="lighter"><a href="admin/welcome/login">管理员登录</a></h3>
                    <h3 class="lighter"><a href="user/register">注 册</a></h3>
                    <?php }?>

                </div>
                <!-- end set -->
            </div>

            <div class="style-open">
                <i class="fa fa-tint"></i>
            </div>
            <!-- end style-open -->

        </div>
    </div>
    <!-- end row -->


</div>
<!-- end Login and Register -->