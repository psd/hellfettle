<?php
/*
File Name: Wordpress Theme Toolkit
Version: 1.0
Author: Ozh
Author URI: http://planetOzh.com/
*/
/************************************************************************************
 * THEME USERS : Don't touch anything !! Or don't ask the theme author for support (:-0
 ************************************************************************************/
include(dirname(__FILE__).'/themetoolkit.php');

/************************************************************************************
 * FUNCTION ARRAY
 ************************************************************************************/
themetoolkit(
	'mytheme', 
	array(
	'separ1' => 'Typography {separator}',
	'showabout' => 'Show "About" Section {checkbox|about|yes|Display the "About" header and the text as entered below} ## If checked, the heading and text below are displayed as a section on the front page. Default is checked.<br/><em><strong>Note to Widgets users:</strong> If you are actively using the Widgets plugin, then this as well as the follow two settings have absolutely no affect.</em>',
	'aboutheader' => '"About" Header ## Add/edit the text for the header of the "About" section. If you are showing the "About" section but do not want a header, enter <code>&amp;nbp;</code> for a blank space. Otherwise your page will not validate. Default is About.',
	'abouttext' => '"About" Text {textarea|10|55} ## Add/edit text for the content of the "About" section. You can use HTML, but beware of special characters: i.e., &amp; = <code>&amp;amp;</code>. Default is Lorem Ipsum&hellip; .',
	),
	__FILE__
);

/************************************************************************************
 * FUNCTION CALLS
 ************************************************************************************/
function mytheme_bodyfontsize() {
	global $mytheme;
	if ( $mytheme->option['bodyfontsize'] ) {
		print 'body { font-size: ';
		print $mytheme->option['bodyfontsize'];
		print "; }\n";
	}
}
function mytheme_bodyfontfamily() {
	global $mytheme;
	if ( $mytheme->option['bodyfontfamily'] ) {
		print 'body { font-family: ';
		print $mytheme->option['bodyfontfamily'];
		print "; }\n";
	}
}
function mytheme_headerfontfamily() {
	global $mytheme;
	if ( $mytheme->option['headerfontfamily'] ) {
		print 'div.post-header, h2.post-title, p.post-date-single, h2.post-title-single, div.post-entry h1, div.post-entry h2, div.post-entry h3, div.post-entry h4, div.post-entry h5, div.post-entry h6, div.post-entry blockquote, div.post-footer, h3#comment-count, h4#comment-header, div#comments ol li p.comment-metadata, h4#respond { font-family: ';
		print $mytheme->option['headerfontfamily'];
		print "; }\n";
	}
}
function mytheme_postentryalignment() {
	global $mytheme;
	if ( $mytheme->option['postentryalignment'] ) {
		print 'div.post-entry p { text-align: ';
		print $mytheme->option['postentryalignment'];
		print "; }\n";
	}
}
function mytheme_wrapperwidth() {
	global $mytheme;
	if ( $mytheme->option['wrapperwidth'] ) {
		print 'div#wrapper { width: ';
		print $mytheme->option['wrapperwidth'];
		print "; }\n";
	}
}
function mytheme_aboutheader() {
	global $mytheme;
	if ($mytheme->option['about'] == 'yes') {
		print '<li>
			<h2>';
		print $mytheme->option['aboutheader'];
		print '</h2>';
	}
}
function mytheme_abouttext() {
	global $mytheme;
	if ($mytheme->option['about'] == 'yes') {
		print '<p>';
		print $mytheme->option['abouttext'];
		print "</p></li>";
	}
}

/************************************************************************************
 * FUNCTION DEFAULTS
 ************************************************************************************/
if ( !$mytheme->is_installed() ) {

	$set_defaults['about'] = 'yes';
	$set_defaults['aboutheader'] = 'About';
	$set_defaults['abouttext'] = 'The text here and header above can be customized in the Presentation > themes options menu. You can also select within the options to exclude this section completely. <em>Most</em> XHTML <strong>tags</strong> will <span style="text-decoration:underline;">work</span>.';
	$result = $mytheme->store_options($set_defaults) ;
}

/************************************************************************************
 * CALL FOR WIDGETS PLUGIN, V.1
 ************************************************************************************/
if ( function_exists('register_sidebar') )
    register_sidebar();

/* no stupid smart quotes, please! */
remove_filter('the_content', 'wptexturize');
remove_filter('comment_text', 'wptexturize');
remove_filter('the_rss_contentâ', 'wptexturizeâ');

?>
