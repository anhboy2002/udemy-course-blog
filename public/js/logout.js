$(document).on('click', '#logout-span', function (e) {
    var token = $('meta[name="csrf-token"]').attr('content');
    console.log(token);
    var options = {
        type: 'POST',
        data: {
            _token: token
        },
        url: '/logout',
        success: function success() {
            location.reload();
        },
        error: function error(err) {
            console.log(err);
        }
    };
    console.log(options);
    e.preventDefault();
    $.ajax(options);
});