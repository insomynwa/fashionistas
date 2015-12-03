<?php 
/* Template Name: chart */
get_header(); ?>
                           
    <div class="row">
      <h2>Chart Belanja</h2>
        <div class="col-lg-12 col-sm-6">
          <table class="table">
            <thead class="thead-inverse">
              <tr>
                <th width="5%">No</th>
                <th width="25%">Distributor</th>
                <th width="45%">List order</th>
                <th width="25%">Username</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td><img width="200px"src="http://www.startyourrestaurantbusiness.com/wp-content/uploads/2015/03/cheese-cake-factory-logo.jpeg"></td>
                <td>
                  <br><a href="#deskripsi_barang">kue ulang tahun </a> <input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/>
                  <br><a href="#deskripsi_barang">Es teh manis </a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/>
                  <br><a href="#deskripsi_barang">kelapa muda </a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/>
                  <br><a href="#deskripsi_barang">mi goreng </a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/>
                </td>
                <td>
                  <br>Subtotal :  <b>Rp.1xxx.xxx</b>
                  <br>Biaya Pengiriman :  <b>Rp.1xxx.xxx</b>
                  <div class="divider"></div>
                  <br><b>Total (Termasuk PPN):<font color="red"><h2>Rp. 1xxxxx</h2></font> </b> 
                  <p></p>
                  <p align="center"><a href="#masuk-ke-menu bayar"><button class="btn-menu"> Bayar </button> </a></p>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td><img width="200px"src="http://www.startyourrestaurantbusiness.com/wp-content/uploads/2015/03/cheese-cake-factory-logo.jpeg"></td>
                <td>
                  <br><a href="#deskripsi_barang">kue ulang tahun </a> <input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/>
                  <br><a href="#deskripsi_barang">Es teh manis </a><input class="countx" type="number" min="1" max="9999" value="1" style="font-size:12pt;height:30px"/>
                </td>
                <td>
                  <br>Subtotal :  <b>Rp.1xxx.xxx</b>
                  <br>Biaya Pengiriman :  <b>Rp.1xxx.xxx</b>
                  <div class="divider"></div>
                  <br><b>Total (Termasuk PPN):<font color="red"><h2>Rp. 1xxxxx</h2></font> </b> 
                  <p></p>
                  <p align="center"><a href="#masuk-ke-menu bayar"><button class="btn-menu"> Bayar </button> </a></p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>   
        
        
    </div><!-- #primary -->

<?php get_footer(); ?>