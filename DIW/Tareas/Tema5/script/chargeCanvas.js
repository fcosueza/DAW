function chargeCanvas() {
  let canvas = document.getElementById("canvas__battery");
  let draw = canvas.getContext("2d");

  let chargeYCoord = 240;

  let intervalID = setInterval(() => {
    if (chargeYCoord > 50) {
      draw.fillStyle = "green";
      draw.rect(51, chargeYCoord, 98, 10);
      draw.fill();

      chargeYCoord--;
    } else {
      clearInterval(intervalID);

      draw.fillStyle = "blue  ";
      draw.fillRect(86, 31, 29, 18);

      draw.textBaseline = "alphabetic";
      draw.textAlign = "center";
      draw.font = "2em Roboto Slab";
      draw.fillStyle = "red";
      draw.fillText("¡Carga Completada!", 91, 278);
    }
  }, 20);
}

export default chargeCanvas;
