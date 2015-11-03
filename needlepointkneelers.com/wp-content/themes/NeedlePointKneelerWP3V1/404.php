<?php get_header(); ?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

<div class="art-block">
    <div class="art-block-body">

<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">
<?php _e('Uh-Oh! I Can\'t Seem To Find What You Are Looking For.', 'kubrick'); ?>
</div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-tl"></div>
    <div class="art-blockcontent-tr"></div>
    <div class="art-blockcontent-bl"></div>
    <div class="art-blockcontent-br"></div>
    <div class="art-blockcontent-tc"></div>
    <div class="art-blockcontent-bc"></div>
    <div class="art-blockcontent-cl"></div>
    <div class="art-blockcontent-cr"></div>
    <div class="art-blockcontent-cc"></div>
    <div class="art-blockcontent-body">
<!-- block-content -->

<h2>I can't seem to find what you think you're looking for.</h2>
<strong>What the heck just happened?</strong><br/>
<p></p>Well unfortunately, I think you've just experienced what we webmasters refer to as a "Big Problem."  This could be caused by several factors including:</p>
<ol>
	<li>The material you are looking for is no longer available.</li>
	<li>The material you are looking for was really never available.</li>
	<li>The material you are looking for is around here someplace, but we have cleverly hidden it in a location called "<em>somewhere else</em>".</li>
</ol>
<strong>What should I do now?</strong><br/>
<p>Well, that depends.  If you believe the material is actually on this site, we would recommend that you click the logo at the top of the page and try again.  If you think the material is in fact not on this site, well, try "Googleing" for it.  Also, you could hit "F5" or "refresh" to repeatedly reload the page.  That rarely works, but you never know.</p>
<strong>
OK, who's fault is this anyway?  Who can I blame for this mess?</strong><br/>
<p>In the most existential sense, isn't it really everyone's fault?  No. More than likely it's your darn fault.  However, if you would use the contact form and explain the error you received we would be very appreciative and happily remove you from our "people who caused massive, time consuming irreparable errors" list. That's one list you don't want to be on.</p>
<br /><br />
				
				<form id="searchform-404" class="blog-search" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
						<input class="button" type="submit" value="<?php _e( 'Get Me Outta Here', 'kubrick' ) ?>" />
					</div>
				</form>

<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>


		<div class="cleared"></div>
    </div>
</div>


</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>