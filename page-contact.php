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

$page_slug = 'contact';

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
        <div class="content-area-section contact-page">
            <div class="content-headline">
                <h1>Contact us</h1>
            </div>
            <main id="main" class="site-main" role="main">
                <i class="fa fa-phone-square"></i><?php echo get_field( 'telephone', $page_obj ); ?>
            </main><!-- #main -->
            <main id="main" class="site-main" role="main">
                <i class="fa fa-envelope"></i><?php echo get_field( 'email', $page_obj ); ?>
            </main><!-- #main -->
            <main id="main" class="site-main" role="main">
                <i class="fa fa-map-marker"></i><?php echo get_field( 'address', $page_obj ); ?>
            </main><!-- #main -->        
            <main id="main" class="site-main" role="main">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d41651.88683677295!2d-123.11102939764412!3d49.271793925641774!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5486716d45f1df85%3A0x5faf71c99a7153bb!2s882+E+Cordova+St%2C+Vancouver%2C+BC+V6A+1M4!5e0!3m2!1sen!2sca!4v1412550719669" width="800" height="600" frameborder="0" style="border:0"></iframe>
            </main><!-- #main -->               
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
