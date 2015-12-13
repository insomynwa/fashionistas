<?php if( !is_null($attributes['menudist']) && sizeof($attributes['menudist'])>0): ?>
  <?php foreach($attributes['menudist'] as $menu): ?>
<div class="col-md-4 col-sm-6 hero-feature">
  <div class="thumbnail">
    <p></p>
    <h4><?php echo $menu->nama_menudel ?></h4>
    <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="<?php echo $menu->gambar_menudel; ?>?<?php echo millitime(); ?>" alt=""></a>
    <div class="caption">
      <b>Rp. <?php echo $menu->harga_menudel ?></b>
      <p></p>
      <a id="menu-pesan-button_<?php echo $menu->id_menudel; ?>" class="menu-pesan-sekarang"><button class="btn-menu"> Pesan Sekarang</button> </a>
      <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a></p>
    </div>
  </div>
</div>
  <?php endforeach; ?>
<center>
  <!-- paging -->
  <div id="container">
    <div class="paginate wrapper">
        <ul>
            <li><a href="">&lang;</a></li>
            <li><a href="" class="active">1</a></li>
            <li><a href="" class="inactive">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
        </ul>
    </div>
  </div>
</center>
<?php else: ?>
  Belum ada menu yang tersedia.
<?php endif; ?>
<script type="text/javascript">
jQuery(document).ready( function($) {
  $("a.menu-pesan-sekarang").click( function() {
    
    <?php if( is_user_logged_in()): ?>
    var id_menudel = (this.id).split('_').pop();

    // save to invoice
    var data = {
      'action'   : 'AjaxCustomerPesanMenu',
      'menu' : id_menudel,
      'security' : OnexAjax.security
    }

    $.post(OnexAjax.ajaxurl, data, function(response) {
      
    });
    //alert(id_menudel + " <?php echo is_user_logged_in(); ?>");
    <?php else: ?>

    <?php endif; ?>

  });
});
</script>
