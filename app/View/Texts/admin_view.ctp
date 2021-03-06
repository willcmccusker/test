<div class="texts view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Text'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Text'), array('action' => 'edit', $text['Text']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Text'), array('action' => 'delete', $text['Text']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $text['Text']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Texts'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Text'), array('action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($text['Text']['id']); ?>
			&nbsp;
		</td>
</tr>				<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($text['Text']['title']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Content'); ?></th>
		<td>
			<?php echo $text['Text']['content']; ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Slug'); ?></th>
		<td>
			<?php echo h($text['Text']['slug']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($text['Text']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($text['Text']['created']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

