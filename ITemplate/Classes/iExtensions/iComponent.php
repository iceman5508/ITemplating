<?php
/**
 * Created by PhpStorm.
 * User: iceman5508
 * Date: 10/18/2017
 * Time: 2:40 PM
 */

namespace ITemplate\iExtends;


abstract class iComponent
{
    private $component;
    private $page;
    private static $exports = array();

    /**
     * Component class entry point
     * iComponent constructor.
     * @param $page - The template page the component is for
     */
    public function __construct($page){
        $this->component = new iComponents();
        $this->page = $page;
    }

    /**
     * Return all variables
     * @return array
     */
    public final function getAllVars(){
        return $this->component->getVars();
    }

    /**
     * Export a component to make it loadable in the viewManager
     * @param $componentName
     */
    public static function export($componentName){
        self::$exports[$componentName] = iTags::get($componentName);
    }

    /**
     * Return the name of the page
     * @return mixed
     */
    public final function getPage(){
        return $this->page;
    }

    /**
     * Return all exported components
     * @return array
     */
    public static function getExports(){
        return self::$exports;
    }

    /**Get a specific exported component
     * @param $componentName
     * @return mixed
     */
    public static function getExport($componentName){
        return self::$exports[$componentName];
    }

    public function __destruct(){
        $this->component->__destruct();
        unset($this->component);
        unset($this->page);
    }

    public final function __set($name, $value)
    {
        $this->component->__set($name,$value);
    }

    public final function __get($name)
    {
        return $this->component->__get($name);
    }



}