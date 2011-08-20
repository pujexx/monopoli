
<div class="content">
    <div class="title-content">
        <h1>Mulai Permainan</h1>
    </div>
    <?php foreach ($user_in_room as $user_in) {
    ?>
        <div class="user">
        <?php echo gravatar_img($user_in['email'], 60) ?>
    </div>
    <?php } ?>
    <div id="test1" class="map gmap3">

    </div>
    <div id="panTo"></div>
</div>