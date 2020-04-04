$(document).ready(function() {
    $('#load-more-button').on('click', function() {
        var _this = $(this);
        var page = parseInt(_this.attr('data-page'));
        var lastPage = parseInt(_this.attr('data-last_page'));

        if (page > lastPage) {
            _this.fadeOut("normal", function() {
                _this.remove();
            });

            return false;
        }

        $.ajax({
            url: '/',
            type: 'GET',
            data: { 'page': page },
            success: function(result) {
                $('#load-more-button').attr('data-page', page + 1);
                $('.container-post').fadeIn("normal", function() {
                    $('.container-post').append(result);
                });
            },
            error: function() {
                window.location.reload();
            }
        });
    });
});
