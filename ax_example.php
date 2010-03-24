<?php

require_once "common.php";
session_start();

?>
<html>
  <head><title>OpenID UI and AX Example</title>
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- jQuery Popupwindow js include -->
  <script type="text/javascript"src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="./js/jquery.popupwindow.js"></script>
  <script type="text/javascript" src="./js/popupprofiles.js"></script>
  <script type="text/javascript" src="./js/jquery.corners.min.js"></script>
  <script>
  $(document).ready( function(){
  $('.round').corners();
  });
  </script>
  <!-- /jQuery Popupwindow js include -->
  <style type="text/css">
  .round{
  background:darkgray;
  padding:10px;
  width:750px;
  }
  </style>
  </head>
  <body>
    <h1>OpenID UI and AX Example</h1>

    <p>You can see the details of this code at <a href="http://github.com/ritou/php-openid-popup-example" target="_blank">github.com</a>.</p>

    <h2>AX Example</h2>
    <div>
        <a href="./try_auth.php?callback=ax&action=verify&openid_identifier=yahoo.co.jp&ax=true&ax_nickname=true&ax_profile_img=true&ax_gender=true&ax_birthyear=true&ax_firstname=true&ax_lastname=true">
        <img src="http://i.yimg.jp/images/login/btn/btnXSLogin.gif" width="116" height="28"alt="Yahoo! JAPAN IDでログイン" border="0">
        </a>
    </div>

    <h2>AX + popup Example</h2>
    <!-- jQuery Popupwindow example -->
    <div>
        <a class="popupwindow" rel="google" href="./try_auth.php?action=verify&openid_identifier=google.com/accounts/o8/id&ui=true&popup=true&ax=true&ax_country=true&ax_email=true&ax_firstname=true&ax_language=true&ax_lastname=true"><img src="http://www.google.com/favicon.ico" width="16" height="16" border=0>Sign In with Google Account</a>
        <a href="https://www.google.com/accounts/IssuedAuthSubTokens" target="_brank">Disable Sign In Status</a>
    </div>
    <div>
        <a class="popupwindow" rel="yahoo" href="./try_auth.php?action=verify&openid_identifier=yahoo.com&ui=true&popup=true&ax=true&ax_email=true&ax_fullname=true&ax_nickname=true&ax_profile_img=true&ax_gender=true&ax_language=true&ax_country=true&ax_firstname=true&ax_lastname=true">
        <img src="http://l.yimg.com/a/i/reg/openid/buttons/4_new.png" width="179" height="34" border=0>
        </a>
    </div>
    <div>
        <a class="popupwindow" rel="yahoojp" href="./try_auth.php?action=verify&openid_identifier=yahoo.co.jp&ui=true&popup=true&ax=true&ax_nickname=true&ax_profile_img=true&ax_gender=true&ax_birthyear=true&ax_firstname=true&ax_lastname=true">
        <img src="http://i.yimg.jp/images/login/btn/btnXSLogin.gif" width="116" height="28"alt="Yahoo! JAPAN IDでログイン" border="0">
        </a>
    </div>
    <!--
	-->
    <!-- /jQuery Popupwindow example -->
    <div>
        <p>&nbsp;</p>
    </div>

<?php
if( $_SESSION['openid'] ){
?>
    <!-- OpenID Display area -->
    <div class="round">
        <p>Your OpenID : <a href="<?php echo $_SESSION['openid']; ?>"><?php echo $_SESSION['openid']; ?></a></p>

<?php
    global $ax_data;
    foreach( $ax_data as $ax_key => $ax_data_ns){
        if( $_SESSION['ax_'.$ax_key] ){
            if( $ax_key == "profile_img" ){
?>
        <p><?php echo $ax_key;?> : <img src="<?php echo $_SESSION['ax_'.$ax_key]; ?>"></p>
<?php
            }else{
?>
        <p><?php echo $ax_key;?> : <?php echo $_SESSION['ax_'.$ax_key]; ?></p>
<?php
            }
        }
    }
?>
    </div>
    <!-- /OpenID Display area -->
<?php
}
?>
</body>
</html>