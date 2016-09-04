<div class="sales">
<?php echo $this->Form->create('Cart', array('action' => 'add'));?>
	<fieldset>
		<legend>Customer Information</legend>
		<?php 
			echo $this->Form->input('Customer.name', array('rel' => 'EscapeNumeric'));
			echo $this->Form->input('Customer.adress', array('rel' => 'EscapeNumeric'));
		?>	
	</fieldset>
	<fieldset>
 		<legend><?php __('Cart Items'); ?></legend>
 		<table>
 			<tr>
 			   <th><?php __('S.No');?></th>
	 		   <th><?php __('Book');?></th>
	 		   <th><?php __('Published'); ?></th>
	 		   <th><?php __('Edition'); ?></th>
	 		   <th><?php __('ISBN'); ?></th>
	 		   <th><?php __('Unit Price'); ?></th>
	 		   <th><?php __('Stock'); ?></th>
	 		   <th><?php __('Author'); ?></th>
	 		   <th><?php __('Quantity'); ?></th>
	 		   <!--<th>__('VAT');</th>-->
	 		   <th><?php __('Amount'); ?></th>
	 		</tr>
			<?php 
				$count =0;
				foreach($books as $book) :				
						echo $this->Form->input('Sale.'. $count. '.book_id', array('type' => 'hidden', 'value' => $book['Book']['id']));
						echo $this->Form->input('Sale.'. $count. '.unit_price', array('type' => 'hidden', 'value' => $book['Book']['price']));
			?>
				<tr>
					<td><?php echo $count + 1;?></td>
					<td><?php echo $book['Book']['name'];?></td>
					<td><?php echo $book['Book']['published_year'];?></td>
					<td><?php echo $book['Book']['edition'];?></td>
					<td><?php echo $book['Book']['ISBN'];?></td>
					<td class="UnitPrice"><?php echo $book['Book']['price'];?></td>
					<td class="Stock"><?php echo $book['Book']['stock'];?></td>
					<td><?php echo $book['Author']['firstname']. ' '. $book['Author']['lastname'];?></td>
					<td><?php echo $this->Form->input('Sale.'. $count++. '.quantity', array('label' => false, 'class' => 'OrderQuantity'));?></td>
					<!--<td> echo ($book['Book']['vat']) ? 'Yes' : 'No';</td> --> 
					<td class="amount <?php //echo ($book['Book']['vat']) ? 'vat' : '';?>">0</td>
				</tr>
			<? endforeach; ?>
			<tr class="bolder">
				<td>Sub Total</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<!--<td></td>-->
				<td id="SubTotal">0</td>				
			</tr>
			<tr class="bolder">
				<td>Discount (%)</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><?php echo $this->Form->input('Cart.discount', array('label' => false, 'maxlength' => 2, 'class' => 'discount'));?></td>
				<!--<td></td>-->
				<td id="DiscountAmount"></td>				
			</tr>
			<tr class="bolder">
				<td>Total (After discount)</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<!--<td></td>-->
				<td></td>
				<td id="DiscountTotal"></td>				
			</tr>
			<!--
			<tr class="bolder">
				<td>Tax (%)</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><?php // echo $taxes; ?></td>
				<td></td>
				<td id="Tax">0</td>				
			</tr>
			<tr id="TaxBrief"></tr>
			-->
		</table>
	</fieldset>
<?php echo $this->Form->end(__('Confirm Sale', true));?>
</div>
<script type="text/javascript">
	$(function(){
			$('input').bind('keyup', function() {
					item = $(this);
					if($(item).attr('rel') == 'EscapeNumeric') {
						return true;
					}
					var regexp = /[^\d]/;
					if(regexp.test($(item).val())) {
						ValidationMessage = "<div id='ValidationError"+ $(item).attr('id')+"' class='message'>Only Numbers</div>";
						if(!$("div#ValidationError"+ $(item).attr('id')).length) {
							$(ValidationMessage).insertAfter(item);
						}
						$(item).val($(item).val().replace(/[^\d]/g, ""));
						return false;
					}
					if($("div#ValidationError"+ $(item).attr('id')).length) {
						$("div#ValidationError"+ $(item).attr('id')).remove();
					}
				if($(item).attr('class') === 'OrderQuantity') {
					OrderQuantity = Number($(item).val());
					StockQuantity = Number($(item).parents('tr:first').children('td.Stock:first').text());  
					UnitPrice = Number($(item).parents('tr:first').children('td.UnitPrice:first').text());
					
					if(OrderQuantity > StockQuantity) {
							if($('div#Error' + $(item).attr('id')).length) {
								return;
							}
							errorMsg = "<div class='message' id='Error"+ $(item).attr('id') +"'>Out of stock</div>";
							$(errorMsg).insertAfter(item);
							$('input[type=submit]').attr('disabled', 'disabled').css('opacity', '0.5');
					} else {
						if($('div#Error' + $(item).attr('id')).length) {
								$('div#Error' + $(item).attr('id')).remove();
						}
						if($('input[type=submit]').attr('disabled')) {
							$('input[type=submit]').removeAttr('disabled').css('opacity', '1');
						}
					}
					$(item).parents('tr:first').children('td.amount:first').text(OrderQuantity * UnitPrice);
					subValue = 0;
					$('td.amount').each(function() {
							amounts = $(this);
							subValue += Number($(amounts).text());
						});
					$('td#SubTotal').text(subValue);
					applyDiscount();
				} else if($(item).attr('class') === 'discount') {
					applyDiscount();
				}
				
				
		});
		
		var applyDiscount = function() {
					SubTotal = Number($('td#SubTotal').text());
					discount = Number($('input.discount').val() / 100);
					AmountAfterDiscount = SubTotal * discount;
					DiscountTotal = SubTotal - AmountAfterDiscount;
					$('td#DiscountAmount').text(AmountAfterDiscount); 
					$('td#DiscountTotal').text(DiscountTotal);
					//ApplyTax();
			}
		
		var ApplyTax = function() {
			count = 0;
			taxedItems = "<br/>";
			exemptedItems = "<br/>";
			$('td.amount').each(function() {
							amounts = $(this);
							if($(amounts).hasClass('vat')) {
								taxedItems += $(amounts).parents('tr:first').children('td:first').text() + ". "+ $(amounts).parents('tr:first').children('td:nth-child(2)').text()+ "<br/>"; 
								console.log(taxedItems);
							} else {
								exemptedItems += $(amounts).parents('tr:first').children('td:first').text() + ". "+ $(amounts).parents('tr:first').children('td:nth-child(2)').text()+ "<br/>"; 
							}	
							Taxed = "<div id='TaxedItems'><h3>Taxed Items</h3>" + taxedItems + "</div";
							NonTaxed = "<div id='NonTaxedItems'><h3>Tax Exempted Items</h3>" + exemptedItems + "</div";
						});
					$("#TaxBrief").html(Taxed + NonTaxed);
		}
	});
</script>