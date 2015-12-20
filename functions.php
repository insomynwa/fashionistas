<?php
/**
 * aThemes functions and definitions
 *
 * @package aThemes
 */

if ( ! function_exists( 'athemes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function athemes_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /lang/ directory
	 * If you're building a theme based on aThemes, use a find and replace
	 * to change 'athemes' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'athemes', get_template_directory() . '/lang' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	// Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}	

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumb-small', 50, 50, true );
	add_image_size( 'thumb-medium', 300, 135, true );
	add_image_size( 'thumb-featured', 640, 250, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'top' => __( 'Top Menu', 'athemes' ),
		'main' => __( 'Main Menu', 'athemes' ),
	) );
}
endif; // athemes_setup
add_action( 'after_setup_theme', 'athemes_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function athemes_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'athemes' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header', 'athemes' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sub Footer 1', 'athemes' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sub Footer 2', 'athemes' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sub Footer 3', 'athemes' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sub Footer 4', 'athemes' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'athemes_widgets_init' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 *
 * @since aThemes 1.0
 */
function athemes_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-6' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'container site-extra extra-one';
			break;
		case '2':
			$class = 'container site-extra extra-two';
			break;
		case '3':
			$class = 'container site-extra extra-three';
			break;
		case '4':
			$class = 'container site-extra extra-four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Enqueue scripts and styles
 */
function athemes_scripts() {

	//Load the fonts
	$headings_font = esc_html(get_theme_mod('headings_fonts'));
	$body_font = esc_html(get_theme_mod('body_fonts'));
	if( $headings_font ) {
		wp_enqueue_style( 'athemes-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'athemes-headings-fonts', '//fonts.googleapis.com/css?family=Oswald:300,400,700');
	}	
	if( $body_font ) {
		wp_enqueue_style( 'athemes-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
	}

	wp_enqueue_style( 'athemes-symbols', get_template_directory_uri() . '/css/athemes-symbols.css' );

	wp_enqueue_style( 'athemes-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'athemes-style', get_stylesheet_uri() );

	wp_enqueue_script( 'athemes-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'athemes-superfish-hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ) );
	wp_enqueue_script( 'athemes-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ) );
	wp_enqueue_script( 'athemes-settings', get_template_directory_uri() . '/js/settings.js', array( 'jquery' ) );

	wp_enqueue_script( 'onexajax', get_template_directory_uri(). '/js/onexajax.js', array('jquery'));

	wp_localize_script( 'onexajax', 'OnexAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'security' => wp_create_nonce( 'onex-special-string')));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'athemes_scripts' );

/**
 * Load html5shiv
 */
function athemes_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'athemes_html5shiv' );

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {

	if (!current_user_can('manage_options') && !is_admin()) {

	  show_admin_bar(false);

	}

}

add_action( 'template_redirect', 'my_page_template_redirect');
function my_page_template_redirect(){
	if( !is_user_logged_in()){
		if(is_page('chart')){
			wp_redirect( home_url() );
			exit;
		}else if( is_page('profil')){
			wp_redirect( wp_login_url());
			exit;
		}
	}
}

/**
*
* Get Something like DateTime.Now.Ticks in .NET
*
*/
function millitime(){
	$microtime = microtime();
	$comps = explode(' ', $microtime);

	// Note: Using a string here to prevent loss of precision in case of "overflow" (PHP converts it to a double)
	return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
}

/**
*
*	ONEX AJAX function callback
*
*/
add_action( 'wp_ajax_AjaxGetMenuByKategori', 'AjaxLoad_MenuByKategori');
add_action( 'wp_ajax_nopriv_AjaxGetMenuByKategori', 'AjaxLoad_MenuByKategori');
function AjaxLoad_MenuByKategori(){

	if( isset($_GET['kategori'])){
  		check_ajax_referer( 'onex-special-string', 'security' );
		$onex_menu_distributor_obj = new Onex_Menu_Distributor();
		$content['menudist'] = $onex_menu_distributor_obj->GetMenuByKategori( $_GET['kategori']);
		//var_dump(get_current_user_id());
		echo getHtmlTemplate( get_template_directory(). '/ajax-templates/', 'menu-list', $content );
		//var_dump($content,json_encode($content));
	}
	wp_die();
}

add_action( 'wp_ajax_AjaxCustomerPesanMenu', 'AjaxPost_Customer_PesanMenu');
function AjaxPost_Customer_PesanMenu(){

	$result['status'] = false;
	$result['message'] = '';

	if( is_user_logged_in() ){
		if( isset($_POST['menu']) && $_POST['menu'] > 0) {

			$customer_id = get_current_user_id();
			$distributor_id = sanitize_text_field( $_POST['distributor']);
			$menudel_id = sanitize_text_field( $_POST['menu']);

			$onex_invoice_obj = new Onex_Invoice();
			$menu_distributor_obj = new Onex_Menu_Distributor();

			$invoice_id = $onex_invoice_obj->GetIdInvoiceByDistributor( $customer_id, $distributor_id);
			
			$invoice_data = array();

			if( $invoice_id == 0){

				$data_pembeli_obj = new Onex_Data_Pembeli();

				$alamat_customer = $data_pembeli_obj->GetAlamatCustomer( $customer_id);

				$invoice_data['jarak'] = 0;
				$invoice_data['ongkir'] = 0;
				if( $alamat_customer!="" && !is_null( $alamat_customer) && !empty( $alamat_customer)){

					$distributor_obj = new Onex_Distributor();

					$alamat_distributor = $distributor_obj->GetAlamatDistributor( $distributor_id);

					$jarak = getJarakKm( $alamat_distributor, $alamat_customer);
					$ongkir = getOngkir( $jarak);
					$invoice_data['jarak'] = $jarak;
					$invoice_data['ongkir'] = $ongkir;
				}

				$invoice_data['distributor'] = $distributor_id;
				$invoice_id = $onex_invoice_obj->CreateInvoice( $customer_id, $invoice_data );
			}

			if( $invoice_id > 0 ){
				$nilai_menu = 0;

				$onex_pemesanan_menu_obj = new Onex_Pemesanan_Menu();
				if( ! $onex_pemesanan_menu_obj->SudahDiPesan( $invoice_id, $menudel_id )){


					$data['menudel_id'] = $menudel_id;
					$data['kuantiti'] = 1;
					$data['invoice_id'] = $invoice_id;
					$data['harga'] = $menu_distributor_obj->GetHargaMenuDistributor( $menudel_id);

					$onex_pemesanan_menu_obj->AddPemesananMenu($data);
					/*$nilai_menu = $onex_pemesanan_menu_obj->AddPemesananMenu($data);
					$nilai_menu_ppn = $nilai_menu + ( $nilai_menu * 0.05 );

					$onex_invoice_obj->UpdateTotalInvoice( $invoice_id, $nilai_menu_ppn, 0);*/

					$result['status'] = true;
					$result['message'] = "Berhasil pesan";
				}else{
					$result['message'] = "Anda sudah memesan menu ini.";
				}
			}else{
				$result['message'] = "Maaf, untuk sekarang pemesanan menu tidak dapat dilakukan.";
			}
		}else{
			$result['message'] = "Pemesanan gagal!";
		}
	}
	echo wp_json_encode( $result);
	
	wp_die();
}

add_action( 'wp_ajax_AjaxGetChartTable', 'AjaxLoad_ChartUser');
function AjaxLoad_ChartUser(){
	if( is_user_logged_in()){
		$customer_id = get_current_user_id();

		$invoice_obj = new Onex_Invoice();
		$data_pembeli_obj = new Onex_Data_Pembeli();
		//$ongkir_obj = new Onex_Ongkos_Kirim();


		$content['invoice'] = $invoice_obj->GetInvoiceAktifByUser( $customer_id );
		$content['alamat'] = $data_pembeli_obj->GetDataPembeliByUser( $customer_id );

		//$tarifPerKm = $ongkir_obj->GetTarifPerKm();

		//$to = "";
		//$from = $content['alamat']['alamat_detail_datapembeli'];

		$pemesanan_menu_obj = new Onex_Pemesanan_Menu();
		foreach( $content['invoice'] as $invoice => $value){
			$content['menu'][$value->nama_dist] = $pemesanan_menu_obj->GetPesananMenuByInvoice( $value->id_invoice);
			//$to = $value->alamat_dist;
			//$jarak = getJarakKm( $from, $to);
			//$content['jarak'][$value->nama_dist] = $jarak;
			//$content['ongkir'][$value->nama_dist] = $jarak * $tarifPerKm;
		}
		//var_dump($from, $to);
		//var_dump( getJarakKm($from, $to) );
		//getJarakKm($from, $to);

		echo getHtmlTemplate( get_template_directory(). '/ajax-templates/', 'chart-table', $content );
	}
	wp_die();
}

add_action( 'wp_ajax_AjaxGetOngkir', 'AjaxLoad_Ongkir');
function AjaxLoad_Ongkir(){
	if( is_user_logged_in()){
		if(isset( $_GET['invoice'] )){

			$invoice_id = $_GET['invoice'];
			$customer_id = get_current_user_id();

			//$distributor_obj = new Onex_Distributor();
			$data_pembeli_obj = new Onex_Data_Pembeli();
			//$ongkir_obj = new Onex_Ongkos_Kirim();
			$invoice_obj = new Onex_Invoice();

			//$tarifDasar = $ongkir_obj->GetTarifPerKm();
			$alamat_to = $data_pembeli_obj->GetAlamatCustomer( $customer_id);
			
			$data = array();
			//var_dump($distributor_id);

			for($i = 0; $i<sizeof($invoice_id); $i++){
				//var_dump($distributor_id); wp_die();

				$distributor = $invoice_obj->GetInvoiceDistributor( $invoice_id[$i] );

				$jarak = getJarakKm( $distributor['alamat_dist'], $alamat_to);
				$ongkir = getOngkir ( $jarak);

				/*if($jarak < 5){
					$ongkir = 5000;
					//$data[ $invoice_id[$i] ]['ongkir'] = 5000;
				}else{

					$n5km = intval($jarak) / 5;
					if($n5km<1) $n5km=0;
					$mod5km = intval($jarak) % 5;
					$ongkir = ( intval($n5km) * 5000 ) + ($mod5km * $tarifDasar);
					//$data[$invoice_id[$i]]['ongkir'] = ( intval($n5km) * 5000 ) + ($mod5km * $tarifDasar);
				}*/
				$data[$invoice_id[$i]]['jarak'] = $jarak;
				$data[$invoice_id[$i]]['ongkir'] = $ongkir;
				$invoice_obj->UpdateJarakDanBiayaKirim( $invoice_id[$i], $jarak, $ongkir );
			}

			echo wp_json_encode($data);
		}
	}
	wp_die();
}

add_action( 'wp_ajax_AjaxGetTotalMenuPPn', 'AjaxLoad_TotalMenuPPn');
function AjaxLoad_TotalMenuPPn(){
	if( is_user_logged_in()){
		if( isset( $_GET['invoice']) ){
			$invoice_id = $_GET['invoice'];

			//$invoice_obj = new Onex_Invoice();
			$pesanan_obj = new Onex_Pemesanan_Menu();
			$total_menu = $pesanan_obj->GetTotalNilaiPesanan( $invoice_id);
			$total_menu_ppn = $total_menu + ( $total_menu * 0.05); // tax 5%
			echo $total_menu_ppn;
		}
	}
	wp_die();
}

add_action( 'wp_ajax_AjaxUpdateTotalMenu', 'AjaxUpdate_TotalMenu');
function AjaxUpdate_TotalMenu(){
	if( is_user_logged_in()){
		if( isset( $_POST['menu']) && isset( $_POST['jumlah']) ){
			$pesananmenu_id = sanitize_text_field( $_POST['menu']);
			$jumlah_pesan = sanitize_text_field( $_POST['jumlah']);

			if( $jumlah_pesan > 0){
				$pesanan_obj = new Onex_Pemesanan_Menu();
				$result = $pesanan_obj->UpdateJumlahPesananMenu( $pesananmenu_id, $jumlah_pesan);
			}
			$total_menu = $pesanan_obj->GetTotalNilaiPesanan( $invoice_id);
			$total_menu_ppn = $total_menu + ( $total_menu * 0.05); // tax 5%
			echo $total_menu_ppn;
		}
	}
	wp_die();
}

add_action( 'wp_ajax_AjaxGetDataCustomer', 'AjaxLoad_DataCustomer');
function AjaxLoad_DataCustomer(){
	if( is_user_logged_in()){
		$customer_id = get_current_user_id();
		$data_pembeli_obj = new Onex_Data_Pembeli();

		$data = array();
		/*$data['id'] = "";
		$data['nama'] = "";
		$data['telp'] = "";
		$data['alamat_area'] = "";
		$data['detail_alamat'] = "";*/
		$data['status'] = false;
		$data['id'] = 0;

		$data_pengiriman = $data_pembeli_obj->GetDataPembeliByUser( $customer_id );

		if(sizeof($data_pengiriman) > 0){
			$data['id'] = $data_pengiriman['id_datapembeli'];
			$data['nama'] = $data_pengiriman['nama_datapembeli'];
			$data['telp'] = $data_pengiriman['telp_datapembeli'];
			$data['alamat_area'] = $data_pengiriman['nama_alamatarea'];
			$data['detail_alamat'] = $data_pengiriman['alamat_detail_datapembeli'];
			$data['status'] = true;
		}

		echo wp_json_encode($data);
	}
	wp_die();
}

add_action( 'wp_ajax_AjaxUpdateDataCustomer', 'AjaxUpdate_DataCustomer');
function AjaxUpdate_DataCustomer(){
	if( is_user_logged_in()){

		if( isset($_POST['id_data']) ){
			$customer_id = get_current_user_id();
			$data = array(
				'nama' => sanitize_text_field($_POST['nama']),
				'telp' => sanitize_text_field($_POST['telp']),
				'detail_alamat' => sanitize_text_field($_POST['detail_alamat'])
				);

			$data_pembeli_obj = new Onex_Data_Pembeli();
			if( $_POST['id_data'] > 0){
				$result = $data_pembeli_obj->UpdateDataPembeliByUser( $_POST['id_data'], $data, $customer_id );
			}else{
				$result = $data_pembeli_obj->AddDataPembeliUser( $data, $customer_id);
			}
		}

		echo wp_json_encode($result);
	}
	wp_die();
}

function getJarakKm($from, $to) {
	$API_KEY = "AIzaSyAGJKzSI54D-9Fm6zW0zD4GttumyM5oXxQ";
	$from = urlencode($from);
	$to = urlencode($to);
	$url_google_distance_matrix_API = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$from."&destinations=".$to."&language=id-ID&key=".$API_KEY;
	//var_dump($url_google_distance_matrix_API);
	$result = file_get_contents($url_google_distance_matrix_API);

	$data = json_decode( $result, true);

	return ($data['rows'][0]['elements'][0]['distance']['value'])  / 1000; // m to km
}

function getOngkir( $jarak) {
	$ongkir = 0;
	$ongkir_obj = new Onex_Ongkos_Kirim();

	$tarifDasar = $ongkir_obj->GetTarifPerKm();

	if($jarak < 5){
		$ongkir = 5000;
		//$data[ $invoice_id[$i] ]['ongkir'] = 5000;
	}else{

		$n5km = intval($jarak) / 5;
		if( $n5km < 1 ) $n5km=0;
		$mod5km = intval( $jarak ) % 5;
		$ongkir = ( intval( $n5km ) * 5000 ) + ( $mod5km * $tarifDasar);
		//$data[$invoice_id[$i]]['ongkir'] = ( intval($n5km) * 5000 ) + ($mod5km * $tarifDasar);
	}
	return $ongkir;
}

function getHtmlTemplate( $location, $template_name, $attributes = null ){
	if(! $attributes) $attributes = array();

	ob_start();
	require ( $location . $template_name . '.php');
	$html = ob_get_contents();
	ob_end_clean();
	echo $html;
}

function get_distributor_by_id(){
	$onex_distributor_obj = new Onex_Distributor();
	$onex_kategori_menu_obj = new Onex_Kategori_Menu();
	$content['distributor'] = $onex_distributor_obj->GetDistributor( $_GET['distributor']);
	$content['katmenu'] = $onex_kategori_menu_obj->GetKategoriByDistributor( $_GET['distributor'] );

	return $content;
}

function get_kategori_menu(){
	$katmenu_obj = new Onex_Kategori_Menu();
	$content = $katmenu_obj->GetKategoriMenuList();
	return $content;
}

function get_jenis_delivery(){
	$delivery_obj = new Onex_Jenis_Delivery();
	$content['katdel'] = $delivery_obj->DeliveryList();
	return $content;
}

function get_distributor(){
	$distributor_obj = new Onex_Distributor();
	$content = $distributor_obj->DistributorList();
	return $content;
}

function get_distributor_by_template($template_name){
	$distributor = new Onex_Distributor();
	$content['distributor'] = $distributor->GetDistributorByTemplate($template_name);
	return $content;
}

function get_user_data_detail(){
	$data_user = new Onex_Data_Pembeli();
	$content['data'] = $data_user->GetDataPembeliByUser( get_current_user_id() );
	return $content;
}

/*function get_active_invoice_pesanan(){
	if(is_user_logged_in()){
		$customer_id = get_current_user_id();
		$invoice_obj = new Onex_Invoice();
		$content['invoice'] = $invoice_obj->GetInvoiceAktifByUser( $customer_id );
		return $content;
	}
	return null;
}*/

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Add social links on user profile page.
 */
require get_template_directory() . '/inc/user-profile.php';

/**
 * Add custom widgets
 */
require get_template_directory() . '/inc/custom-widgets.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Dynamic styles
 */
require get_template_directory() . '/styles.php';