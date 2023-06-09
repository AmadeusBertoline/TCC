
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