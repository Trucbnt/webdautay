<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/forgot.css">
</head>
<body>
    <div class="form-container">
        <div class="logo-container">
          Forgot Password
        </div>
    
        <form class="form">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" required="">
          </div>
    
          <button class="form-submit-btn" type="submit"><a href="xacnhan.php" class="submit">Send Email</a></button>
        </form>
        <p class="signup-link">
          Don't have an account?
          <a href="#" class="signup-link link"> Sign up now</a>
        </p>
      </div>
      <?php include "./model/footer.html" ?>
</body>
</html>