<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row double">
						<div class="6u">
							<div class="row collapse-at-2">
								<div class="6u">
									<h3>Accumsan</h3>
									<ul class="alt">
									<!-- // Define our WP Query Parameters -->
									<?php $the_query = new WP_Query( 'posts_per_page=4' ); ?>
									 
									<!-- // Start our WP Query -->
									<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
									 
									<!-- //Display the Post Title with Hyperlink -->
									<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
									 
									<?php 
									endwhile;
									wp_reset_postdata();
									?>
									</ul>
								</div>
								<div class="6u">
									<h3>Faucibus</h3>
									<ul class="alt">
										<!-- // Define our WP Query Parameters -->
										<?php $the_query = new WP_Query( 'posts_per_page=4' ); ?>
										 
										<!-- // Start our WP Query -->
										<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
										 
										<!-- //Display the Post Title with Hyperlink -->
										<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
										 
										<?php 
										endwhile;
										wp_reset_postdata();
										?>
									</ul>
								</div>
							</div>
						</div>
						<div class="6u">
											 <?php
						if(is_active_sidebar('footer_right')){
							dynamic_sidebar("footer_right");
						}
					?>
							
							<ul class="icons">
								<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
							</ul>
						</div>
					</div>
					<ul class="copyright">
					 <?php
						if(is_active_sidebar('footer')){
							dynamic_sidebar("footer");
						}
					?>
					</ul>
				</div>
			</footer>
<?php wp_footer(); ?>
	</body>
</html>





