<form id="search" name="searchform" method="get" action="<?php bloginfo("url"); ?>">
	<section id="searchOptions" class="wrapper">
		<a href="#" id="search-options-link">Search Options</a>
		<div class="search-options">
			<input type="radio" value="" name="post_type" id="searchOptionsAll" data-searchtext="Resources, events, churches, etc..." checked /> <label for="searchOptionsAll">Search All Content</label>
			<input type="radio" value="church" name="post_type" id="searchOptionsChurches" data-searchtext="Name, city, pastor..." /> <label for="searchOptionsChurches">Search Churches</label>
			<input type="radio" value="leadership" name="post_type" id="searchOptionsStaff" data-searchtext="Name, position, title..." /> <label for="searchOptionsStaff">Search Leadership</label>
		</div>
	</section>

	<section id="searchMain" class="wrapper">
		<div class="search-form">
			<input type="search" id="s" name="s" title="Search Blog" placeholder="Search My Website" /><button type="submit" value="search" id="searchsubmit">Search</button>
		</div>
	</section>

</form>