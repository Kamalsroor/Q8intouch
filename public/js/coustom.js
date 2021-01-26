
function ajaxSucssesHandleing(data , Form , saveBtn , reset = true) {
    $.growl.notice({
        title: data.status,
        message: data.message,
        size: "large",
        delayOnHover: true,
        // duration time in ms
        duration: 5000,
        // close character
        close: "&#215;",
    });
    if (reset)
        Form[0].reset();

    for (let i = 0; i < $('.saveBtn').length; i++) {
        const saveBtns = $('.saveBtn')[i];
        console.log($(saveBtns).val() , $(saveBtns).attr('data-default-val'));
        $(saveBtns).val($(saveBtns).attr('data-default-val'));
    }

    $('.saveBtn').removeAttr('disabled');
    console.log(Form.data('reload'));
    if (Form.data('reload')) {
        setTimeout(() => {
            $('.saveBtn').val('Reloading...');
            $('.saveBtn').attr('disabled', 'disabled');
            location.reload();
        }, 2500);
    }

    if ($(saveBtn).data('return')) {
        $('.saveBtn').val('Redirecting...');
        $('.saveBtn').attr('disabled', 'disabled');
        setTimeout(() => {
            window.location.href = $('#cancelBtn').attr('href');
        }, 2500);
    }
}

function ajaxErrorHandleing(data  ) {
    $.each( data.responseJSON.errors, function( key, value ) {
        $.growl.error({
            title: key,
            message: value[0]
        });
        $('#'+key).addClass('is-invalid');
        $('#'+key).parent().append(`<span class="error invalid-feedback">${value}</span>`);
    });
    $('.saveBtn').removeAttr('disabled');
    console.log('Error:', data.responseJSON.errors);
    for (let i = 0; i < $('.saveBtn').length; i++) {
        const saveBtn = $('.saveBtn')[i];
        console.log($(saveBtn).val() , $(saveBtn).attr('data-default-val'));
        $(saveBtn).val($(saveBtn).attr('data-default-val'));
    }
}

function saveBtnInAjax(saveBtn) {
    $('.saveBtn').val('Sending..');
    $('.saveBtn').attr('disabled', 'disabled');
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();

}
