<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'templates/header', 'support_menu' ); ?>

<?php get_template_part( 'templates/header', 'menu' ); ?>
<div class="mobile-menu"><?php get_template_part( 'templates/header', 'mobile-menu' ); ?></div>



<div class="content" style="">

	<span class="spacer">-</span>

	<?php arizona_district_home_header(); ?>





	<div id="tabs-container">
	    <ul class="tabs-menu">
	    	<div class="wrapper">
		        <li class="current"><a href="#tab-1">Lead Pastor</a></li>
		        <li><a href="#tab-2">Staff Pastor</a></li>
		        <li><a href="#tab-3">Church Planter</a></li>
		        <li><a href="#tab-4">Retired Pastor</a></li>
	        </div>
	    </ul>
	    <div class="tab">
	        <div id="tab-1" class="tab-content" style="background: url('http://azag:8888/wp-content/uploads/2015/01/lightstock-35234-man-preaching-a-sermon-e1420216842232.jpg') no-repeat top center;-webkit-background-size: cover;
					-moz-background-size: cover; -o-background-size: cover; background-size: cover;
					filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../images/monument_valley.jpg', sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../images/monument_valley.jpg', sizingMethod='scale')"; ">
	        	<div class="gradient">
	        		<div class="wrapper">
		        		<div class="tab-content-text">
		            		<h2>Lead Pastors</h2>
		            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus placerat risus, dictum porttitor nisl efficitur eu. Aenean volutpat sapien urna, vitae rhoncus nisi cursus non.</p>
		            		<ul>
								<li><a href="#">Distrcit Meetings & Events</a></li>
								<li><a href="#">Update Your Information</a></li>
								<li><a href="#">Upcoming District Council</a></li>
								<li><a href="#">Resources for Your Church</a></li>
								<li><a href="#">Contribute Tithe</a></li>
		            		</ul>
		            	</div>
		            </div>
	        	</div>
	        </div>
	        <div id="tab-2" class="tab-content" style="background: url('http://azag:8888/wp-content/uploads/2015/01/lightstock-31980-men-s-bible-study-e1420216337597.jpg') no-repeat top center;-webkit-background-size: cover;
					-moz-background-size: cover; -o-background-size: cover; background-size: cover;
					filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://azag:8888/wp-content/uploads/2015/01/lightstock-31980-men-s-bible-study-e1420216337597.jpg', sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://azag:8888/wp-content/uploads/2015/01/lightstock-31980-men-s-bible-study-e1420216337597.jpg', sizingMethod='scale')"; ">
	        	<div class="gradient">
	        		<div class="wrapper">
		        		<div class="tab-content-text">
		            		<h2>Staff Pastors</h2>
		            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus placerat risus, dictum porttitor nisl efficitur eu. Aenean volutpat sapien urna, vitae rhoncus nisi cursus non.</p>
		            		<ul>
								<li><a href="#">Distrcit Meetings & Events</a></li>
								<li><a href="#">Upcoming District Council</a></li>
								<li><a href="#">Resources for Your Church</a></li>
								<li><a href="#">Contribute Tithe</a></li>
		            		</ul>
		            	</div>
		            </div>
	        	</div>
	        </div>
	        <div id="tab-3" class="tab-content" style="background: url('http://azag:8888/wp-content/uploads/2015/01/lightstock-66079-man-preaching-on-stage-with-bible-and-microphone-smiling.jpg') no-repeat top center;-webkit-background-size: cover;
					-moz-background-size: cover; -o-background-size: cover; background-size: cover;
					filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../images/monument_valley.jpg', sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../images/monument_valley.jpg', sizingMethod='scale')"; ">
	        	<div class="gradient">
	        		<div class="wrapper">
		        		<div class="tab-content-text">
		            		<h2>Church Planters</h2>
		            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus placerat risus, dictum porttitor nisl efficitur eu. Aenean volutpat sapien urna, vitae rhoncus nisi cursus non.</p>
		            		<ul>
								<li><a href="#">Distrcit Meetings & Events</a></li>
								<li><a href="#">Upcoming District Council</a></li>
								<li><a href="#">Resources for Your Church</a></li>
								<li><a href="#">Contribute Tithe</a></li>
		            		</ul>
		            	</div>
		            </div>
	        	</div>
	        </div>
	        <div id="tab-4" class="tab-content" style="background: url('http://azag:8888/wp-content/uploads/2015/01/lightstock-63016-elderly-man-standing-at-a-window-reading-a-bible-by-sunlight-3.jpg') no-repeat top center;-webkit-background-size: cover;
					-moz-background-size: cover; -o-background-size: cover; background-size: cover;
					filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../images/monument_valley.jpg', sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../images/monument_valley.jpg', sizingMethod='scale')"; ">
	        	<div class="gradient">
	        		<div class="wrapper">
		        		<div class="tab-content-text">
		            		<h2>Retired Pastors</h2>
		            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus placerat risus, dictum porttitor nisl efficitur eu. Aenean volutpat sapien urna, vitae rhoncus nisi cursus non.</p>
		            		<ul>
								<li><a href="#">Distrcit Meetings & Events</a></li>
								<li><a href="#">Upcoming District Council</a></li>
								<li><a href="#">Resources for Your Church</a></li>
								<li><a href="#">Contribute Tithe</a></li>
		            		</ul>
		            	</div>
		            </div>
	        	</div>
	        </div>
	    </div>
	</div>



</div> <!-- .content -->


<?php if( get_field('instagram_bar') ) { ?>
	<?php arizona_district_instagram_bar(); ?>
<?php } ?>



<?php if( get_field('resources_bar') ) { ?>
	<?php arizona_district_resources_bar(); ?>
<?php } ?>



<?php get_footer(); ?>