<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
* Splits the title on every 2nd word. 
* @return string
*/

function titleBreak($title)
{
	$title      = trim($title);
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
    return $title;
}

?>

<?php foreach ($list as $item) : ?>

	<div class="featured-solution">

		<a target="_parent" href="<?php echo $item->link; ?>">
			<div class="featured-solution-inner">
				<div class="featured-solution-title">
					<h5 class="broken-title">
						<?php echo titleBreak($item->title); ?>
					</h5>
					<h5 class="unbroken-title">
						<?php echo $item->title; ?>
					</h5>
					<img src="<?php echo JUri::root(); ?>/images/down-arrow-lg.png"/>
				</div>

				<div class="featured-solution-content">
					<div class="screen-over"></div>	
					<?php $images = json_decode($item->images); ?>
						<img src="<?php echo JUri::root() . '/' . $images->image_intro; ?>" />
				</div>
				
			</div>
		</a>

	</div>
		
<?php endforeach; ?>	