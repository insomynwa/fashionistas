<table class="table">
    <thead class="thead-inverse">
        <tr>
            <!-- <th width="5%">No</th> <?php //$nomor = 1; ?> -->
            <th width="25%">Distributor</th>
            <th width="25%">List order</th>
            <th width="25%">alamat pengiriman</th>
            <th width="25%">Price</th>
        </tr>
    </thead>
    <tbody>
<?php /*var_dump($attributes['invoice']); */if(sizeof($attributes['invoice']) > 0): ?>
    <?php for( $i = 0; $i < sizeof($attributes['invoice']); $i ++)://foreach( $attributes['invoice'] as $invoice ): ?>
        <?php 
            $invoice = $attributes['invoice'][$i];
            $distributor = $attributes['distributor'][$i];
            $pesanan_list = $attributes['pesanan'][$invoice->GetId()];
            $alamat = $attributes['alamat'];
            //print_r($pesanan_list);die;
         ?>
        <tr id="row-invoice_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>">
            <!-- <th scope="row"><?php //echo $nomor; ?></th> -->
            <td>
                <a href="<?php echo home_url().'/menu-list/?distributor='.$distributor->GetId();/*$invoice->id_dist;*/ ?>"><img width="200px"src="<?php echo $distributor->GetGambar();/*$invoice->gambar_dist;*/ ?>?<?php echo millitime(); ?>"></a>
            </td>

            <!-- DAFTAR PESANAN -->
            <td>
        <?php $total_nilai_menu = 0; /*var_dump(sizeof($attributes['pesanan']));*/ ?>
                <ul id="menu-invoice_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>">
            <?php foreach( $pesanan_list as $pesanan):/*$attributes['menu'][$invoice->nama_dist] as $menu):*/ ?>
                <?php $menu = $attributes['menu'][$pesanan->GetId()];?>
                    <li id="menu-pesanan-list_<?php echo $pesanan->GetId();/*$menu->id_pesanan;*/ ?>">
                        <br><a href="<?php echo home_url().'/detail-menu?menu='. $menu->GetId();/*$menu->id_menudel;*/ ?>"><?php echo $menu->GetNama();/*$menu->nama_menudel;*/ ?> <br></a>
                        <input id="jumlah-pesan_<?php echo $pesanan->GetId();/* $menu->id_pesanan;*/ ?>" class="countx input-jumlah-pesan" type="number" min="1" max="999" value="<?php echo $pesanan->GetJumlahPesanan();/*$menu->jumlah_pesanan;*/ ?>" style="font-size:12pt;height:30px"/>
                        <a href="#hapus-dalam-list" class="hapus-menu-button" id="hapus-menu-button-id_<?php echo $pesanan->GetId();/*$menu->id_pesanan;*/ ?>">
                          &nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png">
                        </a>
                    </li>
              <?php $total_nilai_menu += ($pesanan->GetNilaiPesanan()/*$menu->nilai_pesanan*/); ?>
           <?php endforeach; ?>
                </ul>
            </td>
            <!-- ALAMAT PENGIRIMAN -->
            <td>
        <?php $hasAlamat = sizeof($alamat) > 0;//if( sizeof($alamat) > 0 ): ?>
                <p></p><b><?php //echo $attributes['alamat']['nama_alamatarea']; ?></b><br>
                <p class="data-user-alamat-detail"><?php if( $hasAlamat) echo $alamat->GetAlamatDetail(); else echo 'Anda belum melengkapi data.'; ?></p>
                  <p><span class="data-user-telp"><?php if( $hasAlamat) echo $alamat->GetTelp(); ?></span>, <span class="data-user-nama"><?php if( $hasAlamat) echo $alamat->GetNama(); ?></span></p>
                <!-- <span class="data-user-alamat-detail"><?php //if(sizeof($alamat)>0) echo $alamat->GetAlamatDetail(); else echo 'Anda belum mengisi data alamat.'; ?></span>
                <div class="divider"></div>
                <p class="kontak-area">
                  <?php //if(sizeof($alamat)>0): ?>
                    <?php //echo $alamat->GetNama(); ?>, <span class="data-user-telp"><?php //echo $alamat->GetTelp(); ?></span>
                  <?php //endif; ?>
                </p> -->
        <?php //else: ?>
                <!-- <p>Anda belum mengisi data alamat.</p> -->
        <?php //endif; ?>
                <div align="right">
                  <a href data-toggle="modal" data-target="#modal-update-data-user" class="ubah-alamat-link">Ubah Alamat</a>
                </div>
            </td>
            <!-- NILAI PEMBAYARAN -->
            <td><br>
                Subtotal :  <b><span id="subtotal-area-id_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>" class="subtotal-area">Rp.<?php echo $total_nilai_menu; ?></span></b><br>
                Biaya Pengiriman :  
                <b>
                    <span id="ongkir-area-id_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>" class="ongkir-area"><?php if( $invoice->GetBiayaKirim()/*$invoice->biaya_kirim_invoice*/ > 0) echo $invoice->GetBiayaKirim()/*$invoice->biaya_kirim_invoice*/; else echo 'alamat belum diisi.' ?></span>
                    <span id="jarak-area-id_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>" class="jarak-area"><?php if( $invoice->GetJarakKirim()/*$invoice->jarak_kirim_invoice*/ >= 0) echo '('.$invoice->GetJarakKirim()/*$invoice->biaya_kirim_invoice*/.' KM)'; else echo 'alamat belum diisi.' ?></span>
                </b>
                <div class="divider"></div><br>
                <b>
                    Total (Termasuk PPN):
                    <font color="red">
                        <h2><span id="total-area-id_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>" class="total-area"><?php if( $invoice->GetBiayaKirim()/*$invoice->biaya_kirim_invoice*/ > 0) echo 'Rp.'.(($total_nilai_menu * 0.05)+$total_nilai_menu+$invoice->GetBiayaKirim()/*$invoice->biaya_kirim_invoice*/); else echo 'alamat belum diisi.' ?></span></h2>
                    </font>
                </b> 
                <p></p>
                <div class="spasi"></div>
                <p>
                    pilih jadwal pengiriman: 
                    <div class="radio">
                      <label><input type="radio" name="optradio_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>" checked>Sekarang</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" id="radio-jam-kirim_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>" name="optradio_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>"><input class="form-control jam-kirim" type="text" id="jam-kirim-pesanan_<?php echo $invoice->GetId();/*$invoice->id_invoice;*/ ?>"></label>
                      <!-- <label><input type="radio" name="optradio_<?php //echo $invoice->id_invoice; ?>"><input type="time" id="myTime" value="18:15:00"></label> -->
                      <!-- bisa ga mbah ngikutin jam sekarang -->
                    </div>
                    <a href="#masuk-ke-menu-bayar-cod"><button class="btn-menu"> COD </button> </a>
                    <a href="#masuk-ke-menu-bayar-transfer"><button class="btn-menu2"> Transfer </button> </a>
                </p>
            </td>
        </tr>
        <?php $nomor += 1; ?>
    <?php endfor;//endforeach; ?>
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
                  <input id="modal-telp-customer" type="text" class="data-user-telp" placeholder="No telp" value="<?php if( $hasAlamat) echo $alamat->GetTelp(); ?>">
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
  
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTime").value;
    document.getElementById("demo").innerHTML = x;
}

