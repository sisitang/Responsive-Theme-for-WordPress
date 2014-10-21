	$labels = array(
		'name'               => _x( 'Images', 'post type general name' ),
		'singular_name'      => _x( 'Images', 'post type singular name'),
		'menu_name'          => _x( 'Home page slider', 'admin menu' ),
		'name_admin_bar'     => _x( 'Home page slider', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Image' ),
		'add_new_item'       => __( 'Add New Image' ),
		'new_item'           => __( 'New Image' ),
		'edit_item'          => __( 'Edit Image' ),
		'view_item'          => __( 'View Image' ),
		'all_items'          => __( 'All Images' ),
		'search_items'       => __( 'Search Images' ),
		'parent_item_colon'  => __( 'Parent:' ),
		'not_found'          => __( 'No images found.' ),
		'not_found_in_trash' => __( 'No images found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'hpslider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'hpslider', $args );      