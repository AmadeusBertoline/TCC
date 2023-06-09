document.addEventListener('DOMContentLoaded', function() {
  var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 15,
    loop: true,
    centerSlide: true,
    fade: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
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
  
  // Definir o tempo de transição entre os slides (em milissegundos)
  var tempoTransicao = 3000; // 3 segundos
  
  // Função para avançar para o próximo slide
  function avancarSlide() {
    swiper.slideNext();
  }
  
  // Chamar a função avancarSlide a cada intervalo de tempo definido
  setInterval(avancarSlide, tempoTransicao);
  
  
  /*Script, Burguer bar*/
  var barsButton = document.querySelector('.burguerBar');
  var navbar = document.querySelector('.nav');
  
  /*Função burguerBar, No cliclk do btn ativa as classes. */
  barsButton.addEventListener('click', ()=>{
    navbar.classList.toggle('active');
    barsButton.classList.toggle('active');
  })
});