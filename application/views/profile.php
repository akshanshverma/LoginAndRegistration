<html>
<head>
<?php include("layouts/header.php") ?>
</head>
<?php
if (isset($this->session->userdata['logged_in'])) {
    $data = $this->session->userdata('logged_in');
    $username = $data['username'];
    $email = $data['email'];
    $mobile = $data['mobile'];
} else {
    echo "no data";
    exit;
}
?>
<script>
$(document).ready(function () {
    $('#logoutBtn').click(function (e) {
        $.ajax({
            url: 'http://localhost/codeIgniter/login/logout',
            dataType: 'json',
            success: function (result) {
                if (result == 'yes') {
                    window.location.href="http://localhost/codeIgniter/login";
                    alert('Logout successfully'); 
                }
            }
        });
    });
});
</script>
<body id="proBody">
    <form id="proForm">
        <div id="userNm">user name: <?php echo $username ?></div>
        <div id="userEm">email id: <?php echo $email ?></div>
        <div id="userMb">mobile number: <?php echo $mobile ?></div>
    </form>
    <button id="logoutBtn">logout </button>
</body>
</html>