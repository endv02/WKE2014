/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



// Speed of the automatic slideshow
var slideshowSpeed = 15000;

// Variable to store the images we need to set as background
// which also includes some text and url's.
var photos = [ {
		"image" : "01_header_wke_834x200.png",
	}, {
		"image" : "02_header_wke_834x200.png",
	}, {
		"image" : "03_header_wke_834x200.png",
	}, {
		"image" : "04_header_wke_834x200.png",
	}, 
];

var uripath = '/wp-content/themes/WKE2014';

jQuery(document).ready(function($) {
	var interval;
	$("#control").toggle(function(){
		stopAnimation();
	}, function() {
		// Change the background image to "pause"
		$(this).css({ "background-image" : "url("+uripath+"/images/btn_pause.png)" });
		
		// Show the next image
		navigate("next");
		
		// Start playing the animation
		interval = setInterval(function() {
			navigate("next");
		}, slideshowSpeed);
	});
	
	
	var activeContainer = 1;	
	var currentImg = 0;
	var animating = false;
	var navigate = function(direction) {
		// Check if no animation is running. If it is, prevent the action
		if(animating) {
			return;
		}
		
		// Check which current image we need to show
		if(direction == "next") {
			currentImg++;
			if(currentImg == photos.length + 1) {
				currentImg = 1;
			}
		} else {
			currentImg--;
			if(currentImg == 0) {
				currentImg = photos.length;
			}
		}
		
		// Check which container we need to use
		var currentContainer = activeContainer;
		if(activeContainer == 1) {
			activeContainer = 2;
		} else {
			activeContainer = 1;
		}
		
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
		
	};
	
	var showImage = function(photoObject, currentContainer, activeContainer) {
		animating = true;
		
		// Set the background image of the new active container
		$("#headerimg" + activeContainer).css({
			"background-image" : "url("+uripath+"/images/" + photoObject.image + ")",
			"display" : "block",
			"z-index" : 4
		});
		$("#headerimg" + currentContainer).css({
			"z-index" : 5
		});		
		
		$("#headerimg" + currentContainer).fadeOut(3000,function() {
			setTimeout(function() {	
			   animating = false;
			}, 4000);
		});
		
	};
	
	var stopAnimation = function() {
		// Change the background image to "play"
		$("#control").css({ "background-image" : "url("+uripath+"/images/btn_play.png)" });
		
		// Clear the interval
		clearInterval(interval);
	};
	
	// We should statically set the first image
	navigate("next");
	
	// Start playing the animation
	interval = setInterval(function() {
		navigate("next");
	}, slideshowSpeed);
	
});
