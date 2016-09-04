<div class="bookPublications view">
<h2><?php  __('Book Publication');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bookPublication['BookPublication']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Book'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($bookPublication['Book']['title'], array('controller' => 'books', 'action' => 'view', $bookPublication['Book']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Publication'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($bookPublication['Publication']['name'], array('controller' => 'publications', 'action' => 'view', $bookPublication['Publication']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Book Publication', true), array('action' => 'edit', $bookPublication['BookPublication']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Book Publication', true), array('action' => 'delete', $bookPublication['BookPublication']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bookPublication['BookPublication']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Publications', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Publication', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books', true), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book', true), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications', true), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication', true), array('controller' => 'publications', 'action' => 'add')); ?> </li>
	</ul>
</div>
