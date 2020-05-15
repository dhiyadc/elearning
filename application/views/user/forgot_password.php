<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="jumbotron" style="height: 600px; background-color:#3232aa; border-radius :0px;">
    <div class="container" style="margin-top: 200px;">
        <form action="<?= base_url(); ?>forgot_password/request" method='post'>
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
<!-- 
                <input class="form-control" id="email" placeholder="Your Email Address" required> -->
                

                <?php
                    if (isset($message_display)) {
                    echo "<div class='message'>";
                    echo $message_display;
                    echo "</div>";
                    ?>
                    <a href="<?= base_url(); ?>login">Back to login</a>
                    <?php
                    } else {
                    ?>
                <input type="email" class="form-control" name="email" placeholder="Your Email Address" autofocus required><br>
                <button class="btn btn-primary" type="submit">Reset Password</button>
                <br><br>
                <a href="<?= base_url(); ?>login" style="color:white;" >Remember your password? Login Here</a>
                    <?php
                    }

                    echo "<div class='error_msg'>";
                    if (isset($error_message)) {
                    echo $error_message;
                    }
                    //echo validation_errors();
                    echo "</div>";
                ?>
                <!-- <br><br> -->
                <!-- <p id="response"></p> -->
            </div>
        </div>
        </form>
    </div>
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
</body>
</html>
