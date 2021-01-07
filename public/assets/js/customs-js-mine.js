function remove_vietnamese_string(str) {
    if (str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, 'a');
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, 'e');
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, 'i');
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, 'o');
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, 'u');
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, 'y');
        str = str.replace(/ |\-/g, '');
        str = str.replace(/đ/g, 'd');
        // str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
        str = str.replace(/^\-+|\-+$/g, "");
        str = str.replace(/!|%|\$|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\:|\;|\'| |\"|\&|\#|\[|\]|~|\{|\}|$/g, "");
        // str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // Huyền sắc hỏi ngã nặng
        // str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // Â, Ê, Ă, Ơ, Ư
        return str.toLowerCase();
    }

}

const refreshTimeOut = () => {
    setTimeout("location.reload(true);", 1000 * 60 * 30);//1 tiếng
};
const switcheryInit = () => {
    $('[data-plugin="switchery"]').each(function (t, e) {
        new Switchery($(this)[0], $(this).data())
    });
};
$(function () {
    refreshTimeOut();

    // let chieuCaoInput =
    // $('.input-group-append').css('height',chieuCaoInput+'px');

    // $('input').on('focus',function () {
    //
    //     // var x = $(this).offset().top / 2, y = $('.modal-body').scrollY;
    //     // // elem.focus();
    //     // console.log(x)
    //     // $('.modal-body').scrollTop(x);
    //     $('.modal-body').scrollIntoView();
    // })

    $('.input-group-append').each(function () {
        // console.log($(this).parent().find('.form-control').css('border-radius'))
        if ($(this).parent().find('.form-control').prop("tagName").toLowerCase() == 'select') {
            let chieuCaoInput = $(this).parent().find('.form-control').outerHeight() - 2;
            $(this).css('height', chieuCaoInput + 'px');
            $(this).css('top', '1px');
            $(this).css('left', '-4px');
            $(this).find('span').css('border-radius', '.2rem');
            $(this).find('span').css('border-left', 'none');
            $(this).find('span').css('border-top', 'none');
            $(this).find('span').css('border-bottom', 'none');
        }

    });

    $('div::-webkit-scrollbar-thumb').attr('style', 'display:none;');
    $('.overflow-auto-scroll').scroll(function () {
        $('div::-webkit-scrollbar-thumb').css('display', 'none');
        // setTimeout(function(){ alert("Hello"); }, 1500);
    });
    // let time = 0;
    $('.button-menu-mobile').on('click', function () {
        $('body').removeClass('enlarged')
        // console.log($('.left-side-menu-custom').css('display'))
        // $('.left-side-menu').css('display','block')

        // if ($(window).width() < 769) {
        //     time++;
        //     if ($('.left-side-menu-custom').css('display') == 'block' && time == 1) {
        //         $('.left-side-menu-custom').css('display', 'block');
        //     } else if ($('.left-side-menu-custom').css('display') == 'none') {
        //         $('.left-side-menu-custom').css('display', 'block');
        //     } else {
        //         $('.left-side-menu-custom').css('display', 'none');
        //     }
        //
        // }
    });
    // $(function () {
        // $('.left-side-menu-custom').css('display', 'none');
    // })
    // $(window).resize(function () {
    //     if ($(window).width() < 769) {
    //         time = 0;
    //         $('.left-side-menu-custom').css('display', 'none');
    //     } else {
    //         $('.left-side-menu-custom').css('display', 'block');
    //     }
    //
    // });

    $('input').on('input', function () {
        $(this).removeClass('is-invalid');
    });
    $('textarea').on('input', function () {
        $(this).removeClass('is-invalid');
    });
    $('input').on('change', function () {
        $(this).removeClass('is-invalid');
    });

    $('input[data-rule="email"]').on('input', function () {
        let value = $(this).val();
        $(this).val(remove_vietnamese_string(value));
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
        // console.log(value.match(regex))
        if (value.match(regex) == null) {
            $(this).addClass('is-invalid').parent().find('.invalid-feedback').find('strong').text('Không đúng định dạng email');
        } else {
            $(this).removeClass('is-invalid');
        }

    });

});


