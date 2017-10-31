<?php
/**
 * Created by PhpStorm.
 * User: iceman5508
 * Date: 10/19/2017
 * Time: 9:12 PM
 * Router class
 */

namespace  ITemplate\iExtends;


class iRouter
{
    private static $route_list = array();
    private static $route_param = null;
    private static $component=null;
    public static $route = null;


    /**
     * Check if the router is called
     * @return bool
     */
    public static function callMade(){
        return (isset($_GET[self::$route_param])? true : false);
    }
    /**
     * Get the current instance of the route param as well as  set the  router url value
     * @param $route_param - The url param to use to pull routes
     */
    public static function runInstance($route_param){
        if(!isset(self::$route_param )) {
            self::$route_param = $route_param;
        }
    }

    /**
     * Register a specific route to a component
     * @param $route - The route that is being set
     * @param $componentLocation - The location of the php file containing the component
     * @return false if call could not be made.
     */
    public static function call($route, $componentLocation){
        self::$route_list[$route] = array(null,$componentLocation);
        if(file_exists($componentLocation))
        {
            require_once $componentLocation;
        }
        return false;

    }

    /**
     * Register a specific route to a component, meant for routes with the same tag name
     * @param $route - The route that is being set
     * @param $componentLocation - The location of the php file containing the component
     */
    public static function callOnce($route, $componentLocation){
        self::$route_list[$route] = array(null,$componentLocation);

    }

    /**The answer method that goes on the answering component page
     * @param $route
     * @param iComponent $component
     */
    public static function answer($route, iComponent $component){
        if(isset( self::$route_list[$route])){
            self::$route_list[$route][0] = $component;
        }

    }

    /**
     * Scan page for any routes
     */
    public static function scanner(){

        if(count(self::$route_list)>0 && isset($_GET[self::$route_param])){
            $data =  basename("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            if(isset(self::$route_list[$data])) {
                foreach (self::$route_list as $route => $component) {
                    if ($data == $route) {
                        self::$component = $component[0];
                        self::$route = $component[1];
                    }
                }
            }else{
                self::$component = null;
                return false;
            }
        }else{
            self::$component = null;
            return false;
        }
    }

    /**
     * Scan page for any routes
     */
    public static function scannerOnce(){

        if(count(self::$route_list)>0 && isset($_GET[self::$route_param])){
            $data =  basename("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            if(isset(self::$route_list[$data])){
                $component = self::$route_list[$data];
                self::$component = $component[0];
                self::$route = $component[1];
                if(file_exists($component[1]))
                {
                    require_once $component[1];
                }

            }
            else
            {
                self::$component = null;
                return false;
            }
        }else{
            self::$component = null;
            return false;
        }
    }

    /**
     * Render the current route
     */
    public static function render(){
        if(isset(self::$component)) {
            self::$component->render();
        }
    }

    /**
     * Set a router link
     * @param $linkName
     * @return string
     */
    public static function routerLink($linkName){
        return '?'.self::$route_param.'='.$linkName;
    }



}