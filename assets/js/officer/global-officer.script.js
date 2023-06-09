const headers = document.querySelectorAll('.accordion-header');

for (let i = 0; i < headers.length; i++) {
  headers[i].addEventListener('click', function() {
    const content = this.nextElementSibling;
    const icon = this.querySelector('.arrow');
    if (content.style.display === 'block') {
      content.style.display = 'none';
      headers[i].classList.toggle('enable');
      icon.classList.remove('fa-caret-down');
      icon.classList.add('fa-caret-right');
    } else {
      content.style.display = 'block';
      headers[i].classList.toggle('enable');
      icon.classList.remove('fa-caret-right');
      icon.classList.add('fa-caret-down');
    }
  });
}


var logOutBtn = document.getElementById("log-out-btn");
var modalContainer = document.getElementById("modal-container");
var confirmBtn = document.getElementById("confirm-btn");
var cancelBtn = document.getElementById("cancel-btn");

logOutBtn.onclick = function() {
  modalContainer.style.display = "block";
}

cancelBtn.onclick = function() {
  modalContainer.style.display = "none";
}
