<div class="books <?php echo (!$ajax) ? 'index' : '';?>">
	<?php echo (!$ajax) ? "<h2>Books</h2> " : ''; ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<?php if($ajax) :?>
				<th><?php echo $this->Paginator->sort('Add to cart');?></th>
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('published_year');?></th>
			<th><?php echo $this->Paginator->sort('edition');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('ISBN');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('stock');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('author_id');?></th>

			<?php if(!$ajax): ?>
				<th class="actions"><?php __('Actions');?></th>
			<?php endif; ?>
	</tr>
	<?php
	$i = 0;
	foreach ($books as $book):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<?php if($ajax): ?>
			<td><?php echo $this->Html->link(
							$this->Html->image('icon_shopcart.jpg', array('alt' => 'Add to Cart', 'title' => 'Add to Cart')),	
							array('url' => array('cart')),
							array('escape' => false, 'rel' => 'addToCart', 'id' => $book['Book']['id'])
						);?> &nbsp;</td>
		<?php endif; ?>
		<td><?php echo $book['Book']['name']; ?>&nbsp;</td>
		<td><?php echo $book['Book']['published_year']; ?>&nbsp;</td>
		<td><?php echo $book['Book']['edition']; ?>&nbsp;</td>
		<td><?php echo $book['Book']['title']; ?>&nbsp;</td>
		<td><?php echo $book['Book']['ISBN']; ?>&nbsp;</td>
		<td><?php echo $book['Book']['price']; ?>&nbsp;</td>
		<td><?php echo $book['Book']['stock']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($book['Category']['name'], array('controller' => 'categories', 'action' => 'view', $book['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($book['Author']['firstname']." ". $book['Author']['lastname'], array('controller' => 'authors', 'action' => 'view', $book['Author']['id'])); ?>
		</td>
		<?php if(!$ajax): ?>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $book['Book']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $book['Book']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $book['Book']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $book['Book']['id'])); ?>
		</td>
		<?php endif; ?>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php if(!$ajax): ?>
	<div class="actions">
		<h3><?php __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Book', true), array('action' => 'add')); ?></li>
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
<?php endif; ?>
