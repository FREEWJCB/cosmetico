function setDone() {
    setTimeout(function() {
        NProgress.done();
        $(".fade").removeClass("out");
    }, 1000);
}
function setStart() {
    NProgress.start();
}
// Add event listener to know when the page is loaded
window.addEventListener("load", () => {
    setStart();
    console.log("Estamos listos!");
    setDone();
});

// Add event listener to know when a new turbolinks visit has been registered
document.addEventListener("turbolinks:load", () => {
    console.log("Estamos listos con Turbolinks!");
});

// Add event listener to know when a new turbolinks visit starts and add
// the class to fade out the content
document.addEventListener("turbolinks:request-start", () => {
    document.querySelector(".main").classList.remove("fadein");
    document.querySelector(".main").classList.add("fadeout");
});

// Add event listener to know when a new turbolinks visit starts and add
// the class to fade in the content
document.addEventListener("turbolinks:render", () => {
    document.querySelector(".main").classList.remove("fadeout");
    document.querySelector(".main").classList.add("fadein");
});
