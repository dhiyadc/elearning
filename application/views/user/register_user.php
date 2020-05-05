<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>E-Learning - Register User</title>

  <!-- Favicons -->
  <link href="<?= base_url(); ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?= base_url(); ?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assets/css/style_admin.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/password_verif.css">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="<?= base_url() ?>register/register_process" method="post">
        <h2 class="form-login-heading">Register</h2>
        <div class="login-wrap">
        <?php
              if (isset($logout_message)) {
              echo "<div class='message'>";
              echo $logout_message;
              echo "</div>";
              }
            ?>
            <?php
              if (isset($message_display)) {
              echo "<div class='message'>";
              echo $message_display;
              echo "</div>";
              }
            ?>
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
            echo $error_message;
            }
            //echo validation_errors();
            echo "</div>";
          ?>
          <input type="email" class="form-control" name="email" placeholder="Email" oninvalid="this.setCustomValidity('Please enter a valid email address')"
    oninput="this.setCustomValidity('')" autofocus required>
          <br>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <br>
          <button class="btn btn-theme btn-block" value="login" type="submit"><i class="fa fa-lock"></i> Register</button>
          
          
          
        </div>
        
      </form>
      <a href="<?= base_url(); ?>login"><h2>Back to login</h2></a>
      <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?= base_url(); ?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="<?= base_url(); ?>assets/lib/jquery.backstretch.min.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
  <script>
    $.backstretch("<?= base_url(); ?>assets/img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
