<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package hope
 */
$page_slug = 'home';

get_header(); ?>

<?php include("banner.php");?>

<div class="hp-content-wrapper">
<?php 

    $home = get_posts(
                array(
                    'name'      => 'home',
                    'post_type' => 'page'
                )
            );
    $home_id = $home[0]->ID;
    
    $hpsections = array(
        'aboutus' => array(
            'tagline' => get_field( 'aboutus_tagline', $home_id ),
            'excerpt' => get_field( 'aboutus_excerpt', $home_id ),
            'image' => get_field( 'aboutus_image', $home_id ),
            'class' => 'content-section-about',
            'url' => 'aboutus'
        ),
        'programs' => array(
            'tagline' => get_field( 'programs_tagline', $home_id ),
            'excerpt' => get_field( 'programs_excerpt', $home_id ),
            'image' => get_field( 'programs_image', $home_id ),
            'class' => 'content-section-program',
            'url' => 'programs'
        ),
        'donate' => array(
            'tagline' => get_field( 'donate_tagline', $home_id ),
            'excerpt' => get_field( 'donate_excerpt', $home_id ),
            'image' => get_field( 'donate_image', $home_id ),
            'class' => 'content-section-donate',
            'url' => 'donate'
        ),
        'products' => array(
            'tagline' => get_field( 'products_tagline', $home_id ),
            'excerpt' => get_field( 'products_excerpt', $home_id ),
            'image' => get_field( 'products_image', $home_id ),
            'class' => 'content-section-product',
            'url' => 'products'
        ),
        'press' => array(
            'tagline' => get_field( 'press_tagline', $home_id ),
            'excerpt' => get_field( 'press_excerpt', $home_id ),
            'image' => get_field( 'press_image', $home_id ),
            'class' => 'content-section-press',
            'url' => 'all-press'
        ),        
    );


    $index = 0;
    foreach( $hpsections as $hpsection ){
        $index ++;
        if ( $index == 1 || $index == 3) {
            echo '<div class="hp-content-area">';
        }
?>
            <a class="content-section <?php echo $hpsection["class"] ?>" href="<?php echo $hpsection['url'] ?>">
                <div class="content-section-detail">
                    <img src=" <?php echo $hpsection["image"]['url']; ?> " alt="<?php echo $hpsection["image"]['alt']; ?>">
                    <h1><?php echo $hpsection["tagline"]; ?></h1>
                    <h2><?php echo $hpsection["excerpt"]; ?></h2>
                </div>
            </a>    
<?php 
        if ( $index == 2 || $index == 5) {
            echo '</div>';
        }
    }
?>    
</div>    

<?php get_footer(); ?>
