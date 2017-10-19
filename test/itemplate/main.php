<?php
/**
 * Created by PhpStorm.
 * User: iceman5508
 * Date: 10/17/2017
 * Time: 11:24 PM
 */
require_once '../../ITemplate/ITemplate.php';
use ITemplate\iExtends\viewManager;


class main extends viewManager{

}
viewManager::registerComponent('header.php');
viewManager::registerComponent('middle.php');
viewManager::registerComponent('footer.php');

$main = new main('index.html');

$main->render();