// const getResponseAjax = (method, url, arrayData, arrayCustom) => {
//     let headerCus = '';
//
//     let elementIDToSave = $('#' + arrayCustom.beforeSendElement);
//     let newArray = [];
//     let items = {};
//     let errorCount = 0;
//     const buttonText = elementIDToSave.html();
//     let response_func = '';
//     // console.log(arrayData == '');
//     // console.log(arrayData == '');
//     if (arrayCustom == '') {
//         $.each(arrayCustom, function (index, value) {
//
//             if (arrayData.hasOwnProperty(index)) {
//                 items[index] = value;
//             }
//         });
//     }
//
//     newArray.push(items);
//
//     $.each(elementIDToSave.parents('.modal').find('input').not('input[type="hidden"]'), function (i, v) {
//         if ($(v).val() == null || $(v).val() == '') {
//             errorCount++;
//             $(v).addClass('is-invalid');
//             $(v).parent().find('.invalid-feedback strong').text($(v).attr('title') + ' ' + 'không được để trống');
//         }
//     });
//
//     if (errorCount == 0) {
//         switch (method.toLowerCase()) {
//             case 'post':
//                 headerCus = {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                 };
//                 break;
//             case 'get':
//                 headerCus = {};
//                 break;
//         }
//         ;
//
//         $.ajax({
//             method: method,
//             url: url,
//             data: arrayData,
//             headers: headerCus,
//             success: function (res) {
//                 // console.log(res)
//                 if (res.status == 200) {
//                     elementIDToSave.html(buttonText);
//                     elementIDToSave.removeAttr('disabled').html(buttonText);
//
//                     let elementID = elementIDToSave.attr('id');
//                     $.toast({
//                         heading: res.title + ' ' + res.status_text.toLowerCase(),
//                         hideAfter: 2000,
//                         icon: 'success',
//                         loaderBg: '#5ba035',
//                         position: 'top-right',
//                         stack: 1,
//                         // text: 'Bạn vừa ' + arrayCustom.resHeading.toLowerCase() + ' ' + res.status_text.toLowerCase() + '!',
//                         text: res.message.toUpperCase() + '!',
//                     });
//                     let modalID = $('#' + elementID).parents('.modal').attr('id');
//                     $('#' + modalID).modal('hide');
//                 } else if (res.status == 400) {
//                     if (res.reset == 1) {
//                         $('input').val('').trigger('input');
//                     }
//                     elementIDToSave.attr('id', arrayCustom.beforeSendElement).html(buttonText);
//                     elementIDToSave.removeAttr('disabled').html(buttonText);
//                     $.each(newArray[0], function (i, v) {
//
//                         v.addClass('test');
//                     });
//                     $.toast({
//                         heading: res.title + ' ' + res.status_text.toLowerCase(),
//                         hideAfter: 3000,
//                         icon: 'error',
//                         loaderBg: 'red',
//                         position: 'top-right',
//                         stack: 1,
//                         text: res.message.toUpperCase() + '!',
//                         // text: 'Bạn vừa ' + arrayCustom.resHeading.toLowerCase() + ' ' + res.status_text.toLowerCase() + '!',
//                     });
//                 }
//
//             },
//             beforeSend: function (xhr) {
//                 elementIDToSave.html('<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>');
//                 elementIDToSave.attr('disabled', 'disabled');
//             },
//         });
//
//     }
//
// };


