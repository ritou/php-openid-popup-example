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

    if( $_GET['ax'] == 'true'){
        $ax_request = new Auth_OpenID_AX_FetchRequest();

        // set nickname request
        if( $_GET['ax_nickname'] == 'true' ){
            $ax_request->add(new Auth_OpenID_AX_AttrInfo('http://axschema.org/namePerson/friendly',1,true,'nickname'));
        }

        // set profile img request
        if( $_GET['ax_profile_img'] == 'true' ){
            $ax_request->add(new Auth_OpenID_AX_AttrInfo('http://axschema.org/media/image/default',1,true,'profile_img'));
        }

        // set gender request
        if( $_GET['ax_gender'] == 'true' ){
            $ax_request->add(new Auth_OpenID_AX_AttrInfo('http://axschema.org/person/gender',1,true,'gender'));
        }

        // set birth year request
        if( $_GET['ax_birthyear'] == 'true' ){
            $ax_request->add(new Auth_OpenID_AX_AttrInfo('http://axschema.org/birthDate/birthYear',1,true,'byear'));
        }

        // set first name request
        if( $_GET['ax_firstname'] == 'true' ){
            $ax_request->add(new Auth_OpenID_AX_AttrInfo('http://axschema.org/namePerson/first',1,true,'first'));
        }

        // set last name request
        if( $_GET['ax_lastname'] == 'true' ){
            $ax_request->add(new Auth_OpenID_AX_AttrInfo('http://axschema.org/namePerson/last',1,true,'last'));
        }

        // add extension
        if( $ax_request ){
            $auth_request->addExtension($ax_request);
        }
    }

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