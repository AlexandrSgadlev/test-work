/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	
	/*
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );
	*/

	// inputmask
	var phones = [{ "mask": "+1 ### ### ####"}];
    $(".wpcf7-tel").inputmask({ 
        mask: phones, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} });	

	// mobil menu
	$('#m-nav').on('click', function() {
		$('#site-navigation .header-menu').show();
		if($('#m-nav').hasClass("active")){
			$('#site-navigation').removeClass("active");
		}else{
			$('#site-navigation').addClass("active");
			$('#site-navigation .header-menu').width('100%');			
		}
	});
	
	$('#site-navigation .b-nav-overlay').on('click', function() {
		ExitNavigation()
	});	
	$('#site-navigation .close-nav').on('click', function() {
		ExitNavigation()
	});	

	function ExitNavigation(){
		if($('#site-navigation').hasClass("active")){
			$('#site-navigation .header-menu').width('0%');
			setTimeout(function() {
				$('#site-navigation').removeClass("active");
			 }, 200);
		}		
	}
	
	
	$( window ).resize(function() {
		console.log($( window ).width());
		if($( window ).width() <= '767'){
			$('#site-navigation .header-menu').width('0%');
			$('#site-navigation .header-menu').hide();
		}else{
			$('#site-navigation .header-menu').width('100%');
			$('#site-navigation .header-menu').show();
		}
	});

	
	
	
	


	// Youtube
	$('#main-block .btn-1').on('click', function() {
		if(!player){
			loadPlayer();
			window.onYouTubePlayerAPIReady = function () {
				onYouTubePlayer();
			};
		}
	});

	$('#main-block .modal').on('hidden.bs.modal', function (e) {
		stopAllYouTubeVideos();
	})


	function loadPlayer() {
		if (typeof(YT) == 'undefined' || typeof(YT.Player) == 'undefined') {
			var tag = document.createElement('script');
			tag.src = "https://www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		}
	}
	
	var player;
	function onYouTubePlayer() {
		player = new YT.Player('e-video', {
			height: '360',
			width: '640',
			videoId: 'OpiH_P9aGhQ',
			events: {
				'onReady': onPlayerReady,
			}
		});
	}

	function onPlayerReady(event) {
		event.target.playVideo();
	}

	var stopAllYouTubeVideos = () => {
	var iframes = document.querySelectorAll('iframe');
		Array.prototype.forEach.call(iframes, iframe => {
			iframe.contentWindow.postMessage(JSON.stringify({ event: 'command',
			func: 'stopVideo' }), '*');
		});
	}
		

	// Slid
	function Slid_i(){
	
		var slidesToShow = 3;
		var slidesToScroll = 3;
		
		if($( window ).width() <= '767'){
			slidesToShow = 1;
			slidesToScroll = 1;			
		}
		
		$(".regular").slick({
			dots: true,
			infinite: false,
			slidesToShow: slidesToShow,
			slidesToScroll: slidesToScroll,
		});

	}
	Slid_i();
	
	// Comment
	$("#commentform").submit(function(e){
		
		e.preventDefault();

		var i = 0;

		if($("#author").length && $("#email").length){


			if( !($("#author").val().trim()) ){
				$("#author").addClass('no-valid');
				i = 1;
			}else{
				$("#author").removeClass('no-valid');
			}
			
			if( !($("#email").val().trim()) || ( !validateEmail($("#email").val()) ) ){
				$("#email").addClass('no-valid');
				i = 1;
			}else{
				$("#email").removeClass('no-valid');
			}
		
			if(i !== 1){
				$('#commentform .form-submit').addClass('active');
			}

		}

		if (i == 0) {
			
			var form = document.querySelector('#commentform');
			HTMLFormElement.prototype.submit.call(form);
			
		}

	});		
		
		function validateEmail($email) {
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			return emailReg.test( $email );
		}		
	
	
	
}( jQuery ) );
