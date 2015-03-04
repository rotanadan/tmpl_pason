<?php
/**
 * @Author  Chad Windnagle
 * @Project tmpl-pason
 * Date: 2/5/15
 */

defined('_JEXEC') or die;



function modChrome_slide($module, $params, $attribs)
{
    echo    '<div class="item ' . $params->get('moduleclass_sfx') . '" data-slide-title="' . $module->title .'">';
    echo        $module->content;
    echo    '</div>';
}


function modChrome_featured($module, $params, $attribs)
{
    $title      = trim($module->title);
    $titleParts = explode(' ', $title);

    if (is_array($titleParts))
    {
        $title = '';

        $count = 1;
        foreach ($titleParts as $part)
        {
            $title .= $part . ' ';

            if (($count % 2) == 0)
            {
                $title .= '<br />';
            }
            $count++;
        }
    }


    echo '<div class="' . $params->get('moduleclass_sfx') . '">';
    echo    '<div class="featured-solution-inner">';
    echo        '<div class="featured-solution-title">';
    echo            '<h5>' . $title . '</h5>';
    echo            '<img src="/images/down-arrow.png" />';
    echo        '</div>';
    echo        '<div class="featured-solution-content"><div class="screen-over"></div>';

    echo            $module->content;
    echo        '</div>';
    echo    '</div>';
    echo '</div>';
}
