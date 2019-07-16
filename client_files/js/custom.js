// JavaScript Document

$(document).ready(function(e) {
	$("#hero-carousel").owlCarousel({
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		itemsScaleUp:true,
		lazyLoad : true,
		autoPlay : true,
		stopOnHover: true
	});
	initDotDotDot();
	$("#owl-client-reviews").owlCarousel({
		pagination: false,
        singleItem:true,
		lazyLoad : true,
        autoPlay:true,
        autoHeight: true,
        autoHeightClass: 'owl-height',
        navigation:true,
        navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
			],
		stopOnHover: true
    });
	$("#client-group").owlCarousel({
		items: 4,
		pagination: false,
		lazyLoad : true,
        autoPlay:true,
        autoHeight: true,
        autoHeightClass: 'owl-height',
        navigation:true,
        navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
			],
		stopOnHover: true
    });
	sniff();
	
	$('.profile-alert').hide();
	
	initVenoBox();
	
});

$(window).load(function(){
	$('body').delay(1000).queue(function(){
		$(this).addClass('loaded').clearQueue;
	});
});

function initVenoBox(){
	$('.venobox').venobox({
		infinigall: true,
		frameheight: 80*$(window).height()/100,	
	}); 
}

skrollr.init({
	smoothScrolling: false,
	mobileDeceleration: 0.004,
	forceHeight: false
});

function initDotDotDot(){
	$(".dotdotdot").dotdotdot();
}

function sniff(){
	height= $(window).height();
	barHeight = $('.nav').outerHeight(true);
	$('.parallax-intro').height(height - barHeight);
	$('.main-container').css('min-height',height - barHeight);
}


/*****************product switch********************/

$('.store-product.thumb').on('click',function(e){
	source = $(this).attr('src');
	selector = $(this).parents('.img-container').find('.store-product.active')
	selector.fadeOut(function(){
		selector.attr('src',source).fadeIn();
	});
});


/**********************************program modal***********************************/

$(document).on('click','.program-modal',function(e){
	e.preventDefault();
	//write AJAX code here to load content inside modal//
	$('#program').modal();
});

/*************************team info toggle display************************/

$('.team-member').on('click',function(e){
	memberInfo = $(this).attr('target');
	$('.team-group .team-member.active').parent().removeClass('active');
	$('.team-group .team-member.active').removeClass('active');
	$(this).parents('.team-wrapper').addClass('active');
	$(this).addClass('active');
	$('.team-container .member-info').removeClass('active');
	$('.team-container .member-info'+memberInfo).addClass('active');
});

/***********************************************************************/

/***********************password compare******************************/
var equals;
$('#confirm-pass').on('blur',function(){
	equals = 0;
	if($(this).val() != "" && $('#pass').val() != $(this).val()){
		$('.profile-alert').slideDown();
		$('#confirm-pass').focus();
		equals = 1;
	}
});

$('.profile-alert button').on('click',function(){
	$('.profile-alert').slideUp();
});

$('#profile-save').on('click',function(e){	
	if(equals == 1){
		e.preventDefault();
	}
});

/**********************video modal**********************************/
$(document).on('click','.watch-vid',function(e){
e.preventDefault();
videoURL = $(this).attr('data-src');
$('#modal-vid video').prop('src',videoURL);
$('#modal-vid').modal();
});


/******************************ajax to retrieve workout charts******************/

$('.workout-days').on('change',function(e){
	month = $(this).attr('id');
	day = $(this).find('option:selected').attr('value');
	link = $(this).attr('url-link');
	
	urllink = link+"user/getDailyRoutine";
	$.ajax({
		type: "POST",
		url: urllink,
		data: { 
			month : month,
			day : day
		},
		success: function(data) {
			$('.monthly-workout').html(data);
		}
	});
});

$('.printer-friendly').on('click',function(){
//code to generate printer friendly page
});

