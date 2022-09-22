const btnMenu = document.querySelector("#btnMenu");
const menu = document.querySelector("#menu");

btnMenu.addEventListener("click", function(){
    menu.classList.toggle("mostrar")
});


//COMIENZO DEL SCRIPT PARA EL MENU
const primeraGeneracion = document.querySelectorAll(".menu > .menu-item-has-children > a");

for(let i=0; i < primeraGeneracion.length; i++){

    primeraGeneracion[i].addEventListener("click", function(){
        if(window.innerWidth < 1191){

            const primerSub = this.nextElementSibling;
            const heightPrimerSub = primerSub.scrollHeight;

            if(primerSub.classList.contains("desplegar")){
                primerSub.classList.remove("desplegar");
                // console.log("%c quitamos el style al primersub ","background: #222; color: #FF0000");
                primerSub.removeAttribute("style");
            }else{
                primerSub.classList.add("desplegar");
                // console.log("%c aumentamos el tamaño al elemento sub-menu primerSub: " + heightPrimerSub ,"background: #222; color: 	#008000")
                primerSub.style.height = heightPrimerSub + "px";
            }
        }
    });
}
//FIN DEL SCRIPT PARA EL MENU

//COMIENZO DEL SCRIPT PARA EL sub menu
for(let i=0; i < primeraGeneracion.length; i++){
    const segundaGeneracion = primeraGeneracion[i].nextElementSibling.querySelectorAll(".menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a");

        for(let j=0; j < segundaGeneracion.length; j++){
            segundaGeneracion[j].addEventListener("click", function(){
            if(window.innerWidth < 1191){
                const segundoSub = this.nextElementSibling;
                const heightSegundoSub = segundoSub.scrollHeight;

                    //llamar primersub
                const primerSub = primeraGeneracion[i].nextElementSibling;
                    //obtener el tamaño actual del nivel 1
                const heightPrimerSubActual = primerSub.scrollHeight;

                if(segundoSub.classList.contains("desplegarSegundoSub")){
                    //disminuir con el tamaño actual del nivel2
                    const desminuirPrimerSub = heightPrimerSubActual - heightSegundoSub;

                    segundoSub.classList.remove("desplegarSegundoSub");

                    // console.log("%c quitamos el style al segundsub ","background: #222; color: #FF0000");
                    segundoSub.removeAttribute("style");

                    //desminuimos el primersub
                    // console.log("%c desminuimos el tamaño primersub " + desminuirPrimerSub,"background: #222; color: #FF0000")
                    primerSub.style.height = desminuirPrimerSub + "px";
                }else{
                    const aumentarPrimerSub=heightPrimerSubActual+heightSegundoSub;
                    segundoSub.classList.add("desplegarSegundoSub");

                    // console.log("%c aumentamos el tamaño segundosub" + heightSegundoSub,"background: #222; color: 	#008000")
                    segundoSub.style.height = heightSegundoSub + "px";

                    //aumentamos el primersub
                    // console.log("%c aumentamos el tamaño primersub " + aumentarPrimerSub,"background: #222; color: 	#008000")
                    primerSub.style.height = aumentarPrimerSub + "px";
                }
            }
            });
        };
}
//FIN DEL SCRIPT PARA EL sub menu


