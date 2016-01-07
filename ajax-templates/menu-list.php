<?php if( !is_null($attributes['menudist']) && sizeof($attributes['menudist'])>0): ?>
  <?php $distributor = 0; ?>
  <?php foreach($attributes['menudist'] as $menu): ?>
  <?php if($distributor != $menu->distributor_id) $distributor = $menu->distributor_id; ?>
<div class="col-md-4 col-sm-6 hero-feature">
    <div class="thumbnail">
        <p></p>
        <h4><?php echo $menu->nama_menudel ?></h4>
        <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="<?php echo $menu->gambar_menudel; ?>?<?php echo millitime(); ?>" alt=""></a>
        <div class="caption">
            <b>Rp. <?php echo $menu->harga_menudel ?></b>
            <p></p>
            <?php if( is_user_logged_in() ): ?>
            <a id="menu-pesan-button_<?php echo $menu->id_menudel; ?>" class="menu-pesan-sekarang"><button class="btn-menu"> Pesan Sekarang</button> </a>
            <?php else: ?>
            <a class="menu-pesan-sekarang" href="<?php echo wp_login_url(); ?>"><button class="btn-menu"> Pesan Sekarang</button> </a>
            <?php endif; ?>
            <p></p><a href="<?php echo home_url().'/detail-menu?menu='. $menu->id_menudel; ?>"><button class="btn-menu-detail"> Detail</button> </a></p>
        </div>
    </div>
</div>
  <?php endforeach; ?>
<!-- <center>
  <div id="container">
    <div id="menu-pagination" class="paginate wrapper ">
        <ul>
        <?php //if( $attributes['jumlah_page'] > 0): ?>
            <?php //for($i = 0; $i < $attributes['jumlah_page']; $i++): ?>
            <li><a class="page-link" id="page_<?php //echo ($i+1); ?>"><?php //echo ($i+1); ?></a></li>
            <?php //endfor; ?>
        <?php //elseif( $attributes['jumlah_page']): ?>
            <li><a class="page-link active" id="page_<?php //echo ($i+1); ?>" >1</a></li>
        <?php //endif; ?>
        </ul>
    </div>
  </div>
</center> -->
<?php else: ?>
  Belum ada menu yang tersedia.
<?php endif; ?>
<script type="text/javascript">
jQuery(document).ready( function($) {
    $("a.menu-pesan-sekarang").click( function() {
      
        <?php if( is_user_logged_in()): ?>
        var id_menudel = (this.id).split('_').pop();
        window.doPesanMenu(id_menudel, <?php echo $distributor; ?>, true);

        <?php endif; ?>

    });

});
</script>
