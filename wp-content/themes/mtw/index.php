<?php get_header(); ?>
<div class="bg-paper">
	<div class="container margin-bottom-20">
		<div class="row">
   				<?php $count = 1 ?>
				<?php $latest_news = new WP_Query('cat=2&showposts=1'); ?>
				<?php if($latest_news->have_posts()) : ?>
					<?php while($latest_news->have_posts()) : ?>
						<?php $latest_news->the_post(); ?>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
							<div class="row">
								<div class="col-sm-12 padding-0">
									<h2>Latest News</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5 col-md-5 col-lg-6 margin-bottom-10 padding-0">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail( $post_id, array(260,260) ); ?></a>
								</div>
								<div class="col-sm-7 col-md-7 col-lg-6">
									<p>
										<?php 
							        		$excerpt = get_the_excerpt('','',FALSE);
							        		echo substr($excerpt, 0, 400);
							        		if(strlen($excerpt) > 400) echo "...";
							        	?>
									</p>
									<a href="<?php the_permalink() ?>">Read More</a>
								</div>
							</div>
						</div>
					<?php endwhile;?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			<!--Loop Goes here-->
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
				<h2>Upcoming Shows</h2>
				<?php if(gigpress_has_upcoming()) : ?>
					<?php
					    $options = array(
							'limit' => 3,
							'scope' => 'upcoming',
							'show_tours' => 'no',
							'group_artists' => 'no',
							'artist_order' => 'alphabetical',
					    );
					    echo gigpress_sidebar($options);
					?>
				<?else:?>
					Sorry, We have no upcoming shows.
				<?php endif; ?>
				<h4><a href="<?php echo MTW_ROOT ?>shows">More Shows</a></h4>
			</div>
			<!--Loop Ends here-->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 padding-0">
			<div id="wrapper" class="bg-fabric">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 ">
							<div class="margin-10">
								<img src="http://placehold.it/140x140" alt="..." class="img-circle margin-10">
								<img src="http://placehold.it/140x140" alt="..." class="img-circle margin-10">
								<img src="http://placehold.it/140x140" alt="..." class="img-circle margin-10">
							</div>
							<div class="margin-10">
								<img src="http://placehold.it/140x140" alt="..." class="img-circle margin-10">
								<img src="http://placehold.it/140x140" alt="..." class="img-circle margin-10">
								<img src="http://placehold.it/140x140" alt="..." class="img-circle margin-10">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 margin-bottom-20 margin-top-20">
							<iframe id="sound-cloud" src="https://w.soundcloud.com/player/?url=http://soundcloud.com/maynard-7" width="100%" height="465" scrolling="no" frameborder="no"></iframe>
							<script>
							(function(){
							    var widgetIframe = document.getElementById('sound-cloud'),
							        widget       = SC.Widget(widgetIframe);
							    widget.bind(SC.Widget.Events.READY, {auto_play: true}, function() {
							    	widget.bind(SC.Widget.Events.PLAY, function() {
								        widget.getCurrentSound(function(currentSound) {
								          console.log('sound ' + currentSound.get('') + 'began to play');
								        });
							    	});
								    widget.getVolume(function(volume) {
								    	console.log('current volume value is ' + volume);
								    });
							      	widget.setVolume(75);
							    });
							}());
							</script>
			
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>