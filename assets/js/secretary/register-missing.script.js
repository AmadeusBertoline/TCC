
function changePhoto() {
    var reader = new FileReader();
    var image = document.querySelector('#input-photo').files[0];

    reader.onloadend = function () {
      var photo = document.createElement('img');
      photo.style.maxWidth = '300px'; // Defina o tamanho máximo da imagem
      photo.src = reader.result;

      var  photoPreview = document.querySelector('.photo-preview');
      photoPreview.innerHTML = '';
      photoPreview.appendChild(photo);
    }

    if (image) {
      reader.readAsDataURL(image);
    }
  }

  
var addFeature = document.getElementById("addFeature");
addFeature.addEventListener("click", () => {
    var inputFeatures = document.getElementById("inputs-feature");
    var newFeature = document.createElement("div");
    newFeature.classList.add("row");
    newFeature.classList.add("input-row");

    newFeature.innerHTML =
    '<div class="row">'+
      '<div class="col">' +
        '<label for="txt-typeFeature">Tipo de Característica:</label>'+
        '<input type="text" name="txt-typeFeature" id="txt-typeFeature" class="input"maxlength="40"required />'+
      '</div>'+
      '<div class="col">'+
        '<label for="txt-feature">Característica:</label>'+
        '<input type="text" name="txt-feature" id="txt-feature" class="input"maxlength="80"required/>'+
      '</div>'
    '</div>';

    inputFeatures.appendChild(newFeature);
});

var removeClothe = document.getElementById("removeFeature");
removeClothe.addEventListener("click", () => {
  var lastFeature = document.getElementById("inputs-feature").lastElementChild;
    if (lastFeature) {
      document.getElementById("inputs-feature").removeChild(lastFeature);
    }
});


var addClothe = document.getElementById("addClothe");
addClothe.addEventListener("click", () => {
    var inputClothe = document.getElementById("inputs-clothe");
    var newClothe = document.createElement("div");
    newClothe.classList.add("row");
    newClothe.classList.add("input-row");

    newClothe.innerHTML =
    '<div class="row">'+
      '<div class="col">' +
        '<label for="txt-typeClothe">Tipo de Vestimentas:</label>'+
        '<input type="text" name="txt-typeClothe" id="txt-typeClothe" class="input"maxlength="40"required />'+
      '</div>'+
      '<div class="col">'+
        '<label for="txt-clothe">Vestimenta:</label>'+
        '<input type="text" name="txt-clothe" id="txt-clothe" class="input"maxlength="80"required/>'+
      '</div>'
    '</div>';

    inputClothe.appendChild(newClothe);
});

var removeClothe = document.getElementById("removeClothe");
removeClothe.addEventListener("click", () => {
  var lastClothe = document.getElementById("inputs-clothe").lastElementChild;
    if (lastClothe) {
      document.getElementById("inputs-clothe").removeChild(lastClothe);
    }
});



var addReason = document.getElementById("addReason");
addReason.addEventListener("click", () => {
    var inputReason = document.getElementById("inputs-reason");
    var newReason = document.createElement("div");
    newReason.classList.add("row");
    newReason.classList.add("input-row");

    newReason.innerHTML =
    '<div class="row">'+
      '<div class="col">' +
        '<label for="txt-typeReason">Assunto:</label>'+
        '<input type="text" name="txt-typeReason" id="txt-typeReason" class="input"maxlength="40"required />'+
      '</div>'+
      '<div class="col">'+
        '<label for="txt-reason">Descrição:</label>'+
        '<input type="text" name="txt-reason" id="txt-reason" class="input"maxlength="80"required/>'+
      '</div>'
    '</div>';

    inputReason.appendChild(newReason);
});

var removeReason = document.getElementById("removeReason");
removeReason.addEventListener("click", () => {
  var lastReason = document.getElementById("inputs-reason").lastElementChild;
    if (lastReason) {
      document.getElementById("inputs-reason").removeChild(lastReason);
    }
});


