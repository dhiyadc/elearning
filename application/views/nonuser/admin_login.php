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
 
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?= base_url(); ?>assets/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url(); ?>assets/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Admin Login</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?= base_url() ?>nonuser/admin_login_process" method="post">
                                <fieldset>
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
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-lg btn-success btn-block" type="submit"><i class="fa fa-lock"></i> Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?= base_url(); ?>assets/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?= base_url(); ?>assets/js/startmin.js"></script>

    </body>
</html>

