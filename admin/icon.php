<?php
 
function add_rd_menu_icons_styles(){
?>
 
<style>
#adminmenu .menu-icon-rd-hover div.wp-menu-image:before {
content: "\f128";
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_rd_menu_icons_styles' );
?>