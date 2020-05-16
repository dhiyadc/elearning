
<?php $this->load->view('partials/header'); ?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<div class="intro-section" id="home-section">
      
      <div class="slide-1 gambar1" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                
              <div class="col-lg-12 ml-auto mt-5 mb-4" data-aos="fade-up" data-aos-delay="500">
                  <form action="<?= base_url(); ?>forgot_password/request" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4 text-center">Reset Password</h3>
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
                      <div class="form-group row">
                            <label class="control-label col-md-2">Email</label>
                              <div class="col-md-8">
                                  <input class="form-control" type="email" name="email" placeholder="Your Email Address">
                              </div>
                      </div>
                      <div class="form-group text-center">
                      
                        <button class="btn btn-primary shadow btn-pill" type="submit">Kirim Permintaan</button>
                        <a href="<?= base_url(); ?>login" class="btn btn-light btn-pill">Back</a>
                        <?php
                        }

                        echo "<div class='error_msg'>";
                        if (isset($error_message)) {
                        echo $error_message;
                        }
                        echo "</div>";
                ?>
                      </div>
              </div>
            </div>
            
          </div>
        </div>
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
    <?php $this->load->view('partials/footer'); ?>
