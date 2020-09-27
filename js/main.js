$(document).ready(function () {
    $('#limit').on('change', function () {
        var elem = $(this);

        if (elem.prop('checked')) {
            $('.lifetime_select').show().children(':first').prop('selected', true);
        } else {
            $('.lifetime_select').hide().children().prop('selected', false)
        }
    });

    $(document).on('click', '#minimaze', function () {
        var url = $('#input_url').val();
        var limit_elem = $('#limit');
        var lifetime = '';

        if (limit_elem.prop('checked')) {
            lifetime = $('.lifetime_select').children(':selected').val();
        }
        $.ajax( {
            url: "/minify",
            type: 'post',
            data: {
                url: url,
                lifetime: lifetime
            },
            dataType: 'json',
            success: function(data) {
                if(data.error) {
                    $('.error').text(data.error).show();
                } else if(data.url) {
                    $('.error').hide();
                    $('#input_url').addClass('hidden');
                    $('#result_url').removeClass('hidden').val(data.url).focus();
                    $('#minimaze').addClass('hidden');
                    $('#copy').removeClass('hidden');
                }
            }
        } );
    });

    $(document).on('click', '#copy', function () {
        var copyText = document.getElementById("result_url");
        copyText.select();
        document.execCommand('copy');
        document.getSelection().removeAllRanges();
        $('#result_url').addClass('green').blur();
    });

    $(document).on('click', '#statistic', function () {
        var url = $('#result_url').val();
        if(url.length > 0) {
            $('[name="url"]').val(url).prop('disabled', false);
        }
        $('#stat_form').submit();
    });
});