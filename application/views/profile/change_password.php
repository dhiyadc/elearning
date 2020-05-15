<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete My Profile</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/password_verif.css">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <form action="<?= base_url()?>profile/change_password_action" method="POST">
            <?php
              if (isset($message_display)) {
              echo "<div class='message'>";
              echo $message_display;
              echo "</div>";
              }
            ?>
            
            Old Password: <input type="password" name="old_password" id="" placeholder="Old Password" required>
            <br>
            New Password: <input type="password" class="form-control" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <br>
            Confirm New Password: <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <button type="submit">Save</button>
    </form>
    <a href="<?= base_url(); ?>profile">Back to profile</a>
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
      <div id="message2">
      <p id="match" class="invalid">Password doesn't match</p>
      </div>
</body>

<script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
</html>