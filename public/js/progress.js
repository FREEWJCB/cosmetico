function setDone() {
    setTimeout(function() {
        NProgress.done();
        $(".fade").removeClass("out");
    }, 1000);
}
function setStart() {
    NProgress.start();
}

$("body").show();

setStart();
setDone();
$(document).on("turbolinks:click", function() {
    setStart();
});
$(document).on("turbolinks:render", function() {
    setDone();
    NProgress.remove();
});
