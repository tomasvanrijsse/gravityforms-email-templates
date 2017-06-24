<?php
/*
Plugin Name: Gravity Forms Email Templates Add-On
Description: Pick an email template from the notification admin interface.
Version: 0.1
Author: Pionect
Author URI: http://www.pionect.nl
*/

define('GF_EMAIL_TEMPLATE_ADDON_VERSION', '0.1');

add_action('gform_loaded', ['GF_Email_Template_AddOn_Bootstrap', 'load'], 5);

class GF_Email_Template_AddOn_Bootstrap
{

    public static function load()
    {

        if (!method_exists('GFForms', 'include_addon_framework')) {
            return;
        }

        require_once('class-gf-email-templates.php');

        GFAddOn::register('GFEmailTemplatesAddOn');
    }

}
//
//function gf_email_template_addon()
//{
//    return GFSimpleAddOn::get_instance();
//}
