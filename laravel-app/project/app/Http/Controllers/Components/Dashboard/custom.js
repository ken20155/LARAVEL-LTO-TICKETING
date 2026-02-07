
$(document).ready(function() {

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
        $('#modal-view').removeClass('hidden').addClass('flex');
        $('#mySelectVehicleType0').select2();
        $('#mySelectVehicleType1').select2();
        $('#mySelectVehicleType2').select2();

        $.unblockUI();
    });



});

$(document).on('click', '#closeModal', function() {
    $('#modal-view').removeClass('flex').addClass('hidden');
});
$(document).on('click', '#closeModal2', function() {
    $('#modal-view2').removeClass('flex').addClass('hidden');
});
$(document).on('submit', '#submit-form', function(event) {
    event.preventDefault();
    event.stopPropagation();
    var form = $(this)[0];
    var data = new FormData(form);;
    var url = getRunURL('crud-action');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        main.block_ui();
    },true);
    request.done(function(response) {
        if (response.success) {
            //main.msg(response.msg,'success','');
            var element = '#laravel_datatable';
            main.reloadDatatableAjax(element);
            $('#modal-view').removeClass('flex').addClass('hidden');
            ticketList('Pending'); 
            printAndSave(response.id);
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
function printAndSave(id) {
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
        $('#printNowTicket').click();
    });
}
ticketList(); 
function ticketList(filter = 'all') {
    var data = $.param({
        filter:filter,
        search_name:$('#search_name').val(),
        start: $('#start').val(),
        end: $('#end').val(),
        selectStatus: $('#selectStatus').val(),
    });
    var url = getRunURL('ticketList');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        main.block_ui();
    });
    request.done(function(response) {
        $('#ticketList').html(response.html);
        $.unblockUI();
    });
}

$(document).on('click', '#allTickets', function() {
    ticketList(); 
});
$(document).on('click', '#pendingTickets', function() {
    ticketList('Pending'); 
});
$(document).on('click', '#paidallTickets', function() {
    ticketList('Paid'); 
});
$(document).on('keyup', '#search_name', function() {
    ticketList(); 
});
$(document).on('change', '.dateFilter', function() {
    ticketList(); 
});
$(document).on('change', '#selectStatus', function() {
    ticketList(); 
});

pieChart();
let pieChartInstance; // Declare a variable to hold the chart instance

