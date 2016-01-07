<ul>
<?php if( $attributes['jumlah_page'] > 0): ?>
	<?php for($i = 0; $i < $attributes['jumlah_page']; $i++): ?>
	<li><a class="page-link" id="page_<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a></li>
	<?php endfor; ?>
<?php else: ?>
	<li><a class="page-link active" id="page_<?php echo ($i+1); ?>" >1</a></li>
<?php endif; ?>
</ul>
<script type="text/javascript">
jQuery(document).ready( function($) {

    var first_selected_page = 1;
    $("a.page-link").css('cursor','pointer');
    $("a#page_1").addClass('active');
    window.doLoadMenuByKategori(<?php echo $attributes['kategori']; ?>, first_selected_page);
    var currentPage = 1;
    $("a.page-link").click( function() {
      	
        var selected_kategori = $("ul li.active").attr("id");
        //var kategori = selected_kategori.split("_").pop();

        var page = (this.id).split('_').pop();
        if(currentPage != page){
            window.doLoadMenuByKategori( <?php echo $attributes['kategori']; ?>, page);
            $("a#page_"+currentPage).removeClass('active');
            $("a#page_"+page).addClass('active');
            currentPage = page;
        }
    });

});
</script>