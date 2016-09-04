<div class="sales form">
<?php echo $this->Form->create('Sale', array('action' => 'checkout'));?>
	<fieldset>
 		<legend><?php __('New Order'); ?></legend>
	<?php
		echo $this->Form->input('bookname', array('label' => 'Bookname or ISBN'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Continue', true));?>
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sales', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Books', true), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book', true), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
		<?php echo $this->Html->link('getBookLists', array('controller' => 'books', 'action' => 'index'), array('class' => 'hide', 'id' => 'getBookListAnchor'));?>
		<?php echo $this->Html->link('addToCart', array('controller' => 'sales', 'action' => 'addToCart'), array('class' => 'hide', 'id' => 'addToCart'));?>
</div>

	<?php echo $this->Html->script('order');?>


