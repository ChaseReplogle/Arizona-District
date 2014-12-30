/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );

	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
} )();






/**
 * navigation.js
 *
 * Handels the primary navigation dropdown panels.
 */

$( ".menu-main-site-menu > .menu-item" ).click(function() {
  var panelID = $(this).attr('id');
  $(".menu-item__dropdown").slideUp("fast");
  $(".menu-main-site-menu .menu-item").removeClass("selected");
  $(this).addClass("selected");
  $('#dropdown' + panelID ).slideToggle( "fast", function() {

  });
});




/**
 * navigation.js
 *
 * Handles toggling nested menu items.
 */

 $( ".page_item_has_children > a" ).click(function() {
   event.preventDefault();
   $(this).next("ul").slideDown("fast", function() {
    $(this).parent().addClass("selected");
  });
 });





/**
 * navigation.js
 *
 * Handles the mobile navigation
 */

$(".header__mobile__toggle").click(function() {
	$(".menu-mobile-site-menu").slideToggle("slow");
});

$(".menu-mobile-site-menu .menu_item_has_children > a").click(function() {
   $(".menu-mobile-site-menu .menu_item_has_children").children(".children").slideUp();
    $(".menu-mobile-site-menu .menu_item_has_children").removeClass("selected");
   $(this).next(".children").slideDown();
   $(this).parent().toggleClass("selected");
 });
