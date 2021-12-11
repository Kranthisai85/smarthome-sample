<?php
/**
* sublayout products
*
* @package    VirtueMart
* @author Max Milbers
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2014 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL2, see LICENSE.php
* @version $Id: cart.php 7682 2014-02-26 17:07:20Z Milbo $
*/

defined('_JEXEC') or die('Restricted access');

$product = $viewData['product'];
$position = $viewData['position'];
$customTitle = isset($viewData['customTitle'])? $viewData['customTitle']: false;;
if(isset($viewData['class'])){
    $class = $viewData['class'];
} else {
    $class = 'product-fields';
}

if (!empty($product->customfieldsSorted[$position])) {
    ?>
    <div class="module box2 <?php echo $class?>">
        <?php
        if($customTitle and isset($product->customfieldsSorted[$position][0])){
            $field = $product->customfieldsSorted[$position][0]; ?>
        <h3 class="modtitle product-fields-title-wrapper"><span class="product-fields-title"><?php echo vmText::_ ($field->custom_title) ?></span>
            <?php /* if ($field->custom_tip) {
                echo JHtml::tooltip (vmText::_($field->custom_tip), vmText::_ ($field->custom_title), 'tooltip.png');
            } */?>
        </h3> <?php }?>
        <div id="owl-carousel-related" class="owl-carousel modcontent product-fields-content-wrapper">
            <?php
            $custom_title = null;
            foreach ($product->customfieldsSorted[$position] as $field) {
                if ( $field->is_hidden || empty($field->display)) continue; //OSP http://forum.virtuemart.net/index.php?topic=99320.0
                ?><div class="item">
                    <?php if (!$customTitle and $field->custom_title != $custom_title and $field->show_title) { ?>
                        <span class="product-fields-title-wrapper"><span class="product-fields-title"><strong><?php echo vmText::_ ($field->custom_title) ?></strong></span>
                            <?php if ($field->custom_tip) {
                                echo JHtml::tooltip (vmText::_($field->custom_tip), vmText::_ ($field->custom_title), 'tooltip.png');
                            } ?></span>
                    <?php }
                    if (!empty($field->display)){
                        ?><div class="product-field-display"><?php echo $field->display ?></div><?php
                    }
                    ?>
                </div>
                <?php
                $custom_title = $field->custom_title;?>
                
            <?php } ?>
        </div>
        <!-- Javascript Block -->
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#owl-carousel-related").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items : 1,
                //Pagination
                pagination : false,
                paginationNumbers: false,
                nav: true,
                loop: true,
                margin: 30,
                responsive:{
                    0:{
                        items:1,
                        margin:8,
                    },
                    480:{
                        items:2,
                        margin:8,
                    },
                    768:{
                        items: 3,
                        margin: 8,
                    },
                    992:{
                        items: 3,
                        margin: 8,
                    },
                    1200:{
                        items: 4,
                    },
                },
                navText: '',
            });
        }); 
        </script>
    </div>
<?php
} ?>
