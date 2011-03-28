<div class="searchesUsers view">
<h2><?php  __('SearchesUser');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $searchesUser['SearchesUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($searchesUser['User']['id'], array('controller'=> 'users', 'action'=>'view', $searchesUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Search'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($searchesUser['Search']['id'], array('controller'=> 'searches', 'action'=>'view', $searchesUser['Search']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit SearchesUser', true), array('action'=>'edit', $searchesUser['SearchesUser']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete SearchesUser', true), array('action'=>'delete', $searchesUser['SearchesUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $searchesUser['SearchesUser']['id'])); ?> </li>
		<li><?php echo $html->link(__('List SearchesUsers', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New SearchesUser', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Searches', true), array('controller'=> 'searches', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Search', true), array('controller'=> 'searches', 'action'=>'add')); ?> </li>
	</ul>
</div>
