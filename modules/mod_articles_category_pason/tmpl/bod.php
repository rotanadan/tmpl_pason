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
<h2>
	<?php echo $module->title; ?>
</h2>

<div class="row">
	<?php foreach ($list as $item) : ?>

		<div class ="col-md-6">
			<?php if ($params->get('show_introtext')) : ?>
				<?php echo $item->introtext; ?>
			<?php endif; ?>
		</div>

	<?php endforeach; ?>
</div>