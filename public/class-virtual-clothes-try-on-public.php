<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.live.dugudlabs.com/
 * @since      1.0.0
 *
 * @package    Virtual_Clothes_Try_On
 * @subpackage Virtual_Clothes_Try_On/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Virtual_Clothes_Try_On
 * @subpackage Virtual_Clothes_Try_On/public
 * @author     Dugudlabs Digital Services <support@dugudlabs.com>
 */
class Virtual_Clothes_Try_On_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
	// DressFit Init Function
	public function start_dressfit(){
		add_action( 'woocommerce_single_product_summary', 'show_button_dressfit', 32 ,0 );
	}


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Virtual_Clothes_Try_On_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Virtual_Clothes_Try_On_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/virtual-clothes-try-on-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Virtual_Clothes_Try_On_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Virtual_Clothes_Try_On_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/virtual-clothes-try-on-public.js', array( 'jquery' ), $this->version, false );

	}

}
function load_script_and_styles_dressfit(){
	//wp_enqueue_style( $this->plugin_name.'fonts', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->version, 'all' );

	wp_enqueue_style( 'dressfit', plugin_dir_url( __FILE__ ) . 'css/virtual-clothes-try-on-public.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'dressfit'.'custom', plugin_dir_url( __FILE__ ) . 'css/style_custom.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'dressfit'.'jquery', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css', array(), '1.0.0', 'all' );
	//wp_enqueue_style( $this->plugin_name.'bootstrap-res',plugin_dir_url( __FILE__ ) . 'css/bootstrap-responsive.css', array(), $this->version, 'all' );
	wp_enqueue_style( 'dressfit'.'css', plugin_dir_url( __FILE__ ) . 'dressfit/dressfit.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'dressfit'.'select', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(),'1.0.0', 'all' );
	wp_enqueue_script('jquery');
	//wp_enqueue_script( 'dressfit'.'htmtocanvas_tryon', plugin_dir_url( __FILE__ ) . 'js/html2canvas.min.js', array( 'jquery' ), '1.0.0', false );
	wp_enqueue_script( 'dressfit'.'popper', plugin_dir_url( __FILE__ ) . 'js/popper.js');
	wp_enqueue_script( 'dressfit'.'js', plugin_dir_url( __FILE__ ) . 'dressfit/dressfit.js');
	wp_enqueue_script( 'dressfit'.'html2canvas', plugin_dir_url( __FILE__ ) . 'js/html2canvas.min.js');
	wp_enqueue_script( 'dressfit'.'mainjs', plugin_dir_url( __FILE__ ) . 'js/main.js');
	//wp_enqueue_script( 'dressfit'.'jqueryuijs', plugin_dir_url( __FILE__ ) . 'js/jquery-ui.js');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-widget');
	wp_enqueue_script('jquery-ui-mouse');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-droppable');
	wp_enqueue_script('jquery-ui-resizable');
	wp_enqueue_script('jquery-ui-tooltip');
	wp_enqueue_script( 'dressfit'.'jqueryuitouchjs', plugin_dir_url( __FILE__ ) . 'js/jquery.ui.touch-punch.min.js',array( 'jquery-ui-mouse','jquery-ui-widget' ));
	wp_enqueue_script("dressfit_load_core_functions", plugin_dir_url(__FILE__) . 'js/load_core_functions.js', false );
}

function show_button_dressfit(){
    global $product; 
	global $post;
	$relatedProducts=wc_get_related_products($product->get_id());
	$show_related_product_box_dressfit = false;
	foreach ( $relatedProducts as $postID ){
		$tryOnImgUrl=get_post_meta($postID,'try_on_image_dressfit', true);
		if($tryOnImgUrl !=null || $tryOnImgUrl !=''){
			$show_related_product_box_dressfit = true;
		}
	}
	$tryOnImgUrl=get_post_meta($post->ID,'try_on_image_dressfit', true);
	$dressFitType=get_post_meta($post->ID,'dressfit_type', true); 
    $id = $product->get_id();
    if($tryOnImgUrl !=null || $tryOnImgUrl !=''){
    	?>
    	<script>
    	function set_properties_clothes(tryon_url){
			document.getElementById('galssimage').src=tryon_url;
			tryOnImgUrl=tryon_url;
    	}
    	</script>
    	<button type="button" class="dressfit_tryon_btn btn btn-info" onclick="set_properties_clothes('<?php echo $tryOnImgUrl;?>');" data-toggle="dressfit_modal" data-target="#TryOnModal">Try On</button>
    	<?php
		load_script_and_styles_dressfit();
		include_once plugin_dir_path(__FILE__).'partials/virtual-clothes-try-on-public-display.php';
    }
}
