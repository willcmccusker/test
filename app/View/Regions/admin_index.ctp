<div class="regions index">
	<h2><?php echo __('Regions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('data_set_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_count'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($regions as $region): ?>
	<tr>
		<td><?php echo h($region['Region']['id']); ?>&nbsp;</td>
		<td><?php echo h($region['Region']['name']); ?>&nbsp;</td>
		<td><?php echo h($region['Region']['slug']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($region['DataSet']['id'], array('controller' => 'data_sets', 'action' => 'view', $region['DataSet']['id'])); ?>
		</td>
		<td><?php echo h($region['Region']['city_count']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $region['Region']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $region['Region']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $region['Region']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $region['Region']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Region'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Data Sets'), array('controller' => 'data_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Set'), array('controller' => 'data_sets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
