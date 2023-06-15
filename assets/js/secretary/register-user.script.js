

function filterTable() {
  var input = document.querySelector("#query");
  var filter = input.value.toUpperCase();
  var table = document.querySelector(".table-list");
  var rows = table.getElementsByTagName("tr");

  for (var i = 0; i < rows.length; i++) {
    var columns = rows[i].getElementsByTagName("td");
    var display = false;

    for (var j = 0; j < columns.length; j++) {
      var cell = columns[j];
      if (cell) {
        var text = cell.textContent || cell.innerText;
        if (text.toUpperCase().indexOf(filter) > -1) {
          display = true;
          break;
        }
      }
    }

    rows[i].style.display = display ? "" : "none";
  }
}

function generatePassword() {
  var length = document.getElementById("txtLenPassword").value;
  var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  var password = "";
  for (var i = 0; i < length; i++) {
    password += characters.charAt(Math.floor(Math.random() * characters.length));
  }
  document.getElementById("txtRandomPassword").value = password;
}

function copyToClipboard() {
  var passwordInput = document.getElementById("txtRandomPassword");
  passwordInput.select();
  document.execCommand("copy");
  alert("Senha copiada para a área de transferência!");
}



const btnAlteration = document.querySelectorAll('#alteration');
const modalAlteration = document.querySelectorAll('#modal-alteration');
const cancelAlteration = document.querySelectorAll('#cancel-alteration');


for (let i = 0; i < btnAlteration.length; i++) {
    btnAlteration[i].addEventListener('click', function () {
      modalAlteration[i].showModal();
    });

    cancelAlteration[i].addEventListener('click', function(){
      modalAlteration[i].close();
    });
}

// SUBSTUITION PAGE

const add = document.querySelector('#add');
const formRegister = document.querySelector('.register-wrapper');
const listing = document.querySelector('.listing-wrapper');

add.addEventListener('click', (e) => {
  formRegister.style.display = 'flex';
  listing.style.display = 'none';
});

const back = document.querySelector('#back');
back.addEventListener('click', (e) => {
  formRegister.style.display = 'none';
  listing.style.display = 'flex';
});

const forms = document.querySelectorAll('.form');
const ceps = document.querySelectorAll('#txtCeps');
const streets = document.querySelectorAll('#txtStreets');
const citys = document.querySelectorAll('#txtCitys');
const neighborhoods = document.querySelectorAll('#txtNeighborhoods');;
const states = document.querySelectorAll('#txtStates');
const numberStreets = document.querySelectorAll('#txtNumberStreets');
const nameIns = document.querySelectorAll('#txtNames');
const complements = document.querySelectorAll('#txtComplements')
const cpfs = document.querySelectorAll("#txtCpfs");
const phones = document.querySelectorAll("#txtPhones");

// MASK
for(var i = 0; i < ceps.length; i++){

  ceps[i].addEventListener('keyup', (e)=>{

      const inputValue = e.target.value;

      if(inputValue.length === 9){
          getAddress(inputValue);
      }
  });


  async function getAddress(cep){

      const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

      const response = await fetch(apiUrl);

      const data = await response.json();

      if(data.erro === true){
          forms[i].reset();
      }
      console.log(data);

      streets[i].value = data.logradouro;
      citys[i].value = data.localidade;
      neighborhoods[i].value = data.bairro;
      states[i].value = data.uf;
  }


    nameIns[i].addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  citys[i].addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  neighborhoods[i].addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  complements[i].addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ 0-9º()-]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  new FormMask(ceps[i], "     -   ", " ", ["-"]);

  new FormMask(cpfs[i], "   .   .   -  ", " ", [".", "-"]);

  new FormMask(phones[i], "(__)  _____-____", "_", ["-", " ", "(", ")"]);
}


const form = document.querySelector('.form');
const cep = document.querySelector('#txtCep');
const street = document.querySelector('#txtStreet');
const city = document.querySelector('#txtCity');
const neighborhood = document.querySelector('#txtNeighborhood');;
const state = document.querySelector('#txtState');
const numberStreet = document.querySelector('#txtNumberStreet');
const nameIn = document.querySelector('#txtName');
const complement = document.querySelector('#txtComplement')
const cpf = document.querySelector("#txtCpf");
const phone = document.querySelector("#txtPhone");


  cep.addEventListener('keyup', (e)=>{

      const inputValue = e.target.value;

      if(inputValue.length === 9){
          getAddress(inputValue);
      }
  });


  async function getAddress(cep){

      const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

      const response = await fetch(apiUrl);

      const data = await response.json();

      if(data.erro === true){
          form.reset();
      }
      console.log(data);

      street.value = data.logradouro;
      city.value = data.localidade;
      neighborhood.value = data.bairro;
      state.value = data.uf;
  }


    nameIn.addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  city.addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  neighborhood.addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  complement.addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ 0-9º()-]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  new FormMask(cep, "     -   ", " ", ["-"]);

  new FormMask(cpf, "   .   .   -  ", " ", [".", "-"]);

  new FormMask(phone, "(__)  _____-____", "_", ["-", " ", "(", ")"]);


//MODALS
const logout = document.querySelector('#logout');
const modalLogout = document.querySelector('.modal-logout');
const cancelLogout = document.querySelector('.cancel-logout');

logout.addEventListener('click', function(){
    modalLogout.showModal();
});

cancelLogout.addEventListener('click', function(){
    modalLogout.close();
});



const btnDelete = document.querySelector('#delete');
const modalDelete = document.querySelector('.modal-delete');
const cancelDelete = document.querySelector('.cancel-delete');

btnDelete.addEventListener('click', function(){
  var idUser = btnDelete.getAttribute("data-id");
  document.getElementById("idUser").value = idUser;
    modalDelete.showModal();
});

cancelDelete.addEventListener('click', function(){
    modalDelete.close();
});


