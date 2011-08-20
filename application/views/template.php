<html>
    <head>
        <title><?php
if (!empty($title)) {
    echo $title;
} else {
    echo "Monopoli";
}
?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/960.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/text.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/template/css/style.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>public/template/js/jquery-1.6.2.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/template/js/global.js" ></script>


        <?php
        if (!empty($js)) {
            $this->load->view("asset/" . $js);
        }
        ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/template/js/growl.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.room').tipTip();
                $(".room h1").hover(function(){
                    title = $(this).html();
                    $.Growl.show(title);
                });


            });
        </script>
    </head>
    <body>
        <!--Global User-->

        <!--end Global User-->
        <div class="top">
            <div class="logo"></div>
        </div>
        <div class="container_12">
            <div class="grid_8 left-auter">
                <!--content-->
                <div class="content">
                    <?php if (!empty($content)) {
 ?>
<?php $this->load->view("member/" . $content); ?>
<?php } ?>

                </div>
                <!--End Content-->

            </div>
            <div class="grid_4">
                <?php $this->load->view("sidebar/account"); ?>

<?php if (!empty($sidebar)) { ?>
<?php $this->load->view("sidebar/" . $sidebar); ?>
<?php } ?>

                </div>
                <div class="clear"></div>
            </div>
            <div class="footer">&nbsp;</div>
            <div class="loading">
                <img src="<?php echo base_url(); ?>public/template/images/loading.gif" />
            <br>
            Loading...
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