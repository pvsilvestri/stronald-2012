<?php

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html>
<html lang="<?php echo $language->language ?>" dir="<?php echo $language->dir ?>">
<head>
  <title><?php echo $head_title; ?></title>
  <?php echo $head; ?>
  <?php echo $styles; ?>
  <!--[if lte IE 6]>
  <style type="text/css" media="all">
    @import "<?php echo $base_path . path_to_theme() ?>/css/ie6.css";
  </style>
  <![endif]-->
  <!--[if IE 7]>
  <style type="text/css" media="all">
    @import "<?php echo $base_path . path_to_theme() ?>/css/ie7.css";
  </style>
  <![endif]-->
  <?php echo $scripts; ?>
</head>
<body class="<?php echo $body_classes; ?>">
  <div id="skip-nav"><a href="#content">Skip to Content</a></div>
  <div id="page">
  	<div id="wrapper">
  	        <div id="header">
  	          <div id="search-box">
  	            <?php if($search_box): ?>
  	              <?php echo $search_box; ?>
                    <?php endif; ?>
                  </div><!-- /search-box -->
  	          <div id="site-logo">
  	            <?php if ($logo): ?>
  	              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
  	                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
  	              </a>
                    <?php endif; ?>
  	          </div><!-- /site-logo -->
  	          <div id="header-buttons">
  	            <?php echo $header_buttons; ?>
  	          </div><!-- /header-buttons -->
  	          <div id="menu">
                    <?php echo $menu; ?>
                  </div><!-- /menu -->                                                                                                                                                                                                                                                                                                                             
  	        </div><!-- /header -->
  		<div id="main">
                  <div id="content-area">                                                                                                                                                                                                                                                               
                    <div id="content" class="column center">
                      <div id="content-inner" class="inner">
                        <?php if ($content_top): ?>
                        <div id="content-top">
                          <?php echo $content_top; ?>
                        </div>
                        <?php endif; ?>
                        <?php if ($Xbreadcrumb || $title || $tabs || $help || $messages || $mission): ?>
                          <div id="content-header">
                            <?php echo $Xbreadcrumb; ?>
                            <?php if ($title): ?>
                              <h2 class="title"><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if ($mission): ?>
                              <div id="mission"><?php echo $mission; ?></div>
                            <?php endif; ?>
                            <?php echo $messages; ?>
                            <?php if ($tabs): ?>
                              <div class="tabs"><?php echo $tabs; ?></div>
                            <?php endif; ?>
                            <?php echo $help; ?> 
                              </div> <!-- /#content-header -->
                            <?php endif; ?>
                            <!-- CONTENT AREA -->
                              <div id="content-area">
                                <?php echo $content; ?>
                              </div>
                              <?php echo $feed_icons; ?>
                              <?php if ($content_bottom): ?>
                              <div id="content-bottom">
                                <?php echo $content_bottom; ?>
                              </div>
                              <?php endif; ?>
                      </div> <!-- /content-inner -->
                    </div> <!-- /content -->
                    <!-- SIDEBAR LEFT -->
                      <?php if ($left): ?>
                        <div id="sidebar-left" class="column sidebar">
                          <div id="sidebar-left-inner" class="inner">
                            <?php echo $left; ?>
                          </div>
                        </div> <!-- /sidebar-left -->
                      <?php endif; ?>
                    <!-- SIDEBAR RIGHT -->
                      <?php if ($right): ?>
                        <div id="sidebar-right" class="column sidebar">
                          <div id="sidebar-right-inner" class="inner">
                            <?php echo $right; ?>
                          </div>
                        </div> <!-- /sidebar-right -->
                      <?php endif; ?>
  		  </div>
  		</div> <!-- /main -->
  		<div id="footer">
  			<div id="footer-left">
         		  <?php echo $footer_left; ?>
  			</div>
  			<div id="footer-center">
  			  <?php echo $footer_center; ?>
  			<div id="footer-right">
  			  <?php echo $footer_right; ?>
  			</div>
  		</div> <!-- /footer -->
  	</div> <!-- /wrapper -->
  </div> <!-- /page -->
  <?php echo $closure; ?>
</body>
</html>
