function startGame(id) {
  alert(`Player with id ${id} starting the game`);
  console.log(id);
}

document.querySelectorAll(".continue-btn").forEach((button) => {
  button.addEventListener("click", function () {
    // Retrieve the id from the data attribute
    const id = this.getAttribute("data-id");
    startGame(id);
  });
});
