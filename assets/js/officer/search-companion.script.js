const inputSearch = document.querySelector('#query');
const divSearch = document.querySelector('.query')

inputSearch.addEventListener('focus',()=>{
    divSearch.classList.toggle('outlined');
})

inputSearch.addEventListener('blur',()=>{
    divSearch.classList.toggle('outlined');
})
