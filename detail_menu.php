<?php
/**
 * Template Name: detaIL menu
 *
 * This is the template that displays full width pages.
 * 
 * @package aThemes
*/

$content = get_detail_menu();

get_header(); ?>
	<h2><?php echo $content['menudel']->GetNama(); ?> <!-- ganti nama menu dari database--></h2>
    <?php echo $content['katdel']->GetNama().' / '.$content['distributor']->GetNama().' / '.$content['katmenu']->GetNama(); ?>
    <div class="spasi"></div>
	<div class="row">
        <div class="col-lg-6 col-sm-6">
          <img class="gbr-detail-menu" src="<?php echo $content['menudel']->GetGambar(); ?>?<?php echo millitime(); ?>">
        </div>
        <div class="col-lg-6 col-sm-6">
          <?php echo $content['menudel']->GetKeterangan(); ?>
          <div class="spasi"></div>
          <h2>Rp.<?php echo $content['menudel']->GetHarga(); ?> </h2><!-- harga dari database -->
          <?php if( is_user_logged_in() ): ?>
            <a id="menu-pesan-button_<?php echo $content['menudel']->GetId(); ?>" class="menu-pesan-sekarang"><button class="btn-menu"> Pesan Sekarang</button> </a>
            <?php else: ?>
            <a class="menu-pesan-sekarang" href="<?php echo home_url().'/otw-adm.php; ?>"><button class="btn-menu"> Pesan Sekarang</button> </a>
          <?php endif; ?>
        </div>
    </div><!-- #primary -->
<script type="text/javascript">
jQuery(document).ready( function($) {
  $("a.menu-pesan-sekarang").click( function() {
    
    <?php if( is_user_logged_in()): ?>
    var id_menudel = (this.id).split('_').pop();
    window.doPesanMenu(id_menudel, <?php echo $content['distributor']->GetId(); ?>, true);

    <?php endif; ?>

  });
});
</script>
    
<?php get_footer(); ?>