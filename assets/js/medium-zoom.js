var padreImagen = document.querySelectorAll(".zoom img");
for(let i=0; i < padreImagen.length; i++){
    padreImagen[i].className += " expandir";
}
mediumZoom('.expandir', {
    background: '#212530',
});
