/**
 * Search Form - This code handles change the dropdown label and input placeholder based on which checkbox is slected.
 *
 */$(document).ready(function(){var e=$("#searchOptions input[type='radio']:checked").next().text(),t=$("#searchOptions input[type='radio']:checked").attr("data-searchtext");$("#search-options-link").text(e);$("#s").attr("placeholder",t)});$("#searchOptions").change(function(){var e=$("#searchOptions input[type='radio']:checked").next().text(),t=$("#searchOptions input[type='radio']:checked").attr("data-searchtext");$("#search-options-link").text(e);$("#s").attr("placeholder",t)});$("#searchOptions a").click(function(){event.preventDefault();$(".search-options").toggle();$(this).addClass("selected")});$("#searchOptions input[type='radio']").click(function(){$(".search-options").toggle();$("#s").focus();$(this).removeClass("selected")});var $reviews=$(".main-header-stats ul li");$reviews.eq(Math.random()*$reviews.length).addClass("show");$(".show").find(".timer").addClass("fixed_timer");var finishTime=$(".fixed_timer").text();jQuery({someValue:0}).animate({someValue:finishTime},{duration:3e3,easing:"swing",step:function(){$(".fixed_timer").text(Math.ceil(this.someValue))}});$(document).ready(function(){$(".tabs-menu a").click(function(e){e.preventDefault();$(this).parent().addClass("current");$(this).parent().siblings().removeClass("current");var t=$(this).attr("href");$(".tab-content").not(t).css("display","none");$(t).css("display","block")})});var parentTitle=$(".page-inner-header h2").text();$(".menu-main-site-menu li a").filter(function(){return $(this).text()===parentTitle}).parent(".menu-item").addClass("selected");