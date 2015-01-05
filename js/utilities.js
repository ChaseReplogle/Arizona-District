/**
 * Search Form - This code handles change the dropdown label and input placeholder based on which checkbox is slected.
 *
 */

$( document ).ready(function() {
  var check_radio = $("#searchOptions input[type='radio']:checked").next().text();
  var search_text = $("#searchOptions input[type='radio']:checked").attr('data-searchtext');
  $("#search-options-link").text(check_radio);
  $("#s").attr("placeholder", (search_text));
});

$( "#searchOptions" ).change(function () {
   var check_radio = $("#searchOptions input[type='radio']:checked").next().text();
   var search_text = $("#searchOptions input[type='radio']:checked").attr('data-searchtext');
   $("#search-options-link").text(check_radio);
   $("#s").attr("placeholder", (search_text));
});

$("#searchOptions a").click(function () {
	event.preventDefault();
	$(".search-options").toggle();
	$(this).addClass("selected");
});

$("#searchOptions input[type='radio']").click(function () {
	$(".search-options").toggle();
	$( "#s" ).focus();
	$(this).removeClass("selected");
});



/**
 * Counter - controls the counter span animations.
 *
 */

var $reviews = $('.main-header-stats ul li');
$reviews.eq(Math.random()*$reviews.length).addClass("show");
$(".show").find(".timer").addClass("fixed_timer");

var finishTime = $(".fixed_timer").text();
jQuery({someValue: 0}).animate({someValue: finishTime}, {
	duration: 3000,
	easing:'swing', // can be anything
	step: function() { // called on every step
		// Update the element's text with rounded-up value:
		$('.fixed_timer').text(Math.ceil(this.someValue));
	}
});






/**
 * Tabs - Handles the tab functionality.
 *
 */
$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).css("display", "block");
    });
});