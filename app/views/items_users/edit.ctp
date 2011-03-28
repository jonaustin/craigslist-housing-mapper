<div class="itemsUsers form">
<?php echo $form->create('ItemsUser');?>
	<fieldset>
 		<legend><?php __('Edit ItemsUser');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('item_id');
		echo $form->input('user_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('ItemsUser.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ItemsUser.id'))); ?></li>
		<li><?php echo $html->link(__('List ItemsUsers', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>
