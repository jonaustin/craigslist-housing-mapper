<div class="items form">
<?php echo $form->create('Item');?>
	<fieldset>
 		<legend><?php __('Edit Item');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('item_type_id');
		echo $form->input('name');
		echo $form->input('name_loc');
		echo $form->input('price');
		echo $form->input('url');
		echo $form->input('date_posted');
		echo $form->input('hasCats');
		echo $form->input('hasDog');
		echo $form->input('hasPic');
		echo $form->input('bedrooms');
		echo $form->input('county');
		echo $form->input('Search');
		echo $form->input('User');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Item.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Item.id'))); ?></li>
		<li><?php echo $html->link(__('List Items', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Item Types', true), array('controller'=> 'item_types', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item Type', true), array('controller'=> 'item_types', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Searches', true), array('controller'=> 'searches', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Search', true), array('controller'=> 'searches', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>
