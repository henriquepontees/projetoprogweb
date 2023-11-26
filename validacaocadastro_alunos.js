let input_nome = document.querySelector("#nome");
let input_matricula = document.querySelector("#matricula");
let input_nota1 = document.querySelector("#nota1");
let input_nota2 = document.querySelector("#nota2");
let formlogin = document.querySelector("#formcadastroaluno");


formlogin.addEventListener("submit", (event)=>{
    if(validar_valor_vazio(input_nome, "Informe um nome!", event)){
        return;
    }else if(validar_valor_vazio(input_matricula, "Informe uma matricula!", event )){
        return;
    }else if(validar_valor_vazio(input_nota1, "Informe uma nota!", event )){
        return;
    }else if(validar_valor_vazio(input_nota2, "Informe uma nota!", event )){
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
