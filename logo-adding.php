<?php
// Defines Clickable Logo and adds Blog Info to title
function tp_logo() {?><a id="tp-sitelogo" href="<?php bloginfo( 'url' ); ?>"><img src="http://agenesisdeveloper.com/wp-content/uploads/2016/07/thu-logo-for-web.png" alt="<?php bloginfo('name')?>" title="<?php bloginfo('name')?>" /></a><?php ;
}
add_action( 'genesis_site_title','tp_logo',5,1);
