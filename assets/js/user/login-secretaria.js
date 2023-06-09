const passwordInput = document.getElementById("password")
const eyeSvg = document.getElementById("eyeSvg")

function eyeClick(){
    let inputTypeIsPassword = passwordInput.type =="password"

    if(inputTypeIsPassword){
        showPassword()
    }else{
        hidePassword()
    }
}

function showPassword(){
    passwordInput.setAttribute("type", "text")
    // eyeSvg.setAttribute("src", "../img/olho-fechado.png")
}

function hidePassword(){
    passwordInput.setAttribute("type", "password")
    // eyeSvg.setAttribute("src", "../img/olho.png")

}

