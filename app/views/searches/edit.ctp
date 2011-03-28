<div class="searches form">
<?php echo $form->create('Search');?>
	<fieldset>
 		<legend><?php __('Edit Search');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('query');
		echo $form->input('minAsk');
		echo $form->input('maxAsk');
		echo $form->input('bedrooms');
		echo $form->input('hasPic');
		echo $form->input('addTwo');
		echo $form->input('addThree');
		echo $form->input('srchType');
		echo $form->input('catAbbreviation');
		echo $form->input('Item');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Search.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Search.id'))); ?></li>
		<li><?php echo $html->link(__('List Searches', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
	</ul>
</div>
