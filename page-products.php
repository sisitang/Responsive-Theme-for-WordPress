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
$page_slug = 'products';
get_header(); ?>

<?php include("banner.php");?>
    <div class="page-content-area">
        <div id="primary" class="content-area">
        <?php if ( have_posts() ) {?>
            <div class="content-area-section ">
                <main id="main" class="site-main staff-description" role="main">
                    <?php echo $post->post_content; ?>
                </main><!-- #main -->
            </div>
        <?php } ?>
            <div class="content-area-section">
                <div class="content-headline">
                    <h1><?php echo get_field( 'small_product_title', $page_obj ); ?></h1>
                </div>            
		<main id="main" class="site-main" role="main">
                    <div class="content-area-section"><?php echo get_field( 'small_product_description', $page_obj ); ?></div>
                    <a href="small" class="read-more-button"><?php echo get_field( 'small_product_title', $page_obj ); ?></a>
		</main><!-- #main -->                
            </div>
            <div class="content-area-section">
                <div class="content-headline">
                    <h1><?php echo get_field( 'large_product_title', $page_obj ); ?></h1>
                </div>            
		<main id="main" class="site-main" role="main">
                    <?php echo get_field( 'large_product_description', $page_obj ); ?>
                    <a href="large" class="read-more-button"><?php echo get_field( 'large_product_title', $page_obj ); ?></a>
		</main><!-- #main -->                
            </div>            
	</div><!-- #primary -->
        
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
