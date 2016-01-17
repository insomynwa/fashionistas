<table class="table">
    <thead class="thead-inverse">
        <tr>
            <!-- <th width="5%">No</th> <?php //$nomor = 1; ?> -->
            <th width="25%">DISTRIBUTOR</th>
            <th width="25%">LIST ORDER</th>
            <th width="25%">ALAMAT PENGIRIMAN</th>
            <th width="25%">PRICE</th>
        </tr>
    </thead>
    <tbody>
<?php if(sizeof($attributes['invoice']) > 0): ?>
    <?php for( $i = 0; $i < sizeof($attributes['invoice']); $i ++): ?>
        <?php 
            $invoice = $attributes['invoice'][$i];
            $distributor = $attributes['distributor'][$i];
            $pesanan_list = $attributes['pesanan'][$invoice->GetId()];
            $alamat = $attributes['alamat'];
         ?>
        <tr id="row-invoice_<?php echo $invoice->GetId(); ?>">
            <!-- <th scope="row"><?php //echo $nomor; ?></th> -->
            <td>
                <a href="<?php echo home_url().'/menu-list/?distributor='.$distributor->GetId();/*$invoice->id_dist;*/ ?>"><img width="200px"src="<?php echo $distributor->GetGambar();/*$invoice->gambar_dist;*/ ?>?<?php echo millitime(); ?>"></a>
            </td>

            <!-- DAFTAR PESANAN -->
            <td>
        <?php $total_nilai_menu = 0; ?>
                <ul id="menu-invoice_<?php echo $invoice->GetId(); ?>">
            <?php foreach( $pesanan_list as $pesanan): ?>
                <?php $menu = $attributes['menu'][$pesanan->GetId()];?>
                    <li id="menu-pesanan-list_<?php echo $pesanan->GetId(); ?>">
                        <br><a href="<?php echo home_url().'/detail-menu?menu='. $menu->GetId(); ?>"><?php echo $menu->GetNama(); ?> <br></a>
                        <input id="jumlah-pesan_<?php echo $pesanan->GetId(); ?>" class="countx input-jumlah-pesan" type="number" min="1" max="999" value="<?php echo $pesanan->GetJumlahPesanan(); ?>" style="font-size:12pt;height:30px"/>
                        <a href="#hapus-dalam-list" class="hapus-menu-button" id="hapus-menu-button-id_<?php echo $pesanan->GetId(); ?>">
                          &nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png">
                        </a>
                    </li>
              <?php $total_nilai_menu += ($pesanan->GetNilaiPesanan()); ?>
           <?php endforeach; ?>
                </ul>
            </td>
            <!-- ALAMAT PENGIRIMAN -->
            <td>
        <?php $hasAlamat = sizeof($alamat) > 0; ?>
                <p></p><b><?php //echo $attributes['alamat']['nama_alamatarea']; ?></b><br>
                <p class="data-user-alamat-detail"><?php if( $hasAlamat) echo $alamat->GetAlamatDetail(); else echo 'Anda belum melengkapi data.'; ?></p>
                <p>
                    <span class="data-user-telp"><?php if( $hasAlamat) echo $alamat->GetTelp(); ?></span>, 
                    <span class="data-user-nama"><?php if( $hasAlamat) echo $alamat->GetNama(); ?></span>
                </p>
                <div align="right">
                    <a href data-toggle="modal" data-target="#modal-update-data-user" class="ubah-alamat-link">Ubah Alamat</a>
                </div>
            </td>
            <!-- NILAI PEMBAYARAN -->
            <td><br>
                Subtotal :  <b><span id="subtotal-area-id_<?php echo $invoice->GetId(); ?>" class="subtotal-area">Rp.<?php echo number_format($total_nilai_menu, 0,',','.'); ?></span></b><br>
                Biaya Pengiriman :  
                <b>
                    <span id="ongkir-area-id_<?php echo $invoice->GetId(); ?>" class="ongkir-area"><?php if( $invoice->GetBiayaKirim() > 0) echo 'Rp.'.number_format($invoice->GetBiayaKirim(), 0,',','.'); else echo 'alamat belum diisi.' ?></span>
                    <span id="jarak-area-id_<?php echo $invoice->GetId(); ?>" class="jarak-area"><?php if( $invoice->GetJarakKirim() >= 0) echo '('.$invoice->GetJarakKirim().' KM)'; else echo 'alamat belum diisi.' ?></span>
                </b>
                <div class="divider"></div><br>
                <b>
                    Total (Termasuk PPN):
                    <font color="red">
                        <h2>
                            <span id="total-area-id_<?php echo $invoice->GetId(); ?>" class="total-area">
                                <?php if( $invoice->GetBiayaKirim() > 0) echo 'Rp.'.number_format((($total_nilai_menu * 0.05) + $total_nilai_menu + $invoice->GetBiayaKirim()), 0,',','.'); else echo 'alamat belum diisi.' ?>
                            </span>
                        </h2>
                    </font>
                </b> 
                <p></p>
                <div class="spasi"></div>
                <p>
                    pilih jadwal pengiriman: 
                    <div class="radio">
                      <label><input type="radio" value="0" name="jam-kirim_<?php echo $invoice->GetId(); ?>" class="radio-jam-kirim radio-jk_<?php echo $invoice->GetId(); ?>" checked="checked">Sekarang</label>
                      <!-- <label><input type="radio" class="radio-jam-kirim" id="optradio_<?php //echo $invoice->GetId(); ?>" name="jam-kirim_<?php //echo $invoice->GetId(); ?>" checked>Sekarang</label> -->
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" value="<?php echo $invoice->GetId(); ?>" name="jam-kirim_<?php echo $invoice->GetId(); ?>" class="radio-jam-kirim radio-jk_<?php echo $invoice->GetId(); ?> radio-jam-kirim-custom_<?php echo $invoice->GetId(); ?>">
                            <input type="text" class="form-control jam-kirim-txt" id="jam-kirim-pesanan_<?php echo $invoice->GetId(); ?>">
                        </label>
                      <!-- bisa ga mbah ngikutin jam sekarang -->
                    </div>
                    <a class="cod-link" id="cod_<?php echo $invoice->GetId(); ?>"><button class="btn-menu"> COD </button> </a>
                    <a class="transfer-link" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modal-bank" id="modal-transfer-link_<?php echo $invoice->GetId(); ?>"><button class="btn-menu2"> Transfer </button> </a>
                </p>
            </td>
        </tr>
        <?php $nomor += 1; ?>
    <?php endfor; ?>
