<div class="books form">
<?php echo $this->Form->create('Book');?>
	<fieldset>
 		<legend><?php __('Add Book'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('published_year', array('type' => 'text', 'rel' => 'date'));
		echo $this->Form->input('edition');
		echo $this->Form->input('title');
		echo $this->Form->input('ISBN');
		echo $this->Form->input('price');
		echo $this->Form->input('stock');
		echo $this->Form->input('category_id');
		echo $this->Form->input('author_id');
		echo $this->Form->input('Publication', array('multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Books', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Publications', true), array('controller' => 'book_publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Publication', true), array('controller' => 'book_publications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale', true), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>