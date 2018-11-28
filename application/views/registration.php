<!DOCTYPE html>
<html>
<head>
<?php include("layouts/header.php") ?>
<title>Registration form</title>
<script src="<?php echo base_url();?>js/main.js"></script>
</head>
<body>
    <form id="formID" method="POST">
        <h1>Registration page</h1>
        <div class="container">
            
            <label for="uname"><b>Username</b></label>
            <div id="diUser" class="erMsg"></div>
            <input id="username" type="text" placeholder="username*" name=uname required>

            <label for="email"><b>Email</b></label>
            <div id="diemail" class="erMsg"></div>
            <input id="email" type="email" placeholder="email*" name=email required>
            
            
            <label for="mNum"><b>Mobile number</b></label>
            <div id="dimobile" class="erMsg"></div>
            <input id="mobile" type="text" placeholder="mobile number*" name=mNum required>

            
            <label for="password"><b>Password</b></label>
            <div id="diPassword" class="erMsg"></div>
            <input id="password" type="password" placeholder="password*" name=password required>

            <label for="rpassword"><b>Confirm Password</b></label>
            <div id="dirpassword" class="erMsg"></div>
            <input id="rpassword" type="password" placeholder="Confirm Password*" name=rpassword required>

            <button id="submit" type="button">submit</button>
            <div id="msg" class="erMsg"></div>
        </div>
    </form>    
</body>
</html>         