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

    public function __construct($page){
        $this->component = new iComponents();
        $this->page = $page;
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

    public final function getAllVars(){
        return $this->component->getVars();
    }

    public final function getPage(){
        return $this->page;
    }



}