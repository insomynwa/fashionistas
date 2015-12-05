jQuery(document).ready(function($){

	$(".katlink").click(function(){

		var id_kategori = (this.id).split("_").pop();

		doLoadMenuByKategori(id_kategori);

	});

	window.doLoadMenuByKategori = function LoadMenuByKategori(id_kategori){
		//$("div#menu-list-area-active").attr("ng-show","isSet("+id_kategori+")");

		var data = {
			'action': 'AjaxGetMenuByKategori',
			'kategori' : id_kategori
		};

		//var isactive = $("li.katlink").hasClass("active");

		var nama = $('li#katmenu-list_'+id_kategori).children('a').text();
		$("div.jdl_menu").html('Kategori ' + nama);
		//alert(nama);

		$.get(OnexAjax.ajaxurl, data, function(response){
			$("div.menu-list-area").html(response);
		});
	}
});