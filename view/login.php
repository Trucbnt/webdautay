<?php 
$err = "";
if(isset($_GET['error'])){
    $err = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    <?php include '../css/login.css' ?>
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <form class="form_main" action="../model/processLogin.php" id="formLogin" method="POST">
        <p class="heading">Login</p>
        <div class="form__group <?php echo $cls ?>">
            <div class="wrap__input-icon">
                <i class="fa-solid fa-user form__icon"></i>
                <input placeholder="   Account" id="account" class="form_input" type="text" name="account" value="">
            </div>
            <span class="form-message"></span>
        </div>
        <div class="form__group">
            <div class="wrap__input-icon">
                <i class="fa-solid fa-key form__icon"></i>
                <input placeholder="  Password" id="password" class="form_input" type="password" name="password" value="">
            </div>
            <span class="form-message"></span>
        </div>
        <span class="message_err"><?php echo $err ?></span>
        <button id="button" name="hello" type="submit">Submit</button>
        <div class="signupContainer">
            <a href="forgot.php">Quên mật khẩu ?</a>
            <div class="form__text">
                Have an Account ? <a href="http://localhost/projectMini/view/signup.php">SIGN UP</a>
            </div>
        </div>
    </form>
</body>
<script src="../js/validator.js"></script>
<script>
</script>
<script>
    Validator({
        form: "#formLogin",
        errorSelector: ".form-message",
        formGroup: ".form__group",
        rules: [
            Validator.isRequired("#account"),
            Validator.isSpecialChar("#account"),
            Validator.isPassword("#account", 5),
            Validator.isRequired("#password"),
            Validator.isPassword("#password", 5),
            Validator.isSpecialChar("#password")
        ]
    });
</script>
</html>