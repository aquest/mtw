<?php
/**
 Template Name: Photos
 * @package WordPress
 * @subpackage Default_Theme
 */
get_header(); ?>
<div class="bg-paper">
	<div class="container">
		<h1 class="text-center padding-bottom-10">Photos</h1>
		<div class="row">
			<div class="col-xs-12">
				<div id="instafeed" class="text-center"></div>
			</div>
		</div>
	</div>
</div>
<script>
	//options can be found http://instafeedjs.com/
    var userFeed = new Instafeed({
        get: 'user',
        userId: 468590629,
        accessToken: '468590629.467ede5.82869085f3944180af4986eab1fea9bb',
        template: '<div class="col-xs-6 col-sm-4 col-md-3"><a href="{{link}}" target="_blank" title="{{caption}}"><img src="{{image}}" alt="Maynard & The Walnut"/></a></div>',
        limit: '60'
    });
    userFeed.run();
</script>
<?php get_footer(); ?>
