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
        add_filter('gform_submit_button', [$this, 'form_submit_button'], 10, 2);
        add_action('gform_after_submission', [$this, 'after_submission'], 10, 2);
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


}
