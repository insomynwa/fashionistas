<?php 
/* Template Name: delivery package & doc */

get_header(); ?>
<style type="text/css">
  .kol1{
    background-color: #3C3C3C;
    color: #fff;
  }
  .kol2{
    background-color: #0086C8;
    color: #fff;
  }
</style>
  <h2>Nama Menu <!-- ganti nama menu dari database--></h2>
    jenis delivery / distributor / kategori
    <div class="spasi"></div>
  <div class="row">
      <div class="col-lg-6 col-sm-6">
         <div class="thumbnail kol1">
          <h2><center>From : </center></h2>
              <form role="form">
                <div class="form-group">
                  <label for="text">Name:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="text">Address:</label>
                  <input type="text" class="form-control" id="email" placeholder="alamat">
                </div>
                <div class="form-group">
                  <label for="comment">Description Address:</label>
                  <textarea placeholder="Nama jalan, perumahan , RT , RW"class="form-control" rows="5" id="comment"></textarea>
                </div>
                <div class="form-group">
                  <label for="text">Phone Number</label>
                  <input type="text" class="form-control" id="email" placeholder="Phone number">
                </div>
                
              </form>
            </div>
        </div>

      <div class="col-lg-6 col-sm-6">
         <div class="thumbnail kol2">
          <h2><center>To : </center></h2>
              <form role="form">
                <div class="form-group">
                  <label for="text">Name:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="text">Address:</label>
                  <input type="text" class="form-control" id="email" placeholder="alamat">
                </div>
                <div class="form-group">
                  <label for="comment">Description Address:</label>
                  <textarea placeholder="Nama jalan, perumahan , RT , RW"class="form-control" rows="5" id="comment"></textarea>
                </div>
                <div class="form-group">
                  <label for="text">Phone Number</label>
                  <input type="text" class="form-control" id="email" placeholder="Phone number">
                </div>
                
              </form>
            </div>
        </div>

        <div class="col-lg-12">
            <center><button class="btn btn-danger">Submit</button> </center>  
        </div>

     </div><!-- #primary -->

<?php get_footer(); ?>