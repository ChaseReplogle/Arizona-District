(function(e){function t(t){var i=t.find(".marker"),s={zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP},o=new google.maps.Map(t[0],s);o.markers=[];i.each(function(){n(e(this),o)});r(o)}function n(e,t){var n=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),r=new google.maps.Marker({position:n,map:t});t.markers.push(r);if(e.html()){var i=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(r,"click",function(){i.open(t,r)})}}function r(t){var n=new google.maps.LatLngBounds;e.each(t.markers,function(e,t){var r=new google.maps.LatLng(t.position.lat(),t.position.lng());n.extend(r)});if(t.markers.length==1){t.setCenter(n.getCenter());t.setZoom(16)}else t.fitBounds(n)}e(document).ready(function(){e(".acf-map").each(function(){t(e(this))})})})(jQuery);$(document).ready(function(){var e=$("#searchOptions input[type='radio']:checked").next().text(),t=$("#searchOptions input[type='radio']:checked").attr("data-searchtext");$("#search-options-link").text(e);$("#s").attr("placeholder",t)});$("#searchOptions").change(function(){var e=$("#searchOptions input[type='radio']:checked").next().text(),t=$("#searchOptions input[type='radio']:checked").attr("data-searchtext");$("#search-options-link").text(e);$("#s").attr("placeholder",t)});$("#searchOptions a").click(function(){event.preventDefault();$(".search-options").toggle();$(this).addClass("selected")});$("#searchOptions input[type='radio']").click(function(){$(".search-options").toggle();$("#s").focus();$(this).removeClass("selected")});var $reviews=$(".main-header-stats ul li");$reviews.eq(Math.random()*$reviews.length).addClass("show");$(".show").find(".timer").addClass("fixed_timer");$(document).ready(function(){var e=$(".fixed_timer").html();jQuery({someValue:0}).animate({someValue:e},{duration:2e3,step:function(){$(".fixed_timer").text(Math.round(this.someValue))},complete:function(){$(".fixed_timer").text(e)}})});$(".tabs-menu a").click(function(e){e.preventDefault();$(this).parent().addClass("current");$(this).parent().siblings().removeClass("current");var t=$(this).attr("href");$(".tab-content").css("display","none");$(t).css("display","block")});var parentTitle=$(".page-inner-header h2").text();$(".menu-main-site-menu li a").filter(function(){return $(this).text()===parentTitle}).parent(".menu-item").addClass("selected");$(".toggle-link").click(function(e){e.preventDefault();$(this).next(".toggle-container").slideToggle()});$(function(){$("h2.tribe-events-page-title").html($("h2.tribe-events-page-title").html().replace(" › ",""))});var currentCalendarPage=$(".calendar_breadcrumb").text();currentCalendarPage!==""&&$(".sidebar ul li a:contains('"+currentCalendarPage+"')").parent().addClass("current_page_item");$(".button-headline a").click(function(e){e.preventDefault();$("#hidden-form").slideToggle();$(this).parent().toggleClass("active");$(".entry-content").toggleClass("fade-opacity")});$(".gform_button").click(function(e){$(".button-headline a").parent().removeClass("active");$(".entry-content").removeClass("fade-opacity")});