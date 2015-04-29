<?php
/**
 * @var $cart array Cart items.
 * @var $coupons array List of applied coupons.
 */
$options = Jigoshop_Base::get_options();
?>

<?php jigoshop::show_messages(); ?>

<?php if (count($cart) == 0): ?>
<div id="cart" class="sticky cartbox" style="position: static; top: 46px; width: 248px;overflow:hidden !important;">
<h3 style="color:#ff9c00;"><?php echo translate_text('Kupovna korpa','Куповна корпа', ICL_LANGUAGE_CODE); ?></h3>
<p></p>
<div class="alert alert-block alert-block">
<h5 style="color:#ff9c00;;padding-top:10px;"><?php echo translate_text('Još uvek prazna...','Још увек празна...', ICL_LANGUAGE_CODE); ?></h5><br>
<p><?php echo translate_text('Da biste naručili, molimo kliknite na hranu koju želite i dodajte je u korpu.','Да бисте наручили, молимо kликните на храну коју желите и додајте је у корпу.', ICL_LANGUAGE_CODE); ?></p></div><p></p>
<br></div>
<?php else: ?>
<form class="form-cart-items" action="<?php echo esc_url(jigoshop_cart::get_cart_url()); ?>" method="post">
<div>

<div id="ordersidecontainer">
<div id="cart" class="sticky cartbox" style="-webkit-transition: all 0.6s ease; transition: all 0.6s ease; background-color: white;">
<h3 style="color:#ff9c00;"><?php echo translate_text('Kupovna korpa','Куповна корпа', ICL_LANGUAGE_CODE); ?></h3>
<p></p>
<h6 class="display">
<p style="color:#ff9c00;padding-top:5px;"><?php echo translate_text('Mle kuvar','Миле кувар', ICL_LANGUAGE_CODE); ?></p>
</h6>
<div class="stretchercont">
<div class="sidecart" id="cart1093">
<?php foreach ($cart as $cart_item_key => $values){
$product = $values['data']; ?>

<div class="order"><a href="<?php echo esc_url(jigoshop_cart::get_remove_url($cart_item_key)); ?>" class="remove" title="<?php echo esc_attr(__('Remove this item.', 'jigoshop')); ?>">&times;</a><?php echo esc_attr($values['quantity']); ?> x <b><?php echo apply_filters('jigoshop_cart_product_title', $product->get_title(), $product); ?></b><br><?php echo translate_text('Izbor hleba:','Избор хлеба:', ICL_LANGUAGE_CODE); ?><?php echo esc_attr($values['bread']); ?><br><?php echo translate_text('Dodaci:','Додаци:', ICL_LANGUAGE_CODE); ?><?php
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
?><br><?php echo translate_text('Cena','Цена:', ICL_LANGUAGE_CODE); ?> <?php echo apply_filters('jigoshop_product_price_display_in_cart', jigoshop_price($product->get_defined_price()), $values['product_id'], $values); ?> <hr></hr>
<?php } ?>
<b><?php echo translate_text('Ukupno:','Укупно:', ICL_LANGUAGE_CODE); ?><?php echo jigoshop_cart::get_total(); ?></b>
<br><br>
</div>
</div><p></p>
					<!--<a href="<?php echo esc_url(jigoshop_cart::get_checkout_url()); ?>" class="checkout-button button-alt"><?php echo translate_text('PORUČI','ПОРУЧИ', ICL_LANGUAGE_CODE); ?></a>-->
<a class="checkout-button button-alt" data-toggle="modal" data-target="#myModal"><?php echo translate_text('PORUČI','ПОРУЧИ', ICL_LANGUAGE_CODE); ?></a>
<div id="myModal" class="modal fade">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:black" aria-hidden="true">×</span></button>
      <h2 style="color:black"><?php echo translate_text('Mile Kuvar','Миле Кувар', ICL_LANGUAGE_CODE); ?></h2>
    </div>
	<div class="modal-body">
	<p><?php echo translate_text('Molimo Vas da za poručivanje pozovete broj telefona:','Молимо Вас да за поручивање позовете број телефона:', ICL_LANGUAGE_CODE); ?></p>
	</br>
	<h3 style="color:black">011/26-830-00</h3>
	</br>
	<p><b><?php echo translate_text('Dostava se vrši isključivo u periodu od 12:00 do 17:00!','Достава се врши искључиво у периоду од 12:00 до 17:00!', ICL_LANGUAGE_CODE); ?></br></b><?php echo translate_text(' Minimalni iznos porudžbine je 1000 dinara','Минимални износ наруџбине је 1000 динара.', ICL_LANGUAGE_CODE); ?></p><p></br><b><?php echo translate_text('Ograničenje isporuke!','Ограничење испоруке!', ICL_LANGUAGE_CODE); ?></b></br><?php echo translate_text(' Za oblast Stari Grad, dostava se vrši do 17 časova.','За област "Стари град" достава се врши до 17 часова.', ICL_LANGUAGE_CODE); ?></p>

	</div>
	
	
  </div>
