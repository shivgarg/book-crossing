<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Bookstore Management and Reporting'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		//echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic', 'ui-darkness/jquery-ui'));	

		echo $scripts_for_layout;
		/*echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js');*/
		echo $this->Html->script(array('jquery', 'jquery-ui'));

	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<?php echo /*$this->Html->link(*/
				$this->Html->image('bookstoremanagement.jpg', array('height' => '59px', 'width' => '250px'));/*,
				array('controller' => 'carts', 'action' => 'search'),
				array('escape' => false, 'title' => 'Search')
			);*/
		?>
			<p><?php __('Bookstore Management and Sales Reporting'); ?></p>
			<ul class="menu">
				<?php if(isset($menus)) :?>
					<?php 
						foreach($menus as $label => $menu):
						$class = ($this->params['controller'] === $menu['controller']) ? 'active' : '';
					?>
						<li class="active"><?php echo $this->Html->link(ucfirst(strtolower($label)), $menu, array('class' => $class)); ?></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
			<?php if(isset($companyInfos)) :?>
				<p>This product is licensed for use to</p>
				<p><?php echo $companyInfos['CompanyTitle']. "<br/>" .$companyInfos['CompanyAdressStreet']. "<br/>" .$companyInfos['CompanyAdressLocation']. "<br/>". $companyInfos['CompanyContactPhone']. "<br/>". $companyInfos['CompanyContactMobile']. "<br/>" ;?></p>
				
			<?php endif; ?>
		</div>
	</div>
		<script type="text/javascript">
			$(function(){
							$('input:submit').button();
							$('input[rel=date]').datepicker({ dateFormat: 'yy-mm-dd' , yearRange: "2009:2010"});
							$('a[rel*=buttonify]').button();
				});
		</script>
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
