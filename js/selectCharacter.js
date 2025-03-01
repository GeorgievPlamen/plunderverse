function startGame(id) {
  fetch("./index.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ id: id }),
  }).then((res) => console.log(res));
}

document.querySelectorAll(".delete-btn").forEach((button) => {
  button.addEventListener("click", function () {
    // Retrieve the id from the data attribute
    const id = this.getAttribute("data-id");
    startGame(id);
  });
});
