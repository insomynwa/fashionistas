<?php
/**
 * Template Name: profile
 *
 * This is the template that displays full width pages.
 * 
 * @package aThemes
*/

get_header(); ?>
<?php $user_info = get_userdata(get_current_user_id()); ?>
	<h2>My Profile</h2>
    <div class="spasi"></div>
	<div class="row">
     <!-- <h2>Nama Restaurant</h2>  -->
        <div class="col-lg-12 col-sm-12">
          <div class="col-lg-4 col-sm-6">
            <div class="thumbnail">
                <b>Informasi Kontak</b><br />
                <span>Username: <?php echo $user_info->user_login; ?></span><br />
                <span>Email: <?php /*var_dump($user_info); */echo $user_info->user_email; ?></span>
                <div align="right"><a href data-toggle="modal" data-target="#change_account" id="update-account-link">Ubah</a></div>
                <p></p>
            </div>
          </div>   
          <div class="thumbnail col-lg-7 col-sm-7">
            <p></p>
            <?php 
              $data_user = get_user_data(); 
              $hasData = $data_user->GetId() > 0 ; 
            ?>
            <?php //if( $data_user->GetId() > 0 ): ?>
            <div class="thumbnail">
                <div class="radio">
                  <!-- <label><input type="radio" name="optradio"><b><?php //echo $alamat['data']['nama_alamatarea']; ?></b></label> --><p></p>
                  <p class="data-user-alamat-detail"><?php if( $hasData) echo $data_user->GetAlamatDetail(); else echo 'Anda belum melengkapi data.'; ?></p>
                  <p><span class="data-user-telp"><?php if( $hasData) echo $data_user->GetTelp(); ?></span>, <span class="data-user-nama"><?php if( $hasData) echo $data_user->GetNama(); ?></span></p>
                  <div align="right"><a href data-toggle="modal" data-target="#modal-update-data-user">Ubah</a> | <a href="#">Hapus</a></div>
                </div>
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
                  <?php 
                    $content = get_user_invoices();
                    $nmr = 0;
                  ?>
                <?php if(sizeof($content['invoice'])>0): ?>
                  <?php foreach($content['invoice'] as $invoice): ?>
                  <tr>
                    <td><?php echo ($nmr + 1); ?></td>
                    <td><a href="#"><?php echo $content['distributor'][$nmr]->GetKode().''.get_current_user_id().''.$invoice->GetNomor(); ?></a></td>
                    <td><?php if($invoice->GetStatusAdminConfirm() == 0 && $invoice->GetStatusConfirm() == 1): ?>
                        Waiting
                        <?php elseif($invoice->GetStatusAdminConfirm() == 0 && $invoice->GetStatusConfirm() == 0): ?>
                        Need Confirm
                        <?php elseif($invoice->GetStatusAdminConfirm() == 1 && $invoice->GetStatusConfirm() == 1): ?>
                        On Process
                        <?php elseif($invoice->GetStatusAdminConfirm() == 1 && $invoice->GetStatusActive() == 0): ?>
                        Delivered
                        <?php endif; ?>
                    </td>
                  </tr>
                  <?php $nmr += 1; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
                  <!-- <tr>
                    <td>2</td>
                    <td><a href="#">SD109</a></td>
                    <td>On progress</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><a href="#">PD123</a></td>
                    <td>Delivered</td>
                  </tr> -->
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
            <label for="email">Email: <?php echo $user_info->user_email; ?></label>
            <!-- <input type="text" class="form-control" required id="email"> -->
        </div>
        <div class="form-group">
            <label for="old-password">Password Lama:</label>
            <input type="text" class="form-control" required id="modal-old-password">
        </div>
        <div class="form-group">
            <label for="new-password">Password:</label>
            <input type="text" class="form-control" required id="modal-new-password">
        </div>
        <div class="form-group">
            <label for="confirm-password">Konfirmasi Password:</label>
            <input type="text" class="form-control" required id="modal-confirm-password">
        </div>
        <div align="right"><button type="submit" class="btn btn-default">Submit</button></div>
        <p></p>
    </div>
</div>

<div class="modal fade mdl-profil" id="modal-update-data-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="form-profil">
    <div class="spasi"></div>
    <b>Edit Alamat</b>
        <div class="spasi"></div>
        <div class="form-group">
            <label for="usr">Nama Penerima:</label>
            <input type="text" class="form-control data-user-nama" required id="modal-nama-customer" value="<?php if( $hasData) echo $data_user->GetNama(); ?>">
        </div>
        <div class="form-group">
            <label for="usr">No. Telp:</label>
            <input type="text" class="form-control data-user-telp" required id="modal-telp-customer" value="<?php if( $hasData) echo $data_user->GetTelp(); ?>">
        </div>
        <!-- <div class="form-group">
            <label for="usr">Alamat:</label>
            <input type="text" class="form-control" required id="usr">
        </div> -->
        <div class="form-group">
            <label for="comment">Alamat Detail:</label>
            <textarea class="form-control data-user-alamat-detail" rows="3" required id="modal-detail-alamat-customer"><?php if( $hasData) echo $data_user->GetAlamatDetail(); ?></textarea>
        </div>
        <input type="hidden" id="modal-id-data-customer" value="<?php if( $hasData) echo $data_user->GetId(); ?>"/>
        <a align="right" id="submit-update-data-user"><button type="submit" class="btn btn-default">Submit</button></a>
        <p></p>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready( function( $) {
  $('#myModal').on('shown.bs.modal', function(){
    $('#myInput').focus();
  });

    $("a#update-account-link").click( function () {
        alert("under construction")
    });

    $("a#submit-update-data-user").click( function() {
        //alert("under construction");
        var data = [];
        var id_data = $("input#modal-id-data-customer").val();
        data['nama'] = $("input#modal-nama-customer").val();
        data['telp'] = $("input#modal-telp-customer").val();
        //data['alamat_area'] = $("input#modal-alamat-area-customer").val();
        data['detail_alamat'] = $("textarea#modal-detail-alamat-customer").val();

        window.doUpdateDataCustomer( id_data, data, false);
    });

});
</script>
    
<?php get_footer(); ?>