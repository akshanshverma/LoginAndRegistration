// function validate() {
//     debugger;
//     $('#formID').validate({
//         rules: {
//             username: 'required',
//             email: {
//                 required: true,
//                 email: true,
//             },
//             mobile: {
//                 required: true,
//                 length: 10,
//             },
//             password: {
//                 required: true,
//                 minlength: 8,
//             },
//             rpassword: {
//                 required: true,
//                 equalTo: '#password'
//             }
//         },
//         messages: {
//             username: 'user name required',
//             email: {
//                 required: 'email required',
//                 email: 'invalid email',
//             },
//             password: {
//                 required: 'password required',
//                 minlength: 'atleast 8 characters required'
//             },
//             rpassword: {
//                 required: 'password empty',
//                 equalTo: 'Passwords did not match'
//             }
//         }, errorPlacement: function (error, element) {
//             if (element.attr("name") == "uname")
//                 $("#diUser").html(error);
//             else if (element.attr("name") == "email")
//                 $("#diMail").html(error);
//             else if (element.attr("name") == "mNum")
//                 $("#diMobile").html(error);
//             else if (element.attr("name") == "password")
//                 $("#diPassword").html(error);
//             else if (element.attr("name") == "rpassword")
//                 $("#dirpassword").html(error);
//         },
//         submitHandler: function () {
//             $.ajax({
//                 type: 'POST',
//                 url: 'http://localhost/codeIgniter/register',
//                 dataType: 'json',
//                 data: {
//                     username: $('#username').val(),
//                     email: $('#email').val(),
//                     mobile: $('#mobile').val(),
//                     password: $('#password').val()
//                 }
//             });
//         }
//     });
// }

$(document).ready(function () {

    $('#submit').click(function (e) {
        debugger;
        e.preventDefault();
        var username = $('#username').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var password = $('#password').val();
        var rpassword = $('#rpassword').val();
        var b = true;

        if (username.length < 1) {
            $('#diUser').html("Enter user name");
            b = false;
        } else {
            $('#diUser').html("");
        }

        if (email.length < 1) {
            $('#diemail').html("Enter email");
            b = false;
        } else {
            var rgx = /^[a-z]+.+@.+.com/;
            if (!(rgx.test(email))) {
                $('#diemail').html("Enter valid email");
                b = false;
            } else {
                $('#diemail').html("");
            }
        }

        if (!(mobile.length == 10)) {
            $('#dimobile').html("Enter valid mobile number");
            b = false;
        } else {
            $('#dimobile').html("");
        }
        if (password.length < 8) {
            $('#diPassword').html("Enter minimum 8 characters");
            b = false;
        } else {
            $('#diPassword').html("");
        }
        if (password != rpassword) {
            $('#dirpassword').html("not same");
            b = false;
        } else {
            $('#dirpassword').html("");
        }

        if (!b) {
            return;
        }
        $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/codeIgniter/login/register',
                data: {
                    username: username,
                    email: email,
                    mobile: mobile,
                    password: password,
                    rpassword: rpassword
                },
                dataType: 'json',
                success: function (result) {
                    if (result == 'done') {
                        window.location.href = "http://localhost/codeIgniter/login";
                        alert('registre successfully');
                    } else {
                        $.each(result, function (key, value) {
                            $('#di'+key).html(value);
                            //alert('#di'+key+' '+ value);
                        });
                    }

                }
            });
    });
});
