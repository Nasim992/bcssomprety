$(".p-viewer").on('click', function() {
    if ($(".password").attr('type') === 'password') {
        $(".password").attr('type', 'text');
    } else {
        $(".password").attr('type', 'password');
    }
});

$(".p-viewer2").on('click', function() {
    if ($(".confirm_password").attr('type') === 'password') {
        $(".confirm_password").attr('type', 'text');
    } else {
        $(".confirm_password").attr('type', 'password');
    }
});

$(".p-viewer3").on('click', function() {
    if ($(".current_password").attr('type') === 'password') {
        $(".current_password").attr('type', 'text');
    } else {
        $(".current_password").attr('type', 'password');
    }
});

$("#addModelTestImage").on('click', function() {
    if (this.checked) {
        $('.model_test_image').show();
    } else {
        $('.model_test_image').hide();
    }
});

$("#addFeeForModelTest").on('click', function() {
    if (this.checked) {
        $('.model_test_fee').show();
    }
});

$("#removeFeeForModelTest").on('click', function() {
    if (this.checked) {
        $('.model_test_fee').hide();
    }
});

$("#addNegativeMark").on('click', function() {
    if (this.checked) {
        $('.negativeMark').show();
    }
});

$("#removeNegativeMark").on('click', function() {
    if (this.checked) {
        $('.negativeMark').hide();
    }
});

$(".start_exam_btn").on('click', function() {
    $('.start_exam_btn').hide();
    $('.exam_script').show();
    $('.exam_timer').show();

    let min = parseInt(document.getElementById('exam_duration').getAttribute('data-value'));
    let totalSec = min * 60 * 1000;
    let intervalVar = setInterval(intervalTimer, 1000);

    min--;

    function intervalTimer() {
        totalSec--;
        let sec = totalSec % 60;
        if (totalSec == 0) {
            clearInterval(intervalVar);
        }
        document.getElementById("mins").innerHTML = min;
        document.getElementById("secs").innerHTML = sec;
        if (sec == 0) {
            min--;
        }
    }

    setTimeout(function() {
        document.getElementById('new_model_test_form').submit();
    }, totalSec);
});

$('.transaction_approved').on('click', function() {
    let id = (this).dataset.id;
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: `pending_transactions`,
        data: {
            status: "approved",
            id: id
        },
        error: function(data) {
            alert("Transaction not approved!");
        },
        success: function(data) {
            $(`#t_id_${id}`).html(
                `<strong> Approved </strong>`
            );
        }
    });
});

$('.transaction_rejected').on('click', function() {
    let id = (this).dataset.id;
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: `pending_transactions`,
        data: {
            status: "rejected",
            id: id
        },
        error: function(data) {
            alert("Transaction not rejected!");
        },
        success: function(data) {
            $(`#t_id_${id}`).html(
                `<strong> Rejected </strong>`
            );
        }
    });
});

$(".advance_btn").on('click', function() {
    $('.advance_option').show();
});

$(".question_modal_btn").on('click', function() {
    $('.form-popup').hide();
});