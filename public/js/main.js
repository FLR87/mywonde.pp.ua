$('#search-news').on('submit', function (e) {
    e.preventDefault();
    var form = $(this);
    var data = form.serialize();
    $.ajax({
        url: form.attr('action'),
        method: 'GET',
        data: data,
        success: function (response) {
            var new_blog = $(response).find('.column-three-qtr').html();
            $('.column-three-qtr').html(new_blog);
        }
    })
})