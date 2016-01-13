<?php 
/* Template Name: SP Home */
get_header(); ?>

  <div class="row">
    <div class="col-md-8 banner-home img-responsive"><img width="100%" height="400" src="http://www.decathlon.co.uk/ecuk/static/Delivery/home-delivery-banner.jpg"></div>
    <div class="col-md-4">
        <section style="background:#f5f5f5; height:257px;">
          <form name="loginform" id="loginform" method="post" action="<?php echo home_url().'/otw-adm.php'; ?>" role="login">
            <b style="font-size:20px;">Login</b><p></p>
            <input type="text" id="user_login" name="log" placeholder="Username" required class="form-control input input-lg" />
            
            <input type="password" class="form-control input-lg" name="pwd" id="password" placeholder="Password" required />
            
            
            <div class="pwstrength_viewport_progress"></div>
            <div class="checdkbox">
                 <label>
                    <input name="rememberme" id="rememberme" value="forever" type="checkbox"> Remember me
                 </label>
            </div>
            
            
            <center>
              <button type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary">Sign in</button>
              <p></p>
              <div>
                New User? <a href="<?php echo home_url().'/otw-adm.php?action=register'; ?>">Create New Account</a> <br>
                <a href="<?php echo home_url().'/otw-adm.php?action=lostpassword'; ?>">Forgot Password</a>
              </div>
            </center>
          </form>
        </section>  
    </div>
  </div>                                
  <div>
    <div class="spasi"></div>
    <div>
      <b><div class="title">Jasa & Layanan</div></b>
    <div class="spasi"></div>
      <div class="row">
        <div class="col-md-4"><img width="100%" height="200" src="http://one08express.com/one08_files/a9efb8_ef3bf30f600642378d22_0.50_1.20_0.00_png_srz.png">
          <h2>One Stop Shopping</h2>
          <p>Kami bekerja sama dengan beberapa restaurant atau Hotel  dalam hal pemesanan dan pengaantaran catering/cake. Dalam hal ini kami juga sekaligus memasarkan produk yang dimiliki oleh pihak klien kami melalui katalog atau list product, dengan begitu pemilik restaurant mendapat dua keuntungan yaitu promosi dan operasional pengantaran yang akan di tangani oleh kami.</p>
        </div>
        <div class="col-md-4"><img width="100%" height="200" src="http://one08express.com/one08_files/a9efb8_f7bd68d89f024adc8122_0.50_1.20_0.00_png_srz.png">
          <h2>Reguler Cash On Delivery</h2>
          <p>Kami sadar apa artinya “URGENT” dan Kebutuhan yang perlu diantar secara cepat dalam waktu yang terbatas, layanan instant Courier kami akan langsung menjemput dan mengantar barang anda kemanapun di Jakarta secepat mungkin. Kami juga menangani distribusi undangan atau ticket untuk acara anda .</p>
        </div>
        <div class="col-md-4"><img width="100%" height="200" src="http://one08express.com/one08_files/a9efb8_25a485846d454d08b822_0.50_1.20_0.00_png_srz.png">
          <h2>Dedicated/Corporate Service</h2>
          <p>Anda memiliki usaha Restaurant, Cake Shop, online Shopping atau apapun yang membutuhkan armada pengantaran. Tidak perlu repot untuk men set up delivery service. kami akan sepenuhnya membantu anda. Tidak perlu repot investasi kendaraan / motor, rekrut armada dan tidak perlu pusing memikirkan resiko, karena semua akan menjadi tanggung jawab kami.  dengan biaya yang efisien.  Disamping itu kami juga akan membantu memasarkan produk anda.</p>
        </div>
      </div>  
    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_footer(); ?>