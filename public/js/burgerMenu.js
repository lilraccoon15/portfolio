"use strict";

function toggleClasses(element, addClass, removeClass) {
    element.classList.remove(removeClass);
    element.classList.add(addClass);
}

const burger = document.getElementsByClassName("fa-bars")[0];
const nav = document.getElementsByClassName("navLinks")[0];
const xmark = document.getElementsByClassName("fa-xmark")[0];

burger.addEventListener('click', (event) => {
    toggleClasses(burger, "notActive", "active");
    toggleClasses(nav, "active", "notActive");
    toggleClasses(xmark, "active", "notActive");
});

xmark.addEventListener('click', (event) => {
    toggleClasses(burger, "active", "notActive");
    toggleClasses(nav, "notActive", "active");
    toggleClasses(xmark, "notActive", "active");
});
