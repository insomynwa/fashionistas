jQuery(document).ready(function($){

	$(".kat-link").click(function(){

		var id_kategori = (this.id).split("_").pop();

		doLoadMenuByKategori(id_kategori);

	});

	window.doUpdateDataCustomer = function UpdateDataCustomer(customer, custdata){
		//alert(customer + " : " + custdata['nama']);
		$.post(OnexAjax.ajaxurl,
			{
				customer: customer,
				nama: custdata['nama'],
				telp: custdata['telp'],
				//alamat_area: custdata['alamat_area'],
				detail_alamat: custdata['detail_alamat'],
				action: "AjaxUpdateDataCustomer"
			}
			)
			.done(function(response){

		        $("span.detail-alamat-area").html(custdata['detail_alamat']);
		        $("p.kontak-area").html(custdata['nama'] + ", " + custdata['telp']);
		        $("span.ongkir-area").html("proses perhitungan");
		        $("span.jarak-area").html("");
		        $("h2.total-area").html("proses perhitungan");
				$("#myModal").modal("hide");
				doHitungPembayaran();
			});
	}

	window.doHitungPembayaran = function HitungPembayaran(){
		var distributorArr = [];
		  $("span.ongkir-area").each(function(i){
		    var full_id = $(this).attr("id");
		    var id = full_id.split("_").pop();
		    distributorArr.push(id);
		  });

		  if(distributorArr.length > 0){
		    $.getJSON(OnexAjax.ajaxurl, { action: "AjaxGetOngkir", distributor: distributorArr })
		    .done(function(response){
		      //alert(response[0]['jarak']);
		      for(var i=0; i<distributorArr.length; i++){
		        var distributor = distributorArr[i];
		        $("span#ongkir-area-id_"+distributor).html("Rp." + response[distributor]['ongkir']);
		        $("span#jarak-area-id_"+distributor).html("(" + response[distributor]['jarak'] +" KM)");
		      }
		    });
		  }
	}

	window.doLoadDataPengiriman = function LoadDataPengiriman(){
		
		$.getJSON(OnexAjax.ajaxurl, { action: "AjaxGetDataCustomer" })
		.done(function(response){
		  $("input#modal-nama-customer").val(response['nama']);
		  $("input#modal-telp-customer").val(response['telp']);
		  $("input#modal-alamat-area-customer").val(response['alamat_area']);
		  $("input#modal-detail-alamat-customer").val(response['detail_alamat']);
		  $("input#modal-id-customer").val(response['id']);
		});
	}

	window.doLoadMenuByKategori = function LoadMenuByKategori(id_kategori){
		//$("div#menu-list-area-active").attr("ng-show","isSet("+id_kategori+")");

		var data = {
			'action': 'AjaxGetMenuByKategori',
			'kategori' : id_kategori,
			'security' : OnexAjax.security
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