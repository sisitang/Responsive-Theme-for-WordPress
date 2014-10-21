<?php
    function get_object( $slug ) {
        $obj = get_posts(
                    array(
                        'name'      => $slug,
                        'post_type' => 'page'
                    )
                );
        return $obj[0]->ID;
    }
    $page_obj = get_object( $page_slug );
    $banner_image_obj = get_field( 'banner_image', $page_obj );
?>

<div class="banner-wrapper">  
    <div class="customized-banner">
        <?php 
            if ($page_slug == 'home') { 
                $args = array( 
                'post_type' => 'hpslider',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC' 
            );
            $hpslider = new WP_Query( $args );
        ?>
            <div class="slider banner-image">
                <ul class="bxslider">
                    <?php while( $hpslider->have_posts() ): $hpslider->the_post(); ?>                    
                    <li><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="banner" title="<?php echo $post->post_title?>"></li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </div>
        <?php 
            }else{ 
        ?>
            <div class="banner-image"><img src="<?php echo $banner_image_obj['url']; ?>" alt="banner"></div>
        <?php
            }
        ?>
        <article class="tagline-wrapper">
            <h1 class="tag-line"><?php echo get_field( 'banner_tagline', $page_obj ); ?></h1>
            <h2 class="tag-line-description"><?php echo get_field( 'banner_excerpt', $page_obj ); ?></h2>
        </article>
    </div>
</div>    