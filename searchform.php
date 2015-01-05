<form id="search" name="searchform" method="get" action="<?php bloginfo("url"); ?>">
	<section id="searchOptions" class="wrapper">
		<a href="#" id="search-options-link">Search Options</a>
		<div class="search-options">
			<input type="radio" value="churches" name="post_type" id="searchOptionsChurches" data-searchtext="Name, city, pastor..." checked /> <label for="searchOptionsChurches">Search Churches</label>
			<input type="radio" value="events" name="post_type" id="searchOptionsEvents" data-searchtext="Search for district events..." /> <label for="searchOptionsEvents">Search District Events</label>
			<input type="radio" value="resources" name="post_type" id="searchOptionsResources" data-searchtext="Resources, articles, information..." /> <label for="searchOptionsResources">Search Resources</label>
			<input type="radio" value="staff" name="post_type" id="searchOptionsStaff" data-searchtext="Name, position, title..." /> <label for="searchOptionsStaff">Search Leadership</label>
			<input type="radio" value="all" name="post_type" id="searchOptionsAll" data-searchtext="Resources, events, churches, etc..." /> <label for="searchOptionsAll">Search All Content</label>
		</div>
	</section>

	<section id="searchMain" class="wrapper">
		<div class="search-form">
			<input type="search" id="s" name="s" title="Search Blog" placeholder="Search My Website" /><button type="submit" value="search" id="searchsubmit">Search</button>
		</div>
	</section>

</form>