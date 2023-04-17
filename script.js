function hideInputFields() {
  var x = document.getElementById("input");
  var button = document.getElementById("input-button-hide");
  if (x.style.display === "block") {
    x.style.display = "none";
    button.innerHTML = "Nieuw gerecht";
  } else {
    x.style.display = "block";
    button.innerHTML = "Sluiten";
  }
}
