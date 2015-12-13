<?php
/**
 * Template Name: profile
 *
 * This is the template that displays full width pages.
 * 
 * @package aThemes
*/

get_header(); ?>
<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>
	<h2>My Profile</h2>
    <div class="spasi"></div>
	<div class="row">
     <!-- <h2>Nama Restaurant</h2>  -->
        <div class="col-lg-12 col-sm-12">
          <div class="col-lg-4 col-sm-6">
            <div class="thumbnail">
                <b>Informasi Kontak</b>
                alamatemail@gmail.com
                <div align="right"><a href data-toggle="modal" data-target="#change_account">Ubah</a></div>
                <p></p>
            </div>
            <div class="thumbnail">
                <b>Tambah Alamat</b>
                <div class="spasi"></div>
                <div class="form-group">
                  <label for="usr">Nama Penerima:</label>
                  <input type="text" class="form-control" required id="usr">
                </div>
                <div class="form-group">
                  <label for="usr">No. Telp:</label>
                  <input type="text" class="form-control" required id="usr">
                </div>
                <div class="form-group">
                  <label for="usr">Alamat:</label>
                  <input type="text" class="form-control" required id="usr">
                </div>
                <div class="form-group">
                  <label for="comment">Alamat Detail:</label>
                  <textarea class="form-control" rows="3" required id="comment"></textarea>
                </div>
                <div align="right"><button type="submit" class="btn btn-default">Tambah</button></div>
                <p></p>
            </div>
          </div>   
          <div class="thumbnail col-lg-7 col-sm-7">
            <p></p>
            <!-- <div align="right"><button>tambah alamat</button></div>
            <p></p> -->

            <div class="thumbnail">
                <div class="radio">
                  <label><input type="radio" name="optradio"><b>Mampang, jakarta selatan</b></label><p></p>
                  <p>perumahan blabalbalalala RT 01 Rw 12 jl. maju sedikit</p>
                  <p>089911112222, namapenerima</p>
                  <div align="right"><a href data-toggle="modal" data-target="#change_alamat">Ubah</a> | <a href="#">Hapus</a></div>
                </div>
            </div>
            <div class="thumbnail">
                <div class="radio">
                  <label><input type="radio" name="optradio"><b>kebon sirih, jakarta pusat</b></label><p></p>
                  <p>perumahan dasfdsfdsgfsgsgfsfasdf RT 01 Rw 12 jl. sdfsdfsdfsdt</p>
                  <p>089913423222, namapenerima</p>
                  <div align="right"><a href data-toggle="modal" data-target="#change_alamat">Ubah</a> | <a href="#">Hapus</a></div>
                </div>
            </div>
            <div class="thumbnail">
                <div class="radio">
                  <label><input type="radio" name="optradio"><b>kebon sirih, jakarta pusat</b></label><p></p>
                  <p>perumahan dasfdsfdsgfsgsgfsfasdf RT 01 Rw 12 jl. sdfsdfsdfsdt</p>
                  <p>089913423222, namapenerima</p>
                  <div align="right"><a href data-toggle="modal" data-target="#change_alamat">Ubah</a> | <a href="#">Hapus</a></div>
                </div>
            </div>
            <div align="center">
                paging
            </div>
          </div>   
        </div>    
    </div><!-- #primary -->
    <div class="jeda"></div>
    <h2>Status Order</h2>
    <div class="spasi"></div>
    <div class="row">
     <!-- <h2>Nama Restaurant</h2>  -->
        <div class="col-lg-12 col-sm-12"> 
            <div class="thumbnail">
                <b>Status Order</b>
                <div class="spasi"></div>
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="10%">No</th>
                    <th width="30%">No.Invoice</th>
                    <th width="60%">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><a href="#">PD122</a></td>
                    <td>On progress</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><a href="#">SD109</a></td>
                    <td>On progress</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><a href="#">PD123</a></td>
                    <td>Delivered</td>
                  </tr>
                </tbody>
              </table>
          </div>   
        </div>    
    </div><!-- #primary -->
    <div class="jeda"></div>

<div class="modal fade mdl-profil" id="change_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="form-profil">
    <div class="spasi"></div>
    <b>Edit account</b>
        <div class="spasi"></div>
        <div class="form-group">
            <label for="usr">Email:</label>
            <input type="text" class="form-control" required id="usr">
        </div>
        <div class="form-group">
            <label for="usr">Password:</label>
            <input type="text" class="form-control" required id="usr">
        </div>
        <div class="form-group">
            <label for="usr">Konfirmasi Password:</label>
            <input type="text" class="form-control" required id="usr">
        </div>
        <div align="right"><button type="submit" class="btn btn-default">Submit</button></div>
        <p></p>
    </div>
</div>

<div class="modal fade mdl-profil" id="change_alamat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="form-profil">
    <div class="spasi"></div>
    <b>Edit Alamat</b>
        <div class="spasi"></div>
        <div class="form-group">
            <label for="usr">Nama Penerima:</label>
            <input type="text" class="form-control" required id="usr">
        </div>
        <div class="form-group">
            <label for="usr">No. Telp:</label>
            <input type="text" class="form-control" required id="usr">
        </div>
        <div class="form-group">
            <label for="usr">Alamat:</label>
            <input type="text" class="form-control" required id="usr">
        </div>
        <div class="form-group">
            <label for="comment">Alamat Detail:</label>
            <textarea class="form-control" rows="3" required id="comment"></textarea>
        </div>
        <div align="right"><button type="submit" class="btn btn-default">Submit</button></div>
        <p></p>
    </div>
</div>
    
    
<?php get_footer(); ?>