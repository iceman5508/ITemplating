<?php
/**
 * Created by PhpStorm.
 * User: parker10
 * Date: 10/17-/2017
 * Time: 9:34 PM
 */


class ITemplate{

    private static $instance = NULL;

    public static function dirHome(){
        //return 	getcwd().'/';
        return dirname(dirname(__FILE__)).'/ITemplate/';
    }

    /**
     * Get the current instance of the Engine
     */
    public static function getInstance(){
        if(!isset(self::$instance)) {
            self::$instance = new ITemplate();
        }
        return self::$instance;
    }

    public function loadFunctions(){
        $dir =  self::dirHome().'Functions';
        foreach(glob($dir.'/*.php') as $function) {
            require_once($function);
        }
    }

    private function __construct() {
        $this->loadFunctions();
    }

    function __destruct() {}

}

/**
 * Auto load classes as needed
 * @param $classname - the class name
 * @throws Exception
 */
function __autoload($classname){

    if(file_exists(ITemplate::dirHome().'Classes/'.basename($classname).'.php')){
        require_once ITemplate::dirHome().'Classes/'.basename($classname).'.php';
    }else if(file_exists(ITemplate::dirHome().'Classes/iExtensions/'.basename($classname).'.php')){
        require_once ITemplate::dirHome().'Classes/iExtensions/'.basename($classname).'.php';
    }else{
        throw new Exception ( 'No such class found '.$classname );
        die();
    }
}


ITemplate::getInstance();