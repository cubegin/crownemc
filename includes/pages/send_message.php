<?php
    require_once('recaptcha-php-1.10/recaptchalib.php');
    $privatekey = '6LdHYQcAAAAAAG64iZ_eGj4Q-rfi6HJqinWXvkIt';
    $resp       = recaptcha_check_answer ($privatekey,
        $_SERVER['REMOTE_ADDR'],
        $_POST['recaptcha_challenge_field'],
        $_POST['recaptcha_response_field']);
    if (!$resp->is_valid) {
        $sent = false;
    }
    else {
        $to      = 'alanhaggai@alanhaggai.org';
        $subject = 'Feedback';
        $headers = "From: guest@crownemc.com\r\n" .
            'X-Mailer: php';

        $name         = $_POST['name'];
        $organisation = $_POST['organisation'];
        $telephone    = $_POST['telephone'];
        $fax          = $_POST['fax'];
        $email        = $_POST['e-mail'];
        $message      = $_POST['message'];

        $body = "Name: $name\n\n" .
            "Organisation: $organisation\n\n" .
            "Telephone: $telephone\n\n" .
            "Fax: $fax\n\n" .
            'E-mail: ' . $email . "\n\n" .
            "Message:\n$message";

        if ( mail( $to, $subject, $body, $headers ) ) {
            $sent = true;
        }
    }
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 
   'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en-US'>
    <head>
        <title> Crown ElectroMechanical Cont. : <?php echo $title ?> </title>

        <meta http-equiv='content-type' content='text/html;charset=utf-8' />

        <link href='../../stylesheets/send_message.css'
          media='screen, projection' rel='stylesheet' type='text/css' />
        <link href='../../stylesheets/print.css' media='print' rel='stylesheet'
          type='text/css' />
        <!--[if IE]>
            <link href='../../stylesheets/ie.css' media='screen, projection'
              rel='stylesheet' type='text/css' />
        <![endif]-->
    </head>
    <body>
        <div id='container'>
            <div id='content'>
                <?php if ( $sent == false ): ?>
                    <h2>Message sending failed</h2>
                    <div class='error'>
                        <p>
                            <img src='../../statics/images/error.png'
                              style='float: none' /><br />
                              Your message has not been sent. You probably did
                              not enter the CAPTCHA, or entered a wrong one.
                              Please try again. You will be automatically
                              redirected to the contact page in 10 seconds.
                              Click <a href='../../contact_us.html'>here</a> to
                              redirect manually.
                        </p>
                    </div>
                    <meta http-equiv='Refresh' content='10;URL=../../contact_us.html'> 
                <?php else: ?>
                    <h2>Message sent successfully</h2>
                    <div class='success'>
                        <p>
                            <img src='../../statics/images/information.png'
                              style='float: none' /><br />
                            Your message has been sent successfully. We will get
                            back to you as soon as possible. You will be
                            automatically redirected to the home page in 10 seconds.
                            Click <a href='javascript: history.back()'>here</a> to redirect manually.
                        </p>
                    </div>
                    <meta http-equiv='Refresh' content='10;URL=../../'> 
                <?php endif ?>
            </div>
            <div id='footer'>
                <?php include('../footer.inc') ?>
            </div>
        </div>
    </body>
</html>
