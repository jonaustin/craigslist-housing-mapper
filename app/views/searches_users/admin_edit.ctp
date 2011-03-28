<div class="searchesUsers form">
<?php echo $form->create('SearchesUser');?>
	<fieldset>
 		<legend><?php __('Edit SearchesUser');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('search_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('SearchesUser.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('SearchesUser.id'))); ?></li>
		<li><?php echo $html->link(__('List SearchesUsers', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Searches', true), array('controller'=> 'searches', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Search', true), array('controller'=> 'searches', 'action'=>'add')); ?> </li>
	</ul>
</div>
