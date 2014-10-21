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

$page_slug = 'aboutus';

get_header(); ?>

<?php
    $args = array( 
            'post_type' => 'boardmembers',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC' 
     );
    $boardmembers = new WP_Query( $args );
?>

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

        <?php if ( $boardmembers->have_posts() ) {?>
            <div class="content-area-section staff-wrapper">
                <?php while( $boardmembers->have_posts() ): $boardmembers->the_post(); ?>
                    <main id="main" class="site-main staff-section" role="main">
                            <h2><?php echo $post->post_title; ?></h2>
                            <div><img class="alignleft" src="<?php bloginfo('template_url'); ?>/images/avatar.png" alt="staff"><?php echo $post->post_content; ?></div>
                    </main>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php }?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
