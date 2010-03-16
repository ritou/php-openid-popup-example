<?php


require_once "common.php";
session_start();

function escape($thing) {
    return htmlentities($thing);
}

function run() {
    $consumer = getConsumer();

    // Complete the authentication process using the server's
    // response.
    $return_to = getReturnTo();
    $response = $consumer->complete($return_to);

    // Check the response status.
    if ($response->status == Auth_OpenID_CANCEL) {
        // This means the authentication was cancelled.
        $msg = 'Verification cancelled.';
	if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
    } else if ($response->status == Auth_OpenID_FAILURE) {
        // Authentication failed; display the error message.
        $msg = "OpenID authentication failed: " . $response->message;
	if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
	session_destroy();
    } else if ($response->status == Auth_OpenID_SUCCESS) {
        // This means the authentication succeeded; extract the
        // identity URL and Simple Registration data (if it was
        // returned).
        $openid = $response->getDisplayIdentifier();
        $esc_identity = escape($openid);
		$_SESSION = array();
        $_SESSION['openid'] = $esc_identity;

        if ($response->endpoint->canonicalID) {
            $escaped_canonicalID = escape($response->endpoint->canonicalID);
            $success .= '  (XRI CanonicalID: '.$escaped_canonicalID.') ';
            $_SESSION['openid'] = $escaped_canonicalID;
        }

        // AX Process
        $ax_resp = Auth_OpenID_AX_FetchResponse::fromSuccessResponse($response);
        if( $ax_resp ){
            if( $ax_resp->data["http://axschema.org/namePerson/friendly"][0] ){
                $_SESSION['ax_nickname'] = $ax_resp->data["http://axschema.org/namePerson/friendly"][0];
            }

            if( $ax_resp->data["http://axschema.org/media/image/default"][0] ){
                $_SESSION['ax_profile_url'] = $ax_resp->data["http://axschema.org/media/image/default"][0];
            }
            if( $ax_resp->data["http://axschema.org/person/gender"][0] ){
                $_SESSION['ax_gender'] = $ax_resp->data["http://axschema.org/person/gender"][0];
            }
            if( $ax_resp->data["http://axschema.org/birthDate/birthYear"][0] ){
                $_SESSION['ax_birthyear'] = $ax_resp->data["http://axschema.org/birthDate/birthYear"][0];
            }
            if( $ax_resp->data["http://axschema.org/namePerson/first"][0] ){
                $_SESSION['ax_firstname'] = $ax_resp->data["http://axschema.org/namePerson/first"][0];
            }
            if( $ax_resp->data["http://axschema.org/namePerson/last"][0] ){
                $_SESSION['ax_lastname'] = $ax_resp->data["http://axschema.org/namePerson/last"][0];
            }
        }

    }

    //include 'index.php';
    include 'close.php';
}

run();

?>
