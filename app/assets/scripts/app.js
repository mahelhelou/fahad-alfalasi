jQuery(function ($) {
	// let navbarHeight = $('.navbar').innerHeight()
	let navbarHeight = $('.navbar').innerHeight()

	// Dynamic body padding
	$('body').css('paddingTop', navbarHeight)

	// Adjust showcase height (100vh)
	let windowHeight = $(window).height()
	$('.showcase').height(windowHeight - navbarHeight)

	// Get full year
	// $('#year').text(new Date().getFullYear())

	// Init scrollspy
	// $('body').scrollspy({ target: '#main-menu' })

	// Apply smooth scroll
	$('#main-menu a, .navbar-brand').on('click', function (event) {
		if (this.hash !== '') {
			event.preventDefault()

			const hash = this.hash

			$('html, body').animate(
				{
					scrollTop: $(hash).offset().top - navbarHeight
				},
				800
			)
		}
	})

	// Stores owl carousel
	$('.stores .owl-carousel').owlCarousel({
		loop: true,
		nav: true,
		// navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		autoplay: true,
		autoplayTimeout: 3500,
		autoplayHoverPause: true,
		smartSpeed: 2500,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 3
			},
			992: {
				items: 5
			}
		}
	})

	// Testimonials owl carousel
	$('.testimonials .owl-carousel').owlCarousel({
		loop: true,
		nav: true,
		margin: 30,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		smartSpeed: 2000,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	})
})
