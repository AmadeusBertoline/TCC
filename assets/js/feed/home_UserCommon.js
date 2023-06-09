var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: true,
  centerSlide: 'true',
  fade: 'true',
  grabCursor: 'true',
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints:{
      0: {
          slidesPerView: 1,
      },
      520: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 3,
      },
  },
});


/*Script, Burguer bar*/
var barsButton = document.querySelector('.burguerBar');/*Seleciona a div com a class 'burguerBar', e transforma em váriável.*/
var navbar = document.querySelector('.nav');/*Seleciona a div com a class 'nav', e transforma em váriável.*/

/*Função burguerBar, No cliclk do btn ativa as classes. */
barsButton.addEventListener('click', ()=>{
  navbar.classList.toggle('active');
  barsButton.classList.toggle('active');
})

