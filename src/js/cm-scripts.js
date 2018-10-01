$(document).ready(function(){
  function moveBanner(){ 
    var bannerItems = $('ul.cm-list-slider')[0].childElementCount - 1;
    var currentItem = $('li.cm-item-slider.active');
    var currentButton = $('li.cm-slider-button.active');
    var nextItem = $(currentItem).next('.cm-item-slider');
    var nextButton = $(currentButton).next('.cm-slider-button');

    if (nextItem.length != 0) {
      $(currentItem).removeClass('active');
      $(currentButton).removeClass('active');
      $(nextItem).addClass('active');
      $(nextButton).addClass('active');
    }
    else {
      $(currentItem).removeClass('active');
      $(currentButton).removeClass('active');
      $('li.cm-item-slider:first-of-type').addClass('active');
      $('li.cm-slider-button:first-of-type').addClass('active');
    }
  }

  bannerStart = setInterval(function(){ 
    moveBanner();
  }, 3000);

  $('.cm-slider-button').click(function(){
    clearInterval(bannerStart);
    $('.cm-slider-button').removeClass('active');
    $(this).addClass('active');
    var numberChange = $(this).index();
    var sliderChange = $('.cm-item-slider')[numberChange]
    $('.cm-item-slider').removeClass('active');
    $(sliderChange).addClass('active');
    bannerStart = setInterval(function(){ 
      moveBanner();
    }, 3500);
  });
});