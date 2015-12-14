<?php 
/* Template Name: chart */
get_header(); ?>                     
    <div class="row">
      <h2>Chart Belanja</h2>
        <div id="chart-table-area" class="col-lg-12 col-sm-6">
          <!-- diisi table chart -->
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
<script type="text/javascript">
  jQuery(document).ready(function($){
    
    var data= {
      'action' : 'AjaxGetChartTable'
    };

    $.get(OnexAjax.ajaxurl, data, function(response){
      $("div#chart-table-area").html(response);
    });

  });
</script>
<?php get_footer(); ?>