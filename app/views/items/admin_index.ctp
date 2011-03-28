<div class="items index">
<h2><?php __('Items');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('item_type_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('name_loc');?></th>
	<th><?php echo $paginator->sort('price');?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th><?php echo $paginator->sort('date_posted');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('hasCats');?></th>
	<th><?php echo $paginator->sort('hasDog');?></th>
	<th><?php echo $paginator->sort('hasPic');?></th>
	<th><?php echo $paginator->sort('bedrooms');?></th>
	<th><?php echo $paginator->sort('county');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($items as $item):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $item['Item']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($item['ItemType']['name'], array('controller'=> 'item_types', 'action'=>'view', $item['ItemType']['id'])); ?>
		</td>
		<td>
			<?php echo $item['Item']['name']; ?>
		</td>
		<td>
			<?php echo $item['Item']['name_loc']; ?>
		</td>
		<td>
			<?php echo $item['Item']['price']; ?>
		</td>
		<td>
			<?php echo $item['Item']['url']; ?>
		</td>
		<td>
			<?php echo $item['Item']['date_posted']; ?>
		</td>
		<td>
			<?php echo $item['Item']['created']; ?>
		</td>
		<td>
			<?php echo $item['Item']['hasCats']; ?>
		</td>
		<td>
			<?php echo $item['Item']['hasDog']; ?>
		</td>
		<td>
			<?php echo $item['Item']['hasPic']; ?>
		</td>
		<td>
			<?php echo $item['Item']['bedrooms']; ?>
		</td>
		<td>
			<?php echo $item['Item']['county']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $item['Item']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $item['Item']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $item['Item']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['Item']['id'])); ?>
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
		<li><?php echo $html->link(__('New Item', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Item Types', true), array('controller'=> 'item_types', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item Type', true), array('controller'=> 'item_types', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Searches', true), array('controller'=> 'searches', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Search', true), array('controller'=> 'searches', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>
