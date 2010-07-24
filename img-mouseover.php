<?php /*
**************************************************************************

Plugin Name:  Image Mouseover
Plugin URI:   http://terrychay.com/wordpress-plugins/img-mouseover/
Version:      1.3.1
Description:  Allows you to have img mouseovers on the page without resorting to javascript. Just class="mouseover" data-oversrc="URL_TO_MOUSEOVER" 
Author:       tychay
Author URI:   http://terrychay.com/

**************************************************************************/

class ImgMouseover {
	 function init() {
		// Load the locale script
		wp_enqueue_script( 'img-mouseover', plugins_url( 'img-mouseover.js', __FILE__ ) , array( 'jquery' ), '20100209' );
	}

	/**
	 * This adds the new attributes as valid elements to the visual
         * editor.
         *
	 * See {@link http://codex.wordpress.org/Plugin_API/Hooks_2.0.x|
	 * documentation on valid elements} as outlined in
	 * {@link http://granades.com/2007/02/14/adding-quicktags-to-wordpress/|this tutoral}.
	 * {@link http://wiki.moxiecode.com/index.php/TinyMCE:Configuration/valid_elements TinyMCE|Here is a list of valid elements]
         */
	function add_valid_elements ($inits) {
		$default_globals = 'id|class|style|title|dir<ltr?rtl|lang|xml::lang|onclick|ondblclick|onmousedown|onmouseup|onmouseover|onmousemove|onmouseout|onkeypress|onkeydown|onkeyup|';
		$default_img     = 'longdesc|usemap|src|border|alt=|title|hspace|vspace|width|height|align|';
		$add_img         = 'oversrc|clicksrc|noresize';
		$default_a       = 'rel|rev|charset|hreflang|tabindex|accesskey|type|name|href|target|title|class|onfocus|onblur|';
		$add_a           = 'for|for_link|src|oversrc';
		if ( empty( $inits['extended_valid_elements'] ) ) {
			$inits['extended_valid_elements'] =
				'img['.$default_globals.$default_img.$add_img.']' .
				',a['.$default_globals.$default_a.$add_a.']';
		} else {
			$e =& $inits['extended_valid_elements'];
			$e = str_replace( 'img[', 'img['.$add_img, $e, $count );
			if (!$count) {
				$e .= ',img['.$default_globals.$default_img.$add_img.']';
			}
			$e = str_replace( 'a[', 'a[clicksrc', $e, $count );
			if (!$count) {
				$e .= ',a['.$default_globals.$default_a.$add_a.']';
			}
		}
		return $inits;
	}
}

// Start this plugin
add_action( 'init', array('ImgMouseover','init'), 12 );
add_filter( 'tiny_mce_before_init', array('ImgMouseover', 'add_valid_elements'), 0);
?>
