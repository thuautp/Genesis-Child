//Register in new Widget areas
function genesischild_extra_widgets() {	
	genesis_register_sidebar( array(
	'id'            => 'header-middle',
	'name'          => __( 'Header Middle', 'genesischild' ),
	'description'   => __( 'This is the Header Middle area', 'genesischild' ),
	) );
}

add_action( 'widgets_init', 'genesischild_extra_widgets' );
//Add in the new header with the middle widget header
function themeprefix_genesis_do_header() {

	global $wp_registered_sidebars;
	
	genesis_markup( array(
		'html5'   => '<div %s>',
		'xhtml'   => '<div id="title-area">',
		'context' => 'title-area',
	) );
	
	do_action( 'genesis_site_title' );
	do_action( 'genesis_site_description' );
	echo '</div>';

	
	genesis_widget_area( 'header-middle', array(
	'before' => '<aside class="header-middle widget-area header-widget-area">',
	'after'  => '</aside>',
	) );
        


	if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {
		genesis_markup( array(
			'html5'   => '<aside %s>',
			'xhtml'   => '<div class="widget-area header-widget-area">',
			'context' => 'header-widget-area',
		) );

		do_action( 'genesis_header_right' );
		add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
		add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
		dynamic_sidebar( 'header-right' );
		remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
		remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
		
		genesis_markup( array(
			'html5' => '</aside>',
			'xhtml' => '</div>',
		) );
	}

}

remove_action( 'genesis_header','genesis_do_header' );
add_action( 'genesis_header', 'themeprefix_genesis_do_header' );
