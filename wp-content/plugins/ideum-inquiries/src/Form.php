<?php namespace Ideum\Inquiries;

class Form
{
    public static function setup()
    {
        $form = new self;

        add_shortcode('ideum-inquiries-form', array($form, 'shortcode'));
    }

    public static function handlePost($post)
    {
        header("Content-Type: text/plain");
        var_dump($post);
    }

    public function shortcode($attrs)
    {
        ob_start();

        include dirname(__FILE__).'/../templates/form.php';

        return ob_get_clean();
    }
}
