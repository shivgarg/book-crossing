<div class="related">
	<div class="companyinfo">
		<h3><?php echo $companyInfos['CompanyTitle'];?></h3>
		<p><?php echo $companyInfos['CompanyAdressStreet']."<br/>". $companyInfos['CompanyAdressLocation']. "<br/>". $companyInfos['CompanyContactPhone']. "<br/>". $companyInfos['CompanyContactMobile']. "<br/>" ;?></p>
	</div>
	<table>
		<tr>
			<td>Invoice for</td>
			<td><?php echo $cart['Customer']['name']. "<br/>". $cart['Customer']['adress'];?></td>
		</tr>
		<tr>
			<td>Invoice date</td>
			<td><?php echo $cart['Cart']['date'];?></td>
		</tr>
	</table>
	<?php if (!empty($cart['Sale'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('S. No'); ?></th>
		<th><?php __('Book'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Edition'); ?></th>
		<th><?php __('ISBN'); ?></th>
		<th><?php __('Unit Price'); ?></th>
		<th><?php __('Author'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Amount'); ?></th>
	</tr>
	<?php
		$i = 0;
		$totalAmount = 0;
		foreach ($cart['Sale'] as $sale):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $i;?></td>
			<td><?php echo $this->Html->link($sale['Book']['name'], array('controller' => 'books', 'action' => 'view', $sale['Book']['id']));?></td>
			<td><?php echo $sale['Book']['published_year'];?></td>
			<td><?php echo $sale['Book']['edition'];?></td>
			<td><?php echo $sale['Book']['ISBN'];?></td>
			<td><?php echo $sale['unit_price'];?></td>
			<td><?php echo $authors[$sale['Book']['author_id']];?></td>
			<td><?php echo $sale['quantity'];?></td>
			<td><?php $amount = $sale['unit_price'] * $sale['quantity']; $totalAmount += $amount; echo $amount;?></td>
		</tr>
	<?php endforeach; ?>
		<tr class="bolder">
			<td></td>
			<td>Sub Total</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php echo $totalAmount; ?></td>
		</tr>
		<tr class="bolder">
			<td></td>
			<td>Discount</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php $discount = $cart['Cart']['discount'] / 100; $discountAmount = $totalAmount * $discount; echo $discountAmount. " (". $cart['Cart']['discount']. "%)" ?></td>
		</tr>
		<tr class="bolder">
			<td></td>
			<td>Total (After discount)</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php echo $cart['Cart']['amount'];//$totalAmount - $discountAmount;?></td>
		</tr>
	</table>
<?php endif; ?>
<span>Confirmed by <strong><em><?php echo $this->Session->read('Auth.User.firstname'). " ". $this->Session->read('Auth.User.lastname');?></em></strong></span>
<?php if(!isset($print)):?>
	<?php echo $this->Html->link('Print', array('controller' => 'carts', 'action' => 'view',$cart['Cart']['id'], 'print'), array('rel' => 'buttonify'));?>
<?php else: ?>
	<script type="text/javascript">
		window.print();
	</script>
<?php endif; ?>
</div>
