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
$page_slug = 'donate';
get_header(); ?>

<?php
    $args = array( 
            'post_type' => 'donors',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC' 
     );
    $donors = new WP_Query( $args );
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
        <?php if ( $donors->have_posts() ) {?>
            <div class="content-area-section">
                <div class="content-headline">
                    <h1><?php echo get_field( 'donors_title', $page_obj ); ?></h1>
                </div>   
                <?php while( $donors->have_posts() ): $donors->the_post(); ?>
                    <main id="main" class="site-main donors" role="main">
                            <h2><?php echo $post->post_title; ?></h2>
                            <div>
                                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="banner" title="<?php echo $post->post_title?>">
                                <?php echo $post->post_content; ?>
                            </div>
                    </main>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php }?>
        <?php if ( get_field( 'volunteer_content', $page_obj ) != NULL ) {?>
            <div class="content-area-section">
                <div class="content-headline">
                    <h1><?php echo get_field( 'volunteer_title', $page_obj ); ?></h1>
                </div>            
		<main id="main" class="site-main" role="main">
                    <?php echo get_field( 'volunteer_content', $page_obj ); ?>
		</main><!-- #main -->                
            </div>            
        <?php }?>    
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
