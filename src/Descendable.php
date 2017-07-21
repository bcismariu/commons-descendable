<?php

namespace Bcismariu\Commons\Descendable;

/**
 * handles multidimensional arrays, chained object properties
 * or a mix of the two
 */
class Descendable
{
    
    protected $separator = '.';
    protected $container = '';
    
    public function __construct($container)
    {
        $this->container = $container;
    }
    
    public function setKeySeparator($separator)
    {
        $this->separator = $separator;
    }
    
    /**
     * Get multidimenional array value
     * @param string $composite_key concatenated keys with key separator
     * @param string $default_value to return in case that one key from chain is undefined
     */
    public function get($composite_key, $default_value = null)
    {
        $array_keys = explode($this->separator, $composite_key);
        $container = $this->container;
        
        foreach ($array_keys as $key) {
            if (!$this->hasChild($container, $key)) {
                return $default_value;
            }
            $container = $this->getChild($container, $key);
        }
        return $container;
    }
    
    /**
     * Check if the last key from chain is defined
     * @param string $composite_key concatenated keys with key separator
     * @return Boolean
     */
    public function has($composite_key)
    {
        $array_keys = explode($this->separator, $composite_key);
        $container = $this->container;
        
        foreach ($array_keys as $key) {
            if (!$this->hasChild($container, $key)) {
                return false;
            }
            $container = $this->getChild($container, $key);
        }
        return true;
    }

    protected function hasChild($container, $key)
    {
        if (is_array($container) && (array_key_exists($key, $container))) {
            return true;
        }
        if (is_object($container) && (property_exists($container, $key))) {
            return true;
        }
        return false;
    }

    protected function getChild($container, $key)
    {
        if (is_array($container) && (array_key_exists($key, $container))) {
            return $container[$key];
        }
        if (is_object($container) && (property_exists($container, $key))) {
            return $container->$key;
        }
        return null;
    }
}
