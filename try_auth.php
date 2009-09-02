<?php

require_once "common.php";
session_start();

function getOpenIDURL() {
    // Render a default page if we got a submission without an openid
    // value.
    if (empty($_GET['openid_identifier'])) {
        $error = "Expected an OpenID URL.";
        include 'close.php';
        exit(0);
    }

    return $_GET['openid_identifier'];
}

function run() {
    $openid = getOpenIDURL();
    $consumer = getConsumer();

    // Begin the OpenID authentication process.
    $auth_request = $consumer->begin($openid);

    // No auth request means we can't begin OpenID.
    if (!$auth_request) {
        displayError("Authentication error; not a valid OpenID.");
    }

    $UI_request = new OpenID_UI_Request();
    $UI_request->setIcon();
    if( $UI_request ){
	    $auth_request->addExtension($UI_request);
    }
    if( $_GET['popup'] == 'true' ){
        $redirect_url = $auth_request->redirectURL(getTrustRoot(),
                                                   getReturnTo()."?popup=true");
    }else{
        $redirect_url = $auth_request->redirectURL(getTrustRoot(),
                                                   getReturnTo());
    }

    if (Auth_OpenID::isFailure($redirect_url)) {
        displayError("Could not redirect to server: " . $redirect_url->message);
    } else {
        // Send redirect.
        header("Location: ".$redirect_url);
    }
}

run();

?>
