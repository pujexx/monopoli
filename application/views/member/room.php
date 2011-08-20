<div class="title-content">
    Pilih Ruangan
</div>



<div class="search-box">
    <form action="<?php echo site_url('member/dashboard/search')?>">
    <input type="text" name="key"/><input type="submit" value="Search"/>
    </form>
</div>
<a href="#form-box-room" id="newroom" class="button">Tambah Ruangan</a>
<div id="room-box">
    <?php
    if ($rooms != null) {
        foreach ($rooms as $room) {
    ?>
            <div class="room" id="<?php echo "room" . $room['id_room']; ?>" title="<?php echo $room['name_room'] ?><br>Kategori : <?php echo $room['name'] ?><br> oleh : <?php echo $room['nama'] ?> <br> <?php echo gravatar_img($room['email'], 50); ?>">
                <h1><?php echo $room['name_room'] ?></h1>
                <span class="count-room">1</span>
                <a href="<?php echo site_url('member/room/s/'.$room['id_room']);?>"> <img src="<?php echo base_url(); ?>public/template/images/room.png"></a>
        <?php if ($this->session->userdata("id_user") == $room['user_id_user']) {
        ?> <p  ><a href="#confirm-del" id="<?php echo $room['id_room']; ?>">(X)</a></p><?php } ?>
    </div>
    <?php }
    } ?>


</div>
<div class="clear"></div>

<?php
    $more = count($rooms);
    $more = $more + 20;
?>
    <div id="more" style="margin-top: 20px;"> <a  class="load_more" href="<?php echo site_url('member/dashboard/more/' . $more); ?>">more</a> </div>
    <div style="display: none">
        <div id="form-box-room">
            <form class="myform" id="room-form" method="post" action="<?php echo site_url('member/dashboard/newroom'); ?>">
                <input type="hidden" name="current"  value="<?php echo $more; ?>">
                <p>
                    <label for="namaroom">Nama Room</label>
                    <input type="text" name="namaroom" class="required">
                </p>
                <p>
                    <label for="category">Kategori</label>
                    <select name="category" class="required">
                    <?php
                    if ($categorys != null) {
                        foreach ($categorys as $category) {
                    ?>

                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                    <?php }
                    } ?>
                </select>
            </p>

            <p>
                <input type="submit" value="Tambah" />
            </p>
        </form>
    </div>
</div>
<div style="display: none">
    <div id="confirm-del">
        <i style="display: none;" id="id-delete"></i>
        <p>Yakin ?</p>
        <a href="#" class="button delete" id="" >Delete</a>
        <a href="#" id="cencel" class="button" onclick="$.fancybox.close()">Cencel</a>
    </div>
</div>