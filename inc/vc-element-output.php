<?php

function ion_section_1($attr){
	extract(
	shortcode_atts(array(
        'site_name' => '',
        'nav_menu' => '',	
	
	),$attr)
	);
	ob_start();
	?>
	<header id="header" class="skel-layers-fixed">
	<?php echo $nav_menu; ?>
		<h1><a href="#">
			<a class="logo" href="<?php $current_url = "//" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
				<?php   
					if(is_front_page()) { 
						echo get_bloginfo( 'name' );
					} else {
					wp_title( '| Tawhid', true, 'right' );
				} ?>
			</a>
			
		</h1>
			
					<?php 
				wp_nav_menu(
					array(
						'theme_location'=> $nav_menu,
						'menu_id'		=>'nav',
						'menu_class'	=>'',
						'container' 	=>'nav'
					)
				)
			?>
	</header>
	<?php
	return ob_get_clean();	
}
add_shortcode('topheaderion','ion_section_1');


function banner($one){

extract(
shortcode_atts(array(
 'banner_image' => '',
 'banner_title' => '',
 'banner_des' => '',
 'btn1_name' => '',
 'link1' => '',
 'btn2_name' => '',
 'link2' => '',
),$one)
);

ob_start();
?>
		<!-- Banner -->
			<section id="banner" style="background-image:url(<?php $a = wp_get_attachment_image_src( $banner_image,array(800,200) ); echo $a[0];?>)">
				<div class="inner">
					<h2><?php echo esc_html($banner_title);?></h2>
					<p><?php echo esc_html($banner_des);?></p>
					<ul class="actions">
						<li><a href="<?php echo esc_attr($link1);?>" class="button big special"><?php echo esc_html($btn1_name);?></a></li>
						<li><a href="<?php echo esc_attr($link2);?>" class="button big alt"><?php echo esc_html($btn2_name);?></a></li>
					</ul>
				</div>
			</section>



<?php

return ob_get_clean();

}

add_shortcode('banner_section','banner');


//Section Two Output

function backgroundslide($two){

extract(
shortcode_atts(array(

 'header_title' => '',
 'header_des' => '',
 'card_section_two_group' => '',
 'icon' => '',
 'title' => '',
 'description' => '',
 
),$two)
);

ob_start();
?>
		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2><?php echo esc_html($header_title);?></h2>
					<p><?php echo esc_html($header_des);?></p>
				</header>
				<div class="container">
					<div class="row">               
						<?php 
							$sec_two_array_loop=vc_param_group_parse_atts($card_section_two_group);
							foreach($sec_two_array_loop as $sec_two_loop_value):
						?>
							<div class="4u">
								<section class="special box">
									<i class="icon <?php echo esc_attr($sec_two_loop_value['icon']);?> major"></i>
									<h3><?php echo esc_html($sec_two_loop_value['title']);?></h3>
									<p class="icon_p"><?php echo esc_html($sec_two_loop_value['description']);?></p>
								</section>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

<?php

return ob_get_clean();

}

add_shortcode('section_two','backgroundslide');


// Section Three With Parallex Output


function parallexbg($three){

extract(
shortcode_atts(array(

 'title' => '',
 'description' => '',
 'category' => '',

 
),$three)
);

ob_start();
?>
		<!-- Two -->
			<section id="two" class="wrapper style2">
				<header class="major">
					<h2><?php echo esc_html($title);?></h2>
					<p><?php echo esc_html($description);?></p>
				</header>
				<div class="container">
					<div class="row">
<?php
$args=array(
    'posts_per_page' => 2, 
    //'post_type' => 'my_custom_type'
    'category' => $category,
);
$wp_query = new WP_Query( $args );
if ( $wp_query->have_posts() ) :
while ( $wp_query->have_posts() ) :
$wp_query->the_post();
?>
						<div class="6u">
							<section class="special">
								<a href="#" class="image fit"><?php the_post_thumbnail();?></a>
								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>
								<ul class="actions">
									<li><a href="<?php the_permalink();?>" class="button alt">Learn More</a></li>
								</ul>
							</section>
						</div>
		<?php endwhile; ?>
		<?php endif; wp_reset_postdata();?>
					</div>
				</div>
			</section>



<?php

return ob_get_clean();

}

add_shortcode('section_three','parallexbg');


//Testimonials : Section Four Output


function testimonial($four){

extract(
shortcode_atts(array(

 'title' => '',
 'description' => '',
 'sec_4_img' => '',
 'category' => '',
 'title_2' => '',
 'post_per' => '',
 
),$four)
);

ob_start();
?>




			<!-- Three -->
			<section id="three" class="wrapper style1">
				<div class="container">
					<div class="row">
						<div class="8u">
							<section>
								<h2><?php echo esc_html($title);?></h2>
								<a href="#" class="image fit"><img src="<?php $a = wp_get_attachment_image_src( $sec_4_img,'large'); echo $a[0];?>" alt="" /></a>
								<p><?php echo esc_html($description);?></p>
							</section>
						</div>
						<div class="4u">
						<?php
							$args=array(
								'posts_per_page' => 1, 
								//'post_type' => 'my_custom_type'
								'category' => $category,
							);
							$wp_query = new WP_Query( $args );
							if ( $wp_query->have_posts() ) :
							while ( $wp_query->have_posts() ) :
							$wp_query->the_post();
						?>
							<section>
								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>
								<ul class="actions">
									<li><a href="<?php the_permalink();?>" class="button alt">Learn More</a></li>
								</ul>
							</section>
						<?php endwhile; ?>
						<?php endif; wp_reset_postdata();?>
							<hr />
							<section>
								<h3><?php echo esc_html($title_2);?></h3>
								<ul class="alt">
								<?php
									$args=array(
										'posts_per_page' => $post_per, 
										//'post_type' => 'my_custom_type'
										//'category' => $category,
									);
									$wp_query = new WP_Query( $args );
									if ( $wp_query->have_posts() ) :
									while ( $wp_query->have_posts() ) :
									$wp_query->the_post();
								?>
									<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
								<?php endwhile; ?>
								<?php endif; wp_reset_postdata();?>
								
								</ul>
							</section>
						</div>
					</div>
				</div>
			</section>	

<?php

return ob_get_clean();

}

add_shortcode('section_four','testimonial');





?>
