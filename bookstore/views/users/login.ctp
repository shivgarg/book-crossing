<div id="UserLogin" class="add">
	<?php
		echo $this->Form->create('User', array('action' => 'login'));
			echo $this->Form->input('username');
			echo $this->Form->input('password');
		echo $this->Form->end('Login');
	?>
</div>
