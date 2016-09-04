<?php

	$config['Login']['Allow'] = array(
					'users' => array('login')
				   );
	$config['Menu'] = array(
				'home' => array('controller' => 'pages'),
				'users' => array('controller' => 'users', 'action' => 'index'),
				'customers' => array('controller' => 'customers', 'action' => 'index'),
				'books' => array('controller' => 'books', 'action' => 'index'),
				'sales' => array('controller' => 'carts', 'action' => 'search'),
				'new sale' => array('controller' => 'sales', 'action' => 'order')
				);
