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
    $return_to = getReturnTo();

    // Begin the OpenID authentication process.
    $auth_request = $consumer->begin($openid);

    // No auth request means we can't begin OpenID.
    if (!$auth_request) {
        displayError("Authentication error; not a valid OpenID.");
    }

    // add AX request
    if( $_GET['ax'] == 'true'){
        $ax_request = new Auth_OpenID_AX_FetchRequest();

        global $ax_data;
        foreach( $ax_data as $ax_key => $ax_data_ns){
            // set AX params
            if( $_GET['ax_'.$ax_key] == 'true' ){
                $ax_request->add(new Auth_OpenID_AX_AttrInfo($ax_data_ns,1,true,$ax_key));
            }
        }
        // add extension
        if( $ax_request ){
            $auth_request->addExtension($ax_request);
        }
    }

    // add UI extension request
    if( $_GET['ui'] == 'true'){
        $UI_request = new OpenID_UI_Request();

        // set icon
        if( $_GET['icon'] == 'true' ){
            $UI_request->setIcon();
        }

        // set lang
        if( $_GET['lang'] == 'true' && $_GET['pref_lang'] ){
            $UI_request->setLang($_GET['pref_lang']);
        }

        // set popup
        if( $_GET['popup'] == 'true' ){
            $UI_request->setPopup();
            $return_to .= "?popup=true";
        }

        $auth_request->addExtension($UI_request);
	}
    $redirect_url = $auth_request->redirectURL( getTrustRoot(), $return_to );

    if (Auth_OpenID::isFailure($redirect_url)) {
        displayError("Could not redirect to server: " . $redirect_url->message);
    } else {
        // Send redirect.
        header("Location: ".$redirect_url);
    }
}

run();

?>