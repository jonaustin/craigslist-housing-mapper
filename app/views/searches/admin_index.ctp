<div class="searches index">
<h2><?php __('Searches');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('query');?></th>
	<th><?php echo $paginator->sort('minAsk');?></th>
	<th><?php echo $paginator->sort('maxAsk');?></th>
	<th><?php echo $paginator->sort('bedrooms');?></th>
	<th><?php echo $paginator->sort('hasPic');?></th>
	<th><?php echo $paginator->sort('addTwo');?></th>
	<th><?php echo $paginator->sort('addThree');?></th>
	<th><?php echo $paginator->sort('srchType');?></th>
	<th><?php echo $paginator->sort('catAbbreviation');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($searches as $search):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $search['Search']['id']; ?>
		</td>
		<td>
			<?php echo $search['Search']['query']; ?>
		</td>
		<td>
			<?php echo $search['Search']['minAsk']; ?>
		</td>
		<td>
			<?php echo $search['Search']['maxAsk']; ?>
		</td>
		<td>
			<?php echo $search['Search']['bedrooms']; ?>
		</td>
		<td>
			<?php echo $search['Search']['hasPic']; ?>
		</td>
		<td>
			<?php echo $search['Search']['addTwo']; ?>
		</td>
		<td>
			<?php echo $search['Search']['addThree']; ?>
		</td>
		<td>
			<?php echo $search['Search']['srchType']; ?>
		</td>
		<td>
			<?php echo $search['Search']['catAbbreviation']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $search['Search']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $search['Search']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $search['Search']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $search['Search']['id'])); ?>
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
		<li><?php echo $html->link(__('New Search', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Items', true), array('controller'=> 'items', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Item', true), array('controller'=> 'items', 'action'=>'add')); ?> </li>
	</ul>
</div>
