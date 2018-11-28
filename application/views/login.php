
<!DOCTYPE html>
<html>

<head>
<?php include("layouts/header.php") ?>
</head>
<script src="<?php echo base_url();?>js/login.js"></script>

<body>
    <form id="lgformID" method="POST">
        <h1>Login</h1>
        <div class="container" >
            
            <label for="email"><b>Email</b></label>
            <div id="diMail" class="erMsg"></div>
            <input id="email" type="email" placeholder="email*" name=email required>

            
            <label for="password"><b>Password</b></label>
            <div id="diPassword" class="erMsg"></div>
            <input id="password" type="password" placeholder="Enter Password" >

            <button  type="submit" id="loginBtn">Login</button>
            
            <span class="reg">New User? <a href="<?php echo base_url() ?>register">register</a></span>
            <span class="psw">Forgot <a href="#">password?</a></span>
            <div id="msg" class="erMsg"></div>
        </div>
    </form>
</body>
</html>
