jQuery(document).ready(function($){

	$(".kat-link").click(function(){

		var id_kategori = (this.id).split("_").pop();

		//doLoadMenuByKategori(id_kategori,1);
		doLoadMenuPagination(id_kategori);
	});

	window.doPesanMenu = function PesanMenu(id, distributor, doUpdateItem){
		
	    var id_menudel = id;

	    // save to invoice
	    var data = {
	      'action'   : 'AjaxCustomerPesanMenu',
	      'distributor' : distributor,
	      'menu' : id_menudel,
	      'security' : OnexAjax.security
	    }

	    $.post(OnexAjax.ajaxurl, data, function(response) {
	        var result = jQuery.parseJSON(response);
	        if( result.status != true){
	            alert(result.message);
	        }else{
	        	if(doUpdateItem){
	            	$("i#jumlah-pesan-area").html(result.total_jumlah_jenis_pesanan + " item");
	            }
	        }
		});
		
	}

	window.doDeletePesanan = function DeletePesanan(menu_pesanan){
		$.post(OnexAjax.ajaxurl,{ pesanan_menu : menu_pesanan, action: "AjaxDeletePesananMenu" })
		.done( function (response) {
			var result = jQuery.parseJSON( response);
			if( result.status == true){
				var parent_id = $("li#menu-pesanan-list_" + menu_pesanan).parent().attr("id");
				var invoice = parent_id.split('_').pop();
				if( result.code == 1){
					$("li#menu-pesanan-list_" + menu_pesanan).remove();
					doHitungTotalMenu(invoice);
				}else if (result.code == 2){
					$("tr#row-invoice_" + invoice).remove();
				}
			}
		});
	}

	window.doUpdateJumlahPesanan = function UpdateJumlahPesanan(menu_pesanan, jumlah){
		$.post( OnexAjax.ajaxurl, { pesanan_menu : menu_pesanan, jumlah_pesanan : jumlah, action: "AjaxUpdateJumlahPesanan" })
		.done( function (response) {
			var result = jQuery.parseJSON( response);

			if( result.status == true){
				var parent_id = $("li#menu-pesanan-list_" + menu_pesanan).parent().attr("id");
				//$("li#menu-pesanan-list_" + menu_pesanan).remove();
				var invoice = parent_id.split('_').pop();
				doHitungTotalMenu(invoice);
			}
		});
	}

	window.doHitungTotalMenu = function HitungTotalMenu(invoice_id){

		$.get(OnexAjax.ajaxurl, { action: "AjaxGetTotalMenu", invoice: invoice_id })
		.done(function(response){
			$("span#subtotal-area-id_"+invoice_id).html("Rp." + response);
			doHitungTotalPembayaran(false, invoice_id);
		});
	}

	window.doUpdateDataCustomer = function UpdateDataCustomer(id_data, custdata, showTarifJarak){
		//alert(customer + " : " + custdata['nama']);
		$.post(OnexAjax.ajaxurl,
			{
				id_data: id_data,
				nama: custdata['nama'],
				telp: custdata['telp'],
				//alamat_area: custdata['alamat_area'],
				detail_alamat: custdata['detail_alamat'],
				action: "AjaxUpdateDataCustomer"
			}
			)
			.done(function(response){
				var result = jQuery.parseJSON(response);
				//alert(result.status);
				if(result.status == true){
					if(result.code == 1){
				        $(".data-user-alamat-detail").html(custdata['detail_alamat']);
				        //$("p.kontak-area").html(custdata['nama'] + ", " + custdata['telp']);
				        $(".data-user-telp").html(custdata['telp']);
				        $(".data-user-nama").html(custdata['nama']);

				        if(showTarifJarak){
					        $("span.ongkir-area").html("proses perhitungan");
					        $("span.jarak-area").html("");
					        $("span.total-area").html("proses perhitungan");
						}
						doHitungOngkir();
				    }
					$("#modal-update-data-user").modal("hide");
				}else{
					//$("#myModal").modal("hide");
				}
			});
	}

	window.doHitungOngkir = function HitungOngkir(){
			$.getJSON(OnexAjax.ajaxurl, { action: "AjaxGetOngkir"/*, invoice: invoiceArr*/ })
			.done(function(response){
				//alert(response['invoice']);
				for( var i=0; i<(response['invoice']).length; i++){
					var invoice = response['invoice'][i];//alert(response['invoice'][i]);
					var jarak = response[invoice]['jarak'];
					var ongkir = response[invoice]['ongkir'];
					$("span#ongkir-area-id_"+invoice).html("Rp." + ongkir);
					$("span#jarak-area-id_"+invoice).html("(" + jarak +" KM)");
					
				}
				doHitungTotalPembayaran(true, 0);
			});
		//}
	}

	window.doHitungTotalPembayaran = function HitungTotalPembayaran(all_invoice, invoice_id){

		var invoiceArr = [];
		if(all_invoice) {
			$("span.total-area").each(function(i){
				var full_id = $(this).attr("id");
				var id = full_id.split("_").pop();
				invoiceArr.push(id);
			});
		}else{
			invoiceArr.push(invoice_id);
		}

		if(invoiceArr.length > 0){
			$.getJSON(OnexAjax.ajaxurl, { action: "AjaxGetTotalPembayaran", invoice: invoiceArr })
			.done(function(response){
				//alert(response[0]['jarak']);
				for(var i=0; i < invoiceArr.length; i++){
					var invoice = invoiceArr[i];

					var total_bayar = response[invoice].total_pembayaran;
					//alert(total_bayar);
					$("span#total-area-id_"+invoice).html("Rp." + total_bayar );
				}
			});
		}

		/*$.get(OnexAjax.ajaxurl, { invoice: invoice_id, action: "AjaxGetTotalMenuPPn" }, function(response){
		    var total_nilai_ppn = Number(response);
			$("h2#total-area-id_"+invoice_id).html("Rp." + (total_nilai_ppn + ongkir ));
		});*/
		

	}

	/*window.doLoadDataPengiriman = function LoadDataPengiriman(){
		
		$.getJSON(OnexAjax.ajaxurl, { action: "AjaxGetDataCustomer" })
		.done(function( response){
			if(response['status'] == true ){
				$("input#modal-nama-customer").val( response['nama']);
				$("input#modal-telp-customer").val( response['telp']);
				$("input#modal-alamat-area-customer").val( response['alamat_area']);
				$("input#modal-detail-alamat-customer").val( response['detail_alamat']);
			}
			$("input#modal-id-data-customer").val( response['id']);
		});
	}*/

	window.doLoadMenuPagination = function LoadMenuPagination(id_kategori){
		var data = {
			'action' : 'AjaxGetMenuPaginationByKategori',
			'kategori' : id_kategori,
			'security' : OnexAjax.security
		};

		$.get( OnexAjax.ajaxurl, data, function( response) {
			$("div#menu-pagination").html(response);
		} );
	}

	window.doLoadMenuByKategori = function LoadMenuByKategori(id_kategori, page){
		//$("div#menu-list-area-active").attr("ng-show","isSet("+id_kategori+")");

		var data = {
			'action': 'AjaxGetMenuByKategori',
			'kategori' : id_kategori,
			'page' : page,
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