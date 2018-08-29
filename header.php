<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
    	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700,300' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>The Safe Zone Project<?php wp_title(); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- facebook meta -->
        <meta property="og:title" content="<?php $title = strip_tags(get_the_title()); echo $title; ?> [The Safe Zone Project]"/>
        <meta property="og:site_name" content="The Safe Zone Project"/>
        <meta property="og:description" content="<?php the_field('facebook_description')?>"/>
        <meta property="fb:app_id" content="278048022339925" />
        <meta property="og:url" content="<?php the_permalink()?>" />
        <?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
        <?php if ($fb_image) : ?>
        <meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
        <?php else : ?>
        <meta property="og:image" content="<?php echo get_bloginfo('template_url') ?>/library/images/the-safe-zone-project-com-200.png"/>
        <?php endif; ?>
        <meta property="og:type" content="article" />

        <!-- twitter cards -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@SafeZoneProject"/>
        <meta name="twitter:title" content="<?php $title = strip_tags(get_the_title()); echo $title; ?>" />
        <meta name="twitter:description" content="<?php the_field('facebook_description')?>"/>
        <?php $twitter_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
        <?php if ($twitter_image) : ?>
        <meta name="twitter:image" content="<?php echo $twitter_image[0]; ?>" />
        <?php else : ?>
        <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/library/images/the-safe-zone-project-com-200.png"/>
        <?php endif; ?>


		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<script src="https://use.fontawesome.com/22fcd90a48.js"></script>

		<!-- Google Analytics -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-41719411-1', 'thesafezoneproject.com');
          ga('send', 'pageview');

		</script>
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

    <!--fb root-->
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=278048022339925";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
    </script>
    <!--/fb-root-->

<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->

    	<div id="thanks-share-bg">
        </div>
        <div id="thanks-share">
            <h2>Yay! Yay! Yay!</h2>
            <p>We're happy you're going to put our work to use! Enter your email so we can keep you up-to-date with new curriculum changes (a couple per year) and ensure you have the best version! <strong>After you receive the confirmation email, you'll be ready to download the curriculum.</strong></p>
            <h3><i class="icon-hand-down pull-left icon-2x"></i>Enter your email!<br/><span>(never even a little spammy!)</span></h3>
                <!-- Begin MailChimp Signup Form -->
                <div id="mc_embed_signup" class="clearfix">
                <form action="//thesafezoneproject.us14.list-manage.com/subscribe/post?u=ea0c46d03932169ae6dcf867a&amp;id=8b2cd0735d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_ea0c46d03932169ae6dcf867a_8b2cd0735d" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Send Confirmation" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
                </div> <!--End mc_embed_signup-->
                <p class="noEmail">Not comfy giving us your email so we can keep your version of the curriculum up to date? No worries. <a href="http://bit.ly/SZP2hr" alt="Download Curriculum">Click here</a> for a sneaky no-email-needed, insta-download of the curriculum.</p>
            <a id="closeThanksShare" href="#"><i class="icon-remove-sign"></i></a>
        </div><!--/thanks-share-->
        <!--<div id="thanks-share">
            <h2>Thanks! Thanks! Thanks!</h2>
            <p>We're super happy you've downloaded the curriculum and found our site to be helpful! Think any of your buds may also appreciate it?</p>
            <h3><i class="icon-hand-down pull-left icon-2x"></i>Let your friends know!<br/><span>(it's like giving us a high-five!)</span></h3>
                <ul>
                    <li><a class="thanks-share-button" id="fb" alt="Share on Facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=http://thesafezoneproject.com"><i class="icon-facebook"></i></a></li>
                    <li><a class="thanks-share-button" id="tw" alt="Share on Twitter" target="_blank" href="http://twitter.com/share?text=Check+out+%40SafeZoneProject%2C+an+online+resource+for+creating+powerful%2C+effective+%23LGBTQ+awareness+workshops.+%23sachat"><i class="icon-twitter"></i></a></li>
                    <li><div class="fb-like" data-href="http://facebook.com/safezoneproject" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false" data-action="recommend"></div></li>
                    <li><a href="https://twitter.com/SafeZoneProject" class="twitter-follow-button" data-show-count="true">Follow @SafeZoneProject</a></li>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    		<a id="closeThanksShare" href="#"><i class="icon-remove-sign"></i></a>
    	</div> /thanks-share-->


		<div id="container" class="clearfix">

			<header class="header clearfix" role="banner">
            <div id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></div>
            <div id="mobile-menu-label">Menu <i class="icon-arrow-right"></i></div>
            <button id="mobile-menu" type="button" onClick="toggleHeight();"><i class="icon-reorder"></i></button>
            <nav id="main-nav" role="navigation" class="clearfix">
				<?php bones_main_nav(); ?>
			</nav>

           <?php szp_hook_after_nav()?>

				<div id="inner-header" class="wrap clearfix">
					<!-- if you'd like to use the site description you can un-comment it below -->
					<?php // bloginfo('description'); ?>
				</div> <!-- end #inner-header -->

			</header> <!-- end header -->

            <!--<div class="bannerAd clearfix">
                <a href="<?php echo home_url(); ?>/update/happy-birthday-to-us" alt="Our Birthday Announcement">
                    <img src="<?php echo home_url(); ?>/wp-content/themes/szp/library/images/szp-we-turned-1.png" alt=""/>
                </a>
            </div>-->
