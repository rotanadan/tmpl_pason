<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<?php //foreach ($list as $i => &$item)
//{var_dump($item);}
//?>

<select onChange="window.location.href=this.value">
    <option selected disabled><?php echo $module->title; ?></option>
    <?php
    foreach ($list as $i => &$item)
    {
        $selected='';
        if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id))
        {
//            $selected='selected="selected"';
        }
        echo '<option '.$selected.' value="' . $item->link . '&Itemid='.$item->id.'">';

        // Render the menu item.
        echo $item->title;

        // The next item is deeper.
        if ($item->deeper)
        {
            echo '<ul class="nav-child unstyled small">';
        }
        elseif ($item->shallower)
        {
            // The next item is shallower.
            echo '</li>';
            echo str_repeat('</ul></li>', $item->level_diff);
        }
        else
        {
            // The next item is on the same level.
            echo '</option>';
        }
    }
    ?>
</select>
