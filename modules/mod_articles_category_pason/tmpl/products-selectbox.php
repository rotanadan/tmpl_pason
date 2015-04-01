<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$input = JFactory::getApplication()->input;

$view = $input->get('view');

$isCategoryView = false;

if ($view == 'category')
{
    $isCategoryView = true;
}

?>

<select onChange="window.location.href=this.value">

    <?php if (isset($categoryLink)): ?>
        <option value="<?php echo JRoute::_($categoryLink); ?>" <?php if ($isCategoryView): ?> selected='selected' <?php endif; ?>>
                About
        </option>
    <?php endif; ?>

    <?php foreach ($list as $item) : ?>
        <option <?php if($item->active){echo "selected='selected'";} ?> value="<?php echo $item->link; ?>">
            <?php echo $item->title; ?>
        </option>
    <?php endforeach; ?>

    <option value="<?php echo JRoute::_('index.php?option=com_content&view=categories&layout=tmpl_pason:products&id=21&Itemid=52'); ?>">
        View All Products
    </option>

</select>
