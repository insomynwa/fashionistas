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
        <?php foreach( $attributes['menu'][$invoice->nama_dist] as $menu): ?>
        <br><a href="#deskripsi_barang"><?php echo $menu->nama_menudel; ?> <br></a>
        <input class="countx" type="number" min="1" max="9999" value="<?php echo $menu->jumlah_pesanan; ?>" style="font-size:12pt;height:30px"/>
        <a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
        <?php endforeach; ?>
        <!-- <br><a href="#deskripsi_barang">Es teh manis <br></a>
        <input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
        <br><a href="#deskripsi_barang">kelapa muda <br></a>
        <input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
        <br><a href="#deskripsi_barang">mi goreng <br></a>
        <input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a> -->
      </td>
      <td>
        <p></p><b>kebon sirih, jakpus</b>
        <br>perumahan komplek blablabla jl.sempak rombeng no 10
        <div class="divider"></div>
        <p>nama penerima, 089999998888</p>
        <div align="right">
          <a href data-toggle="modal" data-target="#myModal">Ubah Alamat</a>
        </div>
      </td>
      <td>
        <br>Subtotal :  <b>Rp.<?php echo $invoice->nilai_invoice; ?></b>
        <br>Biaya Pengiriman :  <b>Rp.1xxx.xxx</b>
        <div class="divider"></div>
        <br><b>Total (Termasuk PPN):<font color="red"><h2>Rp. 1xxxxx</h2></font> </b> 
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
<script>
function myFunction() {
    var x = document.getElementById("myTime").value;
    document.getElementById("demo").innerHTML = x;
}


</script> 