jQuery(document).ready(function($){

  $("input.jam-kirim").wickedpicker({
    now: new Date(),
    twentyFour:false
  });

  $("input.jam-kirim").focus( function() {
    var invoice = (this.id).split('_').pop();
    $("input#radio-jam-kirim_"+invoice).attr('checked','checked');
  });

  $("a.hapus-menu-button").click( function(){
    var menu_pesanan = (this.id).split('_').pop();
    
    window.doDeletePesanan(menu_pesanan);
  });

  $("a.ubah-alamat-link").click(function(){
    //window.doLoadDataPengiriman();
  });

  $(".input-jumlah-pesan").on('change keyup', function(){
    var menu_pesanan = (this.id).split('_').pop();
    var jumlah = this.value;
    window.doUpdateJumlahPesanan( menu_pesanan, jumlah);
  });

  $("form.modal-data-pengiriman-form").submit(function(event){//on('submit',function(){
    event.preventDefault();
    //alert("HELLO");
    var data = [];
    var id_data = $("input#modal-id-data-customer").val();
    data['nama'] = $("input#modal-nama-customer").val();
    data['telp'] = $("input#modal-telp-customer").val();
    //data['alamat_area'] = $("input#modal-alamat-area-customer").val();
    data['detail_alamat'] = $("input#modal-detail-alamat-customer").val();

    window.doUpdateDataCustomer( id_data, data, true);
    //window.doHitungOngkir();
    //window.doHitungTotalPembayaran();
  });
  
});

</script> 