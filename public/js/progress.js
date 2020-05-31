$("body").show();

NProgress.start();
setTimeout(function() {
    NProgress.done();
    $(".fade").removeClass("out");
}, 1000);
$(document).on("turbolinks:click", function() {
    NProgress.start();
});
$(document).on("turbolinks:render", function() {
    NProgress.done();
    NProgress.remove();
});
