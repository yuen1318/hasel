    $('.carousel.carousel-slider').carousel({
      fullWidth: true
    }, setTimeout(autoplay, 4500));

    function autoplay() {
      $('.carousel').carousel('next');
      setTimeout(autoplay, 4500);
    }

    $('.modal').modal();

    $('.button-collapse').sideNav({
      menuWidth: 250
    });
