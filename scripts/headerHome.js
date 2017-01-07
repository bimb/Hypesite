
$(document).ready(function(){
    
    var myURL = window.location.protocol + "//" + window.location.host + "/tests/hype/";
   
    var post_url0 = myURL+"inicio/?ajaxload=true";
    var post_url1 = myURL+"acerca-de/?ajaxload=false";
    var post_url2 = myURL+"horarios/?ajaxload=false";
    var post_url3 = myURL+"reservar/?ajaxload=false";   
    var post_url4 = myURL+"contacto/?ajaxload=false";
    var post_url5 = myURL+"entrenamiento/?ajaxload=false";
    var post_url6 = myURL+"yoga/?ajaxload=false";
    var post_url7 = myURL+"category/instructores/?ajaxload=false";

    
    
    
    $.ajaxSetup({cache:false});
    
    //$("#home-inicio").load(post_url0, function(){ $('.cycle-slideshow').cycle();});
    $("#home-inicio").load(post_url0, arrowSlide);
    $("#home-acerca-de").load(post_url1);
    $("#home-horarios").load(post_url2);
    $("#home-reservar").load(post_url3);
    $("#home-contacto").load(post_url4);
    $("#home-entrenamiento").load(post_url5);
    $("#home-yoga").load(post_url6);
    $("#home-instructores").load(post_url7, ajaxLoadInstructores);
    
    
    $("ul#menu-main-menu li a").removeAttr("href");
    
    $("#logo").click(function() {
        $("html, body").animate({ scrollTop: $('#home-inicio').offset().top }, 1000);
    });
    
    function arrowSlide(){
        $("#home-inicio .downArrow").click(function() {
        console.log('HI!!');
        $("html, body").animate({ scrollTop: $('#home-acerca-de').offset().top }, 1000);
        });
    }

    function ajaxLoadInstructores(){
        $('.slideshow').cycle();

        $(".slideshow a").click(function(){

            $.ajaxSetup({cache:false});
            var post_url = $(this).attr("href")+"?ajaxload=false";
            var link_id = $(this).attr('id');
            var divHeight = $(".loadingInstructor").height();

            if(divHeight != 0)
                $(".instructorContainer").css("height", divHeight);
            $(".loadingInstructor").fadeOut();
            $(".loadingInstructor").load(post_url, function(){$(".loadingInstructor").fadeIn();});

            return false;
        });
    }
    

    //Mobile menu... not yet confirmed
    $("#menu-item-7-mobile").click(function() {
        $('ul#menu-main-menu').fadeToggle();
    });

    /*
    $(window).resize(function() { 
    	if ($(window).width() > 729) 
    		$('ul#menu-main-menu').show(); 
    	});
    */
    
    $(".menu-main-menu-container ul#menu-main-menu li a").click(function() {
                             
        var theId = $(this).parent().attr('id');
        //console.log('ID: '+theId);
        switch(theId){
        case "menu-item-17"://Acerca de
            $("html, body").animate({ scrollTop: $('#home-acerca-de').offset().top }, 1000);
            if ($(window).width() < 729) 
                $('ul#menu-main-menu').fadeOut(); 
        break;
        case "menu-item-169"://Instructores
            $("html, body").animate({ scrollTop: $('#home-instructores').offset().top }, 1000);
            if ($(window).width() < 729) 
                $('ul#menu-main-menu').fadeOut(); 
        break;
        case "menu-item-16"://Horarios
            $("html, body").animate({ scrollTop: $('#home-horarios').offset().top }, 1000);
            if ($(window).width() < 729) 
                $('ul#menu-main-menu').fadeOut(); 
        break;
        case "menu-item-14"://Reservar
            $("html, body").animate({ scrollTop: $('#home-reservar').offset().top }, 1000);
            if ($(window).width() < 729) 
                $('ul#menu-main-menu').fadeOut(); 
        break;
        case "menu-item-15"://Contacto
            $("html, body").animate({ scrollTop: $('#home-contacto').offset().top }, 1000);
            if ($(window).width() < 729) 
            	$('ul#menu-main-menu').fadeOut(); 
        break;
        }

        $("ul#menu-main-menu li").removeClass("current-menu-item");
        $(this).parent().addClass("current-menu-item");
         
    });
    
    $(window).scroll( function(){
        var posScroll = $(window).scrollTop();
        var posContact = $('#home-contacto').offset().top;
        if(posScroll > 0){
            $('#menu-item-6').addClass('scrollMenu2');
            if(posScroll >= posContact){
                $('#menu-item-6').addClass('scrollMenu3');    
            }else{
                $('#menu-item-6').removeClass('scrollMenu3');
            }
        }else{
            $('#menu-item-6').removeClass('scrollMenu2');
        }
    }); 

    var header = $("#navegacion");
    $(window).on("load scroll",function(e){
        var scroll = $(window).scrollTop();

        if (scroll >= 55) {
            header.addClass("darkHeader");
        } else {
            header.removeClass("darkHeader");
        }
    });

    $menuLeft = $('.pushmenu-left');
    $nav_list = $('#nav_list');
    $cruz_list = $('#cerrarMenu');   

    $nav_list.click(function() {
        $(this).toggleClass('active');
        $('.pushmenu-push').toggleClass('pushmenu-push-toright');
        $menuLeft.toggleClass('pushmenu-open');
    });

    $cruz_list.click(function(event) {
        event.preventDefault();
        $('#nav_list').toggleClass('active');
        $('.pushmenu-push').toggleClass('pushmenu-push-toright');
        $menuLeft.toggleClass('pushmenu-open');
    });

});
