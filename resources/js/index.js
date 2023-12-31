//absensi
let btnDataAbsensi = document.getElementById("btn-data-absensi");
let panelKelolaAbsensi = document.querySelector(".panel-kelola-absensi");
let panelDataAbsensi = document.querySelector(".panel-data-absensi");

console.log([btnDataAbsensi, panelKelolaAbsensi, panelDataAbsensi]);
// Siswa
var btnRPL1 = document.getElementById("btn-rpl1");
var btnRPL2 = document.getElementById("btn-rpl2");
var panelRPL1 = document.getElementById("panel-rpl1");
var panelRPL2 = document.getElementById("panel-rpl2");

//rpl1
var btnListSiswaRPL1 = document.getElementById("rpl1-btn-list-siswa");
var btnCreateSiswaRPL1 = document.getElementById("rpl1-btn-create-siswa");
var listKelolaSiswaRPL1 = document.getElementById("rpl1-listKelolaSiswa");
var createKelolaSiswaRPL1 = document.getElementById("rpl1-createKelolaSiswa");
//rpl2
var btnListSiswaRPL2 = document.getElementById("rpl2-btn-list-siswa");
var btnCreateSiswaRPL2 = document.getElementById("rpl2-btn-create-siswa");
var listKelolaSiswaRPL2 = document.getElementById("rpl2-listKelolaSiswa");
var createKelolaSiswaRPL2 = document.getElementById("rpl2-createKelolaSiswa");

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

//absensi
btnDataAbsensi.addEventListener("click", function () {
    panelKelolaAbsensi.classList.toggle("hidden");
    panelDataAbsensi.classList.toggle("hidden");
});

//panel siswa
if (btnRPL1) {
    btnRPL1.addEventListener("click", function () {
        panelRPL1.classList.remove("hidden");
        panelRPL2.classList.add("hidden");
    });
    btnRPL2.addEventListener("click", function () {
        panelRPL2.classList.remove("hidden");
        panelRPL1.classList.add("hidden");
    });
}
//siswa
if (btnListSiswaRPL1) {
    btnListSiswaRPL1.addEventListener("click", function () {
        createKelolaSiswaRPL1.classList.add("hidden");
        listKelolaSiswaRPL1.classList.remove("hidden");
    });
    btnCreateSiswaRPL1.addEventListener("click", function () {
        createKelolaSiswaRPL1.classList.remove("hidden");
        listKelolaSiswaRPL1.classList.add("hidden");
    });
}
if (btnListSiswaRPL2) {
    btnListSiswaRPL2.addEventListener("click", function () {
        createKelolaSiswaRPL2.classList.add("hidden");
        listKelolaSiswaRPL2.classList.remove("hidden");
    });
    btnCreateSiswaRPL2.addEventListener("click", function () {
        createKelolaSiswaRPL2.classList.remove("hidden");
        listKelolaSiswaRPL2.classList.add("hidden");
    });
}

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
