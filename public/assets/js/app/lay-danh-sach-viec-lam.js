/**
 * lấy danh sách việc làm phân trang
 * @param elementResponse
 * @param newPage
 */
function getItemsDefaults(elementResponse,newPage,ajax,...type) {
    elementResponse.find('.processing-input:last').removeClass('d-none');
    let element = elementResponse.attr('id');
    // let ajax = {
    //     method: 'get',
    //     url: '/tuyen-dung',
    //     data : {page :newPage}
    // };
    sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e =>{
        // console.log('data day',e)
        if (type == 'timkiem'){
            elementResponse.html(e);
        }else{
            elementResponse.append(e);
        }

        elementResponse.find('.processing-input').not(':last').addClass('d-none');

        currenPage = parseInt($('.item-container-page:last').data('current'));
        nextPage = currenPage + parseInt(1);
        next_page_check = $('.item-container-page:last').data('pageurl');

        let widthImage = $('#'+element+' .iteam-click').find('img').parent().width();
        let heightImage = widthImage;
        $('#'+element+' .iteam-click').find('img').css('width', widthImage).css('height', heightImage);

        if(parseInt(newPage) == parseInt(1)){
            $('#'+element+' .iteam-click').eq(0).trigger('click');
        }
    })

}
//end lấy danh sách việc làm phân trang

$(function () {
    /**
     * @scroll lấy danh sách việc làm next page
     */
    // $('#container-items').parents().on('scroll', function (e) {
    //     let x = $(this).prop('scrollHeight');
    //     let vitri = parseFloat(x) - parseFloat(Math.abs($(this).height()));
    //
    //     if (parseInt(vitri) == $(this).scrollTop()) {
    //         console.log(next_page_check)
    //         if (next_page_check != ''){
    //             getItemsDefaults($('#container-items'),nextPage);// append bài viết
    //
    //         }
    //     }
    // });
    //end @scroll
});