</div>
</div>
</div>
	<table class="shop_table cart" style="display:none" cellspacing="0">
		<thead>
		<tr>
			<th class="product-remove" style="background:#3e4194 !important;"></th>
			<th class="product-thumbnail" style="background:#3e4194 !important;"></th>
			<th class="product-name" style="background:#3e4194 !important;"><span class="nobr" style="color:white;font-weight:bold;font-size:inherit;"><?php _e('Proizvod', 'jigoshop'); ?></span></th>
			<th class="product-price" style="background:#3e4194 !important;color:white;font-weight:bold;font-size:inherit"><span class="nobr"><?php _e('Cena', 'jigoshop'); ?></span></th>
			<th class="product-quantity" style="background:#3e4194 !important;color:white;font-weight:bold;font-size:inherit"><?php _e('Kolicina', 'jigoshop'); ?></th>
			<th class="product-subtotal" style="background:#3e4194 !important;color:white;font-weight:bold;font-size:inherit;"><?php _e('Ukupno', 'jigoshop'); ?></th>
		</tr>
		<?php do_action('jigoshop_shop_table_cart_head'); ?>
		</thead>
		<tbody>
		<?php foreach ($cart as $cart_item_key => $values): ?>
				<?php
				/** @var jigoshop_product $product */
				$product = $values['data'];
				if ($product->exists() && $values['quantity'] > 0) :
					$additional_description = jigoshop_cart::get_item_data($values);
					?>
					<tr style="background:#F3F781;" data-item="<?php echo $cart_item_key; ?>" data-product="<?php echo $product->id; ?>">
						<td style="border-color:#ff9c00" class="product-remove">
							<a href="<?php echo esc_url(jigoshop_cart::get_remove_url($cart_item_key)); ?>" class="remove" title="<?php echo esc_attr(__('Remove this item.', 'jigoshop')); ?>">&times;</a>
						</td>
						<td class="product-thumbnail" style="border-color:#ff9c00;">
