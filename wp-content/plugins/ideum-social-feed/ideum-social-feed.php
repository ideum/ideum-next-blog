<?php
/*
Plugin Name: Ideum Social Feed
Description: Exposes the Ideum social feed to wordpress
Author: Ben Cates <ben@ideum.com>
Version: 0.1.0
*/

function ideum_social_feed( ){
    $response = wp_remote_get( 'http://localhost:8888/' );
    if ( is_wp_error( $response ) ) {
        var_dump($response); die();
        return array();
    }

    $feed = json_decode( wp_remote_retrieve_body( $response ) );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    // echo "<code><pre>";
    // var_dump($feed);
    // echo "</pre></code>";
    // die();

    return $feed;
}
