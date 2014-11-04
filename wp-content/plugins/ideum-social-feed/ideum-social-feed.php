<?php
/*
Plugin Name: Ideum Social Feed
Description: Exposes the Ideum social feed to wordpress
Author: Ben Cates <ben@ideum.com>
Version: 0.1.0
*/

function ideum_social_feed( $length = null ){
    $response = wp_remote_get( 'http://localhost:8888/' );
    if ( is_wp_error( $response ) ) {
        return array();
    }

    $feed = json_decode( wp_remote_retrieve_body( $response ) );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    return array_slice( $feed, 0, $length );
}
