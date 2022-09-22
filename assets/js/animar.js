let animado = document.querySelectorAll(".animado");

function mostrarScroll(){
    let scrollTop = document.documentElement.scrollTop;
    for(var i =0; i < animado.length; i++ ){
        let alturaAnimado = animado[i].offsetTop;
        if(alturaAnimado - 300 < scrollTop){
            animado[i].style.opacity = 1;
        }
    }
}
// window.addEventListener('scroll', mostrarScroll);
mostrarScroll();

let animadoArribaAbajo = document.querySelectorAll(".animadoArribaAbajo");

function mostrarScrollArribaAbajo(){
    let scrollTop = document.documentElement.scrollTop;
    for(var i =0; i < animadoArribaAbajo.length; i++ ){
        let alturaAnimado = animadoArribaAbajo[i].offsetTop;
        if(alturaAnimado - 300 < scrollTop){
            animadoArribaAbajo[i].style.opacity = 1;
            animadoArribaAbajo[i].classList.add("mostrarArribaAbajo")
        }
    }
}
// window.addEventListener('scroll', mostrarScrollArribaAbajo);
mostrarScrollArribaAbajo();

let animadoArriba = document.querySelectorAll(".animadoArriba");

function mostrarScrollArriba(){
    let scrollTop = document.documentElement.scrollTop;
    for(var i =0; i < animadoArriba.length; i++ ){
        let alturaAnimado = animadoArriba[i].offsetTop;
        if(alturaAnimado - 580 < scrollTop){
            animadoArriba[i].style.opacity = 1;
            animadoArriba[i].classList.add("mostrarArriba")
        }
    }
}
window.addEventListener('scroll', mostrarScrollArriba);

let animadoDerecha = document.querySelectorAll(".animadoDerecha");

function mostrarScrollDerecha(){
    let scrollTop = document.documentElement.scrollTop;
    for(var i =0; i < animadoDerecha.length; i++ ){
        let alturaAnimado = animadoDerecha[i].offsetTop;
        if(alturaAnimado - 580 < scrollTop){
            animadoDerecha[i].style.opacity = 1;
            animadoDerecha[i].classList.add("mostrarDerecha")
        }
    }
}
window.addEventListener('scroll', mostrarScrollDerecha);



let animadoDerechaD = document.querySelectorAll(".animadoDerechaD");

function mostrarScrollDerechaD(){
    let scrollTop = document.documentElement.scrollTop;
    for(var i =0; i < animadoDerechaD.length; i++ ){
        let alturaAnimado = animadoDerechaD[i].offsetTop;
        if(window.innerHeight < 1300){
            if(alturaAnimado - 580 < scrollTop){
                animadoDerechaD[i].style.opacity = 1;
                animadoDerechaD[i].classList.add("mostrarDerechaD")
            }
        }else{
            animadoDerechaD[i].style.opacity = 1;
        }
    }
}
window.addEventListener('scroll', mostrarScrollDerechaD);


let animadoAbajo = document.querySelectorAll(".animadoAbajo");

function mostrarScrollAbajo(){
    let scrollTop = document.documentElement.scrollTop;
    for(var i =0; i < animadoAbajo.length; i++ ){
        let alturaAnimado = animadoAbajo[i].offsetTop;
        if(window.innerHeight < 1300){
            if(alturaAnimado - 640 < scrollTop){
                animadoAbajo[i].style.opacity = 1;
                animadoAbajo[i].classList.add("mostrarAbajo")
            }
        }else{
            animadoAbajo[i].style.opacity = 1;
        }
    }
}
window.addEventListener('scroll', mostrarScrollAbajo);
