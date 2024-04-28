import toggleAnimation from "./toggleAnimation.js";

let buttonStartCSS = document.getElementById("buttonStartCSS");
let buttonPauseCSS = document.getElementById("buttonPauseCSS");
let buttonStartCanvas = document.getElementById("buttonStartCanvas");

let canvas = document.getElementById("canvas__battery");
let draw = canvas.getContext("2d");

buttonStartCSS.addEventListener("click", toggleAnimation);
buttonPauseCSS.addEventListener("click", toggleAnimation);
buttonStartCanvas.addEventListener("click", toggleAnimation);

/* Dibujamos la Pila */

draw.lineWidth = 2;

draw.strokeStyle = "red";
draw.strokeRect(85, 30, 30, 20);

draw.lineWidth = 4;

draw.strokeStyle = "blue";
draw.strokeRect(50, 50, 100, 200);
