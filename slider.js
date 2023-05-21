$(document).ready(function () {
  var images = ['pictures/ross-parmly-rf6ywHVkrlY-unsplash.jpg', 'pictures/airplane-7359232__340.jpg', 'pictures/istockphoto-1277665848-612x612.jpg', 'pictures/Data.jpg'];
  var currentIndex = 0;
  var bgImage = $('.div0');

  function changeBackground() {
    bgImage.fadeOut(1000, function () {
      bgImage.css('background-image', 'url(' + images[currentIndex] + ')');
      bgImage.fadeIn(1000);
    });

    currentIndex++;
    if (currentIndex == images.length) {
      currentIndex = 0;
    }
  }

  setInterval(changeBackground, 5000);
});
