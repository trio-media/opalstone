jQuery( document ).ready(function() {
	
	// Rellax Js
	var rellax = new Rellax('.rellax', {
		center: false,
	});
	
	//adds custom styling to your select menus
	jQuery('select').selectize();
	
	//Makes sticky elements work on unsupported browsers
	var elements = jQuery('.sticky');
	Stickyfill.add(elements);
	
	//adds cta class to cf7 to save you the css
	jQuery('.wpcf7-submit').addClass('cta-button');
	
	//Add style to tables by standard if someone misses the styling
	jQuery('.standard-post-content table').addClass('table');
	
	//Wrap youtube videos in container to style
	jQuery('iframe[src*="youtube"]').wrap("<div class='youtube-responsive-container'></div>");
	
	// slick for news posts
	jQuery('.post-list-slider').slick({
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  prevArrow : '<button type="button" class="fal previous fa-chevron-left general">',
	  nextArrow : '<button type="button" class="fal next fa-chevron-right general">',
	  dots: true,
	  arrows: true,
		  responsive: [
			{
			  breakpoint: 1200,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 991,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 767,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});
	
	// acc with minmum fuss, please maintain html layout from example
	jQuery(".acc-title").click(function(e) { 
		e.preventDefault();
		jQuery(this).parent().children('.acc-title').toggleClass('active');
		jQuery(this).parent().children('.acc-section').slideToggle(700);
	});
	
	// main slider setting )comment out the options you don't need)
	jQuery('.slider-main').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow : '<button type="button" class="fal previous fa-chevron-left">',
		nextArrow : '<button type="button" class="fal next fa-chevron-right">',
		dots: true,
		arrows: false,
		appendDots:'.dots-container',
		autoplay: true,
		autoplaySpeed: 10000,
	});
	
	
	jQuery('.reviews-slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 10000,
		fade: true,
  		cssEase: 'linear'
	});
	
	// accreditations slider
	jQuery('.accreditations-slider, .logos-slider').slick({
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		dots: false,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
		{
		  breakpoint: 1200,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 991,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 767,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
		]
	});

	///////////////////////////////////
	///// Sub Menu Hover Intent //////
	///////////////////////////////////

		jQuery(".header li.menu-item-has-children a").hoverIntent({
	        over: slideDownSub, 
	        timeout: 0, 
	        out: SlideUpSub,
	    });

	    function slideDownSub(){   	
	    	jQuery(this).nextAll(".header ul.sub-menu").show();
	    }

	    function SlideUpSub(){
	    	//Don't need anything here but need to define something for jQuery
	    }

	    //When hovering over mega menu keep it visible
	    jQuery(".header ul.sub-menu").mouseover(function () {
			jQuery(this).stop(true, true).show();
		});

	    //When leaving the mega menu fade it out
	    jQuery(".header li.menu-item-has-children a, .header ul.sub-menu").mouseleave(function () {
			jQuery(".header ul.sub-menu").hide();
		});

	///////////////////////////////////
	///// End Sub Menu Hover Intent //////
	///////////////////////////////////
	
	// scrolling function using data classes
	jQuery(window).on("scroll", function () {
		if (jQuery(window).scrollTop() > 50) {
			jQuery(".header").addClass("fixed");
		}
		else {
			jQuery(".header").removeClass("fixed");
		}
	});
	
	// opens mmobile menu
	jQuery("a.burgerMenu").click(function(e) { 
		e.preventDefault();
		jQuery("a.burgerMenu").toggleClass('clicked');
		jQuery('.mobile-menu-container').toggleClass('active');
 	});
	
	/* control burger menu sub options */
	jQuery("ul#menu-mobile-menu li.menu-item-has-children > a").click(function(e) {
		e.preventDefault();
		jQuery(this).nextAll("ul.sub-menu").slideToggle();
	});
	
	//custom scrolling function - use common sense to see how it all fits togehter
	jQuery(".scollingToSection").click(function(e) {
		e.preventDefault();
		var scrollingModule = jQuery(this).attr('data-scrollingModule');
		jQuery('html, body').animate({
			scrollTop: jQuery("#scroll"+scrollingModule).offset().top - 70
		}, 2000);
	});
	
	/* handles forms + custom loaders */
	/*custom spinner on forms*/
	jQuery( ".wpcf7" ).append( '<div class="form-overlay"><div class="lds-ring vhboth"><img src="/wp-content/uploads/2020/07/Opalstone-Logo-2-202x202.png" alt=""></div></div>' );
	
	// Show new spinner on Send button click
	jQuery('.wpcf7-submit').on('click', function () {
		jQuery('.form-overlay').css({ visibility: 'visible' });
	});
	
	// Hide new spinner on result
	jQuery('div.wpcf7').on('wpcf7invalid wpcf7spam wpcf7mailsent wpcf7mailfailed wpcf7submit', function () {
		jQuery('.form-overlay').css({ visibility: 'hidden' });
	}); 
	
	// adds lighbox functionality to posts and pages
	jQuery(".standard-post a[href*='.png'],.standard-post a[href*='.jpg'],.standard-post a[href*='.gif']").attr( "data-lightbox", "postImages" );
	
	// lightbox options (leave if you can)
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
	
	//Call and phone tracking 
	 jQuery('a[href^="tel:"]').click(function() { 
		ga( 'send', 'event', 'Call', 'Click', jQuery(this).attr("href") ); 
	}); 
	jQuery('a[href^="mailto:"]').click(function() { 
		ga( 'send', 'event', 'Email', 'Click', jQuery(this).attr("href") ); 
	});
	
	//form tracking
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		if ( '352' === event.detail.contactFormId ) {
			
		} else { 
			ga( 'send', 'event', 'Contact Form', 'submit' );
		}
	}, false );
	
	//Call and phone tracking 
	 jQuery('span.services_tab').click(function() { 

	 	var service_type = jQuery(this).attr("data-type");
	 	console.log(service_type);

		jQuery(".services_tab_item").hide();
		jQuery('span.services_tab').attr("data-active","no");
		jQuery(this).attr("data-active","yes");

		console.log(".services_tab_item[data-type='"+service_type+"]");
		jQuery(".services_tab_item[data-type='"+service_type+"']").show();
	}); 

	
	//Filter Posts by AJAX
	jQuery('input.filter_posts_ajax').change(function(event) {

		jQuery('input.filter_posts_ajax').prop('checked', false);
		jQuery(this).prop('checked', true);

		var delay = 1000;

		var res = (".cat-spinner-posts");

		//Show spinner
		jQuery(".cat-page-posts").fadeOut(500).empty();

		event.preventDefault();

		//Get slugs of all selected terms in an array
		var terms = jQuery(this).map(function() {
			return this.value;
		}).get();

		var post_type = jQuery(this).attr("data-post_type");
		var taxonomy = jQuery(this).attr("data-taxonomy");

		jQuery.ajax({
			url: ajaxurl,
			data: {
				'action':'filter_posts_by_ajax',
				'post_type':post_type,
				'taxonomy':taxonomy,
				'terms' : terms
			},
			beforeSend: function() {
				jQuery(res).slideDown();
			  },
			success:function(data) {
				setTimeout(function() {
				  delaySuccessBottom(data);
				}, delay);
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}


		});
	});
	/*End posts filer jquery*/

	//Success jquery for the posts filter
	function delaySuccessBottom(data) {
	  jQuery(".cat-spinner-posts").delay(500).queue(function(next){
				jQuery(this).hide();
				next();
			});

	  jQuery(".cat-page-posts").append(data).fadeIn(1000);
	}
	
	var onResize = function() {
		if(jQuery(window).width() < 1201) {
			jQuery(".header .menu-main-menu-container li.menu-item-has-children > a").click(function(e) {
				e.preventDefault();
			});
			
			/*jQuery(".mobile-menu-container li.menu-item-has-children > a").click(function(e) {
				e.preventDefault();
				jQuery(this).nextAll(".mobile-menu-container ul.sub-menu").slideToggle();
			});*/
			
			jQuery(".mobile-menu-container li.menu-item-has-children > a").click(function(e) {
				e.preventDefault();

				if (jQuery(this).hasClass('active')) {
					jQuery(this).removeClass('active').nextAll(".mobile-menu-container .sub-menu").hide().removeClass('active');
				} else {
					jQuery(this).addClass('active').nextAll(".mobile-menu-container .sub-menu").show().addClass('active');
				}

			});
			
		} else {
			
		}
	}; 
	
	jQuery(document).ready(onResize);
	jQuery(window).resize(onResize); 
	
});




/* this handles lazy loading images */
jQuery( window ).load(function() {
	
	jQuery.fn.inView = function(){
			//Window Object
			var win = jQuery(window);
			//Object to Check
			var obj = jQuery(this);
			//the top Scroll Position in the page
			var scrollPosition = win.scrollTop();
			//the end of the visible area in the page, starting from the scroll position
			var visibleArea = win.scrollTop() + win.height();
			//the end of the object to check
			var objEndPos = (obj.offset().top - 0);
			return(visibleArea >= objEndPos && scrollPosition <= objEndPos ? true : false);
		};
		
		var addLazyLoad = function(){
			jQuery(".lazyLoadImage").each(function(){
				if(jQuery(this).inView()){
					var lazyLoadUrl = jQuery(this).attr('data-imageLoad');
					jQuery(this).css('background-image', 'url(' + lazyLoadUrl + ')');
					jQuery(this).addClass('active');
				}
			});
		};
		
		setTimeout(addLazyLoad(), 1500);

	jQuery(window).scroll(function(){
			addLazyLoad();
		});


});