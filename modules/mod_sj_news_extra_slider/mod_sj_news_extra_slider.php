<?php
/**
 * @package SJ Extra Slider for Content
 * @version 3.2.1
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2014 YouTech Company. All Rights Reserved.
 * @author YouTech Company http://www.smartaddons.com
 *
 */

defined('_JEXEC') or die;
if(!isset($params) || !(count($params) > 0)) return;
require_once dirname(__FILE__) . '/core/helper.php';

$layout = $params->get('layout', 'default');
$cacheid = md5(serialize(array($layout, $module->id)));
$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'ContentExtrasliderHelper';
$cacheparams->method = 'getList';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;
$list = JModuleHelper::moduleCache($module, $params, $cacheparams);
require JModuleHelper::getLayoutPath($module->module, $layout);?>

