<?php
/**
 * Review order form template
 * DISCLAIMER
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package             Jigoshop
 * @category            Checkout
 * @author              Jigoshop
 * @copyright           Copyright © 2011-2014 Jigoshop.
 * @license             GNU General Public License v3
 */

$options = Jigoshop_Base::get_options(); ?>
<div id="order_review">
	<table class="shop_table" style="color:black;">
		<thead>
		<tr>
			<th><?php echo translate_text('Proizvod','Производ', ICL_LANGUAGE_CODE); ?></th>
			<th><?php echo translate_text('Količina','Количина', ICL_LANGUAGE_CODE); ?></th>
			<th><?php echo translate_text('Vrsta hleba','Врста хлеба', ICL_LANGUAGE_CODE); ?></th>
			<th><?php echo translate_text('Dodaci','Додаци:', ICL_LANGUAGE_CODE); ?></th>
			<th><?php echo translate_text('Ukupno','Укупно', ICL_LANGUAGE_CODE); ?></th>

		</tr>
		</thead>
		<tfoot>
		
		<tr>
			<td colspan="2"><strong><?php _e('Ukupno', 'jigoshop'); ?></strong></td>
			<td><strong><?php echo jigoshop_cart::get_total(); ?></strong></td>
		</tr>
		</tfoot>
		<tbody>
		<?php
		
		foreach (jigoshop_cart::$cart_contents as $item_id => $values) :
			/** @var jigoshop_product $product */
			$product = $values['data'];
			if ($product->exists() && $values['quantity'] > 0) :
				$variation = jigoshop_cart::get_item_data($values);
				$customization = '';
				$custom_products = (array)jigoshop_session::instance()->customized_products;
				$product_id = !empty($values['variation_id']) ? $values['variation_id'] : $values['product_id'];
				$custom = isset($custom_products[$product_id]) ? $custom_products[$product_id] : ''; ?>
				<tr>
					<td class="product-name">
						<?php echo $product->get_title().$variation;
						if (!empty($custom)) :
							$label = apply_filters('jigoshop_customized_product_label', __(' Personal: ', 'jigoshop')); ?>
							<dl class="customization">
								<dt class="customized_product_label">
									<?php echo $label; ?>
								</dt>
								<dd class="customized_product">
									<?php echo $custom; ?>
								</dd>
							</dl>
						<?php endif; ?>
					</td>
					<td><?php echo $values['quantity']; ?></td>
					
					<td><?php echo $values['bread']; ?></td>
					<td><?php
  $dodaci = $values['dodaci'];
  if(empty($dodaci)) 
  {
    echo("");
  } 
  else
  {
    $N = count($dodaci);
 
    for($i=0; $i < $N; $i++)
    {
      echo(esc_attr($dodaci[$i] . ","));
    }
  }
?></td>
<td>
						<?php
						echo jigoshop_price($product->get_defined_price() * $values['quantity'], array('ex_tax_label' => Jigoshop_Base::get_options()->get('jigoshop_show_prices_with_tax') == 'yes' ?  2 : 1));
						?></td>
				</tr>
			<?php endif;
		endforeach;
		?>
		</tbody>
	</table>

	
</div>
