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
  <script type="text/javascript" src="./js/jquery.corners.min.js"></script>
  <script>
  $(document).ready( function(){
  $('.round').corners();
  });
  </script>
  <!-- /jQuery Popupwindow js include -->
<style type="text/css">
.round{
	background:whitesmoke;
	padding:10px;
	width:750px;
}
</style>
  </head>
  <body>
    <h1>OpenID Pop-up and AX Example</h1>

    <p>You can see the details of this code at <a href="http://github.com/ritou/php-openid-popup-example" target="_blank">github.com</a>.</p>

    <!-- jQuery Popupwindow example -->
    <div>
        <a class="popupwindow" rel="yahoo" href="./try_auth.php?action=verify&openid_identifier=yahoo.com&ui=true&popup=true&ax=true&ax_profile_img=true&ax_nickname=true&ax_profile_img=true&ax_gender=true&ax_birthyear=true&ax_firstname=true&ax_lastname=true">
        <img src="http://l.yimg.com/a/i/reg/openid/buttons/4_new.png" width="179" height="34" border=0>
        </a>
    </div>
    <div>
        <a class="popupwindow" rel="yahoojp" href="./try_auth.php?action=verify&openid_identifier=yahoo.co.jp&ui=true&popup=true&ax=true&ax_profile_img=true&ax_nickname=true&ax_profile_img=true&ax_gender=true&ax_birthyear=true&ax_firstname=true&ax_lastname=true">
        <img src="http://i.yimg.jp/images/login/btn/btnXSLogin.gif" width="116" height="28"alt="Yahoo! JAPAN IDでログイン" border="0">
        </a>
    </div>
    <!--
	-->
    <!-- /jQuery Popupwindow example -->

<?php
if( $_SESSION['openid'] ){
?>            
    <!-- OpenID Display area -->
    <div class="round">
        <p>Your OpenID : <a href="<?php echo $_SESSION['openid']; ?>"><?php echo $_SESSION['openid']; ?></a></p>
<?php
if( $_SESSION['ax_nickname'] ){
?>            
        <p>Nickname : <?php echo $_SESSION['ax_nickname']; ?></p>
<?php
}
if( $_SESSION['ax_profile_url'] ){
?>            
        <p>Profile Image URL : <img src="<?php echo str_replace("https://","http://",$_SESSION['ax_profile_url']); ?>"></p>
<?php
}
if( $_SESSION['ax_gender'] ){
?>            
        <p>Gender : <?php echo $_SESSION['ax_gender']; ?></p>
<?php
}
if( $_SESSION['ax_birthyear'] ){
?>            
        <p>Birth Year : <?php echo $_SESSION['ax_birthyear']; ?></p>
<?php
}
if( $_SESSION['ax_firstname'] ){
?>            
        <p>First Name : <?php echo $_SESSION['ax_firstname']; ?></p>
<?php
}
if( $_SESSION['ax_lastname'] ){
?>            
        <p>Last Name : <?php echo $_SESSION['ax_lastname']; ?></p>
<?php
}
?>
    </div>
    <!-- /OpenID Display area -->
<?php
}
?>
  </body>
</html>