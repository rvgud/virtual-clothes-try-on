<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.live.dugudlabs.com/
 * @since      1.0.0
 *
 * @package    Virtual_Clothes_Try_On
 * @subpackage Virtual_Clothes_Try_On/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Virtual_Clothes_Try_On
 * @subpackage Virtual_Clothes_Try_On/admin
 * @author     Dugudlabs Digital Services <support@dugudlabs.com>
 */
class Virtual_Clothes_Try_On_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/virtual-clothes-try-on-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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
		wp_enqueue_script('jquery');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/virtual-clothes-try-on-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( "load_core_function", plugin_dir_url( __FILE__ ) . 'js/load_core_functions.js', $this->version, false );
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
	}
	//Main function to start admin dressfit
	public function add_menu_dressfit() {
		//add_menu_dressfit_page("DressFit","DressFit", "manage_options", "tryonmenu",  'show_admin_menu_dressfit', $icon_url = plugin_dir_url( __FILE__ ) . 'css/DressFit.svg', $position = null );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes_transparent_image_dressfit' ) );
		add_action( 'save_post', array( $this, 'save_transparent_image_dressfit' )); 
	}
	public function save_transparent_image_dressfit($post_id){
		$is_autosave = wp_is_post_autosave( $post_id );
	   $is_revision = wp_is_post_revision( $post_id );
	   $is_valid_nonce = ( isset( $_POST[ 'case_study_bg_nonce' ] ) && wp_verify_nonce( $_POST[ 'case_study_bg_nonce' ], 'case_study_bg_submit' ) ) ? 'true' : 'false';
   
	   // Exits script depending on save status
	   if ( $is_autosave || $is_revision || !$is_valid_nonce  ) {
		   return;
	   }
	   $dressFitUrl=esc_url_raw($_POST[ 'dressfit_try_on_image_URL' ]);
	   $dressFitType=sanitize_text_field($_POST['dressFitType']);
	   // Checks for input and sanitizes/saves if needed
	   if( isset( $dressFitUrl ) ) {
		   update_post_meta( $post_id, 'try_on_image_dressfit', $dressFitUrl );
	   } 
	   if( isset( $dressFitType ) ) {
		update_post_meta( $post_id, 'dressfit_type', $dressFitType );
	}    
	   }
				   
	public function add_meta_boxes_transparent_image_dressfit($post_types  ) {
		
	   $post_types = array('product');     //limit meta box to certain post types
	   global $post;
	   if ( 
		 in_array( 
	   'woocommerce/woocommerce.php', 
	   apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) 
		 ) 
	   ) {
		   $product = wc_get_product( $post->ID );
			  if ($post->post_type=='product'){
			   add_meta_box(
				   'Try On Image DressFit'
				   ,__( 'Try On Image DressFit', 'woocommerce' )
				   ,array( $this, 'render_meta_box_content_dressfit' )
				   ,$post_types
				   ,'advanced'
				   ,'high'
			   );
		   }
	   }
	   
   }
	public function render_meta_box_content_dressfit(){
		global $post;
		$url =get_post_meta($post->ID,'try_on_image_dressfit', true);
		$dressFitType=get_post_meta($post->ID,'dressfit_type', true);   ?>
		<input hidden="hidden" id="dressfit_try_on_image_URL" name="dressfit_try_on_image_URL" type="text" value="<?php echo $url;?>"  style="width:400px;" />
		Select Dress Type: <select name="dressFitType">
			<option value="top" <?php $dressFitType=="top"? (print "selected" ): (print "" )?>>Top Wear(Tshirt/Shirt etc.)</option>
			<option value="bottom" <?php $dressFitType=="bottom"? (print "selected" ): (print "" )?> >Bottom Weat(Jeans/Trouser etc.)</option>
		</select>

		<?php if($url==null || $url ==''){?>
		<img src="<?php echo $url;?>" style="width:200px;display:none;" id="dressfit_picsrc" />
		<a onclick="upload_try_on_image_dressfit();" id="dressfit_try_on_image_upload_btn">Set TryOn Image</a>
		<?php }
		else {?>
		<img src="<?php echo $url;?>" style="width:200px;" id="dressfit_picsrc" />
		<a id="dressfit_try_on_image_upload_btn" onclick="upload_try_on_image_dressfit()">Change</a>
		<a onclick="remove_try_on_image_dressfit();">Remove</a>
		<?php  } 
	

	}

}
