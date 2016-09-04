<?php if(!empty($reports)): ?>
	<div id="MonthlyReports">
		<h3>Monthly Report from <?php echo $this->Time->niceShort($reports['date']['initial']). " to ". $this->Time->niceShort($reports['date']['final']); ?></h3>
		<?php
			$customers = '';
			$max ='';
			$min ='';
			$max['Discount']['value'] = $reports['carts']['0']['Cart']['discount'];
			$max['Discount']['id'] = $reports['carts']['0']['Cart']['id'];
			$min['Discount']['value'] = $reports['carts']['0']['Cart']['discount'];
			$min['Discount']['id'] = $reports['carts']['0']['Cart']['id'];
			$max['Discounted Amount']['value'] = $reports['carts']['0']['Cart']['discountedamount'];
			$max['Discounted Amount']['id'] = $reports['carts']['0']['Cart']['id'];
			$min['Discounted Amount']['value'] = $reports['carts']['0']['Cart']['discountedamount'];
			$min['Discounted Amount']['id'] = $reports['carts']['0']['Cart']['id'];
			$max['Amount']['value'] = $reports['sales']['0']['Cart']['amount'];
			$max['Amount']['id'] = $reports['sales']['0']['Cart']['id'];
			$min['Amount']['value'] = $reports['sales']['0']['Cart']['amount'];
			$min['Amount']['id'] = $reports['sales']['0']['Cart']['id'];
			$totalDiscount = 0;
			$totalDiscountedAmount = 0;
			$totalAmount = 0;
			$sales = 0;
			$categories = '';
			foreach($reports['sales'] as $cart) {
				$categories[$cart['Book']['Category']['id']]['name'] = $cart['Book']['Category']['name']; 
				$categories[$cart['Book']['Category']['id']]['count'] =	(isset($categories[$cart['Book']['Category']['id']]['count'])) ? $categories[$cart['Book']['Category']['id']]['count'] : 0;
				$categories[$cart['Book']['Category']['id']]['count']++;
			}
			foreach($reports['carts'] as $cart) {
				
				$sales++;
				
				$customers[$cart['Customer']['id']] = $cart['Customer'];	
			
							
				$totalDiscount += $cart['Cart']['discount'];
				$totalDiscountedAmount += $cart['Cart']['discountedamount'];
				$totalAmount += $cart['Cart']['amount'];
				
				
				if($cart['Cart']['discount'] > $max['Discount']['value']) {
					$max['Discount']['value'] = $cart['Cart']['discount'];
					$max['Discount']['id'] = $cart['Cart']['id'];
				}
				if($cart['Cart']['discount'] < $min['Discount']['value']) {
					$min['Discount']['value'] = $cart['Cart']['discount'];
					$min['Discount']['id'] = $cart['Cart']['id'];
				}
				if($cart['Cart']['discountedamount'] > $max['Discounted Amount']['value']) {
					$max['Discounted Amount']['value'] = $cart['Cart']['discountedamount'];
					$max['Discounted Amount']['id'] = $cart['Cart']['id'];
				} 
				if($cart['Cart']['discountedamount'] < $min['Discounted Amount']['value']) {
					$min['Discounted Amount']['value'] = $cart['Cart']['discountedamount'];
					$min['Discounted Amount']['id'] = $cart['Cart']['id'];
				} 
				if($cart['Cart']['amount'] > $max['Amount']['value']) {
					$max['Amount']['value'] = $cart['Cart']['amount'];
					$max['Amount']['id'] = $cart['Cart']['id'];
				} 
				if($cart['Cart']['discountedamount'] < $min['Amount']['value']) {
					$min['Amount']['value'] = $cart['Cart']['amount'];
					$min['Amount']['id'] = $cart['Cart']['id'];
				}  
				 		
			}	
			$max['Discount']['value'] .= "%";
			$min['Discount']['value'] .= "%";	
			
			$period['Total Sales Recorded'] = round($sales, 0, PHP_ROUND_HALF_UP);
			$period['Average Discount'] = round($totalDiscount/$sales, 0, PHP_ROUND_HALF_UP). "%";
			$period['Average Discounted Amount'] = round($totalDiscountedAmount/$sales, 0, PHP_ROUND_HALF_UP);
			$period['Average Total per sale'] = round($totalAmount/$sales, 0, PHP_ROUND_HALF_UP);
			$period['Total Discounted Amount'] = $totalDiscountedAmount;
			$period['Total Amount Collected'] = $totalAmount;
			 
		?>
		
		<h4>Period Overview</h4>
		<table>
			<tr>
				<th>S. No</th>
				<th>Attribute</th>
				<th>Value</th>
			</tr>
			<?php $count=0;?>
			<?php foreach($period as $attribute => $val) :?>
				<tr>
					<?php $count++;?>
					<td><?php echo $count;?></td>
					<td><?php echo $attribute;?></td>
					<td><?php echo $val;?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		<h4>Maximum observations</h4>
		<table>
			<tr>
				<th>S. No</th>
				<th>Attribute</th>
				<th>Value</th>
				<th>Actions</th>				
			</tr>
			<?php $count =0; ?>
			<?php foreach($max as $attribute => $vals) :?>
				<?php $count++;?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $attribute;?></td>
					<td><?php echo $vals['value'];?></td>
					<td><?php echo $this->Html->link('View', array('controller' => 'carts', 'action' => 'view', $vals['id']));?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		
		
		<h4>Minimum observations</h4>
		<table>
			<tr>
				<th>S. No</th>
				<th>Attribute</th>
				<th>Value</th>
				<th>Actions</th>				
			</tr>
			<?php $count =0; ?>
			<?php foreach($min as $attribute => $vals) :?>
				<?php $count++;?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $attribute;?></td>
					<td><?php echo $vals['value'];?></td>
					<td><?php echo $this->Html->link('View', array('controller' => 'carts', 'action' => 'view', $vals['id']));?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		
		<h4>Customers</h4>
		<table>
			<tr>
				<th>S. No</th>
				<th>Name</th>
				<th>Adress</th>
				<th>Actions</th>				
			</tr>
			<?php $count =0; ?>
			<?php foreach($customers as $customer) :?>
				<?php $count++;?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $customer['name'];?></td>
					<td><?php echo $customer['adress'];?></td>
					<td><?php echo $this->Html->link('View', array('controller' => 'customers', 'action' => 'view', $customer['id']));?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		
		<h4>Sales by Book Categories</h4>
		<table>
			<tr>
				<th>S. No</th>
				<th>Name</th>
				<th>Sales</th>	
				<th>Action</th>			
			</tr>
			<?php $count =0; ?>
			<?php foreach($categories as $category => $vals) :?>
				<?php $count++;?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $vals['name'];?></td>
					<td><?php echo $vals['count'];?></td>
					<td><?php echo $this->Html->link('View', array('controller' => 'customers', 'action' => 'view', $customer['id']));?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		
		<h4>Sales by Date</h4>
		<table>
			<tr>
				<th>S. No</th>
				<th>Date</th>
				<th>Sales</th>			
			</tr>
			<?php $count =0; ?>
			<?php foreach($reports['cartsondates'] as $container) :?>
				<?php $count++;?>
				<?php foreach($container as $vals):?>
					<tr>
						<td><?php echo $count;?></td>
						<td><?php echo $this->Time->niceShort($vals['date']);?></td>
						<td><?php echo $vals['sales'];?></td>
					</tr>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</table>
	</div>
<?php else: ?>

<?php endif; ?>