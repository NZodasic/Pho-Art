document.addEventListener('DOMContentLoaded', function () {
    // Select all elements with the class "glider"
    var gliders = document.querySelectorAll('.glider');
  
    // Iterate over each glider element and initialize the Glider
    gliders.forEach(function (glider) {
      new Glider(glider, {
        slidesToScroll: 1,
        slidesToShow: 5,
        draggable: true,
        dots: glider.parentNode.querySelector('.dots'), 
        arrows: {
          prev: glider.parentNode.querySelector('.glider-prev'),
          next: glider.parentNode.querySelector('.glider-next') 
        },
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2,
            }
          },
          {
            breakpoint: 900,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 640,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 304,
            settings: {
              slidesToShow: 1.5,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 0,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }
        ]
      });
    });
  });
  