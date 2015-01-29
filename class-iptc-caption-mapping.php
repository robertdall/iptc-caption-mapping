<?php
/**
 * IPTC Caption Mapping.
 *
 * @package   IPTC_Caption_Mapping
 * @author    mandiwise & robertdall
 * @license   GPL-2.0+
 * @link      https://github.com/robertdall/iptc-caption-mapping
 */

class IPTC_Caption_Mapping {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '1.0.0';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Map the IPTC caption when the image is uploaded
		add_action( 'add_attachment', array( $this, 'add_iptc_caption_to_excerpt' ) );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Grab the IPTC caption from the description field and add it to the WP caption and alt text fields too
	 *
	 * @since    1.0.0
	 */

	public function add_iptc_caption_to_excerpt( $post_id ) {
		$attachment = & get_post( $post_id, ARRAY_A );	
		
		if ( !empty( $attachment ) && !empty( $attachment['post_content'] ) ) {
			
			if ( wp_attachment_is_image( $attachment['ID'] ) ) {
				
				// Populate the caption field with the IPTC caption
				$attachment['post_excerpt'] = $attachment['post_content'];
				
				// Then populate the alt text field with the IPTC caption
				update_post_meta( $attachment['ID'], '_wp_attachment_image_alt', $attachment['post_content'] );
	
				wp_update_post( $attachment );
			}
		}
	}

} // End class IPTC_Caption_Mapping
