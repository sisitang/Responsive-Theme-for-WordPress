<?php
    function get_wp_object( $post_type, $taxonomy, $slug ) {
            $args = array( 
                    'post_type' => $post_type,
                    'posts_per_page' => 1,
                    'tax_query' => array(
                            array(
                                    'taxonomy' => $taxonomy,
                                    'field' => 'slug',
                                    'terms' => $slug
                            )
                    )
            );    
            return new WP_Query( $args );
    }
?>

<div class="banner-wrapper">  
<?php 
    $banner = get_wp_object( "banners", "banners_type", $banner_slug );
    $banner_image_url = array('');  
    if ( $banner->have_posts() ){ 
        $banner->the_post();
        $banner_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $banner->ID ), 'single-post-thumbnail' ); 
?>
        <div class="customized-banner">
            <div class="banner-image"><img src="<?php echo $banner_image_url[0] ?>" alt="banner"></div>
            <article class="tagline-wrapper">
                <h1 class="tag-line"><?php the_title(); ?></h1>
                <h2 class="tag-line-description"><?php the_excerpt(); ?></h2>
            </article>
        </div>
<?php 
    }
?>    
</div>    