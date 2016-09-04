<?php //debug($results);?>
<?php if(!empty($results)):?>
	<div class="results">
		<table>
			<tr>
				<th>Date</th>
				<th>Seller</th>
				<th>Buyer</th>
				<th>Items</th>
				<th>Discount</th>
				<th>Amount (Discount)</th>
				<th>Amount</th>
				<th>View</th>
			</tr>
			
			<?php foreach($results as $result) :?>
			<tr>
				<td><?php echo $result['Cart']['date'];?></td>
				<td><?php echo $result['User']['firstname']. " ". $result['User']['lastname'];?></td>
				<td><?php echo $result['Customer']['name']. "<br/>". $result['Customer']['adress'];?></td>
				<td>
					<table>
						<?php foreach($result['Sale'] as $item): ?>
						<tr>
							<?php echo $item['Book']['name']; ?>
						</tr>
						<?php endforeach; ?>
					</table>
				</td>
				<td><?php echo $result['Cart']['discount']."%"; ?></td>
				<td><?php echo $result['Cart']['discountedamount']; ?></td>
				<td><?php echo $result['Cart']['amount']; ?></td>
				<td><?php echo $this->Html->link('View', array('controller' => 'carts', 'action' => 'view', $result['Cart']['id']));?></td>
			</tr>
			<?php endforeach; ?>
				
			
		</table>
	</div>
<?php endif; ?>
