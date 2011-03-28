<div class="itemTypes view">
<h2><?php  __('ItemType');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemType['ItemType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemType['ItemType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemType['ItemType']['value']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ItemType', true), array('action'=>'edit', $itemType['ItemType']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ItemType', true), array('action'=>'delete', $itemType['ItemType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemType['ItemType']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ItemTypes', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New ItemType', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Items');?></h3>
	<?php if (!empty($itemType['Item'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Item Type Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Name Loc'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Date Posted'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('HasCats'); ?></th>
		<th><?php __('HasDog'); ?></th>
		<th><?php __('HasPic'); ?></th>
		<th><?php __('Bedrooms'); ?></th>
		<th><?php __('County'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($itemType['Item'] as $item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $item['id'];?></td>
			<td><?php echo $item['item_type_id'];?></td>
			<td><?php echo $item['name'];?></td>
			<td><?php echo $item['name_loc'];?></td>
			<td><?php echo $item['price'];?></td>
			<td><?php echo $item['url'];?></td>
			<td><?php echo $item['date_posted'];?></td>
			<td><?php echo $item['created'];?></td>
			<td><?php echo $item['hasCats'];?></td>
			<td><?php echo $item['hasDog'];?></td>
			<td><?php echo $item['hasPic'];?></td>
			<td><?php echo $item['bedrooms'];?></td>
			<td><?php echo $item['county'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'items', 'action'=>'view', $item['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'items', 'action'=>'edit', $item['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'items', 'action'=>'delete', $item['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
