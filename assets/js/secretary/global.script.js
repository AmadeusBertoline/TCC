const optionLinks = document.querySelectorAll('.option-links');
const optionWrapper = document.querySelectorAll('.links-wrapper');
const optionBackground = document.querySelectorAll('.option-background');
const iconArrow = document.querySelectorAll('.icon-arrow');
const familyWrapper = document.querySelector('#family-option');
const missingWrapper = document.querySelector('#missing-option');

for (let i = 0; i < optionLinks.length; i++) {
  optionLinks[i].addEventListener('click', () => {
      closeSubList();
      optionWrapper[i].classList.toggle('show');
      optionBackground[i].classList.toggle('paint');
      iconArrow[i].classList.toggle('rotate');
  });
}

function closeSubList() {
  familyWrapper.classList.remove('show');
  missingWrapper.classList.remove('show');
}

