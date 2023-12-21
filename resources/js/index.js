// Walas
var btnListWalas = document.getElementById("btn-list-walas");
var btnCreateWalas = document.getElementById("btn-create-walas");
var listAccWalas = document.getElementById("listAccWalas");
var createAccWalas = document.getElementById("createAccWalas");

var sidebarPanel = document.getElementById("sidebarPanel");
var sidebarButton = document.getElementById("sidebarButton");
var sidebarButtonInsidePanel = document.getElementById(
    "sidebarButtonInsidePanel"
);

//walas
btnListWalas.addEventListener("click", function () {
    listAccWalas.classList.remove("hidden");
    createAccWalas.classList.remove("block");
    createAccWalas.classList.add("hidden");
});
btnCreateWalas.addEventListener("click", function () {
    listAccWalas.classList.add("hidden");
    createAccWalas.classList.remove("hidden");
    createAccWalas.classList.add("block");
});

sidebarButtonInsidePanel.addEventListener("click", function () {
    sidebarButtonInsidePanel.classList.toggle("hidden");
    sidebarPanel.classList.toggle("hidden");
    sidebarButton.classList.toggle("hidden");
});
sidebarButton.addEventListener("click", function () {
    sidebarPanel.classList.toggle("hidden");
    sidebarButton.classList.toggle("hidden");
    sidebarButtonInsidePanel.classList.toggle("hidden");
});
