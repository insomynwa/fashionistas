<?php 
/* Template Name: menu list */

$content = get_distributor_by_id();
if( !is_null($content) ){
  $gambar = $content['distributor']['gambar'];
  $nama = $content['distributor']['nama'];
  $keterangan = $content['distributor']['keterangan'];
  $alamat = $content['distributor']['alamat'];
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
    <div class="row">
     <!-- <h2>Nama Restaurant</h2>  -->
        <div class="col-lg-12 col-sm-12">
          <div class="col-lg-3 col-sm-6">
            <div class="thumbnail listresto">
              <a href="/template-overviews/creative" class="post-image-link">
               <img width="100%" height="250" src="<?php echo $gambar; ?>">
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
                  <li ng-class="{ active: isSet(1) }">
                      <a href ng-click="setTab(1)">Kategori 1</a>
                  </li>
                  <li ng-class="{ active: isSet(2) }">
                      <a href ng-click="setTab(2)">Kategori 2</a>
                  </li>
                  <li ng-class="{ active: isSet(3) }">
                      <a href ng-click="setTab(3)">Kategori 3</a>
                  </li>
                </ul>
              </div>
              <div class="col-md-10">
                    <div ng-show="isSet(1)">
                      <div class="thumbnail">
                        <div class="jdl_menu">Kategori 1 (nanti diisi kategori)</div>
                        <p></p>
                        <!-- mulai row -->
                         <div class="row text-center">

                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-6 hero-feature">
                              <div class="thumbnail">
                                <p></p>
                                  <h4>Menu 1</h4>
                                  <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://www.edam-burger.com/images/menu/890651burger.jpg" alt=""></a>
                                  <div class="caption">
                                        <b>Rp. 200.000</b>
                                        <p></p>
                                          <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                          <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                      </p>
                                  </div>
                              </div>
                          </div>

                          <center>
                            <!-- paging -->
                                <div id="container">
                                  <div class="paginate wrapper">
                                      <ul>
                                          <li><a href="">&lang;</a></li>
                                          <li><a href="" class="active">1</a></li>
                                          <li><a href="" class="inactive">2</a></li>
                                          <li><a href="">3</a></li>
                                          <li><a href="">4</a></li>
                                          <li><a href="">5</a></li>
                                      </ul>
                                  </div>
                                </div>
                            </center>
                      </div>
                    </div>
                      
                  </div>
                    <div ng-show="isSet(2)">
                      <div class="thumbnail">
                        <div class="jdl_menu">Kategori 2 (nanti diisi kategori)</div>
                            <div class="row text-center">
                              <div class="col-md-4 col-sm-6 hero-feature">
                                <div class="thumbnail">
                                  <p></p>
                                    <h4>Menu 1</h4>
                                    <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://2.bp.blogspot.com/-NKqOd-HVKhc/UFEhura3soI/AAAAAAAAAbc/gJLIIUtCbe4/s1600/golf+course+birthday+cake.jpg" alt=""></a>
                                    <div class="caption">
                                          <b>Rp. 200.000</b>
                                          <p></p>
                                            <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                            <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                      <!-- </div>
                    </div> -->
                  <div ng-show="isSet(3)">
                    <div class="thumbnail">
                      <div class="jdl_menu">Kategori 3 (nanti diisi kategori)</div>
                        <div class="row text-center">
                          <div class="col-md-4 col-sm-6 hero-feature">
                                <div class="thumbnail">
                                  <p></p>
                                    <h4>Menu 1</h4>
                                    <a href="#ke-menu-deskripsi-produk"><img class="gbr-menu" src="http://2.bp.blogspot.com/-NKqOd-HVKhc/UFEhura3soI/AAAAAAAAAbc/gJLIIUtCbe4/s1600/golf+course+birthday+cake.jpg" alt=""></a>
                                    <div class="caption">
                                          <b>Rp. 200.000</b>
                                          <p></p>
                                            <a href="#masuk-ke-chart"><button class="btn-menu"> Pesan Sekarang</button> </a>
                                            <p></p><a href="ke-menu-deskripsi-produk"><button class="btn-menu-detail"> Detail</button> </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>    
    </div><!-- #primary -->


<?php get_footer(); ?>