//COMIENZO DEL SCRIPT PARA EL sub sub menu 
/* !! DESCOMENTAR ESTE BLOQUE DE CODIGO PARA QUE FUNCIONA EL SUB SUB NIVEL DEL MENU
for(let i=0; i < primeraGeneracion.length; i++){
    const segundaGeneracion = primeraGeneracion[i].nextElementSibling.querySelectorAll(".menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a");
    for(let j=0; j < segundaGeneracion.length; j++){
        const terceraGeneracion = segundaGeneracion[j].nextElementSibling.querySelectorAll(".menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a");

        for(let k=0; k < terceraGeneracion.length; k++){
            terceraGeneracion[k].addEventListener("click", function(){
                if(window.innerWidth < 1191){
                    const tercerSub = this.nextElementSibling;
                    const heightTercerSub = tercerSub.scrollHeight;

                        //llamar primersub
                    const primerSub = primeraGeneracion[i].nextElementSibling;
                        //obtener el tamaño actual del nivel 1
                    const heightPrimerSubActual = primerSub.scrollHeight;

                         //llamar segundosub
                    const segundoSub = segundaGeneracion[j].nextElementSibling;
                         //obtener el tamaño actual del nivel 2
                    const heightSegundoSubActual = segundoSub.scrollHeight;

                    if(tercerSub.classList.contains("desplegarTercerSub")){
                        //disminuir con el tamaño actual del nivel3
                        const desminuirPrimerSub = heightPrimerSubActual - heightTercerSub;

                        //disminuir con el tamaño actual del nivel2
                        const desminuirSegundoSub = heightSegundoSubActual - heightTercerSub;

                        tercerSub.classList.remove("desplegarTercerSub");
                        // console.log("%c quitamos el style al tercersub ","background: #222; color: #FF0000");
                        tercerSub.removeAttribute("style");

                        //desminuimos el segundosub
                        // console.log("%c desminuimos el tamaño segundosub " + desminuirSegundoSub,"background: #222; color: #FF0000")
                        segundoSub.style.height = desminuirSegundoSub + "px";

                        //desminuimos el primersub
                        // console.log("%c desminuimos el tamaño primersub " + desminuirPrimerSub,"background: #222; color: #FF0000")
                        primerSub.style.height = desminuirPrimerSub + "px";
                    }else{
                        const aumentarPrimerSub=heightPrimerSubActual+heightTercerSub;
                        const aumentarSegundoSub=heightSegundoSubActual+heightTercerSub;

                        tercerSub.classList.add("desplegarTercerSub");
                        // console.log("%c aumentamos el tamaño tercersub" + heightTercerSub,"background: #222; color: 	#008000")
                        tercerSub.style.height = heightTercerSub + "px";

                        //aumentamos el segundoSub
                        // console.log("%c aumentamos el tamaño segundosub " + aumentarSegundoSub,"background: #222; color: 	#008000")
                        segundoSub.style.height = aumentarSegundoSub + "px";

                        //aumentamos el primersub
                        // console.log("%c aumentamos el tamaño primersub " + aumentarPrimerSub,"background: #222; color: 	#008000")
                        primerSub.style.height = aumentarPrimerSub + "px";
                    }
                }
            });
        }
    }
}
*/
//FIN DEL SCRIPT PARA EL sub sub menu

const selectElement = (element) => document.querySelector(element);
selectElement('.hamburger').addEventListener('click', ()=>{
    selectElement('.main-nav').classList.toggle('active');
});


const hamburgerMenu = document.querySelector('.hamburger');
const menuIsActive = ()=>{
    hamburgerMenu.classList.toggle('active');
};
hamburgerMenu.addEventListener('click', menuIsActive)



if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}


if(document.getElementById('exito')){
    document.getElementById("username").value ="";
    document.getElementById("password").value ="";
    document.getElementById("email").value ="";
    document.getElementById("firstname").value ="";
    document.getElementById("lastname").value ="";
}



const porcentaje = document.querySelectorAll(".section-progress-indicator__progress");

    window.addEventListener("load",() => {
        window.addEventListener("scroll", () => {
        let windowInferior = window.pageYOffset + window.innerHeight;
        const grupoServicio = document.querySelectorAll('.contenedor-servicio-contenido');
            for (let i = 0; i < grupoServicio.length; i++) {
                // const objectBottom =  grupoServicio[i].offsetTop + grupoServicio[i].offsetHeight;
                const objetoSuperior = grupoServicio[i].offsetTop;
                if (windowInferior > objetoSuperior) {
                    const objetoTamaño = grupoServicio[i].offsetHeight;
                    const valor = ((windowInferior - objetoSuperior) * 100) / objetoTamaño;
                    for(let j=0; j < porcentaje.length; j++){
                            porcentaje[i].style.width = valor + "%"
                    }
                } else {
                    for(let j=0; j < porcentaje.length; j++){
                            porcentaje[i].style.width = 0 + "%"
                    }
                }
            }
    })
})


document.querySelectorAll('.fila-contenido .fila-contenido__tipo').forEach(p => {
    // Convertir a minúsculas
    p.innerHTML = p.innerHTML.toLowerCase()
});

// document.querySelectorAll('.fila-contenido .fila-contenido__nombre').forEach(p => {
//     // Convertir a minúsculas
//     p.innerHTML = p.innerHTML.toLowerCase()
// });


function volverAtras(){
    if(window.location.hash) {
        window.location.href = "https://hospitalrioja.gob.pe/#seccion-servicios";
    } else {
        window.history.back();
    }
}


(function($){
    $('#printer-animation').mouseleave(function(){
    $(this).removeClass('clicked');
    }).dblclick(function(){
    $(this).addClass('clicked').html($(this).html());
    });
})(jQuery);



buttonUp = document.querySelector(".boton-subir");

window.onscroll = function(){
    var scroll = document.documentElement.scrollTop;

    if (scroll > 500){
        buttonUp.style.transform = "scale(1)";
    }else if(scroll < 500){
        buttonUp.style.transform = "scale(0)";
    }
}

// scroll up
document.querySelector(".boton-subir").addEventListener("click", () =>{
    window.scrollTo({
        top:0,
        behavior: 'smooth'
    });
    buttonUp.style.transform = "scale(0)";
});
///

