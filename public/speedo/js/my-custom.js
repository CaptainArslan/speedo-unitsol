

function loadingStart(title = null) {
    return new swal({
        title: title ? title : 'Loading',
        allowEscapeKey: false,
        allowOutsideClick: false,
        onOpen: () => {
            swal.showLoading()
        }
    });
}
function showPopup(title, content) {
    // $("#us-popup-heading").html(title);
    // $("#us-popup-content").html(content);
    // $("#welcome-container-bg").show();
    $('#popup').html("<div class='welcome-container-bg' id='welcome-container-bg'>" +
        "<div class='us-welcome-container'>" +
        "<h3 class='us-popup-heading text-success ' id='us-popup-heading'>" + title + "</h3>" +
        "<p class='us-popup-content' id='us-popup-content'>" + content + "</p>" +
        "<div class='us-cmd-ok'>" +
        "<button type='button' class='us-cmd-ok' onclick='hidePopup(event)'style='background-color: #0074fe;border: none;'>Okay</button>" +
        "</div>" +
        "</div>" +
        "</div>");

}

function loadingStop() {
    swal.close()
}

function showSuccess(title) {
    NioApp.Toast(title, 'success', {
        position: 'top-right',
        fadeAway: 2000
    });
}

function showWarn(title) {
    NioApp.Toast(title, 'error', {
        position: 'top-right',
        fadeAway: 2000

    });
}

function deleteRecordAjax(url) {

    return new swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value == true) {
            $.ajax({
                type: 'DELETE',
                url: url,
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    showSuccess('Record Deleted Successfully.');
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                },
                error: function (error) {
                    let message = 'Network error';
                    if (error.responseJSON) {
                        message = error.responseJSON.message
                    }
                    showWarn(message)
                }
            });
        }
    });
}

function addFormData(e, method, url, redirectUrl, data) {
    loadingStart()

    let from = document.getElementById(data);
    console.log(from)
    let record = new FormData(from)
    if ($('.note-editable').html() != '') {
        record.append('descriptions', $('.note-editable').html())
    }
    e.preventDefault()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: method,
        url: url,
        data: record,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            loadingStop()
            $(':input', data)
                .not(':button, :submit, :reset, :hidden')
                .val('')
            if ($('.upload-zone')[0] != undefined) {
                $('.upload-zone')[0].dropzone.removeAllFiles(true)
            }
            if (response.status != false) {
                showSuccess(response.message, 'success')

                setTimeout(function () {
                    window.location = redirectUrl;
                }, 1000);
            } else {
                showWarn(response.message, 'error');
            }

        },
        error: function (xhr) {
            loadingStop()
            console.log((xhr.responseJSON.errors));
            let data = '';
            $.each(xhr.responseJSON.errors, function (key, value) {
                data += '</br>' + value
            })
            showWarn(data)

        }
    });

}
function addFormDataParent(e, method, url, redirectUrl, data) {
    loadingStart()
    let from = document.getElementById(data);
    console.log(from)
    let record = new FormData(from)
    e.preventDefault()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: method,
        url: url,
        data: record,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            loadingStop()
            if (response.url != undefined) {
                window.location.href = response.url;
            } else {
                showPopup('Congratulations!', response.message)
            }
            $(':input', data)
                .not(':button, :submit, :reset, :hidden')
                .val('')
            if ($('.upload-zone')[0] != undefined) {
                $('.upload-zone')[0].dropzone.removeAllFiles(true)
            }
            // hidePopup(redirectUrl)

        },
        error: function (xhr) {
            loadingStop()
            console.log((xhr.responseJSON.errors));
            let data = '';
            $.each(xhr.responseJSON.errors, function (key, value) {
                data += '</br>' + value
            })
            showWarn(data)

        }
    });

}
var venue;
$("#venue").on('change', function (e) {
    window.venue = $(this).find(':selected').attr('location');
    console.log(window.venue);
    e.preventDefault();
});
function filterTerm(e, method, url, data) {
    loadingStart()
    let urlParam = new URLSearchParams(window.location.search);
    let query = urlParam.get('q');
    let from = document.getElementById(data);
    let record = new FormData(from);
    record.append('q', query)
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: method,
        url: url,
        data: record,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            let data = [];
            let day = [];
            let timing = [];
            let class_type = [];
            // data=[];

            // $('.custom-checkbox  input:checked').each(function() {
            //     if($(this).attr('day') !=undefined){
            //         data.push($(this).attr('day'));
            //     }
            // });
            // $('.timings  input:checked').each(function() {
            //     if($(this).attr('timing') !=undefined){
            //         data.push($(this).attr('timing'));
            //     }
            // });
            // $('.class_types  input:checked').each(function() {
            //     if ($(this).attr('class_type') != undefined) {
            //         data.push($(this).attr('class_type'));
            //     }
            // });
            // $('.swimming_class  input:checked').each(function() {
            //     if($(this).attr('swimming_class') !=undefined){
            //         data.push($(this).attr('swimming_class'));
            //     }
            // });
            if (window.venue != undefined) {
                data.push(window.venue);
            }

            console.log(window.venue);
            console.log('records', data);
            loadingStop();
            $("#badge").html('');
            $.each(data, function (key, value) {

                $("#badge").append("<span id='span" + key + "' onclick='removeBage(" + key + ")' class='badge filter-badge px-2 rounded-pill py-1 mr-2 text-capitalize float-right badge-secondary'>" + value + "<i role='button' aria-hidden='true' class='fa fa-times'></i></span>");
            });
            $('#filter-term').html();
            $('#filter-term').html(response);
        },
        error: function (xhr) {
            let data = '';

            $.each(xhr.responseJSON.errors, function (key, value) {
                data += '</br>' + value;
            })
            showWarn(data);

        }
    });

}