<?php endif; ?>
    </tbody>
</table>
<!-- POPUP MODAL -->
<div class="modal fade" id="modal-update-data-user" role="dialog">
    <div>
          <form class="onexform modal-data-pengiriman-form">
              <fieldset>
                  <legend>Informasi alamat pengiriman</legend>

                  <label for="email">Nama penerima</label>
                  <input id="modal-nama-customer" type="text" class="data-user-nama" required placeholder="nama penerima" value="<?php if( $hasAlamat) echo $alamat->GetNama(); ?>">
                  <label for="password">No. telp</label>
                  <input id="modal-telp-customer" type="number" class="data-user-telp" placeholder="No telp" value="<?php if( $hasAlamat) echo $alamat->GetTelp(); ?>">
                  <!-- <label for="alamat">Alamat</label> --> <!-- Pake Ajax kaya JNE -->
                  <!-- <input id="modal-alamat-area-customer" type="text" placeholder="alamat"> -->
                  <label for="alamat_detail">Alamat detail</label>
                  <input id="modal-detail-alamat-customer" class="data-user-alamat-detail" height="300" type="text" placeholder="perumahan, jalan, RT, RW" value="<?php if( $hasAlamat) echo $alamat->GetAlamatDetail(); ?>">
                  <input type="hidden" id="modal-id-data-customer" value="<?php if( $hasAlamat) echo $alamat->GetId(); ?>" />
                  <p></p>
                  <button type="submit">Submit</button>
              </fieldset>
        </form>
    </div>
