<?php 
/* Template Name: menu list */

$content = get_distributor_by_id();
if( !is_null($content) ){
  $gambar = $content['distributor']['gambar_dist'];
  $nama = $content['distributor']['nama_dist'];
  $keterangan = $content['distributor']['keterangan_dist'];
  $alamat = $content['distributor']['alamat_dist'];
}

get_header(); ?>
<script type="text/javascript">
angular.module('tabApp', [])
  .controller('TabController', ['$scope', function($scope) {
    $scope.tab = 1;

    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };

    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };
}]);


</script> 
<?php
$tahun = date('Y');
    $tahun %= 2000;
    $bulan = date('n');
    $tgl = date('j');
    $jam = date('G');
    $nomor = $tahun+$bulan+$tgl+$jam;
    echo $tahun .' '. $bulan . ' ' . $tgl . ' ' . ' ' . $jam . ' - ' . date("D M j G:i:s T Y", time()) . ' - ' . time();
?>                   
    <div class="row">
     <!-- <h2>Nama Restaurant</h2>  -->
        <div class="col-lg-12 col-sm-12">
          <div class="col-lg-3 col-sm-6">
            <div class="thumbnail listresto">
              <a href="/template-overviews/creative" class="post-image-link">
               <img width="100%" height="250" src="<?php echo $gambar; ?>?<?php echo millitime(); ?>">
                <!-- gambar nanti diambil dari inputan admin yang menu distributor - delivery put -->
              </a>
            </div>
          </div>   
          <div class="thumbnail col-lg-7 col-sm-7">
            <h2><?php echo $nama; ?></h2>
            <p><?php echo $keterangan; ?></p>
            <p><i><?php echo $alamat; ?></i></p>
          </div>   
        </div>    
    </div><!-- #primary -->
    <div class="jeda"></div>

    <div class="row">
     <!-- <h2>Nama Restaurant</h2>  -->
        <div class="col-lg-12 col-sm-12">
          <div class="container" ng-app="tabApp">
            <div class="row" ng-controller="TabController">
              <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                  <?php if( !is_null($content['katmenu']) && sizeof($content['katmenu']) > 0 ): ?>
                  <?php $nmr=1;foreach ( $content['katmenu'] as $kategori): ?>
                    <li ng-class="{ active: isSet(<?php echo $nmr; ?>) }" class="kat-link" id="katmenu-list_<?php echo $kategori->id_katmenu; ?>">
                      <a href ng-click="setTab(<?php echo $nmr; ?>)"><?php echo $kategori->nama_katmenu; ?></a>
                    </li>
                    <?php $nmr++;endforeach; ?>
                  <?php else: ?>
                    <li>Belum ada kategori.</li>
                  <?php endif; ?>
                </ul>
              </div>
              <div id="menu-area" class="col-md-10">
                <!-- <div id="menu-list-area-active" ng-show="isSet()"> -->
                <div>
                  <div class="thumbnail">
                    <div class="jdl_menu">Kategori 1 (nanti diisi kategori)</div>
                    <p></p>
                    <!-- mulai row -->
                    <div class="row text-center menu-list-area">
                    </div>
                  </div>      
                </div>
              </div>
            </div>
          </div>
        </div>    
    </div><!-- #primary -->
    <script type="text/javascript">
      jQuery(document).ready(function($){
        
        var first_selected_kategori_id = $("ul li.active").attr('id');
        //alert(first_selected_kategori_id);
        if( first_selected_kategori_id != undefined ){
          var id_kategori = (first_selected_kategori_id).split("_").pop();

          window.doLoadMenuByKategori(id_kategori);
        }else{
          $("div.jdl_menu").html("Belum ada menu");        }

      });
    </script>
<?php get_footer(); ?>