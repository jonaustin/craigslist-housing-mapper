<div class="itemsUsers index">
<h2><?php __('ItemsUsers');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('item_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($itemsUsers as $itemsUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $itemsUser['ItemsUser']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($itemsUser['Item']['name'], array('controller'=> 'items', 'action'=>'view', $itemsUser['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($itemsUser['User']['id'], array('controller'=> 'users', 'action'=>'view', $itemsUser['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $itemsUser['ItemsUser']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $itemsUser['ItemsUser']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $itemsUser['ItemsUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsUser['ItemsUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New ItemsUser', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>
