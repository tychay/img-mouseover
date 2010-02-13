jQuery(document).ready(function($) { /* document.ready */
	$('img.mouseover').each(function() {
		// initialize mouseovers {{{
		var img_url = this.getAttribute('oversrc');
		if (!img_url) { return; } // no oversrc specified
		// preload image
		this.overImg = new Image();
		this.overImg.src = img_url;
		var click_img_url = this.getAttribute('clicksrc');
		if (click_img_url) {
			this.clickImg = new Image();
			this.clickImg.src = click_img_url;
		}
		// cache values
		this.noresize = (this.getAttribute('noresize'));
		this.outSrc = this.src;
		this.outWidth = this.width;
		this.outHeight = this.height;
		// }}}
	}).mouseover(function() {
		// handle mouseover {{{
		if (!this.overImg) { return; }
		this.src = this.overImg.src;
		if (!this.noresize) { return; }
		this.width = this.overImg.width;
		this.height = this.overImg.height;
		// }}}
	}).mouseout(function() {
		// handle mouseout {{{
		if (!this.overImg) { return; }
		this.src = this.outSrc;
		if (!this.noresize) { return; }
		this.width = this.outWidth;
		this.height = this.outHeight;
		// }}}
	}).click(function() {
		// handle onclick {{{
		if (!this.clickImg) { return true; }
		this.src = this.clickImg.src;
		if (!this.noresize) { return; }
		this.width = this.clickImg.width;
		this.height = this.clickImg.height;
		return false;
		// }}}
	});
});
