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
  <script type="text/javascript" src="jquery.popupwindow.js"></script>
  <!-- /jQuery Popupwindow js include -->
  <!-- jQuery Popupwindow setting -->
  <script type="text/javascript">
  var profiles =
  {
    google:
    {
      height:500,
      width:500,
      toolbar:1,
      scrollbars:1,
      status:1,       
	  resizable:1,
      left:0,
      top:0,
      center:1,
      createnew:0,
      location:1,
      menubar:1,
	  onUnload:reloadwindow
    },

    myspace:
    {
      height:350,
      width:600,
      toolbar:1,
      scrollbars:1,
      status:1,       
	  resizable:1,
      left:0,
      top:0,
      center:1,
      createnew:0,
      location:1,
      menubar:1,
	  onUnload:reloadwindow
    },

    yahoo:
    {
      height:500,
      width:500,
      toolbar:1,
      scrollbars:1,
      status:1,       
	  resizable:1,
      left:0,
      top:0,
      center:1,
      createnew:0,
      location:1,
      menubar:1,
	  onUnload:reloadwindow
    },

    yahoojp:
    {
      height:500,
      width:500,
      toolbar:1,
      scrollbars:1,
      status:1,       
	  resizable:1,
      left:0,
      top:0,
      center:1,
      createnew:0,
      location:1,
      menubar:1,
	  onUnload:reloadwindow
    }

  };

  function reloadwindow(){
    document.location.reload();
  };

  $(function()
  {
    $(".popupwindow").popupwindow(profiles);
  });
  </script>
  <!-- /jQuery Popupwindow setting -->

  </head>
  <body>
    <h1>OpenID Pop-up Example</h1>
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
        <a class="popupwindow" rel="google" href="./try_auth.php?action=verify&openid_identifier=google.com/accounts/o8/id"><img src="http://www.google.com/favicon.ico" width="16" height="16" border=0>Sign In with Google Account</a>
        <a href="https://www.google.com/accounts/IssuedAuthSubTokens" target="_brank">Disable Sign In Status</a>
    </div>
    <div>
        <a class="popupwindow" rel="myspace" href="./try_auth.php?action=verify&openid_identifier=myspace.com"><img src="http://developer.myspace.com/Community/favicon.ico" width="16" height="16" border=0>Sign In with MySpaceID</a>
    </div>
    <div>
        <a class="popupwindow" rel="yahoo" href="./try_auth.php?action=verify&openid_identifier=yahoo.com"><img src="http://www.yahoo.com/favicon.ico" width="16" height="16" border=0>Sign In with Yahoo!ID</a>
    </div>
    <div>
        <a class="popupwindow" rel="yahoojp" href="./try_auth.php?action=verify&openid_identifier=yahoo.co.jp"><img src="http://www.yahoo.co.jp/favicon.ico" width="16" height="16" border=0>Sign In with Yahoo! JAPAN ID</a>
    </div>
    <!-- /jQuery Popupwindow example -->

  </body>
</html>
