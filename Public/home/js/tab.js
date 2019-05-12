$(function () {
    $("#hear #tab li").click(function () {
        $(this).css({
            borderBottom: "2px solid #02c88",
            height: "60px"
        }).siblings().css({
            borderBottom: "none",
            height: "60px"
        });
    });

    $("#hear #tab li").click(function () {
        $(this).addClass("action").siblings().removeClass("action");
        var index = $(this).index();
        $("#contentop li").eq(index).css("display", "block").siblings().css("display", "none");
    });
});