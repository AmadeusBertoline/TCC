const inputSearch = document.querySelector('#query');
const divSearch = document.querySelector('.query')

inputSearch.addEventListener('focus',()=>{
    divSearch.classList.toggle('outlined');
})

inputSearch.addEventListener('blur',()=>{
    divSearch.classList.toggle('outlined');
})

const form = document.querySelector('.form-update');
const cep = document.querySelector('#txtCep');
const street = document.querySelector('#txtStreet');
const city = document.querySelector('#txtCity');
const neighborhood = document.querySelector('#txtNeighborhood');;
const state = document.querySelector('#states');
const numberStreet = document.querySelector('#txtNumberStreet');

// const script = document.createElement('script');
// script.src = '../formMask.js';
// script.type = 'text/javascript';
// document.body.appendChild(script);


cep.addEventListener("input", (e)=> {
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

// get address
cep.addEventListener('keyup', (e)=>{

    const inputValue = e.target.value;

    // verifying if we have lenght equal 8 
    if(inputValue.length === 9){
        getAddress(inputValue);
    }
});
async function getAddress(cep){

    const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

    const response = await fetch(apiUrl); // getting res of api

    const data = await response.json(); // converting to JSON

    console.log(data);
    // checking error from api
    if(data.erro === true){

        //cleaning form
        formCadastrar.reset();

    }
    //adding values in our inputs
    street.value = data.logradouro;
    city.value = data.localidade;
    neighborhood.value = data.bairro;
    state.value = data.uf;
}


const nameIn = document.querySelector('#txtName');
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

const complement = document.querySelector('#txtComplement')

complement.addEventListener('keypress', (e) => {
    const key = e.key;
    const regex = /[a-zA-ZáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ 0-9º()-]/;
    const permit = regex.test(key);

    if (!permit) {
        e.preventDefault();
    }
});


const phone = document.querySelector("#txtPhone");
new FormMask(phone, "(  )     -    ", " ", ["-", "(", ")", "+"]);

// function openModalUpdate(button) {
//     var modal = document.getElementById("updateModal");
//     var companionId = button.getAttribute("data-id");
//     modal.classList.toggle('show');
//   }

//   function openModalDelete(button) {
//     var modal = document.getElementById("deleteModal");
//     var companionId = button.getAttribute("data-id");
//     document.getElementById("companionId").value = companionId; // Define o valor do ID do usuário no campo oculto do formulário
//     modal.style.display = "block";
//   }

//   function closeModalDelete() {
//     var modal = document.getElementById("deleteModal");
//     modal.style.display = "none";
//   }
  
//   function closeModalUpdate() {
//     var modal = document.getElementById("updateModal");
//     modal.style.display = "none";
//   }

const btnOpenModal = document.querySelectorAll('.update-button-open');
const btnCloseModal = document.querySelectorAll('.update-button-close');

const modalUpdate = document.querySelectorAll('.updateModal');
for(let i = 0; i < btnOpenModal.length; i++){
    btnOpenModal[i].addEventListener('click', ()=>{
       modalUpdate[i].classList.toggle('show');
    })
}

for(let i = 0; i < btnCloseModal.length; i++){
    btnCloseModal[i].addEventListener('click', ()=>{
       modalUpdate[i].classList.toggle('show');
    })
}

