const fadeUpdateData = document.querySelectorAll(".fadeUpdateData");
const modalUpdateData = document.querySelectorAll(".modalUpdateData");
const btnCloseModalUpdateData = document.querySelectorAll(".close-modal-update-data");
const btnSubmitClose = document.querySelectorAll(".submit");
const btnOpenModalUpdateData = document.querySelectorAll(".open-modal-update-data");

for (let i = 0; i < btnOpenModalUpdateData.length; i++) {
    btnOpenModalUpdateData[i].addEventListener('click', () => {
        fadeUpdateData[i].classList.toggle('hide');
        modalUpdateData[i].classList.toggle('hide');

    });
}

for (let i = 0; i < btnCloseModalUpdateData.length; i++) {
    btnCloseModalUpdateData[i].addEventListener('click', () => {
        fadeUpdateData[i].classList.toggle('hide');
        modalUpdateData[i].classList.toggle('hide');

    });
}

// aaa