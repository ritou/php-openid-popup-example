<?php

require_once "common.php";
session_start();

?>
<html>
  <head><title>OpenID Pop-up Example</title>
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <script type="text/javascript" src="http://yui.yahooapis.com/combo?2.7.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>
  <script type="text/javascript" src="popupmanager.js"></script>

<!--
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.7.0/build/reset-fonts-grids/reset-fonts-grids.css&2.7.0/build/base/base-min.css">
-->
  </head>
  <body>
    <h1>OpenID Pop-up Example</h1>
<?php
if( $_SESSION['openid'] ){
?>            
    <div>
        <p>Your OpenID : <?php echo $_SESSION['openid']; ?></p>
    </div>
<?php
}
?>
    <div>
        <a id="loginLink_google" href="./try_auth.php?action=verify&openid_identifier=google.com/accounts/o8/id"><img src="https://www.google.com/favicon.ico" width="16" height="16" border=0>Sign In with Google Account</a>
        <a href="https://www.google.com/accounts/IssuedAuthSubTokens" target="_brank">Disable Sign In Status</a>
    </div>
    <div>
        <a id="loginLink_myspace" href="./try_auth.php?action=verify&openid_identifier=myspace.com"><img src="http://developer.myspace.com/Community/favicon.ico" width="16" height="16" border=0>Sign In with MySpaceID</a>
    </div>
    <div>
        <a id="loginLink_yahoo" href="./try_auth.php?action=verify&openid_identifier=yahoo.com"><img src="http://www.yahoo.com/favicon.ico" width="16" height="16" border=0>Sign In with Yahoo!ID</a>
    </div>

<!-- TEST Code -->
                <script type="text/javascript">
                        var Event = YAHOO.util.Event;
                        var _gel = function(el) {return document.getElementById(el)};

                        function handleDOMReady_google() {
                                if(_gel("loginLink_google")) {
                                        Event.addListener("loginLink_google", "click", handleLoginClick_google);
                                }
                        }
                        function handleLoginClick_google(event) {
                                // block the url from opening like normal
                                Event.preventDefault(event);

                                // open pop-up using the auth_url
                                var auth_url = [_gel("loginLink_google").href + '&popup=true'].join('');
                                PopupManager.open(auth_url,500,500);
                        }

                        function handleDOMReady_myspace() {
                                if(_gel("loginLink_myspace")) {
                                        Event.addListener("loginLink_myspace", "click", handleLoginClick_myspace);
                                }
                        }
                        function handleLoginClick_myspace(event) {
                                // block the url from opening like normal
                                Event.preventDefault(event);

                                // open pop-up using the auth_url
                                var auth_url = _gel("loginLink_myspace").href;
                                PopupManager.open(auth_url,600,435);
                        }

                        function handleDOMReady_yahoo() {
                                if(_gel("loginLink_yahoo")) {
                                        Event.addListener("loginLink_yahoo", "click", handleLoginClick_yahoo);
                                }
                        }
                        function handleLoginClick_yahoo(event) {
                                // block the url from opening like normal
                                Event.preventDefault(event);

                                // open pop-up using the auth_url
                                var auth_url = _gel("loginLink_yahoo").href;
                                PopupManager.open(auth_url,800,500);
                        }

                        Event.onDOMReady(handleDOMReady_google);
                        Event.onDOMReady(handleDOMReady_myspace);
                        Event.onDOMReady(handleDOMReady_yahoo);

                </script>
<!-- TEST Code -->
  </body>
</html>