<img style="vertical-align:text-top;" src='<?php echo $product->gtin ?>' height="35"/>						</td>
						<td class="product-name" style="border-color:#ff9c00;color:red;">
							<p>
								<?php echo apply_filters('jigoshop_cart_product_title', $product->get_title(), $product); ?>
								Izbor hleba: <?php echo esc_attr($values['bread']); ?>
								Dodaci: <?php
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
?><br/>
								Napomena: <?php echo esc_attr($values['description']);?>
								
							</p>
							<?php echo $additional_description; ?>
							<?php
							if (!empty($values['variation_id'])) {
								$product_id = $values['variation_id'];
							} else {
								$product_id = $values['product_id'];
							}
							$custom_products = (array)jigoshop_session::instance()->customized_products;
							$custom = isset($custom_products[$product_id]) ? $custom_products[$product_id] : '';
							if (!empty($custom_products[$product_id])):
								?>
								<dl class="customization">
									<dt style="color:white;" class="customized_product_label"><?php echo apply_filters('jigoshop_customized_product_label', __('Personal: ', 'jigoshop')); ?></dt>
									<dd style="color:white;"  class="customized_product"><?php echo esc_textarea($custom); ?></dd>
								</dl>
							<?php
							endif;
							?>
						</td>
						<td class="product-price" style="border-color:#ff9c00;color:rgb(62,65,148);font-weight:bold;font-size:inherit">
							<?php echo apply_filters('jigoshop_product_price_display_in_cart', jigoshop_price($product->get_defined_price()), $values['product_id'], $values); ?>
						</td>
						<td class="product-quantity" style="border-color:#ff9c00;color:white;width:100px">
							<?php ob_start(); // It is important to keep quantity in single line ?>
							<div class="quantity"><input name="cart[<?php echo $cart_item_key ?>][qty]" value="<?php echo esc_attr($values['quantity']); ?>" size="4" title="Qty" class="input-text qty text"  maxlength="12" /></div>
							<?php
							$quantity_display = ob_get_clean();
							echo apply_filters('jigoshop_product_quantity_display_in_cart', $quantity_display, $values['product_id'], $values);
							?>
						</td>
						<?php if(Jigoshop_Base::get_options()->get('jigoshop_show_prices_with_tax') == 'yes') : ?>
							<td class="product-total" style="border-color:#ff9c00;">
								<?php echo apply_filters('jigoshop_product_total_display_in_cart', jigoshop_price($product->get_defined_price() * $values['quantity']), $values['product_id'], $values); ?>
							</td>
						<?php else : ?>
							<td class="product-subtotal" style="border-color:#ff9c00;color:rgb(62,65,148);font-weight:bold;font-size:large"">
								<?php echo apply_filters('jigoshop_product_subtotal_display_in_cart', jigoshop_price($product->get_defined_price() * $values['quantity']), $values['product_id'], $values); ?>
							</td>
						<?php endif; ?>
					</tr>
				<?php
				endif;
		endforeach;
		do_action('jigoshop_shop_table_cart_body');
		?>
		</tbody>
		<tfoot>
		<tr>
			<td colspan="6" class="actions">
				<?php if (JS_Coupons::has_coupons()): ?>
					<div class="coupon">
						<label for="coupon_code"><?php _e('Coupon', 'jigoshop'); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" />
						<input type="submit" class="button" name="apply_coupon" value="<?php _e('Apply Coupon', 'jigoshop'); ?>" />
					</div>
				<?php endif; ?>

				<?php jigoshop::nonce_field('cart') ?>

				<?php if ($options->get('jigoshop_cart_shows_shop_button') == 'no'): ?>
					<noscript>
						<input type="submit" class="button" name="update_cart" value="<?php _e('Update Shopping Cart', 'jigoshop'); ?>" />
					</noscript>
					<a style="display:none"  href="<?php echo esc_url(jigoshop_cart::get_checkout_url()); ?>" class="checkout-button button-alt"><?php _e('Proceed to Checkout &rarr;', 'jigoshop'); ?></a>
				<?php else: ?>
					<noscript>
						<input type="submit" class="button" name="update_cart" value="<?php _e('Update Shopping Cart', 'jigoshop'); ?>" />
					</noscript>
				<?php endif; ?>
			</td>
		</tr>
		<?php if (count($coupons)): ?>
			<tr>
				<td colspan="6" class="applied-coupons">
					<div>
						<span class="applied-coupons-label"><?php _e('Applied Coupons: ', 'jigoshop'); ?></span>
						<?php foreach ($coupons as $code): ?>
							<a href="?unset_coupon=<?php echo $code; ?>" id="<?php echo $code; ?>" class="applied-coupons-values"><?php echo $code; ?>
								<span class="close">&times;</span>
							</a>
						<?php endforeach; ?>
					</div>
				</td>
			</tr>
		<?php endif; ?>
		<?php if ($options->get('jigoshop_cart_shows_shop_button') == 'yes') : ?>
			<tr>
				<td colspan="6" class="actions">
					<a href="<?php echo esc_url(jigoshop_cart::get_shop_url()); ?>" class="checkout-button button-alt" style="float:left;"><?php _e('&larr; Vrati se na naručivanje', 'jigoshop'); ?></a>
					<a style="display:none" href="<?php echo esc_url(jigoshop_cart::get_checkout_url()); ?>" class="checkout-button button-alt"><?php _e('Proceed to Checkout &rarr;', 'jigoshop'); ?></a>
				</td>
			</tr>
		<?php endif;
		do_action('jigoshop_shop_table_cart_foot');
		?>
		</tfoot>
		<?php do_action('jigoshop_shop_table_cart'); ?>
	</table>
</div>
</form>
<div class="cart-collaterals" style="display:none;">
	<?php do_action('cart-collaterals'); ?>
	<div class="cart_totals">
		<?php
		// Hide totals if customer has set location and there are no methods going there
		$available_methods = jigoshop_shipping::get_available_shipping_methods();

		if ($available_methods || !jigoshop_customer::get_shipping_country() || !jigoshop_shipping::is_enabled()):
			do_action('jigoshop_before_cart_totals');
			?>
			<h2><?php _e('Ukupno', 'jigoshop'); ?></h2>
			<div class="cart_totals_table">
				<table cellspacing="0" cellpadding="0">
					<tbody>
					<tr>
						
						<td class="cart-row-total" style="background:rgb(62,65,148);color:white"><strong><?php echo jigoshop_cart::get_total(); ?></strong></td>
					</tr>
					</tbody>
				</table>
			</div>
			<?php
			do_action('jigoshop_after_cart_totals');
		else :
			echo '<p>'.__(jigoshop_shipping::get_shipping_error_message(), 'jigoshop').'</p>';
		endif;
		?>
	</div>
</div>
<?php endif; ?>
