jQuery(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".action_like").click(function () {

        var btn = $(this);
        var post = parseInt($(this).attr("data-my-post"));
        var state = $(this).attr("data-my-state");

        if(post > 0 && (state == 'up' || state == 'down')){
            $.ajax({
                url: '/like',
                type: 'POST',
                data:{
                    post: post,
                    state: state
                },
                dataType: 'json',
                success: function(data) {
                    btn.parent().find('.response').text(data.respons);
                    if(data.like != 'zero'){
                        btn.parent().find('span.like').text(data.like);
                    }
                    if(data.dislike != 'zero'){
                        btn.parent().find('span.dislike').text(data.dislike);
                    }
                    setTimeout(function(){
                        btn.parent().find('.response').text('');
                    }, 3000);
                }
            });
            return true;
        }
        alert('Error');

    });

});