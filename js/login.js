$(document).ready(function () {
    $('#loginBtn').click(function (e) {
        debugger;
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        var b = true;

        if (email.length < 1) {
            $('#diMail').html("Enter email");
            b = false;
        } else {
            var rgx = /^[a-z]+.+@.+.com/;
            if (!(rgx.test(email))) {
                $('#diMail').html("Enter valid email");
                b = false;
            } else {
                $('#diMail').html("");
            }
        }

        if (password.length < 8) {
            $('#diPassword').html("Enter minimum 8 characters");
            b = false;
        } else {
            $('#diPassword').html("");
        }

        if (!b) {
            return;
        }

        $.ajax({
            type: 'POST',
            url: 'http://localhost/codeIgniter/login/showData',
            data: {
                email: email,
                password: password
            },
            dataType: 'json',
            success: function (result) {
                if (result == 'yes') {
                    window.location.href="http://localhost/codeIgniter/login/loggedin";
                    $('#msg').html('');
                    alert('Login successfully');
                    
                } else {
                    $('#msg').html('**invalid email or password**');
                    //alert('Login unsuccessfully');               
                }
            }
        });
    });
});