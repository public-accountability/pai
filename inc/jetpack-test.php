<?php
/**
 * Modify Jetpack module properties so that I can develop with them locally
 *
 * @param array $mod Module to look at modifying the properties of.
 * @return boolean
 */
function jtt_module_override( $mod ) {
	switch ( $mod['name'] ) {
		case 'Related Posts':
			$mod['requires_connection'] = false;
			break;
	}
	return $mod;
}
add_filter( 'jetpack_get_module', 'jtt_module_override' );

/**
 * Return post meta so that Jetpack related posts display
 *
 * @param type $metadata
 * @param type $object_id
 * @param type $meta_key
 * @param type $single
 * @return array
 */
function jtt_related_posts_meta( $metadata, $object_id, $meta_key, $single ) {
	if ( isset( $meta_key ) && '_jetpack_related_posts_cache' === $meta_key ) {
		$body = array(
			'size' => 3,
			'filter' => array( 'and' => array( 0 => array( 'term' => array( 'post_type' => 'post' ) ) ) ),
		);
		$cache_key = md5( serialize( $body ) );
		$metadata = array();
		// The payload should contain an array of post ids. You could query for them, but I hard coded some that I wanted to test with.
		$metadata[0][ $cache_key ] = array(
			'expires' => time() + 1000,
			'payload' => array(
				0 => array( 'id' => 4476 ),
				1 => array( 'id' => 4487 ),
				2 => array( 'id' => 4461 ),
			),
		);
		return $metadata;
	}
	return $metadata;
}
add_filter( 'get_post_metadata', 'jtt_related_posts_meta', 100, 4 );



function jtt_relatedposts_filter_hits( $hits ) {

    global $wpdb;
    $sql = 'select ID from ' . $wpdb->posts . ' where post_status="publish" AND post_type="post" order by rand() limit 0, 3';
    $res = $wpdb->get_results( $sql );
    $hits = array();
    foreach( $res as $id ) {
        $hits[] = array( 'id' => $id->ID );
    }
    return $hits;
}
add_filter( 'jetpack_relatedposts_filter_hits', 'jtt_relatedposts_filter_hits', 100 );
