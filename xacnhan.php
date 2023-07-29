<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/xacnhan.css">
</head>
<body>
    <form class="form">
        <span class="close">X</span>
        <div class="info">
        <span class="title">Two-Factor Verification</span>
      <p class="description">Enter the two-factor authentication code provided by the authenticator app </p>
         </div>
          <div class="input-fields">
          <input maxlength="1" type="tel" placeholder="">
          <input maxlength="1" type="tel" placeholder="">
          <input maxlength="1" type="tel" placeholder="">
          <input maxlength="1" type="tel" placeholder="">
        </div>
      
            <div class="action-btns">
              <a href="index1.php" class="verify">Verify</a>
              <a href="#" class="clear">Clear</a>
            </div>
      
      </form>
      <?php include "./model/footer.html" ?>
</body>
</html>