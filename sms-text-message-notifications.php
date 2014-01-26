<?php
/*
Plugin Name: SMS Text Message Notifications
Plugin URI: http://dustyf.com
Description: Allow people to subscribe to text message notifications
Author: Dustin Filippini
Version: 0.1
Author URI: http://dustyf.com
*/

include_once( 'inc/admin.php' );
include_once( 'inc/post-types.php' );

/**
 * Comment to send an SMS through Twilio
 */
function smstmn_send_sms( $body, $to ) {
	$url = 'https://api.twilio.com/2010-04-01/Accounts/AC1b3445f19805e8f2fb197f26021aaf22/SMS/Messages.json';
	$from = '4142695400';
	$sid = 'AC1b3445f19805e8f2fb197f26021aaf22';
	$token = 'faa4253dd0e1d2534a0d0b77a3af69cd';
	// Test Info Below
	// $sid = 'AC3901183c16f1709d91f51f9c6bf8a7ea';
	// $token = '0e8089eb77f9d6feeb74ac6a192d248e';
	$args = array(
		'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( $sid . ':' . $token )
		),
		'body' => array(
			'Body' => $body,
			'To' => $to,
			'From' => $from
		),
	);
	$response = wp_remote_post( $url, $args );
	//var_dump($response);
	error_log( serialize( $response ) . PHP_EOL . ' ' . PHP_EOL, 3, ABSPATH . 'sms.log' );
}

function smstmn_send_on_post( $new_status, $old_status, $post ) {
	if ( get_post_type( $post ) == 'smstmn_message' && $new_status == 'publish' ) {
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'smstmn_subscriber',
			'fields' => 'ids'
		);
		$subscribers = get_posts( $args );
		
		foreach ( $subscribers as $sub ) {
			$number = '+1' . get_the_title( $sub );
			$message = $post->post_title;
			smstmn_send_sms( $message, $number );
		}
	}
}
add_action( 'transition_post_status', 'smstmn_send_on_post', 3, 10 );