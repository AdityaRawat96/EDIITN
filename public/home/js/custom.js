function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function show() {
    /* Access image by id and change
    the display property to block*/
    document.getElementById("image").style.display = "block";

    document.getElementById("printableArea").style.display = "none";
}

function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({
            behavior: "smooth",
        });
    }
}

$(document).ready(function () {
    $(".top-notification-slider").not(".slick-initialized").slick({
        dots: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: true,
        nextArrow: '<div class="fa fa-angle-double-right slick-next"></div>',
        prevArrow: '<div class="fa fa-angle-double-left slick-prev"></div>',
    });

    $(".ranking-logos").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    $(".placementLogos-section__slider").not(".slick-initialized").slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        nextArrow: '<div class="fa fa-arrow-circle-right slick-next"></div>',
        prevArrow: '<div class="fa fa-arrow-circle-left slick-prev"></div>',
    });

    $(".testimoni-section__slider")
        .not(".slick-initialized")
        .slick({
            dots: true,
            infinite: true,
            speed: 1200,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 2,
            slidesToScroll: 1,
            nextArrow:
                '<div class="fa fa-arrow-circle-right slick-next"></div>',
            prevArrow: '<div class="fa fa-arrow-circle-left slick-prev"></div>',

            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });

    $(".specialization-slider").not(".slick-initialized").slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        nextArrow: '<div class="fa fa-arrow-circle-right slick-next"></div>',
        prevArrow: '<div class="fa fa-arrow-circle-left slick-prev"></div>',
    });
});
