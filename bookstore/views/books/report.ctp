<div class="actions">
	<ul>
		<li><a rel="reporting" href="criticalStock">Critical Stock</a></li>
		<li><a rel="reporting" href="outOfStock">Out of Stock</a></li>
		<li><a rel="reporting" href="totalBooks">Total Books</a></li>
		<li><a rel="reporting" href="orderSalesBooks">Sales Order</a></li>
		<li><a rel="reporting" href="customers">Customers</a></li>
		<li><a rel="ShowHide" href="salesreports">Monitor sales</a></li>
	</ul>
</div>	

	<div id="viewCorresponding" class="index"></div>
	
	<div id="criticalStock" class="index hide">
	<h4>Books in critical stock limit</h4>
		<?php if(!empty($criticalBooks)): ?>
			<table>
				<tr>
					<th>Name</th>
					<th>stock</th>
				</tr>
			<?php foreach($criticalBooks as $book): ?>
				<tr>
					<td><?php echo $this->Html->link($book['Book']['name'], array('controller' => 'books', 'action' => 'view', $book['Book']['id']));?></td>
					<td><?php echo $book['Book']['stock'];?></td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php else: ?>
			<p class="notice">
				No books in critical stock limit.
			</p>
		<?php endif; ?> 
	</div>

	<div id="outOfStock" class="index hide">
	<h4>Books out of stock.</h4>
		<?php if(!empty($outOfStockBooks)): ?>
			<table>
				<tr>
					<th>Name</th>
				</tr>
			<?php foreach($outOfStockBooks as $book): ?>
				<tr>
					<td><?php echo $this->Html->link($book['Book']['name'], array('controller' => 'books', 'action' => 'view', $book['Book']['id']));?></td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php else: ?>
			<p class="notice">
				Congratulations, none of your books are out of stock.
			</p>
		<?php endif; ?> 
	</div>
	
	<div id="totalBooks" class="index hide">
	<h4>Total books in stock.</h4>
		<?php if(!empty($totalBooks)): ?>
			<?php echo "We have currently $totalBooks books in our stock from ". count($authors). " Authors.";?><br/>
			<?php echo $this->Html->link('Click Here', array('controller' => 'books', 'action' => 'index')). " to view all Books in stock."; ?><br/>
			<?php echo $this->Html->link('Click Here', array('controller' => 'authors', 'action' => 'index', 1)). " to view all Authors, whose books are in stock."; ?>
		<?php else: ?>
			<p class="notice">
				Sorry, no books found.
			</p>
		<?php endif; ?> 
	</div>
	
	<div id="orderSalesBooks" class="index hide">
	<h4>Sale frequency of the book.</h4>
		<?php if(!empty($orderSalesBooks)): ?>
			<table>
				<tr>
					<th>Name</th>
					<th>Sales</th>
				</tr>
			<?php foreach($orderSalesBooks as $book): ?>
				<tr>
					<td><?php echo $this->Html->link($book['Book']['name'], array('controller' => 'books', 'action' => 'view', $book['Book']['id']));?></td>
					<td><?php echo $book['0']['counted'];?></td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php else: ?>
			<p class="notice">
				Sorry, no sales history could be retrieved.
			</p>
		<?php endif; ?> 
	</div>
	
	
	<div id="customers" class="index hide">
	<h4>Customers</h4>
		<?php if(!empty($customers)): ?>
			<table>
				<tr>
					<th>Name</th>
					<th>Purchases</th>
				</tr>
			<?php foreach($customers as $customer): ?>
				<tr>
					<td><?php echo $this->Html->link($customer['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $customer['Customer']['id'])); echo "<br/>".$customer['Customer']['adress']?></td>
					<td><?php echo $customer['0']['counted'];?></td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php else: ?>
			<p class="notice">
				Sorry, no customer's record was found.
			</p>
		<?php endif; ?> 
	</div>
	
	<div id="salesreports" class="index">
		<?php echo $this->Form->input('salesmonth1', array('rel' => 'date', 'label' => 'From date'));?>
		<?php echo $this->Form->input('salesmonth2', array('rel' => 'date', 'label' => 'To date'));?>
		<?php echo $this->Form->end('Generate Report');?>
		<?php echo $this->Html->link('reports', array('controller' => 'carts', 'action' => 'monthlyreport'), array('id' => 'ajaxsalesreport', 'class' => 'hide'));?>
		<div id="AjaxSalesReport"></div>
	</div>
	<script type="text/javascript">
		$(function() {
				$('div#salesreports').hide();
				$('div#viewCorresponding').html($('div#criticalStock').html());
				$('a[rel=reporting]').bind('click', function(eV) {
						eV.preventDefault();
						$('div#viewCorresponding').show();
						$('div#salesreports').hide();
						item = $(this);
						$('div#viewCorresponding').html($('div#'+$(item).attr('href')).html());

					});
				$('a[rel*=ShowHide]').bind('click', function(eV) {
						eV.preventDefault();
						$('div#viewCorresponding').hide();
						$('div#salesreports').show();
								
						
					});
				$('input:submit').bind('click', function(eV) {
					$.post($('a#ajaxsalesreport').attr('href'), {data: $('#salesmonth1').attr('value') + "&" +$('#salesmonth2').attr('value')}, function(response) {
									$('div#AjaxSalesReport').html(response);
								});
				});
			});
	</script>