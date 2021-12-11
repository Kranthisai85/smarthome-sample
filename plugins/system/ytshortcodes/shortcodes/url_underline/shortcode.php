<?php 
/*
* @package   YouTech Shortcodes
* @author    YouTech Company http://smartaddons.com/
* @copyright Copyright (C) 2015 YouTech Company
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
defined('_JEXEC') or die;
function url_underlineYTShortcode( $atts, $content = null ) {
		extract(ytshortcode_atts(array(
		"href"          => '#',
		"border"        => '',
		"background"    => '#fff',
		"color"         => '#000',
		"font_size"     => '14px',
		"align"         => 'none',
		"padding"       => '0px',
		"color_hover"   =>  '',
	), $atts));
		$id = uniqid('url_under_').rand().time();
		$css ='';
		$css .= '#'.$id.'.url_underline:hover{text-decoration:underline; border-bottom:none !important; color:'.$color.'}#'.$id.'.url_underline.pull-none{ margin:0 auto; display:inline-block}#'.$id.'.url_underline.pull-left{ margin:0 0 0 0px}#'.$id.'.url_underline.pull-right{ margin:0 0px}#'.$id.'.url_underline{border-bottom:'.$border.'; background:'.$background.'; padding-bottom:'.$padding.'; color:'.$color.'; font-size:'.$font_size.';}';
		$doc = JFactory::getDocument();
		$doc->addStyleDeclaration($css);
		return "<a class='url_underline pull-".$align."' id='".$id."' href='".$href."'> ".parse_shortcode(str_replace(array("<br/>","<br />","<p></p>"), " ", $content))." </a> ";


	}
?>