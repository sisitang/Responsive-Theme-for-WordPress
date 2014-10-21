<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hope
 */
$page_slug = 'small';
get_header(); ?>

<?php include("banner.php");?>
    <div class="page-content-area">
	<div id="primary" class="content-area">
            <?php if ( have_posts() ) {?>
                <div class="content-area-section ">
                    <main id="main" class="site-main staff-description" role="main">
                        <div class="content-area-section"><?php echo $post->post_content; ?></div>
                        <a href="http://tradeworks.myshopify.com/" class="read-more-button">Shop</a>
                    </main><!-- #main -->
                </div>
            <?php } ?>            
	</div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
