   
    const senha = document.querySelector('input[name=senha]');
    const confirme_senha = document.querySelector('input[name=confirme_senha]');

    const email = document.querySelector('input[name=email]');
    const confirme_email = document.querySelector('input[name=confirme_email]');

function confere(campo, confirme, texto){
    if(confirme.value === campo.value){
        confirme.setCustomValidity('');
    }
    else{
        confirme.setCustomValidity(`${texto} nao conferem`);
    }
}
function campobranco() {
    const nome = document.querySelector('input[name]');

    if (nome.value === '') {
        nome.setCustomValidity('categoria em branco');
    }else{
        nome.setCustomValidity('');
    }
}

