<?php
/**
 * Created by PhpStorm.
 * User: iceman5508
 * Date: 10/17/2017
 * Time: 11:24 PM
 */
use ITemplate\iExtends\iComponent;
use ITemplate\iExtends\iTags;

class header extends iComponent {
    public function render()
    {
        // TODO: Implement render() method.
    }
}

$header = new header('header.html');
$header->title = 'Main Menu';


iTags::setTag('header',$header);

iComponent::export('header');

