<?php 
/* Template Name: chart */
get_header(); ?>
    <script>
    function myFunction() {
        var x = document.getElementById("myTime").value;
        document.getElementById("demo").innerHTML = x;
    }
    </script>                      
    <div class="row">
      <h2>Chart Belanja</h2>
        <div class="col-lg-12 col-sm-6">
          <table class="table">
            <thead class="thead-inverse">
              <tr>
                <th width="5%">No</th>
                <th width="25%">Distributor</th>
                <th width="25%">List order</th>
                <th width="25%">alamat pengiriman</th>
                <th width="25%">Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td><img width="200px"src="http://www.startyourrestaurantbusiness.com/wp-content/uploads/2015/03/cheese-cake-factory-logo.jpeg"></td>
                <td>
                  <br><a href="#deskripsi_barang">kue ulang tahun <br></a> <input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
                  <br><a href="#deskripsi_barang">Es teh manis <br></a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
                  <br><a href="#deskripsi_barang">kelapa muda <br></a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
                  <br><a href="#deskripsi_barang">mi goreng <br></a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
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
                  <br>Subtotal :  <b>Rp.1xxx.xxx</b>
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
              <tr>
                <th scope="row">1</th>
                <td><img width="200px"src="http://vignette3.wikia.nocookie.net/logopedia/images/b/b6/Pizza_Hut_Logo_2.jpg/revision/latest?cb=20150622080051"></td>
                <td>
                  <br><a href="#deskripsi_barang">kue ulang tahun <br></a> <input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
                  <br><a href="#deskripsi_barang">Es teh manis <br></a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
                  <br><a href="#deskripsi_barang">kelapa muda <br></a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
                  <br><a href="#deskripsi_barang">mi goreng <br></a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/><a href="#hapus-dalam-list">&nbsp<img width="20" src="http://findicons.com/files/icons/99/office/128/delete.png"></a>
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
                  <br>Subtotal :  <b>Rp.1xxx.xxx</b>
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
            </tbody>
          </table>
        </div>   
    </div><!-- #primary -->

<!-- POPUP MODAL -->
  <div class="modal fade" id="myModal" role="dialog">
    <div>
      <form class="onexform">
        <fieldset>
            <legend>Informasi alamat pengiriman</legend>

            <label for="email">Nama penerima</label>
            <input type="text" required placeholder="nama penerima">

            <label for="password">No. telp</label>
            <input type="text" placeholder="No telp">

            <label for="alamat">Alamat</label> <!-- Pake Ajax kaya JNE -->
            <input type="text" placeholder="alamat">

            <label for="alamat_detail">Alamat detail</label>
            <input height="300" type="text" placeholder="perumahan, jalan, RT, RW">

            <p></p>
            <button type="submit">Submit</button>
        </fieldset>
    </form>
    </div>
  </div>
  
</div>

<?php get_footer(); ?>