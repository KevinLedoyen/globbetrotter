<?php
// je cherche à retrouver les escales qui sont rattaché au voyage
// 	var_dump($wp_query);
// foreach ($wp_query as $key => $value) {
// 	var_dump($key);
// 	echo "<br>";
// 	var_dump($value);
// 	echo "<br>";
// }
// foreach ($wp_query->posts as $key => $post) {
// 	// var_dump($post);
// 	// echo $field_name = $wp_query->query['post_type'];
// 	// echo "<br>";
// 	// echo $post_id = $post->ID;
// 	// echo "<br>";
// 	// var_dump(have_rows($field_name, $post_id));
// 	$fields = get_field_objects($post_id);
// 	// var_dump( $escales ); 
// 	foreach ($fields['escale'] as $key => $escale) {
// 		var_dump($key);
// 		echo "<br>";
// 		var_dump($escale);
// 		echo "<br>";
// 	}
// }
// echo get_current_template(true);

$App->run();


// if ( have_posts() ) :
// 	while ( have_posts() ) : the_post();
// 		echo "have post <br>";
// 		var_dump($post);
// 		if( have_rows('escale') ):
// 			echo "there is rows <br>";

// 		 	// loop through the rows of data
// 		    while ( have_rows('escale') ) : the_row();

// 		        // display a sub field value
// 		        $escale = get_sub_field('escale');
// 		        var_dump($escale);

// 		    endwhile;

// 		else :

// 		    // no rows found

// 		endif;
// 	endwhile;
// else :
// 	echo wpautop( 'Sorry, no posts were found' );
// endif;



// var_dump($GLOBALS['post']);
// print_r($wp_query);



?>
