
$('.tab_bar_box li').click(function() {
    $(this).find("p").addClass('actives');
    $(this).siblings(".Imgbox").find("p").removeClass('actives');

    var click = $(this).data('img');
    $(this).find('img').attr('src', click);

    $(this).siblings('.Imgbox').each(function() {
        var noclick = $(this).attr('img');
        $(this).find('img').attr('src', noclick);
    })
});
