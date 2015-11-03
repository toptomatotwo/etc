/*!
 * Vallenato 1.0
 * A Simple JQuery Accordion
 *
 * Designed by Switchroyale
 * 
 * Use Vallenato for whatever you want, enjoy!
 */

jQuery(document).ready(function()
{
	//Add Inactive Class To All Accordion Headers
	jQuery('.accordion-header').toggleClass('inactive-header');
	
	//Set The Accordion Content Width
	var contentwidth = jQuery('.accordion-header').width();
	jQuery('.accordion-content').css({'width' : contentwidth });
	
	//Open The First Accordion Section When Page Loads
	//jQuery('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
	//jQuery('.accordion-content').first().slideDown().toggleClass('open-content');
	
	// The Accordion Effect
	jQuery('.accordion-header').click(function () {
		if(jQuery(this).is('.inactive-header')) {
			jQuery('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
			jQuery(this).toggleClass('active-header').toggleClass('inactive-header');
			jQuery(this).next().slideToggle().toggleClass('open-content');
		}
		
		else {
			jQuery(this).toggleClass('active-header').toggleClass('inactive-header');
			jQuery(this).next().slideToggle().toggleClass('open-content');
		}
	});
	
	return false;
});
jQuery(document).ready(function()
{
	//Add Inactive Class To All Accordion Headers
	jQuery('.accordion-header2').toggleClass('inactive-header2');
	
	//Set The Accordion Content Width
	var contentwidth = jQuery('.accordion-header2');
	jQuery('.accordion-content2').css({'width' : contentwidth });
	
	//Open The First Accordion Section When Page Loads
	//jQuery('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
	//jQuery('.accordion-content').first().slideDown().toggleClass('open-content');
	
	// The Accordion Effect
	jQuery('.accordion-header2').click(function () {
		if(jQuery(this).is('.inactive-header2')) {
			jQuery('.active-header2').toggleClass('active-header2').toggleClass('inactive-header2').next().slideToggle().toggleClass('open-content');
			jQuery(this).toggleClass('active-header2').toggleClass('inactive-header2');
			jQuery(this).next().slideToggle().toggleClass('open-content2');
		}
		
		else {
			jQuery(this).toggleClass('active-header2').toggleClass('inactive-header2');
			jQuery(this).next().slideToggle().toggleClass('open-content2');
		}
	});
	
	return false;
});