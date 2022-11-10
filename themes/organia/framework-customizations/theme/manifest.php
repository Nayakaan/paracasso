<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest[ 'name' ]			 = esc_html__( 'Organia', 'organia' );
$manifest[ 'uri' ]			 = esc_url( 'http://themeforest.com/wp/organia' );
$manifest[ 'description' ]               = esc_html__( 'Organia - Organic Foods Store WordPress theme', 'organia' );
$manifest[ 'version' ]                   = '1.0';
$manifest[ 'author' ]			 = 'ThemeWar';
$manifest[ 'author_uri' ]		 = esc_url( 'http://themeforest.com/user/themewar' );
$manifest[ 'requirements' ]	 = array(
	'wordpress'              => array(
		'min_version' => '4.3',
	),
);
$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
            'backups'               => array(),
);
