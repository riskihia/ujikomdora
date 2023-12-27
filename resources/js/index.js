// Walas
var btnListWalas = document.getElementById("btn-list-walas");
var btnCreateWalas = document.getElementById("btn-create-walas");
var listAccWalas = document.getElementById("listAccWalas");
var createAccWalas = document.getElementById("createAccWalas");

// Bk
var btnListBk = document.getElementById("btn-list-Bk");
var btnCreateBk = document.getElementById("btn-create-Bk");
var listAccBk = document.getElementById("listAccBk");
var createAccBk = document.getElementById("createAccBk");

// Bk
var btnListSekretaris = document.getElementById("btn-list-Sekretaris");
var btnCreateSekretaris = document.getElementById("btn-create-Sekretaris");
var listAccSekretaris = document.getElementById("listAccSekretaris");
var createAccSekretaris = document.getElementById("createAccSekretaris");

var sidebarPanel = document.getElementById("sidebarPanel");
var sidebarButton = document.getElementById("sidebarButton");
var sidebarButtonInsidePanel = document.getElementById(
    "sidebarButtonInsidePanel"
);

//walas
if (btnListWalas) {
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
}

//bk
if (btnListBk) {
    btnListBk.addEventListener("click", function () {
        listAccBk.classList.remove("hidden");
        createAccBk.classList.remove("block");
        createAccBk.classList.add("hidden");
    });
    btnCreateBk.addEventListener("click", function () {
        listAccBk.classList.add("hidden");
        createAccBk.classList.remove("hidden");
        createAccBk.classList.add("block");
    });
}

//sekretaris
if (btnListSekretaris) {
    btnListSekretaris.addEventListener("click", function () {
        listAccSekretaris.classList.remove("hidden");
        createAccSekretaris.classList.remove("block");
        createAccSekretaris.classList.add("hidden");
    });
    btnCreateSekretaris.addEventListener("click", function () {
        listAccSekretaris.classList.add("hidden");
        createAccSekretaris.classList.remove("hidden");
        createAccSekretaris.classList.add("block");
    });
}

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
