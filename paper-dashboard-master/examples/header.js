function openmodal1(mn){

    let modal1 = document.getElementById(mn);

    if (typeof modal1 == 'undefined' || modal1 === null)
    return;

    modal1.style.display = 'block';
    document.body.style.overflow = 'hidden';
}


function closemodal1(mn){
    let modal1 = document.getElementById(mn);

    if (typeof modal1 == 'undefined' || modal1 === null)
    return;

    modal1.style.display = 'none'; 
    document.body.style.overflow = 'auto';
    
}
function openmodal2(mn){

    let modal2 = document.getElementById(mn);

    if (typeof modal2 == 'undefined' || modal2 === null)
    return;

    modal2.style.display = 'block';
    document.body.style.overflow = 'hidden';
}
function conferesenha() {
    const senha = document.querySelector('input[name=senha]');
    const confirme_senha = document.querySelector('input[name=confirme_senha]');

    if (confirme_senha.value === senha.value ) {
        confirme_senha.setCustomValidity('');
    }else{
        confirme_senha.setCustomValidity('as senha nao conferem');
    }
    
}