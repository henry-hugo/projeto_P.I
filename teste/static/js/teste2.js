
const itens = document.getElementById('msg');

console.log(itens.innerText);
setTimeout(function(){
    itens.remove();
}, 5000);
