jQuery(document).ready(function () {
    var header = document.querySelector("#header");
    var nav = document.querySelector('#nav');
    var close = document.querySelector('#close');

    nav.addEventListener('click', function (e) {
        header.classList.add('open')
    })

    close.addEventListener('click', function (e) {
        header.classList.remove('open')
    })

    jQuery('.praise-carousel').slick({
        dots: true,
              arrows: true,
              prevArrow:"<button class='slick-arrow slick-prev'><svg width='34' height='34' xmlns='http://www.w3.org/2000/svg'><g stroke='currentColor' fill='none' fill-rule='evenodd'><g stroke-width='2'><circle cx='17' cy='17' r='16'/><path stroke-linecap='round' stroke-linejoin='round' d='M19.066 11.273L12.566 17l6.75 5.727'/></g></g></svg></button>",
              nextArrow:"<button class='slick-arrow slick-next'><svg width='34' height='34' xmlns='http://www.w3.org/2000/svg'><g transform='matrix(-1 0 0 1 34 0)' stroke='currentColor' stroke-width='2' fill='none' fill-rule='evenodd'><circle cx='17' cy='17' r='16'/><path stroke-linecap='round' stroke-linejoin='round' d='M19.066 11.273L12.566 17l6.75 5.727'/></g></svg></button>",
              infinite: false,
              slidesToShow: 3,
              slidesToScroll: 1,
              responsive: [
                  {
                    breakpoint: 898,
                    settings: {
                      arrows: false,
                      slidesToShow: 2
                    }
                  },
                  {
                    breakpoint: 768,
                    settings: {
                      arrows: false,
                      slidesToShow: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      arrows: false,
                      slidesToShow: 1
                    }
                  }
                ]
          })
});