<?php
/**
 * Created by PhpStorm.
 * User: iceman5508
 * Date: 10/17/2017
 * Time: 11:24 PM
 */
use ITemplate\iExtends\iComponent;
use ITemplate\iExtends\iTags;

class footer extends iComponent {

}

$footer = new footer('footer.html');
$footer->section = 'footer';


iTags::setTag('footer',$footer);

iComponent::export('footer');

