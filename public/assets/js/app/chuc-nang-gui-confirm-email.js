$(document).on('click','#gui-xac-nhan-email',function () {
    // alert();
    let __this = $(this);
    let error = 0;
    error += notNullMessage($('.email-not-null'));
    if (error == 0){
        let ajax = {
            method:'post',
            url:'/tai-khoan/xac-nhan-email',
            data : {
                action : data_action_confifm,
                email : $('#email').val()
            }
        }
        console.log('sending email',ajax);
        sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,__this.attr('id')).done(r=>{
            console.log('res email',r);
            getHtmlResponse(r);
            if (r.status == 200){
                $('.message-response').text(r.message);
            }
        })
    }
});
