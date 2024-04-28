function toggleAnimation(event) {
  let currentNode = event.currentTarget;

  let poleNode;
  let bodyNode;
  let textNode;

  if (currentNode.id == "buttonStartCSS" || currentNode.id == "buttonPauseCSS") {
    poleNode = document.getElementById("batteryPole");
    bodyNode = document.getElementById("batteryBody");
    textNode = document.getElementById("batteryText");
  }

  if (currentNode.id == "buttonStartCSS") {
    poleNode.style.animationPlayState = "running";
    bodyNode.style.animationPlayState = "running";
    textNode.style.animationPlayState = "running";
  } else if (currentNode.id == "buttonPauseCSS") {
    poleNode.style.animationPlayState = "paused";
    bodyNode.style.animationPlayState = "paused";
    textNode.style.animationPlayState = "paused";
  }
}

export default toggleAnimation;
