<?php

namespace ferrite\config;

use ferrite\config\exceptions\ConfigKeyNotFoundException;

/**
 * This configuration class is an easy way of setting and managin
 * configuration settings throught the application. For now at least,
 * all configuration settings are stored in an array.
 *
 * If there are significant benefits, it may switch to another system
 * in the future, such as XML, YAML, or INI files.
 */
class Config
{
    /**
     * Array containing all the settings key/value pairs
     */
    protected static $settings = array();
    
    /**
     * Set the value of the specified settings key. Values
     * are stored in $settings.
     *
     * @param string $key the key whose value you wish to set
     * @param mixed $value the value you wish to have associated
     * with the specified key
     */
    public static function setValue($key, $value) {
        static::$settings[$key] = $value;
    }
    
    /**
     * Retrieve the value of the specified key from the $settings
     * array. Throws a ConfigKeyNotFoundException if the specified
     * key is not found.
     *
     * @param string key the key whose value you wish to retrieve
     */
    public static function getValue($key) {
        if (!array_key_exists($key, static::$settings)) {
            $msg = 'Configuration key "' . $key . '" not found';
            throw new ConfigKeyNotFoundException($msg);
        }
        
        return static::$settings[$key];
    }
    
    /**
     * Private constructor prevents creating a separate instance
     * of the Config class.
     */
    private function __construct() { }
}
