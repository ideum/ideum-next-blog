<?php namespace Ideum\Inquiries;

class Config
{
    const PLUGIN_NAMESPACE = 'ideum_inquiries';

    public static function get($key)
    {
        $optKey = implode(array(self::PLUGIN_NAMESPACE, $key), '-');

        return get_option($optKey);
    }

    public static function set($key, $value)
    {
        $optKey = implode(array(self::PLUGIN_NAMESPACE, $key), '-');
        update_option($optKey, $value);

        return $value;
    }
}
