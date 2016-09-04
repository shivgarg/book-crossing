<div id="SearchResult">asdf</div>
<div id="SearchFilters">
<p>
The filters below, will help you search for the sale invoice you seek. You can leave the fields that are unknown to you.
</p>
	<?php echo $this->Form->create('Cart', array('action' => 'search')); ?>
		<fieldset>
			<legend>Search Filter</legend>
			<?php
				echo $this->Form->input('CustomerName');
				echo $this->Form->input('InvoiceDate', array('label' => 'Invoiced date'));
				echo $this->Form->input('user_id', array('label' => 'Sale confirmed by'));
				echo $this->Form->input('amount');
				echo $this->Form->input('discount', array('label' => 'Discounted Amount'));
				echo $this->Form->end(__('Search', true));
			?>
		</fieldset>
	<?php echo $this->Html->link('Search link', array('action' => 'finder'), array('id' => 'SearchLink', 'class' => 'hide'));?>
</div>
<?php echo $this->Html->script(array('json-2.2', 'search'));?>


