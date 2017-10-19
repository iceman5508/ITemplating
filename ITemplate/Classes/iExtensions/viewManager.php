<?php
/**
 * Created by PhpStorm.
 * User: iceman5508
 * Date: 10/18/2017
 * Time: 9:05 PM
 */

namespace ITemplate\iExtends;
use ITemplate\iExtends\iView;
use ITemplate\iExtends\iComponent;


abstract class viewManager
{

    private $content;
    private $view;
    function __construct($mainFile)
    {
        $this->content = file_get_contents($mainFile);
        foreach (iComponent::getExports() as $tags => $value){
            if (strpos($this->content, $tags) !== false) {
                $this->content = str_replace("{#" . $tags . "}", $value, $this->content);
            }
        }
        $this->view = new iView();
        $this->view->setContent($this->content);
    }

    function render(){
        $this->view->render();
    }

    public static function registerComponent($location){
        require_once $location;
    }


    function __destruct()
    {
       unset($this->content);
        unset($this->view);
    }


}