// const sendAjax = (method, url, data, button) => {
//     const myButton = button.text();
//     switch (method.toLowerCase()) {
//         case 'post':
//             headerCus = {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//             };
//             break;
//         case 'get':
//             headerCus = {};
//             break;
//     }
//     ;
//     $.ajax({
//         method: method,
//         url: url,
//         data: arrayData,
//         headers: headerCus,
//         success: function (res) {
//             // console.log(res)
//             if (res.status == 200) {
//
//                 let elementID = elementIDToSave.attr('id');
//                 $.toast({
//                     heading: res.title + ' ' + res.status_text.toLowerCase(),
//                     hideAfter: 2000,
//                     icon: 'success',
//                     loaderBg: '#5ba035',
//                     position: 'top-right',
//                     stack: 1,
//                     text: res.message.toUpperCase() + '!',
//                 });
//                 let modalID = $('#' + elementID).parents('.modal').attr('id');
//                 $('#' + modalID).modal('hide');
//             } else if (res.status == 400) {
//                 button.html(myButton);
//                 button.removeAttr('disabled').html(myButton);
//                 if (res.reset == 1) {
//                     $('input').val('').trigger('input');
//                 }
//                 $.toast({
//                     heading: res.title + ' ' + res.status_text.toLowerCase(),
//                     hideAfter: 3000,
//                     icon: 'error',
//                     loaderBg: 'red',
//                     position: 'top-right',
//                     stack: 1,
//                     text: res.message.toUpperCase() + '!',
//                 });
//             }
//
//         },
//         beforeSend: function (xhr) {
//             button.html('<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>');
//             button.attr('disabled', 'disabled');
//         },
//     });
// }

const sendAjaxNoFunc = (method, url, data, ...button) => {
    let myButton = '';
    let buttonHtml = '';
    // console.log('nut',button)
    if (button != '') {
        myButton = $('#' + button);
        buttonHtml = myButton.html();
    }
    switch (method.toLowerCase()) {
        case 'post':
            headerCus = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            };
            break;
        case 'get':
            headerCus = {};
            break;
    }

    return $.ajax({
        method: method,
        url: url,
        data: data,
        headers: headerCus,
        success: function (res) {
            // console.log(res)
            if (button != '') {
                myButton.html(buttonHtml);
                myButton.removeAttr('disabled').html(buttonHtml);
            }
            // myButton.removeAttr('disabled').html(buttonHtml);
            return res;
        },
        beforeSend: function (xhr) {
            if (button != '') {
                myButton.html('<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>');
                myButton.attr('disabled', 'disabled');
            }
        },
    });
}

// const getMessageError = (element, data) => {
//     // console.log('element',element.parent(),data)
//     element.addClass('is-invalid');
//     element.parent().find('.invalid-feedback').find('strong').text(data.message);
// };

const notNullMessage = (element) => {
    let error = 0;
    element.each(function () {
        if ($(this).parent().find('#cong_ty_tuyen_dung_name').length > 0) {
            if ($(this).val() == ''){
                $(this).addClass('is-invalid');
                $(this).parent().find('#cong_ty_tuyen_dung_name').addClass('form-control is-invalid');
                $(this).parent().find('.invalid-feedback').addClass('text-left').find('strong').text($(this).attr('title') + ' không được để trống');
                error++;
            }

        } else if ($(this).prop("tagName").toLowerCase() == 'select') {
            if ($(this).find('option:checked').val() == '') {
                $(this).addClass('is-invalid').parent().find('.select2-container').find('.select2-selection').css('border', '#f1556c 1px solid');
                $(this).parent().find('.invalid-feedback').addClass('text-left').find('strong').text($(this).attr('title') + ' không được để trống');
                // console.log('select')


                error++;
            }
        } else {
            if ($(this).val() == '') {
                $(this).addClass('is-invalid');
                $(this).parent().find('.invalid-feedback').addClass('text-left').find('strong').text($(this).attr('title') + ' không được để trống');
                // console.log($(this).attr('class'))
                error++;
            } else {
                $(this).removeClass('is-invalid');
            }
        }

    });
    return parseInt(error);
};

$(document).on('change', 'select', function () {
    $(this).removeClass('is-invalid').parent().find('.select2-container').find('.select2-selection').removeAttr('style');
});
const lichNgay = (element) => {
    return element.datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        language: 'vi',

    });
};

const lichThang = (element) => {
    return element.datepicker({
        viewMode: "months",
        minViewMode: "months",
        format: 'mm/yyyy',
        autoclose: true,
        language: 'vi'
    });
};

const lichNam = (element) => {
    return element.datepicker({
        viewMode: "years",
        minViewMode: "years",
        format: 'yyyy',
        autoclose: true,
        language: 'vi'
    });
}

