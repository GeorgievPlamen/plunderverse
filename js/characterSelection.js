document.addEventListener("DOMContentLoaded", loadCharacters);

function loadCharacters() {
  fetch("/characters")
    .then((response) => response.json())
    .then((data) => {
      let select = document.getElementById("characterSelect");
      select.innerHTML = "";
      data.forEach((character) => {
        let option = document.createElement("option");
        option.value = character.id;
        option.textContent = `${character.name} (HP: ${character.hp}, Credits: ${character.credits})`;
        select.appendChild(option);
      });
    });
}

function startGame() {
  let characterId = document.getElementById("characterSelect").value;
  if (!characterId) return alert("Изберете герой!");

  window.location.href = `game.html?character=${characterId}`;
}

function createCharacter() {
  let name = prompt("Въведете име на героя:");
  if (!name) return;

  let newCharacter = {
    name: name,
    vitality: 1,
    strength: 1,
    charisma: 1,
  };

  fetch("/characters", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(newCharacter),
  })
    .then((response) => response.json())
    .then(() => loadCharacters());
}