function removeBage(data) {
    console.log(data);
    $('#span' + data).remove();
    $('#venue').val('');
}
function removeAllBage() {

    $('#class_type_select2').val('').change();
    $('#day_select2').val('').change();
    $('#term_select2').val('').change();
    $('#class_select2').val('').change();
    $('#venue_select2').val('').change();
    // $('#badge').html("");
    location.reload();
}
function scheduleClass(e, url) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: url + '/' + e.target.value,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('#subscription').html('')
            $('#subscription').html(response)
        },
    });
}
function addToCart(e, url) {
    loadingStart()
    let venue_id = $('venue').val();
    let classes = $('swimming_class').val();
    let class_types = $('swimming_class').val();
    let size = $('input[name=sizeCheck]:checked').val() != undefined ? $('input[name=sizeCheck]:checked').val() : null;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: url,
        data: { size: size },
        // contentType: false,
        // cache: false,
        // processData: false,
        success: function (response) {
            loadingStop()
            if (response.status != false) {
                showSuccess('Cart Add Successfully', 'success')
                $('#cart_detail').html('');
                $('#cart_detail').html(response);
                $('#cartView').modal('show')
                $('.modal_close').modal('hide')
            } else {
                showWarn(response.message, 'error');
            }
        },
    });
}
function cartDelete(e, url, rowid) {
    loadingStart()
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        data: { rowId: rowid },
        success: function (response) {
            loadingStop()
            showSuccess('Cart Delete Successfully', 'success')
            $('#cart_detail').html('');
            $('#cart_detail').html(response);
            $('#cartView').modal('hide')
        }
    });
}
function adminCartDelete(e, url, rowid) {
    loadingStart()
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        data: { rowId: rowid },
        success: function (response) {
            loadingStop();
            showSuccess('Cart Delete Successfully', 'success');
            $('#cart_detail').html('');
            $("#cart_detail").html(response);
        }
    });
}
function emptyCart(e, url, rowid) {
    loadingStart()

    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        success: function (response) {
            loadingStop()

            showSuccess(response.message, 'success')
            setTimeout(function () {
                window.location.href = response.url;
            }, 1500);
        }
    });

}
function adminEmptyCart(e, url) {
    loadingStart()

    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        success: function (response) {
            loadingStop()
            showSuccess(response.message, 'success')
            setTimeout(function () {
                window.location.href = response.url;
            }, 1500);
        }
    });

}
function quantityUpdate(el, e, url, id) {
    if (el.value != "") {
        if (parseInt(el.value) < parseInt(el.min)) {
            el.value = el.min;
        }
        if (parseInt(el.value) > parseInt(el.max)) {
            el.value = el.max;
        }
    }
    e.preventDefault();
    // var data = "CartId=" + id + "&buttonId=" + buttonId + "&qty=" + qty;
    // alert(1)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        data: {
            CartId: id,
            qty: e.target.value,
        },
        success: function (response) {
            showSuccess(response.message, 'success')
            setTimeout(function () {
                location.reload()
            }, 1500)
        }
    });



}
function saveActivityLog(e, url) {

    e.preventDefault();
    console.log(e.target.value)
    // var data = "CartId=" + id + "&buttonId=" + buttonId + "&qty=" + qty;
    // alert(1)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        data: {
            activity_log: e.target.value,
        },
        success: function (response) {
            showSuccess(response.message, 'success')
            setTimeout(function () {
                location.reload()
            }, 1500)
        }
    });



}
function studentDetail(e, url) {
    let active = $('.active');
    active.removeClass('active');
    $(e.target.parentNode).addClass('active')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: url,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            // e.addClass('active');
            $('#student-detail').html('')
            $('#student-detail').html(response)
            // location.reload()
        },
    });
}
function sessionAttendance(e, url) {
    let targetValue = e.target;
    let class_id = $(targetValue).attr('class_id');
    let status = $(targetValue).attr('status');
    let class_type = $(targetValue).attr('class_type');
    let date = $(targetValue).attr('date');

    console.log(class_id, class_type, status);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        data: {
            date: date,
            class_type: class_type,
            class_id: class_id,
            status: status,
        },
        success: function (response) {
            showSuccess(response.message, 'success');
            setTimeout(function () {
                location.reload()
            }, 1500);
        },
    });
}
function searchProduct(e, url) {
    let name = e.target.value;
    console.log(name);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        data: {
            name: name,
        },
        success: function (response) {
            $("#filter-product").html();
            $("#filter-product").html(response);
        },
    });
}

