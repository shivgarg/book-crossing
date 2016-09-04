
<?php 	
	if($reportings === 'true') { 
		echo '<div id="reports"></div>';
		echo $this->Html->link('Intelli Reports', array('controller' => 'carts', 'action' => 'intelli_report'), array('class' => 'hide', 'rel' => 'LinkIntelli'));
		echo $this->Html->script('home_reports');
	}
?>
<div id="AdminGui">
<?php
	echo $this->Html->link(
				$this->Html->image('user.jpg', array('height' => '143px', 'width' => '150px')),
				array('controller' => 'users'),
				array('escape' => false, 'title' => 'Users')
			);
	echo $this->Html->link(
				$this->Html->image('book.jpg', array('height' => '150px', 'width' => '150px')),
				array('controller' => 'books'),
				array('escape' => false, 'title' => 'Books')
			);
	echo $this->Html->link(
				$this->Html->image('settings.jpg', array('height' => '150px', 'width' => '150px')),
				array('controller' => 'settings', 'action' => 'index'),
				array('escape' => false, 'title' => 'Settings')
			);
	echo $this->Html->link(
				$this->Html->image('reports.jpg', array('height' => '150px', 'width' => '150px')),
				array('controller' => 'books', 'action' => 'report'),
				array('escape' => false, 'title' => 'Reports')
			);
	echo $this->Html->link(
				$this->Html->image('search.jpg', array('height' => '150px', 'width' => '150px')),
				array('controller' => 'carts', 'action' => 'search'),
				array('escape' => false, 'title' => 'Search')
			);		
?>
</div>

