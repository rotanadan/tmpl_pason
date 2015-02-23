<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$class = ' class="first"';
JHtml::_('bootstrap.tooltip');
$lang	= JFactory::getLanguage();

if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		if (!isset($this->items[$this->parent->id][$id + 1]))
		{
			$class = ' class="last"';
		}
		?>
		<?php $class = ''; ?>
            <?php // only out put items without children -- hacks & overrides core behavior ?>
            <?php if (count($item->getChildren()) == 0 && $this->maxLevelcat > 1) : ?>

            <div class="item product-item span4" id="category-<?php echo $item->id;?>">

                <?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) : ?>
                    <a class="product-link" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>">
                        <h3 class="page-header item-title">

                            <?php echo $this->escape($item->title); ?>

                            <?php if ($this->params->get('show_cat_num_articles_cat') == 1) :?>
                                <span class="badge badge-info tip hasTooltip" title="<?php echo JHtml::tooltipText('COM_CONTENT_NUM_ITEMS'); ?>">
                            <?php echo $item->numitems; ?>
                        </span>
                            <?php endif; ?>
                        </h3>
                        <img src="<?php echo $item->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt')); ?>" />
                        <?php
                            $image_path = $item->getParams()->get('image');
                            $image_path = str_replace('.jpg', '-hover.jpg', $image_path);

                        ?>

                        <?php if (file_exists($image_path)): ?>
                            <img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt')); ?>" class="hover" />
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php endif;?>

			<?php if ($this->params->get('show_subcat_desc_cat') == 1) :?>
				<?php if ($item->description) : ?>
					<div class="category-desc">
						<?php echo JHtml::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>


			<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) :?>
				<?php
				$this->items[$item->id] = $item->getChildren();
				$this->parent = $item;
				$this->maxLevelcat--;

				echo $this->loadTemplate('items');
				$this->parent = $item->getParent();
				$this->maxLevelcat++;
				?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
