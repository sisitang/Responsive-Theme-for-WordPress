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
$page_slug = 'large';
get_header(); ?>
<?php
    $args = array( 
            'post_type' => 'largeproducts',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC' 
     );
    $largeproducts = new WP_Query( $args );
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
                <div class="content-area-section ">
                    <div class="content-headline">
                        <h1><?php echo get_field( 'contact_title', $page_obj ); ?></h1>
                    </div>     
                    <main id="main" class="site-main staff-description" role="main">
                        <?php echo get_field( 'email', $page_obj ); ?>
                    </main><!-- #main -->
                </div>
            <?php } ?>            
            <?php if ( $largeproducts->have_posts() ) {?>
                <div class="content-area-section products-wrapper">
                    <?php while( $largeproducts->have_posts() ): $largeproducts->the_post(); ?>
                        <main id="main" class="site-main product-section" role="main">
                            <div class="product-image-wrapper">
                                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="banner" title="<?php echo $post->post_title?>">
                            </div>
                            <div product-content-wrapper>
                                <h2><?php echo $post->post_title; ?></h2>
                                <?php echo $post->post_content; ?>
                            </div>
                        </main>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php }?>
	</div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
