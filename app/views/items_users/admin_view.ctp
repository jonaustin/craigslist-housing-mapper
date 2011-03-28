<div class="itemsUsers view">
<h2><?php  __('ItemsUser');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsUser['ItemsUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Item'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($itemsUser['Item']['name'], array('controller'=> 'items', 'action'=>'view', $itemsUser['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($itemsUser['User']['id'], array('controller'=> 'users', 'action'=>'view', $itemsUser['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ItemsUser', true), array('action'=>'edit', $itemsUser['ItemsUser']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ItemsUser', true), array('action'=>'delete', $itemsUser['ItemsUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsUser['ItemsUser']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ItemsUsers', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New ItemsUser', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>
