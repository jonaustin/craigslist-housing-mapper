<div class="itemsSearches form">
<?php echo $form->create('ItemsSearch');?>
	<fieldset>
 		<legend><?php __('Add ItemsSearch');?></legend>
	<?php
		echo $form->input('item_id');
		echo $form->input('search_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List ItemsSearches', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Searches', true), array('controller'=> 'searches', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Search', true), array('controller'=> 'searches', 'action'=>'add')); ?> </li>
	</ul>
</div>
