<div id="sidebar">
<?php include (TEMPLATEPATH . '/links.php'); ?>
<ul>
<?php /* FUNCTION FOR WIDGETS */ if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php // SHOWS THE ABOUT TEXT, IF SELECTED IN THE THEME OPTIONS MENU
if ( is_home() ) { 
	mytheme_aboutheader();
	mytheme_abouttext();
	}
?>
<?php /* IF THIS IS THE FRONTPAGE */ if ( is_home() ) { ?>		
		<li id="search">
			<h2><label for="s">Search</label></h2>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</li>

	<?php /* FlickrRSS Plugin */ if ((function_exists('get_flickrRSS')) and is_home() and !(is_paged())) { ?> 
	<h2>Photos</h2>
	<li><div class="sb-flickr"><div><?php get_flickrRSS(); ?></div></div></li>
	<?php } ?>

<?php if (is_home() and !(is_paged())) { ?> 
<?php wp_list_pages('title_li=<h2>Here</h2>' ); ?>
<li id="links">
<?php hell_wp_list_bookmarks('title_li=&category_before=&category_after=&show_feed=1');?>
</li>
<?php } ?>

<li id="meta-links">
<h2>Meta</h2>
<ul>
    <li><a href='http://blog.whatfettle.com/feed/'>Posts</a> <a class='feedlink' href='http://blog.whatfettle.com/feed/'>feed</a></li>
    <li><a href='http://blog.whatfettle.com/comments/feed/'>Comments</a> <a class='feedlink' href='http://blog.whatfettle.com/comments/feed/'>feed</a><li>
  <?php wp_register(); ?>
  <li><?php wp_loginout(); ?></li>
  <?php wp_meta(); ?>
</ul>
</li>
<?php } ?>
<?php endif; /* END FOR WIDGETS CALL */ ?>
</ul>
</div>
