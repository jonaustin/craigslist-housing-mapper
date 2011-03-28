<div class="itemsSearches view">
<h2><?php  __('ItemsSearch');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsSearch['ItemsSearch']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Item'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($itemsSearch['Item']['name'], array('controller'=> 'items', 'action'=>'view', $itemsSearch['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Search'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($itemsSearch['Search']['id'], array('controller'=> 'searches', 'action'=>'view', $itemsSearch['Search']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ItemsSearch', true), array('action'=>'edit', $itemsSearch['ItemsSearch']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ItemsSearch', true), array('action'=>'delete', $itemsSearch['ItemsSearch']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsSearch['ItemsSearch']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ItemsSearches', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New ItemsSearch', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Searches', true), array('controller'=> 'searches', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Search', true), array('controller'=> 'searches', 'action'=>'add')); ?> </li>
	</ul>
</div>
