<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/960.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/text.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/front.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/tipTip.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/js/fancybox/jquery.fancybox-1.3.4.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/custom-theme/jquery-ui-1.8.15.custom.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>public/template/js/jquery-1.6.2.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/template/js/fancybox/jquery.fancybox-1.3.4.pack.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/template/js/jquery.tipTip.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/template/js/jsvalidate.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/template/js/jquery-ui-1.8.15.custom.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#login-form").validate();
            });
        </script>
    </head>
    <body>
        <div class="container_12" style="margin-top: 100px;">
            <div class="grid_6">&nbsp;</div>
            <div class="grid_6">
                <?php
                $notif = $this->session->flashdata("notif");
                if(!empty ($notif)){?>
                <div class="ui-widget">
                    <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
                        <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                           <p><?php echo $notif;?></p>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="clear"></div>
            <div class="grid_6 logo"></div>
         
            <div class="grid_6 form-login-page">

                <form class="myform" id="login-form" method="post" action="<?php echo site_url('home/login'); ?>">
                    <fieldset>
                        <p>
                            <label for="username_login">Username</label>
                            <input type="text" name="username_login" class="required">

                        </p>
                        <p>
                            <label for="password_login">Password</label>
                            <input type="password" name="password_login" class="required">

                        </p>
                        <p>
                            <input type="submit" value="Login" class="button">
                        </p>
                    </fieldset>
                </form>

            </div>
        </div>
    </body>
</html>