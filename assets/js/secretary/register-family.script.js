function generatePassword() {
    var length = document.getElementById("txt-lenPassword").value;
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var password = "";
    for (var i = 0; i < length; i++) {
      password += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    document.getElementById("txt-randomPassword").value = password;
  }
  
  function copyToClipboard() {
    var passwordInput = document.getElementById("txt-randomPassword");
    passwordInput.select();
    document.execCommand("copy");
    alert("Senha copiada para a área de transferência!");
  }
