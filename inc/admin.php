<?php

function smstmn_menu_page(){
    add_menu_page( __( 'SMS Notifications' ), __( 'SMS Notifications' ), 'manage_options', 'smstmn', '', '' );
    add_submenu_page( 'smstmn', 'SMS Notification Settings', 'Settings', 'manage_options', 'smstmn_settings', 'smstmn_settings_page' );
}
add_action( 'admin_menu', 'smstmn_menu_page' );

function smstmn_settings_page() {
	echo 'test';
}