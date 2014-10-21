<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package hope
 */
$page_name = $_SERVER['REQUEST_URI'];
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
        <?php 
            if ( strpos($page_name,'aboutus') || strpos($page_name,'staff') || strpos($page_name,'board-members') ) { 
                wp_nav_menu( array( 'theme_location' => 'aboutus' ) ); 
                echo '<hr>';
            }
        ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
        <img class="sidebar-image" src="<?php bloginfo('template_url'); ?>/images/donate.jpg" alt="donate">
        <button class="givenowbutton sidebar-button">Give Now</button>
</div><!-- #secondary -->
