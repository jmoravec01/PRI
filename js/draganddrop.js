var fileDrop = document.getElementById("file-drop");
var fileInput = document.getElementById("xmlFile");
var dragText = document.querySelector(".drag-text");

// Handle drag events
fileDrop.addEventListener("dragover", function (e) {
  e.preventDefault();
  fileDrop.classList.add("hover");
  dragText.textContent = "Pusť";
});

fileDrop.addEventListener("dragleave", function (e) {
  e.preventDefault();
  fileDrop.classList.remove("hover");
  dragText.textContent = "Přetáhněte soubor sem";
});

fileDrop.addEventListener("drop", function (e) {
  e.preventDefault();
  fileDrop.classList.remove("hover");
  var files = e.dataTransfer.files;
  if (files.length > 0) {
    fileInput.files = files;
    dragText.textContent = files[0].name;
  }
});

// Handle file input change event
fileInput.addEventListener("change", function () {
  if (fileInput.files.length > 0) {
    dragText.textContent = fileInput.files[0].name;
  } else {
    dragText.textContent = "Přetáhněte soubor sem";
  }
});
