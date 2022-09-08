<?php
$strJsonFileContents = file_get_contents('static/list_weapons_name.json');
// Convert to array 
$options = json_decode($strJsonFileContents, true);
if ( $term = $_GET['term'] ?? '' ) {
        $matches = array_filter( $options, function( $option ) use ( $term ) {
                return strpos( strtolower($option), $term ) !== false;
        } );
        header( 'Content-Type: text/javascript' );
        echo json_encode( array_values($matches) );
}