$(document).ready(function () {
    $('#dncallback_add').unbind('click').on('click', function (event) {
        console.log('click');
        event.preventDefault();
        var data = {
            'ajax': true,
            'type': 'callback',
            'current_url': $('#dncallback_current_url').val(),
            'phone': $('#dncallback_phone').val(),
            'name': $('#dncallback_name').val()
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: urlDnCallbackController,
            data: data,
            success: function (response) {
                var response = JSON.parse(response);
                if (response.result) {
                    $("#dncallback_add").after('<div class="success">Отправлено</div>');
                } else {
                    $("#dncallback_add").after('<div class="error">Ошибка</div>');
                }
            }
        });
    });
    $('#dncallback_question_add').unbind('click').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: urlDnCallbackController,
            data: {
                'ajax': true,
                'type': 'question',
                'current_url': $('#dncallback_question_current_url').val(),
                'email': $('#dncallback_question_email').val(),
                'phone': $('#dncallback_question_phone').val(),
                'name': $('#dncallback_question_name').val(),
                'question': $('#dncallback_question_question').val()
            },
            success: function (response) {
                var response = JSON.parse(response);
                if (response.result) {
                    $("#dncallback_question_add").after('<div class="success">Отправлено</div>');
                } else {
                    $("#dncallback_question_add").after('<div class="error">Ошибка</div>');
                }
            }
        });
    });
});