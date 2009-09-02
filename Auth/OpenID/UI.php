<?php

/**
 * An implementation of the OpenID Pop-up
 *
 * See:
 * http://wiki.openid.net/f/openid_ui_extension_draft01.html
 */

require_once "Auth/OpenID/Extension.php";

define('OPENID_UI_NS_URI',
       'http://specs.openid.net/extensions/ui/1.0');

class OpenID_UI_Request extends Auth_OpenID_Extension {

    var $ns_alias = 'ui';
    var $ns_uri = OPENID_UI_NS_URI;
    var $mode = 'popup';
    var $icon = 'false';

    function setIcon()
    {
        $this->icon = 'true';
    }

    function getExtensionArgs()
    {
        $args = array();
        $args['mode'] = $this->mode;
        $args['icon'] = $this->icon;
        return $args;
    }
}

?>
