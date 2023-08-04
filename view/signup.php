<?php 
$err=$account=$password =  "";
if(isset($_GET['messErr'])){
    $cls ="invalid";
    $err = $_GET['messErr'];
    $account = $_GET['account'];
    $password = $_GET['password'];
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        <?php include "../css/login.css"  ?>
    </style>
</head>

<body>
    <form class="form_main" action="../model/processSignup.php" id="formSignup" method="POST">
        <p class="heading">Register</p>
        <div class="form__group <?php echo $cls ?>">
            <div class="wrap__input-icon">
                <i class="fa-solid fa-user form__icon"></i>
                <input placeholder="   Account" id="account" class="form_input" type="text" name="account" value="<?php echo $account ?>">
            </div>

            <span class="form-message"><?php echo $err ?></span>
        </div>
        <div class="form__group">
            <div class="wrap__input-icon">
                <i class="fa-solid fa-key form__icon"></i>
                <input placeholder="  Password" id="password" class="form_input" type="password" name="password" value="<?php echo $password ?>">
            </div>

            <span class="form-message"></span>
        </div>
        <div class="form__group">
            <div class="wrap__input-icon">
                <i class="fa-solid fa-key form__icon"></i>
                <input placeholder="  Password Comfirm" id="Confirm_Password" class="form_input" type="password" name="passwordComfirm" value="<?php echo $password ?>">
            </div>

            <span class="form-message"></span>
        </div>
        <button id="button" name="btnSubmit" type="submit">Submit</button>
        <div class="signupContainer">
            <a href="forgot.php">Quên mật khẩu ?</a>
            <div class="form__text">
                Have an Account ?  <a href="http://localhost/projectMini/view/login.php"> LOGIN</a>
            </div>
        </div>
    </form>
</body>
<script src="../js/validator.js"></script>
<script>
</script>
<script>
    Validator({
        form: "#formSignup",
        errorSelector: ".form-message",
        formGroup: ".form__group",
        rules: [
            Validator.isRequired("#account"),
            Validator.isSpecialChar("#account"),
            Validator.isPassword("#account", 5),
            Validator.isRequired("#password"),
            Validator.isPassword("#password", 5),
            Validator.isSpecialChar("#password"),
            Validator.isRequired("#Confirm_Password"),
            Validator.confirmPassword("#Confirm_Password", function() {
                return document.querySelector("#formSignup #password");
            })
        ]
    });
</script>

</html>