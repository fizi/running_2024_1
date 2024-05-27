


$(function () { 
  
  // Delete comma from tags
  var tags = document.getElementsByClassName('view-item-tags');
  for(i=0;i<tags.length;i++)
  tags[i].innerHTML = tags[i].innerHTML.replace(/\,/g,'');
  
  // Insert html elemens into the html of gallery
  $("<div class='gallery-item-overlay'><span class='eye'></span></div>").insertBefore(".gallery-item-box > a > img");
  
  
  // Navigation Sticky 
  var stickyNavTop = $('#site-navigation').offset().top;  
  var stickyNav = function() {  
    var scrollTop = $(window).scrollTop();     
    if (scrollTop > stickyNavTop) {   
      $('#site-navigation').addClass('sticky');  
    } else {  
      $('#site-navigation').removeClass('sticky');   
    }  
  };  
  stickyNav()  
  $(window).scroll(function() {  
    stickyNav();  
  });
    
    
  // MAIN MENU SLIDING DROPDOWN MENU    
  $('.nav.navbar-nav li').hover(
    function() {
      $('ul', this).stop().slideDown(400);
    },
    function() {
      $('ul', this).stop().slideUp(400);
    }
  );
  
  
  // init Isotope
  var $grid = $('.grid').isotope({
    // options
  });
  // layout Isotope after each image loads
  $grid.imagesLoaded().progress( function() {
    $grid.isotope('layout');
  });
  // filter items on button click
  $('.filtering').on( 'click', 'button', function() {
    $(this).addClass("active").siblings().removeClass("active");
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });
  
  
  // Forum Stats make responsive *************************************************
  $("#forum-stats .tab-content .table").wrap("<div class='table-responsive'></div>");
  $("#forum-stats .panel .table").wrap("<div class='table-responsive'></div>");

  
     
});


