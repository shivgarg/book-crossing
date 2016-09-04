	<div class="reports">
		<h4><?php __('Reports'); ?></h4>
		<dl>		
			<dt><?php __('Discounted Amount this year'); ?></dt>
			<dd><?php echo ($yrdiscounts['0']['0']['SUM(`Cart`.`discountedamount`)']) ? $yrdiscounts['0']['0']['SUM(`Cart`.`discountedamount`)'] : "No sales";?></dd>
			
			<dt class="altrow"><?php __('Discounted Amount today'); ?></dt>
			<dd class="altrow"><?php echo ($tydiscounts['0']['0']['SUM(`Cart`.`discountedamount`)']) ? $tydiscounts['0']['0']['SUM(`Cart`.`discountedamount`)'] : "None";?></dd>
			
			<dt><?php __('Amount collected this year'); ?></dt>
			<dd><?php echo ($yramounts['0']['0']['SUM(`Cart`.`amount`)'])? $yramounts['0']['0']['SUM(`Cart`.`amount`)'] : "No sales";?></dd>
			
			<dt class="altrow"><?php __('Amount collected today'); ?></dt>
			<dd class="altrow"><?php echo ($tyamounts['0']['0']['SUM(`Cart`.`amount`)'])? $tyamounts['0']['0']['SUM(`Cart`.`amount`)']: "No sales";?></dd>

			<dt><?php __('Sales this year'); ?></dt>
			<dd><?php echo ($yrsales) ? $yrsales : "No sales";?></dd>	
			
			<dt class="altrow"><?php __('Sales Today'); ?></dt>
			<dd class="altrow"><?php echo ($tysales) ? $tysales : "No sales";?></dd>	
		</dl>
	</div>
	
	
