<div class="bookPublications form">
<?php echo $this->Form->create('BookPublication');?>
	<fieldset>
 		<legend><?php __('Edit Book Publication'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('book_id');
		echo $this->Form->input('publication_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('BookPublication.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('BookPublication.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Book Publications', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Books', true), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book', true), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications', true), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication', true), array('controller' => 'publications', 'action' => 'add')); ?> </li>
	</ul>
</div>