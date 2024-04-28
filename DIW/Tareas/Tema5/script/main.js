import toggleAnimation from "./toggleAnimation.js";

let buttonStartCSS = document.getElementById("buttonStartCSS");
let buttonPauseCSS = document.getElementById("buttonPauseCSS");

let canvas = document.getElementById("canvas__battery");
let draw = canvas.getContext("2d");

buttonStartCSS.addEventListener("click", toggleAnimation);
buttonPauseCSS.addEventListener("click", toggleAnimation);

/* Dibujamos la Pila */

draw.lineWidth = 3;

draw.strokeStyle = "red";
draw.strokeRect(85, 30, 30, 20);

draw.strokeStyle = "blue";
draw.strokeRect(50, 50, 100, 200);

draw.fillStyle = "green";
draw.rect(51, 245, 98, 148);
draw.fill();
