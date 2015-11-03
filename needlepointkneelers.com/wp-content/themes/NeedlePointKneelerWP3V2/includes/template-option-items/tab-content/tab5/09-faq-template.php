	<div id="tab-templates-faq" title="">
	<div class="metabox-holder-wide metabox-holder">
	<div class="postbox">
		<h3 class="postbox-header">Simple FAQ Page Template</h3>
	<div class="inside">
	
	<p>The Simple FAQ page template will (just like the name says) allows you to make a simple FAQ (frequently asked questions page) without using a plug-in.</p>
	<p>It's not intended to replace a plug-in FAQ system. But if you only need to create a page with 10-20 questions and answers then this may be what you need. </p>
	<p>When you create your FAQ page you would make the question have an H3 tag then you would create a normal paragraph directly after the H3 tag, that would become your answer. 
	The answer has be all in one paragraph but can contain images etc.</p>
	<p>The FAQ page template uses a jQuery slider to hide the answers to everything but the selected question. If you want to have other content before or after the FAQ content you need to do a few things to prevent the jQuery slider from affecting the other content. </p>
	<p>If you want content before or after the FAQ you need to wrap it in a DIV </p>
	<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/tab-content/images/faq2.png" />
	<p>After you enter your static content ( before or after the FAQ questions and answers ) put your editor in HTML mode and put an opening DIV at the beginning of your content and a closing DIV at the end.
		If you don't put your extra content in a DIV it will disappear when you click on a question because the jQuery slider thinks it needs to hide the paragraph.</p>
	<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/tab-content/images/faq3.png" />
	<p>The normal page title has been removed so you can use a normal H2 title for your page. If you want the theme generated title to appear then you can make that happen by adding a custom field. </p>
	<p>Just add the <b>Name</b> 'faq_title' with the <b>Value</b> of 'Yes' and the page will use the default theme generated title.</p>
	<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/tab-content/images/faq-custom-field.png" />

	</div>
	</div>
	</div>
	</div>