function pieChart() {
    var data = $.param({
    });
    var url = getRunURL('pieChart');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        main.block_ui();
    });
    request.done(function(response) {
        const pieConfig = {
            type: 'doughnut',
            data: {
                datasets: [
                    {
                        data: response.data,
                        backgroundColor: ['#1c64f2','#0694a2'],
                        label: 'Dataset 1',
                    },
                ],
                labels: response.labels,
            },
            options: {
                responsive: true,
                cutoutPercentage: 80,
                legend: {
                    display: false,
                },
            },
        };
    
        // Destroy the existing chart instance if it exists
        if (pieChartInstance) {
            pieChartInstance.destroy();
        }
    
        // Get the context of the canvas
        const pieCtx = document.getElementById('pie2');
    
        // Create a new chart instance
        pieChartInstance = new Chart(pieCtx, pieConfig);
        $.unblockUI();
    });
    
}
let pieChartInstance2;
lineChart();
function lineChart() {
    /**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
    var data = $.param({
    });
    var url = getRunURL('lineChart');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
        main.block_ui();
    });
    request.done(function(response) {

        const lineConfig = {
            type: 'line',
            data: {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
              datasets: [
                {
                  label: 'Pending',
                  /**
                   * These colors come from Tailwind CSS palette
                   * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                   */
                  backgroundColor: '#0694a2',
                  borderColor: '#0694a2',
                  data: response.data_pending,
                  fill: false,
                },
                {
                  label: 'Paid',
                  fill: false,
                  /**
                   * These colors come from Tailwind CSS palette
                   * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                   */
                  backgroundColor: '#7e3af2',
                  borderColor: '#7e3af2',
                  data: response.data_paid,
                },
              ],
            },
            options: {
              responsive: true,
              /**
               * Default legends are ugly and impossible to style.
               * See examples in charts.html to add your own legends
               *  */
              legend: {
                display: false,
              },
              tooltips: {
                mode: 'index',
                intersect: false,
              },
              hover: {
                mode: 'nearest',
                intersect: true,
              },
              scales: {
                x: {
                  display: true,
                  scaleLabel: {
                    display: true,
                    labelString: 'Month',
                  },
                },
                y: {
                  display: true,
                  scaleLabel: {
                    display: true,
                    labelString: 'Value',
                  },
                },
              },
            },
            }
            if (pieChartInstance2) {
                pieChartInstance2.destroy();
            }
          // change this to the id of your chart element in HMTL
          const lineCtx = document.getElementById('line2')
          window.myLine = new Chart(lineCtx, lineConfig)
    });

}
    
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
        $('#image-preview-containervalidIDs').html(response.valid_id_img);
        $('#modal-view').removeClass('hidden').addClass('flex');
        $.unblockUI();
    });
});
//ticketAgain
$(document).on('click', '#ticketAgain', function() {
    var id = $(this).data('id');
    var data = $.param({
        id:id,
        ticket_again:1
    });
    var url = getRunURL('view-data-user');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
       main.block_ui();
    });
    request.done(function(response) {
        $('#action-text').html(response.action);
        $('#modal-view .modal-body').html(response.body);
        $('#modal-view #footer-custom').html(response.footer);
        $('#image-preview-containervalidIDs').html(response.valid_id_img);
        $('#modal-view').removeClass('hidden').addClass('flex');
        $.unblockUI();
    });
});
$(document).on('click', '#viewAccountUploadID', function() {
    $('#modal-view2').removeClass('hidden').addClass('flex');
});
$(document).on('change', '#mySelectVehicleType0', function() {
    var id = $(this).val();
    var data = $.param({
        id:id
    });
    var url = getRunURL('autoFillNow');
    var request = main.form_ajax(url, data, 'POST', function(xhr) {
       main.block_ui();
    });
    request.done(function(response) {
        $.unblockUI();
    });

});
$(document).on('change', '#upload_file', function (event) {
    var files = event.target.files;
    var previewContainer = $('#image-preview-containervalidIDs');
    previewContainer.empty(); // Clear previous previews

    // Loop through selected files
    for (var i = 0; i < files.length; i++) {
      var file = files[i];

      // Check if the file is an image
      if (file && file.type.startsWith('image/')) {
        var reader = new FileReader();

        // When the file is loaded
        reader.onload = function(e) {
          // Create a new image element for the preview
          var img = $('<img class="img-fluid">');
          img.attr('src', e.target.result);
          
          // Append the image preview to the container
          previewContainer.append(img);
        };

        reader.readAsDataURL(file); // Read the file as a data URL
      }
    }
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

$(document).on('click', '#printNowTicket', function() {
    // Get the HTML of the specific div
    var printContent = $('#printContent').html();
    
    // Create a new window for printing
    var printWindow = window.open("", "Print", `width=${screen.width},height=${screen.height}`);


    printWindow.document.write(`
        <link  media="print" rel="stylesheet" href="${baseUrl}public/main/css/main.css">

        <html>
            <head>
                <title>Print Preview</title>
                <style>
                    @media print {
                        * {
                            color-adjust: exact !important;
                            -webkit-print-color-adjust: exact !important;
                            print-color-adjust: exact !important;
                        }
                    }
                </style>
            </head>
            <body>
                ${printContent}
            </body>
        </html>
    `);


    //printWindow.document.close(); // Close the document
    printWindow.print();//min-width: 370px;
    //printWindow.close();
    // setTimeout(function() {
    //     printWindow.print();//min-width: 370px;
    //     printWindow.close();
    // }, 1000);
});

