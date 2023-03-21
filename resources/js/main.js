
let navBar = document.querySelector('#navBar');
let shadow = document.querySelector('.shadow');

window.addEventListener('scroll',() => {

    let scrolled = window.scrollY;
   if(scrolled > 0){

   navBar.classList.add('shadow');

   }else{
    navBar.classList.remove('shadow');
   }
});

// Movimento Navbar

let socket = document.querySelector('.socket');
let pageContent = document.querySelector('#pageContent');
setTimeout(() => {
    socket.classList.add('d-none');
    pageContent.classList.remove('d-none');
}, 1500);


// Prova animazione utenti

let foto1 = document.querySelector('#fotobeppe');
let dati1 = document.querySelector('#datibeppe');
let observeImage = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting) {
            foto1.classList.add('Right')
            dati1.classList.add('Right')
        } else {
            foto1.classList.remove('Right')
            dati1.classList.remove('Right')
        }
    })
}) 
observeImage.observe(foto1);
observeImage.observe(dati1);


let foto2 = document.querySelector('#fotoGrop');
let dati2 = document.querySelector('#datiGrop');
let newPhoto = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting) {
            foto2.classList.add('Left')
            dati2.classList.add('Left')
        } else {
            foto2.classList.remove('Left')
            dati2.classList.remove('Left')
        }
    })
}) 
newPhoto.observe(foto2);
newPhoto.observe(dati2);


let foto3 = document.querySelector('#fotoDemo');
let dati3 = document.querySelector('#datiDemo');
let newPhoto1 = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting) {
            foto3.classList.add('Right')
            dati3.classList.add('Right')
        } else {
            foto3.classList.remove('Right')
            dati3.classList.remove('Right')
        }
    })
}) 
newPhoto1.observe(foto3);
newPhoto1.observe(dati3);


let foto4 = document.querySelector('#fotoRuga');
let dati4 = document.querySelector('#datiRuga');
let newPhoto2 = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting) {
            foto4.classList.add('Left')
            dati4.classList.add('Left')
        } else {
            foto4.classList.remove('Left')
            dati4.classList.remove('Left')
        }
    })
}) 
newPhoto2.observe(foto3);
newPhoto2.observe(dati3);


let foto5 = document.querySelector('#fotoVe');
let dati5 = document.querySelector('#datiVe');
let newPhoto3 = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting) {
            foto5.classList.add('Right')
            dati5.classList.add('Right')
        } else {
            foto5.classList.remove('Right')
            dati5.classList.remove('Right')
        }
    })
}) 
newPhoto3.observe(foto5);
newPhoto3.observe(dati5);


let foto6 = document.querySelector('#fotoMa');
let dati6 = document.querySelector('#datiMa');
let newPhoto4 = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting) {
            foto6.classList.add('Left')
            dati6.classList.add('Left')
        } else {
            foto6.classList.remove('Left')
            dati6.classList.remove('Left')
        }
    })
}) 
newPhoto4.observe(foto6);
newPhoto4.observe(dati6);



