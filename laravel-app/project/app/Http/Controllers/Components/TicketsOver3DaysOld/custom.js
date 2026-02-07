//for core start
$(document).ready(function() {
    var element = '#laravel_datatable';
    var url = getRunURL('list-users');
    var columns = [
        { data: '#', title: '#' },
        { data: 'or_no', title: 'OR No.' },
        { data: 'ticket_no', title: 'Ticket No.' },
        { data: 'full_name', title: 'Full name' },
        { data: 'address', title: 'Address' },
        { data: 'added_by', title: 'Added By' },
        { data: 'added_date', title: 'Added Date' },
        { data: 'status', title: 'Status' },
        { data: 'action', title: 'Action' },
    ];
    main.generateDatatable(element,url,columns);
});
$(document).on('change', '#selectLto', function() {
    var element = '#laravel_datatable';
    var url = getRunURL('list-users');
    var columns = [
        { data: '#', title: '#' },
        { data: 'ticket_no', title: 'Ticket No.' },
        { data: 'full_name', title: 'Full name' },
        { data: 'address', title: 'Address' },
        { data: 'added_by', title: 'Added By' },
        { data: 'added_date', title: 'Added Date' },
        { data: 'status', title: 'Status' },
        { data: 'action', title: 'Action' },
    ];
    var table = $(element).DataTable();
    table.destroy();
    $(element).html('');
    var data = {
        'user_id': $(this).val()
    };
    main.generateDatatable(element,url,columns,data);
});
$(document).on('click', '#printTicket', function() {

    var id = $(this).data('id');
    var data = $.param({
        id:id
    });
    var url = getRunURL('printPreviewTicket');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
    main.block_ui();
    });
    request.done(function(response) {
        $('#action-text').html(response.action);
        $('#modal-view .modal-body').html(response.body);
        $('#modal-view #footer-custom').html(response.footer);
        $('#modal-view').removeClass('hidden').addClass('flex');
        $.unblockUI();
    });
});

$(document).on('click', '#closeModal', function() {
    $('#modal-view').removeClass('flex').addClass('hidden');
});

$(document).on('click', '#refrest-datatable', function() {
    var element = '#laravel_datatable';
    main.reloadDatatableAjax(element);
});
$(document).on('click', '#viewAccount', function() {
    var id = $(this).data('id');
    var data = $.param({
        id:id
    });
    var url = getRunURL('view-data-user');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
       main.block_ui();
    });
    request.done(function(response) {
        $('#action-text').html(response.action);
        $('#modal-view .modal-body').html(response.body);
        $('#modal-view #footer-custom').html(response.footer);
        $('#modal-view').modal('show');
        $.unblockUI();
    });

   
});
$(document).on('click', '#addNewAccount', function() {
    var data = $.param({});
    var url = getRunURL('add-new-user');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
       main.block_ui();
    });
    request.done(function(response) {
        $('#action-text').html(response.action);
        $('#modal-view .modal-body').html(response.body);
        $('#modal-view #footer-custom').html(response.footer);
        $('#modal-view').modal('show');
        $.unblockUI();
    });

   
});
$(document).on('submit', '#submit-form', function(event) {
    event.preventDefault();
    event.stopPropagation();
    var form = $(this);
    var data = form.serialize();
    var url = getRunURL('crud-action');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        main.block_ui();
    });
    request.done(function(response) {
        if (response.success) {
            main.msg(response.msg,'success');
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
            $('#modal-view').modal('hide');
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
$(document).on('click', '#deleteData', function() {
    var title = 'Are you sure you want to Delete?';
    var id = $(this).data('id');
    main.confirmation(title,function () {
        var data = $.param({
            id:id
        });
        var url = getRunURL('delete-data-user');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
           main.block_ui('#div_laravel_datatable');
        });
        request.done(function(response) {
            if (response.success) {
                main.notify(response.msg,'close');
            }else{
                main.notify('Error','close');
            }
            $('#div_laravel_datatable').unblock();
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
        });
    })
});
$(document).on('click', '#acceptData', function() {
    var title = 'You want to Paid?';
    var id = $(this).data('id');
    main.confirmation(title,function () {
        var data = {
            id:id
        };
        remarksReasons(data)
    })
});
function remarksReasons(data) {
    var title = 'Please enter OR No.';
    main.remarksMsg(title,data,'afterProcessCancel');
}
function afterProcessCancel(data) {
    if (data.value == '') {
        remarksReasons(data);
    }else{
        var url = getRunURL('accept-data-user');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
           main.block_ui('#div_laravel_datatable');
        });
        request.done(function(response) {
            if (response.success) {
                main.msg(response.msg,'success','');
            }else{
                main.msg(response.msg,'error','');
            }
            $('#div_laravel_datatable').unblock();
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
        });
    }
}
//for core end
$(document).on('click', '#acceptAccount', function() {
    var title = 'Are you sure you want to Accept?';
    var id = $(this).data('id');
    main.confirmation(title,function () {
        var data = $.param({
            id:id
        });
        var url = getRunURL('accept-user');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
           main.block_ui('#div_laravel_datatable');
        });
        request.done(function(response) {
            if (response.success) {
                main.msg(response.msg,'success','');
            }else{
                main.msg('Error','close');
            }
            $('#div_laravel_datatable').unblock();
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
        });
    })
});
$(document).on('click', '#declineAccount', function() {
    var title = 'Are you sure you want to Decline?';
    var id = $(this).data('id');
    main.confirmation(title,function () {
        var data = $.param({
            id:id
        });
        var url = getRunURL('decline-user');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
           main.block_ui('#div_laravel_datatable');
        });
        request.done(function(response) {
            if (response.success) {
                main.notify(response.msg,'close');
            }else{
                main.notify('Error','close');
            }
            $('#div_laravel_datatable').unblock();
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
        });
    })
});
//viewData
$(document).on('click', '#viewData', function() {
    //validid
    $('#image-preview-containervalidIDs').html(`
        <img class="img-fluid" style="width:400px;height:400px" src="${$(this).data('validid')}">
    `);
    $('#modal-view2').removeClass('hidden').addClass('flex');
});
$(document).on('click', '#closeModal2', function() {
    $('#modal-view2').removeClass('flex').addClass('hidden');
});