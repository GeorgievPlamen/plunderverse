document.addEventListener("DOMContentLoaded", startGame);

function startGame() {
  const urlParams = new URLSearchParams(window.location.search);
  const characterId = urlParams.get("character");

  fetch(`/game/start/${characterId}`)
    .then((response) => response.json())
    .then((data) => {
      displayGameState(data);
    });
}

function displayGameState(data) {
  document.getElementById("storyText").textContent = data.story;

  let imgElement = document.getElementById("storyImage");
  if (data.image_url) {
    imgElement.src = data.image_url;
    imgElement.style.display = "block";
  } else {
    imgElement.style.display = "none";
  }

  let actionsContainer = document.getElementById("actionsContainer");
  actionsContainer.innerHTML = "";
  data.actions.forEach((action) => {
    let button = document.createElement("button");
    button.textContent = action.text;
    button.onclick = () => sendAction(action.key);
    actionsContainer.appendChild(button);
  });
}

function sendAction(actionKey) {
  const urlParams = new URLSearchParams(window.location.search);
  const characterId = urlParams.get("character");

  fetch("/game/action", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ character_id: characterId, action_key: actionKey }),
  })
    .then((response) => response.json())
    .then((data) => displayGameState(data));
}