</div>
<div class="modal fade" id="modal-bank" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Info Transfer Pembayaran</h4>
            </div>
            <div class="modal-body">
                <?php if( sizeof( $attributes['bank'])): ?>
                <form id="form-modal-pembayaran">
                    <?php for( $i=0; $i < sizeof($attributes['bank']); $i++): ?>
                    <input type="radio" class="bank-radio" name="bank-radio" value="<?php echo $attributes['bank'][$i]->GetId(); ?>" <?php if($i==0) echo 'checked'; ?> /> <span><?php echo $attributes['bank'][$i]->GetNama(); ?></span>, <span><?php echo $attributes['bank'][$i]->GetNoRekening(); ?></span> a.n. <span><?php echo $attributes['bank'][$i]->GetPemilik(); ?></span><br />
                    <?php endfor; ?>
                    <input type="hidden" id="invoice-id" name="invoice-id" />
                    <input type="submit" name="pembayaran-submit" value="Konfirmasi Transfer Pembayaran" />
                </form>
                <?php endif; ?>
                
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
  
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTime").value;
    document.getElementById("demo").innerHTML = x;
}

jQuery(document).ready(function($){

  $("input.jam-kirim-txt").wickedpicker({
      now: new Date(),
      twentyFour:true
  });

  $("input.jam-kirim-txt").focus( function() {
    var invoice = (this.id).split('_').pop();
    $("input.radio-jam-kirim-custom_"+invoice).attr('checked','checked');
  });

  $("a.transfer-link").click( function(){
      var aId = this.id;
      var invoice = aId.split('_').pop();
      $("#modal-bank").find("input[name='invoice-id']").val(invoice);
  });

  $("a.hapus-menu-button").click( function(){
    var menu_pesanan = (this.id).split('_').pop();
    
    window.doDeletePesanan(menu_pesanan);
  });

  $(".input-jumlah-pesan").on('change keyup', function(){
    var menu_pesanan = (this.id).split('_').pop();
    var jumlah = this.value;
    window.doUpdateJumlahPesanan( menu_pesanan, jumlah);
  });

  $("form.modal-data-pengiriman-form").submit(function(event){
    event.preventDefault();
    var data = [];
    var id_data = $("input#modal-id-data-customer").val();
    data['nama'] = $("input#modal-nama-customer").val();
    data['telp'] = $("input#modal-telp-customer").val();
    data['detail_alamat'] = $("input#modal-detail-alamat-customer").val();

    window.doUpdateDataCustomer( id_data, data, true);
  });

    $("form#form-modal-pembayaran").submit( function(event) {
        event.preventDefault();
        var invoice = $("input#invoice-id").val();
        
        var bank = $("input[name='bank-radio']:checked").val();
        
        pembayaran(invoice, bank, 1);
        
    });

    $("a.cod-link").click( function (){
        var invoice = (this.id).split('_').pop();
        var bank = 0;
        pembayaran(invoice, bank, 0);
    });

    function pembayaran(invoice, bank, modebayar){
        var jnsJamKirim = $("input[name='jam-kirim_"+invoice+"']:checked").val();
        var jam_kirim;
        if( jnsJamKirim == 0) {
            jam_kirim = 0;
        }else{
            var nospaces = ($("input#jam-kirim-pesanan_"+invoice).val()).replace(/\s+/g, '');
            var h = nospaces.substring(0,2);
            var m = nospaces.substring(3);
            jam_kirim = h+""+m;
        }

        var data = {
            'invoice' : invoice,
            'bank' : bank,
            'mode' : modebayar,
            'jam_kirim' : jam_kirim,
            'action' : "AjaxPostTransferPembayaranL"
        };
        /*var h = data['jam_kirim'].replace(/\s+/g, '').substring(0,2);
        var m = data['jam_kirim'].replace(/\s+/g, '').substring(3);*/
        //alert(data['invoice']);
        $.post(OnexAjax.ajaxurl, data, function(response) {
            var result = jQuery.parseJSON(response);
            if( result.status != true){
                
                //return false;
            }else{
                location.href = "<?php echo home_url() ?>/" + result.direct;
            }
        });
    }
  
});

</script> 