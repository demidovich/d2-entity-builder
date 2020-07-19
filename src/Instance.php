<?php

namespace D2;

use D2\Instance\Params;

class Instance
{
    /**
     * Create instance by constructor
     * 
     * @param type $class
     * @param array $data
     * @param string $prefix Data fields prefix
     * @return mixed
     */
    public static function byConstructor(string $class, array $data = [], ?string $prefix = null)
    {
        $params = (new Params($class, '__construct'))->casted($data, $prefix);

        return new $class(...$params);
    }

   /**
    * Create instance by static constructor
    * 
    * @param type $class
    * @param type $method
    * @param array $data
    * @param string $prefix Data fields prefix
    * @return mixed
    */
    public static function byStaticConstructor(string $class, string $method, array $data = [], ?string $prefix = null)
    {
        $params = (new Params($class, $method))->casted($data, $prefix);

        return $class::$method(...$params);
    }
}
