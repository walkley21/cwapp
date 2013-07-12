/**
 * Isotope: An exquisite jQuery plugin for magical layouts
 * options: http://isotope.metafizzy.co/docs/options.html
 */
jQuery.noConflict();
jQuery(document).ready(function($) {
    // Home page
    $('#home_responsive').isotope({
        itemSelector: '.hp-wrapper',
        layoutMode: 'masonry'
    });
    // Clients block at the bottom of each page
    $('#clients').isotope({
        itemSelector: '.hp-wrapper',
        layoutMode: 'masonry'
    });
    // Gallery page
    $('#gallery-main').isotope({
        itemSelector: '.hp-wrapper',
        layoutMode: 'masonry'
    });
    // Portfolio page
    $('#portfolio').isotope({
        itemSelector: '.hp-wrapper',
        layoutMode: 'masonry'
    });
    // Portfolio Grid page
    $('#gallery').isotope({
        itemSelector: '.hp-wrapper',
        layoutMode: 'masonry'
    });
    // Filters at Portfolio Grid and Portfolio pages
    $('#filters a').click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');

        var selector = $this.attr('data-filter');

        $('#portfolio, #gallery').isotope({
            filter: selector
        });

        $this.parent.addClass('selected');
        return false;
    });


    /**
 * Bootstrap: Sleek, intuitive, and powerful front-end framework
 * docs: http://twitter.github.com/bootstrap/
 */

    /**
	 * Dropdown menu
	 * more information: http://twitter.github.com/bootstrap/javascript.html#dropdowns
	 */
    $('.dropdown-toggle').dropdown();

    // make menu open on hover
    $(".dropdown").hover(
        function () {
            $(this).addClass("open");
        },
        function () {
            $(this).removeClass("open");
        }
        );
    /**
	 * Toggle Boxes
	 * more information: http://twitter.github.com/bootstrap/javascript.html#collapse
	 */
    $('.accordion').collapse();
    // make correction status icons Toggle Boxes
    $('.accordion').on('shown', function () {
        $('.accordion-group').each(function() {
            if ($(this).children(".accordion-body").hasClass("in")) $(this).children(".accordion-heading").children("a").removeClass("collapsed");
            else $(this).children(".accordion-heading").children("a").addClass('collapsed');
        });
    })
    $('.accordion').css('height','auto');


    /**
 * Other libraries section
 *
 */

    /**
	 * Fancybox - zooming functionality for images, html content.
	 * documentation: http://fancyapps.com/fancybox/#docs
	 */
    $("a.thumbnail, a.fancy").fancybox({
        'transitionIn'	:	'elastic',
        'transitionOut'	:	'elastic',
        'speedIn'		:	600,
        'speedOut'		:	200,
        'overlayShow'	:	false
    });
    $(".fancybox").fancybox();


    /**
	 * FlexSlider - responsive slider
	 * documentation: http://flexslider.woothemes.com/
	 */
    /** --- Portfolio Item page: slider and navigation in a carousel --- **/
    // navigation
    $('#carousel').flexslider({
        animation: "slide",			//String: Select your animation type, "fade" or "slide"
        controlNav: false,			//Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        animationLoop: true,		//Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        slideshow: false,			//Boolean: Animate slider automatically
        itemWidth: 80,				//{NEW} Integer: Box-model width of individual carousel items, including horizontal borders and padding.
        itemMargin: 5,				//{NEW} Integer: Margin between carousel items.
        asNavFor: '#slider'			//{NEW} Selector: Internal property exposed for turning the slider into a thumbnail navigation for another slider
    });
    // slider
    $('#slider').flexslider({
        animation: "slide",			//String: Select your animation type, "fade" or "slide"
        controlNav: false,			//Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        animationLoop: false,		//Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        slideshow: false,			//Boolean: Animate slider automatically
        sync: "#carousel"			//{NEW} Selector: Mirror the actions performed on this slider with another slider. Use with care.
    });


    /**
 * Custom scripts for extended interface functionality
 *
 */

    /**
	 * html generation for the the select menu
	 * - menu list is converted to the form element <select>
	 * - menu links are converted to the form elements <option>,
	 *  Text within <i> tags is removed from the select menu.
	 *
	 * Select menu will be inserted in block with selector .buttons-container that should be present in the html code of the page
	 */
    var select_menu = '<select class="nav-select">';
    $(".nav-collapse a").each(function() {
        var el = $(this);
        select_menu += '<option value="'+el.attr("href")+'"';
        if (el.parent().hasClass("active")) select_menu += ' selected';
        select_menu += '>'+el.html().replace(/<i>.*<\/i>/gi,'')+'</option>';
    });
    select_menu += '</select>';
    $(select_menu).appendTo(".buttons-container");
    // to work select element as menu, go to the next page on change
    $(".buttons-container select").change(function() {
        window.location = $(this).find("option:selected").val();
    });

    //Homepage slider
    $('.flexslider').flexslider({
        animation: "slide"
    });
    // Image valid loader
    var $container = $('#home_responsive, #gallery');
    $container.imagesLoaded( function(){
        $container.isotope({
            itemSelector: '.hp-wrapper',
            layoutMode: 'masonry',
            isAnimated: true
        });
    }); 
	
});