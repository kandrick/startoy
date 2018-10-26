// This is a manifest file that'll be compiled into including all the files listed below.
// Add new JavaScript/Coffee code in separate files in this directory and they'll automatically
// be included in the compiled file accessible from http://example.com/assets/application.js
// It's not advisable to add code directly here, but if you do, it'll appear at the bottom of the
// the compiled file.
//= require jquery
//= require jquery_ujs
//= require jquery-1.4.2.min
//= require jquery-ui-1.8.17.custom.min
//= require slides.min.jquery
//= require jquery.colorbox
//= require jquery.innerfade
//= require jquery.vticker.1.4
//= require nested_form
//= require jquery.formatCurrency-1.4.0.min
//= require date
//= require jquery.fancybox-1.3.1
//= require jquery.wysiwyg
//= require jquery.visualize
//= require jquery.uploadify
//= require swfobject
//= require jquery.uploadify
//= require ui.core



$(function(){
  $(".login").colorbox({width:"auto",height:"auto", inline:true, href:"#Sign_In"});
  $(".register").colorbox({width:"auto",height:"auto", inline:true, href:"#Sign_Up"});
  $(".advance_search").colorbox({width:"auto",height:"auto", inline:true, href:"#advance_searchs"});
  $(".shipping").colorbox({width:"auto",height:"auto", inline:true, href:"#Shipping"});
  $('ul#portfolio').innerfade({
    speed: 1000,
    timeout: 5000,
    type: 'sequence',
    containerheight: '220px'
  });
  
  $('.testimonial-container').vTicker({
    speed: 900,
    pause: 5000,
    animation: 'fade',
    mousePause: false,
    showItems: 2,
    direction: 'down',
    height:200
  });


  $.formatCurrency.regions[''] = {
                symbol: 'Rp',
                positiveFormat: '%s%n',
                negativeFormat: '(%s%n)',
                decimalSymbol: '.',
                digitGroupSymbol: ',',
                groupDigits: true
  };

  $("#top_seller").addClass('active');

  $("#tab_desc").click(function () {
      $("#tab5").hide();
      $("#tab4").show();
      $("#tab6").hide();
      $("#tab_desc").addClass("active");
      $("#tab_info").removeClass("active");
      $("#tab_how").removeClass("active");
    });
  $("#tab_info").click(function () {
      $("#tab4").hide();
      $("#tab5").show();
      $("#tab6").hide();
      $("#tab_desc").removeClass("active");
      $("#tab_info").addClass("active");
      $("#tab_how").removeClass("active");      
    });
  $("#tab_how").click(function () {
      $("#tab4").hide();
      $("#tab5").hide();
      $("#tab6").show();
      $("#tab_how").addClass("active");
      $("#tab_desc").removeClass("active");
      $("#tab_info").removeClass("active");      
    });
    $('#close').click(function() {
      $('#notif').hide('slow', function() {
        
      });
    });
});



