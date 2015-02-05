<?php
/**
 * @Author  Chad Windnagle
 * @Project tmpl-pason
 * Date: 2/5/15
 */

defined('_JEXEC') or die;

function modChrome_slide($module, $params, $attribs)
{
    echo    '<div class="item ' . $params->get('moduleclass_sfx') . '">';
    echo        $module->content;
    echo    '</div>';
}