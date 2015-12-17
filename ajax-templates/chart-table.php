<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th width="5%">No</th> <?php $nomor = 1; ?>
      <th width="25%">Distributor</th>
      <th width="25%">List order</th>
      <th width="25%">alamat pengiriman</th>
      <th width="25%">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php if(sizeof($attributes['invoice']) > 0): ?>
    <?php foreach( $attributes['invoice'] as $invoice ): ?>
    <tr>
      <th scope="row"><?php echo $nomor; ?></th>
      <td><img width="200px"src="<?php echo $invoice->gambar_dist; ?>"></td>
      <td>
        <?php $total_nilai_menu = 0; ?>
        <?php foreach( $attributes['menu'][$invoice->nama_dist] as $menu): ?>
        <br><a href="#deskripsi_barang"><?php echo $menu->nama_menudel; ?> <br></a>
        <input class="countx" type="number" min="1" max="9999" value="<?php echo $menu->jumlah_pesanan; ?>" style="font-size:12pt;height:30px"/>
        <a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
        <?php $total_nilai_menu += ($menu->nilai_pesanan); ?>
        <?php endforeach; ?>
      </td>
      <td>
        <?php if( sizeof($attributes['alamat']) > 0 ): ?>
        <p></p><b><?php //echo $attributes['alamat']['nama_alamatarea']; ?></b>
        <br><span class="detail-alamat-area"><?php echo $attributes['alamat']['alamat_detail_datapembeli']; ?></span>
        <div class="divider"></div>
        <p class="kontak-area"><?php echo $attributes['alamat']['nama_datapembeli']; ?>, <?php echo $attributes['alamat']['telp_datapembeli']; ?></p>
        <?php else: ?>
        <p>Anda belum mengisi data alamat.</p>
        <?php endif; ?>
        <div align="right">
          <a href data-toggle="modal" data-target="#myModal" class="ubah-alamat-link">Ubah Alamat</a>
        </div>
      </td>
      <td>
        <br>Subtotal :  <b>Rp.<?php echo $total_nilai_menu; ?></b>
        <br>Biaya Pengiriman :  <b><span id="ongkir-area-id_<?php echo $invoice->distributor_id; ?>" class="ongkir-area">proses perhitungan</span><span id="jarak-area-id_<?php echo $invoice->distributor_id; ?>" class="jarak-area"></span></b>
        <div class="divider"></div>
        <br><b>Total (Termasuk PPN):<font color="red"><h2 id="total-area-id_<?php echo $invoice->distributor_id; ?>" class="total-area">proses perhitungan</h2></font> </b> 
        <p></p>
        <div class="spasi"></div>
        <p>
          pilih jadwal pengiriman: 
          <div class="radio">
            <label><input type="radio" name="optradio">Now</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio"><input type="time" id="myTime" value="18:15:00"></label>
            <!-- bisa ga mbah ngikutin jam sekarang -->
          </div>
          <a href="#masuk-ke-menu-bayar-cod"><button class="btn-menu"> COD </button> </a>
          <a href="#masuk-ke-menu-bayar-transfer"><button class="btn-menu2"> Transfer </button> </a>
        </p>
      </td>
    </tr>
    <?php $nomor += 1; ?>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
<!-- POPUP MODAL -->
  <div class="modal fade" id="myModal" role="dialog">
    <div>
      <form class="onexform modal-data-pengiriman-form">
        <fieldset>
            <legend>Informasi alamat pengiriman</legend>

            <label for="email">Nama penerima</label>
            <input id="modal-nama-customer" type="text" required placeholder="nama penerima">

            <label for="password">No. telp</label>
            <input id="modal-telp-customer" type="text" placeholder="No telp">

            <!-- <label for="alamat">Alamat</label> --> <!-- Pake Ajax kaya JNE -->
            <!-- <input id="modal-alamat-area-customer" type="text" placeholder="alamat"> -->

            <label for="alamat_detail">Alamat detail</label>
            <input id="modal-detail-alamat-customer" height="300" type="text" placeholder="perumahan, jalan, RT, RW">
            <input type="hidden" id="modal-id-customer" />
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
  window.doHitungPembayaran();

  $("a.ubah-alamat-link").click(function(){
    window.doLoadDataPengiriman();
  });

  $("form.modal-data-pengiriman-form").on('submit',function(){
    event.preventDefault();
    //alert("HELLO");
    var data = [];
    var customer = $("input#modal-id-customer").val();
    data['nama'] = $("input#modal-nama-customer").val();
    data['telp'] = $("input#modal-telp-customer").val();
    //data['alamat_area'] = $("input#modal-alamat-area-customer").val();
    data['detail_alamat'] = $("input#modal-detail-alamat-customer").val();

    window.doUpdateDataCustomer( customer, data);
  });
  
});

</script> 