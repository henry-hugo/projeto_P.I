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
