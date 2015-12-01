<?php 
/* Template Name: menu list */

$content = get_distributor_by_id();
if( !is_null($content) ){
  $gambar = $content['distributor']['gambar'];
  $nama = $content['distributor']['nama'];
  $keterangan = $content['distributor']['keterangan'];
  $alamat = $content['distributor']['alamat'];
}

get_header(); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>                       
    <div class="row">
     <!-- <h2>Nama Restaurant</h2>  -->
        <div class="col-lg-12 col-sm-12">
          <div class="col-lg-3 col-sm-6">
            <div class="thumbnail listresto">
              <a href="/template-overviews/creative" class="post-image-link">
               <img width="100%" height="250" src="<?php echo $gambar; ?>">
                <!-- gambar nanti diambil dari inputan admin yang menu distributor - delivery put -->
              </a>
            </div>
          </div>   
          <div class="humbnail col-lg-7 col-sm-7">
            <h2><?php echo $nama; ?></h2>
            <p><?php echo $keterangan; ?></p>
            <p><i><?php echo $alamat; ?></i></p>
          </div>   
        </div>    
    </div><!-- #primary -->
    <div class="jeda"></div>

    <div class="row">
     <!-- <h2>Nama Restaurant</h2>  -->
     <script type="text/javascript">
    function changeImage(a) {
        document.getElementById("img").src=a;
    }
</script>
        <div class="col-lg-12 col-sm-12">
           <div class="col-md-3 col-sm-3 hero-feature">
                <div class="thumbnail">
                  <div id="thumb_img">
              <p><button type="button" class="btn btn-default" aria-label="Left Align" onclick='changeImage("http://www.mncplaymedia.com//uploads/area/jakarta.gif");'>Jakarta</button>
              <p><button type="button" class="btn btn-default" aria-label="Left Align" onclick='changeImage("http://www.mncplaymedia.com//uploads/area/bandung.gif");'>Bandung</button>
              <p><button type="button" class="btn btn-default" aria-label="Left Align" onclick='changeImage("http://www.mncplaymedia.com//uploads/area/semarang.gif");'>Semarang</button>
              <p><button type="button" class="btn btn-default" aria-label="Left Align" onclick='changeImage("http://www.mncplaymedia.com//uploads/area/surabaya.gif");'>Surabaya</button>
                        <p><button type="button" class="btn btn-default" aria-label="Left Align" onclick='changeImage("http://www.mncplaymedia.com//uploads/area/medan.gif");'>Medan</button>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <div id="main_img">
              <img id="img" src="http://www.mncplaymedia.com//uploads/area/jakarta.gif">
          </div>
                </div>
            </div>
        </div>    
    </div><!-- #primary -->

<?php get_footer(); ?>