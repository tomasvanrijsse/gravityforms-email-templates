<?php

GFForms::include_addon_framework();

class GFEmailTemplatesAddOn extends GFAddOn
{

    protected $_version                  = GF_EMAIL_TEMPLATE_ADDON_VERSION;
    protected $_min_gravityforms_version = '2.0';
    protected $_slug                     = 'emailtemplateaddon';
    protected $_path                     = 'gravityforms-email-templates/gravityforms-email-templates.php';
    protected $_full_path                = __FILE__;
    protected $_title                    = 'Gravity Forms HTML Email Notification Templates Add-On';
    protected $_short_title              = 'Email Templates Add-On';

    private static $_instance = null;

    /**
     * Get an instance of this class.
     *
     * @return GFEmailTemplatesAddOn
     */
    public static function get_instance()
    {
        if (self::$_instance == null) {
            self::$_instance = new GFEmailTemplatesAddOn();
        }

        return self::$_instance;
    }

    /**
     * Handles hooks and loading of language files.
     */
    public function init()
    {
        parent::init();
        add_filter('gform_tooltips', [$this, 'add_extra_tooltips']);
        add_filter('gform_notification_ui_settings', [$this, 'notification_extra_settings'], 10, 3);
        add_action('gform_pre_notification_save', [$this, 'save_extra_settings'], 10, 2);
        add_filter('gform_notification', [$this, 'notification_extras'], 5, 3);
    }


    // # SCRIPTS & STYLES -----------------------------------------------------------------------------------------------

    /**
     * Return the scripts which should be enqueued.
     *
     * @return array
     */
    public function scripts()
    {
        $scripts = [

        ];

        return array_merge(parent::scripts(), $scripts);
    }

    /**
     * Return the stylesheets which should be enqueued.
     *
     * @return array
     */
    public function styles()
    {
        $styles = [

        ];

        return array_merge(parent::styles(), $styles);
    }


    // # ADMIN FUNCTIONS -----------------------------------------------------------------------------------------------

    /**
     * Creates a custom page for this add-on.
     */
    public function plugin_page()
    {
        echo 'This page appears in the Forms menu';
    }

    function add_extra_tooltips($tooltips)
    {
        $tooltips['email_template'] = "<h6>" . __("Email template",
                "gravityforms") . "</h6>" . __("Optional ability to choose an email template.", "gravityforms");

        return $tooltips;
    }

    function notification_extra_settings($ui_settings, $notification, $form)
    {
        $emailTemplate                    = (rgar($notification, 'emailTemplate'));
        $ui_settings['enableAttachments'] = '
            <tr>
                <th><label for="email_template">' . __("Email Template", "gravityforms") . ' ' .
            gform_tooltip("email_template", "", true) . '</label></th>
                <td>
                    <select type="checkbox" id="email_template" name="email_template">
                        <option value="">' . __('No template', 'gravityforms') . '</option>
                    </select>
                </td>
            </tr>';

        return $ui_settings;
    }

    function save_extra_settings($notification, $form)
    {
        $notification['email_template'] = rgpost('email_template');

        return $notification;
    }

    function notification_extras($notification, $form, $entry)
    {
        if (rgar($notification, 'email_template')) {
            GFCommon::log_debug('GFEmailTemplatesAddOn - apply the notification email template');
        }

        return $notification;
    }


}
