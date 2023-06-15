const form = document.querySelector('.form-register');
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

const cpf = document.querySelector("#txtCpf");
new FormMask(cpf, "   .   .   -  ", " ", [".", "-"]);

const phone = document.querySelector("#txtPhone");
new FormMask(phone, "(  )     -    ", " ", ["-", "(", ")", "+"]);


const add = document.querySelector('#add');
const formRegister = document.querySelector('.register-wrapper');
const listing = document.querySelector('.listing-wrapper');

// add.addEventListener('click', (e) => {
//   formRegister.style.display = 'flex';
//   listing.style.display = 'none';
// });

// const back = document.querySelector('#back');
// back.addEventListener('click', (e) => {
//   formRegister.style.display = 'none';
//   listing.style.display = 'flex';
// });