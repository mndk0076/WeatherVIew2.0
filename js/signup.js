$(document).ready(function () {
    $('form.ajax').on('submit', function () {
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
            url: 'library/addUser.php',
            data: data,
            success: function (response) {
                //$('#addUser').modal('hide');
                //window.location.href = 'library/addUser.php';
                //alertify.success('Successfully Added');
            },
            error: function (response) {
                //alertify.error('Something went wrong, Please try again later');
            }
        });
    });
    
     $('form.signin').on('submit', function () {
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
            url: 'library/login.php',
            data: data,
            success: function (response) {
                //$('#addUser').modal('hide');
                //window.location.href = 'library/login.php';
                //alertify.success('Successfully Added');
                console.log(response);
                if (response == "success") {
                    window.location.href = "views/weatherapp.php";
                } else {
                    alert("Wrong Details");
                }
            },
            error: function (response) {
                //alertify.error('Something went wrong, Please try again later');
            }
        });
    });
});