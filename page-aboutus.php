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
            'post_type' => 'reports',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC' 
     );
    $reports = new WP_Query( $args );
?>

<?php include("banner.php");?>
<div class="page-content-area">
    <div id="primary" class="content-area">
        <div class="content-area-section">
            <div class="content-headline">
                <h1><?php echo get_field( 'who_tagline', $page_obj );?></h1>
            </div>
            <main id="main" class="site-main" role="main">
                <?php echo get_field( 'who_content', $page_obj ); ?>
            </main><!-- #main -->
        </div>
        <div class="content-area-section">
            <div class="content-headline">
                <h1><?php echo get_field( 'mission_tagline', $page_obj );?></h1>
            </div>
            <main id="main" class="site-main" role="main">
                <?php echo get_field( 'mission_content', $page_obj ); ?>
            </main><!-- #main -->
        </div>
        <?php if ( $reports->have_posts() ) {?>
            <div class="content-area-section">
                <div class="content-headline report-content-headline">
                    <h1><?php echo get_field( 'report_title', $page_obj ); ?></h1>
                </div>            
                <main id="main" class="site-main report-section" role="main">
                <?php while( $reports->have_posts() ): $reports->the_post(); ?>
                    <div class="report-body">    
                        <?php
                            $report_slug = $post->post_name;
                            $report_obj = get_object( $report_slug );
                        ?>
                        <h2><?php echo $post->post_title; ?></h2>
                        <?php 
                            $file_obj = get_field( 'file', $report_obj );
                            $image_obj = get_field( 'thumbnail', $report_obj );
                        ?>
                        <a href="<?php echo $file_obj['url']; ?>"><img src="<?php echo $image_obj['url']; ?>" alt=""></a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                </main>
            </div>
        <?php }?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
