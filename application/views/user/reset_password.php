<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/password_verif.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px;">
        <form action="<?= base_url(); ?>reset_password/request" method='post'>
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
<!-- 
                <input class="form-control" id="email" placeholder="Your Email Address" required> -->
                
                    <?php
                    $email = $this->uri->segment(2);
                    $token = $this->uri->segment(3);
                    ?>
                <?php
                    if (isset($error_message)) {
                    echo "<div class='message'>";
                    echo $eror_message;
                    echo "</div>";
                    } else {
                    ?>
            <input type="hidden" name="email" value="<?= $email; ?>">
            <input type="hidden" name="token" value="<?= $token; ?>">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <br>
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <!-- <button class="btn btn-primary" value="login" type="submit"><i class="fa fa-lock"></i> Register</button> -->
          <br>
                <button id="submit" class="btn btn-primary" type="submit">Reset Password</button>
                <br>
                <a href="<?= base_url(); ?>login">Remember your password? Login Here</a>
                    <?php
                    }

                    
                ?>
                <!-- <br><br> -->
                <!-- <p id="response"></p> -->
                <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                <div id="message2">
                    <p id="match" class="invalid">Password doesnt <b>match</b></p>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var email = $("#email");

        $(document).ready(function () {
            $('.btn-primary').on('click', function () {
                if (email.val() != "") {
                    email.css('border', '1px solid green');

                    $.ajax({
                       url: 'forgot_password.php',
                       method: 'POST',
                       dataType: 'json',
                       data: {
                           email: email.val()
                       }, success: function (response) {
                            if (!response.success)
                                $("#response").html(response.msg).css('color', "red");
                            else
                                $("#response").html(response.msg).css('color', "green");
                        }
                    });
                } else
                    email.css('border', '1px solid red');
            });
        });
    </script> -->


    <script type="text/javascript" src="<?= base_url(); ?>assets/js/password_verif.js"></script>
</body>
</html>
