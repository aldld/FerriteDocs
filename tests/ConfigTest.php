<?php
require_once 'PHPUnit/Framework.php';

require_once '../lib/config/Config.php';
require_once '../lib/config/exceptions/ConfigKeyNotFoundException.php';

use ferrite\config\Config;
use ferrite\config\exceptions\ConfigKeyNotFoundException;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    public function testSetAndGet() {
        $keys = array('foo', 'bar');
        $values = array('baz', 3);
        $results = array();
        
        // First key/value test
        Config::setValue($keys[0], $values[0]);
        $results[$keys[0]] = Config::getValue($keys[0]);
        $this->assertEquals($values[0], $results[$keys[0]]);
        
        // Second key/value test
        Config::setValue($keys[1], $values[1]);
        $results[$keys[1]] = Config::getValue($keys[1]);
        $this->assertEquals($values[1], $results[$keys[1]]);
    }
    
    public function testException() {
        try {
            Config::getValue('nonexistent');
        } catch (ConfigKeyNotFoundException $e) {
            return;
        }
        
        $this->fail();
    }
}
