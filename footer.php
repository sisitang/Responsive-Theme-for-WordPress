<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package hope
 */
?>
	</div><!-- #content -->
<?php
    $copyright = get_posts(
                array(
                    'name'      => 'copyright-privacy',
                    'post_type' => 'page'
                )
            );
    $copyright_content = '';
    if ( $copyright ) {
        $copyright_id = $copyright[0]->ID;
        $copyright_content = get_field( "copyright", $copyright_id );
    }
    $contact = get_posts(
                    array(
                        'name'      => 'contact',
                        'post_type' => 'page'
                    )
                );
    $contact_id = '';
    $telephone = '';
    $email = '';
    $address = '';
    if ( $contact ) {
        $contact_id = $contact[0]->ID;
        $telephone = get_field( "telephone", $contact_id );
        $email = get_field( "email", $contact_id );
        $address = get_field( "address", $contact_id );        
    }
    
?>
	<footer id="colophon" class="site-footer" role="contentinfo">
            <div class="footer-wrapper">
                <div class="footer-contact-info-wrapper">
                    <div class="footer-contact-info footer-phone-and-email">
                        <div><i class="fa fa-phone"></i><span><?php echo $telephone;?></span></div>
                        <div><i class="fa fa-envelope"></i><span><?php echo $email?></span></div>
                    </div>
                    <div class="footer-contact-info footer-address">
                        <div class="address-icon"><i class="fa fa-map-marker"></i></div>
                        <div class="address-content"> <?php echo $address;?></div>
                    </div>
                    <div class="footer-contact-info footer-social-icons">
                        <?php hope_social_menu() ?>
                    </div>
                </div>
                <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
                <div class="copyrightinfo"><?php echo $copyright_content; ?></div>
                <div class="privateinfo"><a href=<?php echo get_permalink( get_page_by_path( 'copyright-privacy' ) )?>>Privacy & Legal</a></div>
            </div>
	</footer><!-- #colophon -->
<?php 
    
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
