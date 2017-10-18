<?php
/**
 * Created by PhpStorm.
 * User: iceman5508
 * Date: 10/17/2017
 * Time: 11:24 PM
 */
require_once '../../ITemplate/ITemplate.php';
use ITemplate\iExtends\iView;
use ITemplate\iExtends\iComponent;

class mod extends iComponent {

}

$mod = new mod('home.html');
$mod->first_name = 'isaac';
$mod->title='Home Page';
$mod->age='23';


\ITemplate\iExtends\iTags::setTag('mod',$mod);
$template = new iView('mod');
$template->render();

