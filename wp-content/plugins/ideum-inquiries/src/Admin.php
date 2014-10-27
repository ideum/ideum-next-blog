<?php namespace Ideum\Inquiries;

class Admin
{
    public static function setup()
    {
        $admin = new self;

        add_action('admin_menu', array($admin, 'menu'));
    }

    public function menu()
    {
        add_options_page(
            __('Inquiries Options'),        // Page title
            __('Inquiries'),                // Menu title
            'manage_options',               // Capability
            'ideum-inquiries-options-menu', // Menu slug
            array($this, 'menuOptions')     // Setup function
        );
    }

    public function menuOptions()
    {
        if (!current_user_can('manage_options'))  {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        $isUpdated = isset($_POST['Submit']);
        if ($isUpdated) {
            $apiKey = Config::set('insightly_api_key', $_POST['api_key']);
        } else {
            $apiKey = Config::get('insightly_api_key');
        }

        include dirname(__FILE__).'/../templates/admin.php';
    }
}
