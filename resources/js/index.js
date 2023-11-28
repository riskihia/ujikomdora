var sidebarPanel = document.getElementById("sidebarPanel");
var sidebarButton = document.getElementById("sidebarButton");
var sidebarButtonInsidePanel = document.getElementById(
    "sidebarButtonInsidePanel"
);

console.log([sidebarButton, sidebarPanel]);

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
