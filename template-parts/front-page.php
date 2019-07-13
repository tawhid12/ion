<?php

/**
 * Template Name: Front Template
 */

?>

<?php get_header(); 

while(have_posts()){
	the_post();
	the_content();
}


?>


<?php get_footer();?>