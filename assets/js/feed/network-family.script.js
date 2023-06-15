document.addEventListener('DOMContentLoaded', function() {

/*Script, Burguer bar*/
var barsButton = document.querySelector('.burguerBar');
var navbar = document.querySelector('.nav');

/*Função burguerBar, No cliclk do btn ativa as classes. */
barsButton.addEventListener('click', ()=>{
  navbar.classList.toggle('active');
  barsButton.classList.toggle('active');
})

/*Modal, trocar foto*/
var btnUpdateImg = document.getElementById("btn-update-img");
var modalUpdateImg = document.getElementById("modal-update-img");
var cancelBtnUpdateImg = document.getElementById("cancel-btn-update-img");

btnUpdateImg.onclick = function() {
    modalUpdateImg.style.display = "block";
}

cancelBtnUpdateImg.onclick = function() {
    modalUpdateImg.style.display = "none";
}

var btnEditMissed = document.getElementById("btn-edit-missed");
var modalEditMissed = document.getElementById("modal-edit-missed");
var cancelBtnEditMissed = document.getElementById("cancel-btn-edit-missed");

btnEditMissed.onclick = function() {
    modalEditMissed.style.display = "block";
}

cancelBtnEditMissed.onclick = function() {
    modalEditMissed.style.display = "none";
}


// seleciona o botão "Adicionar Característica"
var btnAddCaracteristica = document.getElementById("btnAddCaracteristica");
// adiciona um evento "click" ao botão
btnAddCaracteristica.addEventListener("click", function() {
    // seleciona o elemento "camposCaracteristica"
    var camposCaracteristica = document.getElementById("camposCaracteristica");

    // cria um novo elemento "div" com a classe "row"
    var novaCaracteristica = document.createElement("div");
    novaCaracteristica.classList.add("row");
    novaCaracteristica.innerHTML = `
      <div class="row middle-line">
        <div class="col">
          <select id="caracteristica" name="caracteristica[]" class="form-control" style="width:130px; height:30px !important; border: 1px solid #12122038; border-radius: 5px;">
            <option selected>Características...</option>
            ${listFeature.map(feature => `
              <option value="${feature.idFeature}">
                ${feature.typeFeature}
              </option>
            `).join('')}
          </select>
          <script>
            $(document).ready(function() {
              $('#caracteristica').select2();
            });
          </script>
        </div>
        <div class="col">
          <input type="text" name="descricao[]" placeholder="Descrição" style="height:30px !important; border-radius: 5px; border: 1px solid #12122038;">
        </div>  
      </div>
    `;
    
    // adiciona o novo elemento ao final do elemento "camposCaracteristica"
    camposCaracteristica.appendChild(novaCaracteristica);
// ativa o plugin Select2 para o novo elemento "select"
$('#caracteristica', novaCaracteristica).select2();
});
// seleciona o botão "Remover Característica"
var btnRemoverCaracteristica = document.getElementById("btnRemoverCaracteristica");
// adiciona um evento "click" ao botão
btnRemoverCaracteristica.addEventListener("click", function() {
    // seleciona o último elemento filho do elemento "camposCaracteristica"
    var ultimaCaracteristica = document.getElementById("camposCaracteristica").lastElementChild;

    // verifica se há pelo menos uma característica adicionada antes de remover
    if (ultimaCaracteristica) {
        // remove o último elemento filho do elemento "camposCaracteristica"
        document.getElementById("camposCaracteristica").removeChild(ultimaCaracteristica);
    }
});


var btnAddMotivo = document.getElementById("btnAddMotivo");
btnAddMotivo.addEventListener("click", function() {
    var camposMotivo = document.getElementById("camposMotivo");
    var novaMotivo = document.createElement("div");
    novaMotivo.classList.add("row");
    novaMotivo.innerHTML = '<div class="row middle-line">'+
                                        '<div class="col">' +
                                            '<input type="text" name="tipoMotivo[]" placeholder="Assunto" style="height:30px !important; border-radius: 5px; border: 1px solid #12122038;">' +
                                        '</div>' +
                                        '<div class="col">' +
                                            '<input type="text" name="motivo[]" placeholder="Descrição" style="height:30px !important; border-radius: 5px; border: 1px solid #12122038;">' +
                                        '</div>'+
                                    '</div>';
    camposMotivo.appendChild(novaMotivo);
});
var btnRemoverMotivo = document.getElementById("btnRemoverMotivo");
btnRemoverMotivo.addEventListener("click", function() {
    var ultimaMotivo = document.getElementById("camposMotivo").lastElementChild;
    if (ultimaMotivo) {
        document.getElementById("camposMotivo").removeChild(ultimaMotivo);
    }
});

});

var loadFile = function (event) {
    var pm = document.getElementById('pictureMissed');
    pm.src = URL.createObjectURL(event.target.files[0]);
    pm.onload = function () {
        URL.revokeObjectURL(pm.src) // free memory
    }
};
