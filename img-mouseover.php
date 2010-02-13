<?php /*
**************************************************************************

Plugin Name:  Image Mouseover
Plugin URI:   http://terrychay.com/wordpress-plugins/img-mouseover/
Version:      1.1
Description:  Allows you to have img mouseovers on the page without resorting to javascript. Just class="mouseover" oversrc="URL_TO_MOUSEOVER" 
Author:       tychay
Author URI:   http://terrychay.com/

**************************************************************************/

class ImgMouseover {
	// {{{ + init()
	static function init() {
		// Load the locale script
		wp_enqueue_script( 'img-mouseover', plugins_url( 'img-mouseover.js', __FILE__ ) , array( 'jquery' ), '20100209' );
	}
	// }}}
}

// Start this plugin
add_action( 'init', array('ImgMouseover',init), 12 );
?>
