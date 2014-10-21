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
$page_slug = 'programs';
get_header(); ?>
<?php include("banner.php");?>
    <div class="page-content-area">
        <div id="primary" class="content-area">
            <div class="content-area-section">
                <div class="content-headline">
                    <h1><?php echo get_field( 'program_title', $page_obj );?></h1>
                </div>            
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php echo get_field( 'programs_description', $page_obj ); ?>
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
            </div>
            <div class="content-area-section">
                <div class="content-headline">
                    <h1><?php echo get_field( 'application_title', $page_obj );?></h1>
                </div>            
		<main id="main" class="site-main" role="main">
                    <?php echo get_field( 'form', $page_obj );?>
		</main><!-- #main -->                
            </div>
	</div><!-- #primary -->
        
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
