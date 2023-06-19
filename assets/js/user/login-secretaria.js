const passwordInput = document.getElementById("password")
const eyeSvg = document.getElementById("eyeSvg")

function eyeClick (){
    let inputTypeIsPassword = passwordInput.type =="password"

    if(inputTypeIsPassword){
        showPassword()
    }else{
        hidePassword()
    }
}

function showPassword(){
    passwordInput.setAttribute("type", "text")
    eyeSvg.setAttribute("src", "../../assets/img/user/olho-fechado.png")
}

function hidePassword(){
    passwordInput.setAttribute("type", "password")
    eyeSvg.setAttribute("src", "../../assets/img/user/olho.png")

}

/*Ocultar senha no modal de edição */
// const passwordInputEdit = document.getElementById("password-edit")
// const passwordInputEditConfirm = document.getElementById("password-edit-confirm")
// const eyeSvgEdit = document.getElementById("eyeSvgEdit")

// function eyeClick(){
//     let inputTypeIsPasswordConfirm = passwordInputEditConfirm.type =="password"

   
//     if(inputTypeIsPasswordConfirm){
//         showPassword()
//     }else{
//         hidePassword()
//     }
// }

// function showPassword(){
//     passwordInputEdit.setAttribute("type", "text")
//     passwordInputEditConfirm.setAttribute("type", "text")
//     eyeSvgEdit.setAttribute("src", "../../assets/img/user/olho-fechado.png")
// }

// function hidePassword(){
//     passwordInputEdit.setAttribute("type", "password")
//     passwordInputEditConfirm.setAttribute("type", "password")
//     eyeSvgEdit.setAttribute("src", "../../assets/img/user/olho.png")

// }
/*Fim ocultar senha no  edição */

