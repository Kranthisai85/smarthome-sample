<?php
/**
 * @package Helix Ultimate Framework
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2018 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

defined ('_JEXEC') or die();

JHtml::_('stylesheet', 'mod_languages/template.css', array('version' => 'auto', 'relative' => true));

if ($params->get('dropdown', 1) && !$params->get('dropdownimage', 0))
{
	JHtml::_('formbehavior.chosen');
}
?>
<div class="mod-languages">
<?php if ($headerText) : ?>
	<div class="pretext"><p><?php echo $headerText; ?></p></div>
<?php endif; ?>

<?php if ($params->get('dropdown', 1) && !$params->get('dropdownimage', 0)) : ?>
	<form name="lang" method="post" action="<?php echo htmlspecialchars(JUri::current(), ENT_COMPAT, 'UTF-8'); ?>">
	<select class="inputbox advancedSelect" onchange="document.location.replace(this.value);" >
	<?php foreach ($list as $language) : ?>
		<option dir=<?php echo $language->rtl ? '"rtl"' : '"ltr"'; ?> value="<?php echo $language->link; ?>" <?php echo $language->active ? 'selected="selected"' : ''; ?>>
		<?php echo $language->title_native; ?></option>
	<?php endforeach; ?>
	</select>
	</form>
<?php elseif ($params->get('dropdown', 1) && $params->get('dropdownimage', 0)) : ?>
	
		<?php foreach ($list as $language) : ?>
			<?php if ($language->active) : ?>
				<a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
					<span class="caret"></span>
					<?php if ($language->image) : ?>
						&nbsp;<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', '', null, true); ?>
					<?php endif; ?>
					<?php echo '<span class="hidden-xs hidden-sm hidden-md">'.$language->title_native.'</span>'; ?>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
		<ul class="<?php echo $params->get('lineheight', 1) ? 'lang-block' : 'lang-inline'; ?> dropdown-menu" dir="<?php echo JFactory::getLanguage()->isRtl() ? 'rtl' : 'ltr'; ?>">
		<?php foreach ($list as $language) : ?>
			<?php if (!$language->active || $params->get('show_active', 0)) : ?>
				<li<?php echo $language->active ? ' class="lang-active"' : ''; ?>>
				<a href="<?php echo $language->link; ?>">
					<?php if ($language->image) : ?>
						<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', '', null, true); ?>
					<?php endif; ?>
					<?php echo $language->title_native; ?>
				</a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
		</ul>
	
<?php else : ?>
	<ul class="<?php echo $params->get('inline', 1) ? 'lang-inline' : 'lang-block'; ?>">
	<?php foreach ($list as $language) : ?>
		<?php if (!$language->active || $params->get('show_active', 0)) : ?>
			<li<?php echo $language->active ? ' class="lang-active"' : ''; ?> dir="<?php echo $language->rtl ? 'rtl' : 'ltr'; ?>">
			<a href="<?php echo $language->link; ?>">
			<?php if ($params->get('image', 1)) : ?>
				<?php if ($language->image) : ?>
					<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native), true); ?>
				<?php else : ?>
					<span class="label"><?php echo strtoupper($language->sef); ?></span>
				<?php endif; ?>
			<?php else : ?>
				<?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef); ?>
			<?php endif; ?>
			</a>
			</li>
		<?php endif; ?>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php if ($footerText) : ?>
	<div class="posttext"><p><?php echo $footerText; ?></p></div>
<?php endif; ?>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var ua = navigator.userAgent,
	_device = (ua.match(/iPad/i)||ua.match(/iPhone/i)||ua.match(/iPod/i)) ? "smartphone" : "desktop";
	
	if(_device == "desktop") {
		$(".mod-languages").on('hover', function() {
			$(this).children(".dropdown-toggle").addClass(function(){
				if($(this).hasClass("open")){
					$(this).removeClass("open");
					return "";
				}
				return "open";
			});
			$(this).children(".dropdown-menu").slideToggle();
		});
	}else{
		$('.mod-languages .dropdown-toggle').on('touchstart', function(){
			$('.mod-languages .dropdown-menu').toggle();
		});
	}
	$('.modal-backdrop').remove();
});
</script>