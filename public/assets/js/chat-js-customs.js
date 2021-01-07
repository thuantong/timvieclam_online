$(function () {
    let heightHead = $('.header-chat').height();
    let heightBody = $('.container-chat').height();
    let heightFooter = $('.footer-chat').height();

    // let heightContent
    $('.content-chat').css('height',parseFloat(heightBody) - parseFloat(heightHead) - parseFloat(heightFooter));

    $('#closed-chat').on('click',function () {
        $(this).parents('.container-chat').fadeOut()
    });
    $('.call-chat').on('click',function () {
        // ;
        $('.container-chat').css('bottom','0px');
        $('.container-chat').fadeIn();
    })
})
