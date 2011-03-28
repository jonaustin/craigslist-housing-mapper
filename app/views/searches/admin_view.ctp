<div class="searches view">
<h2><?php  __('Search');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Query'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['query']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('MinAsk'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['minAsk']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('MaxAsk'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['maxAsk']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bedrooms'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['bedrooms']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('HasPic'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['hasPic']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('AddTwo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['addTwo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('AddThree'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['addThree']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SrchType'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['srchType']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CatAbbreviation'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $search['Search']['catAbbreviation']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Search', true), array('action'=>'edit', $search['Search']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Search', true), array('action'=>'delete', $search['Search']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $search['Search']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Searches', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Search', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Items');?></h3>
	<?php if (!empty($search['Item'])):?>
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
		foreach ($search['Item'] as $item):
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
