<?php 
/* Template Name: chart */
get_header(); ?>                    
    <div class="row">
      <h2>Chart Belanja</h2>
        <div id="chart-table-area" class="col-lg-12 col-sm-6">
          <!-- diisi table chart -->
        </div>   
    </div><!-- #primary -->
<script type="text/javascript">
  jQuery(document).ready(function($){
    
    var data= {
      'action' : 'AjaxGetChartTableL'
    };

    $.get(OnexAjax.ajaxurl, data, function(response){
      $("div#chart-table-area").html(response);
    });

  });
</script>
<?php get_footer(); ?>