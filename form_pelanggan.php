<?php
/**
 * Template Name: Form pelanggan
 *
 * This is the template that displays full width pages.
 * 
 * @package aThemes
*/

get_header(); ?>
<div class="row">
    <div class="col-lg-6 col-sm-6">
		<form>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama Pemesan</label>
		    <input type="text" class="form-control"  placeholder="Masukkan Nama">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control"  placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">No.telepon</label>
		    <input type="text" class="form-control"  placeholder="No telepon">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Alamat Penerima</label> <!-- *ini nanti pake ajax mbah ambil data nya dari database lokasi yang diinput si admin itu -->
		    <input type="text" class="form-control"  placeholder="nama daerah contoh: mampang">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Detail Alamat Penerima</label>
		    <input type="text" class="form-control" " placeholder="jalan, RT, RW , Kecamatan">
		  </div>
		  
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>
    
<?php get_footer(); ?>