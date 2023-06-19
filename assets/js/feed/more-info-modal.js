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

/*Abrir e fechar modal de todos os comentários */
const btnOpenModalCommentView = document.querySelectorAll(".open-modal-comment-view");
const btnCloseModalCommentView = document.querySelectorAll("#close-modal-comment-view");
const fadeCommentView = document.querySelectorAll(".fadeCommentView");
const modalCommentView = document.querySelectorAll(".modalCommentView");
const modalSubmitView = document.querySelectorAll(".close-modal-submit-view");

for (let i = 0; i < btnOpenModalCommentView.length; i++) {
    btnOpenModalCommentView[i].addEventListener('click', () => {
        fadeCommentView[i].classList.toggle('hide');
        modalCommentView[i].classList.toggle('hide');
    });
}

for (let i = 0; i < btnCloseModalCommentView.length; i++) {
    btnCloseModalCommentView[i].addEventListener('click', () => {
        fadeCommentView[i].classList.toggle('hide');
        modalCommentView[i].classList.toggle('hide');

    });
}



/*Abrir e fechar modal de editar comentário */

const btnOpenModalCommentViewEdit = document.querySelectorAll(".open-modal-comment-view-edit");
const btnOpenModalCommentViewEdit2 = document.querySelectorAll(".open-modal-comment-view-edit");
const btnCloseModalCommentViewEdit = document.querySelectorAll("#close-modal-comment-view-edit");
const fadeCommentViewEdit = document.querySelectorAll(".fadeCommentViewEdit");
const modalCommentViewEdit = document.querySelectorAll(".modalCommentViewEdit");
const allPistas = document.querySelectorAll(".minhas-pistas");


for (let i = 0; i < btnOpenModalCommentView.length; i++) {
    btnOpenModalCommentViewEdit[i].addEventListener('click', () => {
        fadeCommentViewEdit[i].classList.toggle('hide');
        modalCommentViewEdit[i].classList.toggle('hide');
    });
}

for (let i = 0; i < btnCloseModalCommentViewEdit.length; i++) {
    btnCloseModalCommentViewEdit[i].addEventListener('click', () => {
        fadeCommentViewEdit[i].classList.toggle('hide');
        modalCommentViewEdit[i].classList.toggle('hide');

    });
}

for (let i = 0; i < btnOpenModalCommentViewEdit2.length; i++) {
    btnOpenModalCommentViewEdit2[i].addEventListener('click', () => {
        fadeCommentView[i].classList.toggle('hide');
        modalCommentView[i].classList.toggle('hide');

    });
}

for (let i = 0; i < allPistas.length; i++) {
    allPistas[i].addEventListener('click', () => {
        fadeCommentView[i].classList.toggle('hide');
        modalCommentView[i].classList.toggle('hide');

    });
}

for (let i = 0; i < allPistas.length; i++) {
    allPistas[i].addEventListener('click', () => {
        fadeCommentViewEdit[i].classList.toggle('hide');
        modalCommentViewEdit[i].classList.toggle('hide');

    });
}


/*Abrir modal para editar pista */
const openModalEdit = document.querySelectorAll(".open-modal-comment-edit");
const fadeCommentEdit = document.querySelectorAll(".fadeCommentEdit");
const modalCommentEdit = document.querySelectorAll(".modalCommentEdit");
const btnCloseModalEdit = document.querySelectorAll(".close-modal-comment-edit");
const btnCloseModalSubmitEdit = document.querySelector(".close-modal-submit-edit");

for (let i = 0; i < openModalEdit.length; i++) {
    openModalEdit[i].addEventListener('click', () => {
        fadeCommentEdit[i].classList.toggle('hide');
        modalCommentEdit[i].classList.toggle('hide');

    });
}

for (let i = 0; i < btnCloseModalEdit.length; i++) {
    btnCloseModalEdit[i].addEventListener('click', () => {
        fadeCommentEdit[i].classList.toggle('hide');
        modalCommentEdit[i].classList.toggle('hide');

    });
}

for (let i = 0; i < btnCloseModalSubmitEdit.length; i++) {
    btnCloseModalSubmitEdit[i].addEventListener('click', () => {
        fadeCommentEdit[i].classList.toggle('hide');
        modalCommentEdit[i].classList.toggle('hide');

    });
}

/*Fim do modal para editar pista */

/*Modal de deletar pistas */
const openModalDelete = document.querySelectorAll(".open-modal-comment-delete");
const fadeCommentDelete = document.querySelectorAll(".fadeCommentDelete");
const modalCommentDelete = document.querySelectorAll(".modalCommentDelete");
const btnCloseModalDelete = document.querySelectorAll(".close-modal-comment-delete");
const btnCloseModalSubmitDelete = document.querySelector(".close-modal-submit-delete");
const btnCancelarDelete =  document.querySelectorAll(".close-pista-delete");

for (let i = 0; i < openModalDelete.length; i++) {
    openModalDelete[i].addEventListener('click', () => {
        fadeCommentDelete[i].classList.toggle('hide');
        modalCommentDelete[i].classList.toggle('hide');

    });
}
for (let i = 0; i < btnCloseModalDelete.length; i++) {
    btnCloseModalDelete[i].addEventListener('click', () => {
        fadeCommentDelete[i].classList.toggle('hide');
        modalCommentDelete[i].classList.toggle('hide');

    });
}
for (let i = 0; i < btnCancelarDelete.length; i++) {
    btnCancelarDelete[i].addEventListener('click', () => {
        fadeCommentDelete[i].classList.toggle('hide');
        modalCommentDelete[i].classList.toggle('hide');

    });
}
for (let i = 0; i < btnCloseModalSubmitDelete.length; i++) {
    btnCloseModalSubmitDelete[i].addEventListener('click', () => {
        fadeCommentDelete[i].classList.toggle('hide');
        modalCommentDelete[i].classList.toggle('hide');

    });
}
/*Fim do modal de deletar pistas */


/*Modal alert delete */
const fadeCommentDeleteAlert = document.querySelectorAll(".fadeCommentDeleteAlert");
const modalCommentDeleteAlert = document.querySelectorAll(".modalCommentDeleteAlert");
const btnCloseModalDeleteAlert = document.querySelectorAll(".close-modal-comment-delete-alert");
const btnCloseModalDeleteAlert2 = document.querySelectorAll(".close-pista-delete-alert");


for (let i = 0; i < btnCloseModalDeleteAlert.length; i++) {
    btnCloseModalDeleteAlert[i].addEventListener('click', () => {
        fadeCommentDeleteAlert[i].classList.toggle('hide');
        modalCommentDeleteAlert[i].classList.toggle('hide');

    });
}
for (let i = 0; i < btnCloseModalDeleteAlert2.length; i++) {
    btnCloseModalDeleteAlert2[i].addEventListener('click', () => {
        fadeCommentDeleteAlert[i].classList.toggle('hide');
        modalCommentDeleteAlert[i].classList.toggle('hide');

    });
}
/*Fim modal alert delete */





