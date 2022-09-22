var padreImagen = document.querySelectorAll(".zoomgaleria a");
for(let i=0; i < padreImagen.length; i++){
    padreImagen[i].setAttribute("data-lightbox", "roadtrip");
}

lightbox.option({
    'wrapAround': true,
    'disableScrolling':true,
    'albumLabel' : "Imagen %1 de %2",
    'alwaysShowNavOnTouchDevices' : true,

})