const lichGio = (element) => {
    return element.datetimepicker({
        format: 'HH:mm',
        // pickDate: false,
        // pickSeconds: false,
        // pick12HourFormat: false
    });
    // return element.datepicker({
    //     viewMode: "years",
    //     minViewMode: "years",
    //     format: 'yyyy',
    //     autoclose: true,
    //     language: 'vi'
    // });
}
// $(document).on('focus', 'input,textarea', function () {
//     $(this).focus();
// });
$(document).on('change', 'select', function () {
    if ($(this).hasClass('is-invalid')) {
        $(this).removeClass('is-invalid');
    }
});
$('textarea').each(function () {
    if ($(this).val() == '') {
        this.setAttribute('style', 'overflow-y:hidden;');
    } else {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }
}).on('input', function () {

    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 10 + 'px';
}).on('keypress', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 15 + 'px';
});

$('input').each(function () {
    $(this).attr('autocomplete', 'off')
});

const getHtmlResponse = (data) => {
    let backgroudLoad = '';
    let type = '';
    let timeOut = 0;
    switch ($.trim(data.status)) {
        case '200':
            backgroudLoad = '#5ba035';
            type = 'success';
            timeOut = 2000;
            break;
        case '400':
            backgroudLoad = 'red';
            type = 'error';
            timeOut = 3200;
            break;
    }

    return getNotificationAjax(data);
}

const getNotificationAjax = (message) => {
    let backgroudColor = '';
    switch (message.status) {
        case 200:
            backgroudColor = '#2fb614';
            vtoast.show(message.title, message.message, {
                width: 250,
                margin: 20,
                "progressbar": "bottom",
                color: "#FFFFFF",
                backgroundcolor: backgroudColor,
                unfocusduration: 500,
                "duration": 1500,
                opacity: "1"
            });
            break;
        case 400:
            backgroudColor = '#cb4745';
            vtoast.show(message.title, message.message, {
                width: 250,
                margin: 20,
                "progressbar": "bottom",
                color: "#FFFFFF",
                backgroundcolor: backgroudColor,
                unfocusduration: 500,
                "duration": 1500,
                opacity: "1"
            });
            break;
    }

};
$(document).on('keypress', 'textarea.break-custom', function (e) {
    if (e.keyCode === 13) {
        $(this).val(function (i, val) {
            return val + ".\n- ";
        });
    }
}).on('keypress', 'textarea.break-custom', function (e) {
    if (e.keyCode === 13 && !e.ctrlKey) {
        return false;
    }
});
$(document).on('focus', 'textarea.break-custom', function () {
    if ($(this).val() == '') {
        $(this).val(function (i, value) {
            return '- ';
        });
    }
});

$(document).on('focusout', 'textarea.break-custom', function () {
    let value = $(this).val();
    let count = $.trim(value);
    // console.log(count)
    if (count.length == 1) {
        $(this).val(function (i, value) {
            return '';
        });
    }
});

$(document).on('init.dt', function (e, settings, json) {
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
});

const datatableAjax = (element, ajax, column) => {
    element.css('width', '100%');
    return element.DataTable({
        ajax: {
            url: ajax.url,
            type: ajax.method,
            data: ajax.data != undefined ? ajax.data : {},
            dataSrc: 'data',
        },
        columns: column,
        lengthChange: false,
        processing: false,
        ordering: false,
        scrollY: "55vh",
        autoWidth: true,
        searching: true,
        scrollX: true,
        scrollCollapse: true,
        pagingType: "full_numbers",
        // fixedHeader: "true",
        language: {
            paginate: {
                previous: "<i class='fa fa-caret-left'>",
                next: "<i class='fa fa-caret-right'>",
                "first": "Trang đầu",
                "last": "Trang cuối",
            },
            infoPostFix: "",
            info: "Hiển thị từ _START_ đến _END_ của _TOTAL_ mục",
            infoEmpty: "Hiển thị từ 0 đến 0 của 0 mục",
            zeroRecords: "Không tìm thấy kết quả",
            thousands: ",",
            emptyTable: "Không có dữ liệu trong bảng",
            processing: 'Đang tải ....',
            search: 'Tìm kiếm',
            loadingRecords: "Đang tải ....",
            infoFiltered: "(Lọc từ _MAX_ mục)",
        },
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Thêm mới',
                className: 'btn btn-primary them-moi-danh-sach',

            }
        ]
    });
};

