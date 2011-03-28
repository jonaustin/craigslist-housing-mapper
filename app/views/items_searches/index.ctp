<div class="itemsSearches index">
<h2><?php __('ItemsSearches');?></h2>
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
	<th><?php echo $paginator->sort('search_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($itemsSearches as $itemsSearch):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $itemsSearch['ItemsSearch']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($itemsSearch['Item']['name'], array('controller'=> 'items', 'action'=>'view', $itemsSearch['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($itemsSearch['Search']['id'], array('controller'=> 'searches', 'action'=>'view', $itemsSearch['Search']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $itemsSearch['ItemsSearch']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $itemsSearch['ItemsSearch']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $itemsSearch['ItemsSearch']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsSearch['ItemsSearch']['id'])); ?>
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
		<li><?php echo $html->link(__('New ItemsSearch', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Searches', true), array('controller'=> 'searches', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Search', true), array('controller'=> 'searches', 'action'=>'add')); ?> </li>
	</ul>
</div>
