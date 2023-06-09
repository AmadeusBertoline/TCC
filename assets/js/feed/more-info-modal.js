const btnOpenModal = document.querySelectorAll(".open-modal");
const btnCloseModal = document.querySelectorAll(".close-modal");
const fade = document.querySelectorAll(".fade");
const modal = document.querySelectorAll(".modal");

for (let i = 0; i < btnOpenModal.length; i++) {
    btnOpenModal[i].addEventListener('click', () => {
        fade[i].classList.toggle('hide');
        modal[i].classList.toggle('hide');
    });
}

for (let i = 0; i < btnCloseModal.length; i++) {
    btnCloseModal[i].addEventListener('click', () => {
        fade[i].classList.toggle('hide');
        modal[i].classList.toggle('hide');

    });
}

/*Abrir e fechar modal de comentário */
const btnOpenModalComment = document.querySelectorAll(".open-modal-comment");
const btnCloseModalComment = document.querySelectorAll(".close-modal-comment");
const fadeComment = document.querySelectorAll(".fadeComment");
const modalComment = document.querySelectorAll(".modalComment");
const modalSubmit = document.querySelectorAll(".close-modal-submit");

for (let i = 0; i < btnOpenModalComment.length; i++) {
    btnOpenModalComment[i].addEventListener('click', () => {
        fadeComment[i].classList.toggle('hide');
        modalComment[i].classList.toggle('hide');
    });
}

for (let i = 0; i < btnCloseModalComment.length; i++) {
    btnCloseModalComment[i].addEventListener('click', () => {
        fadeComment[i].classList.toggle('hide');
        modalComment[i].classList.toggle('hide');

    });
}

for (let i = 0; i < modalSubmit.length; i++) {
    modalSubmit[i].addEventListener('click', () => {
        fadeComment[i].classList.toggle('hide');
        modalComment[i].classList.toggle('hide');

    });
}