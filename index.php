<?php
    echo '<?xml version="1.0" encoding="UTF-8"?>';

    $page = $_GET['page'];
    if ( !empty($page) ) {

        switch($page) {
            case 'home':
            case 'about_us':
            case 'projects':
            case 'services':
                $title = ucwords( implode( ' ', explode( '_', $page ) ) );
                break;
            default:
                $page  = 'error';
                $title = 'Error';
        }

    }
    else {
        $page  = 'home';
        $title = 'Home';
    }
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 
   'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en-US'>
    <head>
        <title> Crown ElectroMechanical Cont. : <?php echo $title ?> </title>

        <meta http-equiv='content-type' content='text/html;charset=utf-8' />

        <link href='stylesheets/<?php echo $page ?>.css'
          media='screen, projection' rel='stylesheet' type='text/css' />
        <link href='stylesheets/print.css' media='print' rel='stylesheet'
          type='text/css' />
        <!--[if IE]>
            <link href='stylesheets/ie.css' media='screen, projection'
              rel='stylesheet' type='text/css' />
        <![endif]-->

        <script type='text/javascript'>
            var myimages = new Array();

            function preloading()
            {
                for ( x = 0; x < preloading.arguments.length; x++ )
                {
                    myimages[x]     = new Image();
                    myimages[x].src = preloading.arguments[x];
                }
            }
            preloading(
                'statics/images/<?php echo $page . '.jpg' ?>'
            );
        </script>
    </head>

    <body>
        <div id='container'>
            <div id='header'>
                <?php include('includes/header.inc') ?>
            </div>

            <div id='content'>
                <?php include("includes/pages/$page.inc") ?>
            </div>

            <div id='footer'>
                <?php include('includes/footer.inc') ?>
            </div>
        </div>
    </body>
</html>
