jQuery(document).ready(function($) {

    $('.commentlist li').each(function (i) {
        $(this).find('div.commentNumber').text('#' + (i+1));
    });

    $('#commentform').on('click','#submit', function (e) {
        e.preventDefault();
        var comParent = $('#commentform');

        $('.wrap_result').
            css('color','green').
            text('Saving comment...').
            fadeIn(500,function () {
                var data = comParent.serializeArray();
                $.ajax({
                    url:$('#commentform').attr('action'),
                    data:data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'POST',
                    datatype:'JSON',
                    success: function (html) {
                        if(html.error) {
                            $('.wrap_result').css('color','red').append('<br/><strong>Error:</strong><br/>' + html.error.join('<br/>'));
                            $('.wrap_result').delay(2000).fadeOut(500);
                        }
                        else if(html.success) {
                            $('.wrap_result')
                                .append('<br/><strong>Saved!</strong></strong>')
                                .delay(2000)
                                .fadeOut(500, function () {
                                    if(html.data.parent_id > 0) {
                                        comParent.parents('div#respond').prev().after('<ul class="children">' + html.comment + '</ul>');
                                    }
                                    else {
                                        if($.contains($('#comments')[0],$('.commentlist')[0])) {
                                            $('ol.commentlist').append(html.comment);
                                        }
                                        else {
                                            $('#trackbacks').before('<ol class="commentlist group">' + html.comment + '</ol>');
                                        }
                                    }
                                    $('#cancel-comment-reply-link').click();
                                });
                        }
                    },
                    error: function () {
                        $('.wrap_result').css('color','red').append('<br/><strong>Error:</strong>');
                        $('.wrap_result').delay(2000).fadeOut(500, function () {
                            $('#cancel-comment-reply-link').click();
                        });
                    }
                });
            });
    });

});