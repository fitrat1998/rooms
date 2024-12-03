/*
* My functions for admin panel
*/

function preloader() {
    $(".loader-in").fadeOut();
    $(".loader").delay(150).fadeOut("fast");
    $(".wrapper").fadeIn("fast");
    $("#app").fadeIn("fast");
}

//Initialize Select2 Elements
$('.select2').select2({
    theme: 'bootstrap4'
});

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
});

//select all
$("#checkAll").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);

});

$('.duallistbox').bootstrapDualListbox({
    nonSelectedListLabel: 'Не разрешено',
    selectedListLabel: 'Разрешено',
});


function alertMessage(message = '', type = 'default') {

    let messageDiv =
        '<div class="alert alert-default-' + type + ' alert-dismissible fade show" role="alert">\n' +
        message + '\n' +
        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
        '    <span aria-hidden="true">&times;</span>\n' +
        '  </button>\n' +
        '</div>';

    return messageDiv;
}

$('form').submit(function () {
    let button = $(this).find("button[type=submit]:focus");
    button.prop('disabled', true);
    button.html('<i class="spinner-border spinner-border-sm text-light"></i> ' + $(button).text() + '...');
});

$('.submitButton').click(function () {

    if (confirm('Confirm action')) {
        $(this).prop('disabled', true);
        $(this).html('<i class="spinner-border spinner-border-sm text-light"></i> ' + $($(this)).text() + '...');
        $(this).parents('form:first').submit();
    }

});

function SpinnerGo(obj) {
    $(obj).prop('disabled', true);
    $(obj).html('<i class="spinner-border spinner-border-sm text-light"></i> ' + $($(obj)).text());
}

function SpinnerStop(obj) {
    $(obj).prop('disabled', false);
    $(obj).html($($(obj)).text());
}

function afterSubmit(obj) {
    $(obj).prop('disabled', true);
    $(obj).html('<i class="spinner-border spinner-border-sm text-light"></i> ' + $($(obj)).text());
    obj.form.submit();
}

function toggle_avtospisaniya(client_id, token, obj) {

    $.ajax({
        url: '/clients/auto-toggle',
        type: "post", //send it through post method
        data: {
            _token: token,
            client_id: client_id
        },
        beforeSend: function () {
            // $(obj).removeAttr('class');
            $(obj).attr('class', 'spinner-border spinner-border-sm text-secondary');
        },
        success: function (result) {

            if (result.auto === true) {
                $(obj).attr('class', 'fas fa-check-circle text-success');
            } else if (result.auto === false) {
                $(obj).attr('class', 'fas fa-times-circle text-danger');
            } else {
                $(obj).attr('class', 'fas fa-question-circle text-warning');
            }
        },
        error: function (err) {
            $(obj).attr('class', 'fas fa-question-circle text-warning');
        }
    })
}

$(function () {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.swalDefaultSuccess').click(function () {
        Toast.fire({
            icon: 'success',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultInfo').click(function () {
        Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultError').click(function () {
        Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultWarning').click(function () {
        Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultQuestion').click(function () {
        Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });

    $('.toastrDefaultSuccess').click(function () {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function () {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function () {
        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function () {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function () {
        $(document).Toasts('create', {
            title: 'Toast Title',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultTopLeft').click(function () {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'topLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultBottomRight').click(function () {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomRight',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultBottomLeft').click(function () {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultAutohide').click(function () {
        $(document).Toasts('create', {
            title: 'Toast Title',
            autohide: true,
            delay: 750,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultNotFixed').click(function () {
        $(document).Toasts('create', {
            title: 'Toast Title',
            fixed: false,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultFull').click(function () {
        $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            icon: 'fas fa-envelope fa-lg',
        })
    });
    $('.toastsDefaultFullImage').click(function () {
        $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            image: '../../dist/img/user3-128x128.jpg',
            imageAlt: 'User Picture',
        })
    });
    $('.toastsDefaultSuccess').click(function () {
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultInfo').click(function () {
        $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultWarning').click(function () {
        $(document).Toasts('create', {
            class: 'bg-warning',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultDanger').click(function () {
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultMaroon').click(function () {
        $(document).Toasts('create', {
            class: 'bg-maroon',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
});


$(document).on('click', '.toggle-password', function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});


$('#password-field, #password-confirm').on('keyup', function () {
    if ($('#password-field').val() === $('#password-confirm').val()) {
        $('#message').html('Tasdiqlandi').css('color', 'green');
    } else {
        $('#message').html('Parol mos kelmadi').css('color', 'red');
    }
});


$(document).ready(function () {
    $('.select2').select2({
        allowClear: true
    });

    $('#building_visit').on('change', function () {
        var buildingId = $(this).val();
        // alert(1)
        if (buildingId) {
            $.ajax({
                url: '/floors/' + buildingId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    $('#floor_visit').empty();
                    $('#floor_visit').append('<option value="">Qavatni tanlang</option>');
                    $.each(data, function (key, value) {
                        $('#floor_visit').append('<option value="' + value.id + '">' + value.number + ' qavat</option>');
                    });
                    $('#floor_visit').trigger('change');
                }
            });
        } else {
            $('#floor_visit').empty();
            $('#floor_visit').append('<option value="">Avval binoni tanlang</option>');
        }
    });

    $('#floor_visit').on('change', function () {
        var floorId = $(this).val();
        if (floorId) {
            $.ajax({
                url: '/rooms/getrooms/' + floorId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    $('#room_visit').empty();
                    $('#room_visit').append('<option value="">Qavatni tanlang</option>');
                    $.each(data, function (key, value) {
                        $('#room_visit').append('<option value="' + value.id + '">' + value.number + ' xona</option>');
                    });
                    $('#room_visit').trigger('change');
                }
            });
        } else {
            $('#room_visit').empty();
            $('#room_visit').append('<option value="">Avval qavatni tanlang</option>');
        }
    });


    $('#room_visit').on('change', function () {
        var roomId = $(this).val();
        if (roomId) {
            $.ajax({
                url: '/beds/' + roomId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                    $('#bed_visit').empty();
                    $('#bed_visit').append('<option value="">Qavatni tanlang</option>');
                    $.each(data, function (key, value) {
                        $('#bed_visit').append('<option value="' + value.id + '">' + value.number + ' joy</option>');
                    });
                    $('#bed_visit').trigger('change');
                }
            });
        } else {
            $('#bed_visit').empty();
            $('#bed_visit').append('<option value="">Avval xonani tanlang</option>');
        }
    });


    $(document).ready(function () {
        $('#arrive').datepicker({
            dateFormat: 'dd-mm-yy',
            defaultDate: "{{ old('arrive') }}"
        });
        $('#leave').datepicker({
            dateFormat: 'dd-mm-yy',
            defaultDate: "{{ old('leave') }}"
        });
    });


    if (localStorage.getItem('building')) {
        $('#building').val(localStorage.getItem('building')).trigger('change');
    }
    if (localStorage.getItem('floor')) {
        $('#floor').val(localStorage.getItem('floor'));
    }


    $('#building').on('change', function () {
        var buildingId = $(this).val();


        localStorage.setItem('building', buildingId);

        if (buildingId) {
            $('#floor').prop('disabled', false);
            updateFloors(buildingId);
        } else {
            $('#floor').prop('disabled', true).val('');
        }
    });


    $('#floor').on('change', function () {
        var floorId = $(this).val();


        localStorage.setItem('floor', floorId);
    });


    function updateFloors(buildingId) {
        // var floors = @json($floors)



        var selectedFloor = localStorage.getItem('floor');
        if (selectedFloor) {
            $('#floor').val(selectedFloor);
        }
    }


});


