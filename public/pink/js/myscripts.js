jQuery(document).ready(function($) {

    $('.commentlist li').each(function (i) {
        $(this).find('div.commentNumber').text('#' + (i+1));
    });

    $('#commentform').on('click','#submit', function (e) {
        e.preventDefault();
        var comParent = $('#commentform');

        $('.wrap_result').
            css('color','green').
            text('Save comment').
            fadeIn(500,function () {
                var data = comParent.serializeArray();
                $.ajax({
                    url:$('#commentform').attr('action'),
                    data:data,
                    type:'POST',
                    datatype:'JSON',
                    success: function () {
                        
                    },
                    error: function () {
                        
                    }
                });
            });
    });


});