const alertConfirm = (data) => {
    let datares = data;
    return Swal.fire({
        title: datares.title,
        text: datares.message,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Vâng, tôi muốn " + datares.title.toLowerCase() + "!",
        cancelButtonText: "Không " + datares.title.toLowerCase()
    });
}

function copy(value) {
    var aux = document.createElement("div");
    aux.setAttribute("contentEditable", true);
    aux.innerHTML = value;
    aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)");
    document.body.appendChild(aux);
    aux.focus();
    document.execCommand("copy");
    document.body.removeChild(aux);

    vtoast.show('Sao chép thành công!', '', {
        width: 250,
        margin: 20,
        "progressbar": "bottom",
        color: "#FFFFFF",
        backgroundcolor: '#2fb614',
        unfocusduration: 500,
        "duration": 800,
        opacity: "1"
    });
}


$(document).on('click', '.button-menu-mobile', function () {
    if ($('body').find('.table.datatable-check').length) {
        if ($('body').find('table').length > 0) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        }
    }

});


const validateMin = (e) => {
    let error = 0;
    e.each(function () {
        // console.log($(this))
        if ($(this).val().length < 8) {
            $(this).addClass('is-invalid');
            $(this).parent().find('.invalid-feedback').addClass('text-left').find('strong').text($(this).attr('title') + ' phải ít nhất 8 chữ số!');
            error++;
        }
    });

    return error;
};

const fullSizePage = () => {
    $('body').addClass('enlarged');
}

$(document).on('show.bs.modal', '.modal', function (event) {
    var zIndex = 1040 + (10 * $('.modal:visible').length);
    $(this).css('z-index', zIndex);
    setTimeout(function () {
        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
    }, 0);
});

const select2Single = (element, parentNode) => {
    return element.select2({
        dropdownParent: parentNode
    }).data('select2').listeners['*'].push(function (name, target) {
        if (name == 'focus') {
            $(this.$element).select2("open");
        }
    });
};
const select2Default = (element) => {
    return element.select2().data('select2').listeners['*'].push(function (name, target) {
        if (name == 'focus') {
            $(this.$element).select2("open");
        }
    });
};
const select2MultipleDefault = (element, placeHolder) => {
    return element.select2({
        placeholder: ' ' + placeHolder + '',
        allowClear: false
    }).data('select2').listeners['*'].push(function (name, target) {
        if (name == 'focus') {
            $(this.$element).select2("open");
        }
    });
};

/**
 * Ex: changeSwitchery($('#'),false)
 * @param element
 * @param checked
 */
function changeSwitchery(element, checked) {
    if ((element.is(':checked') && checked == false) || (!element.is(':checked') && checked == true)) {
        element.parent().find('.switchery').trigger('click');
    }
}

const checkIsDeviceMedium = () => {
    let width = $(window).width();
    if (width >= 768) {
        return true;
    } else if (width <= 768) {
        return false;
    }
}

const getTrangThaiTaiKhoan = (status) => {
    switch (parseInt(status)) {
        case 0:
            return '<span class="text-dark">Ngoại tuyến</span>';
        case 1:
            return '<span class="text-success">Đang hoạt động</span>';
        case 2:
            return '<span class="text-danger">Đã tạm khóa</span>';
    }
}

$(document).on('click', '.thong-bao-phan-quyen', function () {
    let data = {
        title: 'Thông báo',
        message: "Chức năng không khả dụng trên người dùng!",
        status: 400
    }
    getHtmlResponse(data)
});

const getDataRow_dt = (element, tr) => {
    return element.row(tr).data();
}

const db_ajax_reload_all = (e) => {
    e.ajax.reload();
}
const db_ajax_reload_page = (e) => {
    e.ajax.reload(null, false);
}
// if($("body").find('.ql-bold').length > 0){
//     $(document).on('click','button.ql-bold',function () {
//         alert()
//     })
// }

