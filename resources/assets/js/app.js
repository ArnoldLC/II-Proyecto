
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

const segundosList = document.getElementById('segundos'),
    entradasList = document.getElementById('entradas'),
    postresList = document.getElementById('postres'),
    bebidasList = document.getElementById('bebidas');

const entradasCarta = document.getElementById('entradasCarta'),
    segundosCarta = document.getElementById('segundosCarta'),
    bebidasCarta = document.getElementById('bebidasCarta'),
    postresCarta = document.getElementById('postresCarta');

segundosList.addEventListener('click', () => {
    segundosCarta.className = 'segundos';
    entradasCarta.className = 'entradas ocultar';
    postresCarta.className = 'postres ocultar';
    bebidasCarta.className = 'bebidas ocultar';
});

entradasList.addEventListener('click', () => {
    segundosCarta.className = 'segundos ocultar';
    entradasCarta.className = 'entradas';
    postresCarta.className = 'postres ocultar';
    bebidasCarta.className = 'bebidas ocultar';
});

postresList.addEventListener('click', () => {
    segundosCarta.className = 'segundos ocultar';
    entradasCarta.className = 'entradas ocultar';
    postresCarta.className = 'postres';
    bebidasCarta.className = 'bebidas ocultar';
});

bebidasList.addEventListener('click', () => {
    segundosCarta.className = 'segundos ocultar';
    entradasCarta.className = 'entradas ocultar';
    postresCarta.className = 'postres ocultar';
    bebidasCarta.className = 'bebidas';
});