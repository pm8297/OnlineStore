/**Flirst slider */
$('.slider-one')
.not(".slick-intialized")
.slick({
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    prevArrow:".site-slider .slider-btn .prev",
    nextArrow:".site-slider .slider-btn .next",
});

/**Second slider */
$('.slider-two')
.not(".slick-intialized")
.slick({
    prevArrow:".site-slider-two .prev",
    nextArrow:".site-slider-two .next",
    slidesToShow:4,
    slidesToScoll:1,
    autoplaySpeed:2000
});