<?php 
/* Template Name: delivery put */
get_header(); ?>      
    <div class="row">
      <h2>Pilih Restaaurant</h2>
        <?php
          global $post;
          $post_id = $post->ID;
          $template_name = get_page_template_slug($post_id);
        ?>
        <?php $content = get_distributor_by_template($template_name); ?>
        <?php if( $content!=null && sizeof($content['distributor'])>0 ): ?>
        <?php foreach($content['distributor'] as $distributor): ?>
        <div class="col-lg-4 col-sm-6">
          <div class="thumbnail listresto">
            <a href="#" class="post-image-link">
              <p><a href="<?php echo get_home_url(); ?>/menu-list?distributor=<?php echo $distributor->id_dist; ?>"><img width="100%" height="250" src="<?php echo $distributor->gambar_dist; ?>?<?php echo millitime(); ?>"></a></p>
              <!-- gambar nanti diambil dari inputan admin yang menu distributor - delivery put -->
            </a>
            <div class="caption namadistributor">
              <center><h2><?php echo $distributor->nama_dist; ?></h2></center><!-- nama distributor -->
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div><!-- #primary -->

<?php get_footer(); ?>