<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>E-Learning - Login User</title>
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="<?= base_url() ?>admin/admin_login_process" method="post">
        <h2 class="form-login-heading">Admin login</h2>
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
          <input type="email" class="form-control" name="email" placeholder="Email" autofocus required>
          <br>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <br>
          <button class="btn btn-theme btn-block" value="login" type="submit"><i class="fa fa-lock"></i> Login</button>

        </div>
        
      </form>
    </div>
  </div>

</body>

</html>
