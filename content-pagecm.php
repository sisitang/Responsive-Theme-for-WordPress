<?php
/**
 * @package hope
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
                    echo $post->post_content;
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
