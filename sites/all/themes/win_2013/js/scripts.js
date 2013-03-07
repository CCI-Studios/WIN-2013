jQuery(window).load(function () {
	var slideshows = jQuery('.views_slideshow_cycle_main');

    jQuery(window).resize(function () {
        slideshows.each(function () {
        	var $this = jQuery(this),
        		img_height = $this.find('img').height();

            if (img_height !== 0) {
            	console.log(img_height);
                //$this.find('.views-slideshow-cycle-main-frame').height(img_height);
                return false;
            }
        });

    });
});