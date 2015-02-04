

(function($) {

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $el (jQuery element)
*  @return  n/a
*/

function render_map( $el ) {

  // var
  var $markers = $el.find('.marker');

  // vars
  var args = {
    zoom    : 16,
    center    : new google.maps.LatLng(0, 0),
    mapTypeId : google.maps.MapTypeId.ROADMAP
  };

  // create map
  var map = new google.maps.Map( $el[0], args);

  // add a markers reference
  map.markers = [];

  // add markers
  $markers.each(function(){

      add_marker( $(this), map );

  });

  // center map
  center_map( map );

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $marker (jQuery element)
*  @param map (Google Map object)
*  @return  n/a
*/

function add_marker( $marker, map ) {

  // var
  var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

  // create marker
  var marker = new google.maps.Marker({
    position  : latlng,
    map     : map
  });

  // add to array
  map.markers.push( marker );

  // if marker contains HTML, add it to an infoWindow
  if( $marker.html() )
  {
    // create info window
    var infowindow = new google.maps.InfoWindow({
      content   : $marker.html()
    });

    // show info window when marker is clicked
    google.maps.event.addListener(marker, 'click', function() {

      infowindow.open( map, marker );

    });
  }

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param map (Google Map object)
*  @return  n/a
*/

function center_map( map ) {

  // vars
  var bounds = new google.maps.LatLngBounds();

  // loop through all markers and create bounds
  $.each( map.markers, function( i, marker ){

    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

    bounds.extend( latlng );

  });

  // only 1 marker?
  if( map.markers.length == 1 )
  {
    // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 16 );
  }
  else
  {
    // fit to bounds
    map.fitBounds( bounds );
  }

}

$(document).ready(function(){

  $('.acf-map').each(function(){

    render_map( $(this) );

  });

});

})(jQuery);





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
  	duration: 2000,
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
        $(".tab-content").css("display", "none");
        $(tab).css("display", "block");
    });
});





/**
 * Finds the current inner page ancestor and sets the main menu link to current
 *
 */
var parentTitle = $(".page-inner-header h2").text();
$(".menu-main-site-menu li a").filter(function() {
// Matches exact string
return $(this).text() === parentTitle;
}).parent(".menu-item").addClass("selected");




/**
 * Handles links and containers that toggle slide downs.
 *
 */
$(".toggle-link").click(function(event){
   event.preventDefault();
  $(this).next(".toggle-container").slideToggle();
});





/**
 * Adjusts functionality in the calendar
 *
 */

$(function() {
    $('h2.tribe-events-page-title').html($('h2.tribe-events-page-title').html().replace(" › ", ""));
});

var currentCalendarPage = $(".calendar_breadcrumb").text();
if(currentCalendarPage !== '') {
  $(".sidebar ul li a:contains('" + currentCalendarPage + "')").parent().addClass("current_page_item");
}



/**
 * Handles slide down on hidden forms with button in the page header.
 *
 */
$(".button-headline a").click(function(event){
   event.preventDefault();
  $('#hidden-form').slideToggle();
  $(this).parent().toggleClass('active');
  $('.entry-content').toggleClass('fade-opacity');
});


$(".gform_button").click(function(event){
  $('.button-headline a').parent().removeClass('active');
  $('.entry-content').removeClass('fade-opacity');
});