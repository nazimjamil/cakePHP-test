<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title_for_layout; ?></title>
        <?php
            echo $this -> Html -> script (array ('jquery.min', 'common', 'jquery.validate'));
            echo $this -> Html -> css ('style');
        ?>
    </head>
    <body>
        <div id="fb-root"></div>
        <script src="//connect.facebook.net/en_US/all.js"></script>
        <script>
          FB.init({
            appId      : '<? echo Configure::read('fbconfig.id'); ?>',
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true  // parse XFBML
          });
          window.fbAsyncInit = function() {
            FB.Canvas.setAutoGrow();
          }
        </script>
        <?php echo $content_for_layout; ?>
    </body>
</html>