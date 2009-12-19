<?php header("HTTP/1.1 404 Not Found"); ?>
<?php get_header(); ?>
<div id="container">
	<div id="content" class="widecolumn">
		<div id="post-error404" class="post single-post">
			<p class="post-date-single">{ Error 404 }</p>
			<h2 class="post-title-single">Page Not Found</h2>
			<div class="post-entry">
				<p>Oh noes! We can't find that page! Maybe someone gave you a bum steer, 
			the Interweb tubes are blocked, or maybe I dropped the ball on this one.</li>
				</ul> 
				<p>You could try this search box out, who knows, you might find something:</p>
				<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
					<div>
						<input id="s" name="s" type="text" value="<?php echo wp_specialchars($s, 1); ?>" tabindex="1" size="10" /> <input id="searchsubmit" name="searchsubmit" type="submit" value="Find" tabindex="2" />
					</div>
				</form> 
			</div>
		</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
