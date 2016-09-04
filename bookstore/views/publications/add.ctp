<div class="publications form">
<?php echo $this->Form->create('Publication');?>
	<fieldset>
 		<legend><?php __('Add Publication'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('adress');
		echo $this->Form->input('country_id');
		echo $this->Form->input('email');
		echo $this->Form->input('website');
		//echo $this->Form->input('Book', array('multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Publications', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Countries', true), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country', true), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books', true), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book', true), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>