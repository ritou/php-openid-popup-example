<?php

require_once "common.php";
session_start();

?>
<html>
  <head><title>OpenID Pop-up Example</title>
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- jQuery Popupwindow js include -->
  <script type="text/javascript"src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="./js/jquery.popupwindow.js"></script>
  <script type="text/javascript" src="./js/popupprofiles.js"></script>
  <!-- /jQuery Popupwindow js include -->
  </head>
  <body>
    <h1>OpenID Pop-up Example</h1>

    <p>You can see the details of this code at <a href="http://github.com/ritou/php-openid-popup-example" target="_blank">github.com</a>.</p>

<?php
if( $_SESSION['openid'] ){
?>            
    <!-- OpenID Display area -->
    <div>
        <p>Your OpenID : <?php echo $_SESSION['openid']; ?></p>
    </div>
    <!-- /OpenID Display area -->
<?php
}
?>

    <!-- jQuery Popupwindow example -->
    <div>
        <a class="popupwindow" rel="google" href="./try_auth.php?action=verify&openid_identifier=google.com/accounts/o8/id&ui=true&popup=true&icon=true"><img src="http://www.google.com/favicon.ico" width="16" height="16" border=0>Sign In with Google Account</a>
        <a href="https://www.google.com/accounts/IssuedAuthSubTokens" target="_brank">Disable Sign In Status</a>
    </div>
    <div>
        <a class="popupwindow" rel="myspace" href="./try_auth.php?action=verify&openid_identifier=myspace.com&ui=true&popup=true"><img src="http://developer.myspace.com/Community/favicon.ico" width="16" height="16" border=0>Sign In with MySpaceID</a>
    </div>
    <div>
        <a class="popupwindow" rel="yahoo" href="./try_auth.php?action=verify&openid_identifier=yahoo.com&ui=true&popup=true"><img src="http://www.yahoo.com/favicon.ico" width="16" height="16" border=0>Sign In with Yahoo!ID</a>
    </div>
    <div>
        <a class="popupwindow" rel="yahoo" href="./try_auth.php?action=verify&openid_identifier=yahoo.com&ui=true&popup=true&lang=true&pref_lang=fr-FR"><img src="http://www.yahoo.com/favicon.ico" width="16" height="16" border=0>Sign In with Yahoo!ID(French)</a>
    </div>
    <div>
        <a class="popupwindow" rel="yahoojp" href="./try_auth.php?action=verify&openid_identifier=yahoo.co.jp&ui=true&popup=true"><img src="http://www.yahoo.co.jp/favicon.ico" width="16" height="16" border=0>Sign In with Yahoo! JAPAN ID</a>
    </div>
    <!-- /jQuery Popupwindow example -->

  </body>
</html>
