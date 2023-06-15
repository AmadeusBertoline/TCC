

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


const formRegisterOfficer = document.querySelector('#register-officer');
const formAlteration = document.querySelector('#alteration-officer');
const cep = document.querySelectorAll('#txtCep');
const street = document.querySelectorAll('#txtStreet');
const city = document.querySelectorAll('#txtCity');
const neighborhood = document.querySelectorAll('#txtNeighborhood');;
const state = document.querySelectorAll('#txtState');
const numberStreet = document.querySelectorAll('#txtNumberStreet');
const nameIn = document.querySelectorAll('#txtName');
const complement = document.querySelectorAll('#txtComplement')
const cpf = document.querySelectorAll("#txtCpf");
const phone = document.querySelectorAll("#txtPhone");

// MASK
for(var i = 0; i < cep.length; i++){
  cep[i].addEventListener("input", (e)=> {
    const value = e.target.value.replace(/\D/g, ""); // remove caracteres não numéricos
    let valueFormat = "";

    if (value.length > 5) {
      valueFormat += value.substr(0, 5) + "-";
      valueFormat += value.substr(5);
    } else {
      valueFormat = value;
    }

    e.target.value = valueFormat;
  });


  cep[i].addEventListener('keyup', (e)=>{

      const inputValue = e.target.value;

      if(inputValue.length === 9){
          getAddress(inputValue);
      }
  });


  async function getAddress(cep){

      const apiUrl = `https://viacep.com.br/ws/${cep[i]}/json/`;

      const response = await fetch(apiUrl);

      const data = await response.json();

      console.log(data);
      if(data.erro === true){

          formRegisterOfficer.reset();
          formAlteration.reset();

      }
      street[i].value = data.logradouro;
      city[i].value = data.localidade;
      neighborhood[i].value = data.bairro;
      state[i].value = data.uf;
  }


    nameIn[i].addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  city[i].addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  neighborhood[i].addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ ]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  complement[i].addEventListener('keypress', (e) => {
      const key = e.key;
      const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ 0-9º()-]/;
      const permit = regex.test(key);

      if (!permit) {
          e.preventDefault();
      }
  });


  new FormMask(cep[i], "     -   ", " ", ["-"]);

  new FormMask(cpf[i], "   .   .   -  ", " ", [".", "-"]);

  new FormMask(phone[i], "(+  )       -    ", " ", ["-", "(", ")", "+"]);
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



const btnAlteration = document.querySelectorAll('#alteration');
const modalAlteration = document.querySelector('.modal-alteration');
const cancelAlteration = document.querySelector('#cancel-alteration');
const idUserAlteration = document.querySelectorAll('#idUserAlteration');

for (var i = 0; i < btnAlteration.length; i++) {
  (function (index) {
    btnAlteration[index].addEventListener('click', function () {
      // var idUser = btnAlteration[index].getAttribute("data-id");
      // idUserAlteration.value = idUser;
        var hiddenValue = $(idUserAlteration[index]).val();
    
        $.ajax({
          type: 'POST',
          data: { id: hiddenValue},
          success: function(response) {
            $('#txtName').html(response);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });

      modalAlteration.showModal();

    });
  })(i);
}

cancelAlteration.addEventListener('click', function(){
    modalAlteration.close();
});
