<?php namespace Ideum\Inquiries;

class Plugin
{
    public function __construct()
    {
        $action = 'ideum-inquiries-callback';

        wp_register_script(
            'inquiry-form-submit',
            plugins_url('scripts/inquiry-form-submit.js', dirname(__FILE__)),
            array('jquery')
        );
        wp_localize_script('inquiry-form-submit', 'IDEUM_INQUIRIES', array(
            'baseUrl' => admin_url('admin-ajax.php'),
            'action'  => $action
        ));
        wp_enqueue_script('inquiry-form-submit');

        add_action("wp_ajax_$action", array($this, 'ajaxCallback'));
        add_action("wp_ajax_nopriv_$action", array($this, 'ajaxCallback'));

        Admin::setup();
        Form::setup();
    }

    /**
     * Runs once when the plugin is initialized.  Forces Wordpress to rebuild
     * its internal redirect rule cache.
     */
    public static function install()
    {
    }

    public function ajaxCallback()
    {
        $client = new InsightlyClient();
        $client->addLead($_POST['inquiries']);

        $mailer = new Mailer();
        $mailer->sendNotification($_POST['inquiries']);

        include dirname(__FILE__).'/../templates/success.php';
        die();
    }
}
