<?php
/**
 * Created by PhpStorm.
 * User: iceman5508
 * Date: 10/17/2017
 * Time: 11:24 PM
 */
use ITemplate\iExtends\iComponent;
use ITemplate\iExtends\iTags;

class middle extends iComponent {

}

$middle = new middle('home.html');
$middle->section = "Isaac's shop";


iTags::setTag('middle',$middle);

iComponent::export('middle');

