<?php
if ($rooms != null) {
    foreach ($rooms as $room) {
?>
        <div class="room" title="<?php echo $room['name_room'] ?><br>Kategori : <?php echo $room['name'] ?><br> oleh : <?php echo $room['nama'] ?> <br> <?php echo gravatar_img($room['email'], 50); ?>">
            <h1><?php echo $room['name_room'] ?></h1>
            <span class="count-room">1</span>
            <img src="<?php echo base_url(); ?>public/template/images/room.png">

        </div>

<?php }
} ?>
<?php echo $room['id_room'];?>
<?php if (count($rooms) == 2) {
?>
    <div class="clear"></div>
    <div id="more"> <a  id="<?php echo $room['id_room']; ?>" class="load_more" href="#"><?php ?>more</a> </div>
<?
} else {
    echo '<div class="clear"></div>';
    echo '   <div id="more">
    <a  id="end" class="load_more" href="#">No More Posts </a>  </div>';
}
?>