// function checkPromoCode(e, url) {
//     let code=$("#promo-code").val();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         url: url,
//         method: "post",
//         data: {
//             code: code,
//         },
//         success: function (response) {
//             let total=$('#totalCart').val();
//             if(response.data != undefined){
//                 let discount=( parseInt(total)*response.data)/100;
//                 console.log(discount);
//                 let tolat_price=total-discount;
//                 $('#discount').html('');
//                 $('#discount').html(response.data+'%');
//                 total=$('#total').html('');
//                 total=$('#total').html('AED'+tolat_price);
//             }
//            if(response.data == undefined){
//             showWarn(response.message, 'error')
//            }
//         },
//     });
// }

function assessmentRequest(e, url) {
    loadingStart()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        success: function (response) {
            loadingStop()
            showSuccess(response.message, 'success');
            setTimeout(function () {
                location.reload()
            }, 1500);
        },
    });
}
function checkSlots(e, url) {
    loadingStart()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url + '/' + e.target.value,
        method: "post",
        success: function (response) {
            loadingStop()
            $('#slots').val(response.available_slot);
        },
    });
}
function getTiming(e, url, term_base_booking_id) {
    loadingStart()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url + '/' + e.target.value,
        method: "post",
        data: { 'term_base_booking_id': term_base_booking_id },
        success: function (response) {
            loadingStop()
            $('#timings').html(response);
        },
    });
}
function changeAssessmentStatus(e, url) {
    let status = e.target.value;
    console.log(status);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: url,
        data: {
            status: status,
        },
        success: function (response) {
            if (response.status != false) {
                showSuccess(response.message, 'success')
                setTimeout(function () {
                    location.reload();
                }, 1000);

            } else {
                showWarn(response.message, 'error');
            }
        },
    });
}
function addStudentCredit(e, url, data) {
    loadingStart()
    let from = document.getElementById(data);
    console.log(from)
    let record = new FormData(from);
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: url,
        data: record,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            loadingStop()
            if (response.status != false) {
                showSuccess(response.message, 'success')
                setTimeout(function () {
                    location.reload();
                }, 1000);

            } else {
                showWarn(response.message, 'error');
            }
        },
    });
}

function acceptRequest(e, url) {
    console.log(status);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: url,
        success: function (response) {
            if (response.status != false) {
                showSuccess(response.message, 'success')
                setTimeout(function () {
                    location.reload();
                }, 1000);

            } else {
                showWarn(response.message, 'error');
            }
        },
    });
}

function changeStatus(e, id, student_id) {
    e.preventDefault();
    let status = e.target.value;
    if (status == 'Enroll Now') {
        window.location.href = 'admin/students/' + student_id;
    } else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'admin/change_assessment_status/' + student_id,
            method: 'post',
            data: {
                status: status,
            },
            success: function (response) {
                console.log(response.total);
                showSuccess(response.message, 'success')
                setTimeout(function () {
                    location.reload();
                }, 1500)
            }
        });

    }

}
function checkClassByDate(e, url) {
    e.preventDefault();
    let date = e.target.value;
    console.log(date)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: 'post',
        data: {
            date: date,
        },
        success: function (response) {
            console.log(response);
            $('#class_by_date').html('');
            $('#class_by_date').html(response);
        }
    });


}
function termBaseBookingApproved(e, url) {
    e.preventDefault();
    if (e.target.value == 1) {
        is_approve = 0;
    } else {
        is_approve = 1;

    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: 'post',
        data: {
            is_approve: is_approve,
        },
        success: function (response) {
            showSuccess(response.message, 'success')
            setTimeout(function () {
                location.reload();
            }, 1500)
        }
    });


}
function copyTerm(e, url) {
    // loadingStart();
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: 'post',
        success: function (response) {
            loadingStop();
            showSuccess(response.message, 'success')
            setTimeout(function () {
                location.reload();
            }, 1500)
        }
    });


}
function getArea(e, url) {
    let emirate_id = e.target.value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        data: {
            emirate_id: emirate_id,
        },
        success: function (response) {
            $("#addArea").html();
            $("#addArea").html(response);
        },
    });
}

function selectTerm(e, url) {
    let term_id = e.target.value;
    console.log(name);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "post",
        data: {
            term_id: term_id,
        },
        success: function (response) {
            $("#termDetail").removeClass('d-none');
            $("#termDetail").html();
            $("#days").val('').change();
            $("#term_no_of_class").val('');
            $("#discount").val('');
            $("#term_total").val('');
            $("#termDetail").html(response);
        },
    });
}