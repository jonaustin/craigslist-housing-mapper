<div class="itemTypes form">
<?php echo $form->create('ItemType');?>
	<fieldset>
 		<legend><?php __('Edit ItemType');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('value');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('ItemType.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ItemType.id'))); ?></li>
		<li><?php echo $html->link(__('List ItemTypes', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
	</ul>
</div>
