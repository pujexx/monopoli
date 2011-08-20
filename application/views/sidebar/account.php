<div class="menu-widget">
    <h1>Profil</h1>
    <div class="content-widget">
        <?php $user = $this->m_user->get_current_user(); ?>
       
        <?php echo gravatar_img($user['email'], 100) ?>
        <?php echo br().$user['nama'].br();?>
        <?php echo anchor("home/logout", "logout"); ?>
    </div>
</div>