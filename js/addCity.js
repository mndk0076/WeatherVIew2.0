$('form.addCity').on('submit', function () {
    $(this).unbind();
    var that = $(this),
        data = {};

    that.find('[name]').each(function (index, value) {
        var form = $(this),
            name = form.attr('name');
        value = form.val();
        data[name] = value;
        console.log(data);
    });

    $.ajax({
        type: 'POST',
        url: '../library/addCity.php',
        data: data,
        success: function (response) {
            console.log(response);

            //$('#addUser').modal('hide');
            //window.location.href = 'library/addUser.php';
            //alertify.success('Successfully Added');
        },
        error: function (response) {
            //alertify.error('Something went wrong, Please try again later');
        }
    });
});