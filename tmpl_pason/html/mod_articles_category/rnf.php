<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<?php if ($params->get('showtitle')): ?>
<h5>
	<?php echo $module->title; ?>
</h5>
<?php endif; ?>

<div class="row">
	<?php foreach ($list as $item) : ?>

		<div class ="col-md-12">
			<?php $images = json_decode($item->images); ?>
				<img src="<?php echo JUri::root(); ?>/images/file-icon.png" style="margin-right: 5px;margin-bottom: 5px;"/>

			<?php $urls = json_decode($item->urls); ?>

			<?php if ($params->get('link_titles') == 1) : ?>
				<a href="<?php echo $urls->urla; ?>" class="magnify-link">
					<?php echo $item->title; ?>
				</a>
			<?php else : ?>
				<?php echo $item->title; ?>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>

