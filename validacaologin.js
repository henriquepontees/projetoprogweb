let input_email = document.querySelector("#email");
let input_senha = document.querySelector("#senha");
let formlogin = document.querySelector("#formlogin");

formlogin.addEventListener("submit", (event)=>{
    if(validar_valor_vazio(input_email, "Informe um Email!", event)){
        return;
    }else if(validar_valor_vazio(input_senha, "Informe uma senha!", event )){
        return;
    }
});

function validar_valor_vazio(element, message, event){
    if(element.value.trim() == ""){
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message,
          })
          event.preventDefault();
          return true;
    }
    return false;
}
