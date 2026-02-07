$(window).on('load', function() {
    $('#preloader').fadeOut('slow', function() {
        $(this).remove();
    });
});
$(document).on('click', '#terms-contions-btn', function(event) {
    $('#terms-contions').removeClass('hidden').addClass('flex');

});
$(document).on('click', '#closeModal', function() {
    $('#terms-contions').removeClass('flex').addClass('hidden');
});

$(function () {
    var lastSegment = window.location.pathname.split('/').filter(Boolean).pop();
    var id = $('.'+lastSegment).data('id');
    var father = $('.'+lastSegment).data('father');
    var first_father = $('#li-' + father).data('father');
    $('#li-' + first_father).addClass('active');
    $('#li-' + father).addClass('active');
    $('#submenu-' + first_father).addClass('show');
    $('#submenu-' + father).addClass('show');
    $('#li-' + id).addClass('active');
    $('#li-' + father + ' .second-menu').attr('style', 'color: white !important;');
});
$(document).on('submit', '#login-form', function(event) {
    event.preventDefault();
    event.stopPropagation();
    var form = $(this);
    var data = form.serialize();
    var url = baseUrl + 'auth/run/signin';
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        $('#btn-login').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`).prop('disabled',true);
    });
    request.done(function(response) {
        if (response.msg) {
            window.location.href = baseUrl + 'component/view/dashboard';
            location.reload();
        }else{
            $('#btn-login').html('Login').prop('disabled',false);
            main.msg('Invalid Username or Password','error');
        }
    });
});
$(document).on('submit', '#register-form', function(event) {
    event.preventDefault();
    event.stopPropagation();
    var form = $(this);
    var data = form.serialize();
    var url = baseUrl + 'auth/run/signup';
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        //$('#submit').prop('disabled',true);;
    });
    request.done(function(response) {
        if (response.success) {
            main.msg(response.msg,'success','');
            $('#register-form')[0].reset();
        }else{
            if (response.exist) {
                main.msg(response.msg,'error');
            }else{
                main.msg('Error on Submit! Please try again','error');
            }
        }
        $('#submit').prop('disabled',false);
    });
});
function getRunURL(params) {
    return  baseUrl + "component/run/"+myModule+"/" + params;
}

$(document).on('click', '#openSettings', function() {
    var id = $(this).data('id');
    var data = $.param({
        id:id
    });
    var url = baseUrl + "component/run/users-account/view-data-user";
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
       main.block_ui();
    });
    request.done(function(response) {
        $('#action-text').html(response.action);
        $('#modal-view-profile .modal-body').html(response.body);
        $('#modal-view-profile #footer-custom').html(response.footer);
        $('#modal-view-profile').removeClass('hidden').addClass('flex');
        $.unblockUI();
    });

   
});
$(document).on('submit', '#submit-form-profile', function(event) {
    event.preventDefault();
    event.stopPropagation();
    var form = $(this);
    var data = form.serialize();
    var url =  baseUrl + "component/run/users-account/crud-action";
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        main.block_ui();
    });
    request.done(function(response) {
        if (response.success) {
            main.msg(response.msg,'success','');
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
            $('#modal-view').removeClass('flex').addClass('hidden');
        }else{
            if (response.exist) {
                main.msg(response.msg,'error');
            }else{
                main.msg(response.msg,'error');
            }
        }
        $.unblockUI();
    });
});
$(document).on('click', '#closeModal', function() {
    $('#modal-view-profile').removeClass('flex').addClass('hidden');
});