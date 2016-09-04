<div class="authors view">
<h2><?php  __('Author');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Firstname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['firstname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lastname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['lastname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['title']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Author', true), array('action' => 'edit', $author['Author']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Author', true), array('action' => 'delete', $author['Author']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $author['Author']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books', true), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book', true), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Books');?></h3>
	<?php if (!empty($author['Book'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Published Year'); ?></th>
		<th><?php __('Edition'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('ISBN'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Stock'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th><?php __('Author Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($author['Book'] as $book):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $book['id'];?></td>
			<td><?php echo $book['name'];?></td>
			<td><?php echo $book['published_year'];?></td>
			<td><?php echo $book['edition'];?></td>
			<td><?php echo $book['title'];?></td>
			<td><?php echo $book['ISBN'];?></td>
			<td><?php echo $book['price'];?></td>
			<td><?php echo $book['stock'];?></td>
			<td><?php echo $book['category_id'];?></td>
			<td><?php echo $book['author_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'books', 'action' => 'view', $book['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'books', 'action' => 'edit', $book['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'books', 'action' => 'delete', $book['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $book['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Book', true), array('controller' => 'books', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
