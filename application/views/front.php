<html>
    <head>
        <title>Monopolli</title>
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
                $(".login a").fancybox({
                    'opacity' : false,
                    'transitionIn' :'elastic',
                    'transitionOut' :'elastic',
                    'onClosed' : function(){
                        $("#username_login").val("");
                        $("#password_login").val("");
                    }
                });
                $(".register a").fancybox({
                    'width'	: '75%',
                    'autoScale'     	: false,
                    'transitionIn' :'elastic',
                    'transitionOut' :'elastic'
                  
                });
                $(".core-menu a").fancybox({
                    'width'				: '75%',
                    'height'			: '75%',
                    'autoScale'     	: false,
                    'transitionIn'		: 'elastic',
                    'transitionOut'		: 'elastic',
                    'type'				: 'iframe'
                });
                $("a, input").tipTip();
              
                $("#email").blur(function(){
                    $("#loading").show();
                    data = ({'email':$(this).val()});
                    $.ajax({
                        type : 'POST',
                        url  : '<?php echo site_url('home/gravatar') ?>',
                        data : data ,
                        success : function (img){
                            $("#avatar").html(img);
                            $("#loading").hide();
                        }
                    });
                    return false;
                });
                $("#username_register").blur(function(){
                 
                    username = ({'username_register':$(this).val()});
                    $.ajax({
                        type : 'POST',
                        url  : '<?php echo site_url('home/username') ?>',
                        data : username ,
                        success : function (data){
                        
                            // alert(obj.exist===true);
                            if(data==="noexist"){
                                $("#register-btn").removeAttr("disabled");
                                $("#exist").html("");
                            }
                            else{
                                $("#exist").html("Username Sudah Terpakai");
                                $("#register-btn").attr("disabled");

                            }
                        }
                    });
                    return false;
                });
                $("#date").datepicker({
                    changeMonth: true,
                    changeYear: true
                });
                $("#register-form").validate();
                $("#form-login").validate();
            });
        </script>

    </head>
    <body>
        <div id="wrapper"></div>
        <div class="container_12">
            <div class="grid_5 login"><a id="#login-btn"  href="#login-box" title="Untuk Login ke Game " ><h1>Login</h1></a></div>
            <div class="grid_2">&nbsp;</div>
            <div class="grid_5 register" ><a href="#register-box" title="Mendaftar Ke game ini"><h1>Register</h1></a></div>
            <div class="clear"></div>

            <div class="grid_2">&nbsp;</div>
            <div class="grid_7 core-menu"><a href="http://jqueryui.com/download/?themeParams=%3Fctl%3Dthemeroller" title="Tentang Game"><h1>About</h1></a></div>
            <div class="grid_3">&nbsp;</div>
            <div class="clear"></div>



            <div class="grid_12 ground"></div>
            <div class="clear"></div>



        </div>
        <div style="display:none">
            <div id="login-box" class="myform">
                <h1>Login Form</h1>
                <form class="myform" id="form-login" method="post" action="<?php echo site_url('home/login'); ?>">
                    <fieldset>
                        <p><label>Username</label>	<input type="text" name="username_login" id="username_login" class="required"/></p>
                        <p><label>Password</label>	<input type="password" name="password_login" id="password_login" class="required" /></p>
                        <input type="submit" value="Login"  class="button"/>
                    </fieldset>
                </form>
            </div>
        </div>

        <div style="display:none">
            <div id="register-box" class="myform">
                <div id="avatar">
                    <div id="loading" style="display: none">Loading..</div>
                    <img src="http://www.gravatar.com/avatar/" />
                </div>
                <h1>Daftar Sekarang</h1>
                <form id="register-form" class="myform" method="post" action="<?php echo site_url('home/register'); ?>">
                    <fieldset>
                        <p>
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="required"/>
                        </p>
                        <p>
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="required email"/>
                        </p>
                        <p>
                            <label>Username</label>
                            <input type="text" name="username_register" id="username_register" class="required"/>
                            <i id="exist"></i>
                        </p>
                        <p>
                            <label>Password</label>
                            <input type="password" name="password_register" id="password_register" class="required"/>
                        </p>
                        <p>
                            <label>re-Password</label>
                            <input type="password" name="repassword" id="repassword" class="required"/>
                        </p>
                        <p>
                            <label>Tanggal Lahir</label>
                            <input type="text" name="date" id="date" class="required"/>
                        </p>
                        <p>
                            <label>Jeni kelamin</label>
                            <input type="radio" name="jenis" id="jenis" title="Laki- Laki" value="1" class="required"/>Laki-laki<br/>
                            <input type="radio" name="jenis" id="jenis"  title="Perempuan" value="0" class="required"/>Perempuan<br/>
                        </p>
                        <p>
                            <label>Alamat</label>

                            <input type="text" name="alamat" id="alamat" class="required"/>
                        </p>
                        <input type="submit" value="Daftar" class="button" id="register-btn" disabled>
                    </fieldset>
                </form>
            </div>
        </div>

    </body>
    <script type="text/javascript">
        // <![CDATA[
        if ("http:" == document.location.protocol) {
            document.write(unescape("%3Cscript src='" + (("https:" == document.location.protocol) ? "http://cdn.betaeasy.com" : "http://cdn.betaeasy.com") + "/betaeasy.js' type='text/javascript'%3E%3C/script%3E"))
        }
        // ]]>
    </script>
    <script type="text/javascript">
        // <![CDATA[
        try {
            BetaEasy.init({
                betaId: '804',
                styleType: 'new',
                buttonAlign: 'right',
                language: 'en',
                buttonBackgroundColor: '#f00',
                buttonMouseHoverBackgroundColor: '#06C',
                buttonImageActive: 'en/newbtn-6.png',
                buttonImageHover: 'none'
            });
        } catch(err) {}
        // ]]>
    </script>
</html>