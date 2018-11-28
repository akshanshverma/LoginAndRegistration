function validate() {
    debugger;
    $('#formID').validate({
        rules: {
            username: 'required',
            email: {
                required: true,
                email: true,
            },
            mobile: {
                required: true,
                length: 10,
            },
            password: {
                required: true,
                minlength: 8,
            },
            rpassword: {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            username: 'user name required',
            email: {
                required: 'email required',
                email: 'invalid email',
            },
            password: {
                required: 'password required',
                minlength: 'atleast 8 characters required'
            },
            rpassword: {
                required: 'password empty',
                equalTo: 'Passwords did not match'
            }
        }, errorPlacement: function (error, element) {
            if (element.attr("name") == "uname")
                $("#diUser").html(error);
            else if (element.attr("name") == "email")
                $("#diMail").html(error);
            else if (element.attr("name") == "mNum")
                $("#diMobile").html(error);
            else if (element.attr("name") == "password")
                $("#diPassword").html(error);
            else if (element.attr("name") == "rpassword")
                $("#dirpassword").html(error);
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                url: 'http://localhost/codeIgniter/register',
                dataType: 'json',
                data: {
                    username: $('#username').val(),
                    email: $('#email').val(),
                    mobile: $('#mobile').val(),
                    password: $('#password').val()
                }
            });
        }
    });
}