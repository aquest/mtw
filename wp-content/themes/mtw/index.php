<?php get_header(); ?>
<div class="bg-paper">
	<div class="container margin-bottom-20">
		<div class="row">
			<?php $latest_news = new WP_Query('cat=2&showposts=1'); ?>
			<?php if($latest_news->have_posts()) : ?>
				<?php while($latest_news->have_posts()) : ?>
					<?php $latest_news->the_post(); ?>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<div class="row">
							<div class="col-sm-12">
								<h2>Latest News</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5 col-md-6 col-lg-5 margin-bottom-10">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
									<?php echo get_the_post_thumbnail( $post_id, array(300,300), array('alt' => 'News Image') ); ?>
								</a>
							</div>
							<div class="col-sm-7 col-md-6 col-lg-7">
								<h3 class="margin-top-0">
									<?php
										$tit = the_title('','',FALSE);
										echo substr($tit, 0, 30);
										if (strlen($tit) > 30) echo " ...";
									?>  
								</h3>
								<p><i class="fa fa-calendar"></i> <?php the_date();?></p>
								<p>
									<?php echo word_truncate_excerpt(55); ?>	
								</p>
								<h5><a href="<?php echo MTW_ROOT ?>news#<?php the_ID(); ?>" title="Read More">Read More</a></h5>
							</div>
						</div>
					</div>
				<?php endwhile;?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="gigpress-wrap">
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
						<p>Sorry, We have no upcoming shows.</p>
					<?php endif; ?>
					<h5><a href="<?php echo MTW_ROOT ?>shows" title="More Shows">More Shows</a></h5>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h3>Join Our Mailing List!</h3>
						<?php mc4wp_form(); ?>
					</div>
				</div>
			</div>
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